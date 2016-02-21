
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>dbpedia project</title>
</head>
<body>

<div id="wrap">

<div id="header">
<h1><a href="#">Semantic Country Search</a></h1>
</div>

<div id="menu">
<ul>
			<li><a href="http://localhost:1234/dbpedia/project/a.php">Home</a></li>
               <li><a href="http://localhost:1234/dbpedia/project/about.php">About</a></li>               
               <li><a href="http://localhost:1234/dbpedia/project/DOC.php">Documentation</a></li>

</ul>
</div>

<div id="contentwrap"> 

<div id="content">

<h2><a href="#">Semantic Country</a></h2>

<p>
In this project i tried to create a semantic web site witch can display all the data from a certain Country. All the data comes from DBPedia and after it is fragmentet, it submitted to the page.
</p>


<p>
The spaql query that returns all the data is 
<ol>
<li>SELECT DISTINCT * WHERE {</li>

<li>?country rdf:type dbo:Country .</li>

<li> rdfs:label ?label .</li>

<li> dbo:capital ?krye .</li>

<li> ?country dbo:thumbnail ?flamuri.</li>

<li>?country dbo:abstract ?desc. </li>

<li>OPTIONAL{?country dbo:currency ?paraja}</li>
	
<li>OPTIONAL{?country dbp:populationCensus ?popullsia} </li>

<li>OPTIONAL{?country dbp:populationCensus ?popullsia}.</li>

<li> OPTIONAL{?country geo:lat ?lat}.</li>

<li> OPTIONAL{?country geo:long ?long}</li>

<li> OPTIONAL{?paraja rdfs:label ?eparaja}</li>

<li>OPTIONAL{?country foaf:homepage ?web.}</li>

<li>OPTIONAL{?country dbp:officialLanguages ?lang}</li>

<li>OPTIONAL{?country dbp:conventionalLongName ?fullname}</li>

<li>?country dcterms:subject category:'.$abc.'.</li>

<li>?krye rdfs:label ?ekrye</li>

<li>FILTER(langMatches(lang(?ekrye), "EN"))</li>

<li>FILTER(langMatches(lang(?label), "EN"))</li>

<li>FILTER(langMatches(lang(?eparaja), "EN"))</li>

<li>FILTER(langMatches(lang(?desc), "EN"))</li>
</ol></br>

</p>

</div>
  
    
   
    
   
    

 



<div style="clear: both;"> </div>

</div>

<div id="footer">
<p>&copy; Copyright 2015 You | Design by Ylber Xhambazi </p></div>

</div>

</body>
</html>
?>