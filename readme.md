
<p align="center" style="background:#007eff"><img src="http://dolqun.net/images/logo.png"></p>

</p>

## Installation
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

Nginx config
```
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```
