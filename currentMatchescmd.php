<?php
            $matchList = array();
            $apikey      = "%APIKEY%";
            $json_result = file_get_contents('https://api.cricapi.com/v1/currentMatches?apikey='.$apikey.'&offset=0');
            $series_search_data = json_decode($json_result);
            if($series_search_data->status != "success") {
                die("FAILED TO GET A SUCCESS RESULT");
            }
            if(!empty($series_search_data)){
                
                $matchList[] = $series_search_data->data;
            }
            echo "********** Showing Current Matches List ***********\n----------------------------------------------\n";
            $i = 0;
            if(!empty($matchList)){
                foreach($matchList as $list){
                foreach($list as $listdata){
                    $i++;
                    echo $i.".Name -".$listdata->name."\n \n";
                    echo " status -".$listdata->status ." \n \n Match Type - ".$listdata->matchType . "\n \n venue- ".$listdata->venue," \n \n Date - ".$listdata->date." \n \n Date time GMT - ".$listdata->dateTimeGMT."\n \n ";
                }
            }
        }else{
    echo "Data Not Found";

    }
?>