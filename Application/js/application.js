var CRUD = "GET";
var selectTables = false;

function SetGRUD()
{
    CRUD = document.getElementById('CRUD').value;

    document.getElementById("Home").style.display = "none";
    document.getElementById(""+CRUD+"").style.display = "block";
}

function SetCheckboxOption(value)
{
    var checkBox = document.getElementById("get"+value+"");
    if (checkBox.checked == true){
        document.getElementById("queryInfo").style.display = "block";
        selectTables = true;
    } else {
        document.getElementById("queryInfo").style.display = "none";
        selectTables = false;
    }

    SetGetButton();
}

function SetGetButton()
{
    if (selectTables != true){
        document.getElementById("GetButton").style.display = "block";
    } else {
        document.getElementById("GetButton").style.display = "none";
    }
}

async function GetInfo()
{
    var table = document.getElementById('tableGet').value;
    var idInput = document.getElementById('getID');
    if(idInput.value != "")
    {
        var idInput = document.getElementById('getID').value;
    }
    else
    {
        idInput = ""
    }

    document.getElementById(""+CRUD+"").style.display = "none";

    var getString = "";
    if(idInput != "")
    {
        var getString = "http://localhost/TrumpAPI/public/api.php/"+table+"/"+idInput+""
    }
    else
    {
        var getString = "http://localhost/TrumpAPI/public/api.php/"+table+""
    }
    
    const myRequest = new Request(getString, {
        method: 'GET',
        headers: {
            'Accept': 'application/json'
        }
    });
        
    var response = await fetch(myRequest)
    //console.log(await response.json()); 
    printJsonResult(await response.json(), table);   
    

    document.getElementById("Result").style.display = "block";
}

async function printJsonResult(data, table) 
{ 
    switch (table) {
    case "Debates":
        var items = [];
        $.each(data, function(key, val, val2) {
            items.push("<li id='" + key + "'>" + val["ID"] + "</li>");
            items.push("<li id='" + key + "'>" + val["Speaker"] + "</li>");
            items.push("<li id='" + key + "'>" + val["Text"] + "</li>");
            items.push("<li id='" + key + "'>" + val["Date"] + "</li>");
            items.push("<br>");
        });
    
        $("<ul/>", {
            "class": "JsonFromAPI",
            html: items.join("")
        }).appendTo("#Result");   
      break;
    case "Memes":
        var items = [];
        $.each(data, function(key, val, val2) {
            items.push("<li id='" + key + "'>" + val["Timestamp"] + "</li>");
            items.push("<li id='" + key + "'>" + val["ID"] + "</li>");
            items.push("<li id='" + key + "'>" + val["Link"] + "</li>");
            items.push("<li id='" + key + "'>" + val["Caption"] + "</li>");
            items.push("<li id='" + key + "'>" + val["Author"] + "</li>");
            items.push("<li id='" + key + "'>" + val["Network"] + "</li>");
            items.push("<li id='" + key + "'>" + val["Likes"] + "</li>");
            items.push("<br>");
        });
    
        $("<ul/>", {
            "class": "JsonFromAPI",
            html: items.join("")
        }).appendTo("#Result");   
      break;
    case "Tweets":
        var items = [];
        $.each(data, function(key, val, val2) {
            items.push("<li id='" + key + "'>" + val["ID"] + "</li>");
            items.push("<li id='" + key + "'>" + val["Handle"] + "</li>");
            items.push("<li id='" + key + "'>" + val["Text"] + "</li>");
            items.push("<li id='" + key + "'>" + val["Retweet"] + "</li>");
            items.push("<li id='" + key + "'>" + val["Author"] + "</li>");
            items.push("<li id='" + key + "'>" + val["Time"] + "</li>");
            items.push("<li id='" + key + "'>" + val["ReplyScreenName"] + "</li>");
            items.push("<li id='" + key + "'>" + val["ReplyStatus"] + "</li>");
            items.push("<li id='" + key + "'>" + val["ReplyUser"] + "</li>");
            items.push("<li id='" + key + "'>" + val["Quote"] + "</li>");
            items.push("<li id='" + key + "'>" + val["Lang"] + "</li>");
            items.push("<li id='" + key + "'>" + val["RetweetCount"] + "</li>");
            items.push("<li id='" + key + "'>" + val["Favorite"] + "</li>");
            items.push("<li id='" + key + "'>" + val["URL"] + "</li>");
            items.push("<li id='" + key + "'>" + val["Truncated"] + "</li>");
            items.push("<li id='" + key + "'>" + val["Entities"] + "</li>");
            items.push("<li id='" + key + "'>" + val["ExtendedEntities"] + "</li>");
            items.push("<br>");
        });
    
        $("<ul/>", {
            "class": "JsonFromAPI",
            html: items.join("")
        }).appendTo("#Result");   
      break;
    } 
}

function DeleteInfo()
{
    var table = document.getElementById('tableDelete').value;
    var idInput = document.getElementById('deleteID');

    if(idInput.value != "")
    {
        var idInput = document.getElementById('deleteID').value;
    }
    else
    {
        idInput = ""
    }

    document.getElementById(""+CRUD+"").style.display = "none";

    var getString = "";
    if(idInput != "")
    {
        var getString = "http://localhost/TrumpAPI/public/api.php/"+table+"/"+idInput+""
    } 

    document.getElementById("Result").style.display = "block";

    return fetch(getString, {
        method: 'DELETE'
    }).then(document.getElementById('Result').innerText = "Data deleted")
}

function PostInfo()
{
    var table = document.getElementById('tablePost').value;
    var postString = "http://localhost/TrumpAPI/public/api.php/"+table+"";
    let _body = "";

    if(table == "debates")
    {
        if(document.getElementById('post1').value != "")
        {
            document.getElementById(""+CRUD+"").style.display = "none";
            
            _body = {
                id : document.getElementById('post1').value,
                speaker : document.getElementById('post2').value,
                text : document.getElementById('post3').value,
                date : document.getElementById('post4').value
            }  
        }  
    }

    if(table == "memes")
    {
        if(document.getElementById('post2').value != "")
        {
            document.getElementById(""+CRUD+"").style.display = "none";
            
            _body = {
                timestamp : document.getElementById('post1').value,
                id : document.getElementById('post2').value,
                link : document.getElementById('post3').value,
                Caption : document.getElementById('post4').value,
                author : document.getElementById('post5').value,
                network : document.getElementById('post6').value,
                likes : document.getElementById('post7').value
            }  
        }  
    }

    if(table == "tweets")
    {
        if(document.getElementById('post1').value != "")
        {
            document.getElementById(""+CRUD+"").style.display = "none";
            
            _body = {
                id : document.getElementById('post1').value,
                handle : document.getElementById('post2').value,
                text : document.getElementById('post3').value,
                text : document.getElementById('post4').value,
                retweet : document.getElementById('post5').value,
                author : document.getElementById('post6').value,
                time : document.getElementById('post7').value,
                replyscreenname : document.getElementById('post8').value,
                replystatus : document.getElementById('post9').value,
                replyuser : document.getElementById('post10').value,
                favorite : document.getElementById('post11').value,
                url : document.getElementById('post12').value,
                truncated : document.getElementById('post13').value,
                entities : document.getElementById('post14').value,
                extendedentities : document.getElementById('post15').value
            }  
        }  
    }
    document.getElementById("Result").style.display = "block";

    return fetch(postString, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(_body)
    }).then(document.getElementById('Result').innerText = "Data posted") 
}


function PutInfo()
{
    var table = document.getElementById('tablePut').value;
    var idInput = document.getElementById('putID').value;
    var putString = "http://localhost/TrumpAPI/public/api.php/"+table+"/"+idInput+"";
    let _body = "";

    if(table == "debates")
    {
        document.getElementById(""+CRUD+"").style.display = "none";
        
        _body = {
            speaker : document.getElementById('put1').value,
            text : document.getElementById('put2').value,
            date : document.getElementById('put3').value
        }   
    }

    if(table == "memes")
    {
        document.getElementById(""+CRUD+"").style.display = "none";
    
        _body = {
            timestamp : document.getElementById('put1').value,
            link : document.getElementById('put2').value,
            Caption : document.getElementById('put3').value,
            author : document.getElementById('put4').value,
            network : document.getElementById('put5').value,
            likes : document.getElementById('put6').value
        }    
    }

    if(table == "tweets")
    {
        document.getElementById(""+CRUD+"").style.display = "none";

        _body = {
            handle : document.getElementById('put1').value,
            text : document.getElementById('put2').value,
            text : document.getElementById('put3').value,
            retweet : document.getElementById('put4').value,
            author : document.getElementById('put5').value,
            time : document.getElementById('put6').value,
            replyscreenname : document.getElementById('put7').value,
            replystatus : document.getElementById('put8').value,
            replyuser : document.getElementById('put9').value,
            favorite : document.getElementById('put10').value,
            url : document.getElementById('put11').value,
            truncated : document.getElementById('put12').value,
            entities : document.getElementById('put13').value,
            extendedentities : document.getElementById('put14').value
        }    
    }

    document.getElementById("Result").style.display = "block";

    return fetch(putString, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(_body)
    }).then(document.getElementById('Result').innerText = "Data changed")
}