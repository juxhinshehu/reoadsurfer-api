## Installation manual

### git clone https://github.com/juxhinshehu/reoadsurfer-api.git
### composer update

### configure `DATABASE_URL` field in .env

### If you are using mysql make sure that `extension=pdo_mysql` in php.ini is not commented 

### migrate the db

### seed the db with dummy data `php bin/console doctrine:fixtures:load`
