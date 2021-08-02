<?php
/**
 * @desc Model master class - for any global properties and functions
 * @author Paul Doelle
 */

class DistModel {
    
    public function getSumDist($first_val, $first_type, $second_val, $second_type, $return_type) {
        
        $meter = 1.0936133;  
        $yard = 0.9144;
        
		$true_first;
		$true_second;
		
		if ($return_type == "meter"){
            

            if ($first_type != $return_type){
                $true_first = $first_val * $meter;     
			}
            
            else {
                $true_first = $first_val;   
            }

			if ($second_type != $return_type){
                
				$true_second = $second_val * $meter;
			}
            
            else {
                $true_second = $second_val;
            }
            
            return ($true_first + $true_second) . " meters total";

		}

		elseif ($return_type == "yard"){

			if ($first_type != $return_type){
                $true_first = $first_val * $yard;     
			}
            
            else {
                $true_first = $first_val;   
            }

			if ($second_type != $return_type){
				$true_second = $second_val * $yard;
			}
            
            else {
                $true_second = $second_val;   
            }


            return ($true_first + $true_second) . " yards total";
            
		}

		else {
			throw new Exception("Unexpected return type, please select either meter or yard", 204);
		}
    
    }
}
