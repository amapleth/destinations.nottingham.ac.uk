#!/bin/ksh
logfile=import_$$.log
exec > $logfile 2>&1
ls -lrt
dos2unix extract1011.txt
dos2unix courses1011.txt
dos2unix popdlhe1011.txt
dos2unix 0155_TQI5.TXT
pwd
ls -lrt
find *1011.txt -exec wc -l {} \;
mysql -h localhost -u root -pwebapps <<EOFMYSQL
use uczgcw_career_development;
SELECT count(*) as extract1011 from extract1011;
SELECT count(*) as courses1011 from courses1011;
SELECT count(*) as popdlhe1011 from popdlhe1011;
prompt delete data
DELETE from extract1011;
DELETE from courses1011;
DELETE from popdlhe1011;
SELECT count(*) as extract1011 from extract1011;
SELECT count(*) as courses1011 from courses1011;
SELECT count(*) as popdlhe1011 from popdlhe1011;
#mysql -h localhost -u root -pwebapps

LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import28052012/extract1011.txt' INTO TABLE extract1011 FIELDS TERMINATED BY '\t';
LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import28052012/courses1011.txt' INTO TABLE courses1011 FIELDS TERMINATED BY '\t';
LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import28052012/popdlhe1011.txt' INTO TABLE popdlhe1011 FIELDS TERMINATED BY '\t';
SELECT count(*) as extract1011 from extract1011;
SELECT count(*) as courses1011 from courses1011;
SELECT count(*) as popdlhe1011 from popdlhe1011;
EOFMYSQL



count(*)
9593
count(*)
1743
count(*)
9583
