<?php

namespace AppBundle\Service\Edit\Edit;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Cars;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ImageMdE {

    private $requestStack;
    protected $user_active;
    protected $id_add;
    public $errmove = array();
    public $files = array();

    public function __construct(RequestStack $requestStack, ContainerInterface $container) {
        $this->entityManager = $em;
        $this->requestStack = $requestStack;
        $this->user_active = $container->get('security.token_storage')->getToken()->getUser();
        $this->id_add = $this->requestStack->getCurrentRequest()->attributes->get('id_add');
    }

    public function CreateImgMsg($id) {
        $this->CreateAwatar($id);
        $this->CreateSortFilesImg($id);
        return $this;
    }

    //moves the main picture of the avatar according to id number of the advert added
    public function CreateAwatar($id) {
        if (isset($this->requestStack->getCurrentRequest()->files->get('form')['avatar'])) {
            try {
                rename($this->requestStack->getCurrentRequest()->files->get('form')['avatar']->getPathname(), "../web/images/" . $id . '.jpg');
            } catch (Exception $e) {
                $this->errmove['upload']['fail'] = "nie można przenieść zdjęć na serwer !!!";
            }
        }
        return $this;
    }

    //creates a folder for the selected photo id and takes photos there that were 
    //sort files after uploady photos
    public function CreateSortFilesImg($id) {
        $files1=null;
        if (isset($this->requestStack->getCurrentRequest()->files->get('form')['image'])) {
            if (!is_dir("../web/images/" . $id)) {
                if (mkdir("../web/images/" . $id, 777)) {
                    chmod("../web/images/" . $id, 0777);
                    $arr = $this->requestStack->getCurrentRequest()->files->get('form')['image'];
                    $dir = "../web/images/" . $id;
                    $files1 = scandir($dir);
                    $files1 = array_slice($files1, 2);
                    foreach ($arr as $key => $value) {
                        try {
                            if (!empty($value)) {
                                rename($value->getPathname(), "../web/images/" . $id . "/" . ($key + 1 + count($files1)) . '.jpg');
                            }
                        } catch (Exception $e) {
                            $this->errmove['upload']['fail'] = 'nie można przenieść zdjęć na serwer !!!';
                        }
                    }
                } else {
                    $this->errmove['upload']['fail'] = 'nie można przenieść zdjęć na serwer !!!';
                }
            } else {
                $dir = "../web/images/" . $id;
                $files1 = scandir($dir);
                $files1 = array_slice($files1, 2);
                $arr = $this->requestStack->getCurrentRequest()->files->get('form')['image'];
                foreach ($arr as $key => $value) {
                    try {
                        if (!empty($value)) {
                            rename($value->getPathname(), "../web/images/" . $id . "/" . ($key + 1 + count($files1)) . '.jpg');
                        }
                    } catch (Exception $e) {
                        $this->errmove['upload']['fail'] = 'nie można przenieść zdjęć na serwer !!!';
                    }
                }
            }
        }else{
        $files1=$this->getNameImages();    
        }
        $this->files = $files1;
        return $this;
    }

    public function getNameImages() {
        $files1 = NULL;
        if (is_dir("../web/images/" . $this->id_add)) {
            $dir = "../web/images/" . $this->id_add;
            $files1 = scandir($dir);
            $files1 = array_slice($files1, 2);
        }
        return $files1;
    }

    // delete files by request data
    public function deleteImages() {
        $files1=NULL;
        if (isset($this->requestStack->getCurrentRequest()->request->get('form')['deleteimage'])) {
            if (is_dir("../web/images/" . $this->id_add)) {
                $arr = $this->requestStack->getCurrentRequest()->request->get('form')['deleteimage'];
                foreach ($arr as $key => $value) {
                    unlink("../web/images/" . $this->id_add . "/" . $key . '.jpg');
                }
                $dir = "../web/images/" . $this->id_add;
                $files1 = scandir($dir);
                $files1 = array_slice($files1, 2);
                foreach ($files1 as $key => $value) {
                    rename("../web/images/" . $this->id_add . "/" . $value, "../web/images/" . $this->id_add . "/" . ($key + 1) . '.jpg');
                }
                $dir = "../web/images/" . $this->id_add;
                $files1 = scandir($dir);
                $files1 = array_slice($files1, 2);
            }
        }
        return $files1;
    }

    // check if there were any errors during the action
    public function isErrors() {
        if (in_array(true, $this->errmove)) {
            return true;
        }
        return false;
    }

    // returns an array with errors
    public function getErrors() {
        return $this->errmove;
    }

}
