<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LogicalModel;

class Controller_principal extends BaseController
{

    public function index()
    {
        echo view('menu');
        echo view('index');
    }

    public function NewSale()
    {
        echo view('menu');
        echo view('New_sale');
    }

    public function ConsultModel()
    {
        $marca = $this->input->post('marca');
        $data = $this->LogicalModel->ConsultModel($marca);
        print_r($marca);
    }
}
