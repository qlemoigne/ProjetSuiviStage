# ProjetSuiviStage
Projet Suivi Stage
Baptiste SENECLAUZE, Robin BUKIELSKI, Daniel DI

installer php et extension zip
changer php.ini : décommenter extension=fileinfo
composer update  
php artisan config:cache 
php artisan config:clear
composer dump-autoload -o
php artisan key:generate
php artisan make:model Test

créer une factory : php artisan make:factory 'nom du modele' --model='nom du modele'
génerer 10 enregistrements aléatoires : App\Models\'nom du modele'::factory()->count(10)->create();  