<?php

namespace AppBundle\Service\Edit\Append;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Cars;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ImageMd {

    protected $entityManager;
    private $requestStack;
    protected $user_active;
    protected $container;
    public $errmove = array();

    public function __construct(EntityManager $em, RequestStack $requestStack, ContainerInterface $container) {
        $this->entityManager = $em;
        $this->requestStack = $requestStack;
        $this->container = $container;
        $this->user_active = $container->get('security.token_storage')->getToken()->getUser();
    }

    public function CreateFileAwatar($id) {
        $val_errors = null;
        //$entities = $this->entityManager->getRepository('AppBundle:Cars')->findAll();
        try {
            rename($this->requestStack->getCurrentRequest()->files->get('form')['avatar']->getPathname(), "../web/images/" .$id . '.jpg');
        } catch (Exception $e) {
            $this->errmove['upload']['fail'] = "nie można przenieść zdjęć na serwer !!!";
        }
        return $this;
    }

    public function sortFileImg() {
        if (isset($this->requestStack->getCurrentRequest()->files->get('form')['image'])) {
            if (!is_dir("../web/images/" . count($entities))) {
                if (mkdir("../web/images/" . count($entities), 777)) {
                    chmod("../web/images/" . count($entities), 0777);
                    $arr = $this->requestStack->getCurrentRequest()->files->get('form')['image'];
                    foreach ($arr as $key => $value) {
                        try {
                            if (!empty($value)) {
                                rename($value->getPathname(), "../web/images/" . count($entities) . "/" . $key . '.jpg');
                            }
                        } catch (Exception $e) {
                            $this->errmove['upload']['fail'] = "nie można przenieść zdjęć na serwer !!!";
                        }
                    }
                } else {
                    $this->errmove['upload']['fail'] = "nie można przenieść zdjęć na serwer !!!";
                }
            } else {
                chmod("../web/images/" . count($entities), 0777);
                $arr = $this->requestStack->getCurrentRequest()->files->get('form')['image'];
                foreach ($arr as $key => $value) {
                    try {
                        if (!empty($value)) {
                            rename($value->getPathname(), "../web/images/" . count($entities) . "/" . $key . '.jpg');
                        }
                    } catch (Exception $e) {
                        $this->errmove['upload']['fail'] = "nie można przenieść zdjęć na serwer !!!";
                    }
                }
            }
        }
        return $this;
    }

    public function isErrors() {
        if (in_array(true, $this->errmove)) {
            return true;
        }
        return false;
    }

    public function getErrors() {
        return $this->errmove;
    }

}
