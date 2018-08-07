<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Service\ValidRequest;
use AppBundle\Service\CarsEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;
use AppBundle\Listener\Inf_add_advert;
use AppBundle\Entity\Cars;
use AppBundle\Entity\Carslist;
use AppBundle\Entity\Search;
use AppBundle\Entity\Test;
use AppBundle\Entity\Append;
use AppBundle\Entity\Login;
use AppBundle\Entity\Profileinfo;
use AppBundle\Entity\Userinfo;
use AppBundle\service\FileUploader;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\FileBag;
use AppBundle\Module\Session;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Validator\Constraints\Email as EmailConstraint;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Collection;
use Doctrine\ORM\EntityManager;
use AppBundle\Form\Type\EditType;
use AppBundle\Form\Type\AppendType;
use AppBundle\Service\Edit\Append\PushSql;
use AppBundle\Service\Edit\Edit\PushSqlE;
use AppBundle\Service\Edit\Edit\ImageMdE;

class EditController extends Controller {

    /**
     * @Route("/append", name="append")
     * @Template()
     */
    public function appendAction(Request $request, ValidRequest $validrequest, EntityManager $em, PushSql $pushsql) {
        //<building information to create a form
        //downloading the logged-in user
        $user_active = $this->get('security.token_storage')->getToken()->getUser();
        //>< creating a form for adding an advertisement
        $append = new Append();
        $form = $this->createForm(AppendType::class, $append, array(
            'action' => $this->generateUrl('append'),
        ));
        //>< performing actions after sending the form
        if ($request->getMethod() == 'POST') {
            $val_errors = array();
            //services validrequest defect the request table by pattern 
            $val_errors = $validrequest->getErrors($request, "../web/json/validate_cars.json");
            //>>
            //<< creating shares after error-free validation
            if (count($val_errors) == 0) {
                //push data request to table cars database  
                //return object entity cars
                $pushsqlres = $pushsql->pushCars();
                //>>>
                //variable {success} with the value {false} means the form with errors of defects
                //Checking if the application did not make any mistakes
                if ($pushsql->getImagemd()->isErrors()) {
                    $val_errors = $pushsql->getImagemd()->getErrors();
                    return $this->render('AppBundle:Edit:append.html.twig', array('form' => $form->createView(), 'parameters' => array('success' => 'false'), 'err_validate' => $val_errors, 'id_message' => $pushsqlres->getId()));
                }
                return $this->render('AppBundle:Edit:append.html.twig', array('form' => $form->createView(), 'parameters' => array('success' => 'true'), 'err_validate' => $val_errors, 'id_message' => $pushsqlres->getId()));
                //>>
            } else {
                return $this->render('AppBundle:Edit:append.html.twig', array('form' => $form->createView(), 'parameters' => array('success' => 'false'), 'err_validate' => $val_errors));
            }
            return $this->render('AppBundle:Edit:append.html.twig', array('form' => $form->createView(), 'parameters' => array('success' => 'false'), 'err_validate' => $val_errors));
        }
        //>
        return array(
            'form' => $form->createView());
    }

    /**
     * @Route("/editadd/{id_add}", name="edit_add")
     * @Template()
     */
    public function editaddAction(Request $request, $id_add, ValidRequest $validrequest, EntityManager $em, Inf_add_advert $inf_add_advert, PushSqlE $pushsql) {
        //action action very similar to controller action {appendAction}
        //Inf_add_advert = object listener event that sends an email confirming the update of the advertisement
        $user_active = $this->get('security.token_storage')->getToken()->getUser();
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->forward('AppBundle:Default:Index');
        }
        $id_user_add = $em->getRepository('AppBundle:Cars')->findOneBy(array('id_user' => $user_active->getId(), 'id' => $id_add));
        // get access if a specific ad is assigned to the user
        if ($id_user_add) {
            //$files1 = $pushsql->getImagemd()->getNameImages();
            $append = new Append();
            $form = $this->createForm(EditType::class, $append, array(
                'action' => $this->generateUrl('edit_add', array('id_add' => $id_add)),
            ));
            if ($request->getMethod() == 'POST') {
                $val_errors = array();
                //services validrequest defect the request table by pattern 
                $val_errors = $validrequest->getErrors($request, "../web/json/validate_cars.json");
                //<< creating shares after error-free validation
                if (count($val_errors) == 0) {
                    $pushsqlres = $pushsql->pushCars();
                   // if ($cars) {
                        $arr = NULL;
                        $val_errors = $pushsql->getImagemd()->getErrors();
                        if (@count($pushsql->getImagemd()->files) == 0) {                        
                            return $this->render('AppBundle:Edit:editadd.html.twig', array('form' => $form->createView(), 'parameters' => array('success' => 'true'), 'err_validate' => $val_errors, 'append_image' => $request->files->get('form')['image']));
                        } else {
                            return $this->render('AppBundle:Edit:editadd.html.twig', array('form' => $form->createView(), 'parameters' => array('success' => 'true'), 'err_validate' => $val_errors, 'allow_image' => $pushsql->getImagemd()->files, 'append_image' => $request->files->get('form')['image']));
                        }
                   // }
                } else {
                    return $this->render('AppBundle:Edit:editadd.html.twig', array('form' => $form->createView(), 'parameters' => array('success' => 'false'), 'err_validate' => $val_errors, 'allow_image' => $pushsql->getImagemd()->getNameImages()));
                }
                //>
            }

            if ($pushsql->getImagemd()->getNameImages() == NULL) {
                return $this->render('AppBundle:Edit:editadd.html.twig', array('form' => $form->createView()));
            } else {
                return $this->render('AppBundle:Edit:editadd.html.twig', array('form' => $form->createView(), 'allow_image' => $pushsql->getImagemd()->getNameImages()));
            }
        }
        return $this->forward('AppBundle:Default:Index');
    }

    public function EnumPossibleValue($field = 'bodytype') {
        $em = $this->getDoctrine()->getEntityManager();
        $metadata = $em->getClassMetadata('AppBundle:Cars');
        $myPropertyMapping = $metadata->getFieldMapping($field);
        $value = substr($myPropertyMapping['columnDefinition'], 5, -1);
        $pieces = explode(",", $value);
        $arr_value;
        for ($i = 0; $i < count($pieces); $i++) {
            $arr_value[substr($pieces[$i], 1, -1)] = substr($pieces[$i], 1, -1);
        }
        return $arr_value;
    }

}
