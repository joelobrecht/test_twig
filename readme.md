# Installation notes

# The system

As mattrayner info on DockerHub is out of date, go see [his github](https://github.com/mattrayner/docker-lamp). There one can see that his latest images are built on php8. Therefore the most suitable image is `latest-2004-php7`.

## Symfony environment installation

- `docker container run -d --name symfony_test -p "1246:80" -v /home/joel/Sync/Aliptic/symphony_test:/app mattrayner/lamp:latest-2004-php7`
- `docker exec it symfony_test bash` && `cd app`
- `apt install composer` && `composer self-update`
- Installing symfony-cli
  `echo 'deb [trusted=yes] https://repo.fury.io/symfony/ /' | sudo tee /etc/apt/sources.list.d/symfony-cli.list`
  `apt update`
  `apt install symfony`

# New Symfony project

`rm -rfd /app/*` : Emptying the directory
`symfony new -full .`
`git config --global user.email "joel.obrecht@gmail.com"`
`git config --global user.name "quatrecouleurs"`
`git init`
`git add .`
`git commit -m "Initial Commit"`

- Configuring the public folder
  `vim /etc/apache2/sites-available/000-default.conf`

```s
        DocumentRoot /var/www/html/public/
        <Directory /var/www/html/public/>
```

`a2enmod rewrite` (already set up by default)
`service apache2 reload` To point to `app/public`

# Configuring MySql

- In another terminal, do :
  `docker logs symfony_twig` To get admin / password for [http://localhost:1246/phpmyadmin] on top of the logs
  `docker exec symfony_twig mysql -uroot -e "create database symfony_twig"` To create the database

- Update the database connection file
  `cp .env .env.local` Set up for dev DB
  `vim .emv.local`
  ```s
  DATABASE_URL="mysql://admin:8qybqHsIUInk@127.0.0.1:3306/symfony_twig?serverVersion=5.7&charset=utf8mb4
  ```

# Install various tools

- `composer require --dev symfony/profiler-pack`
- `composer require --dev symfony/var-dumper`
- `composer require --dev symfony/apache-pack` Essential for routes to work.

# Install Nodejs / Yarn / Webpack / Encore

- `curl -fsSL https://deb.nodesource.com/setup_17.x | bash -`
- `apt update` && `apt install nodejs`
- `npm install --global yarn` && `yarn install`
- `composer require symfony/webpack-encore-bundle`
- `npm install -g npm@8.5.3` && `npm install`
- `yarn encore dev` Essential or "asset manifest file doesn't exist" Error

# Make a new controller

- Using Make plugin
- src/WorkersController.php
- Put the php worker retrieval code
- Sent the variable to twig
