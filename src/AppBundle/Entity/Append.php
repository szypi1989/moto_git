<?php

namespace AppBundle\Entity;  
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
class Append
{
    protected $model;
    protected $mark;
    protected $modellisted;
    protected $marklisted;
    protected $price;
    protected $enginea;
    protected $engineb;
    protected $power;
    protected $year;
    protected $enginetype;
    protected $bodytype;
    protected $description;
    protected $image;
    protected $avatar;
    protected $deleteimage;
    
    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model= $model;
    }
      public function getMark()
    {
        return $this->mark;
    }

    public function setMark($mark)
    {
        $this->mark = $mark;
    }
       public function getModellisted()
    {
        return $this->modellisted;
    }

    public function setModellisted($modellisted)
    {
        $this->modellisted= $modellisted;
    }
    
         public function getMarklisted()
    {
        return $this->marklisted;
    }

    public function setMarklisted($marklisted)
    {
        $this->marklisted= $marklisted;
    }
    
    public function getYear()
    {
        return $this->year;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }
 
      public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price= $price;
    }
    public function getEnginea()
    {
        return $this->enginea;
    }

    public function setEnginea($enginea)
    {
        $this->enginea = $enginea;
    }
      public function getEngineb()
    {
        return $this->engineb;
    }

    public function setEngineb($engineb)
    {
        $this->engineb = $engineb;
    }
         
           public function getPower()
    {
        return $this->power;
    }
      public function setPower($power)
    {
        $this->power = $power;
    }
          public function getEngineType()
    {
        return $this->enginetype;
    }

    public function setEngineType($enginetype)
    {
        $this->enginetype = $enginetype;
    }
         public function getBodytype()
    {
        return $this->bodytype;
    }

    public function setBodytype($bodytype)
    {
        $this->bodytype = $bodytype;
    }
    public function getDescription()
    {
    return $this->description;
    }

    public function setDescription($description)
    {
    $this->description = $description;
    }
    public function getAvatar()
    {   
    return $this->avatar;
    }

    public function setAvatar($avatar)
    {
    $this->avatar = $avatar;
    }
       public function getImage()
    {   
    return $this->image;
    }

    public function setImage($image)
    {
    $this->image = $image;
    }
        public function getDeleteimage()
    {   
    return $this->deleteimage;
    }

    public function setDeleteimage($deleteimage)
    {
    $this->deleteimage = $deleteimage;
    }
}