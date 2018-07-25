<?php
namespace AppBundle\Listener ;
//use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
class Inf_add_advert {
    
    protected $mailer;
    protected $entity_manager;
    protected $user;
    
    public function __construct(\Swift_Mailer $mailer, EntityManagerInterface $entityManager,TokenStorageInterface $tokenStorage)
    {
        $this->mailer = $mailer;
        $this->entity_manager = $entityManager;
        $this->user = $tokenStorage->getToken()->getUser();
    }
    public function Call_raport(Event $event)
    {     
        $status= $this->entity_manager->getRepository('AppBundle:User')->findOneBy(array('id' => $this->user->getId()));
        $message = (new \Swift_Message('Aktualizacja ogłoszenia :'.$event->getMark().":".$event->getModel()))
        ->setTo($status->getEmail())
        ->setBody("Aktualizowałeś ogłoszenie do giełdy samochodowej : ".$event->getMark().":".$event->getModel()." Więcej szczegółów na stronie S-MOTO");
        $this->mailer->send($message);
    }
    
}