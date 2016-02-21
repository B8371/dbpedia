<html>
		<head>
			<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
			<link rel="stylesheet" type="text/css" href="style.css" />
		  <title>dbpedia project</title>
		</head>
	<body>
	<div id="wrap">
		<div id="menu">
            <ul>
               <li><a href="a.php">Home</a></li>
               <li><a href="about.php">About</a></li>               
               <li><a href="DOC.php">Documentation</a></li>
            </ul>
         </div>
		<div id="header">
            <h1><a href="a.php">Semantic Country Search</a></h1>
         </div>
         
        <div id="contentwrap">
		
			<div style="color:black">
		<h1>List of the Countries</h1>
		
		
		<form action="" method="get">
			<select name="abc">


<?php

    set_include_path(get_include_path() . PATH_SEPARATOR . '../lib/');
	require_once "EasyRdf.php";
	require_once "html_tag_helpers.php";
	
    EasyRdf_Namespace::set('category', 'http://dbpedia.org/resource/Category:');
    EasyRdf_Namespace::set('dbpedia', 'http://dbpedia.org/resource/');
    EasyRdf_Namespace::set('dbo', 'http://dbpedia.org/ontology/');
    EasyRdf_Namespace::set('dbp', 'http://dbpedia.org/property/');
	EasyRdf_Namespace::set('dcterms', 'http://purl.org/dc/terms/');
	EasyRdf_Namespace::set('owl', 'http://www.w3.org/2002/07/owl#');
	EasyRdf_Namespace::set('xsd', 'http://www.w3.org/2001/XMLSchema#');
	EasyRdf_Namespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
	EasyRdf_Namespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
	EasyRdf_Namespace::set('dcterms', 'http://purl.org/dc/terms/');
	EasyRdf_Namespace::set('dcterms', 'http://purl.org/dc/terms/');
    
	$sparql1 = new EasyRdf_Sparql_Client('http://dbpedia.org/sparql');
	$sparql2 = new EasyRdf_Sparql_Client('http://wifo5-03.informatik.uni-mannheim.de/factbook/snorql/')
?>	
<?php

    $result = $sparql1->query(
        'SELECT * WHERE {'.
        '  ?country rdf:type dbo:Country .'.
        '  ?country rdfs:label ?label .'.
        '  ?country dc:subject category:Member_states_of_the_United_Nations .'.
        '  FILTER ( lang(?label) = "en" )'.
        '} ORDER BY ?label'
    );
	
    foreach ($result as $row) {
        echo "<option value=".($row->label).">".($row->label)."</option>";
    }
	
?>

			</select>
			<input button class="" name="button1" type="submit">
		</form>
	<p>Total number of countries: <?= $result->numRows() ?></p>

<div id="content">
		<table border="1">

<?php
error_reporting(0);
if(isset($_GET['abc'])) {
	$abc = $_GET['abc'];
	
	$result1 = $sparql1->query(
		'SELECT distinct * WHERE {'.
		'	?country rdf:type dbo:Country;'.
		'	rdfs:label ?label;'.
		'	dbo:capital ?krye.'.		
		'	?country dbo:thumbnail ?flamuri.'.
		'	?country dbo:abstract ?desc.'.
		'	OPTIONAL{?country dbo:currency ?paraja}'.
		'	OPTIONAL{?country dbp:populationCensus ?popullsia}'.
		//'	OPTIONAL{?country geo:lat ?lat}'.
		//'	OPTIONAL{?country geo:long ?long}'.
		'	OPTIONAL{?paraja rdfs:label ?eparaja}'.
		'	OPTIONAL{?country foaf:homepage ?web.}'.
		'	OPTIONAL{?country dbp:officialLanguages ?lang}'.
		'	OPTIONAL{?country dbp:conventionalLongName ?fullname}'.
		'	?country dcterms:subject category:'.$abc.'.'.
		'	?krye rdfs:label ?ekrye.'.
		'FILTER(langMatches(lang(?ekrye), "EN"))'.
		'FILTER(langMatches(lang(?label), "EN"))'.
		'FILTER(langMatches(lang(?eparaja), "EN"))'.
		'FILTER(langMatches(lang(?desc), "EN"))'.
		'} ORDER BY ?label'
	);
	foreach ($result1 as $row) {
		
		echo "<tr><th>Name of the state:</th><td>".($row->fullname)."</td></tr>";	
		echo "<tr><th>Capital City:</th><td>".link_to($row->ekrye,$row->ekrye)."</td></tr>";
		echo "<tr><th>Population:</th><td>".($row->popullsia)."</td></tr>";
		echo "<tr><th>Valute:</th><td>".($row->eparaja)."</td></tr>";
		echo "<tr><th>Language:</th><td>".($row->lang)."</td></tr>";
		echo "<tr><th>Website:</th><td>".link_to($row->web)."</td></tr>";
		echo "<th>Flag:</th><td><img src=".($row->flamuri)."></td>";
		echo "<tr><th>Description:</th><td>".($row->desc)."</td></tr>";
		echo "<th>Map:</th><td><img src='http://maps.googleapis.com/maps/api/staticmap?center=".$row->lat.",".$row->long."&markers=color:red%7C".$row->lat.",".$row->long."&zoom=5&size=425x350&sensor=false' /></td>";
	
	}
}
?>
		</table>
		</div>
		<div style="clear: both;"> </div>
         </div>
        <div id="footer">
			<p>&copy; Copyright 2015 You | Design by Ylber Xhambazi </p>
		</div>
		
		</div>
		</div>
	</body>
</html>