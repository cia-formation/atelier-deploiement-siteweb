
## Presentation du projet et configurationn en local

### 🎯 Objectif

* Créer un formulaire HTML de contact avec Bootstrap 5.
* Envoyer les données en **POST** vers un script PHP.
* Stocker ces données dans une base de données **MySQL**.
* Afficher la liste des enregistrements sous forme de tableau Bootstrap.


### Outils utilisés
* PHP ≥ 7.4 installé
* Serveur local : XAMPP / MAMP / WAMP ou Apache+MySQL+PHP
* Navigateur Web
* Logiciel de gestion de base de données : **phpMyAdmin** ou MySQL CLI

### 📑 Étapes du projet

#### 1️⃣ Création de la base de données et de la table

Dans **phpMyAdmin** ou via la console MySQL, exécutez :

```sql
CREATE DATABASE atelier_contacts CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE atelier_contacts;

CREATE TABLE contacts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    phone_number VARCHAR(50),
    email VARCHAR(255),
    country VARCHAR(50),
    message TEXT,
    service_customer BOOLEAN,
    service_marchand BOOLEAN,
    service_retailer BOOLEAN,
    service_delivery BOOLEAN,
    notify BOOLEAN,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

#### 2️⃣ Insertion de données par défaut

Ajoutez des enregistrements de test avec :

```sql
INSERT INTO contacts (name, phone_number, email, country, message, service_customer, service_marchand, service_retailer, service_delivery, notify)
VALUES
('Jean-Claude Mba', '695123456', 'jcmba@example.cm', 'cmr', 'Je suis intéressé par les coupons.', 1, 0, 0, 0, 1),
('Agnès Ndongo', '678987654', 'agnes.ndongo@example.cm', 'cmr', 'Je souhaite une boutique en ligne.', 0, 1, 0, 0, 1);
```

---

#### 3️⃣ Intégration du formulaire HTML

Dans un fichier `index.html`, insérez le formulaire Bootstrap 5 fourni.

---

#### 4️⃣ Création du fichier PHP `admin/index.php`

Ce fichier :

* Récupère les données du formulaire via `$_POST`
* Se connecte à MySQL
* Insère les données dans la table
* Affiche un tableau Bootstrap des enregistrements existants

---

#### 5️⃣ Test de l’application

1. Ouvrez `index.html` dans le navigateur.
2. Remplissez le formulaire et soumettez.
3. Le script PHP ajoute les données et affiche la liste.

---

### 📂 Structure du dossier

```
/atelier-contact/
│
├── index.html
├── action.php
├── config.php   (optionnel : pour gérer la connexion à la BDD)
└── README.md
```

---

### 📌 Notes complémentaires

* Le formulaire utilise `method="POST"` et `action="admin/index.php"`
* La connexion MySQL utilise `PDO` ou `mysqli`
* Les données sont sécurisées via `htmlspecialchars()` (pour éviter les injections simples)

---

### ✨ Bonus

Possibilités d’amélioration :

* Validation côté serveur (vérification des emails, numéros…)
* Ajout d’un champ `created_at`
* Ajout de pagination sur le tableau d’affichage

---

### 👨‍🏫 Réalisé par : \[Ton nom ou pseudo]

**CIA Formation** — Atelier PHP / MySQL / Bootstrap

---

Veux-tu que je te génère aussi les fichiers PHP (`config.php`, `action.php`) prêts à copier-coller ? Je peux te faire ça en deux minutes 👌
