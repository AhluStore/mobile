@echo off
SET INSTALL_PATH="C:\server\php\php.exe"
echo Command "--help" keyword for more options.


GOTO programend

:programend
set /p _cmd=cmd:
if /I "%_cmd%" =="cls"  (
    cls
) else (
   %INSTALL_PATH% ahlu %_cmd%
)
GOTO programend
