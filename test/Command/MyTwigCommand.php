<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace test\Command;

require_once '../../vendor/autoload.php';

/**
 * Description of MyTwigCommand
 *
 * @author yangwawa-win7
 */
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Application;

class MyTwigCommand extends ContainerAwareCommand {

//put your code here
    private $output;

    protected function configure() {
        $this->setName("clean:twigcache")
                ->setDescription("Clean twig cache, refresh view")
                ->addArgument('dir', InputArgument::REQUIRED, "Which directory reside the twig cache")
                ->addOption("keeproot", null, InputOption::VALUE_OPTIONAL, "Whether keep the root dir or not");
    }

    private function recursiveDelete($dir, $removeRoot = FALSE) {
        if (!$dh = @opendir($dir)) {
            return;
        }
        while (FALSE !== ($obj = @readdir($dh))) {
            if ($obj == "." || $obj == "..")
                continue;
            $this->output->writeln("prepare remove \"" . $dir . DIRECTORY_SEPARATOR . $obj . "\"");
            if (!@unlink($dir . DIRECTORY_SEPARATOR . $obj)) {
                $this->output->writeln("go deep inside \"" . $dir . "\"");
                $this->recursiveDelete($dir . DIRECTORY_SEPARATOR . $obj, TRUE);
            }
        }
        closedir($dh);
        if (!$removeRoot) {
            $this->output->writeln("Remove root dir \"" . $dir . "\"");
            @rmdir($dir);
        }
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $this->output = $output;
        $twigDir = $input->getArgument("dir");
        $keeproot = (bool) ( strtolower($input->getOption("keeproot")) == "yes" ? TRUE : FALSE );
        var_dump($keeproot);
        $this->recursiveDelete($twigDir, $keeproot);
    }

}

$application = new Application();
$application->add(new MyTwigCommand());
$application->run();

