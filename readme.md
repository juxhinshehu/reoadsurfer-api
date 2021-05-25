## Installation manual

### git clone https://github.com/juxhinshehu/reoadsurfer-api.git
### composer update

### configure `DATABASE_URL` field in .env

### php bin/console doctrine:schema:create
### php bin/console make:migration
### php bin/console doctrine:migrations:migrate

### php bin/console doctrine:fixtures:load
