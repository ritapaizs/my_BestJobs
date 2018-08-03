<?php
/**
 * Created by PhpStorm.
 * User: Rita
 * Date: 7/27/2018
 * Time: 12:26 PM
 */
namespace App\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BestJobs extends AbstractController
{

    /**
     * @Route("/")
     */
    public function indexAction()
    {
       // return new Response('This is going to be mini BestJobs ^_^');
        return $this->render('BestJobs/homepage.html.twig',['title'=>"De cati aplicanti ai nevoie?",]);
      //  return $this->render('BestJobs/base.html.twig');
    }


    /**
     * @Route("/register")
     */
    public function logare()
    {
        return $this->render('BestJobs/logare.html.twig',['title'=>'logare']);
    }


}