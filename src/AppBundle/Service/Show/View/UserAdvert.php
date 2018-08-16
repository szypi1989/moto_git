<?php

namespace AppBundle\Service\Show\View;

use AppBundle\Service\Show\View\CarsInfo;
use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\ORM\EntityManager;

class UserAdvert {

    protected $requestStack;
    protected $carsinfo;
    protected $carsdata;
    protected $idinfo;
    public $entityManager;

    public function __construct(EntityManager $em, CarsInfo $carsinfo) {
        $this->carsinfo = $carsinfo;
        $this->entityManager=$em;
    }

    public function getInfoAdvert() {
        $this->carsdata = $this->generateCarsInfo();
        $this->iduser = $this->getId();
        return $this;
    }

    public function getId() {
        foreach ($this->generateCarsInfo() as $prop) {
            $id_user = $prop->getId_user() . "\n";
        }
        return $id_user;
    }

    public function generateCarsInfo() {
        return $this->carsinfo->generateResultToId();
    }

    public function getUserInfo() {
        return $this->entityManager->getRepository('AppBundle:Userinfo')->findOneBy((array('id_user' => $this->getId())));
    }

    public function getUserAdd() {
        return $this->entityManager->getRepository('AppBundle:User')->findOneBy((array('id' => $this->getId())));
    }

}
