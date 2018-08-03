<?php
/**
 * Created by PhpStorm.
 * User: Rita
 * Date: 8/2/2018
 * Time: 1:58 PM
 */
namespace App\Form;
use App\Entity\Job;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
class JobType extends AbstractType
{


    public function buildForm(FormBuilderInterface $form, array $options)
    {  // creates a task and gives it some dummy data for this example
       // $job = new Job();
      // $job->setTitle('ex Senior PHP Developer');
       // $job->setDescriere('Joburile cu descriere completa primesc pana la 70% mai multi aplicanti!');


        $form
            ->add('title', TextType::class)
            ->add('descriere', TextType::class)
         //   ->add('salariumin', TextType::class)
          //  ->add('salariumax', TextType::class)
            ->add('locatii', TextType::class)
            ->add("save", SubmitType::Class)
            ->getForm();

        $form->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            // ... adding the name field if needed
        });

    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class'=>Job::class,));
    }


}