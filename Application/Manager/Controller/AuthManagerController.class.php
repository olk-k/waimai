<?php

namespace Manager\Controller;


class AuthManagerController extends ConmmonController {

    
    
    public function index(){
        $list = get_state_text($this->lists("AuthGroup",'','id asc'));
        $this->assign('_list', $list);
        $this->meta_title = '群组管理';
        $this->show();
    }
    
     /**
     * 创建管理员用户组
     */
    public function createGroup(){
        $node_list = $this->returnNodes(true);
        $this->assign("node_list", $node_list);
        $this->meta_title = '新增角色';
        $this->display("editGroup");
    }

     /**
     * 编辑管理员用户组
     */
    public function editGroup($id=0) {
        $info = D("AuthGroup")->find($id);
        $node_list = $this->returnNodes(true);
        $this->assign("node_list", $node_list);
        $this->assign("auth_group", $info);
        $this->meta_title = '编辑角色';
        $this->display();
    }
    
    
    
    public function writeGroup(){
        $data = I("post.");
        $data['rules'] = implode(',',$data['rules']);
        if(empty($data['id'])){
            M("AuthGroup")->add($data);
            $this->success("添加成功",U("AuthManager/index"));
        }else{
            M("AuthGroup")->save($data);
            $this->success("修改成功",U("AuthManager/index"));
        }
    }
    
    
   /**
     * 删除用户组
     */
    public function delGroup(){
        $id = array_unique((array)I('id',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        $map = array('id' => array('in', $id) );
        if(M('AuthGroup')->where($map)->delete()){
            // S('DB_CONFIG_DATA',null);
            //记录行为
            action_log('update_group', 'Menu', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
        
    }

}
