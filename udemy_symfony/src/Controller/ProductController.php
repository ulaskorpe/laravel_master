<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Request;
use Exception;
class ProductController extends AbstractController
{

    private $em;
    private $productRepository;
    public function __construct(  ProductRepository $productRepository){

         
        $this->productRepository = $productRepository;

    }

    /**
     * @Route("/products", name="list-products")
     */
    public function index(): Response
    {

      
       $products = $this->productRepository->findAll();
 
        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }
  /**
     * @Route("/products/{id}", name="show-product")
     */
    public function show(Product $product): JsonResponse
    {
        return new JsonResponse($product->getName());
    }
  /**
     * @Route("/products/create", name="create-product")
     */
    public function create(): Response
    {
        $faker = Factory::create();
        // $em = $this->getDoctrine()->getManager();
        //  for($i=0;$i<10;$i++){
        //     $product = new Product();
        //     $product->setName($faker->name);
        //     $product->setDescription($faker->words(4, true));
        //     $product->setPrice(rand(10,2100));
        //     $product->setTag($faker->word);
        //     $product->setSpecialPrice( (rand(0,10) % 2 == 0) ?1 :0);
        //     $product->setCreatedAt (Carbon::now() );
        //     $product->setUpdatedAt ( Carbon::now());
        //     $em->persist($product);
        //  }
        // $em->flush();
        return new Response("ok");
    }

      /**
     * @Route("/products/update/{id}", name="update-product")
     */

     public function update(Product $product,Request $request): JsonResponse
     {

         $em = $this->getDoctrine()->getManager();
            $product->setName($request->get("name"));
            // $product->setDescription($request->get("description"));
            // $product->setPrice($request->get("price"));
            $em->persist($product);
            $em->flush();
         return new JsonResponse($product->getName());
     }
      /**
     * @Route("/products/delete/{id}", name="delete-product")
     */
    public function delete(Product $product ): Response
    {

        $em = $this->getDoctrine()->getManager();
         try{
            $em->remove($product);
            $em->flush();
         }catch(Exception $e){
            return new Response( $e->getMessage());
            //return $this->createNotFoundException("not found");
         }
           
         
        
        return new JsonResponse($product->getName());
    }
}
