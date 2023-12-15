<?php
namespace App\Controller;


use App\Service\NameGenerator;
use Faker\Factory;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class RoutingController extends AbstractController{


    /**
     * @Route({
     *     "en":"/about",
     *     "tr":"/hakkinda"
     *     },name="about")
     *  @return Response
     *
     *
     */


    public function hakkinda(){
        return new Response('Hakkindda');
    }


    /**
     * @Route("/blog/{page?}",name="list-blog",requirements={"page"="|d+"})
     * @return Response
     */

    public function showBlog($page=0){
        return new Response('PAGE ID:'.$page);
    }


    /**
     * @Route("/blog/{postSlug?}",name="list-blog-with-slug")
     * @return Response
     */

    public function showBlogWithSlug($postSlug=null){
        return new Response('PAGE WITH SLUG:'.$postSlug);
    }

    /**
     * @Route("/get-locale/{_locale}", defaults={"_locale"="tr"},requirements={"_locale"="en|tr"})
     */

    public function getLocale($_locale){

        return new Response("Locale is:".$_locale);
    }

    /**
     * @Route("/api/show-posts/{count}",defaults={"count"=10},methods={"POST"},requirements={"count"="|d+"}))
     */

    public function showPost( $count,NameGenerator $nameGenerator){
            $array = [];
            $faker = Factory::create();
        for($i=0;$i<$count;$i++){
            $array[$i]['name']=$nameGenerator->randomName();
            $array[$i]['email']=$nameGenerator->randomEmail();//$faker->email;
         //   $array[$i]['slug']=$faker->sentence(3);//$nameGenerator->makeSlug();

        }


        return new JsonResponse($array);

    }

    /**
     * @Route("/api/show-smt/{count?2}")
     */

    public function someFunction($count){

        return new JsonResponse(['count'=>$count]);
    }
    /**
     * @Route("/generate-url")
     */

    public function makeUrl(){

        $url = $this->generateUrl('app_routing_showpost',['count'=>3],UrlGeneratorInterface::ABSOLUTE_URL);
        return new JsonResponse(['url'=>$url]);
    }

}