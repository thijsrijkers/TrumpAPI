<?php
class GET 
{
 
    function GetData($databaseName, $selectValue, $tableValue, $whereValue) 
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
                $selectArray = explode("|", $selectValue);
                $tableArray = explode("|", $tableValue);
                
                //The number 66 stands for not entered
                if($whereValue != 66)
                {
                    $whereArray = explode("|", $whereValue);
                }

                $selectString = "SELECT ";

                if(isset($selectArray))
                {
                    foreach($selectArray as $item)
                    {
                        $selectString = "".$selectString." ".$item.", ";
                    }

                    $fromString = substr($selectString, 0, -2);
                    $fromString.= " FROM ";

                    if(isset($tableArray))
                    {
                        foreach($tableArray as $item)
                        {
                            $fromString = "".$fromString." ".$item.", ";
                        }

                        $whereString = substr($fromString, 0, -2);

                        if(isset($whereArray))
                        {
                            $whereString.= " WHERE ";

                            foreach($whereArray as $item)
                            {
                                $WhereClause = explode("=", $item);
                                $whereString = "".$whereString."".$WhereClause[0]." = '$WhereClause[1]' AND ";
                            }

                            $whereString = substr($whereString, 0, -5);
                        }

                        $sql = $whereString;
                        $sql.= ";";
                    }
                    else
                    {
                        header('500 Internal Server Error', true, 404);
                    }
                }
                else
                {
                    header('500 Internal Server Error', true, 404);
                }

                $result = mysqli_query($DBConnect, $sql);  

                if($result)
                {	 	
                    $data = array();  
                
                    while($row = mysqli_fetch_assoc($result))  
                    {  
                        $data[] = $row;
                    }
                    //Zet resultaat om naar JSON
                    echo json_encode($data); 
                }
            }
        }	
    }

}
?>