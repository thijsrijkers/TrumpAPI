# TrumpAPI
a API that uses datasets of the 2016  elections


<h2> Installation</h2>
Om deze API up and running te krijgen, moeten er bepaalde dingen eerst gebeuren. In de folder 'database' staat een .SQL bestand. Dit is de database waar de API mee gaat communiceren. Hiervoor is tijdens het bouwen PHPmyAdmin gebruikt. Om het .SQL bestand te gebruiken, moet de gebruiker een database aanmaken genaamd: "trumpapi". In deze database moet de .SQL bestand worden geimporteerd. Als dit zonder problemen is gelukt, zal dit direct goed moeten staan.
<br><br><br>
Nu zal een localhost de API moeten kunnen draaien. Voor een localhost wordt XAMPP aanbevolen omdat de API hiermee ook is gedeveloped. Is dit ook allemaal up and running, dan zal de gebruiker eerst de API kunnen testen. Voor het testen van de API door de ontwikkelaar is de volgende Chrome extension gebruikt: https://chrome.google.com/webstore/detail/resteasy/nojelkgnnpdmhpankkiikipkmhgafoch
<br>
Met deze extension kan heel makkelijk request worden aangemaakt on the fly en dit was ook de reden waarom hiervoor is gekozen inplaats van bijvoorbeeld Postman. Alle benodigde informatie om een request aan te maken, zijn gedocumenteerd in het hoofdstuk 'Documentation'.
<br><br><br>
Nu de API ook werkt, kan er naar de applicatie worden genavigeerd. Deze zal te vinden zijn via de volgende link als de gebruiker XAMPP gebruikt: http://localhost/TrumpAPI/application/index.php
<br><br><br>
De applicatie is een makkelijk punt om de API te gebruiken. Eerst zal de benodige crud operatie gekozen moeten worden. Hierna zal de gebruiken zijn gewenste onderwerp moeten selecteren en de bijbehorende informatie moet invullen. Als er nu lokaal gekeken word heeft de gebruiker succesvol de API gebruikt via het programma.
<br><br><br>
Als er meerdere vragen zijn over deze API wordt er graag contact gelegd.
<br><br>

<h2> Changes to XAMPP needed</h2>
<table>
<thead>
<tr>
<th>Change</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td>memory_limit</td>
<td>In your PHP.ini file of your XAMPP you need to change the memory_limit to 1024M because the data can be to great to handle for XAMPP</td>
</tr>
</tbody>
</table>

<br>
<h2> Documentation Examples</h2>

<h3> GET Get debate</h3>
	<pre>
	{url}/{tableValue}</pre>
	http://localhost/TrumpAPI/public/api.php/debates
	<h4>Headers</h4>
	JSON:
	<pre>
	Accept application/json </pre>
	XML:
	<pre>
	Accept application/xml</pre>
<hr>

<h3> GET Get debate by ID</h3>
	<pre>
	{url}/{tableValue}/{idValue}</pre>
	Example: http://localhost/TrumpAPI/public/api.php/debates/5
	<h4>Headers</h4>
	JSON:
	<pre>
	Accept application/json </pre>
	XML:
	<pre>
	Accept application/xml</pre>
<hr>


<h3> POST Create new debate</h3>
<pre>
{url}/{tableValue}</pre>
Example: http://localhost/TrumpAPI/public/api.php/debates
<h4>Headers</h4>
JSON:
<pre>
Content-Type application/json </pre>
XML:
<pre>
Content-Type application/xml</pre>

<h4>Body</h4>
JSON:
<pre>
{
   "id": "469",
   "person" : "thijs",
   "text" : "test",
   "date"    : "10/26/16"
}
</pre>

XML:
```xml
<body>
	<id> 469 </id>
	<person> thijs </person>
	<text> test </text>
	<date> 10/26/16 </date>
</body>
```
<hr>


<h3> PUT Edit a debate</h3>
<pre>
{url}/{tableValue}/{idValue}</pre>
Example: http://localhost/TrumpAPI/public/api.php/debates/469
<h4>Headers</h4>
JSON:
<pre>
Content-Type application/json </pre>
XML:
<pre>
Content-Type application/xml</pre>

<h4>Body</h4>
JSON:
<pre>
{
   "person" : "Changed",
   "text" : "Changed",
   "date"    : "10/26/16"
}
</pre>

XML:
```xml
<body>
	<person> Changed </person>
	<text> Changed </text>
	<date> 10/26/16 </date>
</body>
```
<hr>


<h3> Delete a debate by ID</h3>
<pre>
{url}/{tableValue}/{idValue}</pre>
Example: http://localhost/TrumpAPI/public/api.php/debates/469




<h2> Documentation</h2>
<h3> URL API conventions</h3>

<table>
<thead>
<tr>
<th>URL convention for CRUD usage</th>
<th>Description</th>
</tr>
</thead>
<tbody>
 
<tr>
<td>Standard begin of URL</td>
<td>http://localhost/TrumpAPI/public/api.php/</td>
</tr>
<tr>
<td>GET</td>
<td>{tableValue}</td>
</tr>
<tr>
<td>GET with id</td>
<td>{tableValue}/{idValue}</td>
</tr>
<tr>
<td>PUT</td>
<td>{tableValue}/{idValue}</td>
</tr>
<tr>
<td>POST</td>
<td>{tableValue}</td>
</tr>
<tr>
<td>DELETE</td>
<td>{tableValue}/{idValue}</td>
</tr>
</tbody>
</table>

<b> A example of a GET url: http://localhost/TrumpAPI/public/api.php/debates/69</b>

<br>
<h3> Headers for request</h3>

<table>
<thead>
<tr>
<th>API request</th>
<th>XML</th>
 <th>JSON</th>
</tr>
</thead>
<tbody>
 
<tr>
<td>GET</td>
<td>Accept application/xml</td>
<td>Accept application/json</td>
</tr>

<tr>
<td>DELETE</td>
<td>N.V.T</td>
<td>N.V.T</td>
</tr>

<tr>
<td>PUT</td>
<td>Content-Type application/xml</td>
<td>Content-Type application/json</td>
</tr>
<tr>
<td>POST</td>
<td>Content-Type application/xml</td>
<td>Content-Type application/json</td>
</tr>
</tbody>
</table>
<h3> Commit conventions</h3>
<table>
<thead>
<tr>
<th>Commit convention</th>
<th>Description</th>
</tr>
</thead>
<tbody>
 
<tr>
<td>+</td>
<td>A new addition to the project or a general addition</td>
</tr>
<tr>
<td>+-</td>
<td>A change in the project</td>
</tr>
<td>-</td>
<td>Something is removed form the project</td>
</tr>
</tbody>
</table>
