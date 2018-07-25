
$(document).ready(function() {  
$('tr[data-href]').on("click", function() {
    document.location = $(this).data('href');
});
$("#cont_search").find("input#form_model").keyup(function() {
var name_element=$(this).attr("id");
value= $("#cont_search").find("#"+ name_element).val();
    if(value.length>0){
        TemplateErrors(validateLettersNumber_space(value),'model','Wybrane pole może zawierać tylko litery oraz liczby z wyjątkiem znaków "-", "_" i może mieć postać paru wyrazów',"#cont_search");
    }
})
 $("#cont_search").find("input#form_mark").keyup(function() {
var name_element=$(this).attr("id");
value= $("#cont_search").find("#"+ name_element).val();
    if(value.length>0){
    TemplateErrors(validateLetters(value),'mark','Wybrane pole może zawierać tylko litery i musi mieć postać jednego wyrazu',"#cont_search");
    }
})
 $("#cont_search").find("input#form_pricefrom").keyup(function() {
var name_element=$(this).attr("id");
value= $("#cont_search").find("#"+ name_element).val();
    if(value.length>0){
        next=TemplateErrors(validateNumber(value),'pricefrom','Wybrane pole może zawierać tylko liczby',"#cont_search");
        if(next){   
        equal_price();
        }
    }
})
 $("#cont_search").find("input#form_priceto").keyup(function() {
var name_element=$(this).attr("id");
value= $("#cont_search").find("#"+ name_element).val();
    if(value.length>0){
        equal_price();
        next=TemplateErrors(validateNumber(value),'priceto','Wybrane pole może zawierać tylko liczby',"#cont_search");
        if(next){
        equal_price();
        }
    }
})

function equal_price(){
TemplateErrors(true,'pricefrom','Pole ( Cena od:) nie może mieć wartość większą od pola (Cena do:)',"#cont_search"); 
TemplateErrors(true,'priceto','Pole ( Cena od:) nie może mieć wartość większą od pola (Cena do:)',"#cont_search");    
vala=parseInt( $("#cont_search").find("input#form_pricefrom").val());
valb=parseInt( $("#cont_search").find("input#form_priceto").val());
if(vala>valb){ 
TemplateErrors(false,'pricefrom','Pole ( Cena od:) nie może mieć wartość większą od pola (Cena do:)',"#cont_search"); 
TemplateErrors(false,'priceto','Pole ( Cena od:) nie może mieć wartość większą od pola (Cena do:)',"#cont_search");
}
}
function validateLetters($value) {
  var valueReg = /^[\s]*[a-zA-Z]+$/;
  return valueReg.test( $value );
}
function validateLetters_space($value) {
  var valueReg = /^[a-zA-Z\-\_\s]+$/;
  return valueReg.test( $value );
}
function validateNumber($value) {
  var valueReg = /^[\s]*[0-9]+$/;
  return valueReg.test( $value );
}
function validateLettersNumber($value) {
  var valueReg = /^[a-zA-Z0-9\-\_]+$/;
  return valueReg.test( $value );
}
function validateLettersNumber_space($value) {
  var valueReg = /^[a-zA-Z0-9\-\_\s]+$/;
  return valueReg.test( $value );
}
function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}
function validateSpace($value) {
  var valueReg = /^[\s]+$/;
  return valueReg.test( $value);
}
function validateSpaceLetters($value) {
  var valueReg = /^[\s]+[a-zA-Z\-\_]+$/;
  return valueReg.test( $value );
}

function TemplateErrors(value,element,text,cont) {
if(value){
 $(cont).find('input#form_' + element).css("border-style","inset"); 
 $(cont).find('input#form_' + element).css("border-width","1px");
 $(cont).find('input#form_' + element).css("border-color","#000"); 
 $(cont).find('.error_' + element).html('');
 $(cont).find('.error_' + element).css("display","none")    
}else{
 $(cont).find('input#form_' + element).css("border-style","solid"); 
 $(cont).find('input#form_' + element).css("border-width","2px");
 $(cont).find('input#form_' + element).css("border-color","red"); 
 $(cont).find('.error_' + element).css("display","block")
 $(cont).find('.error_' + element).html(text);    
 }
 return value;
}
///////////////////
$("#append").find("input#form_model").keyup(function() {
var name_element=$(this).attr("id");
value= $("#append").find("#"+ name_element).val();
    if(value.length==0 || validateSpace(value)){
    TemplateErrors(false,'model','Wybrane pole nie może byś puste',"#append");
    return;
    } 
TemplateErrors(validateLettersNumber_space(value),'model','Wybrane pole może zawierać tylko litery oraz liczby z wyjątkiem znaków "-", "_" i może mieć postać paru wyrazów',"#append");
})
 $("#append").find("input#form_mark").keyup(function() {
var name_element=$(this).attr("id");
value= $("#append").find("#"+ name_element).val();
    if(value.length==0 || validateSpace(value)){
    TemplateErrors(false,'mark','Wybrane pole nie może byś puste',"#append");
    return;
    }    
TemplateErrors(validateLetters(value),'mark','Wybrane pole może zawierać tylko litery i musi mieć postać jednego wyrazu',"#append");
})
 $("#append").find("input#form_price").keyup(function() {
var name_element=$(this).attr("id");
value= $("#append").find("#"+ name_element).val();
    if(value.length==0 || validateSpace(value)){
    TemplateErrors(false,'price','Wybrane pole nie może byś puste',"#append");
    return;
    } 
a=TemplateErrors(validateNumber(value),'price','Wybrane pole może zawierać tylko liczby',"#append");
    if(a && parseInt(value)<0){
    TemplateErrors(false,'price','Wybrane pole nie może mieć mniejszą wartość niż 0',"#append");    
    }
})
$("#append").find("input#form_power").keyup(function() {
var name_element=$(this).attr("id");
value= $("#append").find("#"+ name_element).val();
    if(value.length==0 || validateSpace(value)){
    TemplateErrors(false,'power','Wybrane pole nie może byś puste',"#append");
    return;
    } 
a=TemplateErrors(validateNumber(value),'power','Wybrane pole może zawierać tylko liczby',"#append");
    if(a && parseInt(value)<0){
    TemplateErrors(false,'power','Wybrane pole nie może mieć mniejszą wartość niż 0',"#append");    
    }
})
/*
$("#register_cont").find("input#fos_user_registration_form_username").keyup(function() {
var name_element=$(this).attr("id");
value= $("#register_cont").find("#"+ name_element).val();
    if(value.length==0 || validateSpace(value)){
    SecurityTemplateErrors(false,'username','Wybrane pole nie może byś puste',"#register_cont");
    return;
    } 
    valueReg = /^[a-zA-Z]+[a-zA-Z0-9\-\_\s]*$/;
    var result=valueReg.test(value);
    SecurityTemplateErrors(result,'username','Wybrane pole może zawierać tylko litery oraz liczby z wyjątkiem znaków "-", "_" i musi mieć postać jednego wyrazu.\n\
    Wybrane pole musi zaczynać się od liter',"#register_cont");
})
function SecurityTemplateErrors(value,element,text,cont) {
if(value){
 $(cont).find('input#fos_user_registration_form_' + element).css("border-style","inset"); 
 $(cont).find('input#fos_user_registration_form_' + element).css("border-width","1px");
 $(cont).find('input#fos_user_registration_form_' + element).css("border-color","#000"); 
 $(cont).find('.error_' + element).html('');
 $(cont).find('.error_' + element).css("display","none")    
}else{
 $(cont).find('input#fos_user_registration_form_' + element).css("border-style","solid"); 
 $(cont).find('input#fos_user_registration_form_' + element).css("border-width","2px");
 $(cont).find('input#fos_user_registration_form_' + element).css("border-color","red"); 
 $(cont).find('.error_' + element).css("display","block")
 $(cont).find('.error_' + element).html(text);    
 }
 return value;
}
*/
})