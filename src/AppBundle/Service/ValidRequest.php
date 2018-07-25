<?php
namespace AppBundle\Service ;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Validator\ValidatorInterface as Validator;
class ValidRequest
{
    protected $validator;
    public function __construct(Validator $validator)
    {
    $this->validator = $validator;
    }

    public function getErrors($request,$path_config)
    {
        $val_errors=null;
        $errorsList=null;
        $path=$path_config;
        //$path="../web/json/validate_cars.json";
        $content = file_get_contents($path);
        $arr = json_decode($content, true);
        $err_array=array();
            foreach ($arr as $key => $value) {
            $name=(string)$key;
                if(isset($request->request->get('form')[$name])){ 
                    $val_req=$request->request->get('form')[$name];
                        if(isset($value["regex"]["pattern"])){
                            $regex = new Regex(array(
                            'pattern'   => $value["regex"]["pattern"],
                            'match'     => true
                            ));
                            $errorsList=$this->validator->validate($val_req, $regex);
                            if (count($errorsList) != 0) {
                            $err_array[$name]['regex']=$value["regex"]["text"];
                            }
                        }
                        if(isset($value["regex"]["smaller"])){  
                            if($value["regex"]["smaller"]){
                                if((integer)$val_req<0){
                                $err_array[$name]['smaller']="Wybrane pole nie może mieć mniejszą wartość niż 0";   
                                }  
                            }
                        }                      
                }
                if(isset($request->files->get('form')[$name])){
                    if(isset($value["image"])){  
                        if($value["image"]["group"]){
                            $image_err_type=array(); 
                            $image_err_size=array();
                            $arr=$request->files->get('form')[$name];
                            foreach ($arr as $key => $val) {
                            $max_size=$val->getMaxFilesize();
                                if(!empty($val)){                           
                                    try {
                                      if($val->getError()==0){
                                            if($val->getMimeType()!=$value["image"]["mime-type"]){                                 
                                            $image_err_type[]=$val->getClientOriginalName();  
                                            }  
                                      }else{
                                        $mystring = $val->getErrorMessage();
                                        $findme   = 'upload_max_filesize';
                                        $pos = strpos($mystring, $findme);
                                            if($pos!==false){
                                            $image_err_size[]=$val->getClientOriginalName(); 
                                            }else{
                                            $err_array['image']['other']=$val->getErrorMessage();    
                                            }
                                      }
                                    } catch (Exception $e) {
                                    $err_array['upload']['fail']='nie można przenieść zdjęć na serwer !!!';    
                                    }                     
                                }
                            }
                            if(count($image_err_type)!=0){
                            $image_err_type = implode(",", $image_err_type);    
                            $err_array['image']['type']="Pliki ".$image_err_type." mają zły typ pliku. Typ pliku dodawanego zdjęcia musi być w formacie JPG/JPEG";  
                            }
                            if(count($image_err_size)!=0){
                            $image_err_size = implode(",", $image_err_size);    
                            $err_array['image']['size']="Pliki ".$image_err_size." mają zbyt dużo pojemność.Maksymalna pojemność dla przesyłanego pliku to ".$max_size." bajtów";  
                            }    
                        }else{
                            $max_size=$request->files->get('form')[$name]->getMaxFilesize();
                            if($request->files->get('form')[$name]->getError()==0){
                                if($request->files->get('form')[$name]->getMimeType()!=$value["image"]["mime-type"]){   
                                $err_array[$name]['type']="Typ pliku dodawanego zdjęcia musi być w formacie ".$value["image"]["mime-type-key"];   
                                }
                            }else{
                                $mystring = $request->files->get('form')[$name]->getErrorMessage();
                                $findme   = 'upload_max_filesize';
                                $pos = strpos($mystring, $findme);
                                    if($pos!==false){
                                    $err_array['image']['size']="Przesłany plik ma zbyt dużo pojemności. Maksymalna pojemność dla przesyłanego pliku to ".$max_size." bajtów";    
                                    }else{
                                    $err_array['image']['other']=$request->files->get('form')[$name]->getErrorMessage();    
                                    }    
                            }
                        }
                    }
                }
            }
        return $err_array;
    }
}
