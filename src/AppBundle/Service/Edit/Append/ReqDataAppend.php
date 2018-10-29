<?php

namespace AppBundle\Service\Edit\Append;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Service\RequestControl as RequestControl;
// class managing data from the $ _REQUEST array
class ReqDataAppend {

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
            if (isset($this->requestcntrl->requeststack->getCurrentRequest()->files->get('form')['avatar'])) {
                $this->data['avatar'] = $this->requestcntrl->requeststack->getCurrentRequest()->files->get('form')['avatar']->getPathname();
            }
            if (isset($this->requestcntrl->requeststack->getCurrentRequest()->files->get('form')['image'])) {
                $image_arr = $this->requestcntrl->requeststack->getCurrentRequest()->files->get('form')['image'];
                foreach ($image_arr as $key => $value) {
                    $this->data['image'][$key] = $value;
                }
            }
            $required_data = array(0 => 'model', 1 => 'mark', 2 => 'price',
                3 => 'power', 4 => 'enginea', 5 => 'engineb', 6 => 'enginetype', 7 => 'year', 8 => 'bodytype', 9 => 'description');
            foreach ($required_data as $key => $value) {
                $this->data[$value] = $this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')[$value];
            }
        }
    }

}
