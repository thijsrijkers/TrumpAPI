<?php
class POST 
{
 
    function InsertData($databaseName, $table, $id, $person, $text, $date) 
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
                if($id == "" || $person == "" || $text == "" || $date == "")
                {
                    echo "500 Internal Server Error last";
                    return;
                }

                $sql = "INSERT INTO `$table` (`ID`, `Person`, `Text`, `Date`) VALUES ('$id', '$person', '$text', '$date')";	
                
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