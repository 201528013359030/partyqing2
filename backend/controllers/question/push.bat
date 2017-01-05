git pull origin master
git add .
git commit -m "update"
git push origin master

echo "update 247"
pause
php -r "$url = 'http://192.168.139.247/advanced/pull.php'; echo file_get_contents($url);"
pause
echo "test"
echo "test"

echo "test"