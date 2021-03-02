<?php
class DELETE 
{
 
    function DeleteData($databaseName, $table, $userinfo) 
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

                if($infoArray && $table)
                {
                    $sql = "DELETE FROM `$table` WHERE ";

                    foreach($infoArray as $item)
                    {
                        $WhereClause = explode("=", $item);
                        $sql = "".$sql."".$WhereClause[0]." = '$WhereClause[1]' AND ";
                    }

                    $sql = substr($sql, 0, -5);
                    $result = mysqli_query($DBConnect, $sql);  
    
                    if($result)
                    {	 	
                        echo "De row/rows zijn verwijderd";
                    }
                }
            }
        }	
    }   
}