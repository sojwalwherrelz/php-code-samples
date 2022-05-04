<?php

    $matchList   = array();
    $apikey      = "%APIKEY%";        
    $id          = "119f27e8-cb92-4ddf-b275-a2d265cec2dd";
    $json_result = file_get_contents('https://api.cricapi.com/v1/match_points?apikey='.$apikey.'&offset=0&id='.$id);
    $series_search_data = json_decode($json_result);
    if($series_search_data->status != "success") {
        die("FAILED TO GET A SUCCESS RESULT");
    }
    if(!empty($series_search_data)){
        
        $matchList[] = $series_search_data->data;       
    }
    echo "********** Showing list of match Points ***********\n----------------------------------------------\n";
    $i=0;
    if(!empty($matchList)){
        foreach($matchList as $list){
        foreach($list->innings as $listdata){                               
            $i++;
        if(isset($listdata->inning)) { echo " \n ".$i." . ".$listdata->inning; }else{ echo "No name Found"; } 
        
        if(isset($listdata->batting)) { 
            for($i=0;$i<count($listdata->batting);$i++){
                echo "\n";
                if(isset($listdata->batting[$i]->name)) 
                {
                echo " Name : ".$listdata->batting[$i]->name."\n";
            }
            if(isset($listdata->batting[$i]->points)) 
            {
                echo " Points :".$listdata->batting[$i]->points."\n";
            }
            
            echo "----------------------------------------------------";
        }
        }else{ echo "No batting Data Found"; } 

            if(isset($listdata->bowling)) { 
        for($i=0;$i<count($listdata->bowling);$i++){
                echo "\n";
                if(isset($listdata->bowling[$i]->name)) 
                {
                echo " Name :".$listdata->bowling[$i]->name."\n";
            }
            if(isset($listdata->bowling[$i]->points)) 
            {
                echo " Points :".$listdata->bowling[$i]->points."\n";
            }
            
            echo "--------------------------------------------------------";
        }
        }else{ echo "No bowling Data Found"; }                         
                if(isset($listdata->catching)) { 
        for($i=0;$i<count($listdata->catching);$i++){
                echo "\n";
                if(isset($listdata->catching[$i]->name)) 
                {
                echo " Name :".$listdata->catching[$i]->name."\n ";
            }
            if(isset($listdata->catching[$i]->points)) 
            {
                echo " Points :".$listdata->catching[$i]->points."\n ";
            }
            
            echo "-------------------------------------------------------";
        }
        }else{ echo "No catching Data Found"; }    
        
    }
 }
    }else{
        echo "Data Not Found";
    }
            
?>

