<?php

class Docs {

	private $base_url;
  	private $data;

  	public function __construct($base = null) {
		$this->base_url = $base;

		//will replace openapi.json by base.json
		$jsonString = file_get_contents(__DIR__ .'/../docs/base.json');
		$this->data = json_decode($jsonString, true);
	}

	public function newRoute($route, $method) {
		
		if($route != '/') {
			$route = $this->base_url . $route;
		}

		$ressource = getRessourceName($route);
		$this->data["paths"][$route][$method] = [
			'requestBody' => $this->getRequestBody(),
			'responses' => $this->getResponses()
		];
		if(isset($ressource)) {
			$this->data["paths"][$route][$method]['parameters'] = [[
				'name' => $ressource,
				'in' => 'path',
				'required' => true
			]];
		}

		$tab = explode('/', $route);
		if($tab[1] != '') {
			$tag = $tab[1];
			if(isset($this->data["potTab"][$tag])) {
				$this->data["paths"][$route][$method]['tags'] = [$tag];
				foreach ($this->data["paths"] as $key => $value) {
					$tab2 = explode('/', $key);
					if($tab2[1] == $tag) {
						foreach ($this->data["paths"][$key] as $k => $v) {
							$this->data["paths"][$key][$k]['tags'] = [$tag];
						}
					}
				}
			}else {
				$this->data["potTab"][$tag] = true;
			}
		}
		
		$this->saveJson();
	}

	private function saveJson() {
		$newJsonString = json_encode($this->data);
		file_put_contents(__DIR__ .'/../docs/openapi.json', $newJsonString);
	}

	private function getRequestBody() {
		$jsonString = file_get_contents(__DIR__ .'/../docs/requestBody.json');
    	return json_decode($jsonString, true);
	}

	private function getResponses() {
		$jsonString = file_get_contents(__DIR__ .'/../docs/responses.json');
    	return json_decode($jsonString, true);
	}

}
