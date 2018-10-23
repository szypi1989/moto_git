<?php

namespace AppBundle\Service\Edit\Edit;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Cars;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;
use AppBundle\Service\Edit\Edit\ImageMdE;
use AppBundle\Listener\Inf_add_advert;
use AppBundle\Service\CarsEvent;

class PushSqlE {

    protected $entityManager;
    private $requestStack;
    protected $user_active;
    protected $imagemd;
    protected $id_add;
    protected $infaddadvert;

    //Inf_add_advert = object listener event that sends an email confirming the update of the advertisement
    public function __construct(EntityManager $em, RequestStack $requestStack, ContainerInterface $container, ImageMdE $imagemd, Inf_add_advert $inf_add_advert) {
        $this->entityManager = $em;
        $this->requestStack = $requestStack;
        $this->user_active = $container->get('security.token_storage')->getToken()->getUser();
        $this->imagemd = $imagemd;
        $this->id_add = $this->requestStack->getCurrentRequest()->attributes->get('id_add');
        $this->infaddadvert = $inf_add_advert;
    }

    // create actions from the request data that causes adding the announcement from dathch to the database
    // use the imagmd class to create car photo files and verify them
    public function pushCars() {
        $cars = $this->entityManager->getRepository('AppBundle:Cars')->findOneBy(array('id' => $this->id_add));
        if ($cars) {
            try {
                $cars->setModel($this->reqdataappend->data['model']);
                $cars->setMark($this->reqdataappend->data['mark']);
                $cars->setPrice((integer)$this->reqdataappend->data['price']);
                $cars->setPower((integer)$this->reqdataappend->data['power']);
                $cars->setEngine($this->reqdataappend->data['enginea'] . "." . $this->reqdataappend->data['engineb']);
                $cars->setEnginetype($this->reqdataappend->data['enginetype']);
                $cars->setYear($this->reqdataappend->data['year']);
                $cars->setBodytype($this->reqdataappend->data['bodytype']);
                $cars->setDescription($this->reqdataappend->data['description']);
                $cars->setId_user($this->user_active->getId());
                $this->entityManager->persist($cars);
                $this->entityManager->flush();
                //The {EventDispatcher} component launches an event when the ad is properly edited,
                // retrieving the record object, which is sent to the service managed 
                // by the event that sends the confirmation emily.
                $dispatcher = new EventDispatcher();
                $dispatcher->addListener('appbundle.callusers.action', array($this->infaddadvert, 'Call_raport'));
                $cars_event = new CarsEvent($cars);
                $dispatcher->dispatch('appbundle.callusers.action', $cars_event);
            } catch (Exception $e) {
                return false;
            }
            // deleting photo files via request
            $this->imagemd->deleteImages();
            // create photos when adding data to the database correctly   
            $this->imagemd->CreateImgMsg($cars->getId());
        }
    }

    // gets the object responsible for uploading photos
    public function getImagemd() {
        return $this->imagemd;
    }

}
