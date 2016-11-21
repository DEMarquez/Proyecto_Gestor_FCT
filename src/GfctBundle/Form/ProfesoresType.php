<?php

namespace GfctBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;

class ProfesoresType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',TextType::class,array('label'=>'Nombre',
                                                 'label_attr'=>array('class' => 'etiqueta'),
                                                 'attr' => array('class' => 'etiqueta_elemento')))
            ->add('apellidos',TextType::class,array('label'=>'Nombre',
                                                 'label_attr'=>array('class' => 'etiqueta'),
                                                 'attr' => array('class' => 'etiqueta_elemento')))
            ->add('departamento',TextType::class,array('label'=>'Nombre',
                                                 'label_attr'=>array('class' => 'etiqueta'),
                                                 'attr' => array('class' => 'etiqueta_elemento')))
            ->add('guardar',SubmitType::class,array('label'=>'Salvar'))
            ->add('borrar',ResetType::class,array('label'=>'Borrar'))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GfctBundle\Entity\Profesores'
        ));
    }
}
