<?php

namespace AppBundle\Service\Edit\Append;

use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Service\RequestControl as RequestControl;

class ReqDataAppend {

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
        $req_work['POST'] = $this->requestcntrl->isRequestPost();
        $req_work['GET'] = $this->requestcntrl->isRequestGet();
        if ($req_work['POST']) {
            if (isset($this->requestcntrl->requeststack->getCurrentRequest()->files->get('form')['avatar'])) {
                $this->data['avatar'] = $this->requestcntrl->requeststack->getCurrentRequest()->files->get('form')['avatar']->getPathname();
            }
            if (isset($this->requestcntrl->requeststack->getCurrentRequest()->files->get('form')['image'])) {
                $image_arr = $this->requestcntrl->requeststack->getCurrentRequest()->files->get('form')['image'];
                foreach ($image_arr as $key => $value) {
                    $this->data['image'][$key] = $value;
                }
            }
        }
    }

}
