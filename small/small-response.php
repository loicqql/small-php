<?php

class Response {

	private $data;
	private $response_type; //JSON or HTML

  	public function __construct() {
		$this->response_type = 'JSON';
	}

	public function send() {
		if(isset($this->data)) {
			switch ($this->response_type) {
				case 'JSON':
					header('Content-type: application/json');
					echo json_encode($this->data);
					break;
				case 'HTML':
					echo $this->data;
					break;
			}
		}
	}

	public function setCookie($name, $value, $expire = NULL, $path = '/') {
		if(!isset($expire)) {
			$expire = time()+3600*24*31*12;
		}
		setCookie($name, $value, $expire, $path);
	}

	public function setData($value) {
		$this->data = $value;
	}

	public function setResponseType($value) {
		$this->response_type = $value;
	}

	public function setResponseCode($code) {
		http_response_code($code);
	}
}
