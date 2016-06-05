<?php

namespace Manager\Controller;

class SiteController extends ConmmonController {
    
    /**
     * 网站基本配置
     */
    public function base(){
        $item = M("Setting")->where(array('key'=>'config'))->field("value")->find();
        if(IS_POST){
            $data=I('post.');
            $data['create_time']=NOW_TIME;
            $data['key'] = "config";
            $data['value'] = json_encode($data['config']);
            if(empty($item)){
                M("Setting")->add($data);
            }else{
                M("Setting")->where(array('key' => "config"))->save($data);
            }
            $this->success("编辑成功",U("Site/base"));
        }else{
            $temp = json_decode($item['value'],true);
            $this->item = $temp;
            $this->meta_title = "基本设置";
            $this->display();
        }
    }

    /**
     * 删除后台菜单
     * @author yangweijie <yangweijiester@gmail.com>
     */
    public function del(){
        $id = array_unique((array)I('id',0));
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        $table = I('get.e');
        $map = array('id' => array('in', $id) );
        if(M($table)->where($map)->delete()){
            //记录行为
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
    
}
