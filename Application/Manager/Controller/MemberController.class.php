<?php

namespace Manager\Controller;


class MemberController extends ConmmonController {
    
    public function index() {
        
        $m = M("memberInfo");
        $map = null;
        $p = getpage($m, $map, $this->pageSize);
        $list = $m->where($map)->select();
        $list = get_state_text($list, array("status" => array(-1 => "已拒绝", 0 => "待审核", 1 => "审核通过")));

        $this->assign("_list", $list);
        $this->_page = $p->show();
        $this->meta_title = "会员";
        $this->display();

    }
    
    
    /**
     * 修改会员的状态
     * @param type $method
     * @param type $mid
     */
    public function changeStatus($method,$id){
        $map['mid'] = $id;
        if($method == "forbidMember"){   //禁用
            $data['status'] = 0;
        }else if($method == "resumeMember"){  // 启用
            $data['status'] = 1;
        }
        $data['status'] == 1 ? $title = "已被管理员启用！" : $title = "已被管理员禁用！";
        $title = "您的账号" . $title;
        send_mess_2_member(0, $id, $title, $title, 1);


        $result  = M("memberInfo")->where($map)->save($data);
        if($result){
            $this->success("操作成功");
        }
    }
    
    
}
