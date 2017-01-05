#!/bin/sh 
m=$1
git add .;
git commit -m "${m}";
git push origin master;

