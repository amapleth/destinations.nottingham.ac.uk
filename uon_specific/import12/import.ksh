#!/bin/ksh
logfile=import_$$.log
exec > $logfile 2>&1
ls -lrt
dos2unix courses0708.txt
dos2unix extract0708.txt
dos2unix popdlhe0708.txt
dos2unix tqi78.txt
dos2unix tqi910.txt
dos2unix tqi1011.txt
dos2unix tqi89.txt

pwd 
ls -lrt
find *.txt -exec wc -l {} \;
mysql -h localhost -u root -pwebapps <<EOFMYSQL
use uczgcw_career_development;
SELECT count(*) as tqi78 from tqi78;
SELECT count(*) as tqi89 from tqi89;
SELECT count(*) as tqi910 from tqi910;
SELECT count(*) as tqi1011 from tqi1011;
prompt delete data
DELETE from tqi78;
DELETE from tqi89;
DELETE from tqi910;
DELETE from tqi1011;
SELECT count(*) as tqi78 from tqi78;
SELECT count(*) as tqi89 from tqi89;
SELECT count(*) as tqi910 from tqi910;
SELECT count(*) as tqi1011 from tqi1011;
SELECT count(*) as courses78 from courses78;
SELECT count(*) as extract78 from extract78;
SELECT count(*) as popdlhe78 from popdlhe78;
prompt delete data
DELETE from courses78;
DELETE from extract78;
DELETE from popdlhe78;
SELECT count(*) as courses78 from courses78;
SELECT count(*) as extract78 from extract78;
SELECT count(*) as popdlhe78 from popdlhe78;
#mysql -h localhost -u root -pwebapps

LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import12/courses0708.txt' INTO TABLE courses78 FIELDS TERMINATED BY '\t';
LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import12/extract0708.txt' INTO TABLE extract78 FIELDS TERMINATED BY '\t';
LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import12/popdlhe0708.txt' INTO TABLE popdlhe78 FIELDS TERMINATED BY '\t';
LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import12/tqi78.txt' INTO TABLE tqi78 FIELDS TERMINATED BY '\t';
LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import12/tqi89.txt' INTO TABLE tqi89 FIELDS TERMINATED BY '\t';
LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import12/tqi910.txt' INTO TABLE tqi910 FIELDS TERMINATED BY '\t';
LOAD DATA INFILE '/usr/local/lib/gems/docs/uon_specific/import12/tqi1011.txt' INTO TABLE tqi1011 FIELDS TERMINATED BY '\t';
SELECT count(*) as courses78 from courses78;
SELECT count(*) as extract78 from extract78;
SELECT count(*) as popdlhe78 from popdlhe78;
SELECT count(*) as tqi78 from tqi78;
SELECT count(*) as tqi89 from tqi89;
SELECT count(*) as tqi910 from tqi910;
SELECT count(*) as tqi1011 from tqi1011;

EOFMYSQL