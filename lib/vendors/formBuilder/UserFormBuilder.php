<?php
namespace formBuilder;
 
use \fram\FormBuilder;
use \fram\StringField;
use \fram\TextField;
use \fram\MaxLengthValidator;
use \fram\NotNullValidator;
 
class UserFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->form->add(new StringField([
        'label' => 'pseudo',
        'name' => 'pseudo',
        'maxLength' => 50,
        'validators' => [
          new MaxLengthValidator('<div class="alert alert-danger" role="alert">Le pseudo spécifié est trop long (50 caractères maximum)</div>', 50),
          new NotNullValidator('<div class="alert alert-danger" role="alert">Merci de spécifier le pseudo</div>'),
        ],
       ]))
       ->add(new TextField([
        'label' => 'Passe',
        'name' => 'passe',
        'validators' => [
          new NotNullValidator('<div class="alert alert-danger" role="alert">Merci d\'entrer un mot de passe</div>'),
        ],
       ]));
  }
}