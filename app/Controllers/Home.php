<?php

namespace App\Controllers;

use App\Models\ConsultaModel;
use CodeIgniter\HTTP\CURLRequest;
use XMLParser;

class Home extends BaseController
{
    public function index()
    {

        echo view('template/header');
        echo view('site/home');
        echo view('template/footer');
    }
    public function create()
    {
        if ($this->request->getMethod() === 'post') {


            $cep = $this->request->getPost('cep');
            $rua = $this->request->getPost('rua');
            $bairro = $this->request->getPost('bairro');
            $cidade = $this->request->getPost('cidade');
            $uf = $this->request->getPost('uf');
            $data = [
                'cep' => $cep,
                'rua' => $rua,
                'bairro' => $bairro,
                'cidade' => $cidade,
                'uf' => $uf,
            ];
            $value = new ConsultaModel();
            $info = $value->where('cep', $cep)->first();


            if (!empty($info)) {
                echo "<div class='alert alert-danger'>";
                echo "ja existe consulta com esse Cep.";
                echo "</div>";
                return view('site/resultado');
            }


            $value = new ConsultaModel();
            $value->insert($data);



            helper('xml');
            $cep = $this->request->getPost('cep');
            $url = 'http://viacep.com.br/ws/' . $cep . '/xml/';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $resultado = xml_convert(curl_exec($ch));
            echo "<div class='alert alert-success'>";
            echo "Cep Consultado com sucesso.";
            echo "</div>";
            echo view('site/resultado');
            echo "<pre class='text-center'>";
            echo ($resultado);
            echo "</pre>";
        }
    }
}
