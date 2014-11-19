<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of autoload_test01
 *
 * @author yangwawa-win7
 */
function __autoload($class) {
    
}

function my_loader() {
    
}

function your_loader() {
    
}

var_dump(spl_autoload_functions());
echo '<br/>';

spl_autoload_register('my_loader');
spl_autoload_register('your_loader');

var_dump(spl_autoload_functions());
