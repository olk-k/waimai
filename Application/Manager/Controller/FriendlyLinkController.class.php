<?php

namespace Manager\Controller;

class FriendlyLinkController extends ConmmonController {
    
    public function index($pid = 0){
        $list = M("FriendlyLink")->where(" pid = {$pid} ")->select();
        $this->list = $list;
        $this->meta_title = '友情链接';
        $this->display();
    }
    
    
    
    /**
     * 新增友情链接
     */
    public function add(){
        if(IS_POST){
            $Menu = D('friendlyLink');
            $data = I("post.");
            $data['content'] = stripslashes(html_entity_decode($data['content']));
            if($data){
                $Menu->add($data);
                if($id){
                    $this->success('新增成功', U('FriendlyLink/index?pid='.$data['pid']));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        }else{
            $this->assign('info',array('pid'=>I('pid')));
            $menus = M('friendlyLink')->field(true)->select();
            $menus = D('Common/Tree')->toFormatTree($menus);
            $menus = array_merge(array(0=>array('id'=>0,'title_show'=>'顶级菜单')), $menus);
            $this->assign('Menus', $menus);
            $this->meta_title = '新增友情链接';
            $this->display("edit");
        }
    }
    /**
     * 新增友情链接
     */
    public function edit($id){
        if(IS_POST){
            $Menu = D('friendlyLink');
            $data = I("post.");
            $data['content'] = stripslashes(html_entity_decode($data['content']));
            if($data){
                $id = $Menu->save($data);
                if($id){
                    $this->success('编辑成功', U('FriendlyLink/index?pid='.$data['pid']));
                } else {
                    $this->error('编辑失败');
                }
            } else {
                $this->error($Menu->getError());
            }
        }else{
            $info = array();
            /* 获取数据 */
            $info = M('friendlyLink')->field(true)->find($id);
            $menus = M('friendlyLink')->field(true)->select();
            $menus = D('Common/Tree')->toFormatTree($menus);

            $menus = array_merge(array(0=>array('id'=>0,'title_show'=>'顶级菜单')), $menus);
            $this->assign('Menus', $menus);
            if(false === $info){
                $this->error('获取后台菜单信息错误');
            }
            $this->assign('info', $info);
            $this->meta_title = '编辑友情链接';
            $this->display();
        }
    }
    
    /**
     * 删除友情链接
     * @param type $id
     */
    public function del($id){
        D('friendlyLink')->delete($id);
        $this->success("删除成功");
    }
}
