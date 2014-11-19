<?php

namespace WoYao\DefaultBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use WoYao\Common\Classes\UUID;
use Symfony\Component\HttpFoundation\Request;
use WoYao\DefaultBundle\Entity\Task;
use WoYao\DefaultBundle\Form\Type\TaskType;

class DefaultController extends Controller {

    /**
     * Response Object has three parameters ,  __construct($content = '', $status = 200, $headers = array())
     * @return Response
     */
    public function indexAction() {
        return new Response("<font color='red'>Index</font>", $state = 502);
        //return $this->render('WoYaoDefaultBundle:Default:index.html.twig', array('name' => $name));
    }

    /**
     * 
     * @param string $name Username who will be welcome.
     * @return Response
     */
    public function welcomeAction($name) {
        //return new Response("Nice to meet you ->".$name);

        $users = array(0 => array("username" => "yangwawa"),
            1 => array("username" => "tanyang"),
            2 => array("username" => "wangchang"));
        return $this->render('WoYaoDefaultBundle:Default:index.html.twig', array(
                    'users' => $users,
                    'username' => $name,
                    'uuid' => UUID::v4(),
                        )
        );
    }

    public function newAction(Request $request) {
        $task = new Task();
        $task->setTask("Write a blog post");
        $task->setDueDate(new \Datetime('tomorrow'));

        // use the default FormBuilder 
        /*
          $form = $this->createFormBuilder($task)
          ->add('task', null,array('attr'=> array('maxlength'=>6)))
          ->add('dueDate', 'date',array('widget'=>'single_text','label'=> 'Due date',))
          ->add('save', 'submit', array('label' => 'Create Task'))
          ->add('saveAndAdd', 'submit', array('label' => 'Save and Add'))
          ->getForm();
         */
        // use AbastractType create the form
        $form = $this->createForm(new TaskType(), $task);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $newAction = $form->get('saveAndAdd')->isClicked() ? 'wo_yao_new_task' : 'wo_yao_task_success';
            return $this->redirect($this->generateUrl($newAction));
        }
        return $this->render("WoYaoDefaultBundle:Default:new.html.twig", array(
                    'form' => $form->createView(),)
        );
    }

    public function task_successAction(Request $request) {
        

        $parameters['dueDate'] = $request->get('dueDate');
        //$parameters['task'] = is_null($form->get('task')->getData()) || empty($form->get('task')->getData()) 
        //       ? $form->get('task')->getData() 
        //        : 'Empty task';
        $parameters['task'] = $request->get('task');
         return $this->render("WoYaoDefaultBundle:Default:task_success.html.twig", $parameters);
    }

}
