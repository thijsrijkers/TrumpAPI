<!DOCTYPE html>
<html lang="en">
    <head> 
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/home.css">
        <script src="js/application.js"></script>
    </head> 
    <body> 
        <div id="MainContainer">
            <div id="OptionContainer">
                <div id="NavBar">
                    <h1>TrumpAPI Processor </h1>
                </div>
                <div id="Home">
                    <?php include 'home.php';?>
                </div>
                <div id="GET">
                    <?php include 'get.php';?>
                </div>
                <div id="POST">
                   
                </div>
                <div id="PUT">
                    
                </div>
                <div id="DELETE">
                   
                </div>
                <div id="Result">
                    
                </div>
            </div>
        </div>
        <script> 
            document.getElementById("GET").style.display = "none";
            document.getElementById("POST").style.display = "none";
            document.getElementById("PUT").style.display = "none";
            document.getElementById("DELETE").style.display = "none";
            document.getElementById("Result").style.display = "none";
        </script>
    </body> 
 </html>    
  