<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of autoload_class2
 *
 * @author yangwawa-win7
 */
namespace test;

class autoload_class2 {
    //put your code here
    public function __autoload($class)
    {
        require_once($class.'php');
    }
}
