<?php
class PUT 
{
 
    function UpdateData($dataType, $databaseName, $table, $id, $body) 
    {
        if($databaseName) 
        {		
            $DBConnect = mysqli_connect("localhost", "root", "", $databaseName);
            
            if ($DBConnect === FALSE)
            {
                echo "<p>Unable to connect to the database server.</p>"
                    . "<p>Error code " . mysqli_errno() . ": "
                    . mysqli_error() . "</p>";
            } 
            else
            {
                if($dataType[0] == 'application/xml')
                {
                    $xml = simplexml_load_string($body, "SimpleXMLElement", LIBXML_NOCDATA);
                    $json = json_encode($xml);
                    $data = json_decode($json, true);
                }
                else
                {
                    $data = json_decode($body, true);
                }

                $sql ="";

                if($table == "debates")
                {
                    $sql = "UPDATE $table SET Speaker = '$data[speaker]', Text = '$data[text]', Date = '$data[date]'   WHERE ID = '$id';";
                }

                if($table == "memes")
                {
                    $sql = "UPDATE $table SET `Timestamp` =  '$data[timestamp]', `Link` = '$data[link]', `Caption` = '$data[caption]', `Author`  = '$data[author]', `Network`  = '$data[network]', `Likes`  = '$data[likes]'   WHERE ID = '$id';";
                }

                if($table == "tweets")
                {
                    $sql = "UPDATE $table SET `Handle` =  '$data[handle]', `Text` =  '$data[text]', `Retweet` =  '$data[retweet]', `Author` =  '$data[author]', `Time` =  '$data[time]', `ReplyScreenName` =  '$data[replyscreenname]', `ReplyStatus` =  '$data[replystatus]', `ReplyUser` =  '$data[replyuser]', `Quote` =  '$data[quote]', `Lang` =  '$data[lang]', `RetweetCount` =  '$data[retweetcount]', `Favorite` =  '$data[favorite]', `URL` =  '$data[url]', `Truncated` =  '$data[truncated]', `Entities` =  '$data[entities]', `ExtendedEntities` =  '$data[extendedentities]'   WHERE ID = '$id';";
                }
            
  
                $result = mysqli_query($DBConnect, $sql);  
    
                if($result)
                {	 	
                    echo "De row/rows zijn geupdate";
                }
                else{
                    echo "500 Internal Server Error last";
                }
            }
        }	
    }
    
}