var CRUD = "GET";
var selectTables = false;

function SetGRUD(){
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
    var dataType = document.getElementById('dataTypeGet').value;
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
    printJsonResult(await response.json());   
    

    document.getElementById("Result").style.display = "block";
}

async function printJsonResult(data) 
{ 
    var items = [];
    $.each(data, function(key, val, val2) {
        items.push("<li id='" + key + "'>" + val["ID"] + "</li>");
        items.push("<li id='" + key + "'>" + val["Person"] + "</li>");
        items.push("<li id='" + key + "'>" + val["Text"] + "</li>");
        items.push("<li id='" + key + "'>" + val["Date"] + "</li>");
        items.push("<br>");
    });

    $("<ul/>", {
        "class": "JsonFromAPI",
        html: items.join("")
    }).appendTo("#Result");    
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
    var idInput = document.getElementById('postID');
    var personInput = document.getElementById('postPerson');
    var textInput =  document.getElementById('postText');
    var dateInput =  document.getElementById('postDate');

    if(idInput.value != "")
    {
        var idInput = document.getElementById('postID').value;
        var personInput = document.getElementById('postPerson').value;
        var textInput =  document.getElementById('postText').value;
        var dateInput =  document.getElementById('postDate').value;
    }
    else
    {
        idInput = "";
        personInput = "";
        textInput =  "";
        dateInput =  "";
    }

    document.getElementById(""+CRUD+"").style.display = "none";

    var getString = "";
    let _body = "";
    if(idInput != "")
    {
        var getString = "http://localhost/TrumpAPI/public/api.php/"+table+"";
        
        _body = {
            id : idInput,
            person : personInput,
            text : textInput,
            date : dateInput
        }
    }
    document.getElementById("Result").style.display = "block";

    return fetch(getString, {
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
    var idInput = document.getElementById('putID');
    var personInput = document.getElementById('putPerson');
    var textInput =  document.getElementById('putText');
    var dateInput =  document.getElementById('putDate');

    if(idInput.value != "")
    {
        var idInput = document.getElementById('putID').value;
        var personInput = document.getElementById('putPerson').value;
        var textInput =  document.getElementById('putText').value;
        var dateInput =  document.getElementById('putDate').value;
    }
    else
    {
        idInput = "";
        personInput = "";
        textInput =  "";
        dateInput =  "";
    }

    document.getElementById(""+CRUD+"").style.display = "none";

    var getString = "";
    let _body = "";
    if(idInput != "")
    {
        var getString = "http://localhost/TrumpAPI/public/api.php/"+table+"/"+idInput+"";
        
        _body = {
            person : personInput,
            text : textInput,
            date : dateInput
        }
        console.log(getString);
        console.log(_body);
    }
    document.getElementById("Result").style.display = "block";

    return fetch(getString, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(_body)
    }).then(document.getElementById('Result').innerText = "Data changed")
}