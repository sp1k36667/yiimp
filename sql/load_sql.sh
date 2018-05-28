#!/bin/bash

read -e -p "Host: " -i "127.0.0.1" host
read -e -p "Port: " -i "3306" port
read -e -p "DB Name: " dbname
read -e -p "User: " user
read -e -s -p "Password: " password
#arr=( $(find *.sql -type f) )
sql=(
  "2016-04-03-yaamp.sql"
  "2016-04-24-market_history.sql"
  "2016-04-27-settings.sql"
  "2016-05-11-coins.sql"
  "2016-05-15-benchmarks.sql"
  "2016-05-23-bookmarks.sql"
  "2016-06-01-notifications.sql"
  "2016-06-04-bench_chips.sql"
  "2016-11-23-coins.sql"
  "2017-02-05-benchmarks.sql"
  "2017-03-31-earnings_index.sql"
  "2017-05-accounts_case_swaptime.sql"
  "2017-06-payouts_coinid_memo.sql"
  "2017-09-notifications.sql"
  "2017-10-bookmarks.sql"
  "2017-11-segwit.sql"
  "2018-01-stratums_ports.sql"
  "2018-02-coins_getinfo.sql"
)
for f in ${sql[@]}
do
  mysql -h$host -u$user -P$port -p$password $dbname < $f
done
