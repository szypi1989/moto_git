<?php

namespace AppBundle\Service\Edit\Append;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Cars;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Service\RequestControl as RequestControl;
use AppBundle\Service\Edit\Edit\ReqDataEdit as ReqDataEdit;

//class used for photo upload
class ImageMd {

    public $requestStack;
    protected $user_active;
    public $errmove = array();
    public $files = array();
    public $container;
    public $requestcntrl;
    public $path_img = "../web/images/";
    public $reqdataedit;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->requestcntrl = $this->container->get(RequestControl::Class);
        $this->reqdataedit = $this->container->get(ReqDataEdit::Class);
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
            rename($this->reqdataedit->data['avatar'], $this->path_img . $id . '.jpg');
        } catch (Exception $e) {
            $this->errmove['upload']['fail'] = "nie można przenieść zdjęć na serwer !!!";
        }
        return $this;
    }

    //creates a folder for the selected photo id and takes photos there that were 
    //sort files after uploady photos
    public function CreateSortFilesImg($id) {
        if (isset($this->reqdataedit->data['image'])) {
            if (!is_dir($this->path_img . $id)) {
                if (mkdir($this->path_img . $id, 777)) {
                    chmod($this->path_img . $id, 0777);
                    $arr = $this->reqdataedit->data['image'];
                    foreach ($arr as $key => $value) {
                        try {
                            if (!empty($value)) {
                                rename($value, $this->path_img . $id . "/" . $key . '.jpg');
                            }
                        } catch (Exception $e) {
                            $this->errmove['upload']['fail'] = "nie można przenieść zdjęć na serwer !!!";
                        }
                    }
                } else {
                    $this->errmove['upload']['fail'] = "nie można przenieść zdjęć na serwer !!!";
                }
            } else {
                chmod($this->path_img . $id, 0777);
                $arr = $this->reqdataedit->data['image'];
                foreach ($arr as $key => $value) {
                    try {
                        if (!empty($value)) {
                            rename($value, $this->path_img . $id . "/" . $key . '.jpg');
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
