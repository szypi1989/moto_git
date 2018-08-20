<?php

namespace AppBundle\Service\User\Profileinfo;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Userinfo;

class ProfileSql {

    protected $entityManager;
    protected $requestStack;
    protected $user_active;
    protected $userinfo;

    public function __construct(EntityManager $em, RequestStack $requestStack, ContainerInterface $container, Userinfo $userinfo) {
        $this->entityManager = $em;
        $this->userinfo = $userinfo;
        $this->requestStack = $requestStack;
        $this->user_active = $container->get('security.token_storage')->getToken()->getUser();
    }
    
    // Edits user information
    public function EditInfo() {
        // check if the object (record) pointing to this user already exists in the database
        if (!is_object($this->getUserEntity())) {
            $this->userinfo->setId_user($this->user_active->getId());
        }else{
        $this->userinfo=$this->getUserEntity();   
        }
        $this->userinfo->setAddress($this->requestStack->getCurrentRequest()->request->get('form')['address']);
        $this->userinfo->setPhone_number($this->requestStack->getCurrentRequest()->request->get('form')['phonenumber']);
        $this->entityManager->persist($this->userinfo);
        $this->entityManager->flush();
    }
    
    // get the object for the selected user's id if it does not exist returns NULL
    public function getUserEntity() {
        return $this->entityManager->getRepository('AppBundle:Userinfo')->findOneBy(array('id_user' => $this->user_active->getId()));
    }

}
