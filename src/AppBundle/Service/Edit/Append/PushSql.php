<?php

namespace AppBundle\Service\Edit\Append;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Cars;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface;
// class creates actions that add an advertisement to the database
class PushSql {

    public $entityManager;
    public $user_active;
    public $imagemd;
    public $container;
    public $reqdataappend;

    // Inf_add_advert = object listener event that sends an email confirming the update of the advertisement
    // imagemd = management object uploaded
    // reqdataappend = managment object request

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->entityManager = $this->container->get('doctrine.orm.entity_manager');
        $this->user_active = $container->get('security.token_storage')->getToken()->getUser();
        $this->imagemd = $this->container->get(ImageMd::Class);
        $this->reqdataappend = $this->container->get(ReqDataAppend::Class);
    }

    // create actions from the request data that causes adding the announcement from dathch to the database
    // use the imagmd class to create car photo files and verify them
    public function pushCars() {
        $cars = new Cars();
        $cars->setModel($this->reqdataappend->data['model']);
        $cars->setMark($this->reqdataappend->data['mark']);
        $cars->setPrice($this->reqdataappend->data['price']);
        $cars->setPower((integer) $this->reqdataappend->data['power']);
        $cars->setEngine($this->reqdataappend->data['enginea'] . "." . $this->reqdataappend->data['engineb']);
        $cars->setEnginetype($this->reqdataappend->data['enginetype']);
        $cars->setYear($this->reqdataappend->data['year']);
        $cars->setBodytype($this->reqdataappend->data['bodytype']);
        $cars->setDescription($this->reqdataappend->data['description']);
        $cars->setId_user($this->user_active->getId());
        $this->entityManager->persist($cars);
        try {
            $this->entityManager->flush();
        } catch (Exception $ex) {
            return false;
        }
        // create photos when adding data to the database correctly   
        $this->imagemd->CreateImgMsg($cars->getId());
        return $cars;
    }

    // gets the object responsible for uploading photos
    public function getImagemd() {
        return $this->imagemd;
    }

}
