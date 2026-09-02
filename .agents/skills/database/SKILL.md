# Database — E-commerce de plats ivoiriens

## Objectif

Concevoir et maintenir une base de données fiable, cohérente, sécurisée et évolutive pour une plateforme de commande de plats ivoiriens.

## Principes

- Respecter les conventions Laravel et MySQL.
- Utiliser les migrations Laravel pour toute modification de structure.
- Éviter la duplication inutile des données.
- Utiliser des relations et clés étrangères cohérentes.
- Choisir des types de données adaptés.
- Ajouter des index lorsque cela améliore réellement les performances.
- Préserver l'intégrité des données.

## Conception

Avant de créer ou modifier une table :

1. Comprendre le besoin métier.
2. Identifier les entités concernées.
3. Identifier leurs relations.
4. Déterminer les contraintes nécessaires.
5. Vérifier l'impact sur les données existantes.

Ne pas créer de tables ou de colonnes sans raison fonctionnelle.

## Produits

Les données liées aux plats doivent pouvoir gérer notamment :

- nom
- description
- prix
- image
- disponibilité
- catégorie
- temps de préparation
- statut

La structure doit pouvoir évoluer pour supporter les options, suppléments et variantes lorsque nécessaire.

## Catégories

Les catégories doivent permettre d'organiser les plats.

Exemples :

- Plats ivoiriens
- Grillades
- Accompagnements
- Boissons
- Desserts
- Menus

La structure doit permettre d'ajouter de nouvelles catégories sans modifier le code.

## Commandes

Une commande doit conserver un historique fiable.

Les informations importantes au moment de l'achat doivent être conservées même si le produit change ultérieurement.

Notamment :

- produit commandé
- quantité
- prix appliqué
- options choisies
- total
- statut
- informations de livraison
- informations de paiement

## Prix

Ne pas utiliser le prix actuel du produit pour recalculer une ancienne commande.

Le prix appliqué au moment de la commande doit être enregistré dans les données de commande.

## Utilisateurs et adresses

Un utilisateur peut avoir plusieurs adresses.

Les informations d'une commande passée doivent rester cohérentes même si l'utilisateur modifie son adresse par la suite.

## Livraison

La structure doit pouvoir gérer :

- livraison
- retrait sur place
- zones de livraison
- frais de livraison
- statut de livraison
- adresse de livraison

## Paiements

Les informations de paiement doivent être séparées des informations générales de commande lorsque cela est pertinent.

Ne jamais stocker de données bancaires sensibles directement dans la base de données sans nécessité et sans mécanisme sécurisé approprié.

## Relations

Utiliser des relations cohérentes entre les entités.

Exemples :

- une catégorie possède plusieurs produits
- un utilisateur possède plusieurs commandes
- une commande possède plusieurs articles
- un produit peut apparaître dans plusieurs commandes
- un utilisateur peut posséder plusieurs adresses

Les relations doivent être représentées correctement avec les clés étrangères.

## Migrations

Toute modification de structure doit passer par une migration Laravel.

Éviter les modifications manuelles de la base de données qui ne sont pas reproduites dans les migrations.

Les migrations doivent être :

- compréhensibles
- ordonnées
- réversibles lorsque possible
- cohérentes avec les modèles Laravel

## Performance

Optimiser les requêtes lorsque nécessaire.

Utiliser :

- index
- eager loading
- pagination
- requêtes ciblées

Éviter les requêtes inutiles et les problèmes N+1.

Ne pas ajouter des index sans raison.

## Intégrité

Utiliser les contraintes adaptées :

- NOT NULL lorsque nécessaire
- UNIQUE lorsque nécessaire
- clés étrangères
- contraintes de suppression cohérentes

Une suppression en cascade ne doit être utilisée que lorsqu'elle correspond réellement à la logique métier.

## Sécurité

- Ne jamais stocker de mots de passe en clair.
- Ne jamais stocker de données sensibles inutilement.
- Valider les données avant insertion.
- Ne jamais faire confiance aux données provenant du navigateur.
- Utiliser les mécanismes de sécurité Laravel.

## Principe important

Avant de modifier la base de données, analyser les modèles, migrations et relations existantes afin d'éviter de casser les fonctionnalités déjà présentes.

Privilégier une architecture simple, normalisée et évolutive plutôt qu'une structure inutilement complexe.