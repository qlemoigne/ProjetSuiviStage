# ProjetSuiviStage

## pour créer le projet (pas sur si utile hors de laragon)

installer php et extension zip

changer php.ini : décommenter extension=fileinfo

### commandes pour le terminal : 

composer update  

php artisan config:cache 

php artisan config:clear

composer dump-autoload -o

php artisan key:generate

php artisan make:model Test


## dossiers importants

app/Models : liste des modéles de nos différentes tables dans la base de données, sert à gérer les relations entre les tables (belongsTo, Has, ...)

database/migrations : sert à créer les tables de notre base de données avec les valeurs qui seront dedans. Pour lier une migration à un modele, la table doit avoir le nom de la classe du modele en minuscule et au pluriel (exemple le modéle Utilisateur se liera automatiquement à la table utilisateurs)

database/seeders : sert à remplir nos tables avec des valeurs pré-definies.

public/css : liste les fichiers css pouvant être appelé par les différentes vues

public/js : liste les fichiers javaScript pouvant être appelés par les vues

ressources/view/components/bladewind : ensemble des extensions de bladewind par exemple nous avons utilisé timeline.blade.php pour la frise de la vue de l'activité

ressources/view : ensemble des vues du projet, la vue template est celle de isis de base et templateSuivi sert à appeler les fichiers css et javaScript communs à toutes les vues. Toutes nos vues héritent de ces deux vues

routes/web.php : liste les routes pour rediriger les requêtes vers les controlleurs

