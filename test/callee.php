<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of callee
 *
 * @author yangwawa0323@163.com
 */

namespace test;



class callee {
    //put your code here
    public function __construct() {
        echo __NAMESPACE__;
        //set_include_path('./level1/');
        //require_once './level1/child.php';
        //$class_name='test\level1\child';
        //spl_autoload_call($class_name);
        spl_autoload_register([new level1\child],'show');
        
        $class2 = new level1\child();
        //var_dump(is_object($class2));
     }

}

$callee = new callee();

