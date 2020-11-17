<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {   $a = '5';
        return $this->render('@App/default/index.html.twig',['a'=>$a]);
    }

    /**
     * @Route("/feedback", name="feedback")
     */
    public function feedback(){
        $a = 'feedback';
        return $this->render('@App/default/feedback.html.twig', ['a'=>$a]);
    }
}
