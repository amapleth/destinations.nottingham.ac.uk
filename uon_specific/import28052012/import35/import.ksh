#!/bin/ksh
logfile=import.log
exec > $logfile 2>&1
ls -lrt
dos2unix extract0809.txt
dos2unix extract910.txt
pwd
ls -lrt
find *.txt -exec wc -l {} \;

mysql -h localhost -u mszadm -ppassword <<EOFMYSQL
use uczgcw_career_development;
SELECT count(*) as extract89 from extract89;
SELECT count(*) as extract910 from extract910;SELECT count(*) as extract1011 from extract1011;
prompt delete data
DELETE from extract89;
DELETE from extract910;
SELECT count(*) as extract89 from extract89;
SELECT count(*) as extract910 from extract910;
#mysql -h dev.webapps.nottingham.ac.uk -u uczgcw_career -ppassword

LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import35/extract0809.txt' INTO TABLE extract89 FIELDS TERMINATED BY '\t';
LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import35/extract0910.txt' INTO TABLE extract910 FIELDS TERMINATED BY '\t';

SELECT count(*) as extract89 from extract89;
SELECT count(*) as extract910 from extract910;
EOFMYSQL
