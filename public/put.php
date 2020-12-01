<?php
class PUT 
{
 
    function UpdateData($databaseName, $table, $setValue, $whereValue) 
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
                $setArray = explode("^", $setValue);

                if($whereValue != 66)
                {
                    $whereArray = explode("^", $whereValue);
                }

                if($table)
                {
                    $updateString = "UPDATE $table";
                    $setString = $updateString;
                }
           
                if(isset($setArray))
                {
                    $setString.= " SET ";

                    foreach($setArray as $item)
                    {
                        $setClause = explode("|", $item);
                        $setString = "".$setString."".$setClause[0]." = '$setClause[1]', ";
                    }

                    $sql = substr($setString, 0, -2);
                }  

                if(isset($whereArray))
                {
                    $whereString = $sql;
                    $whereString.= " WHERE ";

                    foreach($whereArray as $item)
                    {
                        $WhereClause = explode("|", $item);
                        $whereString = "".$whereString."".$WhereClause[0]." = '$WhereClause[1]' OR ";
                    }

                    $sql = substr($whereString, 0, -4);
                }

                $sql.= ";";
                echo $sql;
                $result = mysqli_query($DBConnect, $sql);  
    
                if($result)
                {	 	
                    echo "De row/rows zijn geupdate";
                }
            }
        }	
    }
    
}