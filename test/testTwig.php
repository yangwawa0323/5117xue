<?php

namespace test;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../vendor/twig/twig/lib/Twig/Autoloader.php';

\Twig_Autoloader::register();

class My_Twig {

    private $templateDir;
    private $templateFile;
    private $template ;
    private $twig;

    public function __construct($dir, $file) {
        $this->templateDir = $dir;
        $this->templateFile = $file;
        try {
            $loader = new \Twig_Loader_Filesystem(__DIR__ . DIRECTORY_SEPARATOR . $this->templateDir);
            // The namespace folder prepend to the Loader, the second parameter is name of the namespace in which 
            // to find and load the template. By default is self::MAIN_NAMESPACE
            
            $loader->prependPath("./Resources/views",$namespace='test');
            $this->twig = new \Twig_Environment($loader, array(
                'cache' => "./Resources/cache/",
            ));
            
            $filter = new \Twig_SimpleFilter('bolder',function($string){
                return '<b>'.$string.'</b>';
            }); 

            $this->twig->addFilter($filter);
            $this->template = $this->twig->loadTemplate($this->templateFile);
            
        } catch (Twig_Error_Loader $tel) {
            echo $tel->getCode() . " : " . $tel->getMessage();
            echo "\n";
            return FALSE;
        }
    }
    
    public function render(array $contentArray= null)
    {
        if(is_null($contentArray ) || !is_array($contentArray))
        {
            throw new \Exception("No content is given to render");
        }else{
             return $this->template->render($contentArray);
        }
    }

}


$templateDir = "./Resources/";
$templateDir = strtr($templateDir, '/', DIRECTORY_SEPARATOR);

//$templateFile = "user.html.twig";
// The simplist to use format @namespace/template, will the found the template in the $loader->prependPath($dir,$namespace)
$templateFile = "@test/user.html.twig";
$contentArray = array("color" => "red", 
                       "user" => array("username" => "Yap, Hello Twig"),
                );


$testTwig = new My_Twig($templateDir, $templateFile);
for($i = 10; $i < 15; $i++)
{
    $contentArray["pos"] = $i;
    echo $testTwig->render($contentArray);
}