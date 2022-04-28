-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 09 déc. 2020 à 15:26
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `credit`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `IdClient` int(6) NOT NULL,
  `NomClient` varchar(40) NOT NULL,
  `PreClient` varchar(80) NOT NULL,
  `AdresseClient` varchar(400) NOT NULL,
  `TelClient` varchar(16) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`IdClient`, `NomClient`, `PreClient`, `AdresseClient`, `TelClient`, `created_at`, `updated_at`) VALUES
(1, 'LOGEX', 'LOGEX', 'LOGEX', '98989898', '2020-12-07 07:37:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `IdCommande` int(5) NOT NULL,
  `EtatCommande` varchar(15) NOT NULL,
  `PrixTotal` float NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(60) NOT NULL,
  `Telephone` varchar(16) NOT NULL,
  `Adresse` varchar(350) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`IdCommande`, `EtatCommande`, `PrixTotal`, `Nom`, `Prenom`, `Telephone`, `Adresse`, `created_at`, `updated_at`) VALUES
(3, 'passé', 2100, 'honore', 'DOMELEVE', '91650680', 'ADIDOGOME YOKOE', '2012-07-20 16:16:41', '2012-07-20 16:16:41'),
(4, 'passé', 50000, 'test', 'test', '91650680', 'test@test.com', '2012-08-20 09:55:15', '2012-08-20 09:55:15');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `IdLigne` int(5) NOT NULL,
  `QteProd` int(5) NOT NULL,
  `IdProduit` int(10) UNSIGNED NOT NULL,
  `IdCommande` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ligne_commande`
--

INSERT INTO `ligne_commande` (`IdLigne`, `QteProd`, `IdProduit`, `IdCommande`, `created_at`, `updated_at`) VALUES
(3, 2, 9, 3, '2012-07-20 16:16:41', '2012-07-20 16:16:41'),
(4, 1, 8, 3, '2012-07-20 16:16:41', '2012-07-20 16:16:41'),
(5, 1, 9, 4, '2012-08-20 09:55:15', '2012-08-20 09:55:15');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_10_01_075919_create_products_table', 1),
(4, '2020_12_05_233728_api', 2);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float NOT NULL,
  `echeance` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `IdClient` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `photo`, `price`, `echeance`, `created_at`, `updated_at`, `IdClient`) VALUES
(7, 'Canape moderne', 'Un produit exceptionnel qu\\\'il vous faut Ã  tout prix.\', ', 'canape moderne.png', 500000, 5, NULL, NULL, 1),
(8, 'Apple iPhone X', 'Un produit exceptionnel qu\\\'il vous faut Ã  tout prix.', 'Apple iPhone X.jpg', 120000, 3, NULL, NULL, 1),
(9, 'Lampe de table', 'Un produit exceptionnel qu\\\'il vous faut Ã  tout prix.\', ', 'lampe.png', 50000, 2, '0000-00-00 00:00:00', NULL, 1),
(10, 'LG V10 H900', 'Un produit exceptionnel qu\\\'il vous faut Ã  tout prix.', 'LG V10 H900.jpg', 90000, 4, NULL, NULL, 1),
(11, 'Canape capitonne', 'Canape capitonne jaune pour bureaux et chambres', 'canape.png', 300000, 5, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'honore DOMELEVE', 'yayra.domeleve@gmail.com', '$2y$10$54.jE9OVyo87K3.WMK8DGe.qqdgYclCvcakdxqXjYVGfFOGGJQN2e', NULL, 'exX1PGFbv8AktjbJ6EL5hV9hFBWrkwDHF08BIbTTZMuKYLPg4xW8WczkNFTG', '2020-12-05 23:48:08', '2020-12-05 23:48:08'),
(2, 'hono', 'hono@hono.com', '$2y$10$Ir0zbMQYQxkwAY/YES7axORGSzp1Joh1V0yrCnHnmoiHhPrpxc4He', NULL, NULL, '2020-12-08 17:42:22', '2020-12-08 17:42:22');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`IdClient`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`IdCommande`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`IdLigne`),
  ADD KEY `IdCommande` (`IdCommande`),
  ADD KEY `IdProduit` (`IdProduit`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IdClient` (`IdClient`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `IdClient` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `IdCommande` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `IdLigne` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD CONSTRAINT `ligne_commande_ibfk_1` FOREIGN KEY (`IdCommande`) REFERENCES `commande` (`IdCommande`),
  ADD CONSTRAINT `ligne_commande_ibfk_2` FOREIGN KEY (`IdProduit`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`IdClient`) REFERENCES `client` (`IdClient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
