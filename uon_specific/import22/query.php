<?php

$school = $a;
$subject = $b;
$course = $c;

echo "JACS1 code pre query.php = $lev1b";

if ($lev1=="%") $lev1b="%";
elseif ($lev1=='7' || $lev1=='8') $lev1b=$lev1+1;
elseif ($lev1=='9') $lev1b="A";
elseif ($lev1=="A") $lev1b="B";
elseif ($lev1=="B") $lev1b="C";
elseif ($lev1=="C") $lev1b="D";
elseif ($lev1=="D") $lev1b="E";
elseif ($lev1=="E") $lev1b="F";
elseif ($lev1=="F") $lev1b="G";
elseif ($lev1=="G") $lev1b="H";
elseif ($lev1=="H") $lev1b="I";
elseif ($lev1=="I") $lev1b="J";
elseif ($lev1=="J") $lev1b="L";
elseif ($lev1=="L") $lev1b='7';
else $lev1b=$lev1;

if ($lev2=="%") $lev2b="%";
elseif ($lev2>'11' || $lev2<'23') $lev2b=$lev2+1;
elseif ($lev2=='23') $lev2b='12';
elseif ($lev2=='41') $lev2b='42';
elseif ($lev2=='42') $lev2b='41';
else $lev2b=$lev2;

if ($lev3=="%") $lev3b="%";
elseif ($lev3>'31' || $lev3<'59') $lev3b=$lev3+1;
elseif ($lev3=='59') $lev3b='32';
elseif ($lev3=='107') $lev3b='108';
elseif ($lev3=='108') $lev3b='107';
else $lev3b=$lev3;

echo "JACS1 code mid query.php = $lev1b";

if ($f=='1') $levela = "(QUAL1 = 'H41' OR QUAL1 = 'H60' OR QUAL1 =  'H61' OR QUAL1 = 'H71' OR QUAL1 = 'H80' OR QUAL1 = 'H88' OR QUAL1 = 'I60' OR QUAL1 = 'I61' OR QUAL1 = 'J10' OR QUAL1 = 'J16' OR QUAL1 = 'J20' OR QUAL1 = 'J26' OR QUAL1 = 'J30' OR QUAL1 = 'C20' OR QUAL1 = 'C30' OR QUAL1 = 'M22' OR QUAL1 = 'H00' OR QUAL1 = 'H11' OR QUAL1 = 'H16' OR QUAL1 = 'H18' OR QUAL1 = 'H22' OR QUAL1 = 'H23' OR QUAL1 = 'H50' OR QUAL1 = 'I00' OR QUAL1 = 'I11' OR QUAL1 = 'I16')";
elseif ($f=='2') $levela = "(QUAL1 = 'M00' OR QUAL1 = 'M01' OR QUAL1 = 'M02' OR QUAL1 = 'M10' OR QUAL1 = 'M11' OR QUAL1 = 'M16' OR QUAL1 = 'M41' OR QUAL1 = 'M50' OR QUAL1 = 'M71' OR QUAL1 = 'M80' OR QUAL1 = 'M86' OR QUAL1 = 'M88' OR QUAL1 = 'D00' OR QUAL1 = 'D01' OR QUAL1 = 'E00' OR QUAL1 = 'L00' OR QUAL1 = 'L80')";
else $levela = "QUAL1 LIKE '%'";

if ($g=='1') $level = "(QUAL1 = 'H41' OR QUAL1 = 'H60' OR QUAL1 =  'H61' OR QUAL1 = 'H71' OR QUAL1 = 'H80' OR QUAL1 = 'H88' OR QUAL1 = 'I60' OR QUAL1 = 'I61' OR QUAL1 = 'J10' OR QUAL1 = 'J16' OR QUAL1 = 'J20' OR QUAL1 = 'J26' OR QUAL1 = 'J30' OR QUAL1 = 'C20' OR QUAL1 = 'C30')";
elseif ($g=='2') $level = "(QUAL1 = 'M22' OR QUAL1 = 'H00' OR QUAL1 = 'H11' OR QUAL1 = 'H16' OR QUAL1 = 'H18' OR QUAL1 = 'H22' OR QUAL1 = 'H23' OR QUAL1 = 'H50' OR QUAL1 = 'I00' OR QUAL1 = 'I11' OR QUAL1 = 'I16')";
elseif ($g=='5') $level = "(QUAL1 = 'M00' OR QUAL1 = 'M01' OR QUAL1 = 'M02' OR QUAL1 = 'M10' OR QUAL1 = 'M11' OR QUAL1 = 'M16' OR QUAL1 = 'M41' OR QUAL1 = 'M50' OR QUAL1 = 'M71' OR QUAL1 = 'M80' OR QUAL1 = 'M86' OR QUAL1 = 'M88')";
elseif ($g=='6') $level = "(QUAL1 = 'D00' OR QUAL1 = 'D01' OR QUAL1 = 'E00' OR QUAL1 = 'L00' OR QUAL1 = 'L80')";
else $level = "QUAL1 LIKE '%'";

if ($h=='1') $homeeu = "HOMEEU = '1'";
elseif ($h=='2') $homeeu = "HOMEEU = '2'";
elseif ($h=='4') $homeeu = "HOMEEU = '3'";
elseif ($h=='3') $homeeu = "(HOMEEU = '1' OR HOMEEU = '2')";
else $homeeu = "HOMEEU LIKE '%'";

if ($i=='1') $pubgrid = "(EMPCIR = '1' OR EMPCIR = '01')";
elseif ($i=='2') $pubgrid = "(EMPCIR = '2' OR EMPCIR = '02')";
elseif ($i=='3') $pubgrid = "EMPCIR = '15'";
elseif ($i=='4') $pubgrid = "(EMPCIR = '3' OR EMPCIR = '03')";
elseif ($i=='5') $pubgrid = "((EMPCIR = '1' OR EMPCIR = '01' OR EMPCIR = '3' OR EMPCIR = '03') AND (MODSTUDY = '3' OR MODSTUDY = '03'))";
else $pubgrid = "EMPCIR LIKE '%'";

if ($j=='1') $grad = "(mid(SOCDLHE,1,3) = '111' OR mid(SOCDLHE,1,3) = '112' OR mid(SOCDLHE,1,3) = '113' OR mid(SOCDLHE,1,3) = '114' OR mid(SOCDLHE,1,3) = '115' OR mid(SOCDLHE,1,4) = '1162' OR mid(SOCDLHE,1,4) = '1163' OR mid(SOCDLHE,1,4) = '1171' OR mid(SOCDLHE,1,4) = '1172' OR mid(SOCDLHE,1,4) = '1173' OR mid(SOCDLHE,1,3) = '118' OR mid(SOCDLHE,1,4) = '1221' OR mid(SOCDLHE,1,4) = '1222' OR mid(SOCDLHE,1,4) = '1224' OR mid(SOCDLHE,1,4) = '1225' OR mid(SOCDLHE,1,4) = '1226' OR mid(SOCDLHE,1,4) = '1231' OR mid(SOCDLHE,1,4) = '1235' OR mid(SOCDLHE,1,4) = '1239' OR mid(SOCDLHE,1,1) = '2' OR mid(SOCDLHE,1,4) = '3111' OR mid(SOCDLHE,1,4) = '3113' OR mid(SOCDLHE,1,4) = '3114' OR mid(SOCDLHE,1,4) = '3115' OR mid(SOCDLHE,1,4) = '3119' OR mid(SOCDLHE,1,4) = '3121' OR mid(SOCDLHE,1,4) = '3123' OR mid(SOCDLHE,1,4) = '3132' OR mid(SOCDLHE,1,4) = '3211' OR mid(SOCDLHE,1,4) = '3212' OR mid(SOCDLHE,1,4) = '3214' OR mid(SOCDLHE,1,4) = '3215' OR mid(SOCDLHE,1,4) = '3218' OR mid(SOCDLHE,1,3) = '322' OR mid(SOCDLHE,1,3) = '323' OR mid(SOCDLHE,1,4) = '3312' OR mid(SOCDLHE,1,4) = '3319' OR mid(SOCDLHE,1,3) = '341' OR mid(SOCDLHE,1,3) = '342' OR mid(SOCDLHE,1,3) = '343' OR mid(SOCDLHE,1,4) = '3442' OR mid(SOCDLHE,1,4) = '3449' OR mid(SOCDLHE,1,4) = '3512' OR mid(SOCDLHE,1,3) = '352' OR mid(SOCDLHE,1,3) = '353' OR mid(SOCDLHE,1,3) = '354' OR mid(SOCDLHE,1,3) = '355' OR mid(SOCDLHE,1,3) = '356' OR mid(SOCDLHE,1,4) = '4111' OR mid(SOCDLHE,1,4) = '4114' OR mid(SOCDLHE,1,4) = '4137' OR mid(SOCDLHE,1,4) = '5245' OR mid(SOCDLHE,1,3) = '541')";
elseif ($j=='2') $grad = "(mid(SOCDLHE,1,4) = '1161' OR mid(SOCDLHE,1,4) = '1174' OR mid(SOCDLHE,1,4) = '1219' OR mid(SOCDLHE,1,4) = '1223' OR mid(SOCDLHE,1,4) = '1232' OR mid(SOCDLHE,1,4) = '1233' OR mid(SOCDLHE,1,4) = '1234' OR mid(SOCDLHE,1,4) = '3112' OR mid(SOCDLHE,1,4) = '3122' OR mid(SOCDLHE,1,4) = '3131' OR mid(SOCDLHE,1,4) = '3213' OR mid(SOCDLHE,1,4) = '3216' OR mid(SOCDLHE,1,4) = '3217' OR mid(SOCDLHE,1,4) = '3311' OR mid(SOCDLHE,1,4) = '3313' OR mid(SOCDLHE,1,4) = '3314' OR mid(SOCDLHE,1,4) = '3441' OR mid(SOCDLHE,1,4) = '3443' OR mid(SOCDLHE,1,4) = '3511' OR mid(SOCDLHE,1,4) = '3513' OR mid(SOCDLHE,1,4) = '3514' OR mid(SOCDLHE,1,4) = '4112' OR mid(SOCDLHE,1,4) = '4113' OR mid(SOCDLHE,1,3) = '412' OR mid(SOCDLHE,1,4) = '4131' OR mid(SOCDLHE,1,4) = '4132' OR mid(SOCDLHE,1,4) = '4133' OR mid(SOCDLHE,1,4) = '4134' OR mid(SOCDLHE,1,4) = '4135' OR mid(SOCDLHE,1,4) = '4136' OR mid(SOCDLHE,1,3) = '414' OR mid(SOCDLHE,1,3) = '415' OR mid(SOCDLHE,1,2) = '42' OR mid(SOCDLHE,1,2) = '51' OR mid(SOCDLHE,1,3) = '521' OR mid(SOCDLHE,1,3) = '522' OR mid(SOCDLHE,1,3) = '523' OR mid(SOCDLHE,1,4) = '5241' OR mid(SOCDLHE,1,4) = '5242' OR mid(SOCDLHE,1,4) = '5243' OR mid(SOCDLHE,1,4) = '5244' OR mid(SOCDLHE,1,4) = '5249' OR mid(SOCDLHE,1,2) = '53' OR mid(SOCDLHE,1,4) = '5411' OR mid(SOCDLHE,1,4) = '5412' OR mid(SOCDLHE,1,4) = '5413' OR mid(SOCDLHE,1,4) = '5419' OR mid(SOCDLHE,1,3) = '542' OR mid(SOCDLHE,1,3) = '543' OR mid(SOCDLHE,1,3) = '549' OR mid(SOCDLHE,1,1) = '6' OR mid(SOCDLHE,1,1) = '7' OR mid(SOCDLHE,1,1) = '8' OR mid(SOCDLHE,1,1) = '9')";
else $grad = "SOCDLHE LIKE '%'";

if ($m=='A') $ind = "(SIC2007 LIKE '1__' OR SIC2007 LIKE '2__' OR SIC2007 LIKE '3__')";
elseif ($m=='B') $ind = "(SIC2007 LIKE '5__' OR SIC2007 LIKE '6__' OR SIC2007 LIKE '7__' OR SIC2007 LIKE '8__' OR SIC2007 LIKE '9__')" ;
elseif ($m=='C') $ind = "(SIC2007 LIKE '1___' OR SIC2007 LIKE '2___' OR SIC2007 LIKE '30__' OR SIC2007 LIKE '31__' OR SIC2007 LIKE '32__' OR SIC2007 LIKE '33__')";
elseif ($m=='D') $ind = "SIC2007 LIKE '35__'";
elseif ($m=='E') $ind = "(SIC2007 LIKE '36__' OR SIC2007 LIKE '37__' OR SIC2007 LIKE '39__')";
elseif ($m=='F') $ind = "(SIC2007 LIKE '41__' OR SIC2007 LIKE '42__' OR SIC2007 LIKE '43__')";
elseif ($m=='G') $ind = "(SIC2007 LIKE '45__' OR SIC2007 LIKE '46__' OR SIC2007 LIKE '47__')";
elseif ($m=='H') $ind = "(SIC2007 LIKE '49__' OR SIC2007 LIKE '50__' OR SIC2007 LIKE '51__' OR SIC2007 LIKE '52__' OR SIC2007 LIKE '53__')";
elseif ($m=='I') $ind = "(SIC2007 LIKE '55__' OR SIC2007 LIKE '56__')";
elseif ($m=='J') $ind = "(SIC2007 LIKE '58__' OR SIC2007 LIKE '59__' OR SIC2007 LIKE '60__' OR SIC2007 LIKE '61__' OR SIC2007 LIKE '62__' OR SIC2007 LIKE '63__')";
elseif ($m=='K') $ind = "(SIC2007 LIKE '64__' OR SIC2007 LIKE '65__' OR SIC2007 LIKE '66__')";
elseif ($m=='L') $ind = "SIC2007 LIKE '68__'";
elseif ($m=='M') $ind = "(SIC2007 LIKE '69__' OR SIC2007 LIKE '70__' OR SIC2007 LIKE '71__' OR SIC2007 LIKE '72__' OR SIC2007 LIKE '73__' OR SIC2007 LIKE '74__' OR SIC2007 LIKE '75__')";
elseif ($m=='N') $ind = "(SIC2007 LIKE '77__' OR SIC2007 LIKE '78__' OR SIC2007 LIKE '79__' OR SIC2007 LIKE '80__' OR SIC2007 LIKE '81__' OR SIC2007 LIKE '82__')";
elseif ($m=='O') $ind = "SIC2007 LIKE '84__'";
elseif ($m=='P') $ind = "SIC2007 LIKE '85__'";
elseif ($m=='Q') $ind = "(SIC2007 LIKE '86__' OR SIC2007 LIKE '87__' OR SIC2007 LIKE '88__')";
elseif ($m=='R') $ind = "(SIC2007 LIKE '90__' OR SIC2007 LIKE '91__' OR SIC2007 LIKE '92__' OR SIC2007 LIKE '93__')";
elseif ($m=='S') $ind = "(SIC2007 LIKE '94__' OR SIC2007 LIKE '95__' OR SIC2007 LIKE '96__')";
elseif ($m=='T') $ind = "(SIC2007 LIKE '97__' OR SIC2007 LIKE '98__')";
elseif ($m=='U') $ind = "SIC2007 LIKE '99__'";
else $ind = "SIC2007 LIKE '%'";

if ($p=='1') $eandp = "(mid(SOCDLHE,1,4) = '3551' OR mid(SOCDLHE,1,4) = '2451' OR mid(SOCDLHE,1,4) = '2444' OR mid(SOCDLHE,1,4) = '2432' OR mid(SOCDLHE,1,4) = '2431' OR mid(SOCDLHE,1,4) = '2423' OR mid(SOCDLHE,1,4) = '2411' OR mid(SOCDLHE,1,4) = '2329' OR mid(SOCDLHE,1,4) = '2322' OR mid(SOCDLHE,1,4) = '2321' OR mid(SOCDLHE,1,4) = '2314' OR mid(SOCDLHE,1,4) = '2313' OR mid(SOCDLHE,1,4) = '2312' OR mid(SOCDLHE,1,4) = '2311' OR mid(SOCDLHE,1,4) = '2216' OR mid(SOCDLHE,1,4) = '2215' OR mid(SOCDLHE,1,4) = '2214' OR mid(SOCDLHE,1,4) = '2213' OR mid(SOCDLHE,1,4) = '2212' OR mid(SOCDLHE,1,4) = '2211' OR mid(SOCDLHE,1,4) = '2113' OR mid(SOCDLHE,1,4) = '2112' OR mid(SOCDLHE,1,4) = '2111' OR mid(SOCDLHE,1,4) = '1137' OR mid(SOCDLHE,1,4) = '1182')";
elseif ($p=='2') $eandp = "(mid(SOCDLHE,1,4) = '3564' OR mid(SOCDLHE,1,4) = '3432' OR mid(SOCDLHE,1,4) = '3431' OR mid(SOCDLHE,1,4) = '3416' OR mid(SOCDLHE,1,4) = '3412' OR mid(SOCDLHE,1,4) = '3411' OR mid(SOCDLHE,1,4) = '3229' OR mid(SOCDLHE,1,4) = '3223' OR mid(SOCDLHE,1,4) = '3215' OR mid(SOCDLHE,1,4) = '2452' OR mid(SOCDLHE,1,4) = '2442' OR mid(SOCDLHE,1,4) = '2419' OR mid(SOCDLHE,1,4) = '2319' OR mid(SOCDLHE,1,4) = '2316' OR mid(SOCDLHE,1,4) = '2315' OR mid(SOCDLHE,1,4) = '2132' OR mid(SOCDLHE,1,4) = '2131' OR mid(SOCDLHE,1,4) = '2126' OR mid(SOCDLHE,1,4) = '2125' OR mid(SOCDLHE,1,4) = '2121' OR mid(SOCDLHE,1,4) = '1212' OR mid(SOCDLHE,1,4) = '1184' OR mid(SOCDLHE,1,4) = '1181' OR mid(SOCDLHE,1,4) = '1136' OR mid(SOCDLHE,1,4) = '1134' OR mid(SOCDLHE,1,4) = '1114' OR mid(SOCDLHE,1,4) = '1113' OR mid(SOCDLHE,1,4) = '1111' OR mid(SOCDLHE,1,4) = '1112')";
elseif ($p=='3') $eandp = "(mid(SOCDLHE,1,4) = '3568' OR mid(SOCDLHE,1,4) = '3567' OR mid(SOCDLHE,1,4) = '3561' OR mid(SOCDLHE,1,4) = '3552' OR mid(SOCDLHE,1,4) = '3543' OR mid(SOCDLHE,1,4) = '3539' OR mid(SOCDLHE,1,4) = '3512' OR mid(SOCDLHE,1,4) = '3449' OR mid(SOCDLHE,1,4) = '3433' OR mid(SOCDLHE,1,4) = '3422' OR mid(SOCDLHE,1,4) = '3415' OR mid(SOCDLHE,1,4) = '3414' OR mid(SOCDLHE,1,4) = '3232' OR mid(SOCDLHE,1,4) = '3222' OR mid(SOCDLHE,1,4) = '3221' OR mid(SOCDLHE,1,4) = '3214' OR mid(SOCDLHE,1,4) = '3121' OR mid(SOCDLHE,1,4) = '3111' OR mid(SOCDLHE,1,4) = '2443' OR mid(SOCDLHE,1,4) = '2434' OR mid(SOCDLHE,1,4) = '2433' OR mid(SOCDLHE,1,4) = '2422' OR mid(SOCDLHE,1,4) = '2421' OR mid(SOCDLHE,1,4) = '2129' OR mid(SOCDLHE,1,4) = '2127' OR mid(SOCDLHE,1,4) = '2124' OR mid(SOCDLHE,1,4) = '2122' OR mid(SOCDLHE,1,4) = '1235' OR mid(SOCDLHE,1,4) = '1222' OR mid(SOCDLHE,1,4) = '1171' OR mid(SOCDLHE,1,4) = '1135' OR mid(SOCDLHE,1,4) = '1132' OR mid(SOCDLHE,1,4) = '1131' OR mid(SOCDLHE,1,4) = '1123')";
elseif ($p=='4') $eandp = "(mid(SOCDLHE,1,4) = '5414' OR mid(SOCDLHE,1,4) = '5245' OR mid(SOCDLHE,1,4) = '4137' OR mid(SOCDLHE,1,4) = '4114' OR mid(SOCDLHE,1,4) = '4111' OR mid(SOCDLHE,1,4) = '3566' OR mid(SOCDLHE,1,4) = '3565' OR mid(SOCDLHE,1,4) = '3563' OR mid(SOCDLHE,1,4) = '3562' OR mid(SOCDLHE,1,4) = '3544' OR mid(SOCDLHE,1,4) = '3542' OR mid(SOCDLHE,1,4) = '3541' OR mid(SOCDLHE,1,4) = '3537' OR mid(SOCDLHE,1,4) = '3536' OR mid(SOCDLHE,1,4) = '3535' OR mid(SOCDLHE,1,4) = '3534' OR mid(SOCDLHE,1,4) = '3533' OR mid(SOCDLHE,1,4) = '3532' OR mid(SOCDLHE,1,4) = '3531' OR mid(SOCDLHE,1,4) = '3520' OR mid(SOCDLHE,1,4) = '3442' OR mid(SOCDLHE,1,4) = '3434' OR mid(SOCDLHE,1,4) = '3421' OR mid(SOCDLHE,1,4) = '3413' OR mid(SOCDLHE,1,4) = '3319' OR mid(SOCDLHE,1,4) = '3312' OR mid(SOCDLHE,1,4) = '3231' OR mid(SOCDLHE,1,4) = '3218' OR mid(SOCDLHE,1,4) = '3212' OR mid(SOCDLHE,1,4) = '3211' OR mid(SOCDLHE,1,4) = '3132' OR mid(SOCDLHE,1,4) = '3123' OR mid(SOCDLHE,1,4) = '3119' OR mid(SOCDLHE,1,4) = '3115' OR mid(SOCDLHE,1,4) = '3114' OR mid(SOCDLHE,1,4) = '3113' OR mid(SOCDLHE,1,4) = '2441' OR mid(SOCDLHE,1,4) = '2317' OR mid(SOCDLHE,1,4) = '2128' OR mid(SOCDLHE,1,4) = '2123' OR mid(SOCDLHE,1,4) = '1239' OR mid(SOCDLHE,1,4) = '1231' OR mid(SOCDLHE,1,4) = '1226' OR mid(SOCDLHE,1,4) = '1225' OR mid(SOCDLHE,1,4) = '1224' OR mid(SOCDLHE,1,4) = '1221' OR mid(SOCDLHE,1,4) = '1211' OR mid(SOCDLHE,1,4) = '1185' OR mid(SOCDLHE,1,4) = '1183' OR mid(SOCDLHE,1,4) = '1173' OR mid(SOCDLHE,1,4) = '1172' OR mid(SOCDLHE,1,4) = '1163' OR mid(SOCDLHE,1,4) = '1162' OR mid(SOCDLHE,1,4) = '1152' OR mid(SOCDLHE,1,4) = '1151' OR mid(SOCDLHE,1,4) = '1142' OR mid(SOCDLHE,1,4) = '1141' OR mid(SOCDLHE,1,4) = '1133' OR mid(SOCDLHE,1,4) = '1121' OR mid(SOCDLHE,1,4) = '1122')";
elseif ($p=='5') $eandp = "(mid(SOCDLHE,1,4) = '5499' OR mid(SOCDLHE,1,4) = '5496' OR mid(SOCDLHE,1,4) = '5495' OR mid(SOCDLHE,1,4) = '5494' OR mid(SOCDLHE,1,4) = '5493' OR mid(SOCDLHE,1,4) = '5492' OR mid(SOCDLHE,1,4) = '5491' OR mid(SOCDLHE,1,4) = '5434' OR mid(SOCDLHE,1,4) = '5433' OR mid(SOCDLHE,1,4) = '5432' OR mid(SOCDLHE,1,4) = '5431' OR mid(SOCDLHE,1,4) = '5424' OR mid(SOCDLHE,1,4) = '5423' OR mid(SOCDLHE,1,4) = '5422' OR mid(SOCDLHE,1,4) = '5421' OR mid(SOCDLHE,1,4) = '5419' OR mid(SOCDLHE,1,4) = '5413' OR mid(SOCDLHE,1,4) = '5412' OR mid(SOCDLHE,1,4) = '5411' OR mid(SOCDLHE,1,4) = '5323' OR mid(SOCDLHE,1,4) = '5322' OR mid(SOCDLHE,1,4) = '5321' OR mid(SOCDLHE,1,4) = '5319' OR mid(SOCDLHE,1,4) = '5316' OR mid(SOCDLHE,1,4) = '5315' OR mid(SOCDLHE,1,4) = '5314' OR mid(SOCDLHE,1,4) = '5313' OR mid(SOCDLHE,1,4) = '5312' OR mid(SOCDLHE,1,4) = '5311' OR mid(SOCDLHE,1,4) = '5249' OR mid(SOCDLHE,1,4) = '5244' OR mid(SOCDLHE,1,4) = '5243' OR mid(SOCDLHE,1,4) = '5242' OR mid(SOCDLHE,1,4) = '5241' OR mid(SOCDLHE,1,4) = '5234' OR mid(SOCDLHE,1,4) = '5233' OR mid(SOCDLHE,1,4) = '5232' OR mid(SOCDLHE,1,4) = '5231' OR mid(SOCDLHE,1,4) = '5224' OR mid(SOCDLHE,1,4) = '5223' OR mid(SOCDLHE,1,4) = '5222' OR mid(SOCDLHE,1,4) = '5221' OR mid(SOCDLHE,1,4) = '5216' OR mid(SOCDLHE,1,4) = '5215' OR mid(SOCDLHE,1,4) = '5214' OR mid(SOCDLHE,1,4) = '5213' OR mid(SOCDLHE,1,4) = '5212' OR mid(SOCDLHE,1,4) = '5211' OR mid(SOCDLHE,1,4) = '5119' OR mid(SOCDLHE,1,4) = '5113' OR mid(SOCDLHE,1,4) = '5112' OR mid(SOCDLHE,1,4) = '5111' OR mid(SOCDLHE,1,4) = '4217' OR mid(SOCDLHE,1,4) = '4216' OR mid(SOCDLHE,1,4) = '4215' OR mid(SOCDLHE,1,4) = '4214' OR mid(SOCDLHE,1,4) = '4213' OR mid(SOCDLHE,1,4) = '4212' OR mid(SOCDLHE,1,4) = '4211' OR mid(SOCDLHE,1,4) = '4150' OR mid(SOCDLHE,1,4) = '4142' OR mid(SOCDLHE,1,4) = '4141' OR mid(SOCDLHE,1,4) = '4136' OR mid(SOCDLHE,1,4) = '4135' OR mid(SOCDLHE,1,4) = '4134' OR mid(SOCDLHE,1,4) = '4133' OR mid(SOCDLHE,1,4) = '4132' OR mid(SOCDLHE,1,4) = '4131' OR mid(SOCDLHE,1,4) = '4123' OR mid(SOCDLHE,1,4) = '4122' OR mid(SOCDLHE,1,4) = '4121' OR mid(SOCDLHE,1,4) = '4113' OR mid(SOCDLHE,1,4) = '4112' OR mid(SOCDLHE,1,4) = '3514' OR mid(SOCDLHE,1,4) = '3513' OR mid(SOCDLHE,1,4) = '3511' OR mid(SOCDLHE,1,4) = '3443' OR mid(SOCDLHE,1,4) = '3441' OR mid(SOCDLHE,1,4) = '3314' OR mid(SOCDLHE,1,4) = '3313' OR mid(SOCDLHE,1,4) = '3311' OR mid(SOCDLHE,1,4) = '3217' OR mid(SOCDLHE,1,4) = '3216' OR mid(SOCDLHE,1,4) = '3213' OR mid(SOCDLHE,1,4) = '3131' OR mid(SOCDLHE,1,4) = '3122' OR mid(SOCDLHE,1,4) = '3112' OR mid(SOCDLHE,1,4) = '1234' OR mid(SOCDLHE,1,4) = '1233' OR mid(SOCDLHE,1,4) = '1232' OR mid(SOCDLHE,1,4) = '1223' OR mid(SOCDLHE,1,4) = '1219' OR mid(SOCDLHE,1,4) = '1161' OR mid(SOCDLHE,1,4) = '1174' OR mid(SOCDLHE,1,1) = '6' OR mid(SOCDLHE,1,1) = '7' OR mid(SOCDLHE,1,1) = '8' OR mid(SOCDLHE,1,1) = '9')";
else $eandp = "SOCDLHE LIKE '%'";



?>