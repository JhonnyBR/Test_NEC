<?php
namespace App\Controllers;
use App\Controllers\BaseController;

class Controller_principal extends BaseController
{

    public function index(){
        echo view('menu');
        echo view('index');
    }

}

?>