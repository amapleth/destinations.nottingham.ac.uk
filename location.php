<?php include 'details.php'; ?>
<?php include 'database.php'; ?>
<?php include 'lookups.php'; ?>
<?php include 'postcodes.php'; ?>
<?php

# intialise variables to store the data
$report = '';
$loccounts = array();
$cohorts = array();
$regioncounts = array();
$countrycounts = array();
foreach ( $regionwheres as $region => $sql ) { $regioncounts[$region] = 0; }
foreach ( $countrywheres as $country => $sql ) { $countrycounts[$country] = 0; }
$ukloccounts = array();
$pregcounts = array();
$countycounts = array();
foreach ( $postregions as $preg => $counties ) { $pregcounts[$preg] = 0; }
foreach ( $postcodes as $county => $details ) { $countycounts[$county] = 0; }
$countriescount = 0;

# first things first, get all the form parameters so that we can work out our
# sample population

$params = array();
$allowedparams = array('filtertype', 'school', 'subject', 'course', 'jacs1', 'jacs2', 'jacs3', 'yearselector', 'FTorPT', 'UGorPG', 'level', 'homeeu', 'emptypes', 'emplevels', 'contracts', 'qualuses', 'industries', 'orgsizes', 'socs');
$filterparams = array('school', 'subject', 'course', 'jacs1', 'jacs2', 'jacs3');
$popparams = array('FTorPT', 'UGorPG', 'level', 'homeeu');


?>
<?php include 'querybuilder.php'; # next stage build the basic query strings ?>
<?php include 'empquerybuilder.php'; # add advanced options for employer queries ?>
<?php

# now get the population and responsdent counts for each year
$yearsToSample = $yearcombos[$params['yearselector']];


# intialise variables to store the data
$report = '';
$loccounts = array();
$cohorts = array();
$regioncounts = array();
$countrycounts = array();
foreach ( $regionwheres as $region => $sql ) { $regioncounts[$region] = 0; }
foreach ( $countrywheres as $country => $sql ) { $countrycounts[$country] = 0; }
$ukloccounts = array();
$countriescount = 0;

foreach ( $yearsToSample as $yearcode ) {

    foreach ( $postregions as $preg => $counties ) { 
        $ukloccounts[$yearcode][$preg]['count'] = 0; 
        $ukloccounts[$yearcode][$preg]['locations'] = array();
    }
    $ukloccounts[$yearcode]['count'] = 0;

    # strings to hold the statement text
    $popstm = '';           # to get total FTE cohort size
    $locstm = '';           # to get locations

    # strings to hold the parameters for binding
    $p1 = '';
    $ps = '';
    $p3 = '';

    $whereclause2 = $whereclause.getempclause($yearcode, $empparams, $params, $empwheres);

    if ($yearcode > '1011') {
        $whereclause2 = str_replace('XQMODE01', "popdlhe$yearcode.XQMODE01", $whereclause2);
        $whereclause2 = str_replace('HOMEEU', 'HOMEEUOS', $whereclause2);
        $whereclause2 = str_replace('SOCDLHE', 'SOCDLHE2010', $whereclause2);
    }


    if ( $params['filtertype'] == 'school' ) {

        if ( $yearcode < '1112' ) {
            $locstm = "SELECT LOCEMP FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2";
        } else {
            $locstm = "SELECT EMPPCODE, EMPCOUNTRY FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2";
        }
        $p1 = $params['school'];
        $p2 = $params['subject'];
        $p3 = $params['course'];

    } elseif ( $params['filtertype'] == 'jacs' ) {

        $j1 = $params['jacs1'];
        $j2 = $params['jacs2'];
        $j3 = $params['jacs3'];

        # modify the jacs code if it's a legacy code
        if ( $yearcode == '78' or $yearcode == '89' ) {

            if ($j1 != '%') { $j1 = $legacyjacs1map[$j1]; }
            if ($j2 != '%') { $j2 = $legacyjacs2map[$j2]; }
            if ($j3 != '%') { $j3 = $legacyjacs3map[$j3]; }
        }

        if ( $yearcode < '1112' ) {
            $locstm = "SELECT DISTINCT(HUSID), LOCEMP FROM popdlhe$yearcode INNER JOIN tqi$yearcode on popdlhe$yearcode.HUSID = tqi$yearcode.HUSIDd INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2";
        } else {
            $whereclause2 = str_replace('LEV1', 'XJACSLEV101_1', $whereclause2);
            $whereclause2 = str_replace('LEV2', 'XJACSLEV201_1', $whereclause2);
            $whereclause2 = str_replace('LEV3', 'XJACSLEV301_1', $whereclause2);

            $locstm = "SELECT DISTINCT(HUSID), EMPPCODE, EMPCOUNTRY FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2";
        }
        $p1 = $j1;
        $p2 = $j2;
        $p3 = $j3;

    }

    # now prform the queries

    # first total population count
    $pst = mysqli_prepare( $con, $locstm );
#    echo "<p>$locstm</p>";
    mysqli_stmt_bind_param( $pst, 'sss', $p1, $p2, $p3 );
    mysqli_stmt_execute( $pst );
    mysqli_stmt_store_result( $pst );
    $cohorts[$yearcode] = mysqli_stmt_num_rows( $pst );

    # now get counts for each region
    foreach ( $regionwheres as $region => $sql ) {

        $regst = $locstm." AND ( $sql )";
        if ( $yearcode > '1011' ) {
            $regst = str_replace('LOCEMP', 'EMPCOUNTRY', $regst);
        }
        $rst = mysqli_prepare( $con, $regst );
        mysqli_stmt_bind_param( $rst, 'sss', $p1, $p2, $p3 );
        mysqli_stmt_execute( $rst );
        mysqli_stmt_store_result( $rst );
        $loccounts[$yearcode][$region]['count'] = mysqli_stmt_num_rows( $rst );
#        echo "<p>Region count for $region: ".mysqli_stmt_num_rows( $rst )."</p>";
        $regioncounts[$region] += $loccounts[$yearcode][$region]['count'];

        # now get the counts for each country in the region
        foreach ( $regcountries[$region] as $country => $flag ) {

            $coust = $locstm." AND ( ".$countrywheres[$country]." )";
            if ( $yearcode > '1011' ) {
                $coust = str_replace('LOCEMP', 'EMPCOUNTRY', $coust);
            }
#            echo "<p$coust</p>";
            $cst = mysqli_prepare( $con, $coust );
            mysqli_stmt_bind_param( $cst, 'sss', $p1, $p2, $p3 );
            mysqli_stmt_execute( $cst );
            mysqli_stmt_store_result( $cst );
            $loccounts[$yearcode][$region]['countries'][$country]['count'] = mysqli_stmt_num_rows( $cst );
#            echo "<p>Adding $country to $countriescount : ". mysqli_stmt_num_rows( $cst )."</p>";
            $countriescount += mysqli_stmt_num_rows( $cst );
            $countrycounts[$country] += $loccounts[$yearcode][$region]['countries'][$country]['count'];

        }
    }

    # now look at the UK counties
    foreach ( $postregions as $preg => $counties ) {
        
        foreach ( $counties as $county ) {
            $sql = $postcodes[$county]['sql'];
            $countyst = $locstm." AND ( $sql )";
            if ( $yearcode > '1011' ) {
                $countyst = str_replace('LOCEMP', 'EMPPCODE', $countyst);
                $countyst .= " AND EMPPCODE <> '' AND EMPPCODE <> 'X' AND EMPPCODE IS NOT NULL";
#                echo "<p>$county: $countyst</p>";
            }
#            echo "<p>$county: $countyst</p>";
            $ctst = mysqli_prepare( $con, $countyst );
            mysqli_stmt_bind_param( $ctst, 'sss', $p1, $p2, $p3 );
            mysqli_stmt_execute( $ctst );
            mysqli_stmt_store_result( $ctst );
            $ukloccounts[$yearcode]['count'] += mysqli_stmt_num_rows( $ctst );
            $ukloccounts[$yearcode][$preg]['count'] += mysqli_stmt_num_rows( $ctst );
            $ukloccounts[$yearcode][$preg]['counties'][$county]['count'] = mysqli_stmt_num_rows( $ctst );
            $countycounts[$county] += mysqli_stmt_num_rows( $ctst );

            if ( $yearcode > '1011' ) {
                mysqli_stmt_bind_result( $ctst, $location, $country );

            } else {
                mysqli_stmt_bind_result( $ctst, $location );                
            }

            while ( mysqli_stmt_fetch( $ctst ) ) {
#                array_push( $ukloccounts[$yearcode][$preg]['locations'], $location );
                $ukloccounts[$yearcode][$preg]['locations'][] = $location;
                $ukloccounts[$yearcode][$preg]['counties'][$county]['locations'][] = $location;
            }
                   
        }

    }


}


?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Employment locations - GEMS</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <?php include 'styles.inc'; ?>

       <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

<div class='rootcontainer'>

<?php include 'header.php' ?>

<h2>Employment locations for the graduates you selected</h2>

<?php include 'table.php'; ?>

<br />
<br />

<?php

if ( $countriescount > 0 ) {
    # we have international locations so display the international locatons table
    echo <<<HEREDOC
<table>
<tr><th>Location</th>
HEREDOC;

    foreach ( $yearsToSample as $yearcode ) {
        echo "<td>".$yearcodemap[$yearcode]." survey</td>";
    }

    echo "</tr>";

    foreach ( $regions as $reg => $codearray ) {

        if ( $regioncounts[$reg] > 0 ) {

            $regid = str_replace(' ', '', $reg); # get string for use as DOM id
            echo "<tr><td id='$regid' class='tablerowtoggle'>$reg</td>";
            foreach ( $yearsToSample as $yearcode ) {
                echo "<td>".$loccounts[$yearcode][$reg]['count']."</td>";
            }
            echo "</tr>";

            # now write rows for each country
            foreach ( $regcountries[$reg] as $country => $flag ) {
                if ( $countrycounts[$country] > 0 ) {
                    echo "<tr class='subsect subs$regid'><td>$country</td>";
                    foreach ( $yearsToSample as $yearcode ) {
                        echo "<td>".$loccounts[$yearcode][$reg]['countries'][$country]['count']."</td>";
                    }
                    echo "</tr>";   
                }         
            }

        }

    }


    echo "</table>";

} else {
    echo "<p>No countries</p>";
}

?>

<br />
<br />

<table>
    <tr><th rowspan="2">UK Region</th>

<?php

$headrow1 = '';
$headrow2 = '<tr>';

foreach ( $yearsToSample as $yearcode ) {
    $headrow1 .= "<th colspan='2'>".$yearcodemap[$yearcode]." survey</th>";
    $headrow2 .= "<td class='small'>Number</td><td class='small'>Percentage</td>";
}

echo "$headrow1</tr>\n$headrow2</tr>";

foreach ( $postregions as $preg => $counties ) {
    $prid = str_replace(' ', '', $preg);
    echo "<tr><td class='tablerowtoggle mapshower' id='$prid'>$preg</td>";
    foreach ( $yearsToSample as $yearcode ) {
        $prcount = $ukloccounts[$yearcode][$preg]['count'];
        $prperc = number_format( ( $prcount/$ukloccounts[$yearcode]['count'] ) * 100, 1);
        echo "<td>$prcount</td><td>$prperc%</td>";
    }
    echo "</tr>";
    foreach ( $counties as $county ) {
        if ( $countycounts[$county] > 0 ) {
            echo "<tr class='subsect subs$prid'><td class='subindent'>$county</td>";
            foreach ( $yearsToSample as $yearcode ) {
                $cncount = $ukloccounts[$yearcode][$preg]['counties'][$county]['count'];
                $cnperc = number_format( ( $cncount/$ukloccounts[$yearcode]['count']) * 100, 1);
                echo "<td>$cncount</td><td>$cnperc%</td>";
            }
            echo "</tr>";
        }
    }
}

echo "<tr><th>Total UK</th>";
foreach ($yearsToSample as $yearcode) {
    echo "<td colspan='2'>".$ukloccounts[$yearcode]['count']."</td>";
}
echo "</tr>";

echo "</table>";

#print_r( $ukloccounts['1112'] );

#print_r( $countycounts );

# now create URLS for static google maps for each uk region
$regionmaps = array(); 
foreach ( $postregions as $preg => $counties ) {

    $url = 'http://maps.google.com/maps/api/staticmap?visible='.$gmapslu[$preg].'&size=512x512';

    foreach ( $yearsToSample as $yearcode ) {

        $loclist = implode( ',gb|', $ukloccounts[$yearcode][$preg]['locations'] );
        if ( $loclist ) {
            $url .= '&markers=color:'.$gmapsmk[$yearcode].'|'.$loclist.',gb';
        }   

        # diagnostics 
        // echo "<h4>Postcodes for $preg in $yearcode </h4><ul>";
        // foreach ( $ukloccounts[$yearcode][$preg]['locations'] as $postcode ) {
        //     echo "<li>$postcode</li>";
        // }
        // echo "</ul>";
    }

    $url .= '&sensor=false&key=ABQIAAAAVGTHY0IriwYfI_KYrabSLxRCYvJwBphaFU0M3k_bOBq_8Ioa1BSrvlZgSIfR18FxUfRqaLdHUFcEPQ';

    $prid = str_replace(' ', '', $preg);
    if ( strlen($url) < 1500 ) {
        $regionmaps[$prid] = $url;
    } else {
        $regionmaps[$prid] = 'Too many';
    }


}

$jsregionmaps = json_encode($regionmaps);

?>

</table>

<div id="mapdiv">

</div>

<p><a href="index.php">Back to main page</a></p>

<?php include 'footer.php' ?>

        <?php include 'scripts.inc'; ?>

<script type="text/javascript"><!--

$(document).ready( function() {

    var mapurls = <?php echo $jsregionmaps; ?>;

    $(".mapshower").click( function() {
        var reg = $(this).attr('id');
        if ( mapurls[reg] == 'Too many' ) {
            $('#mapdiv').html('<p>Too many graduates in this region to display a map</p>')
        } else {
            $('#mapdiv').html('<img src="'+mapurls[reg]+'"" width="512" height="512" alt="Map of graduate locations" />');
//            console.log(mapurls[reg]);
        }

    });

});

//--></script>

        <?php include 'analytics.php'; ?>
    </body>
</html>
