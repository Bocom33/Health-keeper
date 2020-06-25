<?php

namespace App\Form;

use App\Entity\MedicalRecord;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedicalRecordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('details', null, ['label' => 'Détails à ajouter'])
            ->add('painIntensity', null, ['label'=> 'Intensité'])
            ->add('annoyance', null, ['label' => 'Type de douleur'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MedicalRecord::class,
        ]);
    }
}
