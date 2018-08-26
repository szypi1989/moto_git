<?php

namespace AppBundle\Service\Show\View;

use AppBundle\Service\Show\View\CarsInfo;
use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\ORM\EntityManager;

// class retrieving information about the user of the given ad
// class injects a service that retrieves information about the advertisement
class UserAdvert {

    protected $requestStack;
    protected $carsinfo;
    public $carsdata;
    protected $idinfo;
    public $entityManager;

    public function __construct(EntityManager $em, CarsInfo $carsinfo) {
        $this->carsinfo = $carsinfo;
        $this->entityManager=$em;
    }
    
    // retrieve information about the car's data and its user
    public function getInfoAdvert() {
        $this->carsdata = $this->generateCarsInfo();
        $this->iduser = $this->getId();
        return $this;
    }
    
    // download the user's advertisement id
    public function getId() {
        foreach ($this->generateCarsInfo() as $prop) {
            $id_user = $prop->getId_user() . "\n";
        }
        return $id_user;
    }
    
    // generate information about the car
    public function generateCarsInfo() {
        return $this->carsinfo->generateResultToId();
    }
    
    // get user information
    public function getUserInfo() {
        return $this->entityManager->getRepository('AppBundle:Userinfo')->findOneBy((array('id_user' => $this->getId())));
    }
}
