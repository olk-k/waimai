<?php

namespace Manager\Controller;

use Think\Controller;

class ConmmonController extends Controller {

    
    private $pageIndex = 0;
    public $pageSize = 10;
    /**
     * 后台控制器初始化
     */
    public function _initialize() {
        // 获取当前用户ID
        define('UID', is_login());
        if (!UID) {// 还没登录 跳转到登录页面
            $this->redirect('Public/login');
        }
        $this->pageIndex = I("get.p");
        if(empty($this->pageIndex)){
            $this->pageIndex = 0;
        }
        $this->assign("__MENU__", $this->getMenus());
    }

    /**
     * 通用分页列表数据集获取方法
     *
     *  可以通过url参数传递where条件,例如:  index.html?name=asdfasdfasdfddds
     *  可以通过url空值排序字段和方式,例如: index.html?_field=id&_order=asc
     *  可以通过url参数r指定每页数据条数,例如: index.html?r=5
     *
     * @param sting|Model  $model   模型名或模型实例
     * @param array        $where   where查询条件(优先级: $where>$_REQUEST>模型设定)
     * @param array|string $order   排序条件,传入null时使用sql默认排序或模型属性(优先级最高);
     *                              请求参数中如果指定了_order和_field则据此排序(优先级第二);
     *                              否则使用$order参数(如果$order参数,且模型也没有设定过order,则取主键降序);
     *
     * @param array        $base    基本的查询条件
     * @param boolean      $field   单表模型用不到该参数,要用在多表join时为field()方法指定参数
     *
     * @return array|false
     * 返回数据集
     */
    protected function lists($model, $where = array(), $order = '', $base = array('status' => array('egt', 0)), $field = true) {
        $options = array();
        $REQUEST = (array) I('request.');
        if (is_string($model)) {
            $model = M($model);
        }

        $OPT = new \ReflectionProperty($model, 'options');
        $OPT->setAccessible(true);

        $pk = $model->getPk();
        if ($order === null) {
            //order置空
        } else if (isset($REQUEST['_order']) && isset($REQUEST['_field']) && in_array(strtolower($REQUEST['_order']), array('desc', 'asc'))) {
            $options['order'] = '`' . $REQUEST['_field'] . '` ' . $REQUEST['_order'];
        } elseif ($order === '' && empty($options['order']) && !empty($pk)) {
            $options['order'] = $pk . ' desc';
        } elseif ($order) {
            $options['order'] = $order;
        }
        unset($REQUEST['_order'], $REQUEST['_field']);

        $options['where'] = array_filter(array_merge((array) $base, /* $REQUEST, */ (array) $where), function($val) {
            if ($val === '' || $val === null) {
                return false;
            } else {
                return true;
            }
        });
        if (empty($options['where'])) {
            unset($options['where']);
        }
        $options = array_merge((array) $OPT->getValue($model), $options);
        $total = $model->where($options['where'])->count();

        if (isset($REQUEST['r'])) {
            $listRows = (int) $REQUEST['r'];
        } else {
            $listRows = C('LIST_ROWS') > 0 ? C('LIST_ROWS') : 10;
        }
        $page = new \Think\Page($total, $listRows, $REQUEST);
        if ($total > $listRows) {
            $page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        }
        $p = $page->show();
        $this->assign('_page', $p ? $p : '');
        $this->assign('_total', $total);
        $options['limit'] = $page->firstRow . ',' . $page->listRows;

        $model->setProperty('options', $options);
        
        return $model->field($field)->select();
    }

    /**
     * 返回后台节点数据
     * @param boolean $tree    是否返回多维数组结构(生成菜单时用到),为false返回一维数组(生成权限节点时用到)
     * @retrun array
     *
     * 注意,返回的主菜单节点数组中有'controller'元素,以供区分子节点和主节点
     *
     */
    final protected function returnNodes($tree = true) {
        static $tree_nodes = array();
        if ($tree && !empty($tree_nodes[(int) $tree])) {
            return $tree_nodes[$tree];
        }
        if ((int) $tree) {
            $list = M('Menu')->field('id,pid,title,url,tip,hide')->order('sort asc')->select();
            foreach ($list as $key => $value) {
                if (stripos($value['url'], MODULE_NAME) !== 0) {
                    $list[$key]['url'] = MODULE_NAME . '/' . $value['url'];
                }
            }
            $nodes = list_to_tree($list, $pk = 'id', $pid = 'pid', $child = 'operator', $root = 0);
            foreach ($nodes as $key => $value) {
                if (!empty($value['operator'])) {
                    $nodes[$key]['child'] = $value['operator'];
                    unset($nodes[$key]['operator']);
                }
            }
        } else {
            $nodes = M('Menu')->field('title,url,tip,pid')->order('sort asc')->select();
            foreach ($nodes as $key => $value) {
                if (stripos($value['url'], MODULE_NAME) !== 0) {
                    $nodes[$key]['url'] = MODULE_NAME . '/' . $value['url'];
                }
            }
        }
        $tree_nodes[(int) $tree] = $nodes;
        
        return $nodes;
    }

    public function getMenus() {
        $menuObj = D("Menu");
        $groupId = session("user_auth.user_group");
        $user_rule = D("AuthGroup")->where("id = " . $groupId)->field("rules")->find();
        $rules = $user_rule['rules'];
        
        $selected = $menuObj->where("url like '%" . CONTROLLER_NAME . "/" . ACTION_NAME . "%' and pid != 0 and hide = 0")->field('id,pid')->find();
        if (empty($selected)) {return;}
        $id = $selected['id'];
        
        /* 判断用户操作权限 */
        if (!in_array($id, explode(",", $rules))) {
            $this->redirect("Public/error/");
            return;
        }
        
        $path = $menuObj->getPath($id);
        $menus['one'] = $menuObj->where("id in ($rules) and pid = 0 and hide = 0")->order("sort")->select();
        foreach ($menus['one'] as $key => $value) {
            if ($value['id'] === $path[0]['id']) {
                $menus['one'][$key]['class'] = "current";
                $menus['two'] = $menuObj->where("id in ($rules) and pid = {$value['id']} and hide = 0")->order("sort")->select();
            }
        }
        return $menus;
    }
    
    
    /**
     * 公共上传图片的处理方法
     */
    public function uploadImg() {
//        echo "asdfadsf";
//        $upload = new \Think\Upload();// 实例化上传类    
//        $upload->maxSize   =     10485760 ;// 设置附件上传大小    
//        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
//        $upload->savePath  =      './Uploads/'; // 设置附件上传目录    // 上传文件     
//        $info   =   $upload->upload();    
//        if(!$info) {// 上传错误提示错误信息        
////            $this->error();    
//            echo "error---".$upload->getError();
//        }else{// 上传成功        
////            $this->success('上传成功！');    
//            echo "success";
//        }
//        
        //导入上传类
        $upload = new \Org\Net\UploadFile();
        //设置上传文件大小
        $upload->maxSize = 10485760;
        //设置上传文件类型
        $upload->allowExts = explode(',','jpg,gif,png,jpeg');
        //设置附件上传目录
        $upload->savePath = './Uploads/';
        //设置上传文件规则
        $upload->saveRule = 'uniqid';
        //删除原图
        $upload->thumbRemoveOrigin = true;
        $info = $upload->upload();
        if (!$info) {
            if($upload->getErrorMsg() == "上传文件大小不符！"){
                $error = "请上传小于10M的图片,如果图片过大，可以先用QQ截图图片，再上传就可以了。";
            }
            $response = array(
                'state' => 500,
                'success'=>'false',
                'message' => $error,
                'msg' => $error,
                'result' => $error,
                'file_path' => $error
            );
            echo json_encode($response);
            
        } else {
            $uploadList = $upload->getUploadFileInfo();
            $path = $upload->savePath . '/' . $uploadList[0]['savename'];
            
            $image = new \Think\Image();
            $image->open($path);
            if($image->width() > 1000 || $image->height() > 1000){
                if($image->width() > $image->height()){
                    $w = 1000;
                    $h = ($image->height()*1000)/$image->width();
                }else{
                    $h = 1000;
                    $w = ($image->width()*1000)/$image->height();
                }
            }else{
                $w = $image->width();
                $h = $image->height();
            }
            $image->thumb($w, $h,\Think\Image::IMAGE_THUMB_CENTER)->save($path);
            $response = array(
                'state' => 200,
                'success'=>'true',
                'message' => "上传图片成功",
                'msg' => "上传图片成功",
                'result' => '/Uploads/' . $uploadList[0]['savename'] ,
                'file_path' => '/Uploads/' . $uploadList[0]['savename']
            );
            echo json_encode($response);
            
        }
    }

}
