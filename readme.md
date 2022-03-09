# Installation notes

# The system

As mattrayner info on DockerHub is out of date, go see [his github](https://github.com/mattrayner/docker-lamp). There one can see that his latest images are built on php8. Therefore the most suitable image is `latest-2004-php7`.

## Symfony environment installation

- `docker container run -d --name symfony_test -p "1246:80" -v /home/joel/Sync/Aliptic/symphony_test:/app mattrayner/lamp:latest-2004-php7`
- `docker exec it symfony_test bash` && `cd app`
- `apt install composer` && `composer self-update`
-
