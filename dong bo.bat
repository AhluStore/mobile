@echo off
title %~nx0
color 0e
mode con lines=18 cols=70

git config --global user.email "nhiem111@gmail.com"
git config --global user.name "AhluStore"

git pull
pause
exit
