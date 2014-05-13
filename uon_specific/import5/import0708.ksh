#!/bin/ksh
logfile=import_$$.log
exec > $logfile 2>&1
ls -lrt
dos2unix extract0708.txt
dos2unix courses0708.txt
dos2unix popdlhe0708.txt

pwd
ls -lrt
find *0708.txt -exec wc -l {} \;
mysql -h localhost -u root -pwebapps <<EOFMYSQL
use uczgcw_career_development;
SELECT count(*) as extract0708 from extract78;
SELECT count(*) as courses0708 from courses78;
SELECT count(*) as popdlhe0708 from popdlhe78;
prompt delete data
DELETE from extract78;
DELETE from courses78;
DELETE from popdlhe78;
SELECT count(*) as extract0708 from extract78;
SELECT count(*) as courses0708 from courses78;
SELECT count(*) as popdlhe0708 from popdlhe78;
#mysql -h localhost -u root -pwebapps

LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import5/extract0708.txt' INTO TABLE extract78 FIELDS TERMINATED BY '\t';
show errors;
LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import5/courses0708.txt' INTO TABLE courses78 FIELDS TERMINATED BY '\t';
show errors;
LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import5/popdlhe0708.txt' INTO TABLE popdlhe78 FIELDS TERMINATED BY '\t';
show errors;
SELECT count(*) as extract0708 from extract78;
SELECT count(*) as courses0708 from courses78;
SELECT count(*) as popdlhe0708 from popdlhe78;
EOFMYSQL


