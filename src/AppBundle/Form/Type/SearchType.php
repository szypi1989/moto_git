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
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
class SearchType extends AbstractType
{
    protected $container;
    protected $entityManager;
    protected $autoSynchronize;
    protected $build_vars;
    /**
    * Constructor
    *
    * @param Container $container
    * @param EntityManager $em
    */  
    public function __construct(ContainerInterface $container,EntityManager $em,AutoSynchronize $auto)
    {
        $this->container = $container;
        $this->entityManager = $em;
        $this->autoSynchronize = $auto;
        //generating values helpful for building the form
        for ($i = 0; $i <= 9; $i++) {
        $this->build_vars["array_it"][]=$i;
        }
        for ($i = 2017; $i >= 1920; $i--) {   
        $this->build_vars["array_year"][$i]=$i;
        } 
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('model', TextType::class,array('required' => false,'data'=> 'a4'))
            ->add('mark',  TextType::class,array('required' => false,'data'=> 'audi'))
            ->add('modellist', ChoiceType::class,array(
            'choices' => NULL))
            ->add('marklist', ChoiceType::class,array(
            'choices' => $this->autoSynchronize->getMarks()))
            ->add('pricefrom', NumberType::class,array('required' => false,'data'=> 0))
            ->add('priceto', NumberType::class,array('required' => false,'data'=> 10000))
            ->add('enginea', ChoiceType::class,array(
            'choices' => $this->build_vars["array_it"]))->add('engineb', ChoiceType::class,array(
            'choices' => $this->build_vars["array_it"]))->add('enginetype',ChoiceType::class,array('choices' =>$this->EnumPossibleValue('enginetype'),'required' => false))
            ->add('yearfrom', ChoiceType::class,array(
            'choices' => $this->build_vars["array_year"],'required' => false))
                    ->add('yearto', ChoiceType::class,array(
            'choices' => $this->build_vars["array_year"],'required' => false))
                    ->add('bodytype', ChoiceType::class,array('choices' =>$this->EnumPossibleValue(),
           'required' => false))
            ->add('save', SubmitType::class, array('label' => 'Create Task'));
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