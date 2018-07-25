<?php

namespace AppBundle\Entity;  

class Profileinfo
{
    protected $address;
    protected $phonenumber;

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address= $address;
    }
    
       public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber= $phonenumber;
    }
}