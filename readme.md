<p align="center"><h3>Dolqun.Net Filghet</h3></p>

### Installation
Cloning project code
```
git clone https://github.com/oyghan/Dolqun.git
```

Copy .env file
```
cp .example.env .env
```

Migrate
```
php artisan migrate
```

Install composer dependency
```
composer install
```

Install frontend dependency
```
npm install || yarn
```



Nginx config
```
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```
