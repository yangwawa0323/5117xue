<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Task
 *
 * @author yangwawa-win7
 */

namespace WoYao\DefaultBundle\Entity;

class Task {

    //put your code here
    protected $task;
    protected $dueDate;

    public function getTask() {
        return $this->task;
    }

    public function getDueDate() {
        return $this->dueDate;
    }

    public function setTask($task) {
        $this->task = $task;
    }

    public function setDueDate(\Datetime $dueDate = null) {
        $this->dueDate = $dueDate;
    }

}
