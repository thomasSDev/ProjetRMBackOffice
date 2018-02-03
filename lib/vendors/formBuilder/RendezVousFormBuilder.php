<?php
namespace formBuilder;
 
use \fram\FormBuilder;
use \fram\DateField;
use \fram\StringField;
use \fram\TextField;
use \fram\MaxLengthValidator;
use \fram\NotNullValidator;
 
class RendezVousFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->form->add(new DateField([
        'label' => 'Date et heure du rendez-vous',
        'name' => 'dateHeure',
       ]))
    ->add(new StringField([
        'label' => 'Type d\'intervention',
        'name' => 'typeIntervention',
        'maxLength' => 50,
        'validators' => [
          new MaxLengthValidator('<div class="alert alert-danger" role="alert">Le type d\'intervention spécifié est trop long (50 caractères maximum)</div>', 50),
          new NotNullValidator('<div class="alert alert-danger" role="alert">Merci de spécifier le type d\'intervention</div>'),
        ],
       ]))
    ->add(new TextField([
        'label' => 'Commentaire',
        'name' => 'commentaire',
        'maxLength' => 1000,
        'validators' => [
          new MaxLengthValidator('<div class="alert alert-danger" role="alert">Le commentaire spécifié est trop long (1000 caractères maximum)</div>', 1000),
      	],
          
       ]));
}

       
  }