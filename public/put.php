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
                $sql = "UPDATE $table SET $setValue WHERE $whereValue;";

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

    function CreateSet($setValue)
    {
 
        $substr = '=';
        $attachment = "'";

        $setValue  = str_replace($substr, $substr.$attachment, $setValue);
        $setValue.="'";

        return $setValue;
    }

    function CreateWhere($whereValue)
    {
 
        $substr = '=';
        $attachment = "'";

        $whereValue  = str_replace($substr, $substr.$attachment, $whereValue);
        $whereValue.="'";

        return $whereValue;
    }
    
}