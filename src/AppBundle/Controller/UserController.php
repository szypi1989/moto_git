<?php

namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Profileinfo;
use AppBundle\Service\User\Profileinfo\ProfileSql;
use AppBundle\Form\Type\ProfileType;

class UserController extends Controller {
    /**
     * @Route("/editinfo/{user}", name="edit_info")
     * @Template()
     */
    public function profileinfoAction(Request $request, $user, ProfileSql $profilesql) {
        // downloading the logged-in user
        $user_active = $this->get('security.token_storage')->getToken()->getUser();
        // perform actions only when accessing the editing capabilities
        if ($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            // check if the user is compatible with the edited profile
            if (($user_active) == $user) {
                $profileinfo = new Profileinfo();
                $form = $this->createForm(ProfileType::class, $profileinfo, array(
                    'action' => $this->generateUrl('edit_info', array('user' => $user))
                ));
                $form->handleRequest($request);
                if ($form->isSubmitted()) {
                    // edit information using data sent from the form
                    $profilesql->EditInfo();
                    return array(
                        'form' => $form->createView(), 'parameters' => array('success' => 'true'));
                }
                return array(
                    'form' => $form->createView(), 'parameters' => array('success' => 'false'));
            } else {
                return $this->forward('AppBundle:User:profileinfo', array(
                            'user' => $this->get('security.token_storage')->getToken()->getUser()
                ));
            }
        }
        return $this->forward('AppBundle:Default:Index');
    }

    /**
     * @Route("/myadd", name="my_add")
     * @Template()
     */
    public function myaddAction(Request $request) {
        // downloading all announcements of the logged in user
        $em = $this->getDoctrine()->getManager();
        $user_active = $this->get('security.token_storage')->getToken()->getUser();
        $entities = $em->getRepository('AppBundle:Cars')->findBy(array('id_user' => $user_active->getId()));
        return array('entities' => $entities);
    }

}
