<?php

//every controller will extend this class
//base controller class load model and views


class Controller{

    public function model($model)
    {
         require_once '../app/models/'.$model.'.php';
         return new $model();
    }
    public function views($view,$data=[])
    {
          if(file_exists('../app/views/'.$view.'.php'))
          {
              require_once '../app/views/'.$view.'.php';
          }
          else
          {
              die("view does not exist");
          }
    }
}
?>
