<?php
namespace fram;
 
class DateField extends Field
{
  //protected $maxLength;
 
  public function buildWidget()
  {
    $widget = '';
 
    if (!empty($this->errorMessage))
    {
      $widget .= $this->errorMessage.'<br />';
    }
 
    $widget .= '<label>'.$this->label.'</label><br /><input type="datetime-local" name=" '.$this->name.'"';
 
    if (!empty($this->value))
    {
      $widget .= ' value="'.strtotime($this->value).'" ';
    }
 
    return $widget .= ' />';
  }
 
}