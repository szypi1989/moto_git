<?php
namespace AppBundle\Service;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;

class CarsEvent extends Event{
    
    protected $entity_object;
    public function __construct($entity_object)
    {
        $this->entity_object = $entity_object;
    }
    
    public function getEntity()
    {
        return $this->entity_object;
    }
    public function __call($name, $arguments)
    {
    $this->entity_object->$name();
    }
}