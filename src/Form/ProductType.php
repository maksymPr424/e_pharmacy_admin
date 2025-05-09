<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Shop;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Product name',
                'constraints' => [
                    new NotBlank(['message' => 'Name cannot be empty.']),
                    new Length(['min' => 3, 'max' => 50]),
                ],
            ])
            ->add('price', NumberType::class, [
                'label' => 'Price',
                'constraints' => [
                    new NotBlank(['message' => 'Price cannot be empty.']),
                    new Length(['min' => 1, 'max' => 20]),
                ],
            ])
            ->add('description', TextType::class, [
                'label' => 'Description',
                'constraints' => [
                    new NotBlank(['message' => 'Description cannot be empty.']),
                    new Length(['min' => 3, 'max' => 3000]),
                ],
            ])
            ->add('photo')
            ->add('stock',  NumberType::class, [
                'label' => 'Stock',
                'constraints' => [
                    new NotBlank(['message' => 'Stock cannot be empty.']),
                    new Length(['min' => 0, 'max' => 20]),
                ],
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
