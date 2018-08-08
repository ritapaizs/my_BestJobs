<?php
/**
 * Created by PhpStorm.
 * User: Rita
 * Date: 8/2/2018
 * Time: 10:29 AM
 */

namespace App\Controller;
use App\Entity\Job;
use App\Form\JobSearchType;
use App\Form\JobType;
use App\Model\JobSearch;
use App\Repository\JobRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class JobController extends Controller
{
    /**
     * @Route("/job/new", name="newj")
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(JobType::class, new Job());
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $job = $form->getData();
            dump($job);
            $em = $this->getDoctrine()->getManager();
            $em->persist($job); //persist pune in entity manager sa salveze
            $em->flush();//salvare
            return $this->redirectToRoute('app_job_list');
        }
        $this->createForm(JobType::Class, null);
        return $this->render('BestJobs/newjob.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    /**
     * @Route("/edit/{id}", name="app_edit_job")
     */
    public function editAction(Request $request, Job $job)
    {
        $form = $this->createForm(JobType::class, $job);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $job = $form->getData();
            dump($job);
            $em = $this->getDoctrine()->getManager();
            $em->persist($job); //persist pune in entity manager sa salveze
            $em->flush();//salvare
            return $this->redirectToRoute('app_job_list');
        }
        $this->createForm(JobType::Class, null);
        return $this->render('BestJobs/newjob.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    /**
     * @Route("/locuri-de-munca", name="app_job_list")
     * @Route("/locuri-de-munca/{keyword}", name="app_job_keyword")
     *
     *
     * @param Request $request
     * @return Response
     */
    public function listAction(Request $request, $keyword = null)
    {
        $jobSerach = new JobSearch();
        if ($keyword) {
            $jobSerach->setKeyword($keyword);
        }
        /** @var FormInterface $from */
        $from = $this->createForm(JobSearchType::class, $jobSerach);
        $from->handleRequest($request);
        /** @var JobRepository $repository */
        $repository = $this->getDoctrine()->getManager()->getRepository(Job::class);
        $jobs =  $repository->getByKeyword($jobSerach->getKeyword());
        return $this->render(
            'BestJobs/listare.html.twig',
            [
                'form' => $from->createView(),
                'jobs' => $jobs,
                'keyword' => $jobSerach->getKeyword(),
            ]
        );
    }
}