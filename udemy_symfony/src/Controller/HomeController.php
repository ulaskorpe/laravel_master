<?php

namespace App\Controller ;

use App\Service\MessageGenerator;
use App\Service\NameGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends Controller{

    public function index(NameGenerator $nameGenerator) {
        return  new  Response($nameGenerator->randomName());//$this->render('default/index.html.twig');
    }



// V0   public function hello(NameGenerator $nameGenerator){
//
//        return new Response("HELLO ".$nameGenerator->randomName());
//    }
///V1  private service / public service
//    public function hello(MessageGenerator $messageGenerator){
//
//        return new Response($messageGenerator->helloMessage());
//    }

    public function hello(){
            $session = $this->container->get('session');
           // $messageGenerator=$this->container->get(MessageGenerator::class);
            $messageGenerator=$this->container->get('message.generator');///alias usage
        return new Response($messageGenerator->helloMessage()."<hr>".$session->getName());
    }
}