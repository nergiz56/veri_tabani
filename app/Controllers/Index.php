<?php
namespace App\Controllers;
class Index extends BaseController{
    public function index(){
        return view('index.php');
    }
}