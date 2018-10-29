<?php

namespace AppBundle\Service\Edit\Edit;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Cars;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Service\RequestControl as RequestControl;
use AppBundle\Service\Edit\Edit\ReqDataEdit as ReqDataEdit;

// management object uploaded

class ImageMdE {

    protected $id_add;
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
        if (isset($this->reqdataedit->data['avatar'])) {
            try {
                rename($this->reqdataedit->data['avatar'], $this->path_img . $id . '.jpg');
            } catch (Exception $e) {
                $this->errmove['upload']['fail'] = "nie można przenieść zdjęć na serwer !!!";
            }
        }
        return $this;
    }

    //creates a folder for the selected photo id and takes photos there that were 
    //sort files after uploady photos
    public function CreateSortFilesImg($id) {
        $files1 = null;
        if (isset($this->reqdataedit->data['image'])) {
            if (!is_dir($this->path_img . $id)) {
                if (mkdir($this->path_img . $id, 777)) {
                    chmod($this->path_img . $id, 0777);
                    $arr = $this->reqdataedit->data['image'];
                    $dir = $this->path_img . $id;
                    $files1 = scandir($dir);
                    $files1 = array_slice($files1, 2);
                    foreach ($arr as $key => $value) {
                        try {
                            if (!empty($value)) {
                                rename($value, $this->path_img . $id . "/" . ($key + 1 + count($files1)) . '.jpg');
                            }
                        } catch (Exception $e) {
                            $this->errmove['upload']['fail'] = 'nie można przenieść zdjęć na serwer !!!';
                        }
                    }
                } else {
                    $this->errmove['upload']['fail'] = 'nie można przenieść zdjęć na serwer !!!';
                }
            } else {
                $dir = $this->path_img . $id;
                $files1 = scandir($dir);
                $files1 = array_slice($files1, 2);
                $arr = $this->reqdataedit->data['image'];
                foreach ($arr as $key => $value) {
                    try {
                        if (!empty($value)) {
                            rename($value, $this->path_img . $id . "/" . ($key + 1 + count($files1)) . '.jpg');
                        }
                    } catch (Exception $e) {
                        $this->errmove['upload']['fail'] = 'nie można przenieść zdjęć na serwer !!!';
                    }
                }
            }
        } else {
            $files1 = $this->getNameImages();
        }
        $this->files = $files1;
        return $this;
    }

    public function getNameImages() {
        $files1 = NULL;
        if (is_dir($this->path_img . $this->reqdataedit->data['id_add'])) {
            $dir = $this->path_img . $this->reqdataedit->data['id_add'];
            $files1 = scandir($dir);
            $files1 = array_slice($files1, 2);
        }
        return $files1;
    }

    // delete files by request data
    public function deleteImages() {
        $files1 = NULL;
        if (isset($this->reqdataedit->data['deleteimage'])) {
            if (is_dir($this->path_img . $this->reqdataedit->data['id_add'])) {
                $arr = $this->reqdataedit->data['deleteimage'];
                foreach ($arr as $key => $value) {
                    unlink($this->path_img . $this->reqdataedit->data['id_add'] . "/" . $key . '.jpg');
                }
                $dir = $this->path_img . $this->reqdataedit->data['id_add'];
                $files1 = scandir($dir);
                $files1 = array_slice($files1, 2);
                foreach ($files1 as $key => $value) {
                    rename($this->path_img . $this->reqdataedit->data['id_add'] . "/" . $value, $this->path_img . $this->reqdataedit->data['id_add'] . "/" . ($key + 1) . '.jpg');
                }
                $dir = $this->path_img . $this->reqdataedit->data['id_add'];
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
