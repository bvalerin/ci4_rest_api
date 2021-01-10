<?php namespace App\Controllers;

class Auth extends BaseController{

    public function register(){
        $model = new \App\Models\UserModel();

        $request = \Config\Services::request();
        
        $name = $request->getPost('name');
        $email = $request->getPost('email');
        $username = $request->getPost('username');
        $password = $request->getPost('password');
        $phone = $request->getPost('phone');

        $user = [
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'phone' => $phone
        ];

        try {
            if($model->insert($user)){
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

}
