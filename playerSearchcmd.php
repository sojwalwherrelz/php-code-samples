<?php
    $playerList  = array();
    $search      = 'Nathan Le Tissier';
    $search      = str_replace(' ', '%20', $search);
    $apikey      = "%APIKEY%";
    $json_result = file_get_contents('https://api.cricapi.com/v1/players?apikey='.$apikey.'&offset=0&search='.$search);
    $series_search_data = json_decode($json_result);    
    if($series_search_data->status != "success") {
        die("FAILED TO GET A SUCCESS RESULT");
    }
    if(!empty($series_search_data)){
        
        $playerList[] = $series_search_data->data;
    }
    echo "********** Showing list of player search ***********\n----------------------------------------------\n";

    if(!empty($playerList)){
        foreach($playerList as $list){
            foreach($list as $listdata){  
        if(isset($listdata->name)) { echo "Name - ".$listdata->name ."\n"; }else{ echo "No name Found"; } 
        if(isset($listdata->country)) { echo "Country - ".$listdata->country."\n";}else{ echo "No status Found"; } 
    
        }
    }
    }else{
        echo "Data Not Found";
    }
?>

