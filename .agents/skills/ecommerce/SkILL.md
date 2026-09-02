# E-commerce de plats ivoiriens

## Objectif

Développer une plateforme e-commerce spécialisée dans la vente et la commande de plats africains, avec un focus particulier sur la cuisine ivoirienne.

L'application doit offrir une expérience simple, moderne et fiable permettant au client de consulter les plats, personnaliser sa commande, choisir un mode de livraison ou de retrait et effectuer son paiement.

## Catalogue

Les produits principaux sont des plats et menus ivoiriens.

Exemples :

- Garba
- Attiéké
- Alloco
- Kedjenou
- Foutou
- Sauce graine
- Sauce arachide
- Poisson braisé
- Poulet braisé
- Riz
- Plats du jour
- Boissons
- Desserts

Chaque plat peut avoir :

- nom
- description
- image
- prix
- catégorie
- disponibilité
- temps de préparation
- statut actif/inactif

## Personnalisation des plats

Certains plats peuvent être personnalisés.

Exemples :

- choix de l'accompagnement
- choix de la protéine
- quantité
- suppléments
- boissons
- niveau de piment lorsque pertinent

Les options doivent être clairement présentées au client et leur coût doit être correctement ajouté au total.

## Panier

Le panier doit permettre au client de :

- ajouter un plat
- modifier la quantité
- modifier les options
- supprimer un article
- consulter le sous-total
- consulter les frais éventuels
- consulter le total

Les quantités doivent toujours être positives.

Les prix doivent être recalculés côté serveur.

## Disponibilité

Un plat peut être :

- disponible
- indisponible
- temporairement indisponible
- disponible uniquement à certaines heures ou certains jours

Un plat indisponible ne doit pas pouvoir être commandé.

## Commandes

Une commande doit conserver au minimum :

- client
- articles commandés
- quantités
- options choisies
- prix appliqué
- sous-total
- frais de livraison
- total
- mode de réception
- adresse de livraison si nécessaire
- statut de la commande
- statut du paiement
- date de création

Le prix enregistré dans une commande doit rester indépendant du prix actuel du catalogue.

## Statuts de commande

Utiliser des statuts explicites.

Exemple :

- en_attente
- confirmée
- en_preparation
- prête
- en_livraison
- livrée
- récupérée
- annulée

Une transition de statut doit être cohérente avec le processus réel de commande.

## Livraison

Le système doit pouvoir gérer :

- livraison à domicile
- retrait sur place

Pour une livraison :

- adresse
- zone
- frais de livraison
- informations complémentaires

Les frais de livraison doivent être calculés côté serveur.

Ne jamais faire confiance aux informations de prix ou de livraison envoyées par le navigateur.

## Paiement

Le système doit pouvoir évoluer vers plusieurs moyens de paiement.

Exemples :

- Mobile Money
- carte bancaire
- paiement à la livraison si activé
- paiement au retrait si activé

Une commande ne doit pas être considérée comme payée uniquement parce que le client indique avoir effectué le paiement.

Le paiement doit être confirmé par le système de paiement.

## Expérience client

L'expérience doit être simple et rapide :

1. Découvrir les plats.
2. Consulter les détails.
3. Personnaliser le plat.
4. Ajouter au panier.
5. Vérifier la commande.
6. Choisir livraison ou retrait.
7. Choisir le moyen de paiement.
8. Confirmer la commande.
9. Suivre son statut.

## Administration

L'administrateur doit pouvoir gérer :

- plats
- catégories
- prix
- options
- disponibilités
- commandes
- clients
- zones de livraison
- frais de livraison
- promotions

## Règles importantes

- Toujours valider les données côté serveur.
- Ne jamais faire confiance aux prix envoyés par le client.
- Recalculer les totaux côté serveur.
- Vérifier la disponibilité avant de confirmer une commande.
- Ne jamais supprimer les informations nécessaires à l'historique d'une commande.
- Éviter la duplication de logique métier.
- Garder les règles métier séparées de la présentation.
- Préserver l'intégrité des données.
- Concevoir le système pour pouvoir ajouter de nouveaux plats et de nouvelles fonctionnalités sans réécrire l'application.

## Principes de développement

Le projet doit rester :

- simple
- maintenable
- évolutif
- sécurisé
- responsive
- adapté aux utilisateurs ivoiriens

Ne pas ajouter une fonctionnalité complexe lorsqu'une solution simple suffit.