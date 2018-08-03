<?php
/**
 * Created by PhpStorm.
 * User: Rita
 * Date: 8/2/2018
 * Time: 10:29 AM
 */

namespace App\Controller;
use App\Entity\Job;
use App\Form\JobType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class JobController extends AbstractController
{


    /**
     * @Route("/job/new")
     */

    public function addAction(Request $request)
    {

        $form = $this->createForm(JobType::class, null);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $job=$form->getData();
            $em=$this->getDoctrine()->getManager();
            $em->persist($job); //persist pune in entity manager sa salveze
            $em->flush();//salvare

        }

        $this->createForm(JobType::Class,null);
        return $this->render('BestJobs/newjob.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}