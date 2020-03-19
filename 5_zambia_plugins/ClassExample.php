<?php

/**
 * Class example
 * 
 */

// We create a class named "MetaCountry"
class MetaCountry
{


  private $_name;
  private $_currency;
  private $_flag;
  private $_capital;
  private $_subregion;
  private $_nativeLanguage;
  private $_area;

  public $welcome_msg = "Welcome";
        
  // We declare a method for the sole purpose to display a text.
  public function DefineCountry() {
    echo ('I am a country!');
    echo ('<br>');
  }

  public function WelcomeEnglish(){
        return $this->welcome_msg;
    }
 
  public function WelcomeFrench(){
        $welcome_msg = 'Bienvenue';
        return $welcome_msg;
    }

}//EOC

//Instantiate the Class in an object named $country
$country = new MetaCountry;

// Look for the object $country and invokes the method Define() on this object
$country->DefineCountry();



// echo $country->welcome_msg;
// You can apply method to this object like we did previously
// echo $country->WelcomeEnglish();
// echo $country->WelcomeFrench();


?>