<?php namespace App\Controllers;

class Home extends BaseController{

	public function index(){
		$request = \Config\Services::request();

		$server = $request->getServer();
		$is_secure_request = true;

		if (!$request->isSecure()){
			$is_secure_request = false;
		}

		$response = [
			'msj' => "Server is up and running...",
			'is_secure_request' => $is_secure_request,
			'agent' => $server['HTTP_USER_AGENT'],
			'method' => $request->getMethod(),
			'server' => $server,
		];

		echo json_encode($response);
	}

}
