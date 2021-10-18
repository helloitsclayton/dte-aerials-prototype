<?php
	file_put_contents('geoJson/dteAerials.js',''); # Single-line version for faster loading
	file_put_contents('geoJson/dteAerials_Access.js',''); # Formatted version for humans to read
	echo 'dteAerials.js &amp; dteAerials_Access.js initialized in geoJson/<br>';
	foreach(glob('json/*.json') as $fileName) { # Iterates over each JSON file in json/ directory
		$dteJSON = json_decode(file_get_contents($fileName),true);
		$dteGeoJSONarr = [ # Initializes array structure
			'type' => 'Feature Collection',
			'properties' => [ # Pulls year and county name from first JSON object. Maybe this is bad.
				'year' => $dteJSON[0]['Descriptive']['Year'],
				'county' => $dteJSON[0]['Descriptive']['Index County']
			],
			'features' => []
		];
		$newVarName = 'dte'.$dteGeoJSONarr['properties']['county'].$dteGeoJSONarr['properties']['year'];
		for($i = count($dteJSON)-1; $i >= 0; --$i) {
			$intArr = [
				'type' => 'Feature',
				'geometry' => [
					'type' => 'Point',
					'coordinates' => [
						$dteJSON[$i]['Descriptive']['ArcGIS Geocoordinates']['Longitude'],
						$dteJSON[$i]['Descriptive']['ArcGIS Geocoordinates']['Latitude']
					]
				],
				'properties' => [
					'id' => $dteJSON[$i]['Descriptive']['File Identifier'],
					'year' => $dteJSON[$i]['Descriptive']['Year'],
					'county' => $dteJSON[$i]['Descriptive']['Index County']
				]
			];
			array_push($dteGeoJSONarr['features'], $intArr);
		}
		file_put_contents('geoJson/dteAerials.js', 'var '.$newVarName.' = '.json_encode($dteGeoJSONarr).';', FILE_APPEND);
		file_put_contents('geoJson/dteAerials_Access.js', 'var '.$newVarName.' = '.json_encode($dteGeoJSONarr, JSON_PRETTY_PRINT).';'.PHP_EOL, FILE_APPEND);
		echo $fileName.' added as '.$newVarName.' to dteAerials.js and dteAerials_Access.js<br>';
	}
?>