<?php

namespace AppBundle\Service\User\Profileinfo;

use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Service\RequestControl as RequestControl;
//the class preparing the data from the request
class ReqDataProfile {

    public $data;
    public $container;
    public $req_work = false;
    public $requestcntrl;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->requestcntrl = $this->container->get(RequestControl::Class);
        if ($this->requestcntrl->issetServerRequest()) {
            $this->prepareDataRequest();
        }
    }

    public function prepareDataRequest() {
        $req_work['POST'] = $this->requestcntrl->isRequestPost();
        $req_work['GET'] = $this->requestcntrl->isRequestGet();
        if ($req_work['POST']) {
            $required_data = array(0 => 'address', 1 => 'phonenumber');
            foreach ($required_data as $key => $value) {
                $this->data[$value] = $this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')[$value];
            }
        }
    }

}
