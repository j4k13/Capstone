#!/bin/bash
while read line; do
	echo > /var/www/html/Capstone/$line
done < "$1"
