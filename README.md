# How to run

Once installed the composer https://getcomposer.org/download/ and symfony CLI https://symfony.com/download runs the
following commands:

```bash
composer install
bin/console doctrine:migrations:migrate -n
bin/console doctrine:fixtures:load -n
symfony serve
```
