-- Création de la table des utilisateurs (Membres, Admins, Adoptants)
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `role` VARCHAR(20) DEFAULT 'membre',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Création de la table des chats à l'adoption
CREATE TABLE IF NOT EXISTS `cats` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL,
    `breed` VARCHAR(50) DEFAULT 'Gouttière',
    `age_months` INT NOT NULL,
    `status` VARCHAR(30) DEFAULT 'disponible',
    `description` TEXT,
    `image_url` VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insertion de quelques données de test rétro-stylées
INSERT INTO `users` (`username`, `email`, `password`, `role`) VALUES
('SophiePinUp', 'sophie@lapinuperie.fr', '$2y$10$xyz...', 'admin'),
('GuySudre', 'guy.sudre@francebenevolat.org', '$2y$10$abc...', 'admin'),
('JeanVisiteur', 'jean.dupont@gmail.com', '$2y$10$123...', 'membre');

INSERT INTO `cats` (`name`, `breed`, `age_months`, `status`, `description`, `image_url`) VALUES
('Elvis', 'Siamois', 24, 'disponible', 'Un vrai rocker qui adore les caresses et ronronne comme une Harley.', 'elvis.jpg'),
('Marilyn', 'Persan', 12, 'famille_accueil', 'Douce, élégante et un brin diva. Elle adore squatter les canapés en skaï.', 'marilyn.jpg'),
('Buddy', 'Européen', 6, 'adopté', 'Chonchon hyper actif, joueur et grand amateur de milkshakes (virtuels).', 'buddy.jpg');