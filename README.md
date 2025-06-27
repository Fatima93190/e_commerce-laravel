# Cloner le dépôt
```
https://github.com/Fatima93190/e_commerce-laravel.git e_commerce-laravel
cd e_commerce-laravel
```

# Installer les dépendances PHP
```
composer install
```

# Copier le fichier d'exemple d'environnement et le configurer
```
cp .env.example .env
```

# Générer la clé d'application
```
php artisan key:generate
```

# Configurer la base de données dans le fichier .env, puis lancer les migrations
```
php artisan migrate
```

# (Optionnel) Ajouter des données de test avec les seeders
```
php artisan db:seed
```

# Lancer le serveur local
```
php artisan serve
```
