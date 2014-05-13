#!/bin/ksh
logfile=import_$$.log
exec > $logfile 2>&1
ls -lrt
dos2unix extract0809.txt
dos2unix courses0809.txt
dos2unix popdlhe0809.txt

pwd
ls -lrt
find *0809.txt -exec wc -l {} \;
mysql -h localhost -u root -pwebapps <<EOFMYSQL
use uczgcw_career_development;
SELECT count(*) as extract0809 from extract89;
SELECT count(*) as courses0809 from courses89;
SELECT count(*) as popdlhe0809 from popdlhe89;
prompt delete data
DELETE from extract89;
DELETE from courses89;
DELETE from popdlhe89;
SELECT count(*) as extract0809 from extract89;
SELECT count(*) as courses0809 from courses89;
SELECT count(*) as popdlhe0809 from popdlhe89;
#mysql -h localhost -u root -pwebapps

LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import4/extract0809.txt' INTO TABLE extract89 FIELDS TERMINATED BY '\t';
LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import4/courses0809.txt' INTO TABLE courses89 FIELDS TERMINATED BY '\t';
LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import4/popdlhe0809.txt' INTO TABLE popdlhe89 FIELDS TERMINATED BY '\t';
SELECT count(*) as extract0809 from extract89;
SELECT count(*) as courses0809 from courses89;
SELECT count(*) as popdlhe0809 from popdlhe89;
EOFMYSQL


