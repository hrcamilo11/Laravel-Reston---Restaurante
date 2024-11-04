-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         PostgreSQL
-- SO del servidor:              Win64
-- --------------------------------------------------------

-- Volcando estructura de base de datos para laravel
CREATE DATABASE restaurante_lv06;

\c restaurante_lv06; -- Cambiar a la base de datos laravel

-- Volcando estructura para tabla laravel.comments
CREATE TABLE IF NOT EXISTS comments (
  id BIGSERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  message TEXT NOT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL
);

-- Volcando estructura para tabla laravel.failed_jobs
CREATE TABLE IF NOT EXISTS failed_jobs (
  id BIGSERIAL PRIMARY KEY,
  uuid VARCHAR(255) NOT NULL UNIQUE,
  connection TEXT NOT NULL,
  queue TEXT NOT NULL,
  payload TEXT NOT NULL,
  exception TEXT NOT NULL,
  failed_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Volcando estructura para tabla laravel.migrations
CREATE TABLE IF NOT EXISTS migrations (
  id SERIAL PRIMARY KEY,
  migration VARCHAR(255) NOT NULL,
  batch INT NOT NULL
);

-- Volcando datos para la tabla laravel.migrations
INSERT INTO migrations (id, migration, batch) VALUES
  (13, '2014_10_12_000000_create_users_table', 1),
  (14, '2014_10_12_100000_create_password_reset_tokens_table', 1),
  (15, '2019_08_19_000000_create_failed_jobs_table', 1),
  (16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
  (17, '2024_10_04_120857_create_tasks_table', 1),
  (18, '2024_10_09_221650_create_comments_table', 1),
  (19, '2024_10_10_013214_create_products_table', 2),
  (20, '2024_10_10_020103_rename_products_to_productos', 2),
  (21, '2024_10_11_010709_add_image_to_productos_table', 2),
  (22, '2024_10_11_021201_create_permission_tables', 2),
  (23, '2024_10_11_021811_add_columns_to_permissions_table', 2),
  (24, '2024_10_11_053221_create_role_user_table', 2),
  (25, '2024_10_28_043039_add_photo_to_users_table', 2);

-- Volcando estructura para tabla laravel.model_has_permissions
CREATE TABLE IF NOT EXISTS model_has_permissions (
  permission_id BIGINT NOT NULL,
  model_type VARCHAR(255) NOT NULL,
  model_id BIGINT NOT NULL,
  PRIMARY KEY (permission_id, model_id, model_type),
  FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE
);

-- Volcando estructura para tabla laravel.model_has_roles
CREATE TABLE IF NOT EXISTS model_has_roles (
  role_id BIGINT NOT NULL,
  model_type VARCHAR(255) NOT NULL,
  model_id BIGINT NOT NULL,
  PRIMARY KEY (role_id, model_id, model_type),
  FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
);

-- Volcando estructura para tabla laravel.password_reset_tokens
CREATE TABLE IF NOT EXISTS password_reset_tokens (
  email VARCHAR(255) NOT NULL PRIMARY KEY,
  token VARCHAR(255) NOT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL
);

-- Volcando estructura para tabla laravel.permissions
CREATE TABLE IF NOT EXISTS permissions (
  id BIGSERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  guard_name VARCHAR(255) NOT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  UNIQUE (name, guard_name)
);

-- Volcando estructura para tabla laravel.personal_access_tokens
CREATE TABLE IF NOT EXISTS personal_access_tokens (
  id BIGSERIAL PRIMARY KEY,
  tokenable_type VARCHAR(255) NOT NULL,
  tokenable_id BIGINT NOT NULL,
  name VARCHAR(255) NOT NULL,
  token VARCHAR(64) NOT NULL UNIQUE,
  abilities TEXT,
  last_used_at TIMESTAMP NULL DEFAULT NULL,
  expires_at TIMESTAMP NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL
);

-- Volcando estructura para tabla laravel.productos
CREATE TABLE IF NOT EXISTS productos (
  id BIGSERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  price DECIMAL(8,2) NOT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  image VARCHAR(255) DEFAULT NULL
);

-- Volcando datos para la tabla laravel.productos
INSERT INTO productos (id, name, description, price, created_at, updated_at, image) VALUES
  (15, 'hamburguesa', 'dfgdsad', 50000.00, '2024-10-29 07:34:21', '2024-10-29 07:34:39', 'images/about-img.png'),
  (16, 'prueba', 'asfdgfhgfgf', 24000.00, '2024-10-29 16:40:53', '2024-10-29 16:40:53', 'images/f2.png');

-- Volcando estructura para tabla laravel.roles
CREATE TABLE IF NOT EXISTS roles (
  id BIGSERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  guard_name VARCHAR(255) NOT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  UNIQUE (name, guard_name)
);

-- Volcando estructura para tabla laravel.role_has_permissions
CREATE TABLE IF NOT EXISTS role_has_permissions (
  permission_id BIGINT NOT NULL,
  role_id BIGINT NOT NULL,
  PRIMARY KEY (permission_id, role_id),
  FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE,
  FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
);

-- Volcando estructura para tabla laravel.role_user
CREATE TABLE IF NOT EXISTS role_user (
  id BIGSERIAL PRIMARY KEY,
  user_id BIGINT NOT NULL,
  role_id BIGINT NOT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Volcando estructura para tabla laravel.tasks
CREATE TABLE IF NOT EXISTS tasks (
  id BIGSERIAL PRIMARY KEY,
  tittle VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  due_date TIMESTAMP NULL DEFAULT NULL,
  status VARCHAR(20) NOT NULL DEFAULT 'Pendiente',
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL
);

-- Volcando estructura para tabla laravel.users
CREATE TABLE IF NOT EXISTS users (
  id BIGSERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  email_verified_at TIMESTAMP NULL DEFAULT NULL,
  password VARCHAR(255) NOT NULL,
  remember_token VARCHAR(100) DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  photo VARCHAR(255) DEFAULT NULL
);

-- Volcando datos para la tabla laravel.users
INSERT INTO users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at, photo) VALUES
  (1, 'andres', 'andres@ejemplo.com', NULL, '$2y$12$j/nZINwyXOJGL0yVW7aYRetoAFfg6GROWTR6WHvWRMK9WSj/sX9la', NULL, '2024-10-28 09:37:25', '2024-10-28 09:56:43', 'images/1730091403.jpg'),
  (2, 'administrador', 'admin@admin.com', NULL, '$2y$12$9ZeOINPtMYSUkjWKA0c.iOtV.5zTY8TBXC39P41yeHoZx3RGLi6HW', NULL, '2024-10-28 09:39:19', '2024-10-28 09:39:19', NULL),
  (3, 'editor', 'editor@editor.com', NULL, '$2y$12$Wn8rD6kJCnq/9gwpzpDHUum3FdbJ4IdLtgDpAbhuR.pxlon9CvJVK', NULL, '2024-10-28 09:42:11', '2024-10-28 09:42:11', NULL),
  (4, 'oscar', 'oscar@gmail.com', NULL, '$2y$12$QdYXsDCVsDf3RVp27HXBUeZmSVAao/hQXcje.Sb7wEES1BiwuUDEW', NULL, '2024-10-28 10:02:00', '2024-10-28 10:25:28', 'images/1730093128.jpg'),
  (5, 'prueba', 'prueba@gmail.com', NULL, '$2y$12$1cTMmKEVdUJKs8ChQ1b9Y.0i3TpAm9mHQScB7RrL6u/ay8/JoM3Ey', NULL, '2024-10-28 10:33:00', '2024-10-28 10:33:00', NULL);