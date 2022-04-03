<?php

class Response {

	private $data;
	private $response_type; //JSON or HTML

  	public function __construct() {
		$this->response_type = 'JSON';
	}

	public function send(Type $var = null) {
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

	public function setData($value) {
		$this->data = $value;
	}

	public function setResponseType($value) {
		$this->response_type = $value;
	}
}
