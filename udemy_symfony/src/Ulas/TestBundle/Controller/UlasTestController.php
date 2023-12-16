<?php 

namespace App\Ulas\TestBundle\Controler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class UlasTestController extends AbstractController{
    /**
     * @Route("/ulas-test-bundle")
     * @return Response
     */
    public function index(){
        //// write routes to config/routes/annotations.yaml
        //// register bundle to config/bundles.php   array
        //return new Response("this is test bundle");
      //return $this->render("@TestBundle/TestBundle/index.html.twig",["msg"=> "this is your life"]);
       return $this->render('@TestBundle/index.html.twig');
    }
}