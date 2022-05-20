<?php

namespace App\Form;

use App\Classe\SearchTypeActe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchTypeType extends AbstractType
{

    private $village;
    private $array = [];
    private $array2 = [];

    public function __construct()
    {
       /* $this->village = $repository->getListe();*/
        /*  foreach ($this->village as $p)
          {
              $this->array[] = $p['libelle'];
          }

          for ($i=0;$i<2;$i++)
          {
              $this->array2 = $this->array[$i];
          }*/
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

          /*  ->add('type', EntityType::class, [
                // looks for choices from this entity
                'label'=>false,
                'class' => TypeActe::class,

                // uses the User.username property as the visible option string
                'choice_label' => 'titre',

                // used to render a select box, check boxes or radios
                  'multiple' => true,
                 'expanded' => false,
                 'attr' => ['class' => 'custom-select select2 border-primary'],
            ])*/
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchTypeActe::class,
            'method' => 'GET',
            'crsf_protection' => false,
        ]);
    }

    public function getBlockPrefix()
    {
        return ""; // TODO: Change the autogenerated stub
    }

}
