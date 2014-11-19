<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace test\Documents;

/**
 * Description of User
 *
 * @author yangwawa-win7
 */



use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document */
class User {
    //put your code here
    
    /** @ODM\ID */
    private $id;
    
    /** @ODM\String */
    private $name;
    
    /** @ODM\String */
    private $email;
    
    /** @ODM\ReferenceMany(targetDocument="BlogPost", cascade="all") */
    private $posts = array();
    
    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPosts() {
        return $this->posts;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPosts($posts) {
        $this->posts = $posts;
    }

    public function addPost($post){
        $this->posts[] = $post;
    }
         

}
