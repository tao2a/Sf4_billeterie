<?php
/**
 * Created by PhpStorm.
 * User: auccia
 * Date: 03/12/2017
 * Time: 04:30
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civilities', ChoiceType::class, array(
                'choices'  => array(
                    'Mme' => null,
                    'Mr' => true,
                )))
            ->add('name', TextType::class)
            ->add('firstName', TextType::class)
            ->add('birthDate', DateType::class)
            ->add('specialRate', CheckboxType::class, array('required' => false))
            ->add('country', CountryType::class, array());
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\Entity\Ticket',
        ));
    }

}

