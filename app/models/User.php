<?php


class User 
{
   public $username = "default name";
   protected $sex;
   private $age = 22;

  public function getAge(){
      return $this->$age;
   }
   public function setAge($age){
       $this->age = $age;
   }
}

$user = new User;

