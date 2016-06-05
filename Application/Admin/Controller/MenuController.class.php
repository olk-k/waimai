<?php

namespace Admin\Controller;

use Think\Controller;

class MenuController extends Controller {

    public function index() {
        $this->display();
    }

    public function add() {
        if (IS_POST) {
            $data = I("post.");
            $request = M("menu")->add($data);
            if ($request >= 1) {
                $this->success($request, U('Menu/index'));
            } else {
                $this->error($request);
            }
        } else {
            $this->assign('info', array('pid' => I('pid')));
            $menus = M('Menu')->field(true)->select();
            $menus = D('Common/Tree')->toFormatTree($menus);
            $menus = array_merge(array(0 => array('id' => 0, 'title_show' => '顶级菜单')), $menus);
            $this->assign('Menus', $menus);
            $this->meta_title = '新增菜单';
            $this->display('edit');
        }
    }

}
