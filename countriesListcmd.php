<?php
    $countriesList  = array();
    $apikey      = "da2589ff-76cf-4b11-8654-080868ac896b";
    $json_result = file_get_contents('https://api.cricapi.com/v1/countries?apikey='.$apikey.'&offset=0');
    $countriesdata = json_decode($json_result);
    if($countriesdata->status != "success") {
        die("FAILED TO GET A SUCCESS RESULT");
    }
    if(!empty($countriesdata)){           
        $countriesList[] = $countriesdata->data;   
        echo "********** Showing list of Countries List ***********\n----------------------------------------------\n";
        $i = 0;
        if(!empty($countriesList)){
            foreach($countriesList as $list){
                foreach($list as $val){
                $i++;
                echo $i.". ".$val->name."\n";
                echo "Name - "; if(isset($val->name)) { echo $val->name .", genericFlag - ".$val->genericFlag ."\n \n "; }else{ echo "No Date Found"; }            
            }
        }
        }else{
            echo "Data Not Found";
        }
    }
      
    

?>
