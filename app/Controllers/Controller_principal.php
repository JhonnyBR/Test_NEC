<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LogicalModel;
use App\Models\Modelformodels;
use App\Models\SalesModel;

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

    public function GetModels()
    {
        $code=$this->request->getVar('code');
        $Model = new \App\Models\Modelformodels();
        $filter = [
            "Stock_modelo >" => 0,
            "Fk_marca =" => $code
        ];
        $dataModel = $Model->where($filter)->findAll();
        $response = array(
            'data'=> $dataModel,
            'statuscode' => 200,
            'message' => 'ok',
            'redirect' => null
        );
        return $this->response->setJSON($response);
    }

    public function Getabiliavility()
    {
        $code = $this->request->getVar('code');
        $Model = new \App\Models\Modelformodels();
        $cant = $Model->Getabiliavility($code);
        $response = array(
            'data'=> $cant[0]->Stock_modelo,
            'statuscode' => 200,
            'message' => 'ok',
            'redirect' => null
        );
        return $this->response->setJSON($response);
    }

    public function Getprice(){
        $code = $this->request->getVar('code');
        $Model = new \App\Models\Modelformodels();
        $cant = $Model->Getprice($code);
        $response = array(
            'data'=> $cant[0]->Precio_unidad,
            'statuscode' => 200,
            'message' => 'ok',
            'redirect' => null
        );
        return $this->response->setJSON($response);
    }

    public function SaveSale(){
        date_default_timezone_set('America/Bogota');
        $cant = $this->request->getVar('cant');
        $pricebase = $this->request->getVar('base');
        $model = $this->request->getVar('model');
        $stock = $this->request->getVar('act');
        $date = date('Y-m-d');
        $data_insert = [
            "Fk_modelo" => intval($model),
            "Fecha_venta" => $date,
            "Total_venta" => $cant * $pricebase,
            "Cantidad_venta" => $cant
        ];
        $data_update = [
            'Stock_modelo' => intval($stock -1 )
        ];
        $Modelformodels = new Modelformodels();
        $Modelformodels->update(intval($model), $data_update);
        $SalesModel = new SalesModel();
        $SalesModel->insert($data_insert);
        $response=array(
                'statuscode'=>200,
                'message'=>'Venta registrada',
                'redirect'=>base_url() . '/newsale'
        );
        return $this->response->setJSON($response);
    }
}
