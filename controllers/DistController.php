<?php
/**
 * @desc Controller master class - for any global properties and functions
 * @author Paul Doelle
 */

class DistController {
    
    private $model;
	private $model_name;
	
	public function __construct() {
		preg_match("/(.+)Controller$/", get_class($this), $match);
		$this->model_name = $match[1] . "Model";
		if (class_exists($this->model_name)) {
			$this->model = new $this->model_name();
		} else {
        	throw new Exception("Model does not exist.", 500);
        }
	}
    
	public function getAction($request) {
        if (!empty($request->parameters["first_val"]) && !empty($request->parameters["second_val"]) && !empty($request->parameters["return_type"])) {
            
			$first_value = $request->parameters["first_val"][0];
            $first_type = $request->parameters["first_val"][1];
			$second_value = $request->parameters["second_val"][0];
			$second_type = $request->parameters["second_val"][1];
			$return_type = $request->parameters["return_type"];

            if ($first_value && $first_type && $second_value && $second_type && $return_type)
            	// API/users/{id}
            	return $this->model->getSumDist($first_value, $first_type, $second_value, $second_type, $return_type);

        } else {
        	// API/users
        	return "no";
        }
    }
    
}
