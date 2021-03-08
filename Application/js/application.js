var CRUD = "GET";
var countSelectTables = 0;

function SetGRUD(){
    CRUD = document.getElementById('CRUD').value;

    if(CRUD == "GET")
    {
        let url = 'http://localhost/TrumpAPI/public/api.php/trumpapi/*/debate/Text=(APPLAUSE)';

        fetch(url)
        .then(res => res.json())
        .then((out) => {
        console.log('Checkout my JSON ', out);
        })
        .catch(err => { throw err });

    }
    document.getElementById("Home").style.display = "none";
    document.getElementById(""+CRUD+"").style.display = "block";
    alert('You have selected: '+CRUD+'');
}

function SetCheckboxOption(value)
{
    var checkBox = document.getElementById("get"+value+"");
    if (checkBox.checked == true){
        document.getElementById(""+value+"").style.display = "block";
        countSelectTables++;
    } else {
        document.getElementById(""+value+"").style.display = "none";
        countSelectTables--;
    }

    SetGetButton();
}

function SetGetButton()
{
    if (countSelectTables != 0){
        document.getElementById("GetButton").style.display = "block";
    } else {
        document.getElementById("GetButton").style.display = "none";
    }
}

