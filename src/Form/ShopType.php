<?php

namespace App\Form;

use App\Entity\Shop;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ShopType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Shop name',
                'constraints' => [
                    new NotBlank(['message' => 'Shop name cannot be empty.']),
                    new Length(['min' => 3, 'max' => 100]),
                ],
            ])
            ->add('ownername', TextType::class, [
                'label' => 'Owner name',
                'constraints' => [
                    new NotBlank(['message' => 'Owner name cannot be empty.']),
                    new Length(['min' => 3, 'max' => 100]),
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'constraints' => [
                    new NotBlank(['message' => 'Email cannot be empty.']),
                    new Length(['min' => 3, 'max' => 254]),
                ],
            ])
            ->add('phone', TextType::class, [
                'label' => 'Shop phone number',
                'constraints' => [
                    new NotBlank(['message' => 'Phone number cannot be empty.']),
                    new Length(['min' => 3, 'max' => 50]),
                ],
            ])
            ->add('address', TextType::class, [
                'label' => 'Street address',
                'constraints' => [
                    new NotBlank(['message' => 'Address cannot be empty.']),
                    new Length(['min' => 3, 'max' => 60]),
                ],
            ])
            ->add('city', TextType::class, [
                'label' => 'City',
                'constraints' => [
                    new NotBlank(['message' => 'City cannot be empty.']),
                    new Length(['min' => 3, 'max' => 50]),
                ],
            ])
            ->add('zip', NumberType::class, [
                'label' => 'Zip code',
                'constraints' => [
                    new NotBlank(['message' => 'Zip cannot be empty.']),
                    new Length(['min' => 3, 'max' => 10]),
                ],
            ])
            ->add('ownDeliverySystem', CheckboxType::class, [
                'label' => 'Own delivery system'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Shop::class,
        ]);
    }
}
