<?php

namespace App\Controllers;

use App\Models\RegisterModel;
use CodeIgniter\RESTful\ResourceController;

class RegisterController extends ResourceController
{
    protected $format = 'json';

    public function index()
    {
        $registerModel = new \App\Models\RegisterModel();
        $data = $registerModel->findAll();

        if (!empty($data)) {
            $response = [
                'status' => 200,
                'message' => 'Data retrieved successfully',
                'data' => $data
            ];
        } else {
            $response = [
                'status' => 404, // 404 Not Found
                'message' => 'No data found',
                'data' => []
            ];
        }

        return $this->respond($response);
    }

    public function create()
    {
        $data = [
        'user' => $this->request->getVar('user'),
        'password' => $this->request->getVar('password'),
        ];
        $registerModel = new RegisterModel();
        $registerModel->save($data);
        $response = [
            'status' => 200,
            'messages' => 'Data berhasil ditambahkan',
            'data' => $data,
        ];
    return $this->respond($response);
}

}
