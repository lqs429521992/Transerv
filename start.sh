#!/usr/bin/env bash
php start.php start >log &
while true
do
sleep 3600
php start.php reload
done
# how to start
# nohup sh start.sh &
