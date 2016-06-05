<?php

namespace Manager\Controller;

class OrderController extends ConmmonController {
    
    
    /**
     * 订单列表
     */
    public function index() {
        $m = M("orderMemberProductView");
        $map = null;
        $p = getpage($m, $map, $this->pageSize);
        $orderList = $m->select();
        $orderList = get_state_text($orderList, array("status" => array(0 => "未结算", 1 => "已结算")),"pay_status");
//        1产品  2免费交换  3拼颜值
        $orderList = get_state_text($orderList, array("status" => array(1 => "产品", 2 => "免费交换", 3 => "拼颜值")),"ptype");
        $orderList = get_state_text($orderList, array("status" => array(1 => "产品", 2 => "免费交换", 3 => "拼颜值")),"ptype");
        
        $this->_page = $p->show();
        $this->list = $orderList;
        $this->meta_title = "订单管理";
        $this->display();
        
    }
    
    
    public function changeStatus($i,$s){
        M("order")->save(array("order_id"=>$i,"pay_status"=>$s));
        $this->success("结算成功");
    }
    
    
    
    
}
