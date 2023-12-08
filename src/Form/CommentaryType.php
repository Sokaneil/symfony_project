<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\User;
use App\Entity\Commentary;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentaryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content')
            ->add('date_publication')
            ->add('author', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'name',
                ])
            ->add('article', EntityType::class, [
                'class' => Article::class,
                'choice_label' => 'title', 
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commentary::class,
        ]);
    }
}
