<?php

namespace AppBundle\Service\Edit\Edit;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Cars;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;
use AppBundle\Listener\Inf_add_advert;
use AppBundle\Service\CarsEvent;

class PushSqlE {

    public $entityManager;
    public $user_active;
    public $imagemd;
    public $id_add;
    public $infaddadvert;
    public $reqdataedit;

    // Inf_add_advert = object listener event that sends an email confirming the update of the advertisement
    // imagemd = management object uploaded
    // reqdataedit = managment object request
    
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->entityManager = $this->container->get('doctrine.orm.entity_manager');
        $this->user_active = $container->get('security.token_storage')->getToken()->getUser();
        $this->imagemd = $this->container->get(ImageMdE::Class);
        $this->reqdataedit = $this->container->get(ReqDataEdit::Class);
        $this->infaddadvert = $this->container->get(Inf_add_advert::Class);
        $this->id_add = $this->reqdataedit->data['id_add'];
    }

    // create actions from the request data that causes adding the announcement from dathch to the database
    // use the imagmd class to create car photo files and verify them
    public function pushCars() {
        $cars = $this->entityManager->getRepository('AppBundle:Cars')->findOneBy(array('id' => $this->id_add));
        if ($cars) {
            try {
                $cars->setModel($this->reqdataedit->data['model']);
                $cars->setMark($this->reqdataedit->data['mark']);
                $cars->setPrice((integer) $this->reqdataedit->data['price']);
                $cars->setPower((integer) $this->reqdataedit->data['power']);
                $cars->setEngine($this->reqdataedit->data['enginea'] . "." . $this->reqdataedit->data['engineb']);
                $cars->setEnginetype($this->reqdataedit->data['enginetype']);
                $cars->setYear($this->reqdataedit->data['year']);
                $cars->setBodytype($this->reqdataedit->data['bodytype']);
                $cars->setDescription($this->reqdataedit->data['description']);
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
