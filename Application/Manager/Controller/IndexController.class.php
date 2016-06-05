<?php

namespace Manager\Controller;

class IndexController extends ConmmonController {

    function index() {
        $this->meta_title = "主页";
        $this->display();
    }

}
