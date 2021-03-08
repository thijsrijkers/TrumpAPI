<h3>Selecteer u data source</h3>
<input type="checkbox" id="getDebate" name="getDebate"  onclick="SetCheckboxOption('Debate')">
<label for="getDebate"> Debates</label><br>
<input type="checkbox" id="getMemes" name="getMemes"  onclick="SetCheckboxOption('Memes')">
<label for="getMemes">Memes</label><br>
<input type="checkbox" id="getTweets" name="getTweets"  onclick="SetCheckboxOption('Tweets')">
<label for="getTweets"> Tweets</label><br>
<br>
<div id="Debate">
   <h3> Debate</h3>
    ID     = <input type="text"name="getID"><br>
    Person = <input type="text"name="getPerson"><br>
    Text   = <input type="text"name="getText"><br>
    Date   = <input type="text"name="getDate"><br>
</div>
<br>
<div id="Memes">
    <h3> Memes</h3>
    ID     = <input type="text"name="getID"><br>
    Person = <input type="text"name="getPerson"><br>
    Text   = <input type="text"name="getText"><br>
    Date   = <input type="text"name="getDate"><br>
    Text   = <input type="text"name="getText"><br>
    Date   = <input type="text"name="getDate"><br>
</div>
<br>
<div id="Tweets">
    <h3> Tweets</h3>
    ID     = <input type="text"name="getID"><br>
    Person = <input type="text"name="getPerson"><br>
    Text   = <input type="text"name="getText"><br>
    Date   = <input type="text"name="getDate"><br>
</div>
<br>
<button id="GetButton" onclick="GetInfo()"> Volgende </button>

<script> 
    document.getElementById("Debate").style.display = "none";
    document.getElementById("Memes").style.display = "none";
    document.getElementById("Tweets").style.display = "none";
    document.getElementById("GetButton").style.display = "none";
</script>