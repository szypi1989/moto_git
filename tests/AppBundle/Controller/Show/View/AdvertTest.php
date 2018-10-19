<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Crawler;
use AppBundle\Service\Show\View\Advert;

class AdvertTest extends WebTestCase {

    public $request;
    public $container;
    public $controls;
    public $paginer;
    public $fetchmsgsql;
    public $advert;
    
    //checking if the working functions of the photo
    public function testgetImg() {
        $this->advert->path_img = "./web/images/test/";
        $this->advert->reqdataview->data['page'] = 4;
        if (!is_dir('web/images/test/' . $this->advert->reqdataview->data['page'])) {
            mkdir('web/images/test/' . $this->advert->reqdataview->data['page'], 7777);
        }
        for ($i = 1; $i <= 4; $i++) {
            if (file_exists('web/images/test/' . $this->advert->reqdataview->data['page'] . '/' . $i)) {
                unlink('web/images/test/' . $this->advert->reqdataview->data['page'] . '/' . $i);
            }
        }
        $arr = array("1", "2", "3", "4");
        foreach ($arr as $key => $value) {
            $file = 'web/images/test/test.jpg';
            $newfile = "web/images/test/" . $this->advert->reqdataview->data['page'] . "/" . $value;
            copy($file, $newfile);
        }
        $files = $this->advert->getImg();
        $this->assertEquals($files, $arr);
    }

    public function setUp() {
        $kernel = self::bootKernel();
        $this->container = $kernel->getContainer();
        $this->advert = new Advert($this->container);
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
    }

}
