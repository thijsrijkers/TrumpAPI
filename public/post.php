<?php
class POST 
{
 
    function InsertData($databaseName, $table, $userinfo) 
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
                $infoArray = explode("|", $userinfo);

                $sql = "";

                switch ($table) {
                    case "debate":
                        $sql = "INSERT INTO `$table` (`ID`, `Person`, `Text`, `Date`) VALUES (";		
                        break;
                    case "memes":
                        $sql = "INSERT INTO `$table` (`ID`, `Link`, `Text`, `Date`, `Source`) VALUES (";				
                        break;
                    case "tweets":
                        $sql = "INSERT INTO `$table` (`ID`, `Person`, `Text`, `Date`, `Retweet`, `Likes`) VALUES (";		
                        break;
                }
                if(isset($infoArray))
                {
                    foreach($infoArray as $item)
                    {
                        $item = str_replace("@", "/", "$item");
                        $sql= "".$sql."'".$item."', ";
                    }
                    $sql = substr($sql, 0, -2);
                    $sql= "".$sql.")";
                }
                else
                {
                    header('500 Internal Server Error first', true, 404);
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