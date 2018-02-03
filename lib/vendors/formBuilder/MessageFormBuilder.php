<?php
namespace formBuilder;
 
use \fram\FormBuilder;
use \fram\StringField;
use \fram\TextField;
use \fram\MaxLengthValidator;
use \fram\MinLengthValidator;
use \fram\NotNullValidator;
 
class MessageFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->form->add(new StringField([
        'label' => 'typeDemande',
        'name' => 'typeDemande',
        'maxLength' => 50,
        'validators' => [
          new MaxLengthValidator('<div class="alert alert-danger" role="alert">Le type de demande spécifié est trop long (50 caractères maximum)</div>', 50),
          new NotNullValidator('<div class="alert alert-danger" role="alert">Merci de spécifier le type de demande</div>'),
        ],
       ]))
    ->add(new StringField([
        'label' => 'typeIntervention',
        'name' => 'typeIntervention',
        'maxLength' => 500,
        'validators' => [
          new MaxLengthValidator('<div class="alert alert-danger" role="alert">Le type d\'intervention spécifié est trop long (100 caractères maximum)</div>', 500),
          new NotNullValidator('<div class="alert alert-danger" role="alert">Merci de spécifier le type d\'intervention</div>'),
        ],
       ]))
    ->add(new StringField([
        'label' => 'message',
        'name' => 'message',
        'maxLength' => 5000,
        'validators' => [
          new MaxLengthValidator('<div class="alert alert-danger" role="alert">Le message spécifié est trop long (150 caractères maximum)</div>', 5000),
          new NotNullValidator('<div class="alert alert-danger" role="alert">Merci de spécifier le message du client</div>'),
        ],
       ]))
    ->add(new StringField([
        'label' => 'idClient',
        'name' => 'idClient',
        'maxLength' => 10,
        'validators' => [
          new MaxLengthValidator('<div class="alert alert-danger" role="alert">L\'idClient spécifié est trop long</div>', 10),
          new NotNullValidator('<div class="alert alert-danger" role="alert">Merci de spécifier l\'idClient du message</div>'),
        ],
       ]))
    ->add(new StringField([
        'label' => 'demandeTraitee',
        'name' => 'demandeTraitee',
        'validators' => [
          new NotNullValidator('<div class="alert alert-danger" role="alert">Merci de spécifier si la demande est traitée ou non</div>'),
        ],
       ]));

       
  }
}