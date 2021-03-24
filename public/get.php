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

                if($whereValue != "")
                {
                    $whereString.= " WHERE ";        
                    $whereString.=$whereValue;
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

            if($dataType == 'application/xml')
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
            else
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
?>