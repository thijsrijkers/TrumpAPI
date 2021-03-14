<?php
class GET
{

    function GetData($dataType, $databaseName, $selectValue, $tableValue, $whereValue) 
    {
        if($databaseName) 
        {		
            $DBConnect = mysqli_connect("localhost", "root", "", $databaseName);

            if ($DBConnect === FALSE)
            {
                echo "500 Internal Server Error";
            } 
            else
            {      
                $selectString = "SELECT "; 

                if($selectValue == "")
                {
                    $selectValue = "*";
                }

                $selectString.= $selectValue;

                $fromString = $selectString;
                $fromString.= " FROM ";
                $fromString.= $tableValue;

                $whereString = $fromString;

                if($whereValue != 66)
                {
                    $whereString.= " WHERE ";        
                    $whereString.=$whereValue;
                    $whereString = substr($whereString, 0, -5);
                }

                $sql = $whereString;
                $sql.= ";";
            
                $g = new GET();
	            $g->ExecuteQuery($dataType, $DBConnect, $sql);
            }
        }	
    } 

    function ExecuteQuery($dataType, $DBConnect, $sql)
    {

        $result = mysqli_query($DBConnect, $sql);  

        if($result)
        {	 	
            
            if($dataType == "XML")
            {
                $xml=new SimpleXMLElement("<TrumpAPI/>");
                $xml->addChild('Data','');
                
                while($row = mysqli_fetch_assoc($result))  
                {  
                    $xml->Data->addChild('ID',$row["ID"]);
                    $xml->Data->addChild('Person',$row["Person"]);
                    $xml->Data->addChild('Text',$row["Text"]);
                    $xml->Data->addChild('Date',$row["Date"]);
                }
                echo $xml->asXML();

            }
            else if($dataType == "JSON")
            {
                $data = array();  
        
                while($row = mysqli_fetch_assoc($result))  
                {  
                    $data[] = $row;
                }
                
                echo json_encode($data); 
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
?>