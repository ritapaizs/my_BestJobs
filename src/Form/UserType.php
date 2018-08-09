<?php
/**
 * Created by PhpStorm.
 * User: Rita
 * Date: 8/9/2018
 * Time: 9:25 AM
 */

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class,
             [
                'attr' => [
                    'placeholder' => 'Introduceti adresa de e-mail'
                  ],
            ]
                )
            ->add('username', TextType::class,
                [
                    'attr' => [
                        'placeholder' => 'Introduceti un username'
                    ],
                ]
                )
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array(
                    'label' => 'Password',

                        'attr' => [
                            'placeholder' => 'Introduceti parola'
                        ],

                ),
                'second_options' => array(
                    'label' => 'Repeat Password',

                        'attr' => [
                            'placeholder' => 'repetati parola'
                        ],

                ),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}