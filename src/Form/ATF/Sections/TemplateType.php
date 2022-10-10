<?php

namespace App\Form\ATF\Sections;

use App\Form\Embedded\TypeOfApplicationType;
use App\Service\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TemplateType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('', TypeOfApplicationType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $options = Options::DEFAULT_ASSESSMENT_OPTIONS;
        $options['inherit_data'] = true;
        $resolver->setDefaults($options);
    }

}