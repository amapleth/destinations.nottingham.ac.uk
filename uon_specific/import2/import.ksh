#!/bin/ksh
logfile=import_$$.log
exec > $logfile 2>&1
ls -lrt
dos2unix extract0910.txt
dos2unix courses0910.txt
dos2unix popdlhe0910.txt
dos2unix 0155_TQI5.TXT
pwd
ls -lrt
find *0910.txt -exec wc -l {} \;
mysql -h localhost -u root -pwebapps <<EOFMYSQL
use uczgcw_career_development;
SELECT count(*) as extract0910 from extract910;
SELECT count(*) as courses0910 from courses910;
SELECT count(*) as popdlhe0910 from popdlhe910;
prompt delete data
DELETE from extract910;
DELETE from courses910;
DELETE from popdlhe910;
SELECT count(*) as extract0910 from extract910;
SELECT count(*) as courses0910 from courses910;
SELECT count(*) as popdlhe0910 from popdlhe910;
#mysql -h localhost -u root -pwebapps

LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import06062012/extract0910.txt' INTO TABLE extract910 FIELDS TERMINATED BY '\t';
LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import06062012/courses0910.txt' INTO TABLE courses910 FIELDS TERMINATED BY '\t';
LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import06062012/popdlhe0910.txt' INTO TABLE popdlhe910 FIELDS TERMINATED BY '\t';
SELECT count(*) as extract0910 from extract910;
SELECT count(*) as courses0910 from courses910;
SELECT count(*) as popdlhe0910 from popdlhe910;
EOFMYSQL



count(*)
9593
count(*)
1743
count(*)
9583
