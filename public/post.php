<?php
class POST 
{
 
    function InsertData($dataType, $databaseName, $table, $body) 
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
                    $sql = "INSERT INTO `$table` (`ID`, `Speaker`, `Text`, `Date`) VALUES ('$data[id]', '$data[speaker]', '$data[text]', '$data[date]')";	
                }

                if($table == "memes")
                {
                    $sql = "INSERT INTO `$table` (`Timestamp`, `ID`, `Link`, `Caption`, `Author`, `Network`, `Likes`) VALUES ('$data[timestamp]', '$data[id]', '$data[link]', '$data[caption]', '$data[author]', '$data[network]', '$data[likes]')";	
                }

                if($table == "tweets")
                {
                    $sql = "INSERT INTO `$table` (`ID`, `Handle`, `Text`, `Retweet`, `Author`, `Time`, `ReplyScreenName`, `ReplyStatus`, `ReplyUser`, `Quote`, `Lang`, `RetweetCount`, `Favorite`, `URL`, `Truncated`, `Entities`, `ExtendedEntities`) VALUES ('$data[id]', '$data[handle]', '$data[text]', '$data[retweet]', '$data[author]', '$data[time]', '$data[replyscreenname]', '$data[replystatus]', '$data[replyuser]', '$data[quote]', '$data[lang]', '$data[retweetcount]', '$data[favorite]', '$data[url]', '$data[truncated]', '$data[entities]', '$data[extendedentities]')";	
                }
                
				$result = mysqli_query($DBConnect, $sql);  
                
				if($result)
				{	 	
					echo "De row/rows zijn toegevoegd";
				}
				else
				{
					echo "500 Internal Server Error last";
				}
            }
        }	
    }   
}