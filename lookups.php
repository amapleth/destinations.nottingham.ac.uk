<?php

# array of year combinations for use when creating SQL statements

$yearcombos = array(
	"s5" 	=> array('78', '89', '910', '1011', '1112'),
	"s4" 	=> array('89', '910', '1011', '1112'),
	"s3"	=> array('910', '1011', '1112'),
	"s2"	=> array('1011', '1112'),
	"s1112" => array('1112'),
	"s1011" => array('1011'),
	"s910"	=> array('910'),
	"s89"	=> array('89'),
	"s78"	=> array('78')
);

$survyearnames = array(
	"s5" 	=> "Last five years",
	"s4" 	=> "Last four years",
	"s3"	=> "Last three years",
	"s2"	=> "Last two years",
	"s1112" => "2011/12 survey",
	"s1011" => "2010/11 survey",
	"s910"	=> "2009/10 survey",
	"s89"	=> "2008/9 survey",
	"s78"	=> "2007/8 survey"
);

$yearcodemap = array(
	'1112' 	=> '2011/12',
	'1011' 	=> '2010/11',
	'910'	=> '2009/10',
	'89'	=> '2008/9',
	'78'	=> '2007/8'
);

$yearsbackmap = array(
	'5'		=> 's5',
	'4'		=> 's4',
	'3'		=> 's3',
	'2'		=> 's2',
	'1'		=> 's1112'
);

$selectables = array(
	"empcirc" 		=> "Employment circumstances",
	"jobdetails"	=> "Job titles and employer names",
	"salary"		=> "Salaries",
	"location"		=> "Employer locations",
	"size"			=> "Employer sizes",
	"contract"		=> "Contract types",
	"relevance"		=> "Relevance of qualification",
	"soc"			=> "Standard Occupational classifications",
	"ittempcirc"	=> "Employment circumstances of ITT graduates",
	"fsdest"		=> "Further study destinations",
	"fsretain"		=> "Retention of graduates",
	"fsfund"		=> "Funding of further study",
	"heexp"			=> "Overall higher education experience"
);

$funds = array(
	'1' => 'Self-funding',
	'2' => 'Grant or Award',
	'4' => 'Sponsorship',
	'5' => 'Employer is providing financial support',
	'8' => 'Other'
);

$experiences = array(
	'1'	=> 'Very well',
	'2'	=> 'Well',
	'3'	=> 'Not very well',
	'4'	=> 'Not at all',
	'5'	=> "Can't tell"
);

$qualtypes = array(
	'a'	=> array(
		'label'	=> "Higher degree by research",
		'sql'	=> "TYPEQUAL+0 = '1'"
	),
	'b'	=> array(
		'label'	=> "Higher degree by taught course",
		'sql'	=> "TYPEQUAL+0 = '2'"
	),
	'c'	=> array(
		'label'	=> "Postgraduate diploma or certificate",
		'sql'	=> "TYPEQUAL+0 = '3'"
	),
	'd'	=> array(
		'label'	=> "First degree",
		'sql'	=> "TYPEQUAL+0 = '4'"
	),
	'e'	=> array(
		'label'	=> "Professional qualification",
		'sql'	=> "TYPEQUAL+0 = '6'"
	),
	'f'	=> array(
		'label'	=> "Other diploma or certificate",
		'sql'	=> "TYPEQUAL+0 = '5'"
	),
	'g'	=> array(
		'label'	=> "Other qualification",
		'sql'	=> "TYPEQUAL+0 = '7'"
	),
	'h'	=> array(
		'label'	=> "Not aiming for a qualification",
		'sql'	=> "TYPEQUAL = '98'"
	)
);

$feinsts = array(
	'1' 	=> "The Open University",
	'2'		=> "Cranfield University", 
	'3'		=> "Royal College of Art", 
	'7'		=> "Bishop Grosseteste University College Lincoln", 
	'9'		=> "Buckinghamshire New University", 
	'10'	=> "Central School of Speech and Drama", 
	'11'	=> "University of Chester", 
	'12'	=> "Canterbury Christ Church University", 
	'13'	=> "York St John University", 
	'14'	=> "University College Plymouth St Mark and St John", 
	'16'	=> "Edge Hill University", 
	'17'	=> "University College Falmouth", 
	'18'	=> "Harper Adams University College", 
	'21'	=> "The University of Winchester", 
	'23'	=> "Liverpool Hope University", 
	'24'	=> "University of the Arts, London", 
	'26'	=> "University of Bedfordshire", 
	'27'	=> "The University of Northampton", 
	'28'	=> "Newman University College", 
	'30'	=> "Ravensbourne College of Design and Communication", 
	'31'	=> "Roehampton University", 
	'32'	=> "Rose Bruford College", 
	'33'	=> "Royal Academy of Music", 
	'34'	=> "Royal College of Music", 
	'35'	=> "Royal Northern College of Music", 
	'37'	=> "Southampton Solent University", 
	'38'	=> "University of Cumbria", 
	'39'	=> "St Mary's University College, Twickenham", 
	'40'	=> "Leeds Trinity University College", 
	'41'	=> "Trinity Laban Conservatoire of Music and Dance", 
	'46'	=> "The University of Worcester", 
	'47'	=> "Anglia Ruskin University", 
	'48'	=> "Bath Spa University", 
	'49'	=> "The University of Bolton", 
	'50'	=> "Bournemouth University", 
	'51'	=> "The University of Brighton", 
	'52'	=> "Birmingham City University", 
	'53'	=> "The University of Central Lancashire", 
	'54'	=> "University of Gloucestershire", 
	'56'	=> "Coventry University", 
	'57'	=> "University of Derby", 
	'58'	=> "The University of East London", 
	'59'	=> "The University of Greenwich", 
	'60'	=> "University of Hertfordshire", 
	'61'	=> "The University of Huddersfield", 
	'62'	=> "The University of Lincoln", 
	'63'	=> "Kingston University", 
	'64'	=> "Leeds Metropolitan University", 
	'65'	=> "Liverpool John Moores University", 
	'66'	=> "The Manchester Metropolitan University", 
	'67'	=> "Middlesex University", 
	'68'	=> "De Montfort University", 
	'69'	=> "The University of Northumbria at Newcastle", 
	'71'	=> "The Nottingham Trent University", 
	'72'	=> "Oxford Brookes University", 
	'73'	=> "The University of Plymouth", 
	'74'	=> "The University of Portsmouth", 
	'75'	=> "Sheffield Hallam University", 
	'76'	=> "London South Bank University", 
	'77'	=> "Staffordshire University", 
	'78'	=> "The University of Sunderland", 
	'79'	=> "The University of Teesside", 
	'80'	=> "Thames Valley University", 
	'81'	=> "University of the West of England, Bristol", 
	'82'	=> "The University of Chichester", 
	'83'	=> "The University of Westminster", 
	'85'	=> "The University of Wolverhampton", 
	'86'	=> "The University of Wales, Newport", 
	'87'	=> "Glyndŵr University", 
	'89'	=> "University of Wales Institute, Cardiff", 
	'90'	=> "University of Glamorgan", 
	'91'	=> "Swansea Metropolitan University", 
	'92'	=> "Trinity University College", 
	'95'	=> "University of Abertay Dundee", 
	'96'	=> "Edinburgh College of Art", 
	'97'	=> "Glasgow School of Art", 
	'100'	=> "Queen Margaret University, Edinburgh", 
	'101'	=> "The Royal Scottish Academy of Music and Drama", 
	'104'	=> "The Robert Gordon University", 
	'105'	=> "The University of the West of Scotland", 
	'106'	=> "Glasgow Caledonian University", 
	'107'	=> "Edinburgh Napier University", 
	'108'	=> "Aston University", 
	'109'	=> "The University of Bath", 
	'110'	=> "The University of Birmingham", 
	'111'	=> "The University of Bradford", 
	'112'	=> "The University of Bristol", 
	'113'	=> "Brunel University", 
	'114'	=> "The University of Cambridge", 
	'115'	=> "The City University", 
	'116'	=> "University of Durham", 
	'117'	=> "The University of East Anglia", 
	'118'	=> "The University of Essex", 
	'119'	=> "The University of Exeter", 
	'120'	=> "The University of Hull", 
	'121'	=> "The University of Keele", 
	'122'	=> "The University of Kent", 
	'123'	=> "The University of Lancaster", 
	'124'	=> "The University of Leeds", 
	'125'	=> "The University of Leicester", 
	'126'	=> "The University of Liverpool", 
	'127'	=> "Birkbeck College", 
	'131'	=> "Goldsmiths College", 
	'132'	=> "Imperial College of Science, Technology and Medicine", 
	'133'	=> "Institute of Education", 
	'134'	=> "King's College London", 
	'135'	=> "London Business School", 
	'137'	=> "London School of Economics and Political Science", 
	'138'	=> "London School of Hygiene and Tropical Medicine", 
	'139'	=> "Queen Mary and Westfield College", 
	'141'	=> "Royal Holloway and Bedford New College", 
	'143'	=> "The Royal Veterinary College", 
	'145'	=> "St George's Hospital Medical School", 
	'146'	=> "The School of Oriental and African Studies", 
	'147'	=> "The School of Pharmacy", 
	'149'	=> "University College London", 
	'151'	=> "University of London (Institutes and activities)", 
	'152'	=> "Loughborough University", 
	'154'	=> "The University of Newcastle-upon-Tyne", 
	'155'	=> "The University of Nottingham", 
	'156'	=> "The University of Oxford", 
	'157'	=> "The University of Reading", 
	'158'	=> "The University of Salford", 
	'159'	=> "The University of Sheffield", 
	'160'	=> "The University of Southampton", 
	'161'	=> "The University of Surrey", 
	'162'	=> "The University of Sussex", 
	'163'	=> "The University of Warwick", 
	'164'	=> "The University of York", 
	'167'	=> "The University of Edinburgh", 
	'168'	=> "The University of Glasgow", 
	'169'	=> "The University of Strathclyde", 
	'170'	=> "The University of Aberdeen", 
	'171'	=> "Heriot-Watt University", 
	'172'	=> "The University of Dundee", 
	'173'	=> "The University of St Andrews", 
	'174'	=> "The University of Stirling", 
	'175'	=> "Scottish Agricultural College", 
	'176'	=> "The University of Wales, Lampeter", 
	'177'	=> "Aberystwyth University", 
	'178'	=> "Bangor University", 
	'179'	=> "Cardiff University", 
	'180'	=> "Swansea University", 
	'184'	=> "The Queen's University of Belfast", 
	'185'	=> "University of Ulster", 
	'188'	=> "The Institute of Cancer Research", 
	'189'	=> "Writtle College", 
	'190'	=> "Norwich University College of the Arts", 
	'193'	=> "Stranmillis University College", 
	'194'	=> "St Mary's University College", 
	'195'	=> "Royal Agricultural College", 
	'196'	=> "UHI Millennium Institute", 
	'197'	=> "The Arts University College at Bournemouth", 
	'199'	=> "Conservatoire for Dance and Drama", 
	'200'	=> "University College Birmingham", 
	'201'	=> "Courtauld Institute of Art", 
	'202'	=> "London Metropolitan University", 
	'203'	=> "The University of Buckingham", 
	'204'	=> "The University of Manchester", 
	'205'	=> "Heythrop College", 
	'206'	=> "University for the Creative Arts", 
	'207'	=> "Leeds College of Music", 
	'208'	=> "Guildhall School of Music and Drama", 
	'209'	=> "The Liverpool Institute for Performing Arts", 
	'210'	=> "University Campus Suffolk", 
	'4001'	=> "Other UK Institution",
	'4002'	=> "Other non-UK Institution",
	'4003'	=> "Other public body in the UK",
	'4004'	=> "Other private body in the UK",
	'4921'	=> "UK FE College"
);

$schlevs = array(
    '1' => 'Primary',
    '2' => 'Secondary',
    '3' => 'Both primary and secondary',
    '4' => 'College (e.g. FE, 6th Form) or other educational establishment'
);

$schtypes = array(
    '1' => 'State-funded school or college',
    '2' => 'Both state-funded and non-state–funded school or college',
    '3' => 'Non-state-funded school or college',
    '4' => 'Not known'
);

#$statuses = array(
#    '3' => 'In a Teaching Post', 
#    '1' => 'Not teaching but seeking a teaching post', 
#    '2' => 'Not teaching and not seeking a teaching post'
#);  
#
#$statuses1112 = array(
#    '1' => 'Not teaching but seeking a teaching post', 
#    '2' => 'Not teaching'
#);  
#
$statuses = array(
	'In a teaching post' 							=> "TCHEMP = '3'",
	'Not teaching but seeking a teaching post'		=> "TCHEMP = '1'",
	'Not teaching and not seeking a teaching post'	=> "TCHEMP = '2'"
);  

$statuses1112 = array(
	'In a teaching post' 							=> "EMPLDTEACH = '1'",
	'Not teaching but seeking a teaching post'		=> "(EMPLDTEACH = '2' AND SEEKTEACH = '1')",
	'Not teaching and not seeking a teaching post'	=> "(EMPLDTEACH = '2' AND SEEKTEACH = '2')"
);  



$jacs1names = array(
	"1" => "Medicine and Dentistry",
	"2" => "Subjects allied to Medicine",
	"3" => "Biological Sciences",
	"4" => "Veterinary Sciences",
	"5" => "Agriculture and related subjects",
	"6" => "Physical Sciences",
	"7" => "Mathematical Sciences",
	"8" => "Computer Science",
	"9" => "Engineering and Technology",
	"A" => "Architecture, Building and Planning",
	"B" => "Social Studies",
	"C" => "Law",
	"D" => "Business and Administrative studies",
	"E" => "Mass Communications and Documentation",
	"F" => "Languages",
	"G" => "Historical and Philosophical studies",
	"H" => "Creative Arts and Design",
	"I" => "Education",
	"J" => "Combined",
	"K" => "Initial Teacher Training",
	"L" => "Geographical Studies"
);

$jacs2names = array(
	"1" => "Medicine and Dentistry",
	"2" => "Medical Science and Pharmacy",
	"3" => "Nursing",
	"4" => "Other subjects allied to Medicine",
	"5" => "Biology and related Sciences",
	"6" => "Sports Science",
	"7" => "Psychology",
	"8" => "Veterinary Sciences",
	"9" => "Agriculture and related subjects",
	"10" => "Physical Science",
	"11" => "Physical Geography and Environmental Science",
	"12" => "Mathematical Sciences",
	"13" => "Computer Science",
	"14" => "Mechanically-based Engineering",
	"15" => "Electronic and Electrical Engineering",
	"16" => "Civil, Chemical and other Engineering",
	"17" => "Technology",
	"18" => "Architecture, Building and Planning",
	"19" => "Economics",
	"20" => "Politics",
	"21" => "Sociology, Social Policy and Anthropology",
	"22" => "Social Work",
	"23" => "Human and Social Geography",
	"24" => "Law",
	"25" => "Business",
	"26" => "Management",
	"27" => "Finance and Accounting",
	"28" => "Tourism, Transport and Travel",
	"29" => "Media Studies",
	"30" => "Communications and Information studies",
	"31" => "English-based studies",
	"32" => "European Languages and Area studies",
	"33" => "Other languages and Area studies",
	"34" => "History and Archeology",
	"35" => "Philosphy, Theology and Religious studies",
	"36" => "Art and Design",
	"37" => "Performing Arts",
	"38" => "Other Creative Arts",
	"39" => "Teacher Training",
	"40" => "Education studies",
	"41" => "Combined",
	"42" => "Initial Teacher Training"
);

$jacs3names = array(
	"1" => "Medicine",
	"2" => "Dentistry",
	"3" => "Anatomy, Physiology and Pathology",
	"4" => "Pharmacology, Toxicology and Pharmacy",
	"5" => "Nursing",
	"6" => "Complementary Medicine",
	"7" => "Nutrition",
	"8" => "Ophthalmics",
	"9" => "Aural and Oral Sciences",
	"10" => "Medical Technology",
	"11" => "Others in Subjects allied to Medicine",
	"12" => "Biology",
	"13" => "Zoology",
	"14" => "Genetics",
	"15" => "Microbiology",
	"16" => "Molecular Biology, Biophysics and Biochemistry",
	"17" => "Others in Biological Sciences",
	"18" => "Sports Science",
	"19" => "Psychology",
	"20" => "Veterinary Sciences",
	"21" => "Animal Science",
	"22" => "Forestry",
	"23" => "Food and Beverage studies",
	"24" => "Agriculture and related subjects",
	"25" => "Chemistry",
	"26" => "Physics and Astronomy",
	"27" => "Forensic and Archeological Science",
	"28" => "Geology",
	"29" => "Ocean Sciences",
	"30" => "Others in Physical Sciences",
	"31" => "Physical Geography and Environmental Science",
	"32" => "Mathematics and Statistics",
	"33" => "Operational Research",
	"34" => "Others in Mathematical and Computer Sciences",
	"35" => "Computer Science",
	"36" => "General Engineering",
	"37" => "Mechanical, Production and Manufacturing Engineering",
	"38" => "Aerospace Engineering",
	"39" => "Naval Architecture",
	"40" => "Electronic and Electrical Engineering",
	"41" => "Civil Engineering",
	"42" => "Chemical, Process and Energy Engineering",
	"43" => "Others in Engineering",
	"44" => "Materials and Minerals Technology",
	"45" => "Maritime Technology",
	"46" => "Others in Technology",
	"47" => "Architecture",
	"48" => "Building",
	"49" => "Landscape Design",
	"50" => "Planning (Urban, Rural and Regional)",
	"51" => "Others in Architecture, Building and Planning",
	"52" => "Economics",
	"53" => "Politics",
	"54" => "Sociology",
	"55" => "Social Policy",
	"56" => "Anthropology",
	"57" => "Others in Social studies",
	"58" => "Social Work",
	"59" => "Human and Social Geography",
	"60" => "Law",
	"61" => "Business studies",
	"62" => "Marketing",
	"63" => "Management studies",
	"64" => "Human Resource Management",
	"65" => "Finance",
	"66" => "Accounting",
	"67" => "Tourism, Transport and Travel",
	"68" => "Others in Business and Administrative studies",
	"69" => "Media studies",
	"70" => "Information Services",
	"71" => "Publicity studies",
	"72" => "Publishing",
	"73" => "Journalism",
	"74" => "Others in Mass Communications and Documentation",
	"75" => "English studies",
	"76" => "American and Australasian studies",
	"77" => "Celtic studies",
	"78" => "Classics",
	"79" => "French studies",
	"80" => "German and Scandinavian studies",
	"81" => "Italian studies",
	"82" => "Iberian studies",
	"83" => "Others in European Languages and Area studies",
	"84" => "Linguistics",
	"85" => "Comparative Literary studies",
	"86" => "Others in Liguistics, Classics and related",
	"87" => "Asian studies",
	"88" => "African and Modern Middle Eastern studies",
	"89" => "Others in eastern, Asian and African Languages",
	"90" => "History",
	"91" => "Archeology",
	"92" => "Others in Historical and Philosophical studies",
	"93" => "Philosophy",
	"94" => "Theology and Religious studies",
	"95" => "Fine Art",
	"96" => "Design studies",
	"97" => "Music",
	"98" => "Drama",
	"99" => "Dance",
	"100" => "Cinematics and Photography",
	"101" => "Imaginative Writing",
	"102" => "Others in Creative Arts and Design",
	"103" => "Teacher Training",
	"104" => "Research and Study Skills in Education",
	"105" => "Academic studies in Education",
	"106" => "Others in Education",
	"107" => "Initial Teacher Training",
	"108" => "Combined"
);

# they changed the jacs codes in 9/10 so this provides a mapping to the old code fro 7/8 and 8/9 queries
$legacyjacs1map = array(
	"1" => "1",
	"2" => "2",
	"3" => "3",
	"4" => "4",
	"5" => "5",
	"6" => "6",
	"7" => "8",
	"8" => "9",
	"9" => "A",
	"A" => "B",
	"B" => "C",
	"C" => "D",
	"D" => "E",
	"E" => "F",
	"F" => "G",
	"G" => "H",
	"H" => "I",
	"I" => "J",
	"J" => "K",
	"K" => "L",
	"L" => "7"
);

$legacyjacs2map = array(
	"1" => "1",
	"2" => "2",
	"3" => "3",
	"4" => "4",
	"5" => "5",
	"6" => "6",
	"7" => "7",
	"8" => "8",
	"9" => "9",
	"10" => "10",
	"11" => "11",
	"12" => "13",
	"13" => "14",
	"14" => "15",
	"15" => "16",
	"16" => "17",
	"17" => "18",
	"18" => "19",
	"19" => "20",
	"20" => "21",
	"21" => "22",
	"22" => "23",
	"23" => "12",
	"24" => "Law",
	"25" => "25",
	"26" => "26",
	"27" => "27",
	"28" => "28",
	"29" => "29",
	"30" => "30",
	"31" => "31",
	"32" => "32",
	"33" => "33",
	"34" => "34",
	"35" => "35",
	"36" => "36",
	"37" => "37",
	"38" => "38",
	"39" => "39",
	"40" => "41",
	"41" => "42",
	"42" => "41"
);

$legacyjacs3map = array(
	"1" => "1",
	"2" => "2",
	"3" => "3",
	"4" => "4",
	"5" => "5",
	"6" => "6",
	"7" => "7",
	"8" => "8",
	"9" => "9",
	"10" => "10",
	"11" => "11",
	"12" => "12",
	"13" => "13",
	"14" => "14",
	"15" => "15",
	"16" => "16",
	"17" => "17",
	"18" => "18",
	"19" => "19",
	"20" => "20",
	"21" => "21",
	"22" => "22",
	"23" => "23",
	"24" => "24",
	"25" => "25",
	"26" => "26",
	"27" => "27",
	"28" => "28",
	"29" => "29",
	"30" => "30",
	"31" => "31",
	"32" => "33",
	"33" => "34",
	"34" => "35",
	"35" => "36",
	"36" => "37",
	"37" => "38",
	"38" => "39",
	"39" => "40",
	"40" => "41",
	"41" => "42",
	"42" => "43",
	"43" => "44",
	"44" => "45",
	"45" => "46",
	"46" => "47",
	"47" => "48",
	"48" => "49",
	"49" => "50",
	"50" => "51",
	"51" => "52",
	"52" => "53",
	"53" => "54",
	"54" => "55",
	"55" => "56",
	"56" => "57",
	"57" => "58",
	"58" => "59",
	"59" => "32",
	"60" => "60",
	"61" => "61",
	"62" => "62",
	"63" => "63",
	"64" => "64",
	"65" => "65",
	"66" => "66",
	"67" => "67",
	"68" => "68",
	"69" => "69",
	"70" => "70",
	"71" => "71",
	"72" => "72",
	"73" => "73",
	"74" => "74",
	"75" => "75",
	"76" => "76",
	"77" => "77",
	"78" => "78",
	"79" => "79",
	"80" => "80",
	"81" => "81",
	"82" => "82",
	"83" => "83",
	"84" => "84",
	"85" => "85",
	"86" => "86",
	"87" => "87",
	"88" => "88",
	"89" => "89",
	"90" => "90",
	"91" => "91",
	"92" => "92",
	"93" => "93",
	"94" => "94",
	"95" => "95",
	"96" => "96",
	"97" => "97",
	"98" => "98",
	"99" => "99",
	"100" => "100",
	"101" => "101",
	"102" => "102",
	"103" => "103",
	"104" => "104",
	"105" => "105",
	"106" => "106",
	"107" => "108",
	"108" => "107"
);


$retcodes = array(
	'All'	=> array(
		'label'	=> "All subjects",
		'sql'	=> "1 = 1"
	),
	'a100'	=> array(
		'label'	=> "Medicine",
		'sql'	=> "PROFSOCT = '22110' OR PROFSOCT = '22111' OR PROFSOCT = '22112' OR PROFSOCT = '22113'"
	),
	'a200'	=> array(
		'label'	=> "Dentistry",
		'sql'	=> "PROFSOCT = '22150' OR PROFSOCT = '22151' OR PROFSOCT = '22152' OR PROFSOCT = '61130'"
	),
	'b100'	=> array(
		'label'	=> "Anatomy, Physiology and Pathology",
		'sql'	=> "PROFSOCT = '21125' OR PROFSOCT = '21127'"
	),
	'b200'	=> array(
		'label'	=> "Pharmacology, Toxicology and Pharmacy",
		'sql'	=> "PROFSOCT = '22130' OR PROFSOCT = '22131' OR PROFSOCT = '22132' OR PROFSOCT = '32170'"
	),
	'b300'	=> array(
		'label'	=> "Complementary Medicine",
		'sql'	=> "PROFSOCT = '32291' OR PROFSOCT = '32293' OR PROFSOCT = '32295'"
	),
	'b400'	=> array(
		'label'	=> "Nutrition",
		'sql'	=> "PROFSOCT = '32292'"
	),
	'b500'	=> array(
		'label'	=> "Ophthalmics",
		'sql'	=> "PROFSOCT = '22140' OR PROFSOCT = '32160'"
	),
	'b600'	=> array(
		'label'	=> "Aural and Oral Sciences",
		'sql'	=> "PROFSOCT = '32182' OR PROFSOCT = '32183'"
	),
	'b700'	=> array(
		'label'	=> "Nursing",
		'sql'	=> "PROFSOCT = '32110' OR PROFSOCT = '32111' OR PROFSOCT = '32112' OR PROFSOCT = '32113' OR PROFSOCT = '32114' OR PROFSOCT = '32115' OR PROFSOCT = '32120' OR PROFSOCT = '32130'"
	),
	'b800'	=> array(
		'label'	=> "Medical Technology",
		'sql'	=> "PROFSOCT = '31112' OR PROFSOCT = '32140' OR PROFSOCT = '32180' OR PROFSOCT = '32181'"
	),
	'b900'	=> array(
		'label'	=> "Others in Subjects allied to Medicine",
		'sql'	=> "PROFSOCT = '32150' OR PROFSOCT = '32210' OR PROFSOCT = '32220' OR PROFSOCT = '32230' OR PROFSOCT = '32290'"
	),
	'c100'	=> array(
		'label'	=> "Biology",
		'sql'	=> "PROFSOCT = '21120' OR PROFSOCT = '21121' OR PROFSOCT = '21122' OR PROFSOCT = '21123'"
	),
	'c200'	=> array(
		'label'	=> "Botany",
		'sql'	=> "PROFSOCT = '21124'"
	),
	'c600'	=> array(
		'label'	=> "Sports Science",
		'sql'	=> "PROFSOCT = '34410' OR PROFSOCT = '34420' OR PROFSOCT = '34421' OR PROFSOCT = '34422' OR PROFSOCT = '34430' OR PROFSOCT = '34490' OR PROFSOCT = '34491'"
	),
	'c800'	=> array(
		'label'	=> "Psychology",
		'sql'	=> "PROFSOCT = '22120' OR PROFSOCT = '22121' OR PROFSOCT = '22122' OR PROFSOCT = '22123' OR PROFSOCT = '32294'"
	),
	'd100'	=> array(
		'label'	=> "Veterinary Medicine",
		'sql'	=> "PROFSOCT = '22160'"
	),
	'd400'	=> array(
		'label'	=> "Agriculture",
		'sql'	=> "PROFSOCT = '51110' OR PROFSOCT = '51120' OR PROFSOCT = '51130' OR PROFSOCT = '51190'"
	),
	'd600'	=> array(
		'label'	=> "Food Sciences",
		'sql'	=> "PROFSOCT = '54340'"
	),
	'd700'	=> array(
		'label'	=> "Agricultural Sciences",
		'sql'	=> "PROFSOCT = '21126' OR PROFSOCT = '35510' OR PROFSOCT = '35520'"
	),
	'f100'	=> array(
		'label'	=> "Chemistry",
		'sql'	=> "PROFSOCT = '21110' OR PROFSOCT = '21111' OR PROFSOCT = '21112' OR PROFSOCT = '31110' OR PROFSOCT = '31111'"
	),
	'f200'	=> array(
		'label'	=> "Materials Science",
		'sql'	=> "PROFSOCT = '21291'"
	),
	'f300'	=> array(
		'label'	=> "Physics",
		'sql'	=> "PROFSOCT = '21130' OR PROFSOCT = '21131'"
	),
	'f500'	=> array(
		'label'	=> "Astronomy",
		'sql'	=> "PROFSOCT = '21135'"
	),
	'f600'	=> array(
		'label'	=> "Geology",
		'sql'	=> "PROFSOCT = '21132' OR PROFSOCT = '21133'"
	),
	'f800'	=> array(
		'label'	=> "Meteorology",
		'sql'	=> "PROFSOCT = '21134'"
	),
	'g100'	=> array(
		'label'	=> "Mathematics",
		'sql'	=> "PROFSOCT = '21136'"
	),
	'g300'	=> array(
		'label'	=> "Statistics",
		'sql'	=> "PROFSOCT = '24224'"
	),
	'g400'	=> array(
		'label'	=> "Computer Science",
		'sql'	=> "PROFSOCT = '21322'"
	),
	'g500'	=> array(
		'label'	=> "Information Systems",
		'sql'	=> "PROFSOCT = '21310' OR PROFSOCT = '21311' OR PROFSOCT = '21312' OR PROFSOCT = '31310' OR PROFSOCT = '31320'"
	),
	'g600'	=> array(
		'label'	=> "Software Engineering",
		'sql'	=> "PROFSOCT = '21320' OR PROFSOCT = '21321' OR PROFSOCT = '21323' OR PROFSOCT = '21324' OR PROFSOCT = '34212'"
	),
	'h100'	=> array(
		'label'	=> "General Engineering",
		'sql'	=> "PROFSOCT = '11232' OR PROFSOCT = '21212' OR PROFSOCT = '21280' OR PROFSOCT = '21281' OR PROFSOCT = '21282' OR PROFSOCT = '21290' OR PROFSOCT = '21295' OR PROFSOCT = '31130' OR PROFSOCT = '31150' OR PROFSOCT = '31190'"
	),
	'h200'	=> array(
		'label'	=> "Civil Engineering",
		'sql'	=> "PROFSOCT = '11230' OR PROFSOCT = '11231' OR PROFSOCT = '21210' OR PROFSOCT = '21211' OR PROFSOCT = '31140'"
	),
	'h300'	=> array(
		'label'	=> "Mechanical Engineering",
		'sql'	=> "PROFSOCT = '21220' OR PROFSOCT = '21222' OR PROFSOCT = '31222' OR PROFSOCT = '35140' OR PROFSOCT = '52310'"
	),
	'h400'	=> array(
		'label'	=> "Aerospace Engineering",
		'sql'	=> "PROFSOCT = '21221' OR PROFSOCT = '35110' OR PROFSOCT = '35120' OR PROFSOCT = '35121' OR PROFSOCT = '35122'"
	),
	'h500'	=> array(
		'label'	=> "Marine Engineering",
		'sql'	=> "PROFSOCT = '21223' OR PROFSOCT = '35130'"
	),
	'h600'	=> array(
		'label'	=> "Electrical and Electronic Engineering",
		'sql'	=> "PROFSOCT = '21230' OR PROFSOCT = '21231' OR PROFSOCT = '21232' OR PROFSOCT = '21240' OR PROFSOCT = '21241' OR PROFSOCT = '21242' OR PROFSOCT = '31120' OR PROFSOCT = '52330' OR PROFSOCT = '52410' OR PROFSOCT = '52411' OR PROFSOCT = '52412' OR PROFSOCT = '52413' OR PROFSOCT = '52420' OR PROFSOCT = '52430' OR PROFSOCT = '52440' OR PROFSOCT = '52450' OR PROFSOCT = '52490'"
	),
	'h700'	=> array(
		'label'	=> "Production and Manufacturing Engineering",
		'sql'	=> "PROFSOCT = '21224'"
	),
	'h800'	=> array(
		'label'	=> "Chemical, Process and Energy Engineering",
		'sql'	=> "PROFSOCT = '21250' OR PROFSOCT = '21260' OR PROFSOCT = '21270' OR PROFSOCT = '21293' OR PROFSOCT = '21294'"
	),
	'j600'	=> array(
		'label'	=> "Maritime Technology",
		'sql'	=> "PROFSOCT = '24344'"
	),
	'k100'	=> array(
		'label'	=> "Architecture",
		'sql'	=> "PROFSOCT = '24310' OR PROFSOCT = '31210' OR PROFSOCT = '31212'"
	),
	'k200'	=> array(
		'label'	=> "Construction",
		'sql'	=> "PROFSOCT = '11220' OR PROFSOCT = '21213' OR PROFSOCT = '24330' OR PROFSOCT = '24340' OR PROFSOCT = '24341' OR PROFSOCT = '24342' OR PROFSOCT = '24343' OR PROFSOCT = '31230'"
	),
	'k300'	=> array(
		'label'	=> "Landscape Design",
		'sql'	=> "PROFSOCT = '24311' OR PROFSOCT = '51131'"
	),
	'k400'	=> array(
		'label'	=> "Planning (Urban, Rural and Regional)",
		'sql'	=> "PROFSOCT = '21223' OR PROFSOCT = '21224' OR PROFSOCT = '24320' OR PROFSOCT = '31211' OR PROFSOCT = '31220' OR PROFSOCT = '31221' OR PROFSOCT = '35394'"
	),
	'l100'	=> array(
		'label'	=> "Economics",
		'sql'	=> "PROFSOCT = '24233'"
	),
	'l200'	=> array(
		'label'	=> "Politics",
		'sql'	=> "PROFSOCT = '11144' OR PROFSOCT = '41144'"
	),
	'l500'	=> array(
		'label'	=> "Social Work",
		'sql'	=> "PROFSOCT = '24420' OR PROFSOCT = '24421' OR PROFSOCT = '24422' OR PROFSOCT = '24423' OR PROFSOCT = '24430' OR PROFSOCT = '32310' OR PROFSOCT = '32311' OR PROFSOCT = '32312' OR PROFSOCT = '32320' OR PROFSOCT = '32321' OR PROFSOCT = '32322' OR PROFSOCT = '32323' OR PROFSOCT = '32324'"
	),
	'm100'	=> array(
		'label'	=> "Law",
		'sql'	=> "PROFSOCT = '21292' OR PROFSOCT = '24110' OR PROFSOCT = '24111' OR PROFSOCT = '24112' OR PROFSOCT = '24113' OR PROFSOCT = '24190' OR PROFSOCT = '24191' OR PROFSOCT = '24192' OR PROFSOCT = '35200' OR PROFSOCT = '35201' OR PROFSOCT = '35202' OR PROFSOCT = '35203' OR PROFSOCT = '41314' OR PROFSOCT = '42120'"
	),
	'n100'	=> array(
		'label'	=> "Business studies",
		'sql'	=> "PROFSOCT = '11354' OR PROFSOCT = '24230' OR PROFSOCT = '24231' OR PROFSOCT = '24232' OR PROFSOCT = '24410' OR PROFSOCT = '24411' OR PROFSOCT = '24412' OR PROFSOCT = '24413' OR PROFSOCT = '35390' OR PROFSOCT = '35391' OR PROFSOCT = '35420' OR PROFSOCT = '35421' OR PROFSOCT = '35422' OR PROFSOCT = '35423' OR PROFSOCT = '35440' OR PROFSOCT = '35441' OR PROFSOCT = '35442' OR PROFSOCT = '35443' OR PROFSOCT = '35444' OR PROFSOCT = '35610' OR PROFSOCT = '35611' OR PROFSOCT = '35612'"
	),
	'n200'	=> array(
		'label'	=> "Management studies",
		'sql'	=> "PROFSOCT = '11110' OR PROFSOCT = '11120' OR PROFSOCT = '11130' OR PROFSOCT = '11140' OR PROFSOCT = '11141' OR PROFSOCT = '11142' OR PROFSOCT = '11143' OR PROFSOCT = '11210' OR PROFSOCT = '11322' OR PROFSOCT = '11323' OR PROFSOCT = '11324' OR PROFSOCT = '11360' OR PROFSOCT = '11361' OR PROFSOCT = '11362' OR PROFSOCT = '11363' OR PROFSOCT = '11370' OR PROFSOCT = '11410' OR PROFSOCT = '11420' OR PROFSOCT = '11510' OR PROFSOCT = '11511' OR PROFSOCT = '11512' OR PROFSOCT = '11513' OR PROFSOCT = '11514' OR PROFSOCT = '11515' OR PROFSOCT = '11520' OR PROFSOCT = '11521' OR PROFSOCT = '11522' OR PROFSOCT = '11523' OR PROFSOCT = '11524' OR PROFSOCT = '11610' OR PROFSOCT = '11620' OR PROFSOCT = '11630' OR PROFSOCT = '11710' OR PROFSOCT = '11711' OR PROFSOCT = '11712' OR PROFSOCT = '11713' OR PROFSOCT = '11720' OR PROFSOCT = '11730' OR PROFSOCT = '11740' OR PROFSOCT = '11810' OR PROFSOCT = '11820' OR PROFSOCT = '11830' OR PROFSOCT = '11840' OR PROFSOCT = '11850' OR PROFSOCT = '11851' OR PROFSOCT = '11852' OR PROFSOCT = '12110' OR PROFSOCT = '12120' OR PROFSOCT = '12190' OR PROFSOCT = '12191' OR PROFSOCT = '12192' OR PROFSOCT = '12210' OR PROFSOCT = '12211' OR PROFSOCT = '12212' OR PROFSOCT = '12213' OR PROFSOCT = '12220' OR PROFSOCT = '12221' OR PROFSOCT = '12222' OR PROFSOCT = '12230' OR PROFSOCT = '12240' OR PROFSOCT = '12250' OR PROFSOCT = '12251' OR PROFSOCT = '12252' OR PROFSOCT = '12253' OR PROFSOCT = '12260' OR PROFSOCT = '12310' OR PROFSOCT = '12311' OR PROFSOCT = '12312' OR PROFSOCT = '12320' OR PROFSOCT = '12330' OR PROFSOCT = '12340' OR PROFSOCT = '12350' OR PROFSOCT = '12390' OR PROFSOCT = '23141' OR PROFSOCT = '23151'"
	),
	'n300'	=> array(
		'label'	=> "Finance",
		'sql'	=> "PROFSOCT = '11310' OR PROFSOCT = '11311' OR PROFSOCT = '11312' OR PROFSOCT = '24235' OR PROFSOCT = '35311' OR PROFSOCT = '35312' OR PROFSOCT = '35324' OR PROFSOCT = '35325' OR PROFSOCT = '35330' OR PROFSOCT = '35340' OR PROFSOCT = '35341' OR PROFSOCT = '35342' OR PROFSOCT = '35343' OR PROFSOCT = '35344' OR PROFSOCT = '35345'"
	),
	'n400'	=> array(
		'label'	=> "Accountancy",
		'sql'	=> "PROFSOCT = '11313' OR PROFSOCT = '11330' OR PROFSOCT = '24210' OR PROFSOCT = '24211' OR PROFSOCT = '24212' OR PROFSOCT = '24213' OR PROFSOCT = '24214' OR PROFSOCT = '24220' OR PROFSOCT = '35310' OR PROFSOCT = '35313' OR PROFSOCT = '35314' OR PROFSOCT = '35320' OR PROFSOCT = '35321' OR PROFSOCT = '35322' OR PROFSOCT = '35323' OR PROFSOCT = '35350' OR PROFSOCT = '35351' OR PROFSOCT = '35352' OR PROFSOCT = '35360' OR PROFSOCT = '35370' OR PROFSOCT = '35371' OR PROFSOCT = '35372' OR PROFSOCT = '35393' OR PROFSOCT = '35410' OR PROFSOCT = '35411' OR PROFSOCT = '35412' OR PROFSOCT = '41220' OR PROFSOCT = '41221' OR PROFSOCT = '41222' OR PROFSOCT = '41223' OR PROFSOCT = '41224' OR PROFSOCT = '41320' OR PROFSOCT = '41321' OR PROFSOCT = '41322'"
	),
	'n500'	=> array(
		'label'	=> "Marketing",
		'sql'	=> "PROFSOCT = '11320' OR PROFSOCT = '11321' OR PROFSOCT = '35392' OR PROFSOCT = '35430' OR PROFSOCT = '35431' OR PROFSOCT = '35432' OR PROFSOCT = '35433' OR PROFSOCT = '35434' OR PROFSOCT = '35435' OR PROFSOCT = '41313' OR PROFSOCT = '41370'"
	),
	'n600'	=> array(
		'label'	=> "Human Resource Management",
		'sql'	=> "PROFSOCT = '11350' OR PROFSOCT = '11351' OR PROFSOCT = '11352' OR PROFSOCT = '11353' OR PROFSOCT = '35620' OR PROFSOCT = '35621' OR PROFSOCT = '35622' OR PROFSOCT = '35623' OR PROFSOCT = '35624' OR PROFSOCT = '41312'"
	),
	'n800'	=> array(
		'label'	=> "Tourism, Transport and Travel",
		'sql'	=> "PROFSOCT = '41340'"
	),
	'p100'	=> array(
		'label'	=> "Information Services",
		'sql'	=> "PROFSOCT = '24510'"
	),
	'p200'	=> array(
		'label'	=> "Publicity studies",
		'sql'	=> "PROFSOCT = '11340' OR PROFSOCT = '11342' OR PROFSOCT = '34125' OR PROFSOCT = '34164' OR PROFSOCT = '34330'"
	),
	'p300'	=> array(
		'label'	=> "Media studies",
		'sql'	=> "PROFSOCT = '11341' OR PROFSOCT = '34320' OR PROFSOCT = '34340' OR PROFSOCT = '34342' OR PROFSOCT = '34343' OR PROFSOCT = '34344' OR PROFSOCT = '34345'"
	),
	'p400'	=> array(
		'label'	=> "Publishing",
		'sql'	=> "PROFSOCT = '34214'"
	),
	'p500'	=> array(
		'label'	=> "Journalism",
		'sql'	=> "PROFSOCT = '34310' OR PROFSOCT = '34311' OR PROFSOCT = '34312'"
	),
	'q100'	=> array(
		'label'	=> "Linguistics",
		'sql'	=> "PROFSOCT = '34123' OR PROFSOCT = '34124'"
	),
	'v100'	=> array(
		'label'	=> "History",
		'sql'	=> "PROFSOCT = '24520' OR PROFSOCT = '24521' OR PROFSOCT = '24522'"
	),
	'v600'	=> array(
		'label'	=> "Theology and Religious studies",
		'sql'	=> "PROFSOCT = '24440'"
	),
	'w100'	=> array(
		'label'	=> "Fine Art",
		'sql'	=> "PROFSOCT = '24110'"
	),
	'w200'	=> array(
		'label'	=> "Design studies",
		'sql'	=> "PROFSOCT = '34210' OR PROFSOCT = '34211' OR PROFSOCT = '34213' OR PROFSOCT = '34220' OR PROFSOCT = '34221' OR PROFSOCT = '34222' OR PROFSOCT = '34223' OR PROFSOCT = '34224' OR PROFSOCT = '34225' OR PROFSOCT = '34226' OR PROFSOCT = '34341' OR PROFSOCT = '54140' OR PROFSOCT = '54190' OR PROFSOCT = '54210' OR PROFSOCT = '54240' OR PROFSOCT = '54910' OR PROFSOCT = '54950'"
	),
	'w300'	=> array(
		'label'	=> "Music",
		'sql'	=> "PROFSOCT = '34132' OR PROFSOCT = '34134' OR PROFSOCT = '34150' OR PROFSOCT = '34151' OR PROFSOCT = '34152' OR PROFSOCT = '54940'"
	),
	'w400'	=> array(
		'label'	=> "Drama",
		'sql'	=> "PROFSOCT = '34130' OR PROFSOCT = '34131' OR PROFSOCT = '34133' OR PROFSOCT = '34160' OR PROFSOCT = '34161' OR PROFSOCT = '34162' OR PROFSOCT = '34163'"
	),
	'w500'	=> array(
		'label'	=> "Dance",
		'sql'	=> "PROFSOCT = '34140'"
	),
	'w700'	=> array(
		'label'	=> "Crafts",
		'sql'	=> "PROFSOCT = '54960' OR PROFSOCT = '54990'"
	),
	'w800'	=> array(
		'label'	=> "Imaginative Writing",
		'sql'	=> "PROFSOCT = '34120' OR PROFSOCT = '34121'"
	),
	'x100'	=> array(
		'label'	=> "Teacher Training",
		'sql'	=> "PROFSOCT = '23110' OR PROFSOCT = '23111' OR PROFSOCT = '23112' OR PROFSOCT = '23113' OR PROFSOCT = '23114' OR PROFSOCT = '23120' OR PROFSOCT = '23140' OR PROFSOCT = '23142' OR PROFSOCT = '23150' OR PROFSOCT = '23152' OR PROFSOCT = '23160' OR PROFSOCT = '23190' OR PROFSOCT = '23191' OR PROFSOCT = '23192' OR PROFSOCT = '23193'"
	),
	'x200'	=> array(
		'label'	=> "Research and Study Skills in Education",
		'sql'	=> "PROFSOCT = '23210' OR PROFSOCT = '23220' OR PROFSOCT = '23290' OR PROFSOCT = '23291' OR PROFSOCT = '23292'"
	),
	'x900'	=> array(
		'label'	=> "Others in Education",
		'sql'	=> "PROFSOCT = '23130' OR PROFSOCT = '23131' OR PROFSOCT = '23132' OR PROFSOCT = '23133' OR PROFSOCT = '23170' OR PROFSOCT = '23194'"
	)
);

# mapping of qualification codes to pg/ug (1/2)
$qualcodes = array(
	"undergrad" => array(
		"H41", "H60", "H61", "H71", "H80", "H88", "I60", "I61", "J10", "J16", "J20", "J26", "J30", "C20", "C30", "M22", "H00", "H11", "H16", "H18", "H22", "H23", "H50", "I00", "I11", "I16"
	), 
	"postgrad" => array(
		"D00", "D01", "E00", "L00", "L80", "M00", "M01", "M10", "M11", "M16", "M41", "M50", "M71", "M80", "M86", "M88"
	),
	"otherug" => array(
		"H41", "H60",  "H61", "H71", "H80", "H88", "I60", "I61", "J10", "J16", "J20", "J26", "J30", "C20", "C30" 
	),
	"firstdeg" => array(
		"I16", "M22", "H00", "H11", "H16", "H18", "H22", "H23", "H50", "I00", "I11"
	),
	"pgtaught" => array(
		"M88", "M00", "M01", "M10", "M11", "M16", "M41", "M50", "M71", "M80", "M86"
	),
	"pgresearch" => array(
		"D00", "D01", "E00", "L00", "L80" 
	)
);

# prepare QUAL clauses from qualcodes array
$qualclauses = array();
foreach ( $qualcodes as $qualtype => $codearray) {
	$qualstat = "QUAL1 IN ('";
	$qualstat .= implode("', '", $codearray);
	$qualstat .= "')";
	$qualclauses[$qualtype] = $qualstat;
}


# sql statement modifiers for counting various sample types
$whereclauses = array(
	"all" 			=> "1 = 1 ",
	"fulltime" 		=> "XQMODE01 = '1'",
	"parttime" 		=> "XQMODE01 = '2'",
	"undergrad"		=> $qualclauses['undergrad'],
	"postgrad"		=> $qualclauses['postgrad'],
	"otherug"		=> $qualclauses['otherug'],
	"firstdeg"		=> $qualclauses['firstdeg'],
	"pgtaught"		=> $qualclauses['pgtaught'],
	"pgresearch"	=> $qualclauses['pgresearch'],
	"home"			=> "HOMEEU = '1' ",
	"eu"			=> "HOMEEU = '2' ",
	"homeeu"		=> "HOMEEU = '1' OR HOMEEU = '2'",
	"otherint"		=> "HOMEEU = '3' "
);

$clausemaps = array(
	'All'					=> 'all',
	'Full-time'				=> 'fulltime',
	'Part-time'				=> 'parttime',
	'Undergraduate'			=> 'undergrad',
	'Postgraduate'			=> 'postgrad',
	'Other Undergraduate'	=> 'otherug',
	'First degree'			=> 'firstdeg',
	'Postgraduate taught'	=> 'pgtaught',
	'Postgraduate research'	=> 'pgresearch',
	'Home'					=> 'home',
	'EU'					=> 'eu',
	'Home and EU'			=> 'homeeu',
	'Other international'	=> 'otherint'				
);

# categories for employment curcumstances and their sql statement modifiers

$empcircs = array(
	'ftemp' 	=> "EMPCIR IN ('1', '3', '01', '03') AND MODSTUDY IN ('3', '03')", 
	'ptemp' 	=> "EMPCIR IN ('2', '15', '02') AND MODSTUDY IN ('3', '03')", 
	'study' 	=> "(MODSTUDY IN ('1', '01') AND EMPCIR IN ('11', '12', '13', '14', '17')) OR (MODSTUDY IN ('2', '02') AND EMPCIR IN ('17', '13', '14'))",
	'workstudy'	=> "EMPCIR IN ('1', '2', '3', '15', '01', '02', '03') AND MODSTUDY IN ('1', '2', '01', '02')", 
	'noavail'	=> "EMPCIR+0 IN ('16', '10') OR (EMPCIR = '17' AND MODSTUDY IN ('3', '03'))", 
	'noemp'		=> "EMPCIR+0 IN ('11', '12') AND MODSTUDY IN ('2', '3', '02', '03')", 
	'other'		=> "MODSTUDY IN ('3', '03') and EMPCIR IN ('13', '14')", 
	'refusal'	=> "EMPCIR = 'XX' OR MODSTUDY = 'X'" 
);


$empcircs1112 = array(
	'ftemp' 	=> "(MIMPACT IN ('1', '01') AND (ALLACT1 NOT IN ('5', '6', '05', '06') AND ALLACT2 NOT IN ('5', '6', '05', '06') AND ALLACT3 NOT IN ('5', '6', '05', '06') AND ALLACT4 NOT IN ('5', '6', '05', '06') AND ALLACT5 NOT IN ('5', '6', '05', '06') AND ALLACT6 NOT IN ('5', '6', '05', '06') AND ALLACT7 NOT IN ('5', '6', '05', '06') AND ALLACT8 NOT IN ('5', '6', '05', '06'))) OR (MIMPACT IN ('4', '04') AND (ALLACT1 IN ('1', '01') OR ALLACT2 IN ('1', '01') OR ALLACT3 IN ('1', '01') OR ALLACT4 IN ('1', '01') OR ALLACT5 IN ('1', '01') OR ALLACT6 IN ('1', '01') OR ALLACT7 IN ('1', '01') OR ALLACT8 IN ('1', '01') ) AND (ALLACT1 NOT IN ('5', '05') AND ALLACT2 NOT IN ('5', '05') AND ALLACT3 NOT IN ('5', '05') AND ALLACT4 NOT IN ('5', '05') AND ALLACT5 NOT IN ('5', '05') AND ALLACT6 NOT IN ('5', '05') AND ALLACT7 NOT IN ('5', '05') AND ALLACT8 NOT IN ('5', '05')))", 
	'ptemp' 	=> "(MIMPACT IN ('2', '02') AND (ALLACT1 NOT IN ('5', '6', '05', '06') AND ALLACT2 NOT IN ('5', '6', '05', '06') AND ALLACT3 NOT IN ('5', '6', '05', '06') AND ALLACT4 NOT IN ('5', '6', '05', '06') AND ALLACT5 NOT IN ('5', '6', '05', '06') AND ALLACT6 NOT IN ('5', '6', '05', '06') AND ALLACT7 NOT IN ('5', '6', '05', '06') AND ALLACT8 NOT IN ('5', '6', '05', '06'))) OR (MIMPACT IN ('4', '04') AND (ALLACT1 IN ('2', '02') OR ALLACT2 IN ('2', '02') OR ALLACT3 IN ('2', '02') OR ALLACT4 IN ('2', '02') OR ALLACT5 IN ('2', '02') OR ALLACT6 IN ('2', '02') OR ALLACT7 IN ('2', '02') OR ALLACT8 IN ('2', '02') ) AND (ALLACT1 NOT IN ('5', '05', '1', '01') AND ALLACT2 NOT IN ('5', '05', '1', '01') AND ALLACT3 NOT IN ('5', '05', '1', '01') AND ALLACT4 NOT IN ('5', '05', '1', '01') AND ALLACT5 NOT IN ('5', '05', '1', '01') AND ALLACT6 NOT IN ('5', '05', '1', '01') AND ALLACT7 NOT IN ('5', '05', '1', '01') AND ALLACT8 NOT IN ('5', '05', '1', '01')))", 
	'study' 	=> "(MIMPACT IN ('4', '04') AND (ALLACT1 NOT IN ('1', '01') AND ALLACT2 NOT IN ('1', '01') AND ALLACT3 NOT IN ('1', '01') AND ALLACT4 NOT IN ('1', '01') AND ALLACT5 NOT IN ('1', '01') AND ALLACT6 NOT IN ('1', '01') AND ALLACT7 NOT IN ('1', '01') AND ALLACT8 NOT IN ('1', '01')) AND (ALLACT1 IN ('5', '05') OR ALLACT2 IN ('5', '05') OR ALLACT3 IN ('5', '05') OR ALLACT4 IN ('5', '05') OR ALLACT5 IN ('5', '05') OR ALLACT6 IN ('5', '05') OR ALLACT7 IN ('5', '05') OR ALLACT8 IN ('5', '05'))) OR (MIMPACT IN ('5', '6', '05', '06') AND (ALLACT1 NOT IN ('1', '2', '01', '02') AND ALLACT2 NOT IN ('1', '2', '01', '02') AND ALLACT3 NOT IN ('1', '2', '01', '02') AND ALLACT4 NOT IN ('1', '2', '01', '02') AND ALLACT5 NOT IN ('1', '2', '01', '02') AND ALLACT6 NOT IN ('1', '2', '01', '02') AND ALLACT7 NOT IN ('1', '2', '01', '02') AND ALLACT8 NOT IN ('1', '2', '01', '02')))",
	'workstudy'	=> "(MIMPACT IN ('1', '2', '01', '02') AND (ALLACT1 IN ('5', '6', '05', '06') OR ALLACT2 IN ('5', '6', '05', '06') OR ALLACT3 IN ('5', '6', '05', '06') OR ALLACT4 IN ('5', '6', '05', '06') OR ALLACT5 IN ('5', '6', '05', '06') OR ALLACT6 IN ('5', '6', '05', '06') OR ALLACT7 IN ('5', '6', '05', '06') OR ALLACT8 IN ('5', '6', '05', '06'))) OR (MIMPACT IN ('5', '6', '05', '06') AND (ALLACT1 IN ('1', '2', '01', '02') OR ALLACT2 IN ('1', '2', '01', '02') OR ALLACT3 IN ('1', '2', '01', '02') OR ALLACT4 IN ('1', '2', '01', '02') OR ALLACT5 IN ('1', '2', '01', '02') OR ALLACT6 IN ('1', '2', '01', '02') OR ALLACT7 IN ('1', '2', '01', '02') OR ALLACT8 IN ('1', '2', '01', '02'))) ", 
	'noavail'	=> "(1 = 0)", 
	'noemp'		=> "MIMPACT IN ('3', '03') OR (MIMPACT IN ('4', '04') AND (ALLACT1 NOT IN ('1', '2', '5', '01', '02', '05') AND ALLACT2 NOT IN ('1', '2', '5', '01', '02', '05') AND ALLACT3 NOT IN ('1', '2', '5', '01', '02', '05') AND ALLACT4 NOT IN ('1', '2', '5', '01', '02', '05') AND ALLACT5 NOT IN ('1', '2', '5', '01', '02', '05') AND ALLACT6 NOT IN ('1', '2', '5', '01', '02', '05') AND ALLACT7 NOT IN ('1', '2', '5', '01', '02', '05') AND ALLACT8 NOT IN ('1', '2', '5', '01', '02', '05')))", 
	'other'		=> "MIMPACT IN ('7', '8', '07', '08')", 
	'refusal'	=> "MIMPACT = 'X'" 
);

$empcirclabels = array(
	'ftemp' 	=> "Full time employment only", 
	'ptemp' 	=> "Part time employment only", 
	'study' 	=> "Further study only",
	'workstudy'	=> "Work and Study", 
	'noavail'	=> "Not available for work", 
	'noemp'		=> "Unemployed", 
	'other'		=> "Other", 
	'refusal'	=> "Information Refused" 
);

# statement modifers for population selector form advanced options
$emplevcodes = array(
	'grad'		=> array('111', '112', '113', '114', '115', '1162', '1163', '1171', '1172', '1173', '118', '1221', '1222', '1224', '1225', '1226', '1231', '1235', '1239', '2', '3111', '3113', '3114', '3115', '3119', '3121', '3123', '3132', '3211', '3212', '3214', '3215', '3218', '322', '323', '3312', '3319', '341', '342', '343', '3442', '3449', '3512', '352', '353', '354', '355', '356', '4111', '4114', '4137', '5245', '541'),
	'nongrad'	=> array('1161', '1174', '1219', '1223', '1232', '1233', '1234', '3112', '3122', '3131', '3213', '3216', '3217', '3311', '3313', '3314', '3441', '3443', '3511', '3513', '3514', '4112', '4113', '412', '4131', '4132', '4133', '4134', '4135', '4136', '414', '415', '42', '51', '521', '522', '523', '5241', '5242', '5243', '5244', '5249', '53', '5411', '5412', '5413', '5419', '542', '543', '549', '6', '7', '8', '9')
);

$gradempclauses = array();
foreach ( $emplevcodes as $emplev => $codearray) {
	$empstat = "SOCDLHE LIKE '";
	$empstat .= implode("%' OR SOCDLHE LIKE '", $codearray);
	$empstat .= "%'";
	$gradempclauses[$emplev] = $empstat;
}

$gradempclauses1112 = array(
	'grad'		=> "SOCDLHE LIKE '1%' OR SOCDLHE LIKE '2%' OR SOCDLHE LIKE '3%'",
	'nongrad'	=> "SOCDLHE NOT LIKE '1%' AND SOCDLHE NOT LIKE '2%' AND SOCDLHE NOT LIKE '3%'"
);

$empwheres = array(

	'emptypes' => array(
		'all'		=> array(
			'sql'		=> "1 = 1",
			'label'		=> "All employment types"
		),
		'ftpaid'	=> array(
			'sql' 		=> "EMPCIR = '1' OR EMPCIR = '01'",
			'label'		=> "Full-time paid employment"
		),
		'ptpaid'	=> array(
			'sql'		=> "EMPCIR = '2' OR EMPCIR = '02'",
			'label'		=>	"Part-time paid employment"
		),
		'unpaid'	=> array(
			'sql'		=> "EMPCIR = '15'",
			'label'		=> "Working unpaid"
		),
		'selfemp'	=> array(
			'sql'		=> "EMPCIR = '3' OR EMPCIR='03'",
			'label'		=> "Self employment"
		),
		'allftp'	=> array(
			'sql'		=> "(EMPCIR = '1' OR EMPCIR = '01' OR EMPCIR = '3' OR EMPCIR = '03') AND (MODSTUDY = '3' OR MODSTUDY = '03')",
			'label'		=> "all full-time paid employment (inc. self employed)"
		)
	),

	'emptypes1112' => array(
		'all'		=> array(
			'sql'		=> "1 = 1",
			'label'		=> "All employment types"
		),
		'ftpaid'	=> array(
			'sql' 		=> "EMPBASIS IN ('3', '4', '5', '9', '03', '04', '05', '09') AND (ALLACT1 IN ('1', '01') OR ALLACT2 IN ('1', '01') OR ALLACT3 IN ('1', '01') OR ALLACT4 IN ('1', '01') OR ALLACT5 IN ('1', '01') OR ALLACT6 IN ('1', '01') OR ALLACT7 IN ('1', '01') OR ALLACT8 IN ('1', '01'))",
			'label'		=> "Full-time paid employment"
		),
		'ptpaid'	=> array(
			'sql' 		=> "EMPBASIS IN ('3', '4', '5', '9', '03', '04', '05', '09') AND (ALLACT1 IN ('2', '02') OR ALLACT2 IN ('2', '02') OR ALLACT3 IN ('2', '02') OR ALLACT4 IN ('2', '02') OR ALLACT5 IN ('2', '02') OR ALLACT6 IN ('2', '02') OR ALLACT7 IN ('2', '02') OR ALLACT8 IN ('2', '02')) AND MIMPACT NOT IN ('1', '01') AND (ALLACT1 NOT IN ('1', '01') AND ALLACT2 NOT IN ('1', '01') AND ALLACT3 NOT IN ('1', '01') AND ALLACT4 NOT IN ('1', '01') AND ALLACT5 NOT IN ('1', '01') AND ALLACT6 NOT IN ('1', '01') AND ALLACT7 NOT IN ('1', '01') AND ALLACT8 NOT IN ('1', '01'))",
			'label'		=>	"Part-time paid employment"
		),
		'unpaid'	=> array(
			'sql'		=> "EMPBASIS IN ('6', '7', '06', '07')",
			'label'		=> "Working unpaid"
		),
		'selfemp'	=> array(
			'sql'		=> "EMPBASIS IN ('1', '2', '01', '02')",
			'label'		=> "Self employment"
		),
		'allftp'	=> array(
			'sql'		=> "EMPBASIS IN ('1', '2', '3', '4', '5', '9', '01', '02', '03', '04', '05', '09') AND (ALLACT1 IN ('1', '01') OR ALLACT2 IN ('1', '01') OR ALLACT3 IN ('1', '01') OR ALLACT4 IN ('1', '01') OR ALLACT5 IN ('1', '01') OR ALLACT6 IN ('1', '01') OR ALLACT7 IN ('1', '01') OR ALLACT8 IN ('1', '01'))",
			'label'		=> "all full-time paid empoyment (inc. self employed)"
		)
	),

	'emplevels' => array(
		'all'		=> array(
			'sql'		=> "1 = 1",
			'label'		=> "All employment levels"
		),
		'grad'		=> array(
			'sql'		=> $gradempclauses['grad'],
			'label'		=> "Managerial/Professional"
		),
		'nongrad'	=>  array(
			'sql'		=> $gradempclauses['nongrad'],
			'label'		=> "Non-Managerial/Professional"
		)
	),

	'emplevels1112' => array(
		'all'		=> array(
			'sql'		=> "1 = 1",
			'label'		=> "All employment levels"
		),
		'grad'		=> array(
			'sql'		=> $gradempclauses1112['grad'],
			'label'		=> "Managerial/Professional"
		),
		'nongrad'	=>  array(
			'sql'		=> $gradempclauses1112['nongrad'],
			'label'		=> "Non-Managerial/Professional"
		)
	),

	'contracts' => array(
		'all'			=> array(
			'sql'		=> "1 = 1",
			'label'		=> "All contract types"
		),
		'perm'			=>  array(
			'sql'		=> "DURATION+0 = '1'",
			'label'		=> "Permanent or open-ended contract"
		),
		'fixed12plus'	=>  array(
			'sql'		=> "DURATION+0 = '2'",
			'label'		=> "Fixed term contract: 12 months or longer"
		),
		'fixed12minus'	=>  array(
			'sql'		=> "DURATION+0 = '3'",
			'label'		=> "Fixed term contract: shorter than 12 months"
		),
		'selfemp'		=>  array(
			'sql'		=> "DURATION ='4'",
			'label'		=> "Self-employed/Freelance"
		),
		'ownbus'		=>  array(
			'sql'		=> "1 = 0", # no data in pre-11/12 surveys
			'label'		=> "Starting up own business"
		),
		'voluntary'	=> array(
			'sql'		=> "1 = 0", # no data in pre-11/12 surveys
			'label'		=> "Voluntary work"
		),
		'internship'	=> array(
			'sql'		=> "1 = 0", # no data in pre-11/12 surveys
			'label'		=> "On an internship"
		),
		'portfolio'		=>  array(
			'sql'		=> "1 = 0", # no data in pre-11/12 surveys
			'label'		=> "Developing a professional portfolio/creative practice"
		),
		'temp'	=> array(
			'sql'		=> "DURATION+0 IN ('5', '6')",
			'label'		=> "Temping"
		),
#		'tempagency'	=> array(
#			'sql'		=> "DURATION+0 = '5'",
#			'label'		=> " ... through an agency"
#		),
#		'tempnoagency'	=>  array(
#			'sql'		=> "DURATION+0 = '6'",
#			'label'		=> " ... other than through an agency"
#		),
		'other'	=>  array(
			'sql'		=> "DURATION+0 = '8'",
			'label'		=> "Other"
		),
		'unknown'	=>  array(
			'sql'		=> "DURATION = ''",
			'label'		=> "Unknown"
		)
	),

	'contracts1112' => array(
		'all'			=> array(
			'sql'		=> "1 = 1",
			'label'		=> "All contract types"
		),
		'perm'			=>  array(
			'sql'		=> "EMPBASIS IN ('3', '03')",
			'label'		=> "Permanent or open-ended contract"
		),
		'fixed12plus'	=>  array(
			'sql'		=> "EMPBASIS IN ('4', '04')",
			'label'		=> "Fixed term contract: 12 months or longer"
		),
		'fixed12minus'	=>  array(
			'sql'		=> "EMPBASIS IN ('5', '05')",
			'label'		=> "Fixed term contract: shorter than 12 months"
		),
		'selfemp'		=>  array(
			'sql'		=> "EMPBASIS IN ('1', '01')",
			'label'		=> "Self-employed/Freelance"
		),
		'ownbus'		=>  array(
			'sql'		=> "EMPBASIS IN ('2', '02')",
			'label'		=> "Starting up own business"
		),
		'voluntary'		=>  array(
			'sql'		=> "EMPBASIS IN ('6', '06')",
			'label'		=> "Voluntary work"
		),
		'internship'		=>  array(
			'sql'		=> "EMPBASIS IN ('7', '07')",
			'label'		=> "On an internship"
		),
		'portfolio'		=>  array(
			'sql'		=> "EMPBASIS IN ('8', '08')",
			'label'		=> "Developing a professional portfolio/creative practice"
		),
		'temp'	=> array(
			'sql'		=> "EMPBASIS IN ('9', '09')",
			'label'		=> "Temping"
		),
#		'tempagency'	=> array(
#			'sql'		=> "1 = 0", # no data in the 11/12 survey
#			'label'		=> " ... (through an agency)"
#		),
#		'tempnoagency'	=>  array(
#			'sql'		=> "1 = 0", # no data in the 11/12 survey
#			'label'		=> " ... (other than through an agency)"
#		),
		'other'	=>  array(
			'sql'		=> "EMPBASIS IN ('10')",
			'label'		=> "Other"
		),
		'unknown'	=>  array(
			'sql'		=> "EMPBASIS IN ('99')",
			'label'		=> "Unknown"
		)
	),

	'qualuses' => array(
		'all'		=>  array(
			'sql'		=> "1 = 1",
			'label'		=> "All qualification uses"
		),
		'formal'	=> array(
			'sql'		=> "QUALREQ = '5'",
			'label'		=> "Qualification - Formal requirement"
		),
		'advantage'	=>  array(
			'sql'		=> "QUALREQ = '3'",
			'label'		=> "Qualification - Advantage"
		),
		'notadv'	=>  array(
			'sql'		=> "QUALREQ = '4'",
			'label'		=> "Qualification - not required"
		),
		'unknown'	=>  array(
			'sql'		=> "QUALREQ = '8'",
			'label'		=> "Not known"
		)
	),

	'qualuses1112' => array(
		'all'		=>  array(
			'sql'		=> "1 = 1",
			'label'		=> "All qualification uses"
		),
		'formal'	=> array(
			'sql'		=> "QUALREQ = '11'",
			'label'		=> "Qualification - Formal requirement"
		),
		'advantage'	=>  array(
			'sql'		=> "QUALREQ = '12'",
			'label'		=> "Qualification - Advantage"
		),
		'notadv'	=>  array(
			'sql'		=> "QUALREQ = '13'",
			'label'		=> "Qualification - not required"
		),
		'unknown'	=>  array(
			'sql'		=> "QUALREQ = '14'",
			'label'		=> "Not known"
		)
	),

	'industries' => array(
		'all'		=>  array(
			'sql'		=> "1 = 1",
			'label'		=> "All industries",
			'subinds'	=> array()
		),
		'agriculture'	=> array(
			'sql'		=> "SIC2007 LIKE '1__' OR SIC2007 LIKE '2__' OR SIC2007 LIKE '3__'",
			'label'		=> "Agriculture, forestry and fishing",
			'subinds'	=> array(
				'farming'	=> array(
					'label'		=> 'Crop and animal production',
					'sql'		=> "SIC2007 LIKE '1__'"
				),
				'forestry'	=> array(
					'label'		=> 'Forestry and logging',
					'sql'		=> "SIC2007 LIKE '2__'"
				),
				'fishing'	=> array(
					'label'		=> 'Fishing',
					'sql'		=> "SIC2007 LIKE '3__'"
				)
			)
		),
		'mining' =>  array(
			'sql'		=> "SIC2007 LIKE '5__' OR SIC2007 LIKE '6__' OR SIC2007 LIKE '7__' OR SIC2007 LIKE '8__' OR SIC2007 LIKE '9__'",
			'label'		=> "Mining and quarrying",
			'subinds'	=> array(
				'coal'		=> array(
					'label'		=> 'Mining of coal and lignite',
					'sql'		=> "SIC2007 LIKE '5__'"
				),
				'petrol'	=> array(
					'label'		=> 'Extraction of petroleum and gas',
					'sql'		=> "SIC2007 LIKE '6__'"
				),
				'metal'		=> array(
					'label'		=> 'Mining of metal ores',
					'sql'		=> "SIC2007 LIKE '7__'"
				),
				'other'		=> array(
					'label'		=> 'Other mining and quarrying',
					'sql'		=> "SIC2007 LIKE '8__'"
				),
				'support'		=> array(
					'label'		=> 'Mining support services',
					'sql'		=> "SIC2007 LIKE '9__'"
				)
			)
		),
		'manufacturing' =>  array(
			'sql'		=> "SIC2007 LIKE '1___' OR SIC2007 LIKE '2___' OR SIC2007 LIKE '30__' OR SIC2007 LIKE '31__' OR SIC2007 LIKE '32__' OR SIC2007 LIKE '33__'",
			'label'		=> "Manufacturing",
			'subinds'	=> array(
				'food'		=> array(
					'label'		=> 'Manufacture of food products',
					'sql'		=> "SIC2007 LIKE '10__'"
				),
				'drink'		=> array(
					'label'		=> 'Manufacture of beverages',
					'sql'		=> "SIC2007 LIKE '11__'"
				),
				'tobacco'	=> array(
					'label'		=> 'Manufacture of tobacco products',
					'sql'		=> "SIC2007 LIKE '12__'"
				),
				'textiles'		=> array(
					'label'		=> 'Manufacture of textiles',
					'sql'		=> "SIC2007 LIKE '13__'"
				),
				'clothes'		=> array(
					'label'		=> 'Manufacture of wearing apparel',
					'sql'		=> "SIC2007 LIKE '14__'"
				),
				'leather'		=> array(
					'label'		=> 'Manufacture of leather and related products',
					'sql'		=> "SIC2007 LIKE '15__'"
				),
				'wood'		=> array(
					'label'		=> 'Manufacture of wood and wood products',
					'sql'		=> "SIC2007 LIKE '16__'"
				),
				'paper'		=> array(
					'label'		=> 'Manufacture of paper and paper products',
					'sql'		=> "SIC2007 LIKE '17__'"
				),
				'printing'		=> array(
					'label'		=> 'Printing and reproduction of recorded media',
					'sql'		=> "SIC2007 LIKE '18__'"
				),
				'petrol'		=> array(
					'label'		=> 'Manufacture of coke and refined petroleum products',
					'sql'		=> "SIC2007 LIKE '19__'"
				),
				'chemicals'		=> array(
					'label'		=> 'Manufacture of chemicals and chemical products',
					'sql'		=> "SIC2007 LIKE '20__'"
				),
				'drugs'		=> array(
					'label'		=> 'Manufacture of pharmaceutical products',
					'sql'		=> "SIC2007 LIKE '21__'"
				),
				'plastics'		=> array(
					'label'		=> 'Manufacture of rubber and plastic products',
					'sql'		=> "SIC2007 LIKE '22__'"
				),
				'minerals'		=> array(
					'label'		=> 'Manufacture of other non-metallic mineral products',
					'sql'		=> "SIC2007 LIKE '23__'"
				),
				'basicmetal'	=> array(
					'label'		=> 'Manufacture of basic metals',
					'sql'		=> "SIC2007 LIKE '24__'"
				),
				'fabmetal'		=> array(
					'label'		=> 'Manufacture of fabricated metal products',
					'sql'		=> "SIC2007 LIKE '25__'"
				),
				'computers'		=> array(
					'label'		=> 'Manufacture of computer, electronic and optical products',
					'sql'		=> "SIC2007 LIKE '26__'"
				),
				'electrical'	=> array(
					'label'		=> 'Manufacture of electrical equipment',
					'sql'		=> "SIC2007 LIKE '27__'"
				),
				'machinery'		=> array(
					'label'		=> 'Manufacture of other machinery and equipment',
					'sql'		=> "SIC2007 LIKE '28__'"
				),
				'vehicles'		=> array(
					'label'		=> 'Manufacture of motor vehicles, trailers and semi-trailers',
					'sql'		=> "SIC2007 LIKE '29__'"
				),
				'transport'		=> array(
					'label'		=> 'Manufacture of other transport equipment',
					'sql'		=> "SIC2007 LIKE '30__'"
				),
				'furniture'		=> array(
					'label'		=> 'Manufacture of furniture',
					'sql'		=> "SIC2007 LIKE '31__'"
				),
				'jewellery'		=> array(
					'label'		=> 'Manufacture of jewellery and other goods',
					'sql'		=> "SIC2007 LIKE '32__'"
				),
				'repair'		=> array(
					'label'		=> 'Repair and installation of machinery and equipment',
					'sql'		=> "SIC2007 LIKE '33__'"
				)
			)
		),
		'power'	=>  array(
			'sql'		=> "SIC2007 LIKE '35__'",
			'label'		=> "Electricity, gas, steam and air conditioning supply",
			'subinds'	=> array(
				'electricity'	=> array(
					'label'		=> 'Electric power generation, transmission and distribution',
					'sql'		=> "SIC2007 LIKE '351_'"
				),
				'gas'		=> array(
					'label'		=> 'Manufacture and distribution of gas',
					'sql'		=> "SIC2007 LIKE '352_'"
				),
				'aircon'	=> array(
					'label'		=> 'Steam and air conditioning supply',
					'sql'		=> "SIC2007 LIKE '353_'"
				),
				'other'	=> array(
					'label'		=> 'Active across more than one part of sector',
					'sql'		=> "SIC2007 LIKE '35__' AND SIC2007 NOT LIKE '351_' AND SIC2007 NOT LIKE '352_' AND SIC2007 NOT LIKE '353_'"
				)
			)
		),
		'water'	=>  array(
			'sql'		=> "SIC2007 LIKE '36__' OR SIC2007 LIKE '37__' OR SIC2007 LIKE '38__' OR SIC2007 LIKE '39__'",
			'label'		=> "Water supply, sewerage, waste management and remediation activities",
			'subinds'	=> array(
				'watertreat'	=> array(
					'label'		=> 'Water collection, treatment and supply',
					'sql'		=> "SIC2007 LIKE '36__'"
				),
				'sewearge'		=> array(
					'label'		=> 'Sewerage',
					'sql'		=> "SIC2007 LIKE '37__'"
				),
				'wastetreat'	=> array(
					'label'		=> 'Waste collection and treatment',
					'sql'		=> "SIC2007 LIKE '38__'"
				),
				'remediation'	=> array(
					'label'		=> 'Remediation activities',
					'sql'		=> "SIC2007 LIKE '39__'"
				)
			)
		),
		'construction'	=>  array(
			'sql'		=> "SIC2007 LIKE '41__' OR SIC2007 LIKE '42__' OR SIC2007 LIKE '43__'",
			'label'		=> "Construction",
			'subinds'	=> array(
				'buildings'	=> array(
					'label'		=> 'Construction of buildings',
					'sql'		=> "SIC2007 LIKE '41__'"
				),
				'civil'		=> array(
					'label'		=> 'Civil engineering',
					'sql'		=> "SIC2007 LIKE '42__'"
				),
				'specialised'	=> array(
					'label'		=> 'Specialised construction activities',
					'sql'		=> "SIC2007 LIKE '43__'"
				)
			)
		),
		'retail'	=>  array(
			'sql'		=> "SIC2007 LIKE '45__' OR SIC2007 LIKE '46__' OR SIC2007 LIKE '47__'",
			'label'		=> "Wholesale and retail trade; repair of motor vehicles and motor cycles",
			'subinds'	=> array(
				'trade'	=> array(
					'label'		=> 'Trade and repair of motor vehicles and motorcycles',
					'sql'		=> "SIC2007 LIKE '45__'"
				),
				'wholesale'		=> array(
					'label'		=> 'Wholesale trade, except of motor vehicles and motorcycles',
					'sql'		=> "SIC2007 LIKE '46__'"
				),
				'retail'	=> array(
					'label'		=> 'Retail trade, except of motor vehicles and motorcycles',
					'sql'		=> "SIC2007 LIKE '47__'"
				)
			)
		),
		'accomodation'	=>  array(
			'sql'		=> "SIC2007 LIKE '49__' OR SIC2007 LIKE '50__' OR SIC2007 LIKE '51__' OR SIC2007 LIKE '52__' OR SIC2007 LIKE '53__'",
			'label'		=> "Accommodation and food service activities",
			'subinds'	=> array(
				'land'		=> array(
					'label'		=> 'Land transport and transport via pipelines',
					'sql'		=> "SIC2007 LIKE '49__'"
				),
				'water'		=> array(
					'label'		=> 'Water transport',
					'sql'		=> "SIC2007 LIKE '50__'"
				),
				'air'		=> array(
					'label'		=> 'Air transport',
					'sql'		=> "SIC2007 LIKE '51__'"
				),
				'warehousing'	=> array(
					'label'		=> 'Warehousing and support activities for transport',
					'sql'		=> "SIC2007 LIKE '52__'"
				),
				'postal'		=> array(
					'label'		=> 'Postal and courier activities',
					'sql'		=> "SIC2007 LIKE '53__'"
				)
			)
		),
		'transport'	=>  array(
			'sql'		=> "(SIC2007 LIKE '55__' OR SIC2007 LIKE '56__')",
			'label'		=> "Transport and storage",
			'subinds'	=> array(
				'accomodation'	=> array(
					'label'		=> 'Accommodation',
					'sql'		=> "SIC2007 LIKE '55__'"
				),
				'food'		=> array(
					'label'		=> 'Food and beverage service activities',
					'sql'		=> "SIC2007 LIKE '56__'"
				)
			)
		),
		'communication'	=>  array(
			'sql'		=> "SIC2007 LIKE '58__' OR SIC2007 LIKE '59__' OR SIC2007 LIKE '60__' OR SIC2007 LIKE '61__' OR SIC2007 LIKE '62__' OR SIC2007 LIKE '63__'",
			'label'		=> "Information and communication",
			'subinds'	=> array(
				'publishing'	=> array(
					'label'		=> 'Publishing activities',
					'sql'		=> "SIC2007 LIKE '58__'"
				),
				'filmtvmusic'		=> array(
					'label'		=> 'Motion picture, video and television programme production, sound recording and music publishing',
					'sql'		=> "SIC2007 LIKE '59__'"
				),
				'broadcasting'	=> array(
					'label'		=> 'Programming and broadcasting activities',
					'sql'		=> "SIC2007 LIKE '60__'"
				),
				'telecomms'		=> array(
					'label'		=> 'Telecommunications',
					'sql'		=> "SIC2007 LIKE '61__'"
				),
				'l33t'		=> array(
					'label'		=> 'Computer programming, consultancy and related activities',
					'sql'		=> "SIC2007 LIKE '62__'"
				),
				'information'	=> array(
					'label'		=> 'Information service activities',
					'sql'		=> "SIC2007 LIKE '63__'"
				)
			)
		),
		'finance'	=>  array(
			'sql'		=> "SIC2007 LIKE '64__' OR SIC2007 LIKE '65__' OR SIC2007 LIKE '66__'",
			'label'		=> "Financial and insurance activities",
			'subinds'	=> array(
				'financialservice'	=> array(
					'label'		=> 'Financial service activities',
					'sql'		=> "SIC2007 LIKE '64__'"
				),
				'insurance'		=> array(
					'label'		=> 'Insurance, reinsurance and pension funding',
					'sql'		=> "SIC2007 LIKE '65__'"
				),
				'auxiliary'	=> array(
					'label'		=> 'Activities auxilliary to financial services and insurance',
					'sql'		=> "SIC2007 LIKE '66__'"
				)
			)
		),
		'realestate'	=>  array(
			'sql'		=> "SIC2007 LIKE '68__'",
			'label'		=> "Real estate activities",
			'subinds'	=> array(
				'publishing'	=> array(
					'label'		=> 'Buying and selling of own real estate',
					'sql'		=> "SIC2007 LIKE '681_'"
				),
				'filmtvmusic'		=> array(
					'label'		=> 'Renting and operating of own or leased real estate',
					'sql'		=> "SIC2007 LIKE '682_'"
				),
				'broadcasting'	=> array(
					'label'		=> 'Real estate activities on a fee or contract basis',
					'sql'		=> "SIC2007 LIKE '683_'"
				),
				'telecomms'		=> array(
					'label'		=> 'Active across more than one part of sector',
					'sql'		=> "SIC2007 LIKE '68__' AND SIC2007 NOT LIKE '681_' AND SIC2007 NOT LIKE '682_' AND SIC2007 NOT LIKE '683_'"
				)
			)
		),
		'science'	=>  array(
			'sql'		=> "SIC2007 LIKE '69__' OR SIC2007 LIKE '70__' OR SIC2007 LIKE '71__' OR SIC2007 LIKE '72__' OR SIC2007 LIKE '73__' OR SIC2007 LIKE '74__' OR SIC2007 LIKE '75__'",
			'label'		=> "Professional, scientific and technical activities",
			'subinds'	=> array(
				'legal'		=> array(
					'label'		=> 'Legal and accounting activities',
					'sql'		=> "SIC2007 LIKE '69__'"
				),
				'headoffice'		=> array(
					'label'		=> 'Activities of head offices; management consultancy activities',
					'sql'		=> "SIC2007 LIKE '70__'"
				),
				'engineering'	=> array(
					'label'		=> 'Architectural and engineering activities; technical testing and analysis',
					'sql'		=> "SIC2007 LIKE '71__'"
				),
				'scienceresearch'	=> array(
					'label'		=> 'Scientific research and development',
					'sql'		=> "SIC2007 LIKE '72__'"
				),
				'advertising'	=> array(
					'label'		=> 'Advertising and market research',
					'sql'		=> "SIC2007 LIKE '73__'"
				),
				'other'		=> array(
					'label'		=> 'Other professional, scientific and technical activities',
					'sql'		=> "SIC2007 LIKE '74__'"
				),
				'veterinary'	=> array(
					'label'		=> 'Veterinary activities',
					'sql'		=> "SIC2007 LIKE '75__'"
				)
			)
		),
		'admin'	=>  array(
			'sql'		=> "SIC2007 LIKE '77__' OR SIC2007 LIKE '78__' OR SIC2007 LIKE '79__' OR SIC2007 LIKE '80__' OR SIC2007 LIKE '81__' OR SIC2007 LIKE '82__'",
			'label'		=> "Administrative and support service activities",
			'subinds'	=> array(
				'rental'	=> array(
					'label'		=> 'Rental and leasing activities',
					'sql'		=> "SIC2007 LIKE '77__'"
				),
				'employment'	=> array(
					'label'		=> 'Employment activities',
					'sql'		=> "SIC2007 LIKE '78__'"
				),
				'travel'	=> array(
					'label'		=> 'Travel agency, tour operator and other reservation services',
					'sql'		=> "SIC2007 LIKE '79__'"
				),
				'security'	=> array(
					'label'		=> 'Security and investigation activities',
					'sql'		=> "SIC2007 LIKE '80__'"
				),
				'buildings'	=> array(
					'label'		=> 'Services to buildings and landscape activities',
					'sql'		=> "SIC2007 LIKE '81__'"
				),
				'office'		=> array(
					'label'		=> 'Office administrative, office support and other business support',
					'sql'		=> "SIC2007 LIKE '82__'"
				)
			)
		),
		'public'	=>  array(
			'sql'		=> "SIC2007 LIKE '84__'",
			'label'		=> "Public Administration and defence; compulsory social security",
			'subinds'	=> array(
				'state'	=> array(
					'label'		=> 'Administration of the State and the economic and social policy of the community',
					'sql'		=> "SIC2007 LIKE '841_'"
				),
				'community'	=> array(
					'label'		=> 'Provision of services to the community as a whole',
					'sql'		=> "SIC2007 LIKE '842_'"
				),
				'social'	=> array(
					'label'		=> 'Compulsary social security activities',
					'sql'		=> "SIC2007 LIKE '843_'"
				),
				'other'	=> array(
					'label'		=> 'Active across more than one part of sector',
					'sql'		=> "SIC2007 LIKE '84__' AND SIC2007 NOT LIKE '841_' AND SIC2007 NOT LIKE '842_' AND SIC2007 NOT LIKE '843_'"
				)
			)
		),
		'education'	=>  array(
			'sql'		=> "SIC2007 LIKE '85__'",
			'label'		=> "Education",
			'subinds'	=> array(
				'pre-primary'	=> array(
					'label'	=> 'Pre-primary education',
					'sql'		=> "SIC2007 LIKE '851_'"
				),
				'primary'	=> array(
					'label'		=> 'Primary education',
					'sql'		=> "SIC2007 LIKE '852_'"
				),
				'secondary'	=> array(
					'label'		=> 'Secondary education',
					'sql'		=> "SIC2007 LIKE '853_'"
				),
				'further'	=> array(
					'label'		=> 'Further education',
					'sql'		=> "SIC2007 LIKE '8542'"
				),
				'higher'	=> array(
					'label'		=> 'Higher education',
					'sql'		=> "SIC2007 LIKE '854_'"
				),
				'othered'	=> array(
					'label'		=> 'Other education',
					'sql'		=> "SIC2007 LIKE '855_'"
				),
				'support'	=> array(
					'label'		=> 'Educational support activities',
					'sql'		=> "SIC2007 LIKE '856_'"
				),
				'other'	=> array(
					'label'		=> 'Active across more than one part of sector',
					'sql'		=> "SIC2007 LIKE '85__' AND SIC2007 NOT LIKE '851_' AND SIC2007 NOT LIKE '852_' AND SIC2007 NOT LIKE '853_' AND SIC2007 NOT LIKE '854_' AND SIC2007 NOT LIKE '855_' AND SIC2007 NOT LIKE '856_'"
				)
			)
		),
		'health'	=>  array(
			'sql'		=> "SIC2007 LIKE '86__' OR SIC2007 LIKE '87__' OR SIC2007 LIKE '88__'",
			'label'		=> "Human health and social work activities",
			'subinds'	=> array(
				'humanhealth'	=> array(
					'label'		=> 'Human health activities',
					'sql'		=> "SIC2007 LIKE '86__'"
				),
				'residential'	=> array(
					'label'		=> 'Residential care activities',
					'sql'		=> "SIC2007 LIKE '87__'"
				),
				'social'		=> array(
					'label'		=> 'Social work activities without accommodation',
					'sql'		=> "SIC2007 LIKE '88__'"
				)
			)
		),
		'arts'	=>  array(
			'sql'		=> "SIC2007 LIKE '90__' OR SIC2007 LIKE '91__' OR SIC2007 LIKE '92__' OR SIC2007 LIKE '93__'",
			'label'		=> "Arts, entertainment and recreation",
			'subinds'	=> array(
				'creative'	=> array(
					'label'		=> 'Creative, arts and entertainment activities',
					'sql'		=> "SIC2007 LIKE '90__'"
				),
				'library'	=> array(
					'label'		=> 'Libraries, archives, museums and other cultural activities',
					'sql'		=> "SIC2007 LIKE '91__'"
				),
				'gambling'	=> array(
					'label'		=> 'Gambling and betting activities',
					'sql'		=> "SIC2007 LIKE '92__'"
				),
				'sports'		=> array(
					'label'		=> 'Sports activities and amusement and recreation activities',
					'sql'		=> "SIC2007 LIKE '93__'"
				)
			)
		),
		'otherservice'	=>  array(
			'sql'		=> "SIC2007 LIKE '94__' OR SIC2007 LIKE '95__' OR SIC2007 LIKE '96__'",
			'label'		=> "Other service activities",
			'subinds'	=> array(
				'membership'	=> array(
					'label'		=> 'Activities of membership organisations',
					'sql'		=> "SIC2007 LIKE '94__'"
				),
				'repair'	=> array(
					'label'		=> 'Repair of computers and personal and household goods',
					'sql'		=> "SIC2007 LIKE '95__'"
				),
				'other'		=> array(
					'label'		=> 'Other personal service activities',
					'sql'		=> "SIC2007 LIKE '96__'"
				)
			)
		),
		'households'	=>  array(
			'sql'		=> "SIC2007 LIKE '97__' OR SIC2007 LIKE '98__'",
			'label'		=> "Activities of households as employers",
			'subinds'	=> array()
		),
		'extraterritorial'	=>  array(
			'sql'		=> "SIC2007 LIKE '99__'",
			'label'		=> "Activities of extraterritorial organisations",
			'subinds'	=> array()
		)

	),

	'orgsizes' => array(
		'all'		=>  array(
			'sql'		=> "1 = 1",
			'label'		=> "All organisation sizes"
		),
		'small'	=> array(
			'sql'		=> "EMPSIZE = '1'",
			'label'		=> "Small company (1-49 employees)"
		),
		'medium'	=>  array(
			'sql'		=> "EMPSIZE = '2'",
			'label'		=> "Medium-sized company"
		),
		'large'	=>  array(
			'sql'		=> "EMPSIZE = '3'",
			'label'		=> "Large company (250+ employees)"
		),
		'unknown'	=>  array(
			'sql'		=> "EMPSIZE = '8'",
			'label'		=> "Not known"
		)
	),

	# now that HESA have backtracked from the ZNOEMPBAND 3rd party data, zero any results for 
	# 11/12 or later that specify an employer size

	'orgsizes1112' => array(
		'all'		=>  array(
			'sql'		=> "1 = 1",
			'label'		=> "All organisation sizes"
		),
		'small'	=> array(
			'sql'		=> "1 = 0",
			'label'		=> "Small company (1-49 employees)"
		),
		'medium'	=>  array(
			'sql'		=> "1 = 0",
			'label'		=> "Medium-sized company"
		),
		'large'	=>  array(
			'sql'		=> "1 = 0",
			'label'		=> "Large company (250+ employees)"
		),
		'unknown'	=>  array(
			'sql'		=> "1 = 0",
			'label'		=> "Not known"
		)
	),

	// 'orgsizes1112' => array(
	// 	'all'		=>  array(
	// 		'sql'		=> "1 = 1",
	// 		'label'		=> "All organisation sizes"		),
	// 	'small'	=> array(
	// 		'sql'		=> "ZNOEMPBAND IN ('A', 'B', 'C', 'D')",
	// 		'label'		=> "Small company (1-49 employees)",
	// 		'subset'	=> array(
	// 			'1-5 employees'		=> "ZNOEMPBAND = 'A'",
	// 			'6-10 employees' 	=> "ZNOEMPBAND = 'B'",
	// 			'11-25 employees'	=> "ZNOEMPBAND = 'C'",
	// 			'25-50 employees'	=> "ZNOEMPBAND = 'D'"
	// 		)
	// 	),
	// 	'medium'	=>  array(
	// 		'sql'		=> "ZNOEMPBAND IN ('E', 'F')",
	// 		'label'		=> "Medium-sized company",
	// 		'subset'	=> array(
	// 			'51-100 employees'		=> "ZNOEMPBAND = 'E'",
	// 			'100-200 employees' 	=> "ZNOEMPBAND = 'F'"
	// 		)
	// 	),
	// 	'large'	=>  array(
	// 		'sql'		=> "ZNOEMPBAND IN ('G', 'H')",
	// 		'label'		=> "Large company (200+ employees)",
	// 		'subset'	=> array(
	// 			'201-500 employees'		=> "ZNOEMPBAND = 'G'",
	// 			'500+ employees' 		=> "ZNOEMPBAND = 'H'"
	// 		)
	// 	),
	// 	'unknown'	=>  array(
	// 		'sql'		=> "ZNOEMPBAND = '' OR ZNOEMPBAND = 'X' OR ZNOEMPBAND IS NULL",
	// 		'label'		=> "Not known"
	// 	)
	// ),

	'socs' => array(
		'all'		=>  array(
			'sql'		=> "1 = 1",
			'label'		=> "All occupational classifications"
		),
		'managerial'	=> array(
			'sql'		=> "SOCDLHE LIKE '1%'",
			'label'		=> "Managerial and senior officials"
		),
		'professional'	=>  array(
			'sql'		=> "SOCDLHE LIKE '2%'",
			'label'		=> "Professional Occupations"
		),
		'technical'	=> array(
			'sql'		=> "SOCDLHE LIKE '3%'",
			'label'		=> "Associate professional and technical occupations"
		),
		'clerical'	=>  array(
			'sql'		=> "SOCDLHE LIKE '4%'",
			'label'		=> "Administrative and secretarial occupations"
		),
		'formal'	=> array(
			'sql'		=> "SOCDLHE LIKE '5%'",
			'label'		=> "Skilled trades occupations"
		),
		'personal'	=>  array(
			'sql'		=> "SOCDLHE LIKE '6%'",
			'label'		=> "Personal service occupations"
		),
		'sales'	=> array(
			'sql'		=> "SOCDLHE LIKE '7%'",
			'label'		=> "Sales and customer service occupations"
		),
		'machine'	=>  array(
			'sql'		=> "SOCDLHE LIKE '8%'",
			'label'		=> "Process, plant and machine operatives"
		),
		'elementary' =>  array(
			'sql'		=> "SOCDLHE LIKE '9%'",
			'label'		=> "Elementary occupations"
		)
	)

);


# build the sql where clauses for graduate prospects
$prospcodes = array(
	'posemp' 	=> array(
		'SOCDLHE' 	=> array('111', '112', '113', '114', '115', '1162', '1163', '1171', '1172', '1173', '118', '1221', '1222', '1224', '1225', '1226', '1231', '1235', '1239', '2', '3111', '3113', '3114', '3115', '3119', '3121', '3123', '3132', '3211', '3212', '3214', '3215', '3218', '322', '323', '3312', '3319', '341', '342', '343', '3442', '3449', '3512', '352', '353', '354', '355', '356', '4111', '4114', '4137', '5245', '541'),
		'TYPEQUAL' 	=> array('1', '2', '3', '4', '6', '01', '02', '03', '04', '06'),
		'EMPCIR'	=> array('1', '2', '3', '15', '01', '02', '03'),
		'1112SQL'	=> "(".$empcircs1112['ftemp'].") OR (".$empcircs1112['ptemp'].") OR (".$empcircs1112['workstudy'].")",
		'ALLACT'	=> array('1', '2')
	),
	'negemp'	=> array(
		'SOCDLHE'	=> array('1161', '1174', '1219', '1223', '1232', '1233', '1234', '3112', '3122', '3131', '3213', '3216', '3217', '3311', '3313', '3314', '3441', '3443', '3511', '3513', '3514', '4112', '4113', '412', '4131', '4132', '4133', '4134', '4135', '4136', '414', '415', '42', '51', '521', '522', '523', '5241', '5242', '5243', '5244', '5249', '53', '5411', '5412', '5413', '5419', '542', '543', '549', '6', '7', '8', '9'),
		'TYPEQUAL'	=> array('5', '7', '98', 'XX', '05', '07'),
		'EMPCIR'	=> array('1', '2', '3', '15'),
		'1112SQL'	=> "(".$empcircs1112['ftemp'].") OR (".$empcircs1112['ptemp'].") OR (".$empcircs1112['workstudy'].") ) OR (".$empcircs1112['noemp'].")",
		'ALLACT'	=> array('1', '2')
	),
	'posstudy'	=> array(
		'TYPEQUAL' 	=> array('1', '2', '3', '4', '6', '01', '02', '03', '04', '06'),
		'EMPCIR'	=> array('12', '13', '14'),
		'1112SQL'	=> $empcircs1112['study'],
		'ALLACT'	=> array('3', '7')
	),
	'negstudy'	=> array(
		'TYPEQUAL' 	=> array('5', '7', '98', 'XX', '05', '07'),
		'EMPCIR'	=> array('12'),
		'1112SQL'	=> $empcircs1112['study'],
		'ALLACT'	=> array('3', '7')
	)
);
 
$prospclauses = array();

$prospclauses['posemp'] = "(SOCDLHE LIKE '";
$prospclauses['posemp'] .= implode("%' OR SOCDLHE LIKE '", $prospcodes['posemp']['SOCDLHE'] );
$prospclauses['posemp'] .= "%' OR TYPEQUAL IN ('";
$prospclauses['posemp'] .= implode("', '", $prospcodes['posemp']['TYPEQUAL'] );
$prospclauses['posemp'] .= "')) AND (EMPCIR IN ('";
$prospclauses['posemp'] .= implode("', '", $prospcodes['posemp']['EMPCIR'] );
$prospclauses['posemp'] .= "'))";

$prospclauses['negemp'] = "(SOCDLHE LIKE '";
$prospclauses['negemp'] .= implode("%' OR SOCDLHE LIKE '", $prospcodes['negemp']['SOCDLHE'] );
$prospclauses['negemp'] .= "%') AND (TYPEQUAL IN ('";
$prospclauses['negemp'] .= implode("', '", $prospcodes['negemp']['TYPEQUAL'] );
$prospclauses['negemp'] .= "')) AND (EMPCIR+0 IN ('";
$prospclauses['negemp'] .= implode("', '", $prospcodes['negemp']['EMPCIR'] );
$prospclauses['negemp'] .= "')) AND (SOCDLHE NOT LIKE '";
$prospclauses['negemp'] .= implode("%' AND SOCDLHE NOT LIKE '", $prospcodes['posemp']['SOCDLHE'] );
$prospclauses['negemp'] .= "%')";

$prospclauses['posstudy'] = "(TYPEQUAL IN ('";
$prospclauses['posstudy'] .= implode("', '", $prospcodes['posstudy']['TYPEQUAL'] );
$prospclauses['posstudy'] .= "')) AND (EMPCIR IN ('";
$prospclauses['posstudy'] .= implode("', '", $prospcodes['posstudy']['EMPCIR'] );
$prospclauses['posstudy'] .= "'))";

$prospclauses['negstudy'] = "(TYPEQUAL IN ('";
$prospclauses['negstudy'] .= implode("', '", $prospcodes['negstudy']['TYPEQUAL'] );
$prospclauses['negstudy'] .= "')) AND EMPCIR = '12'";

$prospclauses1112 = array();

$prospclauses1112['posemp'] = "(SOCDLHE LIKE '1%' OR SOCDLHE LIKE '2%' OR SOCDLHE LIKE '3%' OR TYPEQUAL IN ('";
$prospclauses1112['posemp'] .= implode("', '", $prospcodes['posemp']['TYPEQUAL'] );
$prospclauses1112['posemp'] .= "')) AND ( ".$prospcodes['posemp']['1112SQL']." )";

$prospclauses1112['negemp'] = "((SOCDLHE NOT LIKE '1%' AND SOCDLHE NOT LIKE '2%' AND SOCDLHE NOT LIKE '3%') OR TYPEQUAL IN ('";
$prospclauses1112['negemp'] .= implode("', '", $prospcodes['negemp']['TYPEQUAL'] );
$prospclauses1112['negemp'] .= "')) AND ( ".$prospcodes['negemp']['1112SQL']." ";

$prospclauses1112['posstudy'] = "(TYPEQUAL IN ('";
$prospclauses1112['posstudy'] .= implode("', '", $prospcodes['posstudy']['TYPEQUAL'] );
$prospclauses1112['posstudy'] .= "') AND ( ".$prospcodes['posstudy']['1112SQL']." ))";

$prospclauses1112['negstudy'] = "(TYPEQUAL IN ('";
$prospclauses1112['negstudy'] .= implode("', '", $prospcodes['negstudy']['TYPEQUAL'] );
$prospclauses1112['negstudy'] .= "')) AND ( ".$prospcodes['negstudy']['1112SQL']." )";

$salarybands = array(
	'a'	=> array(
		'low'	=> 1000,
		'high'	=> 5000
	),
	'b'	=> array(
		'low'	=> 5000,
		'high'	=> 10000
	),
	'c'	=> array(
		'low'	=> 10000,
		'high'	=> 15000
	),
	'd'	=> array(
		'low'	=> 15000,
		'high'	=> 20000
	),
	'e'	=> array(
		'low'	=> 20000,
		'high'	=> 25000
	),
	'f'	=> array(
		'low'	=> 25000,
		'high'	=> 30000
	),
	'g'	=> array(
		'low'	=> 30000,
		'high'	=> 35000
	),
	'h'	=> array(
		'low'	=> 35000,
		'high'	=> 40000
	),
	'i'	=> array(
		'low'	=> 40000,
		'high'	=> 45000
	),
	'j'	=> array(
		'low'	=> 45000,
		'high'	=> 50000
	),
	'k'	=> array(
		'low'	=> 50000,
		'high'	=> 100000000000000000000000000000000000 # if that doesn't cover your top-earning alumni then email m.jones@hud.ac.uk and I'll make it bigger, once I've picked my jaw up off the floor
	)
);

$oldcountrycodes = array(
	'1601'	=> "Yemen. Also South Yemen, Yemen (republic of), Socotra, People's Democratic Republic of Yemen, Aden, Yemen (South), Yemen (North), North Yemen, Yemen Arab Republic",
	'1602'	=> "Afghanistan",
	'1603'	=> "Albania",
	'1604'	=> "Algeria",
	'1605'	=> "Andorra",
	'1606'	=> "Angola",
	'1607'	=> "Antigua and Barbuda",
	'1608'	=> "Argentina",
	'1609'	=> "Australia",
	'1610'	=> "Austria",
	'1611'	=> "Bahamas",
	'1612'	=> "Bahrain",
	'1613'	=> "Barbados",
	'1614'	=> "Belgium",
	'1615'	=> "Bermuda",
	'1616'	=> "Bhutan",
	'1617'	=> "Bolivia",
	'1618'	=> "Botswana",
	'1619'	=> "Brazil",
	'1620'	=> "Brunei",
	'1621'	=> "Bulgaria",
	'1622'	=> "Burma",
	'1623'	=> "Burundi",
	'1624'	=> "Cambodia",
	'1625'	=> "Cameroon",
	'1626'	=> "Canada",
	'1627'	=> "Central African Republic",
	'1628'	=> "Sri Lanka",
	'1629'	=> "Chad",
	'1630'	=> "Chile",
	'1631'	=> "China",
	'1632'	=> "Colombia",
	'1633'	=> "Congo (Democratic Republic)",
	'1634'	=> "Congo (People's Republic)",
	'1635'	=> "Costa Rica",
	'1636'	=> "Cuba",
	'1637'	=> "Dutch West Indies",
	'1638'	=> "Cyprus",
	'1639'	=> "Czech Republic",
	'1640'	=> "Benin",
	'1641'	=> "Denmark",
	'1642'	=> "Dominica",
	'1643'	=> "Dominican Republic",
	'1645'	=> "Ecuador",
	'1646'	=> "El Salvador",
	'1647'	=> "Tuvalu",
	'1648'	=> "Ethiopia",
	'1649'	=> "Falkland Islands",
	'1650'	=> "Fiji",
	'1651'	=> "Finland",
	'1652'	=> "Taiwan",
	'1653'	=> "France",
	'1654'	=> "Gabon",
	'1655'	=> "Gambia",
	'1656'	=> "Germany",
	'1658'	=> "Ghana",
	'1659'	=> "Gibraltar",
	'1660'	=> "Kiribati",
	'1661'	=> "Greece",
	'1662'	=> "Grenada",
	'1663'	=> "Guatemala",
	'1664'	=> "Guinea",
	'1665'	=> "Guyana",
	'1666'	=> "Haiti",
	'1667'	=> "Honduras",
	'1668'	=> "Belize",
	'1669'	=> "Hong Kong",
	'1670'	=> "Hungary",
	'1671'	=> "Iceland",
	'1672'	=> "India",
	'1673'	=> "Indonesia",
	'1674'	=> "Iran",
	'1675'	=> "Iraq",
	'1676'	=> "Ireland",
	'1677'	=> "Israel",
	'1678'	=> "Italy",
	'1679'	=> "Ivory Coast",
	'1680'	=> "Jamaica",
	'1681'	=> "Japan",
	'1682'	=> "Jordan",
	'1683'	=> "Kenya",
	'1684'	=> "South Korea",
	'1685'	=> "North Korea",
	'1686'	=> "Kuwait",
	'1687'	=> "Laos",
	'1688'	=> "Lebanon",
	'1689'	=> "Leeward Islands",
	'1690'	=> "Lesotho",
	'1691'	=> "Liberia",
	'1692'	=> "Libya",
	'1693'	=> "Luxembourg",
	'1694'	=> "Macao",
	'1695'	=> "Madagascar",
	'1696'	=> "Malawi",
	'1698'	=> "Malaysia",
	'1699'	=> "Mali",
	'1700'	=> "Malta",
	'1701'	=> "Mauritania",
	'1702'	=> "Mauritius",
	'1703'	=> "Mexico",
	'1704'	=> "Mongolia",
	'1705'	=> "Monserrat",
	'1706'	=> "Morocco",
	'1707'	=> "Mozambique",
	'1708'	=> "Oman",
	'1709'	=> "Nepal",
	'1710'	=> "Netherlands",
	'1713'	=> "Vanuatu",
	'1714'	=> "New Zealand",
	'1715'	=> "Nicaragua",
	'1716'	=> "Niger",
	'1717'	=> "Nigeria",
	'1718'	=> "Norway",
	'1721'	=> "Pakistan",
	'1722'	=> "Panama",
	'1723'	=> "Papua New Guinea",
	'1724'	=> "Paraguay",
	'1725'	=> "Peru",
	'1726'	=> "Philippines",
	'1727'	=> "Poland",
	'1728'	=> "Portugal",
	'1730'	=> "Puerto Rico",
	'1731'	=> "Qatar",
	'1732'	=> "Zimbabwe",
	'1733'	=> "Romania",
	'1734'	=> "Rwanda",
	'1735'	=> "St Helena",
	'1736'	=> "St Kitts and Nevis",
	'1737'	=> "St Lucia",
	'1738'	=> "St Vincent and the Grenadines",
	'1741'	=> "Samoa",
	'1743'	=> "Saudi Arabia",
	'1744'	=> "Seychelles",
	'1745'	=> "Sierra Leone",
	'1746'	=> "Singapore",
	'1747'	=> "Solomon Islands",
	'1748'	=> "Somalia",
	'1749'	=> "Djibouti",
	'1750'	=> "South Africa",
	'1751'	=> "Spain",
	'1752'	=> "Sudan",
	'1753'	=> "Surinam",
	'1754'	=> "Swaziland",
	'1755'	=> "Sweden",
	'1756'	=> "Switzerland",
	'1757'	=> "Syria",
	'1759'	=> "Tanzania",
	'1760'	=> "Thailand",
	'1762'	=> "Togo",
	'1763'	=> "Trinidad and Tobago",
	'1764'	=> "United Arab Emirates",
	'1765'	=> "Tunisia",
	'1766'	=> "Turkey",
	'1767'	=> "Uganda",
	'1768'	=> "Egypt",
	'1769'	=> "Burkina",
	'1770'	=> "Uruguay",
	'1771'	=> "United States",
	'1772'	=> "CIS",
	'1773'	=> "Venezuela",
	'1774'	=> "Vietnam",
	'1776'	=> "British Virgin Islands",
	'1777'	=> "West Indies (not otherwise specified)",
	'1778'	=> "Windward Islands (not elsewhere specified)",
	'1780'	=> "Serbia and Montenegro",
	'1781'	=> "Zambia",
	'1782'	=> "Not known",
	'1783'	=> "Stateless",
	'1784'	=> "Tonga",
	'1785'	=> "Senegal",
	'1787'	=> "Bangladesh",
	'1788'	=> "Cape Verde",
	'1789'	=> "Cayman Islands",
	'1790'	=> "Equatorial Guinea",
	'1793'	=> "Maldives",
	'1796'	=> "US Trust Territories of the Pacific Islands",
	'1798'	=> "Namibia",
	'1799'	=> "Turks & Caicos Islands",
	'1801'	=> "British Antarctic Territory",
	'1802'	=> "Guinea-Bissau",
	'1803'	=> "Sao Tome and Principe",
	'1804'	=> "Comoros",
	'1805'	=> "Nauru",
	'1821'	=> "Mayotte",
	'1822'	=> "French Possessions not elsewhere classified",
	'1823'	=> "Pitcairn Islands",
	'1824'	=> "Anguilla",
	'1825'	=> "Monaco",
	'1826'	=> "San Marino",
	'1827'	=> "Liechtenstein",
	'1828'	=> "Greenland",
	'1829'	=> "British Indian Ocean Territory",
	'1830'	=> "South Georgia and The South Sandwich Islands",
	'1831'	=> "Estonia",
	'1832'	=> "Latvia",
	'1833'	=> "Lithuania",
	'1834'	=> "Croatia",
	'1835'	=> "Slovenia",
	'1836'	=> "Armenia",
	'1837'	=> "Azerbaijan",
	'1838'	=> "Belarus",
	'1839'	=> "Kazakhstan",
	'1840'	=> "Kyrgyzstan",
	'1841'	=> "Moldova",
	'1842'	=> "Russia",
	'1843'	=> "Tajikistan",
	'1844'	=> "Turkmenistan",
	'1845'	=> "Ukraine",
	'1846'	=> "Uzbekistan",
	'1847'	=> "Georgia",
	'1850'	=> "Slovakia",
	'1851'	=> "Macedonia",
	'1853'	=> "Bosnia and Herzegovina",
	'1860'	=> "Eritrea",
	'1861'	=> "Marshall Islands",
	'1862'	=> "Micronesia",
	'1863'	=> "East Timor",
	'1864'	=> "Kosovo",
	'3826'	=> "Channel Islands",
	'4826'	=> "Isle of Man",
	'5826'	=> "England",
	'6826'	=> "Wales",
	'7826'	=> "Scotland",
	'8826'	=> "Northern Ireland"
);


$newcountrycodes = array(
	'AF'	=> "Afghanistan",
	'XQ'	=> "Africa not otherwise specified",
	'AX'	=> "Åland Islands {Ahvenamaa}",
	'AL'	=> "Albania",
	'DZ'	=> "Algeria",
	'AS'	=> "American Samoa",
	'AD'	=> "Andorra",
	'AO'	=> "Angola",
	'AI'	=> "Anguilla",
	'XX'	=> "Antarctica and Oceania not otherwise specified",
	'AG'	=> "Antigua and Barbuda",
	'AR'	=> "Argentina",
	'AM'	=> "Armenia",
	'AN'	=> "Netherlands Antilles",
	'AW'	=> "Aruba",
	'XS'	=> "Asia not otherwise specified",
	'AU'	=> "Australia",
	'AT'	=> "Austria",
	'AZ'	=> "Azerbaijan",
	'BS'	=> "Bahamas",
	'BH'	=> "Bahrain",
	'BD'	=> "Bangladesh",
	'BB'	=> "Barbados",
	'BY'	=> "Belarus",
	'BE'	=> "Belgium",
	'BZ'	=> "Belize",
	'BJ'	=> "Benin",
	'BM'	=> "Bermuda",
	'BT'	=> "Bhutan",
	'BO'	=> "Bolivia",
	'BQ'	=> "Bonaire, Sint Eustatius and Saba",
	'BA'	=> "Bosnia and Herzegovina",
	'BW'	=> "Botswana",
	'BR'	=> "Brazil",
	'VG'	=> "British Virgin Islands",
	'BN'	=> "Brunei [Brunei Darussalam]",
	'BG'	=> "Bulgaria",
	'BF'	=> "Burkina",
	'MM'	=> "Burma",
	'BI'	=> "Burundi",
	'KH'	=> "Cambodia",
	'CM'	=> "Cameroon",
	'CA'	=> "Canada",
	'IC'	=> "Canary Islands",
	'CV'	=> "Cape Verde",
	'XW'	=> "Caribbean not otherwise specified",
	'KY'	=> "Cayman Islands",
	'CF'	=> "Central African Republic",
	'XU'	=> "Central America not otherwise specified",
	'TD'	=> "Chad",
	'XL'	=> "Channel Islands",
	'CL'	=> "Chile",
	'CN'	=> "China",
	'CX'	=> "Christmas Island",
	'CC'	=> "Cocos (Keeling) Islands",
	'CO'	=> "Colombia",
	'KM'	=> "Comoros",
	'CG'	=> "Congo (People's Republic)",
	'CD'	=> "Congo (Democratic Republic)",
	'CK'	=> "Cook Islands",
	'CR'	=> "Costa Rica",
	'HR'	=> "Croatia",
	'CU'	=> "Cuba",
	'CW'	=> "Curaçao",
	'XA'	=> "Cyprus",
	'XB'	=> "Cyprus",
	'XC'	=> "Cyprus",
	'CZ'	=> "Czech Republic",
	'DK'	=> "Denmark",
	'DJ'	=> "Djibouti",
	'DM'	=> "Dominica",
	'DO'	=> "Dominican Republic",
	'TL'	=> "East Timor [Timor Leste]",
	'EC'	=> "Ecuador",
	'EG'	=> "Egypt",
	'SV'	=> "El Salvador",
	'XF'	=> "England",
	'GQ'	=> "Equatorial Guinea",
	'ER'	=> "Eritrea",
	'EE'	=> "Estonia",
	'ET'	=> "Ethiopia",
	'XP'	=> "Europe not otherwise specified",
	'EU'	=> "European Union not otherwise specified",
	'FK'	=> "Falkland Islands",
	'FO'	=> "Faroe Islands",
	'FJ'	=> "Fiji",
	'FI'	=> "Finland",
	'FR'	=> "France",
	'GF'	=> "French Guiana",
	'PF'	=> "French Polynesia",
	'GA'	=> "Gabon",
	'GM'	=> "Gambia",
	'GE'	=> "Georgia",
	'DE'	=> "Germany",
	'GH'	=> "Ghana",
	'GI'	=> "Gibraltar",
	'GR'	=> "Greece",
	'GL'	=> "Greenland",
	'GD'	=> "Grenada",
	'GP'	=> "Guadeloupe",
	'GU'	=> "Guam",
	'GT'	=> "Guatemala",
	'GG'	=> "Guernsey",
	'GN'	=> "Guinea",
	'GW'	=> "Guinea-Bissau",
	'GY'	=> "Guyana",
	'HT'	=> "Haiti",
	'HN'	=> "Honduras",
	'HK'	=> "Hong Kong",
	'HU'	=> "Hungary",
	'IS'	=> "Iceland",
	'IN'	=> "India",
	'ID'	=> "Indonesia",
	'IR'	=> "Iran",
	'IQ'	=> "Iraq",
	'IE'	=> "Ireland",
	'IM'	=> "Isle of Man",
	'IL'	=> "Israel",
	'IT'	=> "Italy",
	'CI'	=> "Ivory Coast",
	'JM'	=> "Jamaica",
	'JP'	=> "Japan",
	'JE'	=> "Jersey",
	'JO'	=> "Jordan",
	'KZ'	=> "Kazakhstan",
	'KE'	=> "Kenya",
	'KI'	=> "Kiribati",
	'KP'	=> "North Korea",
	'KR'	=> "South Korea",
	'QO'	=> "Kosovo",
	'KW'	=> "Kuwait",
	'KG'	=> "Kyrgyzstan",
	'LA'	=> "Laos",
	'LV'	=> "Latvia",
	'LB'	=> "Lebanon",
	'LS'	=> "Lesotho",
	'LR'	=> "Liberia",
	'LY'	=> "Libya",
	'LI'	=> "Liechtenstein",
	'LT'	=> "Lithuania",
	'LU'	=> "Luxembourg",
	'MO'	=> "Macao",
	'MK'	=> "Macedonia",
	'MG'	=> "Madagascar",
	'MW'	=> "Malawi",
	'MY'	=> "Malaysia",
	'MV'	=> "Maldives",
	'ML'	=> "Mali",
	'MT'	=> "Malta",
	'MH'	=> "Marshall Islands",
	'MQ'	=> "Martinique",
	'MR'	=> "Mauritania",
	'MU'	=> "Mauritius",
	'YT'	=> "Mayotte",
	'MX'	=> "Mexico",
	'FM'	=> "Micronesia",
	'XR'	=> "Middle East not otherwise specified",
	'MD'	=> "Moldova",
	'MC'	=> "Monaco",
	'MN'	=> "Mongolia",
	'ME'	=> "Montenegro",
	'MS'	=> "Montserrat",
	'MA'	=> "Morocco",
	'MZ'	=> "Mozambique",
	'NA'	=> "Namibia",
	'NR'	=> "Nauru",
	'NP'	=> "Nepal",
	'NL'	=> "Netherlands",
	'NC'	=> "New Caledonia",
	'NZ'	=> "New Zealand",
	'NI'	=> "Nicaragua",
	'NE'	=> "Niger",
	'NG'	=> "Nigeria",
	'NU'	=> "Niue",
	'NF'	=> "Norfolk Island",
	'XT'	=> "North America not otherwise specified",
	'XG'	=> "Northern Ireland",
	'MP'	=> "Northern Mariana Islands",
	'NO'	=> "Norway",
	'ZZ'	=> "Not Known",
	'PS'	=> "Occupied Palestinian Territories",
	'OM'	=> "Oman",
	'PK'	=> "Pakistan",
	'PW'	=> "Palau",
	'PA'	=> "Panama",
	'PG'	=> "Papua New Guinea",
	'PY'	=> "Paraguay",
	'PE'	=> "Peru",
	'PH'	=> "Philippines",
	'PN'	=> "Pitcairn",
	'PL'	=> "Poland",
	'PT'	=> "Portugal",
	'PR'	=> "Puerto Rico",
	'QA'	=> "Qatar",
	'RE'	=> "Réunion",
	'RO'	=> "Romania",
	'RU'	=> "Russia [Russian Federation]",
	'RW'	=> "Rwanda",
	'WS'	=> "Samoa",
	'SM'	=> "San Marino",
	'ST'	=> "Sao Tome and Principe",
	'SA'	=> "Saudi Arabia",
	'XH'	=> "Scotland",
	'SN'	=> "Senegal",
	'RS'	=> "Serbia",
	'SC'	=> "Seychelles",
	'SL'	=> "Sierra Leone",
	'SG'	=> "Singapore",
	'SX'	=> "Sint Maarten (Dutch Part)",
	'SK'	=> "Slovakia",
	'SI'	=> "Slovenia",
	'SB'	=> "Solomon Islands",
	'SO'	=> "Somalia",
	'ZA'	=> "South Africa",
	'XV'	=> "South America not otherwise specified",
	'GS'	=> "South Georgia and The South Sandwich Islands",
	'SS'	=> "South Sudan",
	'ES'	=> "Spain",
	'LK'	=> "Sri Lanka",
	'BL'	=> "St Barthélemy",
	'SH'	=> "St Helena",
	'KN'	=> "St Kitts and Nevis",
	'LC'	=> "St Lucia",
	'MF'	=> "St Martin",
	'PM'	=> "St Pierre and Miquelon",
	'VC'	=> "St Vincent and The Grenadines",
	'SD'	=> "Sudan",
	'SR'	=> "Surinam",
	'SJ'	=> "Svalbard and Jan Mayen",
	'SZ'	=> "Swaziland",
	'SE'	=> "Sweden",
	'CH'	=> "Switzerland",
	'SY'	=> "Syria",
	'TW'	=> "Taiwan",
	'TJ'	=> "Tajikistan",
	'TZ'	=> "Tanzania",
	'TH'	=> "Thailand",
	'TG'	=> "Togo",
	'TK'	=> "Tokelau",
	'TO'	=> "Tonga",
	'TT'	=> "Trinidad and Tobago",
	'TN'	=> "Tunisia",
	'TR'	=> "Turkey",
	'TM'	=> "Turkmenistan",
	'TC'	=> "Turks and Caicos Islands",
	'TV'	=> "Tuvalu",
	'UG'	=> "Uganda",
	'UA'	=> "Ukraine",
	'AE'	=> "United Arab Emirates",
	'XK'	=> "United Kingdom",
	'US'	=> "United States",
	'VI'	=> "United States Virgin Islands",
	'UY'	=> "Uruguay",
	'UZ'	=> "Uzbekistan",
	'VU'	=> "Vanuatu",
	'VA'	=> "Vatican City",
	'VE'	=> "Venezuela",
	'VN'	=> "Vietnam",
	'XI'	=> "Wales",
	'WF'	=> "Wallis and Futuna",
	'EH'	=> "Western Sahara",
	'YE'	=> "Yemen",
	'ZM'	=> "Zambia",
	'ZW'	=> "Zimbabwe"
);

$regions = array(
	'Europe'			=> array( '1603', '1605', '1836', '1610', '1837', '1838', '1614', '1853', '1621', '1834', '1638', '1639', '1641', '1831', '1651', '1653', '1847', '1656', '1661', '1670', '1671', '1676', '1678', '1832', '1827', '1833', '1693', '1851', '1700', '1841', '1825', '1710', '1718', '1727', '1728', '1733', '1842', '1826', '1772', '1780', '1850', '1835', '1751', '1755', '1756', '1845', '3826', '4826', '1659', '1864', 'AX', 'AL', 'AD', 'AM', 'AT', 'AZ', 'BY', 'BE', 'BA', 'BG', 'IC', 'HR', 'XA', 'CZ', 'DK', 'EE', 'FO', 'FI', 'FR', 'GE', 'DE', 'GI', 'GR', 'HU', 'IS', 'IE', 'IT', 'QO', 'LV', 'LI', 'LT', 'LU', 'MK', 'MT', 'MD', 'MC', 'ME', 'NL', 'NO', 'PL', 'PT', 'RO', 'RU', 'SM', 'RS', 'SK', 'SI', 'ES', 'SJ', 'SE', 'CH', 'UA', 'VA', 'XL', 'GG', 'JE', 'IM', 'EU', 'XP' ),
	'Middle East'		=> array( '1612', '1768', '1674', '1675', '1677', '1682', '1686', '1688', '1708', '1731', '1743', '1757', '1766', '1764', '1601', 'BH', 'XB', 'XC', 'EG', 'IR', 'IQ', 'IL', 'JO', 'KW', 'LB', 'OM', 'PS', 'QA', 'SA', 'SY', 'TR', 'AE', 'YE', 'XR' ),

	'Asia'				=> array( '1602', '1787', '1616', '1620', '1622', '1624', '1631', '1652', '1863', '1672', '1673', '1681', '1684', '1685', '1840', '1687', '1698', '1793', '1704', '1709', '1721', '1726', '1746', '1628', '1843', '1760', '1844', '1846', '1774', '1829', '1839', '1669', '1694', 'AF', 'BD', 'BT', 'BN', 'MM', 'KH', 'CN', 'TL', 'HK', 'IN', 'ID', 'JP', 'KZ', 'KP', 'KR', 'KG', 'LA', 'MO', 'MY', 'MV', 'MN', 'NP', 'PK', 'PH', 'SG', 'LK', 'TW', 'TJ', 'TH', 'TM', 'UZ', 'VN', 'XS' ),
	'Africa'			=> array( '1604', '1606', '1640', '1618', '1769', '1623', '1625', '1788', '1627', '1629', '1804', '1633', '1634', '1749', '1790', '1860', '1648', '1654', '1655', '1658', '1664', '1802', '1679', '1683', '1690', '1691', '1692', '1695', '1696', '1699', '1701', '1702', '1706', '1707', '1798', '1716', '1717', '1734', '1803', '1785', '1744', '1745', '1748', '1750', '1752', '1754', '1759', '1762', '1765', '1767', '1781', '1732', '1821', '1735', 'DZ', 'AO', 'BJ', 'BW', 'BF', 'BI', 'CM', 'CV', 'CF', 'TD', 'KM', 'CD', 'CG', 'DJ', 'GQ', 'ER', 'ET', 'GA', 'GM', 'GH', 'GN', 'GW', 'CI', 'KE', 'LS', 'LR', 'LY', 'MG', 'MW', 'ML', 'MR', 'MU', 'YT', 'MA', 'MZ', 'NA', 'NE', 'NG', 'RE', 'RW', 'ST', 'SN', 'SC', 'SL', 'SO', 'ZA', 'SH', 'SD', 'SZ', 'TZ', 'TG', 'TN', 'UG', 'EH', 'ZM', 'ZW', 'XQ' ),
	'North America'		=> array( '1615', '1626', '1642', '1828', '1771', 'BM', 'CA', 'GL', 'PM', 'US', 'XT' ),
	'Central America'	=> array( '1668', '1635', '1646', '1663', '1667', '1703', '1715', '1722', 'BZ', 'CR', 'SV', 'GT', 'HN', 'MX', 'NI', 'PA', 'XU' ),
	'South America'		=> array( '1608', '1617', '1619', '1630', '1632', '1645', '1649', '1665', '1724', '1725', '1830', '1753', '1770', '1773', 'AR', 'BO', 'BR', 'CL', 'CO', 'EC', 'FK', 'GF', 'GY', 'PY', 'PE', 'GS', 'SR', 'UY', 'VE', 'XV' ),
	'Caribbean'			=> array( '1824', '1607', '1611', '1613', '1776', '1789', '1636', '1643', '1637', '1662', '1666', '1680', '1689', '1705', '1730', '1736', '1737', '1738', '1763', '1799', '1777', '1778', 'AI', 'AG', 'AW', 'BS', 'BB', 'VG', 'KY', 'CU', 'DM', 'DO', 'GD', 'GP', 'HT', 'JM', 'MQ', 'MS', 'AN', 'PR', 'BL', 'KN', 'LC', 'MF', 'VC', 'TT', 'TC', 'VI', 'XW' ),
	'Antarctica and Oceania'	=> array( '1609', '1650', '1660', '1861', '1862', '1805', '1714', '1723', '1741', '1747', '1784', '1647', '1713', '1796', '1823', '1801', 'AS', 'AU', 'CX', 'CC', 'CK', 'FJ', 'PF', 'GU', 'KI', 'MH', 'FM', 'NR', 'NC', 'NZ', 'NU', 'NF', 'MP', 'PG', 'WS', 'SB', 'TK', 'TO', 'TV', 'VU', 'PW', 'PN', 'WF', 'XX' ),
	'Other'				=> array( '1782', '1783', '1822', 'ZZ' )
);

# generate the region where clauses from the arrays above
$regionwheres = array();
foreach ( $regions as $region => $codearray ) {
	$regst = "LOCEMP IN ('";
	$regst .= implode("', '", $codearray);
	$regst .= "')";
	$regionwheres[$region] = $regst;
}

# generate the country where clauses from the country codes
$countrywheres = array();

# first the old codes
foreach ( $oldcountrycodes as $code => $country ) {
	$coust = "LOCEMP = '$code'";
	$countrywheres[$country] = $coust;
}

# now the new codes
foreach ( $newcountrycodes as $code => $country ) {
	$coust = "LOCEMP = '$code'";
	if ( array_key_exists($country, $countrywheres) ) {
		$countrywheres[$country] .= " OR $coust";
	} else {
		$countrywheres[$country] = $coust;
	}
}

# generate the country list for each region
$regcountries = array();
foreach ( $regions as $region => $codearray ) {
	$regcountries[$region] = array();
	foreach ( $codearray as $code ) {
		$country = '';
		if ( strlen($code) == 4 ) {
			$country = $oldcountrycodes[$code];
		} else {
			$country = $newcountrycodes[$code];
		}
		$regcountries[$region][$country] = 1;
	}
}


$jobtitles = array(
	'Managers and senior officials' => array(
		'code' 	=> '1',
		'subset'	=> array(
			'Corporate managers and senior officials'	=> array(
				'code'		=> '111',
				'subset'	=> array(
					'Senior officials in national government'	=> '11110',
					'Directors and chief executives of major organisations'	=> '11120',
					'Senior officials in local government'	=> '11130',
					'Senior officials of special interest organisations'	=> '11140',
					'Senior officials of trade unions'	=> '11141',
					'Senior officials of employers, trades and professional associations'	=> '11142',
					'Senior officials of charities'	=> '11143',
					'Senior officials of political parties'	=> '11144'
				)
			),
			'Production managers'	=>  array(
				'code'		=> '112',
				'subset'	=> array(
					'Production, works and maintenance managers'	=> '11210',
					'Managers in construction'	=> '11220',
					'Managers in mining and energy'	=> '11230',
					'Mining, quarrying and drilling managers'	=> '11231',
					'Gas, water and electricity supply managers'	=> '11232'
				)
			),
			'Functional managers'	=>  array(
				'code'		=> '113',
				'subset'	=> array(
					'Financial managers and chartered secretaries'	=> '11310',
					'Finance managers and directors'	=> '11311',
					'Investment/merchant bankers'	=> '11312',
					'Chartered company secretaries, treasurers, company registrars'	=> '11313',
					'Marketing and sales managers'	=> '11320',
					'Marketing managers'	=> '11321',
					'Sales managers'	=> '11322',
					'Market research managers'	=> '11323',
					'Export and import managers'	=> '11324',
					'Purchasing managers'	=> '11330',
					'Advertising and public relations managers'	=> '11340',
					'Advertising managers'	=> '11341',
					'Public affairs and publicity managers'	=> '11342',
					'Personnel, training and industrial relations managers'	=> '11350',
					'Personnel managers'	=> '11351',
					'Industrial relations managers'	=> '11352',
					'Training managers'	=> '11353',
					'Operational research, organisation and methods managers'	=> '11354',
					'Information and communication technology managers'	=> '11360',
					'Information managers'	=> '11361',
					'Computer operations managers'	=> '11362',
					'Telecommunications managers'	=> '11363',
					'Research and development managers'	=> '11370'
				)
			),
			'Quality and customer care managers'	=>  array(
				'code'		=> '114',
				'subset'	=> array(
					'Quality assurance managers'	=> '11410',
					'Customer care managers'	=> '11420'
				)
			),
			'Financial institution and office managers'	=>  array(
				'code'		=> '115',
				'subset'	=> array(
					'Financial institution managers'	=> '11510',
					'Bank managers'	=> '11511',
					'Building society managers'	=> '11512',
					'Post Office and postal service managers'	=> '11513',
					'Insurance office managers'	=> '11514',
					'Stockbroking managers'	=> '11515',
					'Office managers'	=> '11520',
					'Reservations and booking office managers'	=> '11521',
					'Administration and records managers'	=> '11522',
					'Payroll and pensions managers'	=> '11523',
					'Invoice, costs and accounts managers'	=> '11524'
				)
			),
			'Managers in distribution, storage and retail'	=>  array(
				'code'		=> '116',
				'subset'	=> array(
					'Transport and distribution managers'	=> '11610',
					'Storage and warehouse managers'	=> '11620',
					'Retail and wholesale managers'	=> '11630'
				)
			),
			'Protective service officers'	=>  array(
				'code'		=> '117',
				'subset'	=> array(
					'Officers in armed forces'	=> '11710',
					'Army officers'	=> '11711',
					'Navy officers'	=> '11712',
					'Air Force officers'	=> '11713',
					'Police officers (Inspectors and above)'	=> '11720',
					'Senior officers in Fire, Ambulance, Prison and related services'	=> '11730',
					'Security managers'	=> '11740'
				)
			),
			'Health and social services managers'	=>  array(
				'code'		=> '118',
				'subset'	=> array(
					'Hospital and health service managers'	=> '11810',
					'Pharmacy managers'	=> '11820',
					'Healthcare practice managers'	=> '11830',
					'Social services managers'	=> '11840',
					'Residential and day care managers'	=> '11850',
					'Residential care managers'	=> '11851',
					'Day care managers'	=> '11852'
				)
			),
			'Managers in agriculture'	=>  array(
				'code'		=> '121',
				'subset'	=> array(
					'Farm managers'	=> '12110',
					'Natural environment, conservation and heritage managers'	=> '12120',
					'Managers in animal husbandry, forestry and fishing n.e.c.'	=> '12190',
					'Animal establishment (not livestock) managers'	=> '12191',
					'Forestry and tree felling managers'	=> '12192'
				)
			),
			'Managers and proprietors in leisure services'	=>  array(
				'code'		=> '122',
				'subset'	=> array(
					'Hotel and accommodation managers'	=> '12210',
					'Hotel managers'	=> '12211',
					'Wardens of hostels, halls of residences, nurses homes and other communal accommodation'	=> '12212',
					'Managers of guest houses, caravan sites and other holiday accommodation'	=> '12213',
					'Conference, events and exhibition managers'	=> '12220',
					'Conference managers'	=> '12221',
					'Exhibition managers'	=> '12222',
					'Restaurant and catering managers'	=> '12230',
					'Publicans and managers of licensed premises'	=> '12240',
					'Leisure and sports managers'	=> '12250',
					'Recreation and sports facilities managers'	=> '12251',
					'Entertainment managers'	=> '12252',
					'Cultural and leisure establishment managers'	=> '12253',
					'Travel agency managers'	=> '12260'
				)
			),
			'Managers and proprietors in other services'	=>  array(
				'code'		=> '123',
				'subset'	=> array(
					'Property, housing and land managers'	=> '12310',
					'Property agency managers and landlords etc.'	=> '12311',
					'Estates and facilities managers'	=> '12312',
					'Garage managers and proprietors'	=> '12320',
					'Hairdressing and beauty salon managers and proprietors'	=> '12330',
					'Shopkeepers'	=> '12340',
					'Recycling and refuse disposal managers'	=> '12350',
					'Managers and proprietors in other services n.e.c.'	=> '12390'
				)
			)
		)
	),
	'Professional occupations'	=>array(
		'code'		=> '2',
		'subset'	=> array(
			'Science Professionals'	=> array(
				'code'		=> '211',
				'subset'	=> array(
					'Chemists'	=> '21110',
					'Research/development chemists'	=> '21111',
					'Analytical chemists'	=> '21112',
					'Biological scientists and biochemists'	=> '21120',
					'Biochemists, medical scientists'	=> '21121',
					'Biologists'	=> '21122',
					'Bacteriologists, microbiologists etc.'	=> '21123',
					'Botanists'	=> '21124',
					'Pathologists'	=> '21125',
					'Agricultural scientists'	=> '21126',
					'Physiologists'	=> '21127',
					'Physicists, geologists and meteorologists'	=> '21130',
					'Physicists'	=> '21131',
					'Geophysicists'	=> '21132',
					'Geologists, mineralogists etc.'	=> '21133',
					'Meteorologists'	=> '21134',
					'Astronomers'	=> '21135',
					'Mathematicians'	=> '21136'
				)
			),
			'Engineering professionals'	=>  array(
				'code'		=> '212',
				'subset'	=> array(
					'Civil engineers'	=> '21210',
					'Water, sanitation, drainage and public health engineers'	=> '21211',
					'Mining, quarrying and drilling engineers'	=> '21212',
					'Construction engineers'	=> '21213',
					'Mechanical engineers'	=> '21220',
					'Aeronautical engineers'	=> '21221',
					'Automobile engineers'	=> '21222',
					'Marine engineers'	=> '21223',
					'Plant and maintenance engineers'	=> '21224',
					'Electrical engineers'	=> '21230',
					'Electricity generation and supply engineers'	=> '21231',
					'Telecommunications engineers'	=> '21232',
					'Electronic engineers'	=> '21240',
					'Broadcasting engineers'	=> '21241',
					'Avionics, radar and communications engineers'	=> '21242',
					'Chemical engineers'	=> '21250',
					'Design and development engineers'	=> '21260',
					'Production and process engineers'	=> '21270',
					'Planning and quality control engineers'	=> '21280',
					'Planning engineers'	=> '21281',
					'Quality control engineers'	=> '21282',
					'Engineering professionals n.e.c.'	=> '21290',
					'Metallurgists and material scientists'	=> '21291',
					'Patents examiners, agents and officers'	=> '21292',
					'Heating and ventilating engineers'	=> '21293',
					'Food and drink technologists (including brewers)'	=> '21294',
					'Acoustic engineers'	=> '21295'
				)
			),
			'ICT professionals'	=>  array(
				'code'		=> '213',
				'subset'	=> array(
					'IT strategy and planning professionals'	=> '21310',
					'IT consultants and planners'	=> '21311',
					'Telecommunications consultants and planners'	=> '21312',
					'Software professionals'	=> '21320',
					'Software designers and engineers'	=> '21321',
					'Computer analysts and programmers'	=> '21322',
					'Network/systems designers and engineers'	=> '21323',
					'Web developers and producers'	=> '21324'
				)
			),
			'Health professionals'	=>  array(
				'code'		=> '221',
				'subset'	=> array(
					'Medical practitioners'	=> '22110',
					'Pre-registration house officers'	=> '22111',
					'Senior house officers'	=> '22112',
					'Specialist registrars, consultants and general practitioners'	=> '22113',
					'Psychologists'	=> '22120',
					'Education psychologists'	=> '22121',
					'Clinical psychologists'	=> '22122',
					'Occupational psychologists'	=> '22123',
					'Pharmacists/pharmacologists'	=> '22130',
					'Pharmacists'	=> '22131',
					'Pharmacologists'	=> '22132',
					'Ophthalmic opticians'	=> '22140',
					'Dental practitioners'	=> '22150',
					'General practice dentists'	=> '22151',
					'Hospital dentists, house officers (dental)'	=> '22152',
					'Veterinarians'	=> '22160'
				)
			),
			'Teaching professionals'	=>  array(
				'code'		=> '231',
				'subset'	=> array(
					'Higher education teaching professionals'	=> '23110',
					'University and higher education professors'	=> '23111',
					'University and higher education lecturers'	=> '23112',
					'Teacher training establishment lecturers'	=> '23113',
					'University tutorial and teaching assistants'	=> '23114',
					'Further education teaching professionals'	=> '23120',
					'Education officers, school inspectors'	=> '23130',
					'Education officers'	=> '23131',
					'Education advisors'	=> '23132',
					'Education inspectors'	=> '23133',
					'Secondary education teaching professionals'	=> '23140',
					'Secondary head teachers'	=> '23141',
					'Secondary teachers'	=> '23142',
					'Primary and nursery education teaching professionals'	=> '23150',
					'Primary head teachers'	=> '23151',
					'Primary teachers'	=> '23152',
					'Special needs education teaching professionals'	=> '23160',
					'Registrars and senior administrators of educational establishments'	=> '23170',
					'Teaching professionals n.e.c'	=> '23190',
					'Music, dance and drama teachers (private/pedagogical)'	=> '23191',
					'Language assistants and tutors, TEFL'	=> '23192',
					'Tutors and teachers at adult education centres'	=> '23193',
					'Examiners and moderators'	=> '23194'
				)
			),
			'Research professionals'	=>  array(
				'code'		=> '232',
				'subset'	=> array(
					'Scientific researchers'	=> '23210',
					'Social science researchers'	=> '23220',
					'Researchers n.e.c.'	=> '23290',
					'Researchers (media)'	=> '23291',
					'Researchers (university - unspecified discipline)'	=> '23292'
				)
			),
			'Legal professionals'	=>  array(
				'code'		=> '241',
				'subset'	=> array(
					'Solicitors and lawyers, judges and coroners'	=> '24110',
					'Barristers and advocates'	=> '24111',
					'Solicitors'	=> '24112',
					'Judges, magistrates, coroners and sheriffs'	=> '24113',
					'Legal professionals n.e.c.'	=> '24190',
					'Clerks of court, officers of court'	=> '24191',
					'Legal advisers in non-law firms'	=> '24192'
			)
			),
			'Business and statistical professionals'	=>  array(
				'code'		=> '242',
				'subset'	=> array(
					'Chartered and certified accountants'	=> '24210',
					'Chartered accountants'	=> '24211',
					'Certified accountants'	=> '24212',
					'Public finance accountants'	=> '24213',
					'Examiners/auditors'	=> '24214',
					'Management accountants'	=> '24220',
					'Management consultants, actuaries, economists and statisticians'	=> '24230',
					'Management consultants'	=> '24231',
					'Business analysts'	=> '24232',
					'Economists'	=> '24233',
					'Statisticians'	=> '24234',
					'Actuaries'	=> '24235'
				)
			),
			'Architects, town planners, surveyors'	=>  array(
				'code'		=> '243',
				'subset'	=> array(
					'Architects'	=> '24310',
					'Landscape architects'	=> '24311',
					'Town planners'	=> '24320',
					'Quantity surveyors'	=> '24330',
					'Chartered surveyors (not quantity surveyors)'	=> '24340',
					'General practice surveyors'	=> '24341',
					'Land surveyors'	=> '24342',
					'Building surveyors'	=> '24343',
					'Hydrographic surveyors'	=> '24344'
				)
			),
			'Public service professionals'	=>  array(
				'code'		=> '244',
				'subset'	=> array(
					'Public service administrative professionals'	=> '24410',
					'Local government area and divisional officers'	=> '24411',
					'Registrars of births, marriages and deaths'	=> '24412',
					'National government administrative professionals (grades 5/6/7)'	=> '24413',
					'Social workers'	=> '24420',
					'Social workers (medical, mental health, rehab)'	=> '24421',
					'Social workers (children, fostering, adoption)'	=> '24422',
					'Social Workers (family)'	=> '24423',
					'Probation officers'	=> '24430',
					'Clergy'	=> '24440'
				)
			),
			'Librarians and related professionals'	=>  array(
				'code'		=> '245',
				'subset'	=> array(
					'Librarians'	=> '24510',
					'Archivists and curators'	=> '24520',
					'Archivists'	=> '24521',
					'Curators (museum etc.)'	=> '24522'
				)
			)
		)
	),
	'Associate professional and technical occupations'	=>array(
		'code'		=> '3',
		'subset'	=> array(
			'Science and Engineering Technicians'	=> array(
				'code'		=> '311',
				'subset'	=> array(
					'Laboratory technicians'	=> '31110',
					'Laboratory technicians (non-medical)'	=> '31111',
					'Medical laboratory technicians'	=> '31112',
					'Electrical/electronic technicians'	=> '31120',
					'Engineering technicians'	=> '31130',
					'Building and civil engineering technicians'	=> '31140',
					'Quality assurance technicians'	=> '31150',
					'Science and engineering technicians n.e.c.'	=> '31190'
				)
			),
			'Draughtspersons and building inspectors'	=>  array(
				'code'		=> '312',
				'subset'	=> array(
					'Architectural and town planning technicians'	=> '31210',
					'Town planning assistants, technicians'	=> '31211',
					'Architectural technicians, assistants'	=> '31212',
					'Draughtspersons'	=> '31220',
					'Design Draughtsperson'	=> '31221',
					'Mechanical engineering draughtsperson'	=> '31222',
					'Cartographical draughtsperson'	=> '31223',
					'Drawing office assistants, tracers'	=> '31224',
					'Building inspectors'	=> '31230'
				)
			),
			'IT service delivery occupations'	=>  array(
				'code'		=> '313',
				'subset'	=> array(
					'IT operations technicians (network support)'	=> '31310',
					'IT User support technicians (help desk support)'	=> '31320'
				)
			),
			'Health associate professionals'	=>  array(
				'code'		=> '321',
				'subset'	=> array(
					'Nurses'	=> '32110',
					'Hospital matrons and nurse administrators'	=> '32111',
					'Staff nurses (adult)'	=> '32112',
					'Staff nurses (children)'	=> '32113',
					'Staff nurses (mental health)'	=> '32114',
					'Non-hospital Nurses (e.g. general practice, community, clinics etc.)'	=> '32115',
					'Midwives'	=> '32120',
					'Paramedics'	=> '32130',
					'Medical radiographers'	=> '32140',
					'Chiropodists'	=> '32150',
					'Dispensing opticians'	=> '32160',
					'Pharmaceutical dispensers'	=> '32170',
					'Medical and dental technicians'	=> '32180',
					'Medical technicians'	=> '32181',
					'Audiologists'	=> '32182',
					'Dental technicians'	=> '32183'
				)
			),
			'Therapists'	=>  array(
				'code'		=> '322',
				'subset'	=> array(
					'Physiotherapists'	=> '32210',
					'Occupational therapists'	=> '32220',
					'Speech and language therapists'	=> '32230',
					'Therapists n.e.c.'	=> '32290',
					'Acupuncturists, reflexologists'	=> '32291',
					'Dieticians'	=> '32292',
					'Osteopaths, hydrotherapists, massage therapists, chiropractors'	=> '32293',
					'Psychotherapists'	=> '32294',
					'Homeopaths'	=> '32295'
				)
			),
			'Social welfare associate professionals'	=>  array(
				'code'		=> '323',
				'subset'	=> array(
					'Youth and community workers'	=> '32310',
					'Youth workers'	=> '32311',
					'Community workers'	=> '32312',
					'Housing and welfare officers'	=> '32320',
					'Housing/homeless officers'	=> '32321',
					'Education/learning support worker'	=> '32322',
					'Drug worker'	=> '32323',
					'Counsellors'	=> '32324'
				)
			),
			'Protective service occupations'	=>  array(
				'code'		=> '331',
				'subset'	=> array(
					'Armed forces: NCOs and other ranks'	=> '33110',
					'Police officers (Sergeant and below)'	=> '33120',
					'Fire Service officers (Leading Fire Officer and below)'	=> '33130',
					'Prison Service Officers (below Principal Officer)'	=> '33140',
					'Protective service associate professionals n.e.c.'	=> '33190',
					'Customs, excise and duty officers'	=> '33191',
					'Immigration officers'	=> '33192'
				)
			),
			'Artistic and literary occupations'	=>  array(
				'code'		=> '341',
				'subset'	=> array(
					'Artists (fine art)'	=> '34110',
					'Authors, writers'	=> '34120',
					'Authors'	=> '34121',
					'Technical authors'	=> '34122',
					'Translators'	=> '34123',
					'Interpreters'	=> '34124',
					'Literary agents'	=> '34125',
					'Performing artists'	=> '34130',
					'Actors'	=> '34131',
					'Vocalists'	=> '34132',
					'Entertainers'	=> '34133',
					'Disc jockeys (not broadcasting)'	=> '34134',
					'Dancers and choreographers'	=> '34140',
					'Musicians'	=> '34150',
					'Composers, arrangers, conductors and musical directors'	=> '34151',
					'Musical instrument players'	=> '34152',
					'Arts officers, producers and directors'	=> '34160',
					'Directors, producers'	=> '34161',
					'Stage and studio managers'	=> '34162',
					'Arts officers, advisers and consultants'	=> '34163',
					'Entertainment agents'	=> '34164'
				)
			),
			'Design associate professionals'	=>  array(
				'code'		=> '342',
				'subset'	=> array(
					'Graphic artists and designers'	=> '34210',
					'Commercial artists'	=> '34211',
					'Web designers'	=> '34212',
					'Exhibition, multi-media designers'	=> '34213',
					'Desk top publishers, assistants and operators'	=> '34214',
					'Product, clothing and related designers'	=> '34220',
					'Interior decoration designers'	=> '34221',
					'Set designers (stage etc.)'	=> '34222',
					'Industrial designers'	=> '34223',
					'Textile designers'	=> '34224',
					'Clothing designers'	=> '34225',
					'Clothing advisers, consultants'	=> '34226'
				)
			),
			'Media associate professionals'	=>  array(
				'code'		=> '343',
				'subset'	=> array(
					'Journalists, newspaper and periodical editors'	=> '34310',
					'Editors'	=> '34311',
					'Journalists'	=> '34312',
					'Broadcasters (announcers, disc jockeys, news readers)'	=> '34320',
					'Public relations officers'	=> '34330',
					'Photographers and audio-visual equipment operators'	=> '34340',
					'Photographers'	=> '34341',
					'TV and film camera operators'	=> '34342',
					'Audio-visual effects designers and operators'	=> '34343',
					'Video, telecine and film recorder operators'	=> '34344',
					'Sound recordists, technicians, assistants'	=> '34345'
				)
			),
			'Sports and fitness occupations'	=>  array(
				'code'		=> '344',
				'subset'	=> array(
					'Sports players'	=> '34410',
					'Sports coaches, instructors and officials'	=> '34420',
					'Sports coaches, instructors'	=> '34421',
					'Sports officials'	=> '34422',
					'Fitness instructors'	=> '34430',
					'Sports and fitness occupations n.e.c.'	=> '34490',
					'Outdoor pursuits instructors'	=> '34491'
				)
			),
			'Transport associate professionals'	=>  array(
				'code'		=> '351',
				'subset'	=> array(
					'Air traffic controllers'	=> '35110',
					'Aircraft pilots and flight engineers'	=> '35120',
					'Aircraft pilots and instructors'	=> '35121',
					'Aircraft flight engineers, navigators'	=> '35122',
					'Ship and hovercraft officers'	=> '35130',
					'Train drivers'	=> '35140'
				)
			),
			'Legal associate professionals'	=>  array(
				'code'		=> '352',
				'subset'	=> array(
					'Legal associate professionals'	=> '35200',
					'Legal executives and paralegals'	=> '35201',
					'Clerks to judges and barristers (not solicitors)'	=> '35202',
					'Adjudicators, tribunal and panel members'	=> '35203'
				)
			),
			'Business and finance associate professionals'	=>  array(
				'code'		=> '353',
				'subset'	=> array(
					'Estimators, valuers and assessors'	=> '35310',
					'Insurance surveyors, inspectors'	=> '35311',
					'Insurance claims officials, adjusters'	=> '35312',
					'Estimators'	=> '35313',
					'Rating, valuation and rent officers'	=> '35314',
					'Brokers'	=> '35320',
					'Stockbrokers'	=> '35321',
					'Share dealers'	=> '35322',
					'Insurance brokers'	=> '35323',
					'Air, commodity and ship brokers'	=> '35324',
					'Finance, money and foreign exchange brokers'	=> '35325',
					'Insurance underwriters'	=> '35330',
					'Finance and investment analysts/advisers'	=> '35340',
					'Investment advisers'	=> '35341',
					'Pension advisers'	=> '35342',
					'Mortgage consultants'	=> '35343',
					'Independent financial advisers'	=> '35344',
					'Financial analysts'	=> '35345',
					'Taxation experts'	=> '35350',
					'Tax inspectors'	=> '35351',
					'Tax consultants, advisers'	=> '35352',
					'Importers, exporters'	=> '35360',
					'Financial and accounting technicians'	=> '35370',
					'Accounting technicians'	=> '35371',
					'Trust administrators and officers'	=> '35372',
					'Business and related associate professionals n.e.c.'	=> '35390',
					'Organisation, methods and business systems analysts'	=> '35391',
					'Conference, exhibition and events co-ordinators and consultants'	=> '35392',
					'Contract officers (building and manufacturing contracting)'	=> '35393',
					'Transport and traffic advisors'	=> '35394'
				)
			),
			'Sales and related associate professionals'	=>  array(
				'code'		=> '354',
				'subset'	=> array(
					'Buyers and purchasing officers'	=> '35410',
					'Buyers and purchasing officers'	=> '35411',
					'Contract officers (purchasing)'	=> '35412',
					'Sales representatives'	=> '35420',
					'Sales representatives and agents'	=> '35421',
					'Technical sales representatives'	=> '35422',
					'Sales controllers, administrators and co-ordinators'	=> '35423',
					'Marketing associate professionals'	=> '35430',
					'Advertising and marketing executives'	=> '35431',
					'Media planners'	=> '35432',
					'Market research analysts'	=> '35433',
					'Advertising and publicity writers'	=> '35434',
					'Fundraising, campaigns and appeals organisers'	=> '35435',
					'Estate agents, auctioneers'	=> '35440',
					'Estate agents'	=> '35441',
					'Land agents'	=> '35442',
					'Letting agents'	=> '35443',
					'Auctioneers'	=> '35444'
				)
			),
			'Conservation associate professionals'	=>  array(
				'code'		=> '355',
				'subset'	=> array(
					'Conservation, heritage and environmental protection officers'	=> '35510',
					'Countryside and park rangers'	=> '35520'
				)
			),
			'Public service and other associate professionals'	=>  array(
				'code'		=> '356',
				'subset'	=> array(
					'Public service associate professionals (HEOs, SEOs)'	=> '35610',
					'Public service associate professionals in central government departments and local offices'	=> '35611',
					'Public service associate professionals in local government'	=> '35612',
					'Personnel and industrial relations officers'	=> '35620',
					'Employment agency consultants'	=> '35621',
					'Personnel and recruitment consultants/advisers'	=> '35622',
					'Personnel officers'	=> '35623',
					'Industrial relations, equal opportunities and conciliation officers'	=> '35624',
					'Vocational and industrial trainers and instructors'	=> '35630',
					'Careers advisers and vocational guidance specialists'	=> '35640',
					'Inspectors of factories, utilities and trading standards'	=> '35650',
					'Other statutory inspectors'	=> '35660',
					'Occupational hygienists and safety officers (health and safety)'	=> '35670',
					'Health and safety officers'	=> '35671',
					'Occupational hygienists'	=> '35672',
					'Environmental health officers'	=> '35680'
				)
			)
		)
	),
	'Administrative and secretarial occupations'	=>array(
		'code'		=> '4',
		'subset'	=> array(
			'Government administrators'	=> array(
				'code'		=> '411',
				'subset'	=> array(
					'Civil service executive officers'	=> '41110',
					'Civil service administrative officers and assistants'	=> '41120',
					'Local government clerical officers and assistants'	=> '41130',
					'Officers of non-governmental organisations'	=> '41140',
					'Charity officers'	=> '41141',
					'Trade union officers'	=> '41142',
					'Employers, trade and professional association officers'	=> '41143',
					'Officers of political parties'	=> '41144'
				)
			),
			'Finance administrators'	=>  array(
				'code'		=> '412',
				'subset'	=> array(
					'Credit controllers'	=> '41210',
					'Accounts and wages clerks, book-keepers, other financial clerks'	=> '41220',
					'Accounts clerks'	=> '41221',
					'Wages clerks'	=> '41222',
					'Book-keepers'	=> '41223',
					'Financial administrators'	=> '41224',
					'Counter clerks (banks, building societies, Post Offices)'	=> '41230'
				)
			),
			'Records administrators'	=>  array(
				'code'		=> '413',
				'subset'	=> array(
					'Filing and other records assistants/clerks'	=> '41310',
					'University, college clerks'	=> '41311',
					'Personnel and staff clerks'	=> '41312',
					'Marketing assistants and advertising clerks'	=> '41313',
					"Solicitors' assistants and court officers"	=> '41314',
					'Hospital clerks and clerical officers'	=> '41315',
					'Production, quality control and work study assistants (clerical)'	=> '41316',
					'Pensions and insurance clerks'	=> '41320',
					'Pensions clerks'	=> '41321',
					'Insurance clerks'	=> '41322',
					'Stock control clerks'	=> '41330',
					'Transport and distribution clerks'	=> '41340',
					'Library assistants/clerks'	=> '41350',
					'Database assistants/clerks'	=> '41360',
					'Market research interviewers'	=> '41370'
				)
			),
			'Communications administrators'	=>  array(
				'code'		=> '414',
				'subset'	=> array(
					'Telephonists'	=> '41410',
					'Communication operators'	=> '41420'
				)
			),
			'General administrators'	=>  array(
				'code'		=> '415',
				'subset'	=> array(
					'General office assistants/clerks n.e.c.'	=> '41500'
				)
			),
			'Secretarial and related'	=>  array(
				'code'		=> '421',
				'subset'	=> array(
					'Medical secretaries'	=> '42110',
					'Legal secretaries'	=> '42120',
					'School secretaries'	=> '42130',
					'Company secretaries (also see 11313)'	=> '42140',
					'Personal assistants and other secretaries'	=> '42150',
					'Secretaries'	=> '42151',
					'Personal assistants'	=> '42152',
					'Secretary-typists'	=> '42153',
					'Receptionists'	=> '42160',
					'Typists'	=> '42170'
				)
			)
		)
	),
	'Skilled trades occupations' => array(
		'code' 	=> '5',
		'subset'	=> array(
			'Agricultural trades'	=> array(
				'code'		=> '511',
				'subset'	=> array(
					'Farmers'	=> '51110',
					'Horticultural trades'	=> '51120',
					'Gardeners and groundsmen/groundswomen'	=> '51130',
					'Garden designers'	=> '51131',
					'Agricultural and fishing trades n.e.c.'	=> '51190'
				)
			),
			'Metal forming, welding and related trades'	=>  array(
				'code'		=> '521',
				'subset'	=> array(
					'Smiths and forge workers'	=> '52110',
					'Moulders, core makers, die casters'	=> '52120',
					'Sheet metal workers'	=> '52130',
					'Metal plate workers, shipwrights, riveters'	=> '52140',
					'Welding trades'	=> '52150',
					'Pipe fitters'	=> '52160'
				)
			),
			'Metal machining and instrument making trades'	=>  array(
				'code'		=> '522',
				'subset'	=> array(
					'Metal machining setters and setter-operators'	=> '52210',
					'Tool makers, tool fitters and markers-out'	=> '52220',
					'Metal working production and maintenance fitters'	=> '52230',
					'Precision instrument makers and repairers'	=> '52240'
				)
			),
			'Vehicle trades'	=>  array(
				'code'		=> '523',
				'subset'	=> array(
					'Motor mechanics'	=> '52310',
					'Vehicle body builders and repairers'	=> '52320',
					'Auto electricians'	=> '52330',
					'Vehicle spray painters'	=> '52340'
				)
			),
			'Electrical trades'	=>  array(
				'code'		=> '524',
				'subset'	=> array(
					'Electricians, electrical fitters'	=> '52410',
					'Production fitters (electrical/electronic)'	=> '52411',
					'Electricians, electrical maintenance fitters'	=> '52412',
					'Electrical engineers (not professional)'	=> '52413',
					'Telecommunications engineers'	=> '52420',
					'Lines repairers and cable jointers'	=> '52430',
					'TV, video and audio engineers'	=> '52440',
					'Computer engineers, installation and maintenance'	=> '52450',
					'Electrical/electronics engineers n.e.c.'	=> '52490'
				)
			),
			'Construction trades'	=>  array(
				'code'		=> '531',
				'subset'	=> array(
					'Steel erectors'	=> '53110',
					'Bricklayers, masons'	=> '53120',
					'Roofers, roof tilers and slaters'	=> '53130',
					'Plumbers, heating and ventilating engineers'	=> '53140',
					'Carpenters and joiners'	=> '53150',
					'Glaziers, window fabricators and fitters'	=> '53160',
					'Construction trades n.e.c.'	=> '53190'
				)
			),
			'Building trades'	=>  array(
				'code'		=> '532',
				'subset'	=> array(
					'Plasterers'	=> '53210',
					'Floorers and wall tilers'	=> '53220',
					'Painters and decorators'	=> '53230'
				)
			),
			'Textiles and garments trades'	=>  array(
				'code'		=> '541',
				'subset'	=> array(
					'Weavers and knitters'	=> '54110',
					'Upholsterers'	=> '54120',
					'Leather and related trades'	=> '54130',
					'Tailors and dressmakers'	=> '54140',
					'Textiles, garments and related trades n.e.c.'	=> '54190',
			)
			),
			'Printing trades'	=>  array(
				'code'		=> '542',
				'subset'	=> array(
					'Originators, compositors and print preparers'	=> '54210',
					'Printers'	=> '54220',
					'Bookbinders and print finishers'	=> '54230',
					'Screen printers'	=> '54240'
				)
			),
			'Food preparation trades'	=>  array(
				'code'		=> '543',
				'subset'	=> array(
					'Butchers, meat cutters'	=> '54310',
					'Bakers, flour confectioners'	=> '54320',
					'Fishmongers, poultry dressers'	=> '54330',
					'Chefs, cooks'	=> '54340'
				)
			),
			'Other skilled trades'	=>  array(
				'code'		=> '549',
				'subset'	=> array(
					'Glass and ceramics makers, decorators and finishers'	=> '54910',
					'Furniture makers, other craft woodworkers'	=> '54920',
					'Pattern makers (moulds)'	=> '54930',
					'Musical instrument makers and tuners'	=> '54940',
					'Goldsmiths, silversmiths, precious stone workers'	=> '54950',
					'Floral arrangers, florists'	=> '54960',
					'Hand craft occupations n.e.c.'	=> '54990'
				)
			)
		)

	),
	'Personal service occupations'	=>array(
		'code'		=> '6',
		'subset'	=> array(
			'Healthcare and related personal services'	=> array(
				'code'		=> '611',
				'subset'	=> array(
					'Nursing auxiliaries and assistants'	=> '61110',
					'Nursing auxiliaries and ward attendants'	=> '61111',
					'Surgery, theatre and sterile services assistants'	=> '61112',
					'Occupational therapy and physiotherapy assistants'	=> '61113',
					'Ambulance staff (excl. paramedics)'	=> '61120',
					'Dental nurses'	=> '61130',
					'Houseparents and residential wardens'	=> '61140',
					'Care assistants and home carers (elderly and infirm)'	=> '61150',
					'Care assistants (residential)'	=> '61151',
					'Home carers'	=> '61152'
				)
			),
			'Childcare and related personal services'	=>  array(
				'code'		=> '612',
				'subset'	=> array(
					'Nursery nurses'	=> '61210',
					'Nursery nurses and assistants'	=> '61211',
					'Crèche attendants'	=> '61212',
					'Childminders and related occupations'	=> '61220',
					'Playgroup leaders/assistants'	=> '61230',
					'Educational assistants (excl. HE/FE tutors and language assistants)'	=> '61240'
				)
			),
			'Animal care services'	=>  array(
				'code'		=> '613',
				'subset'	=> array(
					'Veterinary nurses and assistants'	=> '61310',
					'Animal care occupations n.e.c.'	=> '61390'
				)
			),
			'Leisure and travel service occupations'	=>  array(
				'code'		=> '621',
				'subset'	=> array(
					'Sports and leisure assistants'	=> '62110',
					'Museum assistants'	=> '62111',
					'Bookmakers'	=> '62112',
					'Leisure centre, gym and swimming pool attendants'	=> '62113',
					'Travel agents'	=> '62120',
					'Travel and tour guides'	=> '62130',
					'Air travel assistants'	=> '62140',
					'Cabin crew'	=> '62141',
					'Passenger services assistants'	=> '62142',
					'Rail travel assistants'	=> '62150',
					'Leisure and travel service occupations n.e.c.'	=> '62190',
					'Ship stewards'	=> '62191'
				)
			),
			'Hairdressers and related occupations'	=>  array(
				'code'		=> '622',
				'subset'	=> array(
					'Hairdressers, barbers'	=> '62210',
					'Beauticians and related occupations'	=> '62220'
				)
			),
			'Housekeeping occupations'	=>  array(
				'code'		=> '623',
				'subset'	=> array(
					'Housekeepers and related occupations'	=> '62310',
					'Domestic housekeepers'	=> '62311',
					'Non-domestic housekeepers'	=> '62312',
					'Caretakers'	=> '62320'
				)
			),
			'Other'	=> array(
				'code'		=> '629',
				'subset'	=> array(
					'Undertakers and mortuary assistants'	=> '62910',
					'Pest control officers'	=> '62920'
				)
			)
		)
	),
	'Sales and customer service occupations'	=>array(
		'code'		=> '7',
		'subset'	=> array(
			'Sales assistants and retail cashiers'	=> array(
				'code'		=> '711',
				'subset'	=> array(
					'Sales and retail assistants'	=> '71110',
					'Retail cashiers and check-out operators'	=> '71120',
					'Telephone salespersons'	=> '71130'
				)
			),
			'Sales related occupations'	=>  array(
				'code'		=> '712',
				'subset'	=> array(
					'Collector salespersons and credit agents'	=> '71210',
					'Debt, rent and other cash collectors'	=> '71220',
					'Roundsmen/women and van salespersons'	=> '71230',
					'Market and street traders and assistants'	=> '71240',
					'Merchandisers and window dressers'	=> '71250',
					'Merchandisers'	=> '71251',
					'Window dressers'	=> '71252',
					'Sales related occupations n.e.c'	=> '71290',
					'Property negotiators'	=> '71291',
					'Insurance sales representatives'	=> '71292',
					'Demonstrators and promoters (sales)'	=> '71293',
					'Sales representatives (retail)'	=> '71294'
				)
			),
			'Customer service occupations'	=>  array(
				'code'		=> '721',
				'subset'	=> array(
					'Call centre agents/operators'	=> '72110',
					'Customer care occupations'	=> '72120'
				)
			)
		)
	),
	'Process, plant and machine operatives'	=>array(
		'code'		=> '8',
		'subset'	=> array(
			'Process Operatives'	=> array(
				'code'		=> '811',
				'subset'	=> array(
					'Food, drink and tobacco process operatives'	=> '81110',
					'Glass and ceramics process operatives'	=> '81120',
					'Textile process operatives'	=> '81130',
					'Chemical and related process operatives'	=> '81140',
					'Rubber process operatives'	=> '81150',
					'Plastics process operatives'	=> '81160',
					'Metal making and treating process operatives'	=> '81170',
					'Electroplaters'	=> '81180',
					'Process operatives n.e.c.'	=> '81190'
				)
			),
			'Plant and machine operatives'	=>  array(
				'code'		=> '812',
				'subset'	=> array(
					'Paper and wood machine operatives'	=> '81210',
					'Coal mine operatives'	=> '81220',
					'Quarry workers and related operatives'	=> '81230',
					'Energy plant operatives'	=> '81240',
					'Metal working machine operatives'	=> '81250',
					'Water and sewerage plant operatives'	=> '81260',
					'Plant and machine operatives n.e.c'	=> '81290'
				)
			),
			'Assemblers and routine operatives'	=>  array(
				'code'		=> '813',
				'subset'	=> array(
					'Assemblers (electrical products)'	=> '81310',
					'Assemblers (vehicles and metal goods)'	=> '81320',
					'Routine inspectors and testers'	=> '81330',
					'Weighers, graders, sorters'	=> '81340',
					'Tyre, exhaust and windscreen fitters'	=> '81350',
					'Clothing cutters'	=> '81360',
					'Sewing machinists'	=> '81370',
					'Routine laboratory testers'	=> '81380',
					'Assemblers and routine operatives n.e.c.'	=> '81390'
				)
			),
			'Construction operatives'	=>  array(
				'code'		=> '814',
				'subset'	=> array(
					'Scaffolders, stagers, riggers'	=> '81410',
					'Road construction operatives'	=> '81420',
					'Rail construction and maintenance operatives'	=> '81430',
					'Construction operatives n.e.c'	=> '81490'
				)
			),
			'Transport drivers and operatives'	=>  array(
				'code'		=> '821',
				'subset'	=> array(
					'Heavy goods vehicle drivers'	=> '82110',
					'Van drivers'	=> '82120',
					'Bus and coach drivers'	=> '82130',
					'Taxi, cab drivers and chauffeurs'	=> '82140',
					'Driving instructors'	=> '82150',
					'Rail transport operatives'	=> '82160',
					'Seafarers (Merchant Navy); barge, lighter and boat operatives'	=> '82170',
					'Air transport operatives'	=> '82180',
					'Transport operatives n.e.c.'	=> '82190'
				)
			),
			'Mobile machine drivers and operatives'	=>  array(
				'code'		=> '822',
				'subset'	=> array(
					'Crane drivers'	=> '82210',
					'Fork-lift truck drivers'	=> '82220',
					'Agricultural machinery drivers'	=> '82230',
					'Mobile machine drivers and operatives n.e.c.'	=> '82290'
				)
			)
		)
	),
	'Elementary occupations'	=>array(
		'code'		=> '9',
		'subset'	=> array(
			'Elementary agricultural occupations'	=> array(
				'code'		=> '911',
				'subset'	=> array(
					'Farm workers'	=> '91110',
					'Forestry workers'	=> '91120',
					'Fishing and agriculture related occupations n.e.c.'	=> '91190'
				)
			),
			'Elementary construction occupations'	=>  array(
				'code'		=> '912',
				'subset'	=> array(
					'Labourers in building and woodworking trades'	=> '91210',
					'Labourers in other construction trades n.e.c.'	=> '91290'
				)
			),
			'Elementary process plant occupations'	=>  array(
				'code'		=> '913',
				'subset'	=> array(
					'Labourers in foundries'	=> '91310',
					'Industrial cleaning process occupations'	=> '91320',
					'Printing machine minders and assistants'	=> '91330',
					'Packers, bottlers, canners, fillers'	=> '91340',
					'Labourers in process and plant operations n.e.c.'	=> '91390'
				)
			),
			'Elementary goods storage occupations'	=>  array(
				'code'		=> '914',
				'subset'	=> array(
					'Stevedores, dockers and slingers'	=> '91410',
					'Other goods handling and storage occupations n.e.c.'	=> '91490',
					'Storekeepers, warehousemen/women'	=> '91491',
					'Goods collectors, assemblers, dispatchers and porters'	=> '91492'
				)
			),
			'Elementary administration occupations'	=>  array(
				'code'		=> '921',
				'subset'	=> array(
					'Postal workers, mail sorters, messengers, couriers'	=> '92110',
					'Postal workers'	=> '92111',
					'Messengers'	=> '92112',
					'Couriers, deliverers and distributors'	=> '92113',
					'Elementary office occupations n.e.c.'	=> '92190',
					'Reprographics, print room and office machine operators'	=> '92191',
					'Office juniors'	=> '92192'
				)
			),
			'Elementary personal services occupations'	=>  array(
				'code'		=> '922',
				'subset'	=> array(
					'Hospital porters'	=> '92210',
					'Hotel porters'	=> '92220',
					'Kitchen and catering assistants'	=> '92230',
					'Kitchen porters, hands'	=> '92231',
					'Counterhands, catering assistants'	=> '92232',
					'Waiters, waitresses'	=> '92240',
					'Bar staff'	=> '92250',
					'Leisure and theme park attendants'	=> '92260',
					'Elementary personal services occupations n.e.c.'	=> '92290'
				)
			),
			'Elementary cleaning occupations'	=>  array(
				'code'		=> '923',
				'subset'	=> array(
					'Window cleaners'	=> '92310',
					'Road sweepers'	=> '92320',
					'Cleaners, domestics'	=> '92330',
					'Launderers, dry cleaners, pressers'	=> '92340',
					'Refuse and salvage occupations'	=> '92350',
					'Elementary cleaning occupations n.e.c.'	=> '92390'
				)
			),
			'Elementary security occupations'	=>  array(
				'code'		=> '924',
				'subset'	=> array(
					'Security guards and related occupations'	=> '92410',
					'Detectives and investigators (security services)'	=> '92411',
					'Security guards, wardens and watchmen'	=> '92412',
					'Traffic wardens'	=> '92420',
					'School crossing patrol attendants'	=> '92430',
					'School midday assistants'	=> '92440',
					'Car park attendants'	=> '92450',
					'Elementary security occupations n.e.c.'	=> '92490'
				)
			),
			'Elementary sales occupations'	=>  array(
				'code'		=> '925',
				'subset'	=> array(
					'Shelf fillers'	=> '92510',
					'Elementary sales occupations n.e.c.'	=> '92590',
					'Trolley attendant'	=> '92591',
					'Advertisement hand'	=> '92592'				
				)
			)
		)
	)	

);

$jobtitles1112 = array(
    'Managers, directors and senior officials' => array(
        'code'  => '1',
        'subset'    => array(
            'Chief executives and senior officials' => array(
                'code'  => '111',
                'subset'    => array(
                    'Chief executives and senior officials' => '11150',
                    'Elected officers and representatives' => '11160'
                )
            ),
            'Production managers and directors' => array(
                'code'  => '112',
                'subset'    => array(
                    'Production managers and directors in manufacturing' => '11210',
                    'Production managers and directors in construction' => '11220',
                    'Production managers and directors in mining and energy' => '11230'
                )
            ),
            'Functional managers and directors' => array(
                'code'  => '113',
                'subset'    => array(
                    'Finance managers and directors' => '11311',
                    'Investment/ merchant bankers' => '11312',
                    'Chartered company secretaries, treasurers, company registrars' => '11313',
                    'Financial managers and directors n.e.c.' => '11319',
                    'Marketing and sales directors' => '11320',
                    'Purchasing managers and directors' => '11330',
                    'Advertising and public relations directors' => '11340',
                    'Human resource managers and directors' => '11350',
                    'Information technology and telecommunications directors' => '11360',
                    'Functional managers and directors n.e.c.' => '11390'
                )
            ),
            'Financial institution managers and directors' => array(
                'code'  => '115',
                'subset'    => array(
                    'Financial institution managers and directors' => '11500'
                )
            ),
            'Managers and directors in transport and logistics' => array(
                'code'  => '116',
                'subset'    => array(
                    'Managers and directors in transport and distribution' => '11610',
                    'Managers and directors in storage and warehousing' => '11620'
                )
            ),
            'Senior officers in protective services' => array(
                'code'  => '117',
                'subset'    => array(
                    'Officers in armed forces' => '11710',
                    'Senior police officers' => '11720',
                    'Senior officers in fire, ambulance, prison and related services' => '11730'
                )
            ),
            'Health and social services managers and directors' => array(
                'code'  => '118',
                'subset'    => array(
                    'Health services and public health managers and directors' => '11810',
                    'Social services managers and directors' => '11840'
                )
            ),
            'Managers and directors in retail and wholesale' => array(
                'code'  => '119',
                'subset'    => array(
                    'Managers and directors in retail and wholesale' => '11900'
                )
            ),
            'Managers and proprietors in agriculture related services' => array(
                'code'  => '121',
                'subset'    => array(
                    'Managers and proprietors in agriculture and horticulture' => '12110',
                    'Managers and proprietors in forestry, fishing and related services' => '12130'
                )
            ),
            'Managers and proprietors in hospitality and leisure services' => array(
                'code'  => '122',
                'subset'    => array(
                    'Hotel and accommodation managers and proprietors' => '12210',
                    'Restaurant and catering establishment managers and proprietors' => '12230',
                    'Publicans and managers of licensed premises' => '12240',
                    'Leisure and sports managers' => '12250',
                    'Travel agency managers and proprietors' => '12260'
                )
            ),
            'Managers and proprietors in health and care services' => array(
                'code'  => '124',
                'subset'    => array(
                    'Health care practice managers' => '12410',
                    'Residential, day and domiciliary care managers and proprietors' => '12420'
                )
            ),
            'Managers and proprietors in other services' => array(
                'code'  => '125',
                'subset'    => array(
                    'Property, housing and estate managers' => '12510',
                    'Garage managers and proprietors' => '12520',
                    'Hairdressing and beauty salon managers and proprietors' => '12530',
                    'Shopkeepers and proprietors - wholesale and retail' => '12540',
                    'Waste disposal and environmental services managers' => '12550',
                    'Managers and proprietors in other services n.e.c.' => '12590'
                )
            )
        )
    ),
    'Professional occupations' => array(
        'code'  => '2',
        'subset'    => array(
            'Natural and social science professionals' => array(
                'code'  => '211',
                'subset'    => array(
                    'Chemists' => '21111',
                    'Research/ development chemists' => '21112',
                    'Analytical chemists' => '21113',
                    'Chemical scientists n.e.c.' => '21119',
                    'Biochemists, medical scientists' => '21121',
                    'Biologists' => '21122',
                    'Bacteriologists, microbiologists, etc.' => '21123',
                    'Botanists' => '21124',
                    'Pathologists' => '21125',
                    'Agricultural scientists' => '21126',
                    'Physiologists' => '21127',
                    'Pharmacologists' => '21128',
                    'Biological scientists and biochemists n.e.c.' => '21129',
                    'Physicists' => '21131',
                    'Geophysicists' => '21132',
                    'Geologists, mineralogists, etc.' => '21133',
                    'Meteorologists' => '21134',
                    'Astronomers' => '21135',
                    'Physical scientists n.e.c.' => '21139',
                    'Social and humanities scientists' => '21140',
                    'University researchers, unspecified discipline' => '21191',
                    'Sports scientists' => '21192',
                    'Natural and social science professionals n.e.c.' => '21199'
                )
            ),
            'Engineering professionals' => array(
                'code'  => '212',
                'subset'    => array(
                    'Civil engineers' => '21210',
                    'Mechanical engineers' => '21220',
                    'Electrical engineers' => '21230',
                    'Electronics engineers' => '21240',
                    'Design and development engineers' => '21260',
                    'Production and process engineers' => '21270',
                    'Engineering professionals n.e.c.' => '21290'
                )
            ),
            'Information technology and telecommunications professionals' => array(
                'code'  => '213',
                'subset'    => array(
                    'IT specialist managers' => '21330',
                    'IT project and programme managers' => '21340',
                    'IT business analysts, architects and systems designers' => '21350',
                    'Programmers and software development professionals' => '21360',
                    'Web design and development professionals' => '21370',
                    'Information technology and telecommunications professionals n.e.c.' => '21390'
                )
            ),
            'Conservation and environment professionals' => array(
                'code'  => '214',
                'subset'    => array(
                    'Conservation professionals' => '21410',
                    'Environment professionals' => '21420'
                )
            ),
            'Research and development managers' => array(
                'code'  => '215',
                'subset'    => array(
                    'Research and development managers' => '21500'
                )
            ),
            'Health professionals' => array(
                'code'  => '221',
                'subset'    => array(
                    'Medical practitioners' => '22110',
                    'Psychologists' => '22121',
                    'Education psychologists' => '22122',
                    'Clinical psychologists' => '22123',
                    'Occupational psychologists' => '22124',
                    'Psychology assistants' => '22129',
                    'Pharmacists' => '22130',
                    'Ophthalmic opticians' => '22140',
                    'Dental practitioners' => '22150',
                    'Veterinarians' => '22160',
                    'Medical radiographers' => '22170',
                    'Podiatrists' => '22180',
                    'Health professionals n.e.c.' => '22190',
                    'Physiotherapists' => '22210'
                )
            ),
            'Therapy professionals' => array(
                'code'  => '222',
                'subset'    => array(
                    'Occupational therapists' => '22220',
                    'Speech and language therapists' => '22230',
                    'Therapy professionals n.e.c.' => '22290'
                )
            ),
            'Nursing and midwifery professionals' => array(
                'code'  => '223',
                'subset'    => array(
                    'Nurses' => '22310',
                    'Midwives' => '22320'
                )
            ),
            'Teaching and educational professionals' => array(
                'code'  => '231',
                'subset'    => array(
                    'Higher education teaching professionals' => '23110',
                    'Further education teaching professionals' => '23120',
                    'Secondary education teaching professionals' => '23140',
                    'Primary and nursery education teaching professionals' => '23150',
                    'Special needs education teaching professionals' => '23160',
                    'Senior professionals of educational establishments' => '23170',
                    'Education advisers and school inspectors' => '23180',
                    'Teaching and other educational professionals n.e.c.' => '23190'
                )
            ),
            'Legal professionals' => array(
                'code'  => '241',
                'subset'    => array(
                    'Barristers and judges' => '24120',
                    'Solicitors' => '24130',
                    'Legal professionals n.e.c.' => '24190'
                )
            ),
            'Business, research and administrative professionals' => array(
                'code'  => '242',
                'subset'    => array(
                    'Chartered and certified accountants' => '24210',
                    'Management consultants and business analysts' => '24230',
                    'Business and financial project management professionals' => '24240',
                    'Actuaries' => '24251',
                    'Economists' => '24252',
                    'Statisticians' => '24253',
                    'Mathematicians' => '24254',
                    'Actuaries, economists and statisticians n.e.c.' => '24259',
                    'Researchers (media)' => '24261',
                    'Researchers (national security, police)' => '24262',
                    'Researchers n.e.c.' => '24269',
                    'Business, research and administrative professionals n.e.c.' => '24290'
                )
            ),
            'Architects, town planners and surveyors' => array(
                'code'  => '243',
                'subset'    => array(
                    'Architects' => '24310',
                    'Town planning officers' => '24320',
                    'Quantity surveyors' => '24330',
                    'Chartered surveyors' => '24340',
                    'Chartered architectural technologists' => '24350',
                    'Construction project managers and related professionals' => '24360'
                )
            ),
            'Welfare professionals' => array(
                'code'  => '244',
                'subset'    => array(
                    'Social workers' => '24420',
                    'Probation officers' => '24430',
                    'Clergy' => '24440',
                    'Welfare professionals n.e.c.' => '24490'
                )
            ),
            'Librarians and related professionals' => array(
                'code'  => '245',
                'subset'    => array(
                    'Librarians' => '24510',
                    'Archivists and curators' => '24520'
                )
            ),
            'Quality and regulatory professionals' => array(
                'code'  => '246',
                'subset'    => array(
                    'Quality control and planning engineers' => '24610',
                    'Quality assurance and regulatory professionals' => '24620',
                    'Environmental health professionals' => '24630'
                )
            ),
            'Media professionals' => array(
                'code'  => '247',
                'subset'    => array(
                    'Journalists, newspaper and periodical editors' => '24710',
                    'Public relations professionals' => '24720',
                    'Advertising accounts managers and creative directors' => '24730'
                )
            )
        )
    ),
    'Associate professional and technical occupations' => array(
        'code'  => '3',
        'subset'    => array(
            'Science, engineering and production technicians' => array(
                'code'  => '311',
                'subset'    => array(
                    'Laboratory technicians' => '31110',
                    'Electrical and electronics technicians' => '31120',
                    'Engineering technicians' => '31130',
                    'Building and civil engineering technicians' => '31140',
                    'Quality assurance technicians' => '31150',
                    'Planning, process and production technicians' => '31160',
                    'Science, engineering and production technicians n.e.c.' => '31190'
                )
            ),
            'Draughtspersons and related architectural technicians' => array(
                'code'  => '312',
                'subset'    => array(
                    'Architectural and town planning technicians' => '31210',
                    'Draughtspersons' => '31220'
                )
            ),
            'Information technology technicians' => array(
                'code'  => '313',
                'subset'    => array(
                    'IT operations technicians' => '31310',
                    'IT user support technicians' => '31320'
                )
            ),
            'Health associate professionals' => array(
                'code'  => '321',
                'subset'    => array(
                    'Paramedics' => '32130',
                    'Dispensing opticians' => '32160',
                    'Pharmaceutical technicians' => '32170',
                    'Medical and dental technicians' => '32180',
                    'Health associate professionals n.e.c.' => '32190'
                )
            ),
            'Welfare and housing associate professionals' => array(
                'code'  => '323',
                'subset'    => array(
                    'Youth and community workers' => '32310',
                    'Child and early years officers' => '32330',
                    'Housing officers' => '32340',
                    'Counsellors' => '32350',
                    'Welfare and housing associate professionals n.e.c.' => '32390'
                )
            ),
            'Protective service occupations' => array(
                'code'  => '331',
                'subset'    => array(
                    'NCOs and other ranks' => '33110',
                    'Police officers (sergeant and below)' => '33120',
                    'Fire service officers (watch manager and below)' => '33130',
                    'Prison service officers (below principal officer)' => '33140',
                    'Police community support officers' => '33150',
                    'Protective service associate professionals n.e.c.' => '33190'
                )
            ),
            'Artistic, literary and media occupations' => array(
                'code'  => '341',
                'subset'    => array(
                    'Artists' => '34110',
                    'Authors, writers and translators' => '34120',
                    'Actors, entertainers and presenters' => '34130',
                    'Dancers and choreographers' => '34140',
                    'Musicians' => '34150',
                    'Arts officers, producers and directors' => '34160',
                    'Photographers, audio-visual and broadcasting equipment operators' => '34170'
                )
            ),
            'Design occupations' => array(
                'code'  => '342',
                'subset'    => array(
                    'Graphic designers' => '34211',
                    'Commercial artists' => '34212',
                    'Exhibition, multimedia designers' => '34213',
                    'Desktop publishing assistants and operators' => '34214',
                    'Graphic design copyists and setters-out' => '34219',
                    'Interior decoration designers' => '34221',
                    'Set designers (stage etc.)' => '34222',
                    'Industrial designers' => '34223',
                    'Textile designers' => '34224',
                    'Clothing designers' => '34225',
                    'Clothing advisers, consultants' => '34226',
                    'Furniture designers' => '34227',
                    'Jewellery designers' => '34228',
                    'Product, clothing and related designers n.e.c.' => '34229'
                )
            ),
            'Sports and fitness occupations' => array(
                'code'  => '344',
                'subset'    => array(
                    'Sports players' => '34410',
                    'Sports coaches, instructors and officials' => '34420',
                    'Fitness instructors' => '34430'
                )
            ),
            'Transport associate professionals' => array(
                'code'  => '351',
                'subset'    => array(
                    'Air traffic controllers' => '35110',
                    'Aircraft pilots and flight engineers' => '35120',
                    'Ship and hovercraft officers' => '35130'
                )
            ),
            'Legal associate professionals' => array(
                'code'  => '352',
                'subset'    => array(
                    'Legal associate professionals' => '35200'
                )
            ),
            'Business, finance and related associate professionals' => array(
                'code'  => '353',
                'subset'    => array(
                    'Estimators, valuers and assessors' => '35310',
                    'Brokers' => '35320',
                    'Insurance underwriters' => '35330',
                    'Finance and investment analysts and advisers' => '35340',
                    'Taxation experts' => '35350',
                    'Importers and exporters' => '35360',
                    'Financial and accounting technicians' => '35370',
                    'Financial accounts managers' => '35380',
                    'Business and related associate professionals n.e.c.' => '35390'
                )
            ),
            'Sales, marketing and related associate professionals' => array(
                'code'  => '354',
                'subset'    => array(
                    'Buyers and procurement officers' => '35410',
                    'Business sales executives' => '35420',
                    'Marketing associate professionals' => '35430',
                    'Estate agents and auctioneers' => '35440',
                    'Sales accounts and business development managers' => '35450',
                    'Conference and exhibition managers and organisers' => '35460'
                )
            ),
            'Conservation and environmental associate professionals' => array(
                'code'  => '355',
                'subset'    => array(
                    'Conservation and environmental associate professionals' => '35500'
                )
            ),
            'Public services and other associate professionals' => array(
                'code'  => '356',
                'subset'    => array(
                    'Public services associate professionals' => '35610',
                    'Human resources and industrial relations officers' => '35620',
                    'Vocational and industrial trainers and instructors' => '35630',
                    'Careers advisers and vocational guidance specialists' => '35640',
                    'Inspectors of standards and regulations' => '35650',
                    'Health and safety officers' => '35670'
                )
            )
        )
    ),
    'Administrative and secretarial occupations' => array(
        'code'  => '4',
        'subset'    => array(
            'Administrative occupations: government and related organisations' => array(
                'code'  => '411',
                'subset'    => array(
                    'National government administrative occupations' => '41120',
                    'Local government administrative occupations' => '41130',
                    'Officers of non-governmental organisations' => '41140'
                )
            ),
            'Administrative occupations: finance' => array(
                'code'  => '412',
                'subset'    => array(
                    'Credit controllers' => '41210',
                    'Book-keepers, payroll managers and wages clerks' => '41220',
                    'Bank and post office clerks' => '41230',
                    'Finance officers' => '41240',
                    'Financial administrative occupations n.e.c.' => '41290'
                )
            ),
            'Administrative occupations: records' => array(
                'code'  => '413',
                'subset'    => array(
                    'Records clerks and assistants' => '41310',
                    'Pensions and insurance clerks and assistants' => '41320',
                    'Stock control clerks and assistants' => '41330',
                    'Transport and distribution clerks and assistants' => '41340',
                    'Library clerks and assistants' => '41350',
                    'Human resources administrative occupations' => '41380'
                )
            ),
            'Other administrative occupations' => array(
                'code'  => '415',
                'subset'    => array(
                    'Sales administrators' => '41510',
                    'Other administrative occupations n.e.c.' => '41590'
                )
            ),
            'Administrative occupations: office managers and supervisors' => array(
                'code'  => '416',
                'subset'    => array(
                    'Office managers' => '41610',
                    'Office supervisors' => '41620'
                )
            ),
            'Secretarial and related occupations' => array(
                'code'  => '421',
                'subset'    => array(
                    'Medical secretaries' => '42110',
                    'Legal secretaries' => '42120',
                    'School secretaries' => '42130',
                    'Company secretaries' => '42140',
                    'Personal assistants and other secretaries' => '42150',
                    'Receptionists' => '42160',
                    'Typists and related keyboard occupations' => '42170'
                )
            )
        )
    ),
    'Skilled trades occupations' => array(
        'code'  => '5',
        'subset'    => array(
            'Agricultural and related trades' => array(
                'code'  => '511',
                'subset'    => array(
                    'Farmers' => '51110',
                    'Horticultural trades' => '51120',
                    'Gardeners and landscape gardeners' => '51130',
                    'Groundsmen and greenkeepers' => '51140',
                    'Agricultural and fishing trades n.e.c.' => '51190'
                )
            ),
            'Metal forming, welding and related trades' => array(
                'code'  => '521',
                'subset'    => array(
                    'Smiths and forge workers' => '52110',
                    'Moulders, core makers and die casters' => '52120',
                    'Sheet metal workers' => '52130',
                    'Metal plate workers and riveters' => '52140',
                    'Welding trades' => '52150',
                    'Pipe fitters' => '52160'
                )
            ),
            'Metal machining, fitting and instrument making trades' => array(
                'code'  => '522',
                'subset'    => array(
                    'Metal machining setters and setter-operators' => '52210',
                    'Tool makers, tool fitters and markers-out' => '52220',
                    'Metal working production and maintenance fitters' => '52230',
                    'Precision instrument makers and repairers' => '52240',
                    'Air-conditioning and refrigeration engineers' => '52250'
                )
            ),
            'Vehicle trades' => array(
                'code'  => '523',
                'subset'    => array(
                    'Vehicle technicians, mechanics and electricians' => '52310',
                    'Vehicle body builders and repairers' => '52320',
                    'Vehicle paint technicians' => '52340',
                    'Aircraft maintenance and related trades' => '52350',
                    'Boat and ship builders and repairers' => '52360',
                    'Rail and rolling stock builders and repairers' => '52370'
                )
            ),
            'Electrical and electronic trades' => array(
                'code'  => '524',
                'subset'    => array(
                    'Electricians and electrical fitters' => '52410',
                    'Telecommunications engineers' => '52420',
                    'TV, video and audio engineers' => '52440',
                    'IT engineers' => '52450',
                    'Electrical and electronic trades n.e.c.' => '52490'
                )
            ),
            'Skilled metal, electrical and electronic trades supervisors' => array(
                'code'  => '525',
                'subset'    => array(
                    'Skilled metal, electrical and electronic trades supervisors' => '52500'
                )
            ),
            'Construction and building trades' => array(
                'code'  => '531',
                'subset'    => array(
                    'Steel erectors' => '53110',
                    'Bricklayers and masons' => '53120',
                    'Roofers, roof tilers and slaters' => '53130',
                    'Plumbers and heating and ventilating engineers' => '53140',
                    'Carpenters and joiners' => '53150',
                    'Glaziers, window fabricators and fitters' => '53160',
                    'Construction and building trades n.e.c.' => '53190'
                )
            ),
            'Building finishing trades' => array(
                'code'  => '532',
                'subset'    => array(
                    'Plasterers' => '53210',
                    'Floorers and wall tilers' => '53220',
                    'Painters and decorators' => '53230'
                )
            ),
            'Construction and building trades supervisors' => array(
                'code'  => '533',
                'subset'    => array(
                    'Construction and building trades supervisors' => '53300'
                )
            ),
            'Textiles and garments trades' => array(
                'code'  => '541',
                'subset'    => array(
                    'Weavers and knitters' => '54110',
                    'Upholsterers' => '54120',
                    'Footwear and leather working trades' => '54130',
                    'Tailors and dressmakers' => '54140',
                    'Textiles, garments and related trades n.e.c.' => '54190'
                )
            ),
            'Printing trades' => array(
                'code'  => '542',
                'subset'    => array(
                    'Pre-press technicians' => '54210',
                    'Printers' => '54220',
                    'Print finishing and binding workers' => '54230'
                )
            ),
            'Food preparation and hospitality trades' => array(
                'code'  => '543',
                'subset'    => array(
                    'Butchers' => '54310',
                    'Bakers and flour confectioners' => '54320',
                    'Fishmongers and poultry dressers' => '54330',
                    'Chefs' => '54340',
                    'Cooks' => '54350',
                    'Catering and bar managers' => '54360'
                )
            ),
            'Other skilled trades' => array(
                'code'  => '544',
                'subset'    => array(
                    'Glass and ceramics makers, decorators and finishers' => '54410',
                    'Furniture makers and other craft woodworkers' => '54420',
                    'Florists' => '54430',
                    'Other skilled trades n.e.c.' => '54490'
                )
            )
        )
    ),
    'Caring, leisure and other service occupations' => array(
        'code'  => '6',
        'subset'    => array(
            'Childcare and related personal services' => array(
                'code'  => '612',
                'subset'    => array(
                    'Nursery nurses and assistants' => '61210',
                    'Childminders and related occupations' => '61220',
                    'Playworkers' => '61230',
                    'Teaching assistants' => '61250',
                    'Educational support assistants' => '61260'
                )
            ),
            'Animal care and control services' => array(
                'code'  => '613',
                'subset'    => array(
                    'Veterinary nurses' => '61310',
                    'Pest control officers' => '61320',
                    'Animal care services occupations n.e.c.' => '61390'
                )
            ),
            'Caring personal services' => array(
                'code'  => '614',
                'subset'    => array(
                    'Nursing auxiliaries and assistants' => '61410',
                    'Ambulance staff (excluding paramedics)' => '61420',
                    'Dental nurses' => '61430',
                    'Houseparents and residential wardens' => '61440',
                    'Care workers and home carers' => '61450',
                    'Senior care workers' => '61460',
                    'Care escorts' => '61470',
                    'Undertakers, mortuary and crematorium assistants' => '61480'
                )
            ),
            'Leisure and travel services' => array(
                'code'  => '621',
                'subset'    => array(
                    'Sports and leisure assistants' => '62110',
                    'Travel agents' => '62120',
                    'Air travel assistants' => '62140',
                    'Rail travel assistants' => '62150',
                    'Leisure and travel service occupations n.e.c.' => '62190'
                )
            ),
            'Hairdressers and related services' => array(
                'code'  => '622',
                'subset'    => array(
                    'Hairdressers and barbers' => '62210',
                    'Beauticians and related occupations' => '62220'
                )
            ),
            'Housekeeping and related services' => array(
                'code'  => '623',
                'subset'    => array(
                    'Housekeepers and related occupations' => '62310',
                    'Caretakers' => '62320'
                )
            ),
            'Cleaning and housekeeping managers and supervisors' => array(
                'code'  => '624',
                'subset'    => array(
                    'Cleaning and housekeeping managers and supervisors' => '62400'
                )
            )
        )
    ),
    'Sales and customer service occupations' => array(
        'code'  => '7',
        'subset'    => array(
            'Sales assistants and retail cashiers' => array(
                'code'  => '711',
                'subset'    => array(
                    'Sales and retail assistants' => '71110',
                    'Retail cashiers and check-out operators' => '71120',
                    'Telephone salespersons' => '71130',
                    'Pharmacy and other dispensing assistants' => '71140',
                    'Vehicle and parts salespersons and advisers' => '71150'
                )
            ),
            'Sales related occupations' => array(
                'code'  => '712',
                'subset'    => array(
                    'Collector salespersons and credit agents' => '71210',
                    'Debt, rent and other cash collectors' => '71220',
                    'Roundspersons and van salespersons' => '71230',
                    'Market and street traders and assistants' => '71240',
                    'Merchandisers and window dressers' => '71250',
                    'Sales related occupations n.e.c.' => '71290'
                )
            ),
            'Sales supervisors' => array(
                'code'  => '713',
                'subset'    => array(
                    'Sales supervisors' => '71300'
                )
            ),
            'Customer service occupations' => array(
                'code'  => '721',
                'subset'    => array(
                    'Call and contact centre occupations' => '72110',
                    'Telephonists' => '72130',
                    'Communication operators' => '72140',
                    'Market research interviewers' => '72150',
                    'Customer service occupations n.e.c.' => '72190'
                )
            ),
            'Customer service managers and supervisors' => array(
                'code'  => '722',
                'subset'    => array(
                    'Customer service managers and supervisors' => '72200'
                )
            )
        )
    ),
    'Process, plant and machine operatives' => array(
        'code'  => '8',
        'subset'    => array(
            'Process operatives' => array(
                'code'  => '811',
                'subset'    => array(
                    'Food, drink and tobacco process operatives' => '81110',
                    'Glass and ceramics process operatives' => '81120',
                    'Textile process operatives' => '81130',
                    'Chemical and related process operatives' => '81140',
                    'Rubber process operatives' => '81150',
                    'Plastics process operatives' => '81160',
                    'Metal making and treating process operatives' => '81170',
                    'Electroplaters' => '81180',
                    'Process operatives n.e.c.' => '81190'
                )
            ),
            'Plant and machine operatives' => array(
                'code'  => '812',
                'subset'    => array(
                    'Paper and wood machine operatives' => '81210',
                    'Coal mine operatives' => '81220',
                    'Quarry workers and related operatives' => '81230',
                    'Energy plant operatives' => '81240',
                    'Metal working machine operatives' => '81250',
                    'Water and sewerage plant operatives' => '81260',
                    'Printing machine assistants' => '81270',
                    'Plant and machine operatives n.e.c.' => '81290'
                )
            ),
            'Assemblers and routine operatives' => array(
                'code'  => '813',
                'subset'    => array(
                    'Assemblers (electrical and electronic products)' => '81310',
                    'Assemblers (vehicles and metal goods)' => '81320',
                    'Routine inspectors and testers' => '81330',
                    'Weighers, graders and sorters' => '81340',
                    'Tyre, exhaust and windscreen fitters' => '81350',
                    'Sewing machinists' => '81370',
                    'Assemblers and routine operatives n.e.c.' => '81390'
                )
            ),
            'Construction operatives' => array(
                'code'  => '814',
                'subset'    => array(
                    'Scaffolders, stagers and riggers' => '81410',
                    'Road construction operatives' => '81420',
                    'Rail construction and maintenance operatives' => '81430',
                    'Construction operatives n.e.c.' => '81490'
                )
            ),
            'Road transport drivers' => array(
                'code'  => '821',
                'subset'    => array(
                    'Large goods vehicle drivers' => '82110',
                    'Van drivers' => '82120',
                    'Bus and coach drivers' => '82130',
                    'Taxi and cab drivers and chauffeurs' => '82140',
                    'Driving instructors' => '82150'
                )
            ),
            'Mobile machine drivers and operatives' => array(
                'code'  => '822',
                'subset'    => array(
                    'Crane drivers' => '82210',
                    'Fork-lift truck drivers' => '82220',
                    'Agricultural machinery drivers' => '82230',
                    'Mobile machine drivers and operatives n.e.c.' => '82290'
                )
            ),
            'Other drivers and transport operatives' => array(
                'code'  => '823',
                'subset'    => array(
                    'Train and tram drivers' => '82310',
                    'Marine and waterways transport operatives' => '82320',
                    'Air transport operatives' => '82330',
                    'Rail transport operatives' => '82340',
                    'Other drivers and transport operatives n.e.c.' => '82390'
                )
            )
        )
    ),
    'Elementary occupations' => array(
        'code'  => '9',
        'subset'    => array(
            'Elementary agricultural occupations' => array(
                'code'  => '911',
                'subset'    => array(
                    'Farm workers' => '91110',
                    'Forestry workers' => '91120',
                    'Fishing and other elementary agriculture occupations n.e.c.' => '91190'
                )
            ),
            'Elementary construction occupations' => array(
                'code'  => '912',
                'subset'    => array(
                    'Elementary construction occupations' => '91200'
                )
            ),
            'Elementary process plant occupations' => array(
                'code'  => '913',
                'subset'    => array(
                    'Industrial cleaning process occupations' => '91320',
                    'Packers, bottlers, canners and fillers' => '91340',
                    'Elementary process plant occupations n.e.c.' => '91390'
                )
            ),
            'Elementary administration occupations' => array(
                'code'  => '921',
                'subset'    => array(
                    'Postal workers, mail sorters, messengers and couriers' => '92110',
                    'Elementary administration occupations n.e.c.' => '92190'
                )
            ),
            'Elementary cleaning occupations' => array(
                'code'  => '923',
                'subset'    => array(
                    'Window cleaners' => '92310',
                    'Street cleaners' => '92320',
                    'Cleaners and domestics' => '92330',
                    'Launderers, dry cleaners and pressers' => '92340',
                    'Refuse and salvage occupations' => '92350',
                    'Vehicle valeters and cleaners' => '92360',
                    'Elementary cleaning occupations n.e.c.' => '92390'
                )
            ),
            'Elementary security occupations' => array(
                'code'  => '924',
                'subset'    => array(
                    'Security guards and related occupations' => '92410',
                    'Parking and civil enforcement occupations' => '92420',
                    'School midday and crossing patrol occupations' => '92440',
                    'Elementary security occupations n.e.c.' => '92490'
                )
            ),
            'Elementary sales occupations' => array(
                'code'  => '925',
                'subset'    => array(
                    'Shelf fillers' => '92510',
                    'Elementary sales occupations n.e.c.' => '92590'
                )
            ),
            'Elementary storage occupations' => array(
                'code'  => '926',
                'subset'    => array(
                    'Elementary storage occupations' => '92600'
                )
            ),
            'Other elementary services occupations' => array(
                'code'  => '927',
                'subset'    => array(
                    'Hospital porters' => '92710',
                    'Kitchen and catering assistants' => '92720',
                    'Waiters and waitresses' => '92730',
                    'Bar staff' => '92740',
                    'Leisure and theme park attendants' => '92750',
                    'Other elementary services occupations n.e.c.' => '92790'
                )
            )
        )
    )
)

?>