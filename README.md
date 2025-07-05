🛍️ Site E‑commerce Symfony

Un site e-commerce complet développé avec Symfony, structuré selon les meilleures pratiques, avec gestion des produits, utilisateurs, commandes et paiement.

🚀 Fonctionnalités

	•	Gestion des produits (CRUD) avec catégories, filtres, pagination
	•	Authentification & autorisation via Symfony Security (form login, rôles USER/ADMIN)
	•	Panier et commandes :
	•	Ajout/suppression de produits dans le panier
	•	Finalisation de la commande avec calcul du total, suivi de l’état
	•	Paiement en ligne (Stripe)
	•	Administration : interface pour gérer les produits, commandes et utilisateurs
	•	Gestion des utilisateurs : inscription, profil, historique commandes
	•	Validation formulaire avec Symfony Validator
	•	Sécurité : CSRF, validation, contrôle d’accès, gestion d’erreure
	•	Envoyer d’emails : confirmation de commande, réinitialisation de mot de passe
	•	Tests fonctionnels avec Symfony Panther ou PHPUnit

🛠️ Technologies

Technologie	Usage
Symfony Framework MVC PHP
Twig	Templates frontend
Doctrine ORM	Gestion de la base de données
Security Component	Authentification, rôles, protection
Stripe pour le Paiement en ligne
Validator en symfony	Validation des formulaires
Mailer	Envoi d’emails
PHPUnit/Panther	Tests unitaires et fonctionnels
