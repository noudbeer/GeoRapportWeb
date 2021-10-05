# Installation
    php artisan migrate:fresh --seed
    #
    php artisan passport:keys
    #
    php artisan passport:client --password
        --> accepter les entrées proposés
    

# Mise à jour de la base de données
    php artisan migrate:fresh --seed
    #
    php artisan passport:client --password
    
# Déploiement sur O2Switch
1. aller dans la console o2switch
2. ouvrir le terminal
3. ``cd public_html/georapport``
4. ``git fetch``
5. si il y a des nouveautés sur la branche main : ``git pull``
6. mettre à jour la base de données si nécessaire 
