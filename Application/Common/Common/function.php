<?php

/**
 * 系统非常规MD5加密方法
 * @param  string $str 要加密的字符串
 * @return string 
 */
function user_password_code($str, $key = 'password') {
    return '' === $str ? '' : md5(sha1($str) . $key);
}

/**
 * 检测验证码
 * @param  integer $id 验证码ID
 * @return boolean     检测结果
 */
function check_verify($code, $id = 1) {
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

/**
 * 数据签名认证
 * @param  array  $data 被认证的数据
 * @return string       签名
 */
function data_auth_sign($data) {
    //数据类型检测
    if (!is_array($data)) {
        $data = (array) $data;
    }
    ksort($data); //排序
    $code = http_build_query($data); //url编码并生成query字符串
    $sign = sha1($code); //生成签名
    return $sign;
}

/**
 * 把返回的数据集转换成Tree
 * @param array $list 要转换的数据集
 * @param string $pid parent标记字段
 * @param string $level level标记字段
 * @return array
 */
function list_to_tree($list, $pk='id', $pid = 'pid', $child = '_child', $root = 0) {
    // 创建Tree
    $tree = array();
    if(is_array($list)) {
        // 创建基于主键的数组引用
        $refer = array();
        foreach ($list as $key => $data) {
            $refer[$data[$pk]] =& $list[$key];
        }
        foreach ($list as $key => $data) {
            // 判断是否存在parent
            $parentId =  $data[$pid];
            if ($root == $parentId) {
                $tree[] =& $list[$key];
            }else{
                if (isset($refer[$parentId])) {
                    $parent =& $refer[$parentId];
                    $parent[$child][] =& $list[$key];
                }
            }
        }
    }
    return $tree;
}

/**
 * 时间戳格式化
 * @param int $time
 * @return string 完整的时间显示
 */
function time_format($time = NULL, $format = 'Y-m-d H:i') {
    $time = $time === NULL ? NOW_TIME : intval($time);
    return date($format, $time);
}

/**
 * 记录行为日志，并执行该行为的规则
 * @param string $action 行为标识
 * @param string $seat 触发行为的模型名
 * @param int $record_id 触发行为的记录id
 * @param int $user_id 执行行为的用户id
 * @return boolean
 */
//function action_log($action = null, $seat = null, $record_id = null, $user_id = null){
//
//    //参数检查
//    if(empty($action) || empty($seat) || empty($record_id)){
//        return '参数不能为空';
//    }
//    if(empty($user_id)){
//        $user_id = is_login();
//    }
//
//    //查询行为,判断是否执行
//    $action_info = M('Action')->getByName($action);
//    if($action_info['status'] != 1){
//        return '该行为被禁用或删除';
//    }
//
//    //插入行为日志
//    $data['action_id']      =   $action_info['id'];
//    $data['user_id']        =   $user_id;
//    $data['action_ip']      =   ip2long(get_client_ip());
//    $data['model']          =   $seat;
//    $data['record_id']      =   $record_id;
//    $data['create_time']    =   NOW_TIME;
//
//    //解析日志规则,生成日志备注
//    if(!empty($action_info['log'])){
//        if(preg_match_all('/\[(\S+?)\]/', $action_info['log'], $match)){
//            $log['user']    =   $user_id;
//            $log['record']  =   $record_id;
//            $log['model']   =   $seat;
//            $log['time']    =   NOW_TIME;
//            $log['data']    =   array('user'=>$user_id,'model'=>$seat,'record'=>$record_id,'time'=>NOW_TIME);
//            foreach ($match[1] as $value){
//                $param = explode('|', $value);
//                if(isset($param[1])){
//                    $replace[] = call_user_func($param[1],$log[$param[0]]);
//                }else{
//                    $replace[] = $log[$param[0]];
//                }
//            }
//            $data['remark'] =   str_replace($match[0], $replace, $action_info['log']);
//        }else{
//            $data['remark'] =   $action_info['log'];
//        }
//    }else{
//        //未定义日志规则，记录操作url
//        $data['remark']     =   '操作url：'.$_SERVER['REQUEST_URI'];
//    }
//
//    M('ActionLog')->add($data);
//
//    if(!empty($action_info['rule'])){
//        //解析行为
//        $rules = parse_action($action, $user_id);
//
//        //执行行为
//        $res = execute_action($rules, $action_info['id'], $user_id);
//    }
//}

/**
 * 记录行为日志，并执行该行为的规则
 * @param type $action
 * @param type $seat
 * @param type $record_id
 * @param type $user_id
 * @param type $remark
 * @return string
 */
function action_log($action = null, $seat = null, $record_id = null, $user_id = null, $remark = null) {

    //参数检查
    if (empty($action) || empty($seat) || empty($record_id) || empty($remark)) {
        return '参数不能为空';
    }
    if (empty($user_id)) {
        $user_id = is_login();
    }

    //查询行为,判断是否执行
    $action_info = M('Action')->getByName($action);

    if ($action_info['status'] != 1) {
        return '该行为被禁用或删除';
    }
    //插入行为日志
    $data['action_id'] = $action_info['id'];
    $data['user_id'] = $user_id;
    $data['action_ip'] = ip2long(get_client_ip());
    $data['seat'] = $seat;
    $data['record_id'] = $record_id;
    $data['create_time'] = NOW_TIME;
    $data['remark'] = $remark;

    M('ActionLog')->add($data);
}

/**
 * 前后台添加用户充值消费订单
 * @param type $mid
 * @param type $money
 * @param type $type
 * @param type $description
 * @param type $status
 * @return type code
 */
function consume_order($mid, $money, $type, $description, $status) {
    $data["mid"] = $mid;
    $data["money"] = $money;
    $data["type"] = $type;
    $data["description"] = $description;
    $data["create_time"] = NOW_TIME;
    $data["status"] = $status;

    return D("ConsumeOrder")->add($data);
}

/**
 * 获取会员用户名
 * @param type $mid
 * @return type phone
 */
function get_memberName($mid) {
    $info = D("MemberInfo")->where("mid = $mid")->find();
    return $info['phone'];
}

/**
 * 使用curl发送get请求
 * @param type $url
 * @return type
 */
function send_get($url) {
    //初始化
    $ch = curl_init();
    //设置选项，包括URL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    // https请求 不验证证书和hosts
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    //执行并获取HTML文档内容
    $output = curl_exec($ch);
    //释放curl句柄
    curl_close($ch);
    //打印获得的数据
    return json_decode($output, true);
}

/**
 * 使用curl发送post请求
 * @param type $url
 * @param type $data
 * @return type
 */
function send_post($url, $data) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // post数据
    curl_setopt($ch, CURLOPT_POST, 1);
    // post的变量
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    // https请求 不验证证书和hosts
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    $output = curl_exec($ch);
    curl_close($ch);
    //打印获得的数据
    return json_decode($output, true);
}

/**
 * 获取指定长度的随机字符串
 * @param type $length
 * @return string
 */
function get_rand_str($length) {
    $str = null;
    $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz0123456789";
    $max = strlen($strPol) - 1;

    for ($i = 0; $i < $length; $i++) {
        $str.=$strPol[rand(0, $max)]; //rand($min,$max)生成介于min和max两个数之间的一个随机整数
    }

    return $str;
}

/**
 * 针对于特征量对特征值的表，将特征量取出作为数组的key
 * @param type $data
 * @param type $field
 * @return type
 */
function set_field2Key(&$data, $field = 'key') {
    $i = 0;
    $tempData = null;
    foreach ($data as $val) {
        $tempData[$val[$field]] = $val;
    }
    $data = $tempData;
    return $data;
}

/**
 * 将地址id转换为地址文本
 * @param type $aid
 */
function get_address_text($aid,$l) {
    if(empty($aid)){
        return "暂无";
    }
    $areas = explode("-",$aid);
    $str = "";
    if(count($areas) == 1){
        $area = M("area")->where("id = '{$areas[0]}'")->find();
        return $area['title'];
    }else{
        for($i = 1;$i<count($areas);$i++){
            $area = M("area")->where("id = '{$areas[$i]}'")->find();
            $str=$str."，".$area['title'];
        }
        $str = mb_substr($str,1,mb_strlen($str,'utf-8'),"utf-8");
        return $str;
    }
}

/**
 * select返回的数组进行整数映射转换
 *
 * @param array $map  映射关系二维数组  array(
 *                                          '字段名1'=>array(映射关系数组),
 *                                          '字段名2'=>array(映射关系数组),
 *                                           ......
 *                                       )
 *
 *  array(
 *      array('id'=>1,'title'=>'标题','status'=>'1','status_text'=>'正常')
 *      ....
 *  )
 *
 */
function get_state_text($data, $map = array('status' => array(1 => '正常', -1 => '删除', 0 => '禁用', 2 => '未审核', 3 => '草稿')), $field = 'status') {
    if ($data === false || $data === null) {
        return $data;
    }
    $data = (array) $data;
    foreach ($data as $key => $row) {
        foreach ($map["status"] as $col => $pair) {
            if ($row[$field] == $col) {
                $data[$key][$field . '_text'] = $pair;
            }
        }
    }
    return $data;
}

/**
 * TODO 基础分页的相同代码封装，使前台的代码更少
 * @param $m 模型，引用传递
 * @param $where 查询条件
 * @param int $pagesize 每页查询条数
 * @return \Think\Page
 */
//function get_page($m, $where, $pagesize = 10) {
//    
//    $count      = $m->where($where)->count();// 查询满足要求的总记录数
//    $page       = new \Think\Page($count,$pagesize);// 实例化分页类 传入总记录数和每页显示的记录数
//    
//    
//    return $page;
//}


/**
 * TODO 基础分页的相同代码封装，使前台的代码更少
 * @param $m 模型，引用传递
 * @param $where 查询条件
 * @param int $pagesize 每页查询条数
 * @return \Think\Page
 */
function getPage(&$m,$where,$pagesize=10){
    $m1=clone $m;//浅复制一个模型
    $count = $m->where($where)->count();//连惯操作后会对join等操作进行重置
    $m=$m1;//为保持在为定的连惯操作，浅复制一个模型
    $p=new Think\Page($count,$pagesize);
    $p->lastSuffix=false;
    $p->setConfig('header', '<span>共有数据%TOTAL_ROW%条</span>');
    $p->setConfig('first', '<<');
    $p->setConfig('prev', '<');
    $p->setConfig('next', '>');
    $p->setConfig('last', '>>');
    $p->setConfig('theme', '<li>%FIRST%</li> <li>%UP_PAGE%</li> <li>%LINK_PAGE%</li> <li>%DOWN_PAGE%</li> <li>%END%</li>');
    $p->parameter=I('get.');
    $m->limit($p->firstRow,$p->listRows);
    return $p;
}

/**
 * 给执行用户发送消息
 */
function send_mess_2_member($sid,$gid,$title,$content,$type){
    $data = array("mess_sid"=>$sid,"mess_gid"=>$gid,"mess_title"=>$title,"mess_content"=>$content,"mess_create_time"=>time(),"mess_type"=>$type,"mess_status"=>0);
    $result = M("memberMessage")->add($data);
    return $result;
}


//获取树的根到子节点的路径
function get_path($table,$id) {
    $path = array();
    $nav = M($table)->where("id={$id}")->field('id,pid,title')->find();
    $path[] = $nav;
    if ($nav['pid'] > 0) {
        $path = array_merge(get_path($table,$nav['pid']), $path);
    }
    return $path;
}


/**
 * 5.5以下版本模拟  array_column 函数
 * @param type $data
 * @param type $columu
 * @return type
 */
function array_column_5_5($data,$columu){
    
    $temp = array();
    foreach ($data as $item){
        array_push($temp, $item[$columu]);
    }
    
    return $temp;
}


function get_child($table,$pid,$faild1="id",$faild2="pid"){
    $list = M($table)->where(array($faild2=>$pid))->select();
    return array_column_5_5($list, $faild1);
}

/**
 * 修改用户身份为导游
 * @param type $i
 * @return type
 */
function update_to_guide($i){
    $info = M("MemberVer")->where("mid = $i")->select();
    if(count($info) < 3){
        return;
    }
    set_field2Key($info);
    if($info['IdCard']['status'] == 0){
        return;
    }
    M("MemberInfo")->where("mid = $i")->save(array("group_id"=>2));
}
function get_address_id($str){
    $arr = explode("-", $str);
    if(count($arr) <= 1){
        return implode("-", array_column_5_5(get_path("area", $str), "id"));
    }else{
        return $str;
    }
}

/**
 * 生成订单编号
 * @return string
 */
function get_order_code() {
    $Ord = M('order');
    $numbers = range(10, 99);
    shuffle($numbers);
    $code = array_slice($numbers, 0, 5);
    $ordcode = $code[0] . $code[1] . $code[2] . $code[3] .$code[3];
    $oldcode = $Ord->where("order_code='" . $ordcode . "'")->getField('order_code');
    if ($oldcode) {
        getordcode();
    } else {
        return $ordcode;
    }
}