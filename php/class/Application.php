<?php

class Application
{
     

static function LoadClass($className)
{
   require_once "php/class/$className.php";

 //  Model::Read();

}




static function Go()
{
spl_autoload_register("Application::LoadClass");

    Application::ChargerView();

         HandelUser::CreateUser();
           HandelUser::login();
  
}







static function ChargerView()


{        
       
         
         $section="section-index";
      
     
       require_once "php/view/$section.php";
}

}