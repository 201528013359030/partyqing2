git pull origin master
git add .
git commit -m "update"
git push origin master

echo "update 248"
pause
php -r "$url = 'http://192.168.139.248/advanced/pull.php'; echo file_get_contents($url);"
pause