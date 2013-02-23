<?php

$maps = array(
			'Ascension',
			'Backwash',
			'Beaver Creek',
			'Burial Mounds',
			'Coagulation',
			'Colossus',
			'Containment',
			'District',
			'Elongation',
			'Foundation',
			'Gemini',
			'Headlong',
			'Ivory Tower',
			'Lockout',
			'Midship',
			'Relic',
			'Sanctuary',
			'Turf',
			'Terminal',
			'Uplift',
			'Warlock',
			'Waterworks',
			'Zanzibar',
		);

$map_colors=array(
			'#000000',//Black Ascension
		    '#33ff00',//lime green Backwash
			'#66FFFF',//Cyan BeaverCreek
			'#996622', //Brown Burial Mounds
			'#FF6600', //Orange Coagulation
			'#FFDD22', //Gold Clossis
			'#DDDDDD',//LT Gray Containment
			'#000044', //Navy Blue District
			'#990044',//Crimson Elongation
			'#FF1144', //Red-Orange Foundation
			'#FF11BB',//Pink Gemini
			'#FF0000',//Red Head Long
			'#CC00FF', //Magenta Ivory Tower
			'#0000FF', //Blue Lockout
			'#9900ff', // Purple Midship 
			'#66BBFF', //Relic SkyBlue
			'#FFFF00', //Yellow Santuary
			'#FFFF88', //Light Yellow Turf
			'#99FF00', //Yellow-Green
			'#666666', //Gray Uplift
			'#008811',//Dark Green Warlock
			'#008899', //Teal Waterworks
			'#33CCFF', //sky blue Zanzibar
				  );
$gameTypes = array(
			'Slayer',
			'King of the Hill',
			'Oddball',
			'Juggernaut',
			'Capture the Flag',
			'Assault',
			'Territories',
			);
$gameTypes_colors=array(
			'#33CC00',//'Slayer Green
		    '#CC0000',//'King_of_The_Hill Red
			'#CCCC00',//'Oddball Yellow
			'#0000CC', //Juggernaut Blue
			'#CC3300', //'Capture_The_Flag Orange
			'#5500BB', //'Assault Purple
			'#00CCBB',//'Territories Sky Blue
			);
//make javascript array of maps
echo "var mapsArray=['Ascension','Backwash','Beaver Creek','Burial Mounds','Coagulation','Colossus','Containment','District','Elongation','Foundation','Gemini','Headlong','Ivory Tower','Lockout','Midship','Relic','Sanctuary','Turf','Terminal','Uplift','Warlock','Waterworks','Zanzibar'];\n";

echo "var gameTypeArray=['Slayer','King of the Hill','Oddball','Juggernaut','Capture the Flag','Assault','Territories'];\n";

?>
