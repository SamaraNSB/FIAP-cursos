DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`)
VALUES (1, 'Admin', 'admin@example.com', '$2y$10$examplehashedpassword', NOW(), NOW());

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_id` bigint unsigned NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `turmas`;
CREATE TABLE `turmas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `turmas` (`nome`, `descricao`, `tipo`, `created_at`, `updated_at`) VALUES
('Turma A', 'Descrição da Turma A', 'Presencial', NOW(), NOW()),
('Turma B', 'Descrição da Turma B', 'Online', NOW(), NOW()),
('Turma C', 'Descrição da Turma C', 'Presencial', NOW(), NOW()),
('Turma D', 'Descrição da Turma D', 'Online', NOW(), NOW()),
('Turma E', 'Descrição da Turma E', 'Presencial', NOW(), NOW()),
('Turma F', 'Descrição da Turma F', 'Online', NOW(), NOW()),
('Turma G', 'Descrição da Turma G', 'Presencial', NOW(), NOW()),
('Turma H', 'Descrição da Turma H', 'Online', NOW(), NOW()),
('Turma I', 'Descrição da Turma I', 'Presencial', NOW(), NOW()),
('Turma J', 'Descrição da Turma J', 'Online', NOW(), NOW());

DROP TABLE IF EXISTS `alunos`;
CREATE TABLE `alunos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alunos_usuario_unique` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `alunos` (`nome`, `data_nascimento`, `usuario`, `created_at`, `updated_at`) VALUES
('João Silva', '2000-01-15', 'joaosilva', NOW(), NOW()),
('Maria Oliveira', '1999-05-30', 'mariaoliveira', NOW(), NOW()),
('Carlos Souza', '2001-08-22', 'carlossouza', NOW(), NOW()),
('Ana Pereira', '2000-11-10', 'anapereira', NOW(), NOW()),
('Pedro Costa', '1998-12-03', 'pedrocosta', NOW(), NOW());

DROP TABLE IF EXISTS `matriculas`;
CREATE TABLE `matriculas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `aluno_id` bigint unsigned NOT NULL,
  `turma_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `matriculas_aluno_id_foreign` (`aluno_id`),
  KEY `matriculas_turma_id_foreign` (`turma_id`),
  CONSTRAINT `matriculas_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `matriculas_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `matriculas` (`aluno_id`, `turma_id`, `created_at`, `updated_at`) VALUES
(1, 1, NOW(), NOW()),
(2, 1, NOW(), NOW()),
(3, 2, NOW(), NOW()),
(4, 3, NOW(), NOW()),
(5, 4, NOW(), NOW());
