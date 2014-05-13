<?php

# first set the employer advanced parameter names:
$empparams = array('emptypes', 'emplevels', 'contracts', 'qualuses', 'industries', 'orgsizes', 'socs');

#print_r( $empwheres['emptypes1112']);

function getempclause($yearcode, $empparams, $params, $empwheres) {

	$wc = '';

	foreach ( $empparams as $empr ) {

		$empr2 = $empr;

		if ($yearcode > '1011') {
			# updated queries for the 11/12 and later surveys
			if ( $empr == 'emptypes' ) { $empr2 = 'emptypes1112'; }
			if ( $empr == 'emplevels' ) { $empr2 = 'emplevels1112'; }
			if ( $empr == 'contracts' ) { $empr2 = 'contracts1112'; }
			if ( $empr == 'qualuses' ) { $empr2 = 'qualuses1112'; }
			if ( $empr == 'orgsizes' ) { $empr2 = 'orgsizes1112'; }
			
		}

		if (array_key_exists($params[$empr],$empwheres[$empr2])) {
			$wc .= " AND ( ".$empwheres[$empr2][$params[$empr]]['sql']." )";
		}
	}

	return $wc;

}

?>