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

	public function new($route, $method) {
		
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
