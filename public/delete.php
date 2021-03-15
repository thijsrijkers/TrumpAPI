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
                $sql = substr($sql, 0, -5);

                $result = mysqli_query($DBConnect, $sql);  

                if($result)
                {	 	
                    echo "De row/rows zijn verwijderd";
                }
                
            }
        }	
    }
    
    function CreateWhereStatement($tableValue, $id, $person, $text, $date)
    {
        $whereSet = false;

        if($id == "" && $person == "" && $text == "" && $date == "")
        {
            $whereValue = 66;
        }
        else
        {
            $whereValue = "";

            if($id != "" && $whereSet == false)
            {
                $whereValue.= "$tableValue.ID = '$id' AND ";
                //$whereSet = true;
            }
    
            if($person != "" && $whereSet == false)
            {
                $whereValue.= "$tableValue.Person = '$person' AND ";
                //$whereSet = true;
            }
    
            if($text != "" && $whereSet == false)
            {
                $whereValue.= "$tableValue.Text = '$text' AND ";
                //$whereSet = true;
            }
    
            if($date != "" && $whereSet == false)
            {
                $whereValue.= "$tableValue.Date = '$date' AND ";
                //$whereSet = true;
            }
        }
        return $whereValue;
    }
}