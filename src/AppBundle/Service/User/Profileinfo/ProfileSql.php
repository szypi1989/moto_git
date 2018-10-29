<?php

namespace AppBundle\Service\User\Profileinfo;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Userinfo;

// object managing user settings

class ProfileSql {

    public $entityManager;
    public $user_active;
    public $userinfo;
    public $reqdataprofile;
    public $container;

    public function __construct(ContainerInterface $container, Userinfo $userinfo) {
        $this->container = $container;
        $this->entityManager = $this->container->get('doctrine.orm.entity_manager');
        $this->userinfo = $userinfo;
        $this->user_active = $container->get('security.token_storage')->getToken()->getUser();
        $this->reqdataprofile = $this->container->get(ReqDataProfile::Class);
    }

    // Edits user information
    public function EditInfo() {
        // check if the object (record) pointing to this user already exists in the database
        if (!is_object($this->getUserEntity())) {
            $this->userinfo->setId_user($this->user_active->getId());
        } else {
            $this->userinfo = $this->getUserEntity();
        }
        $this->userinfo->setAddress($this->reqdataprofile->data['address']);
        $this->userinfo->setPhone_number($this->reqdataprofile->data['phonenumber']);
        $this->entityManager->persist($this->userinfo);
        $this->entityManager->flush();
    }

    // get the object for the selected user's id if it does not exist returns NULL
    public function getUserEntity() {
        return $this->entityManager->getRepository('AppBundle:Userinfo')->findOneBy(array('id_user' => $this->user_active->getId()));
    }

}
