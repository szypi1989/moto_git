<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Crawler;
use AppBundle\Service\Defaults\Index\PutAdvert;
use Knp\Component\Pager\Pagination\PaginationInterface as PaginationInterface;
use AppBundle\Service\Test\RequestControlInterface as RequestControlInterface;
use AppBundle\Service\Defaults\Index\FetchPaginer;
use AppBundle\Service\Defaults\Index\FetchMsgSql;
use Doctrine\ORM\Query as Query;

class PutAdvertTest extends WebTestCase {

    public $request;
    public $container;
    public $controls;
    public $paginer;
    public $fetchmsgsql;

    public function testIsArrayView() {
        $client = static::createClient();
        $this->assertInternalType("array", $this->putadvert->getTransSort());
        $this->assertInternalType("array", $this->putadvert->getTransArr());
    }

    public function testIsInstance() {
        $this->assertInstanceOf(PaginationInterface::class, $this->putadvert->getPagination());
        $this->assertInstanceOf(PaginationInterface::class, $this->paginer->createPagination());
    }

    public function testReturnQuery() {
        $this->assertInstanceOf(Query::class, $this->fetchmsgsql->getSql());
    }

    public function setUp() {
        $kernel = self::bootKernel();
        $this->container = $kernel->getContainer();
        $this->putadvert = new PutAdvert($this->container);
        $this->paginer = new FetchPaginer($this->container);
        $this->fetchmsgsql = new FetchMsgSql($this->container);
    }

}
