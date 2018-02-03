<?php
namespace formBuilder;
 
use \fram\FormBuilder;
use \fram\StringField;
use \fram\TextField;
use \fram\MaxLengthValidator;
use \fram\MinLengthValidator;
use \fram\NotNullValidator;
 
class ClientFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->form->add(new StringField([
        'label' => 'Nom',
        'name' => 'nom',
        'maxLength' => 50,
        'validators' => [
          new MaxLengthValidator('<div class="alert alert-danger" role="alert">Le nom spécifié est trop long (50 caractères maximum)</div>', 50),
          new NotNullValidator('<div class="alert alert-danger" role="alert">Merci de spécifier le nom du client</div>'),
        ],
       ]))
    ->add(new StringField([
        'label' => 'Prénom',
        'name' => 'prenom',
        'maxLength' => 50,
        'validators' => [
          new MaxLengthValidator('<div class="alert alert-danger" role="alert">Le prénom spécifié est trop long (50 caractères maximum)</div>', 50),
          new NotNullValidator('<div class="alert alert-danger" role="alert">Merci de spécifier le prénom du client</div>'),
        ],
       ]))
    ->add(new StringField([
        'label' => 'Adresse',
        'name' => 'adresse',
        'maxLength' => 150,
        'validators' => [
          new MaxLengthValidator('<div class="alert alert-danger" role="alert">L\'adresse spécifié est trop long (150 caractères maximum)</div>', 150),
          new NotNullValidator('<div class="alert alert-danger" role="alert">Merci de spécifier l\'adresse du client</div>'),
        ],
       ]))
    ->add(new StringField([
        'label' => 'Code postal',
        'name' => 'cp',
        'minLength' => 5,
        'maxLength' => 5,
        'validators' => [
          new MinLengthValidator('<div class="alert alert-danger" role="alert">Le code postal spécifié est trop court (saisissez un code postal à 5 caractères)</div>', 5),
          new MaxLengthValidator('<div class="alert alert-danger" role="alert">Le code postal spécifié est trop long (saisissez un code postal à 5 caractères)</div>', 5),
          new NotNullValidator('<div class="alert alert-danger" role="alert">Merci de spécifier le code postal du client</div>'),
        ],
       ]))
    ->add(new StringField([
        'label' => 'Ville',
        'name' => 'ville',
        'maxLength' => 50,
        'validators' => [
          new MaxLengthValidator('<div class="alert alert-danger" role="alert">La ville spécifié est trop long (50 caractères maximum)</div>', 50),
          new NotNullValidator('<div class="alert alert-danger" role="alert">Merci de spécifier la ville du client</div>'),
        ],
       ]))
    ->add(new StringField([
        'label' => 'Téléphone',
        'name' => 'tel',
        'minLength' => 10,
        'maxLength' => 16,
        'validators' => [
          new MinLengthValidator('<div class="alert alert-danger" role="alert">Le téléphone spécifié est trop court (saisissez un numéro à 10 chiffres minimum)</div>', 10),
          new MaxLengthValidator('<div class="alert alert-danger" role="alert">Le téléphone spécifié est trop long (saisissez un numéro à 16 chiffres maximum)</div>', 16),
          new NotNullValidator('<div class="alert alert-danger" role="alert">Merci de spécifier le nom du client</div>'),
        ],
       ]))
    ->add(new StringField([
        'label' => 'Mail',
        'name' => 'mail',
        'maxLength' => 100,
        'validators' => [
          new MaxLengthValidator('<div class="alert alert-danger" role="alert">Le mail spécifié est trop long (50 caractères maximum)</div>', 100),
          new NotNullValidator('<div class="alert alert-danger" role="alert">Merci de spécifier le mail du client</div>'),
        ],
       ]));

       
  }
}