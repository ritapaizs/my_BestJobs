<?php
/**
 * Created by PhpStorm.
 * User: Rita
 * Date: 8/7/2018
 * Time: 1:50 PM
 */

namespace App\Form;
use App\Model\JobSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class JobSearchType  extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('keyword', TextType::class,
            [
                'attr' => [
                    'id' => 'key',
                    'placeholder' => 'Cuvant cheie'
                ],
                'label' => false,
            ])
            ->add('cauta', SubmitType::class,
                [
                    'attr' => [
                        'id' => 'cauta',
                        'class' => 'fa fa-search btn btn-success p-x',
                    ],
                    'label' => false,
                ]
                );
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data class'=>JobSearch::class));
    }
}