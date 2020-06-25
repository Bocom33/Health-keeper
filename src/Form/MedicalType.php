<?php


namespace App\Form;


use App\Entity\Annoyance;
use App\Entity\AnnoyanceZone;
use App\Entity\PainIntensity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MedicalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder
           ->add('annoyanceZone', EntityType::class, [
               'class'         => AnnoyanceZone::class,
               'choice_label' => 'name'
           ])
           ->add('annoyance', EntityType::class, [
               'class'         => Annoyance::class,
               'choice_label' => 'name',
               'label' => 'Ressentis'
           ])
           ->add('painIntensity', EntityType::class, [
               'class'         => PainIntensity::class,
               'choice_label' => 'level',
               'label' => 'intensité'
           ]);
    }

}
