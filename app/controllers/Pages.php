<?php

//you should include index method in every controller class otherwise it will give error. write now no error is showing up but soon  the error will be shown.

Class Pages extends Controller{

    public function __construct()
    {
        // echo "Pages controller is working soon it will be changed to error file";
       
    }
    public function index()
    {
         $data=[
             'tittle'=>'welcome'
         ];
        //default function
        $this->views('pages/index',$data);
    }
    public function about()
    {
        $this->views('pages/about',['tittle'=>'about']);
    }
}

?>