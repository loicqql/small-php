<?php

class Request {

	public $small_base_url;

	public $route;
	public $uri;
	public $method;
	public $params;
	public $resource;

  	public function __construct($route, $base_url) {
		$this->route = $route;
		$this->uri = getRequestUri($base_url);
		str_contains($route, '{') ? $this->getRessource() : '';
		$this->method = getMethod();
		$this->getParams();
	}

	private function getParams() {
		$this->params = json_decode(file_get_contents('php://input'), true);
	}

	private function getRessource() {
		$tab = explode('{', $this->route);
		$data = substr($this->uri, strlen($tab[0]) - strlen($this->uri));
		$data = substr($data, 0, -1);
		$tab = explode('}', $tab[1]);
		$this->resource = [$tab[0] => $data];
	}
}
