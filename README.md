# 🎓 Student Manager

<p align="center">
  <img src="public/images/logo-sm.png.png" width="120" alt="Student Manager">
</p>

<h3 align="center">
Application web de gestion des étudiants et des filières
</h3>

<p align="center">

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql)
![Git](https://img.shields.io/badge/Git-Version_Control-F05032?style=for-the-badge&logo=git)
![GitHub](https://img.shields.io/badge/GitHub-Repository-181717?style=for-the-badge&logo=github)

</p>

---

## 📋 Sommaire

- [Présentation](#-présentation)
- [Fonctionnalités](#-fonctionnalités)
- [Technologies utilisées](#️-technologies-utilisées)
- [Architecture du projet](#-architecture-du-projet)
- [Modèle de données](#-modèle-de-données)
- [Aperçu de l'application](#-aperçu-de-lapplication)
- [Installation](#-installation)
- [Compétences développées](#-compétences-développées)
- [Développeuse](#-développeuse)

---

# 📌 Présentation

**Student Manager** est une application web développée avec **Laravel** permettant la gestion des étudiants et des filières dans un établissement.

Ce projet a été réalisé dans le cadre de ma formation en **Génie Logiciel** afin de mettre en pratique le développement d'une application complète avec Laravel.

L'application utilise l'architecture **MVC (Model View Controller)** et une base de données MySQL.

Les concepts mis en pratique sont :

- l'architecture MVC ;
- les modèles et relations Eloquent ;
- les migrations Laravel ;
- les contrôleurs ;
- les vues Blade ;
- la gestion d'une base de données relationnelle.

---

# ✨ Fonctionnalités

## 👨‍🎓 Gestion des étudiants

L'application permet :

- ✅ Ajouter un étudiant ;
- ✅ Afficher la liste des étudiants ;
- ✅ Supprimer un étudiant ;
- ✅ Rechercher des étudiants selon plusieurs critères :
  - 🔎 nom ;
  - 📧 email ;
  - 📚 filière ;
  - 📅 intervalle de dates de naissance ;
- ✅ Afficher les résultats avec pagination.

---

## 📚 Gestion des filières

L'application permet :

- ✅ Ajouter une filière ;
- ✅ Afficher les filières disponibles ;
- ✅ Supprimer une filière lorsqu'elle ne contient aucun étudiant ;
- ✅ Gérer la relation entre une filière et ses étudiants.

---

# 🛠️ Technologies utilisées

| Technologie | Utilisation |
|---|---|
| Laravel 12 | Framework Backend PHP |
| PHP 8.2 | Langage de programmation |
| MySQL | Base de données |
| Blade | Moteur de templates Laravel |
| HTML5 | Structure des pages |
| CSS3 | Mise en forme |
| Bootstrap | Interface utilisateur |
| Git / GitHub | Gestion de versions |

---

# 🏗️ Architecture du projet

```
student-manager
│
├── app
│   ├── Http
│   │   └── Controllers
│   └── Models
│
├── database
│   └── migrations
│
├── resources
│   └── views
│
├── routes
│   └── web.php
│
└── public
```

---

# 🗄️ Modèle de données

L'application repose principalement sur deux entités :

## 📚 Filière

Une filière peut contenir plusieurs étudiants.

## 👨‍🎓 Étudiant

Un étudiant appartient à une seule filière.

Relation :

```
Filière (1)  ----------------  (N) Étudiants
```

Cette relation est gérée avec les relations **Eloquent Laravel**.

---

# 📸 Aperçu de l'application

## 🏠 Accueil

<p align="center">
<img src="screenshots/accueil.png" width="85%">
</p>

---

## 👨‍🎓 Gestion des étudiants

La gestion des étudiants comprend :

- l'ajout d'étudiants ;
- l'affichage des étudiants ;
- la suppression ;
- la recherche multicritère :
  - par nom ;
  - par email ;
  - par filière ;
  - par date.

<p align="center">
<img src="screenshots/gestion-etudiants.png" width="85%">
</p>

---

## 📚 Gestion des filières

La gestion des filières permet :

- l'ajout ;
- l'affichage ;
- la suppression des filières.

<p align="center">
<img src="screenshots/gestion-filieres.png" width="85%">
</p>

---

# 🚀 Installation

## 1. Cloner le projet

```bash
git clone https://github.com/Fatou03/student-manager.git
```

## 2. Accéder au dossier

```bash
cd student-manager
```

## 3. Installer les dépendances

```bash
composer install
```

## 4. Configurer l'environnement

Créer le fichier `.env` :

```bash
cp .env.example .env
```

Configurer la base de données :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=student_manager
DB_USERNAME=root
DB_PASSWORD=
```

> Si votre serveur MySQL utilise un autre port (par exemple 3307 avec XAMPP), modifiez la valeur de `DB_PORT`.

---

## 5. Générer la clé Laravel

```bash
php artisan key:generate
```

---

## 6. Exécuter les migrations

```bash
php artisan migrate
```

---

## 7. Lancer l'application

```bash
php artisan serve
```

---

# 🎯 Compétences développées

✅ Développement Backend avec Laravel  
✅ Architecture MVC  
✅ Création d'une application CRUD complète  
✅ Relations Eloquent (One To Many)  
✅ Gestion MySQL avec Laravel  
✅ Validation des formulaires  
✅ Recherche multicritère  
✅ Pagination  
✅ Utilisation de Git et GitHub  

---

# 👩‍💻 Développeuse

## Fatou Wade

🎓 Étudiante en Génie Logiciel  
💻 Développement Web & Mobile

Compétences :

- Laravel / PHP
- Java
- Flutter
- MySQL
- Git / GitHub

GitHub :
https://github.com/Fatou03

---

<p align="center">
⭐ Merci d'avoir visité ce projet !
</p>
