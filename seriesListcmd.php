<?php
    $seriesList  = array();
    $offset      = 0;
    $maxOffset   = 1;
    $apikey      = "%APIKEY%";
    $json_result = file_get_contents('https://api.cricapi.com/v1/series?apikey='.$apikey.'&offset=0');
    $j = json_decode($json_result);
    if($j->status != "success") {
        die("FAILED TO GET A SUCCESS RESULT");
    }
    $maxOffset = $j->info->totalRows;
    $offset += count($j->data);
    $seriesList = array_merge($seriesList,$j->data);
    echo "********** Showing list of series ***********\n----------------------------------------------\n";
    $i = 0;
    if(!empty($seriesList)){
        foreach($seriesList as $list){
            $i++;
            echo $i.". ".$list->name."\n";
            echo "Start Date - "; if(isset($list->startDate)) { echo $list->startDate .", End Date - ".$list->endDate . " ,ODI- ".$list->odi," ,T20 - ".$list->t20." ,Test - ".$list->test.' , Squads - '.$list->squads.' , matches-'.$list->matches."\n \n "; }else{ echo "No Date Found"; }            
        }
    }else{
        echo "Data Not Found";
    }
?>
