<?php
// Creates a stringbuilder
class StringBuilder extends b
{
  // Variables.
  private $buffer;
  private $length;
	
  // Properties.
  public function set_buffer($_value) { $this->buffer = $_value; } 
  public function get_buffer() { return $this->buffer; }
	
  public function set_length($_value) { $this->length = $_value; } 
  public function get_length() { return $this->length; }
	
  // The constructor.
  public function __construct()
  { 
    $this->buffer = array(); 
    $this->length = 0;
  }
	
  // The destructor.
  public function __destruct()
  { 
    unset($this->buffer);
    $this->length = 0;
  }
	
  // Append to a string
  private function append($_args)
  {
    foreach($_args as $arg)
    {
      array_push($this->buffer, $arg);
      $this->length += strlen($arg); 
    }
  }
	
  // Adds to the front of the string
  private function prepend($_args)
  {
    $_args = array_reverse($_args);
    foreach($_args as $arg)
    {
      array_unshift($this->buffer, $arg);
      $this->length += strlen($arg); 
    }
  }
 
  // Builds the string from array.
  private function tostring()
  {
    return implode('', $this->buffer);
  }
	
  // Append and format a string.
  private function appendformat($_args)
  {
    // Start Count
    $count = -1;
		
    $format = array_shift($_args);
		
    foreach($_args as $arg)
    {
      $format = preg_replace('#\{' . ($count+=1) . '\}#', $arg, $format);
    }
		
    array_push($this->buffer, $format);
    $this->length += strlen($format); 
  }
	
  // Inserts a string into the stringbuilder substr_replace($orig_string, $insert_string, $position, 0)
  private function insert($_args)
  {
    $string = $this->tostring();
    $stringlength = $this->length;
    $this->clear();
    $string = substr_replace($string, $_args[0], $_args[1], 0);
    array_push($this->buffer, $string);
    $this->length += strlen($string); 
  }
	
  // Replaces the string with something else.
  private function replace($_args)
  {
    $string = $this->tostring();
    $stringlength = $this->length;
    $this->clear();
    $string = str_replace($_args[0], $_args[1], $string);
    array_push($this->buffer, $string);
    $this->length += strlen($string); 
  }
	
  // Clears the stringbuilder.
  private function clear()
  {
    $this->buffer = array();
    $this->length = 0;
  }
	
  // Dynamic method calling with unlimited parameters.
  public function __call($_method, $_args)
  {
    return (method_exists($this, $_method)) ? $this->$_method($_args) : null;
  }
}

class b {

  private $str;
  public function set_buffer($_value) { $this->str = $_value; } 
  public function get_buffer() { return $this->str; }

}
?>