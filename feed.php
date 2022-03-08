<?php

// The part with the select onchange:
$addresses = new DOMDocument();
$addresses->load("addresses.xml");

$addresses_el = $addresses->getElementsByTagName("address");

// Select value with onchange 
echo "<select onchange='if(this.value == -1) return; window.location=\"?address=\"+this.value'>";
echo "<option value=\"-1\">Select feed</option>";
foreach($addresses_el as $adr){
    echo "<option>" . $adr->nodeValue . "</option>";
}
echo "</select>";

// if the form submit, Read the xml file and show in a browser
if(isset($_GET['address'])){

	// $xmlDoc = new DOMDocument();
	$addresses->load($_GET['address']);
	$news = $addresses->getElementsByTagName("item");

	foreach($news as $news_item){
		$title = $news_item->getElementsByTagName("title")->item(0)->nodeValue;
		$link = $news_item->getElementsByTagName("link")->item(0)->nodeValue;
		$description = $news_item->getElementsByTagName("description")->item(0)->nodeValue;

		echo "<div style='border:1px solid black;margin:2px;padding:2px;'>";
			echo $title . "<br>";
			echo $description . "<br>";
			echo $link . "<br>";
		echo "</div>";
	}

}