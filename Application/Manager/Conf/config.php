<?php

return array(
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/static',
        '__ADDONS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/Addons',
        '__IMG__' => __ROOT__ . '/Public/' . MODULE_NAME . '/images',
        '__CSS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
        '__JS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/js',
    ),
    'DB_PREFIX' => 'manager_', // 数据库表前缀
    'DEFAULT_CONTROLLER' => 'Site', // 默认控制器名称
    'DEFAULT_ACTION' => 'base', // 默认操作名称
);
