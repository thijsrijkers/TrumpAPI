var CRUD = "GET";

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
    alert('You have selected: '+CRUD+'');
}
