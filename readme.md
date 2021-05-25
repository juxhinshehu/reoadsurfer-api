### Installation manual

1. get from github
2. composer update
 php bin/console doctrine:database:create
php bin/console make:entity

3. php bin/console make:migration
4. php bin/console doctrine:migrations:migrate

php bin/console doctrine:fixtures:load