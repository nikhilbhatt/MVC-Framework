<?php
   //core class
   //Creates url and load core controller
   //url format -/controller/method/params

   Class Core{

    protected $currentController='Pages';
    protected $currentMethod='index';
    protected $params=[];
     
    public function __construct()
    {
        // print_r($this->getUrl());
        $url=$this->getUrl();
        //Look in controller if this controller exists.

        if(file_exists('../app/controllers/'.ucwords($url[0]).'.php'))
        {
            $this->currentController=ucwords($url[0]);
            unset($url[0]);
        }
        require_once '../app/controllers/'.$this->currentController.'.php';
        $this->currentController=new $this->currentController;

        //now check for the second part of url 
        if(isset($url[1]))
        {
           //now find for the method if that exist in controller class.  ??big question mark here??
           if(method_exists($this->currentController,$url[1]))
           {
               $this->currentMethod=$url[1];
               unset($url[1]);
           }
        }   

        $this->params=$url?array_values($url):[];

        //call a  callback with array of params
        call_user_func_array([$this->currentController,$this->currentMethod],$this->params);    

    }
    public function getUrl()
    {
       if(isset($_GET['url']))
       {
         $url=rtrim($_GET['url'],'/');
         $url=filter_var($url,FILTER_SANITIZE_URL);
         $url=explode('/',$url);
         return $url;
       }
    }
   }
?>
