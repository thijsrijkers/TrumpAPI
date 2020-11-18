<?php
class POST 
{
 
    function InsertData($databaseName, $table) 
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
                ///
                ///
                /// QUERY STATEMENT
                ///
                ///
            }
        }	
    }
    
}