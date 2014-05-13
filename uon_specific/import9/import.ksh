#!/bin/ksh
logfile=import_$$.log
exec > $logfile 2>&1
ls -lrt
dos2unix extract0708.txt
dos2unix extract0809.txt
dos2unix extract0910.txt
dos2unix extract1011.txt
pwd
ls -lrt
find extract*.txt -exec wc -l {} \;
mysql -h localhost -u root -pwebapps <<EOFMYSQL
use uczgcw_career_development;
SELECT count(*) as extract78 from extract78;
SELECT count(*) as extract89 from extract89;
SELECT count(*) as extract910 from extract910;
SELECT count(*) as extract1011 from extract1011;
prompt delete data
DELETE from extract78;
DELETE from extract89;
DELETE from extract910;
DELETE from extract1011;
SELECT count(*) as extract78 from extract78;
SELECT count(*) as extract89 from extract89;
SELECT count(*) as extract910 from extract910;
SELECT count(*) as extract1011 from extract1011;
#mysql -h localhost -u root -pwebapps

LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import9/extract0708.txt' INTO TABLE extract78 FIELDS TERMINATED BY '\t';
LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import9/extract0809.txt' INTO TABLE extract89 FIELDS TERMINATED BY '\t';
LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import9/extract0910.txt' INTO TABLE extract910 FIELDS TERMINATED BY '\t';
LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import9/extract1011.txt' INTO TABLE extract1011 FIELDS TERMINATED BY '\t';
SELECT count(*) as extract78 from extract78;
SELECT count(*) as extract89 from extract89;
SELECT count(*) as extract910 from extract910;
SELECT count(*) as extract1011 from extract1011;
EOFMYSQL