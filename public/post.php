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

                $sql = "INSERT INTO `$table` (`ID`, `Person`, `Text`, `Date`) VALUES ('$data[id]', '$data[person]', '$data[text]', '$data[date]')";	
                
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