<?php namespace App\Controllers;

class User extends BaseController{

    protected $request;
    protected $model;

    public function __construct(){
        $this->request = \Config\Services::request();
        $this->model = new \App\Models\UserModel();
    }

    public function all(){
        echo json_encode($this->model->findAll());
    }

    public function save(){
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $phone = $this->request->getPost('phone');

        $user = [
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'phone' => $phone
        ];

        try {
            if($this->model->insert($user)){
                $response = [
                    'user' => $user,
                    'msj' => "User created successfully"
                ];
            }
        } catch (\Throwable $th) {
            $response = [
                'user' => $user,
                'msj' => "Opps something went wrong"
            ];
        }
        
        echo json_encode($response);
    }

    public function update(){
        
        $id = $this->request->getPost('id');
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $phone = $this->request->getPost('phone');

        $user = [
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'phone' => $phone
        ];

        try {
            if($this->model->update($id,$user)){
                $response = [
                    'user' => $user,
                    'msj' => "User updated successfully"
                ];
            }
        } catch (\Throwable $th) {
            $response = [
                'user' => $user,
                'msj' => "Opps something went wrong"
            ];
        }
        
        echo json_encode($response);
    }

    public function delete(){
        $id = $this->request->getPost('id');

        try {
            if($this->model->delete($id)){
                $response = [
                    'user_id' => $id,
                    'msj' => "User deteted successfully"
                ];
            }
        } catch (\Throwable $th) {
            $response = [
                'user' => $user,
                'msj' => "Opps something went wrong"
            ];
        }
        
        echo json_encode($response);
    }

    public function search(){
        $model = 
        $request = 
        $id = $this->request->getPost('id');

        try {
            if($user = $this->model->find($id)){
                $response = [
                    'user' => $user,
                    'msj' => "User found"
                ];
            }else {
                $response = [
                    'msj' => "User not found"
                ];
            }
        } catch (\Throwable $th) {
            $response = [
                'user' => $user,
                'msj' => "Opps something went wrong"
            ];
        }
        
        echo json_encode($response);
    }

    public function get_user(){
        
    }



}
