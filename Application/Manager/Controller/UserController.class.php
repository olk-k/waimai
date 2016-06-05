<?php

namespace Manager\Controller;

class UserController extends ConmmonController {

    
    
    public function index() {
        $list = get_state_text(M("userInfoView")->select());
        $this->assign('_list', $list);
        $this->meta_title = '用户管理';
        $this->display();
    }

    /**
     * 添加新管理员的方法
     * @param type $username
     * @param type $password
     * @param type $repassword
     * @param type $email
     */
    public function add($username = '', $password = '', $repassword = '', $email = '',$group_id='') {
        if (IS_POST) {
            /* 检测密码 */
            if ($password != $repassword) {
                $this->error('密码和重复密码不一致！');
            }

            /* 调用注册接口注册用户 */
            $User = D("User");
            $uid = $User->register($username, $password, $email,'',$group_id);
            
            if (0 < $uid) { //注册成功
                $this->success('用户添加成功！', U('index'));
            } else { //注册失败，显示错误信息
                $this->error($this->showRegError($uid));
            }
        } else {
            $list = D("AuthGroup")->select();
            $this->assign("_list",$list);
            $this->meta_title = '新增用户';
            $this->display("");
        }
    }

    
    public function edit($id=0){
        if(IS_POST){
            $data = I("post.");
            M("UserInfo")->save($data);
            $this->success("修改成功",U("User/index"));
        }else{
            $info = D("UserInfo")->where("uid = $id")->find();
            $list = D("AuthGroup")->select();

            $this->assign("_list",$list);
            $this->assign("info", $info);

            $this->display();
        }
        
    }
    
    
    public function updatepassword(){
        if(IS_POST){
            $data = I("post.");
            $data['id'] = is_login();
            $data['password'] = user_password_code($data['password'], AUTH_KEY);
            $result = M("user")->save($data);
            if($result){
                $this->success("修改成功");
            }
        }else{
            $this->meta_title = "修改密码";
            $this->display();
        }
        
    }
    public function updatenickname(){
        if(IS_POST){
            $data = I("post.");
            $result = M("userInfo")->where("uid = ".is_login()." ")->save($data);
            if($result){
                D("User")->autoLogin(is_login());
                $this->success("修改成功");
            }
        }else{
            $this->nickName = get_nickname();
            $this->meta_title = "修改昵称";
            $this->display();
        }
    }

    
    public function del($uid){
        $result = M("User")->delete($uid);
        if($result){
            $this->success("操作成功");
        }
    }
    
}
