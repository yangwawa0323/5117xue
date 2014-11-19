<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace WoYao\DefaultBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller ;
use WoYao\Common\Classes\Constants as Constants;

/**
 * Description of BaseController
 *
 * @author yangwawa-win7
 */
class BaseController extends Controller
{

//put your code here
    protected function isValidUser($username, $user_salt) {
        return FALSE;
    }
    

    protected function isAdminUser() {
        return FALSE;
    }

    protected function getExpiration($username) {
        // return 10;  /* This account will be expired after 10 days */
        return -1;  // -1: has been expired.
    }

    /**
     * Show a flash message to user
     * @param string $message Show a flash message to user
     * @param type $type Message type, see more in \src\WoYao\Common\Constants
     * @param int $duration How many in seconds the flash message will be disappeared
     * @throws \RuntimeException
     */
    protected function showFlashMessage($message, $type = 0, $duration) {
        if (in_array($type, \Constants::$MESSAGE_TYPE)) {
            switch ($type) {
                case \Constants::$MESSAGE_TYPE['ERR']:
                    break;
                case \Constants::$MESSAGE_TYPE['WARN']:
                    break;
                default:
            }
        } else {
            throw new \RuntimeException(\Constants::$TYPE_IS_UNDEFIND . "\n" . $message);
        }
    }

    protected function sendMail($mailer, $recipent, $subject, $content) {
        
    }

    protected function getCurrentUser() {
        
    }
    
    protected function log($message,$type) {
        
    }

}
