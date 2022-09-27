cd nginx
start /B nginx.exe
cd ..

SET PHP_FCGI_MAX_REQUESTS=0
start /B .\nginx\php\php-cgi.exe -b 127.0.0.1:9123
