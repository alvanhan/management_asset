## CARA INSTALL

- clone project
- composer isntall 
- php artisan key:generate
- add file .env dan sett database 
- lalu add API_URL dan API KEY
##
tambahakan di .env file karena menggunakan api untuk transaction data ke databse nya

API_URL="http://127.0.0.1:8000/api"
API_TOKEN="qMiYcTrAQic54Zn_token"

- lalu run : php artisan  migrate --seed

kunjungi web di local : http://127.0.0.1:8000
