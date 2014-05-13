<?php 

foreach ( $allowedparams as $param ) {
    $params[$param] = $_POST[$param];
}

foreach ( $filterparams as $param ) {
    if ( strtolower($params[$param] == 'all') ) { $params[$param] = '%'; }
}


$jacs1name = '';
if ($params['jacs1'] == '%') { $jacs1name = 'All graduates'; } else { $jacs1name = $jacs1names[$params['jacs1']]; }

$jacs2name = '';
if ($params['jacs2'] == '%') { $jacs2name = 'All graduates'; } else { $jacs2name = $jacs2names[$params['jacs2']]; }

$jacs3name = '';
if ($params['jacs3'] == '%') { $jacs3name = 'All graduates'; } else { $jacs3name = $jacs3names[$params['jacs3']]; }

# crate the where clause from the parameters
$whereclause = '';
if ( $params['filtertype'] == 'school' ) {

    $whereclause = "WHERE school LIKE ? AND subject LIKE ? AND course LIKE ? ";

} elseif ( $params['filtertype'] == 'jacs' ) {

    $whereclause = "WHERE LEV1 LIKE ? AND LEV2 LIKE ? AND LEV3 LIKE ? ";

}

foreach ( $popparams as $param ) {
    $whereclause .= "AND (".$whereclauses[$clausemaps[$params[$param]]].") ";
}

$fullwhereclause = $whereclause;


?>