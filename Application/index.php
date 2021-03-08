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
                    <?php include 'extensions/home.php';?>
                </div>
                <div id="GET">
                    <?php include 'extensions/get.php';?>
                </div>
                <div id="POST">
                    <?php include 'extensions/post.php';?>
                </div>
                <div id="PUT">
                    <?php include 'extensions/put.php';?>
                </div>
                <div id="DELETE">
                    <?php include 'extensions/delete.php';?>
                </div>
                <div id="Result">
                    <?php include 'extensions/result.php';?>
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
  