#!/bin/ksh
logfile=import_$$.log
exec > $logfile 2>&1
ls -lrt
dos2unix popdlhe1011.txt

pwd 
ls -lrt
find *.txt -exec wc -l {} \;
mysql -h localhost -u root -pwebapps <<EOFMYSQL
use uczgcw_career_development;
SELECT count(*) as popdlhe1011 from popdlhe1011;
prompt delete data
DELETE from popdlhe1011;
SELECT count(*) as popdlhe1011 from popdlhe1011;
#mysql -h localhost -u root -pwebapps

LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import15/popdlhe1011.txt' INTO TABLE popdlhe1011 FIELDS TERMINATED BY '\t';
SELECT count(*) as popdlhe1011 from popdlhe1011;

EOFMYSQL