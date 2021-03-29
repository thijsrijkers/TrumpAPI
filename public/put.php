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

                $sql = "UPDATE $table SET Person = '$data[person]', Text = '$data[text]', Date = '$data[date]'   WHERE ID = '$id';";
  
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