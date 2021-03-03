# TrumpAPI
a API that uses datasets of the 2016  elections

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

<h2> Documentation</h2>
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

<h3> URL API conventions</h3>
<table>
<thead>
<tr>
<th>URL symbol convention</th>
<th>Description</th>
</tr>
</thead>
<tbody>
 
<tr>
<td>|</td>
<td>This means a AND statement, for example if you want two tables: FROM debate, tweets.</td>
</tr>
<tr>
<td>=</td>
<td>This symbol stands for the = symbol in a SQL query. This will be used if you want to use a where for example</td>
</tr>
<td>@</td>
<td>Because a extra / in your URL can mess with the API, this is the replacement for in the URL. For example you want to use a data, instead of 09/01/2021 you write for the URL 09@01@2021</td>
</tr>
</tr>
<td>66</td>
<td>Because the user can choose to not use a where in a get for example you need to enter 66 to say to the API that there is no where clause necessary</td>
</tr>
</tbody>
</table>

<br>

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
<td>get/{databasename}/{selectValue}/{tableValue}/{whereValue}</td>
</tr>
<tr>
<td>PUT</td>
<td>put/{databasename}/{tableValue}/{setValue}/{whereValue}</td>
</tr>
<tr>
<td>POST</td>
<td>post/{databasename}/{tableValue}/{userInfo}</td>
</tr>
<tr>
<td>DELETE</td>
<td>delete/{databasename}/{tableValue}/{userInfo}</td>
</tr>
</tbody>
</table>
