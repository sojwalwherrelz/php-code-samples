<?php

        $scorecardList = array();
        $apikey      = "%APIKEY%";
        $id          = "fc4a5881-fb19-4d21-933c-45e913dc0d3c"; 
        $json_result = file_get_contents('https://api.cricapi.com/v1/match_scorecard?apikey='.$apikey.'&offset=0&id='.$id);
        $series_search_data = json_decode($json_result);
        if($series_search_data->status != "success") {
            die("FAILED TO GET A SUCCESS RESULT");
        }
        if(!empty($series_search_data)){
            
            $scorecardList[] = $series_search_data->data;
        }
        if(!empty($scorecardList)){
            foreach($scorecardList as $list){        
                if(isset($list->name)) { echo "Name - ".$list->name ."\n"; }else{ echo "No name Found"; } 
                if(isset($list->status)) { echo "status - ".$list->status ."\n";}else{ echo "No status Found"; } 
                if(isset($list->matchType)) { echo "match Type - ". $list->matchType ."\n";}else{ echo "No status Found"; } 
                if(isset($list->venue)) { echo "Venue - ".$list->venue ."\n"; }else{ echo "No  venue Found" ; } 
                if(isset($list->date)) { echo "Date - ".$list->date."\n"; }else{ echo  "No date Found";} 
                if(isset($list->dateTimeGMT)) { echo "Date Time GMT - ".$list->dateTimeGMT ."\n"; }else{ echo  "No date Data Found"; } 
                if(isset($list->teams)) { 
                for($i=0;$i<count($list->teams);$i++){
                echo "Teams - ".$list->teams[$i]." \n ";
                }
            }else{ echo "No teams Data Found"; }
            
                if(isset($list->series_id)) { echo "series_id - ".$list->series_id."\n"; }else{ echo  "No date Data Found"; } 
                if(isset($list->score)) { 
            for($i=0;$i<count($list->score);$i++){
                echo $list->score[$i]->r."\n";
                echo $list->score[$i]->w."\n";
                echo $list->score[$i]->o."\n";
                echo $list->score[$i]->inning."\n";
            }
            }else{ echo "No Score Data Found"; } 
            
        }
    }else{
        echo "Data Not Found";
    }
?>
      


