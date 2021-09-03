# Les Nuits Chromatiques

## Installer le projet (Symfony)

### 1. Récupérer le projet
```
git clone git@github.com:O-clock-Trinity/projet-les-nuits-chromatiques.git
```

### 2. Changer de branche
```
git checkout back
```

### 3. Installer les dépendances
```
composer install
```

### 4. Créer un fichier .env.local
```
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/lnc"
```

### 5. Créer la base de données
```
bin/console d:d:c
```

### 6. Exécuter la ou les migration(s) dans la bdd
```
bin/console d:m:m  
+ yes à la question
```
### 7. Charger les fixtures
```
bin/console d:f:l -n
