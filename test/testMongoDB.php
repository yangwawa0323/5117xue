<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace test;

use test\Documents\User;
use test\Documents\BlogPost;

require_once __DIR__ . '/bootstrap.php';

$user = new User();
$user->setName('Bulat S.');
$user->setEmail('email@example.com');

$dm->persist($user);

// create blog post
foreach( range(1, 20) as $i) {
    $post = new BlogPost();
    $post->setTitle($i .': My First Blog Post');
    $post->setBody($i .' : MongoDB + Doctrine 2 ODM = awesomeness!');
    $post->setCreatedAt(new \DateTime());

    print_r($user);
    print_r($post);
    $user->addPost($post);

// store everything to MongoDB
}
$dm->flush();

