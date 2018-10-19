<?php

namespace AppBundle\Service\Edit\Edit;

use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Service\RequestControl as RequestControl;

class ReqDataEdit {

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
        if (null !== $this->requestcntrl->requeststack->getCurrentRequest()->attributes->get('id_add')) {
            $this->data['id_add'] = $this->requestcntrl->requeststack->getCurrentRequest()->attributes->get('id_add');
        }

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
            $required_data = array(0 => 'deleteimage');
            foreach ($required_data as $key => $value) {
                if (isset($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')[$value])) {
                    $this->data[$value] = $this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')[$value];
                }
            }
        }
    }

}