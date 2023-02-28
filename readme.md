# Objectifs

```
- Ajouter la table Fournisseurs dans la base de données

- Utiliser le PDO à la place de mysqli

- Trier les fournisseurs
```

# Site Bibliothèque PDO

## Pour la partie backend :

Dans cette version il faut :

1. Utiliser la connexion en PDO
1. Remplacer les requêtes par des requêtes paramétrer.
1. Ajouter une table pour les fournisseurs (voir document joint)
1. Ajouter l’onglet Fournisseurs (comme livres) pour faire les actions suivantes :
   1. Lister les fournisseurs
   2. Insérer un fournisseur
   3. Lister les fournisseurs en fonction de :
      1. Raison Sociale
      2. Localité
      3. Pays

**Bonus** :

Ajouter, dans la table Users, un champ de rôle qui prend 2 valeurs (Admin et user).

Si l’utilisateur est un Admin, il doit avoir accès à tout.

Si l’utilisateur est un user, il a accès à la consultation et non à l’ajout, la modification et la suppression (livre et fournisseur).

## Pour la partie frontend :

### Maquettage

Vous devez créer les maquettes responsive des pages de votre application en adoptant une approche "Mobile First".

Les maquettes devront au minimum prendre en compte l'affichage sur mobile et desktop. Un plus serait de prendre en compte les tablettes.

### Intégration

Vous devrez ensuite passer à l'intégration de vos maquettes.

- Votre HTML devra être valide (W3C) et faire usage des balises sémantiques (pas de balises <table> pour la mise en forme de vos formulaires, elles sont spécifiquement dédiées à l'affichage de données).

- Pour la partie CSS, vous pouvez écrire votre propre CSS et / ou utiliser une librairie de votre choix, c'est l'occasion pour vous d'explorer et de découvrir.

### Javascript

- Vous devrez implémenter une validation front des formulaires de saisie de votre application, à la fois au niveau du HTML et du Javascript.

  - Utilisez les types et les attributs HTML pertinents pour les inputs.

  - Ajoutez une validation javascript interdisant la soumission du formulaire si les contraintes ne sont pas satisfaites.

#### **_Contraintes de validation_**

Les inputs suivants ne peuvent pas être vides, doivent avoir une longueur minimum de 2 caractères et une longueur max de 30 caractères :

- prénom user
- nom user
- titre livre
- prénom auteur
- nom auteur

L'email de l'utilisateur ne peut pas être vide et doit respecter le format email.

Le mot de passe doit avoir une longueur minimum de 8 caractères.

> ⚠️ Rappel, si une de ces contraintes n'est pas satisfaite pour un formulaire donné, celui-ci ne pourra pas être soumis.⚠️

### Bonus Track

Grâce au N° **ISBN** d'un livre, récupérez dynamiquement les détails du livre ainsi que son image de couverture grâce à un appel AJAX vers l'API OpenLibrary.

Les informations sur le livre sélectionné seront affichées dynamiquement sur votre page grâce au click sur un bouton qui permettra de les visualiser.

L'API OpenLibrary ne nécessite pas d'authentification et supporte CORS.

Endpoint API ISBN : [https://openlibrary.org/isbn/{ISBN_NUMBER}.json](https://openlibrary.org/isbn/{ISBN_NUMBER}.json)

Endpoint Covers API : [https://covers.openlibrary.org/b/id/{COVER_ID}.json](https://covers.openlibrary.org/b/id/{COVER_ID}.json)

Docs :

- ISBN : [https://openlibrary.org/dev/docs/api/books](https://openlibrary.org/dev/docs/api/books)
- Covers : [https://openlibrary.org/dev/docs/api/covers](https://openlibrary.org/dev/docs/api/covers)
