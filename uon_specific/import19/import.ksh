#!/bin/ksh
logfile=import_$$.log
exec > $logfile 2>&1
ls -lrt
dos2unix extract1011.txt
pwd
ls -lrt
find *.txt -exec wc -l {} \;
mysql -h localhost -u root -pwebapps <<EOFMYSQL
use uczgcw_career_development;
SELECT count(*) as extract1011 from extract1011;
prompt delete data
DELETE from extract1011;
SELECT count(*) as extract1011 from extract1011;
#mysql -h localhost -u root -pwebapps

LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import19/extract1011.txt' INTO TABLE extract1011 FIELDS TERMINATED BY '\t';
SELECT count(*) as extract1011 from extract1011;
EOFMYSQL



