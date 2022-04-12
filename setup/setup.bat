@echo OFF
SET link=https://github.com/applev7/client-toff.git
SET directory=client-toff
echo STARTING THE SETUP...PLEASE WAIT XOXO
cd C:\xampp\htdocs
echo CLONING FROM GITHUB...
git clone %link%
cd %directory%
echo RENAMING ENV FILE...
move ./.env.example ./.env
echo MAKE INIIAL DIRECTORY..
cd storage/app/public
md profile gallery excel
echo CREATING NEW DATABASE...
cd C:\xampp\mysql\bin
mysql -u root -p -e "CREATE DATABASE toff"
cd C:\xampp\htdocs\%directory%
call "laravelinstall.bat"
echo RUNNING LARAVEL COMMAND...
php artisan key:generate
php artisan migrate
php artisan storage:link
php artisan initial:default
echo OVERWRITE INDEX FILE...
move /Y C:\xampp\htdocs\%directory%\public\assets\index.php C:\xampp\htdocs\index.php
echo FINISH!
PAUSE
