<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Crawler;
use AppBundle\Service\Edit\Edit\ImageMdE;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageMdETest extends WebTestCase {

    public $container;
    public $imagemde;
    public $client;

    // checking if the picture remains added
    public function testIssetFileCreateAvatar() {
        $client = static::createClient();
        $id = 1;
        $path = 'web/images/test/';
        if (file_exists($path . $id . '.jpg')) {
            unlink($path . $id . '.jpg');
        }
        $this->imagemde->path_img = $path;
        $this->imagemde->reqdataedit->data['id_add'] = $id;
        $this->imagemde->reqdataedit->data['avatar'] = $path . "test2.jpg";
        $this->imagemde->CreateAwatar($id);
        $this->assertStringNotEqualsFile($path . $id . '.jpg', '');
    }

    //checking if the photos remain added
    public function testIssetFileCreateImage() {
        $client = static::createClient();
        $id = 1;
        $path = 'web/images/test/';
        for ($i = 1; $i <= 3; $i++) {
            if (file_exists($path . $id . '/' . $i . '.jpg')) {
                unlink($path . $id . '/' . $i . '.jpg');
            }
        }
        $this->imagemde->path_img = $path;
        $this->imagemde->reqdataedit->data['id_add'] = $id;
        $this->imagemde->reqdataedit->data['image'][0] = $path . "test3.jpg";
        $this->imagemde->reqdataedit->data['image'][1] = $path . "test4.jpg";
        $this->imagemde->reqdataedit->data['image'][2] = $path . "test5.jpg";
        $this->imagemde->CreateSortFilesImg($id);
        for ($i = 1; $i <= 3; $i++) {
            $this->assertStringNotEqualsFile($path . $id . '/' . $i . '.jpg', '');
        }
    }

    //checking if the photos have been deleted
    public function testDeleteImages() {
        $id = 1;
        if (!is_dir('web/images/test/' . $id)) {
            mkdir('web/images/test/' . $id, 7777);
        }
        for ($i = 1; $i <= 4; $i++) {
            $path = 'web/images/test/' . $id . '/' . $i . '.jpg';
            $file = fopen($path, "w");
            fwrite($file, $i);
            fclose($file);
        }
        $path = 'web/images/test/';
        $this->imagemde->path_img = $path;
        $this->imagemde->reqdataedit->data['id_add'] = $id;
        $this->imagemde->reqdataedit->data['deleteimage'] = array(2 => "on", 4 => "on");
        $this->imagemde->deleteImages();
        $files = scandir('web/images/test/' . $id . '/');
        $files = array_slice($files, 2);
        $file = fopen('web/images/test/' . $id . '/' . $files[0], "r");
        $a = fread($file, 1);
        $this->assertEquals($a, "1");
        $file = fopen('web/images/test/' . $id . '/' . $files[1], "r");
        $a = fread($file, 1);
        $this->assertEquals($a, "3");
    }

    public function setUp() {
        $kernel = self::bootKernel();
        $this->container = $kernel->getContainer();
        // creating files needed for testing
        if (!is_dir('web/images/test/')) {
            mkdir('web/images/test/', 7777);
        }
        if (!file_exists('web/images/test/test.jpg')) {
            $path = 'web/images/test/test.jpg';
            $file = fopen($path, "w");
            fwrite($file, "data");
            fclose($file);
        }
        $file = 'web/images/test/test.jpg';
        $newfile = "web/images/test/test2.jpg";
        copy($file, $newfile);
        $file = 'web/images/test/test.jpg';
        $newfile = "web/images/test/test3.jpg";
        copy($file, $newfile);
        $file = 'web/images/test/test.jpg';
        $newfile = "web/images/test/test4.jpg";
        copy($file, $newfile);
        $file = 'web/images/test/test.jpg';
        $newfile = "web/images/test/test5.jpg";
        copy($file, $newfile);
        $this->imagemde = new ImageMdE($this->container);
    }

}
