<?php
namespace App\Controller ;

use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController {


public function index(){
 //   return new Response('HELLO WORLD');
     $faker = Factory::create();
     $sentence = "";
     foreach ($faker->words(5) as $item){
         $sentence.=$item." ";

     }
       //return new  Response($sentence);
  //  return new  Response(join('',$faker->sentence)." .");
    return $this->render('index.html.twig',['data'=> Rand(0,100) , 'sentence'=>$sentence]);
}


public function jsonResponse(){
    return new JsonResponse(['data'=>[3,5,63,2,23,5,6,7]]);
}

/**
 * @Route("/request-test",name="request_test")
 * @param RequestStack $requestStack
 */

public function reqTest(RequestStack $requestStack){

    $request= $requestStack->getCurrentRequest();
    /// post ile biþey alacaksak
    $name = $request->request->get('name','Default Value');
    /// get ile biþey alacaksak
    $name_get = $request->query->get('name','default Value');

    ///cookies
    $cookies = $request->cookies->get('username','xx');

    //attributes - uygulamadaki argümanlar
    $attr = $request->attributes->get('smo');

    //files
    $file = $request->files->get('image_');

    //server
    $server_detail = $request->server->all();


    //headers
    $headers = $request->headers->all();
 //   var_dump($server_detail);
    // return new Response("ok");
    return new JsonResponse($attr);
}

    /**
     * @Route("/response-test",name="response_test")
     * @param RequestStack $requestStack
     */

public function responseTest(RequestStack $requestStack){




//    return new Response("ok");
    return $this->redirectToRoute('about.en');
}

    /**
     * @Route("/service-test",name="service_test")
     *
     */
public function serviceTest(SessionInterface $session){
    //$session = $this->container->get('session');
    return new Response($session->getName());
}


}