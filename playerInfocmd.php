 <?php
    $playerList  = array();
    $id          = '77da5a6d-7c67-4a76-9d24-709ba6e5e1d8';
    $apikey      = "%APIKEY%";
    $json_result = file_get_contents('https://api.cricapi.com/v1/players_info?apikey='.$apikey.'&offset=0&id='.$id);
    $series_search_data = json_decode($json_result);    
    if($series_search_data->status != "success") {
        die("FAILED TO GET A SUCCESS RESULT");
    }
    if(!empty($series_search_data)){
        
        $playerList[] = $series_search_data->data;
    }
    echo "********** Showing list of player Info ***********\n----------------------------------------------\n";

    if(!empty($playerList)){
        foreach($playerList as $list){
        if(isset($list->playerImg)) { echo "playerImg - ".$list->playerImg."\n";} 
            if(isset($list->name)) { echo "name - ".$list->name."\n"; } 
            if(isset($list->country)) { echo "country - ".$list->country."\n";} 
            if(isset($list->dateOfBirth)) { echo "dateOfBirth - ".$list->dateOfBirth."\n";} 
            if(isset($list->role)) { echo "role - ".$list->role."\n";} 
            if(isset($list->battingStyle)) { echo "battingStyle - ".$list->battingStyle."\n";} 
            if(isset($list->bowlingStyle)) { echo "bowlingStyle - ".$list->bowlingStyle."\n";} 
            if(isset($list->placeOfBirth)) { echo "placeOfBirth - ".$list->placeOfBirth."\n";} 
            if(isset($list->stats)){
            for($i=0;$i<count($list->stats);$i++){   
                echo "fn - ".$list->stats[$i]->fn." \n ";
                echo " matchtype - ".$list->stats[$i]->matchtype." \n ";
                echo " stat - ".$list->stats[$i]->stat." \n ";
                echo " value -".$list->stats[$i]->value." \n ";
                echo "\n";
            }   
        }else{ echo "No status Found"; } 
    }

    }else{
        echo "Data Not Found";
    }
?>
        


