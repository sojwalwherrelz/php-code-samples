<?php

        $matchList   = array();
        $apikey      = "%APIKEY%";
        $id          ="119f27e8-cb92-4ddf-b275-a2d265cec2dd";
        $json_result = file_get_contents('https://api.cricapi.com/v1/match_squad?apikey='.$apikey.'&offset=0&id='.$id);
        $series_search_data = json_decode($json_result);
        if($series_search_data->status != "success") {
            die("FAILED TO GET A SUCCESS RESULT");
        }
        if(!empty($series_search_data)){
            
            $matchList[] = $series_search_data->data;
        }
        echo "********** Showing list of Fantacy match Squad ***********\n----------------------------------------------\n";

        if(!empty($matchList)){
            foreach($matchList as $list){
            foreach($list as $listdata){

            echo " \n Name - ".$listdata->teamName."\n \n";
            if(isset($listdata->players)) { 
            for($i=0;$i<count($listdata->players);$i++){
                    echo "\n ";
                    if(isset($listdata->players[$i]->name)) 
                    {
                    echo " Player Name - ".$listdata->players[$i]->name."\n";
                }
                if(isset($listdata->players[$i]->role)) 
                {
                    echo " Role - ".$listdata->players[$i]->role."\n";
                }
                if(isset($listdata->players[$i]->battingStyle)) 
                {
                    echo " Batting Style  -".$listdata->players[$i]->battingStyle."\n";
                }
                if(isset($listdata->players[$i]->bowlingStyle)) 
                {
                        echo " Bowling Style - ".$listdata->players[$i]->bowlingStyle."\n";
                }                            
            }
            }else{ echo "No players Data Found"; }
            
            }
        }
        }else{
            echo "Data Not Found";
        }
    
?>
       
