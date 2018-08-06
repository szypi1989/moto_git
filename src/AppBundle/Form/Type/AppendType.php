<?php
namespace AppBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Service\AutoSynchronize;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use AppBundle\Form\Type\EditType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\HttpFoundation\RequestStack;

class AppendType extends AbstractType
{
    protected $container;
    protected $entityManager;
    protected $autoSynchronize;
    protected $build_vars;
    protected $year_ln;
    protected $user_active;
    protected $id_user_add;
    protected $id_add;
    private $requestStack;
    /**
    * Constructor
    *
    * @param Container $container
    * @param EntityManager $em
    */  
    public function __construct(ContainerInterface $container,EntityManager $em,AutoSynchronize $auto,RequestStack $requestStack)
    {
        $this->container = $container;
        $this->entityManager = $em;
        $this->autoSynchronize = $auto;
        $this->requestStack = $requestStack;
        $this->id_add=$this->requestStack->getCurrentRequest()->attributes->get('id_add');
        //generating values helpful for building the form
        for ($i = 0; $i <= 9; $i++) {
        $this->build_vars["array_it"][]=$i;
        }
        for ($i = (integer)date("Y"); $i >= 1920; $i--) {   
        $this->build_vars["array_year"][$i]=$i;
        } 
        $this->year_ln=(integer)$this->requestStack->getCurrentRequest()->request->get('form')['year']+1919; 
        $this->user_active = $container->get('security.token_storage')->getToken()->getUser();
        $this->id_user_add = $em->getRepository('AppBundle:Cars')->findOneBy(array('id_user' => $this->user_active->getId(),'id'=>$this->id_add ));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('model', TextType::class,array('data'=> ($this->requestStack->getCurrentRequest()->request->get('form')['model'])?$this->requestStack->getCurrentRequest()->request->get('form')['model']:'a4'))
            ->add('mark',  TextType::class,array('data'=> ($this->requestStack->getCurrentRequest()->request->get('form')['mark'])?$this->requestStack->getCurrentRequest()->request->get('form')['mark']:'audi'))
            ->add('modellisted', ChoiceType::class,array(
            'choices' => NULL))
            ->add('marklisted', ChoiceType::class,array(
            'choices' => $this->autoSynchronize->getMarks()))
            ->add('price', NumberType::class,array('data'=> ((integer)$this->requestStack->getCurrentRequest()->request->get('form')['price'])?$this->requestStack->getCurrentRequest()->request->get('form')['price']:0))
            ->add('power', NumberType::class,array('data'=> ((integer)$this->requestStack->getCurrentRequest()->request->get('form')['power'])?$this->requestStack->getCurrentRequest()->request->get('form')['power']:0))
            ->add('enginea', ChoiceType::class,array(
            'choices' => $this->build_vars["array_it"],'data'=> ($this->requestStack->getCurrentRequest()->request->get('form')['enginea'])?$this->requestStack->getCurrentRequest()->request->get('form')['enginea']:''))  
            ->add('engineb', ChoiceType::class,array(
            'choices' => $this->build_vars["array_it"],'data'=> ($this->requestStack->getCurrentRequest()->request->get('form')['engineb'])?$this->requestStack->getCurrentRequest()->request->get('form')['engineb']:''))  
            ->add('enginetype',ChoiceType::class,array('choices' =>$this->EnumPossibleValue('enginetype'),'data'=> ($this->requestStack->getCurrentRequest()->request->get('form')['enginetype'])?$this->requestStack->getCurrentRequest()->request->get('form')['enginetype']:''))
            ->add('year', ChoiceType::class,array(
            'choices' => $this->build_vars["array_year"],'data'=> ($this->requestStack->getCurrentRequest()->request->get('form')['year'])?(integer)$this->requestStack->getCurrentRequest()->request->get('form')['year']:""))
            ->add('bodytype', ChoiceType::class,array('choices' =>$this->EnumPossibleValue('bodytype'),'data'=> ($this->requestStack->getCurrentRequest()->request->get('form')['bodytype'])?$this->requestStack->getCurrentRequest()->request->get('form')['bodytype']:''))
            ->add('description', TextType::class,array('data'=> ($this->requestStack->getCurrentRequest()->request->get('form')['description'])?$this->requestStack->getCurrentRequest()->request->get('form')['description']:'Super bryka'))
            ->add('avatar', FileType::class)
            ->add('image', CollectionType::class, array(
            'entry_type'   => FileType::class,
            'entry_options'  => array(
            'attr'      => array('class' => 'email-box'),
            'required' => false
            ),
            'allow_add' => true,
            'prototype' => true,
            ))
            ->add('save', SubmitType::class, array('label' => 'Dodaj ogłoszenie'));
    }
    
    public function EnumPossibleValue($field = 'bodytype'){
        $metadata = $this->entityManager->getClassMetadata('AppBundle:Cars');
        $myPropertyMapping = $metadata->getFieldMapping($field);
        $value=substr($myPropertyMapping['columnDefinition'], 5, -1);   
        $pieces = explode(",", $value);
        $arr_value;
            for ($i = 0; $i < count($pieces); $i++) {
            $arr_value[substr($pieces[$i], 1, -1)]=substr($pieces[$i], 1, -1);
            }
        return $arr_value;
    } 
    
    public function getBlockPrefix()
    {
    return "form";
    }
}