<?php

namespace AppBundle\Service\Edit\Append;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Cars;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Service\Edit\Append\ImageMd;

// class creates actions that add an advertisement to the database
class PushSql {

    protected $entityManager;
    private $requestStack;
    protected $user_active;
    protected $imagemd;

    public function __construct(EntityManager $em, RequestStack $requestStack, ContainerInterface $container, ImageMd $imagemd) {
        $this->entityManager = $em;
        $this->requestStack = $requestStack;
        $this->user_active = $container->get('security.token_storage')->getToken()->getUser();
        $this->imagemd = $imagemd;
    }

    // create actions from the request data that causes adding the announcement from dathch to the database
    // use the imagmd class to create car photo files and verify them
    public function pushCars() {
        $cars = new Cars();
        $cars->setModel($this->requestStack->getCurrentRequest()->request->get('form')['model']);
        $cars->setMark($this->requestStack->getCurrentRequest()->request->get('form')['mark']);
        $cars->setPrice((integer) $this->requestStack->getCurrentRequest()->request->get('form')['price']);
        $cars->setPower((integer) $this->requestStack->getCurrentRequest()->request->get('form')['power']);
        $cars->setEngine($this->requestStack->getCurrentRequest()->request->get('form')['enginea'] . "." . $this->requestStack->getCurrentRequest()->request->get('form')['engineb']);
        $cars->setEnginetype($this->requestStack->getCurrentRequest()->request->get('form')['enginetype']);
        $cars->setYear($this->requestStack->getCurrentRequest()->request->get('form')['year']);
        $cars->setBodytype($this->requestStack->getCurrentRequest()->request->get('form')['bodytype']);
        $cars->setYear($this->requestStack->getCurrentRequest()->request->get('form')['year']);
        $cars->setDescription($this->requestStack->getCurrentRequest()->request->get('form')['description']);
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
