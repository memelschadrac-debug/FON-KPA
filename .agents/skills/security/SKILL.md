# Security — E-commerce de plats ivoiriens

## Objectif

Développer une application Laravel sécurisée et protéger les utilisateurs, les commandes, les données et les fonctionnalités d'administration.

## Principes fondamentaux

- Ne jamais faire confiance aux données provenant du navigateur.
- Toujours valider les données côté serveur.
- Utiliser les mécanismes de sécurité natifs de Laravel.
- Appliquer le principe du moindre privilège.
- Ne jamais exposer de données sensibles.
- Ne jamais désactiver une protection de sécurité pour résoudre rapidement une erreur.

## Authentification

- Utiliser les mécanismes d'authentification Laravel.
- Ne jamais stocker les mots de passe en clair.
- Ne jamais afficher ou enregistrer un mot de passe dans les logs.
- Utiliser une politique de mot de passe adaptée.
- Prévoir une gestion sécurisée des sessions.

## Autorisation

Les utilisateurs doivent uniquement pouvoir effectuer les actions auxquelles ils sont autorisés.

Exemples :

- Un client ne peut consulter que ses propres commandes.
- Un client ne peut pas modifier une commande appartenant à un autre client.
- Un client ne peut pas accéder à l'administration.
- Les actions sensibles de l'administration doivent être protégées par des autorisations appropriées.

Utiliser les Policies, Gates ou mécanismes d'autorisation Laravel lorsque nécessaire.

## Validation

Toutes les données provenant de l'utilisateur doivent être validées côté serveur.

Utiliser les Form Requests lorsque cela améliore la clarté et la maintenabilité.

Vérifier notamment :

- types
- formats
- longueurs
- quantités
- prix
- identifiants
- fichiers envoyés
- données de livraison

## Protection des prix

Ne jamais utiliser directement un prix envoyé par le navigateur.

Le serveur doit :

1. récupérer le produit depuis la base de données ;
2. récupérer son prix réel ;
3. vérifier sa disponibilité ;
4. calculer le montant ;
5. enregistrer le prix appliqué dans la commande.

## Panier et commandes

Avant de créer une commande :

- vérifier que les produits existent ;
- vérifier leur disponibilité ;
- vérifier les quantités ;
- recalculer les prix ;
- recalculer les frais ;
- recalculer le total ;
- vérifier les informations de livraison ;
- vérifier l'état du paiement lorsque nécessaire.

Ne jamais considérer les données du panier envoyées par le navigateur comme fiables.

## Paiement

Ne jamais considérer une commande comme payée uniquement parce que le navigateur indique que le paiement a réussi.

La confirmation doit provenir du système de paiement utilisé.

Ne jamais stocker inutilement :

- numéro complet de carte bancaire
- CVV
- informations d'authentification
- secrets de paiement

Les clés API et secrets doivent être stockés dans les variables d'environnement.

## Protection des formulaires

Utiliser les protections Laravel contre :

- CSRF
- XSS
- injection SQL
- requêtes non autorisées

Utiliser Eloquent ou le Query Builder avec des paramètres liés plutôt que de construire des requêtes SQL dangereuses avec des entrées utilisateur.

## Uploads

Les fichiers envoyés par les utilisateurs doivent être contrôlés.

Vérifier notamment :

- type
- extension
- taille
- emplacement de stockage

Ne jamais considérer le nom ou l'extension fournis par l'utilisateur comme fiables.

## Administration

Toutes les routes et actions d'administration doivent être protégées.

Un utilisateur normal ne doit jamais pouvoir accéder aux fonctionnalités administratives simplement en modifiant une URL.

Les actions sensibles doivent vérifier les permissions côté serveur.

## Données personnelles

Protéger les informations personnelles des clients :

- nom
- téléphone
- adresse
- email
- historique des commandes

Ne pas exposer ces informations dans les réponses API ou les pages qui n'en ont pas besoin.

## Logs

Ne jamais enregistrer dans les logs :

- mots de passe
- tokens secrets
- clés API
- données bancaires
- informations personnelles inutiles

Les erreurs doivent être enregistrées de manière utile sans exposer de données sensibles.

## Configuration

Les secrets doivent rester dans `.env`.

Ne jamais :

- commiter `.env`
- mettre une clé API directement dans le code
- exposer une clé secrète dans JavaScript
- partager des credentials dans le dépôt Git

## Avant chaque modification

Avant de modifier une fonctionnalité sensible :

1. Identifier les données manipulées.
2. Identifier les utilisateurs concernés.
3. Vérifier les permissions nécessaires.
4. Vérifier les validations.
5. Vérifier les risques de sécurité.
6. Tester les cas d'accès non autorisé.

## Principe final

La sécurité doit être appliquée côté serveur.

Une interface qui cache un bouton n'est pas une protection.

Toute autorisation importante doit être vérifiée par Laravel avant d'exécuter l'action.