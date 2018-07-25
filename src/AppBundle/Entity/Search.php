<?php

namespace AppBundle\Entity;  
use Symfony\Component\Validator\Constraints as Assert;
class Search
{
    protected $model;
    protected $modellist;
    protected $mark;
    protected $marklist;
    protected $pricefrom;
    protected $priceto;
    protected $enginea;
    protected $engineb;
    protected $power;
    protected $yearfrom;
    protected $yearto;
    protected $enginetype;
    protected $bodytype;
    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model= $model;
    }
    
        public function getModellist()
    {
        return $this->modellist;
    }

    public function setModellist($modellist)
    {
        $this->modellist= $modellist;
    }
    
         public function getMarklist()
    {
        return $this->marklist;
    }

    public function setMarklist($marklist)
    {
        $this->marklist= $marklist;
    }
    
      public function getMark()
    {
        return $this->mark;
    }

    public function setMark($mark)
    {
        $this->mark = $mark;
    }

    public function getYearfrom()
    {
        return $this->yearfrom;
    }

    public function setYearfrom($yearfrom)
    {
        $this->yearfrom = $yearfrom;
    }
       public function getYearto()
    {
        return $this->yearto;
    }

    public function setYearto($yearto)
    {
        $this->yearto = $yearto;
    }
      public function getPricefrom()
    {
        return $this->pricefrom;
    }

    public function setPricefrom($pricefrom)
    {
        $this->pricefrom= $pricefrom;
    }
      public function getPriceto()
    {
        return $this->priceto;
    }

    public function setPriceto($priceto)
    {
        $this->priceto= $priceto;
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
         public function getbodytype()
    {
        return $this->bodytype;
    }

    public function setbodytype($bodytype)
    {
        $this->bodytype = $bodytype;
    }
}