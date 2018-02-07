@echo off
title %~nx0
color 0e
mode con lines=18 cols=70

git add *
git commit -m "Noi dung: "
git push
pause
exit
