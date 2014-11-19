<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use test\Documents\User as User;
use test\Documents\BlogPost as BlogPost;

require_once './bootstrap.php';

//$user = $dm->getRepository('test\Documents\User')->findOneByEmail('email@example.com');
// Lowercase the field, for example: email, mongodb field case-sensitive
$result = $dm->createQueryBuilder('test\Documents\User')
        ->select('_id')
        ->field('email')->equals('email@example.com')
        ->distinct('name')
        ->getQuery()
        //->getSingleResult();
        ->execute();

var_dump($result);

//if (!is_null($user)) {
//    printf("User %s , email : %s \n", $user['name'], $user['email']);
//}

/*
//foreach ($cursors as $user){
if(!is_null($user)){
    printf("User %s , email : %s \n",$user->getName(), $user->getEmail());
    foreach($user->getPosts() as $post)
    {
         printf("User %s \nPost Title:%s \nBody: %s\nCreate At: %s\n",
                        $user->getName(), 
                        $post->getTitle(), 
                        $post->getBody(),
                        $post->getCreatedAt()->format('Y-m-d H:i:s')
                 );
          
    }
}
//}
*/
//$user = $dm->getRepository('test\Documents\User')->findOneBy(array('email'=> 'email@example.com'));
/*
$posts = $user->getPosts();
foreach($posts as $post)
{
    echo $post->getBody();
}
 * /
 */
