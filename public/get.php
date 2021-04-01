<?php
class GET
{

    function GetData($dataType, $databaseName, $selectValue, $tableValue, $whereValue) 
    {
        if($databaseName) 
        {		
            $DBConnect = mysqli_connect("localhost", "root", "", $databaseName);

            if ($DBConnect === FALSE)
            {
                echo "500 Internal Server Error";
            } 
            else
            {      
                $selectString = "SELECT "; 

                if($selectValue == "")
                {
                    $selectValue = "*";
                }

                $selectString.= $selectValue;

                $fromString = $selectString;
                $fromString.= " FROM ";
                $fromString.= $tableValue;

                $whereString = $fromString;

                if($whereValue != "")
                {
                    $whereString.= " WHERE ";        
                    $whereString.=$whereValue;
                }

                $sql = $whereString;
                $sql.= ";";
                $g = new GET();
	            $g->ExecuteQuery($dataType,  $tableValue, $DBConnect, $sql);
            }
        }	
    } 

    function ExecuteQuery($dataType, $tableValue, $DBConnect, $sql)
    {

        $result = mysqli_query($DBConnect, $sql);  

        if($result)
        {	 	

            if($dataType == 'application/xml')
            {
                $xml=new SimpleXMLElement("<TrumpAPI/>");
                $xml->addChild('Data','');
                
                switch ($tableValue) {
                    case 'debates':
                        while($row = mysqli_fetch_assoc($result))  
                        {  
                            $xml->Data->addChild('ID',$row["ID"]);
                            $xml->Data->addChild('Speaker',$row["Speaker"]);
                            $xml->Data->addChild('Text',$row["Text"]);
                            $xml->Data->addChild('Date',$row["Date"]);
                        }
                        echo $xml->asXML();
                    break;
                    case 'memes':
                        while($row = mysqli_fetch_assoc($result))  
                        {  
                            $xml->Data->addChild('Timestamp',$row["Timestamp"]);
                            $xml->Data->addChild('ID',$row["ID"]);
                            $xml->Data->addChild('Link',$row["Link"]);
                            $xml->Data->addChild('Caption',$row["Caption"]);
                            $xml->Data->addChild('Author',$row["Author"]);
                            $xml->Data->addChild('Network',$row["Network"]);
                            $xml->Data->addChild('Likes',$row["Likes"]);
                        }
                        echo $xml->asXML();
                    break;
                    case 'tweets':
                        while($row = mysqli_fetch_assoc($result))  
                        {  
                            $xml->Data->addChild('ID',$row["ID"]);
                            $xml->Data->addChild('Handle',$row["Handle"]);
                            $xml->Data->addChild('Text',$row["Text"]);
                            $xml->Data->addChild('Retweet',$row["Retweet"]);
                            $xml->Data->addChild('Author',$row["Author"]);
                            $xml->Data->addChild('Time',$row["Time"]);
                            $xml->Data->addChild('ReplyScreenName',$row["ReplyScreenName"]);
                            $xml->Data->addChild('ReplyStatus',$row["ReplyStatus"]);
                            $xml->Data->addChild('ReplyUser',$row["ReplyUser"]);
                            $xml->Data->addChild('Quote',$row["Quote"]);
                            $xml->Data->addChild('Lang',$row["Lang"]);
                            $xml->Data->addChild('RetweetCount',$row["RetweetCount"]);
                            $xml->Data->addChild('Favorite',$row["Favorite"]);
                            $xml->Data->addChild('URL',$row["URL"]);
                            $xml->Data->addChild('Truncated',$row["Truncated"]);
                            $xml->Data->addChild('Entities',$row["Entities"]);
                            $xml->Data->addChild('ExtendedEntities',$row["ExtendedEntities"]);
                        }
                        echo $xml->asXML();
                    break;
                }
            }
            else
            {
                $data = array();  
        
                while($row = mysqli_fetch_assoc($result))  
                {  
                    $data[] = $row;
                }
                
                echo json_encode($data); 
            }
        }
    }

    function CreateWhereStatement($tableValue, $id)
    {
        $whereValue = "";
        
        if($id != "")
        {
            $whereValue.= "$tableValue.ID = '$id'";
        }
          
        return $whereValue;
    }
}
?>