<input type="checkbox" id="getDebate" name="getDebate"  onclick="SetCheckboxOption('Debate')">
<label for="getDebate"> Debates</label><br>
<input type="checkbox" id="getMemes" name="getMemes"  onclick="SetCheckboxOption('Memes')">
<label for="getMemes">Memes</label><br>
<input type="checkbox" id="getTweets" name="getTweets"  onclick="SetCheckboxOption('Tweets')">
<label for="getTweets"> Tweets</label><br>

<div id="Debate"></div>
<div id="Memes"></div>
<div id="Tweets"></div>

<script> 
    document.getElementById("Debate").style.display = "none";
    document.getElementById("Memes").style.display = "none";
    document.getElementById("Tweets").style.display = "none";
</script>