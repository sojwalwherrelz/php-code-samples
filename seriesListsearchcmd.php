<?php
    $matchList   = array();
    $apikey      = "%APIKEY%";
    $id          = "7e47dce6-f086-469d-81b0-54c04e56ca61";
    $json_result = file_get_contents('https://api.cricapi.com/v1/series_info?apikey='.$apikey.'&offset=0&id='.$id);
    $series_search_data = json_decode($json_result);
    if($series_search_data->status != "success") {
        die("FAILED TO GET A SUCCESS RESULT");
    }
    if(!empty($series_search_data)){
        $results = $series_search_data->data;
        $matchList[] = $results->matchList;   
    }
    if(!empty($matchList)){
        foreach($matchList as $list){
        foreach($list as $listdata){
            if(isset($listdata->name)) { echo "Name - ".$listdata->name. "\n"; }else{ echo "No name Found"; } 
            if(isset($listdata->status)) { echo "Status - ".$listdata->status."\n";}else{ echo "No status Found"; } 
            if(isset($listdata->venue)) { echo "venue -".$listdata->venue."\n"; }else{ echo "No  venue Found" ; } 
            if(isset($listdata->date)) { echo "Date -".$listdata->date; }else{ echo  "No date Found";} 
            if(isset($listdata->dateTimeGMT)) { echo "dateTimeGMT -". $listdata->dateTimeGMT; }else{ echo  "No date Data Found"; } 
            if(isset($listdata->teams)) { 
            for($i=0;$i<count($listdata->teams);$i++){
                echo $listdata->teams[$i]."\n";
            }
        }else{ echo "No teams Data Found"; } 
        }
    }
    }else{
        echo "Data Not Found";
    }
?>
        


