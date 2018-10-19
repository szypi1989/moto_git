<?php

namespace AppBundle\Service\Show\View;

use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Service\RequestControl as RequestControl;

//the class preparing the data from the request
class ReqDataView {

    public $data;
    public $container;
    public $req_work = false;
    public $requestcntrl;
    public $auto_data = true;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->requestcntrl = $this->container->get(RequestControl::Class);
        if ($this->requestcntrl->issetServerRequest()) {
            $this->prepareDataRequest();
        }
    }

    public function prepareDataRequest() {
       if (null !== $this->requestcntrl->requeststack->getCurrentRequest()->attributes->get('page')) {
            $this->data['page'] = $this->requestcntrl->requeststack->getCurrentRequest()->attributes->get('page');
        } 
    }

}
