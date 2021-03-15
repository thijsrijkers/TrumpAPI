<?php
class DELETE 
{
 
    function DeleteData($databaseName, $table, $whereValue) 
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
                $sql = "";

   
                $sql = "DELETE FROM `$table` WHERE ";
                $sql.=$whereValue;

                $result = mysqli_query($DBConnect, $sql);  

                if($result)
                {	 	
                    echo "De row/rows zijn verwijderd";
                }
                
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