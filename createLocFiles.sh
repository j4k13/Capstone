#!/bin/bash
IFS=''
while read line; do
	touch /var/www/html/Capstone/$line
done < "$1"
