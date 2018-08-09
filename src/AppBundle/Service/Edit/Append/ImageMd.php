<?php

namespace AppBundle\Service\Edit\Append;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Cars;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface;

//class used for photo upload
class ImageMd {

    private $requestStack;
    protected $user_active;
    public $errmove = array();

    public function __construct(RequestStack $requestStack) {
        $this->requestStack = $requestStack;
    }

    public function CreateImgMsg($id) {
        $this->CreateAwatar($id);
        $this->CreateSortFilesImg($id);
        return $this;
    }

    //moves the main picture of the avatar according to id number of the advert added
    public function CreateAwatar($id) {
        $val_errors = null;
        try {
            rename($this->requestStack->getCurrentRequest()->files->get('form')['avatar']->getPathname(), "../web/images/" . $id . '.jpg');
        } catch (Exception $e) {
            $this->errmove['upload']['fail'] = "nie można przenieść zdjęć na serwer !!!";
        }
        return $this;
    }

    //creates a folder for the selected photo id and takes photos there that were 
    //sort files after uploady photos
    public function CreateSortFilesImg($id) {
        if (isset($this->requestStack->getCurrentRequest()->files->get('form')['image'])) {
            if (!is_dir("../web/images/" . $id)) {
                if (mkdir("../web/images/" . $id, 777)) {
                    chmod("../web/images/" . $id, 0777);
                    $arr = $this->requestStack->getCurrentRequest()->files->get('form')['image'];
                    foreach ($arr as $key => $value) {
                        try {
                            if (!empty($value)) {
                                rename($value->getPathname(), "../web/images/" . $id . "/" . $key . '.jpg');
                            }
                        } catch (Exception $e) {
                            $this->errmove['upload']['fail'] = "nie można przenieść zdjęć na serwer !!!";
                        }
                    }
                } else {
                    $this->errmove['upload']['fail'] = "nie można przenieść zdjęć na serwer !!!";
                }
            } else {
                chmod("../web/images/" . $id, 0777);
                $arr = $this->requestStack->getCurrentRequest()->files->get('form')['image'];
                foreach ($arr as $key => $value) {
                    try {
                        if (!empty($value)) {
                            rename($value->getPathname(), "../web/images/" . $id . "/" . $key . '.jpg');
                        }
                    } catch (Exception $e) {
                        $this->errmove['upload']['fail'] = "nie można przenieść zdjęć na serwer !!!";
                    }
                }
            }
        }
        return $this;
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
