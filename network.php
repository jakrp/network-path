<?php

class Distances{

    function getDistances(){
        if (($handle = fopen('./spreadsheet.csv', "r")) !== FALSE) {
                $row = 1;
                $distances = array();
                
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $distances[$data[0].$data[1]] = $data[2];
                    $row++;
                }
                fclose($handle);
                
                return $distances;
        }else{
            
			die('Cannot find the file');
        }
	}
    
    function getDevices(){
    
        if (($handle = fopen('./spreadsheet.csv', "r")) !== FALSE) {
            $row = 1;
            $device_unsorted = array();
            $device_sorted = array();
            
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $device_unsorted[] = $data[0];
                $device_unsorted[] = $data[1];
                $row++;
            }
            
            fclose($handle);
            $row = 0;
            
            foreach(array_unique($device_unsorted) as $val){
                $device_sorted[$row] = $val;
                $row++;
            }
        
            return $device_sorted;    
       }else{
            die('Cannot find the file');
       }
   }

}

?>