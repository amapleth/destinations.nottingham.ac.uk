<?php

echo <<<HEREDOC
<table>
    <tr><td class="blank"></td><th>Selected group</th><td class="blank"></td><th>Selected group</th></tr>
HEREDOC;

if ( $params['filtertype'] == 'school' ) {

		$fschool = $params['school'];
		$fsubject = $params['subject'];
		$fcourse = $params['course'];

		if ( $fschool == '%' ) { $fschool = 'All'; }
		if ( $fsubject == '%' ) { $fsubject = 'All'; }
		if ( $fcourse == '%' ) { $fcourse = 'All'; }

        echo <<<HEREDOC
    <tr><td>$option1s</td><td>$fschool</td><td>Study type</td><td>$params[FTorPT]</td></tr>
    <tr><td>$option2s</td><td>$fsubject</td><td>Degree level</td><td>$params[UGorPG]</td></tr>
    <tr><td>$option3s</td><td>$fcourse</td><td>Degree type</td><td>$params[level]</td></tr>
HEREDOC;

} elseif ( $params['filtertype'] == 'jacs' ) {

    echo <<<HEREDOC
    <tr><td>JACS1</td><td>$jacs1name</td><td>Study type</td><td>$params[FTorPT]</td></tr>
    <tr><td>JACS2</td><td>$jacs2name</td><td>Degree level</td><td>$params[UGorPG]</td></tr>
    <tr><td>JACS3</td><td>$jacs3name</td><td>Degree type</td><td>$params[level]</td></tr>
HEREDOC;

}

echo "<tr><td>Survey</td><td>";
echo $survyearnames[$params['yearselector']];
echo "</td><td>Fee status</td><td>";
echo $params['homeeu'];
echo "</td></tr>";

if ( array_key_exists( 'emptypes', $params) ) {

    if (!array_key_exists('contracts', $params)) {
        $params['contracts'] = 'all';
    }

echo "<tr><td>Employment type</td><td>".$empwheres['emptypes'][$params['emptypes']]['label']."</td><td>Employment level</td><td>".$empwheres['emplevels'][$params['emplevels']]['label']."</td></tr>";
echo "<tr><td>Contract type</td><td>".$empwheres['contracts'][$params['contracts']]['label']."</td><td>Qualification</td><td>".$empwheres['qualuses'][$params['qualuses']]['label']."</td></tr>";
echo "<tr><td>Industry</td><td>".$empwheres['industries'][$params['industries']]['label']."</td><td>Employer size</td><td>".$empwheres['orgsizes'][$params['orgsizes']]['label']."</td></tr>";
echo "<tr><td>Occupational Classification</td><td>".$empwheres['socs'][$params['socs']]['label']."</td><td class='blank'></td><td class='blank'></td></tr>";

}

echo "</table>";

?>
