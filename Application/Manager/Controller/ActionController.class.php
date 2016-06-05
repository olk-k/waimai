<?php

namespace Manager\Controller;


class ActionController extends ConmmonController {

    /**
     * 行为日志列表
     */
    public function actionLog(){
        //获取列表数据
        $list   =   $this->lists('ActionLog');
        get_state_text($list);
//        foreach ($list as $key=>$value){
//            $model_id                  =   get_document_field($value['model'],"name","id");
//            $list[$key]['model_id']    =   $model_id ? $model_id : 0;
//        }
        $this->assign('_list', $list);
        $this->meta_title = '行为日志';
        $this->display();
    }
    
    /**
     * 查看行为日志
     * @author huajie <banhuajie@163.com>
     */
    public function edit($id = 0){
        empty($id) && $this->error('参数错误！');

        $info = M('ActionLog')->field(true)->find($id);

        $this->assign('info', $info);
        $this->meta_title = '查看行为日志';
        $this->display();
    }
    
}
