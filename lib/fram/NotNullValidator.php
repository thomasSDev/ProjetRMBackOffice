<?php
namespace fram;
 
class NotNullValidator extends Validator
{
  public function isValid($value)
  {
    return $value != '';
  }
}