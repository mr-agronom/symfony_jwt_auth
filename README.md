# Symfony Docker

https://github.com/dunglas/symfony-docker

Назначить себя владельцем файлов проекта
```shell
docker compose run --rm php chown -R $(id -u):$(id -g) .
```

# Install

Если проблемы со сбросом кеша композера,
используем для смены прав на директорию var

```shell
sudo chown -R www-data:www-data var
```
И/Или
```shell
rm -rf var
```

# Symfony Flex 
https://symfony.ru/doc/current/quick_tour/flex_recipes.html

# Auth
https://symfony.com/bundles/LexikJWTAuthenticationBundle/current/index.html

https://github.com/markitosgv/JWTRefreshTokenBundle


