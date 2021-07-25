<?php


abstract class Student
{
    protected $name;
    final public function setName($name){
         $this->name=$name;
    }
    abstract  public function getName();
}