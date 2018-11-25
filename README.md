Installation Instruction

Makes a bare clone of the external repository in a local directory

git clone https://github.com/waseemd/developers-test

cd developers-test

Secondly do an installation using composer

composer install
After all dependencies are completely downloaded, copy .env.example to .env and generate key for the application

cp .env.example .env

php artisan key:generate

Dont forget to setting up an local database config inside .env. Then do a migration.


php artisan migrate --seed

Above command will do a migrating and seeding comand. Now serve the app and run locally.



php artisan serve
