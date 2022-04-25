<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    #[Route('/', name: 'path_home')]
    public function index()
    {

        if(empty($_SESSION['admin_id'])){
            return $this->render('login.html.twig', []);
        }else{
            return $this->render('index.html.twig', []);
        }

    }


    #[Route('/login-post', name: 'login_post')]
    public function loginPost(Request $request){
            return new Response($request->get('username'));
          }

}
