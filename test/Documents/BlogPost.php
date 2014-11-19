<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace test\Documents; 



use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Description of BlogPost
 *
 * @author yangwawa-win7
 */
/** @ODM\Document */
class BlogPost {
    //put your code here
    /** @ODM\ID */
    private $id;
    
    /** @ODM\String */
    private $title;
    
    /** @ODM\String */
    private $body;
    
    /** @ODM\Date */
    private $createdAt;
    public function getTitle() {
        return $this->title;
    }

    public function getBody() {
        return $this->body;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setBody($body) {
        $this->body = $body;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }


    
}
