<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TaskType
 *
 * @author yangwawa-win7
 */

namespace WoYao\DefaultBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TaskType extends AbstractType {

    //put your code here
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('task','text',array( 'attr'=> array( 'maxlength'=> 6)))
                ->add('dueDate',null,array('widget'=>'single_text'))
                ->add('agree','checkbox',array('mapped' => false))
                ->add('save','submit');
        
    }
    public function getName(){
        return 'task';
    }
}
