<?php


namespace AppBundle\Controller;


use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends Controller
{
    /**
     * @Route("/products", name="product_list")
     */
    public function indexAction(){
        $products = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->findActive();
        return $this->render('@App/product/index.html.twig', ['products'=>$products]);
    }

    /**
     * @Route("/products/{id}", name="product_item")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response|null
     */
    public function showAction($id){

        $product = $this->getDoctrine()->getRepository('AppBundle:Product')->find($id);
        if(!$product){
            throw $this->createNotFoundException('Product not found');
        }
        return $this->render('@App/product/show.html.twig',['product'=>$product]);
    }

    /**
     * @Route("/categories/{id}", name="product_by_category")
     * @param Category $category
     */
    public function listByCategoryAction(Category $category){
        $products = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->findByCategory($category);
        return $this->render('@App/product/list_by_category.html.twig', ['products'=>$products]);
    }
}