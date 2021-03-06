<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Info;
use App\Entity\Keyword;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class InfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('createdAt', DateTimeType::class)
            ->add('subject', TextType::class)
            ->add('source', TextType::class)
            ->add('description', TextareaType::class)
            ->add('author', TextType::class)
            ->add('moreabout', TextareaType::class)
            ->add('categories',EntityType::class, [
                'by_reference' => false,
                'class' => Category::class,
                'choice_label' => 'name',
                'multiple'=>true,
                'expanded'=>true
            ])
            ->add('keywords',EntityType::class, [
                'by_reference' => false,
                'class' => Keyword::class,
                'choice_label' => 'name',
                'multiple'=>true,
                'expanded'=>true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Info::class,
        ]);
    }
}
