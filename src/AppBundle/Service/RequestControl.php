<?php

namespace AppBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class RequestControl {

    public $requeststack;
    
    public function __construct(Container $container) {
        $this->requeststack = $container->get('request_stack');
    }

    public function getRequestStack() {
        return $this->requeststack;
    }

    public function isRequestPost() {
        if (isset($_SERVER['REQUEST_METHOD'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                return true;
            }
        }
        return false;
    }

    public function isRequestGet() {
        if (isset($_SERVER['REQUEST_METHOD'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                return true;
            }
        }
    }

    public function isRequest() {
        if ($this->isRequestGet() || $this->isRequestPost()) {
            return true;
        }
    }
    
    public function issetServerRequest(){
         if (isset($_SERVER['REQUEST_METHOD'])) {
             return true;
         }    
    }

}
