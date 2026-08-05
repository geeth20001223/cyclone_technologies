-- PostgreSQL Dump for Supabase (Cyclone Technologies)

-- 1. Carts Table
CREATE TABLE IF NOT EXISTS carts (
    id BIGSERIAL PRIMARY KEY,
    user_id VARCHAR(255) DEFAULT NULL,
    name VARCHAR(255) DEFAULT NULL,
    email VARCHAR(255) DEFAULT NULL,
    phone VARCHAR(255) DEFAULT NULL,
    address VARCHAR(255) DEFAULT NULL,
    product_title VARCHAR(255) DEFAULT NULL,
    product_id VARCHAR(255) DEFAULT NULL,
    price VARCHAR(255) DEFAULT NULL,
    quantity VARCHAR(255) DEFAULT NULL,
    image VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

INSERT INTO carts (id, user_id, name, email, phone, address, product_title, product_id, price, quantity, image, created_at, updated_at) VALUES
(1, '2', 'Test User', 'test@gmail.com', '05368848023', 'Kabaoğlu, Prof. Baki Komşuoğlu Blv. CADDESİ D:No:518, 41000 İzmit/Kocaeli, Turkey', 'Macbook Pro', '1', '0', '1', '1721243123.jpg', '2024-07-17 16:05:41', '2024-07-17 16:05:41')
ON CONFLICT (id) DO NOTHING;

-- 2. Categories Table
CREATE TABLE IF NOT EXISTS categories (
    id BIGSERIAL PRIMARY KEY,
    category_name VARCHAR(255) NOT NULL,
    user_id BIGINT DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

INSERT INTO categories (id, category_name, created_at, updated_at) VALUES
(1, 'Minibook', '2024-07-17 16:03:04', '2024-07-17 16:03:04'),
(2, 'Laptop', '2024-07-17 16:03:08', '2024-07-17 16:03:08'),
(3, 'Notebook', '2024-07-17 16:03:12', '2024-07-17 16:03:12')
ON CONFLICT (id) DO NOTHING;

-- 3. Products Table
CREATE TABLE IF NOT EXISTS products (
    id BIGSERIAL PRIMARY KEY,
    user_id BIGINT DEFAULT NULL,
    title VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    quantity VARCHAR(255) NOT NULL,
    price VARCHAR(255) NOT NULL,
    discount_price VARCHAR(255) NOT NULL,
    screen_size VARCHAR(255) NOT NULL,
    screen_resolution VARCHAR(255) NOT NULL,
    screen_refresh_rate VARCHAR(255) NOT NULL,
    device_weight VARCHAR(255) NOT NULL,
    graphics_type VARCHAR(255) NOT NULL,
    graphics_card_memory VARCHAR(255) NOT NULL,
    ssd_capacity VARCHAR(255) NOT NULL,
    operating_system VARCHAR(255) NOT NULL,
    processor VARCHAR(255) NOT NULL,
    processor_generation VARCHAR(255) NOT NULL,
    processor_type VARCHAR(255) NOT NULL,
    processor_speed VARCHAR(255) NOT NULL,
    ram VARCHAR(255) NOT NULL,
    keyboard VARCHAR(255) NOT NULL,
    color VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

INSERT INTO products (id, title, image, category, quantity, price, discount_price, screen_size, screen_resolution, screen_refresh_rate, device_weight, graphics_type, graphics_card_memory, ssd_capacity, operating_system, processor, processor_generation, processor_type, processor_speed, ram, keyboard, color, created_at, updated_at) VALUES
(1, 'Macbook Pro', '1721243123.jpg', 'Minibook', '3', '120.90', '$999.99', '13 inches', '1920x1080', '60 Hz', '1-2 KG', 'Internal Graphics Card', '4GB', '250 GB', 'Windows 11 Home', 'Apple M2', 'Apple M1', 'Apple M2', '3.4GHz', '16GB', 'Q English', 'Grey', '2024-07-17 16:05:23', '2024-07-17 16:05:41')
ON CONFLICT (id) DO NOTHING;

-- 4. Users Table
CREATE TABLE IF NOT EXISTS users (
    id BIGSERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    phone VARCHAR(255) DEFAULT NULL,
    address VARCHAR(255) DEFAULT NULL,
    usertype VARCHAR(255) NOT NULL DEFAULT '0',
    email_verified_at TIMESTAMP NULL DEFAULT NULL,
    password VARCHAR(255) NOT NULL,
    two_factor_secret TEXT DEFAULT NULL,
    two_factor_recovery_codes TEXT DEFAULT NULL,
    two_factor_confirmed_at TIMESTAMP NULL DEFAULT NULL,
    remember_token VARCHAR(100) DEFAULT NULL,
    current_team_id BIGINT DEFAULT NULL,
    profile_photo_path VARCHAR(2048) DEFAULT NULL,
    reward_points INT DEFAULT 0,
    sms_verified_at TIMESTAMP NULL DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

INSERT INTO users (id, name, email, phone, address, usertype, email_verified_at, password, two_factor_secret, two_factor_recovery_codes, remember_token, created_at, updated_at) VALUES
(1, 'Test Name', 'nazirsharifi19@gmail.com', '0555555555', 'Kabaoğlu, Prof. Baki Komşuoğlu Blv. CADDESİ D:No:518, 41000 İzmit/Kocaeli, Turkey', '1', '2023-05-01 12:23:30', '$2y$10$bzaNiGiA3l5N7b.bqsSlFevOgmDhUY000Qjf8WTc/ljg3FJCXSB1y', 'test', 'test', 'eVJIOLPpShyPYXmPumWIQQemKFyBsPucqlE6hP22cuT9v53wWJVcLBiXw8FG', '2024-07-17 15:56:47', '2024-07-17 15:56:47'),
(2, 'Test User', 'test@gmail.com', '05367840293', 'Kabaoğlu, Prof. Baki Komşuoğlu Blv. CADDESİ D:No:518, 41000 İzmit/Kocaeli, Turkey', '0', '2023-05-02 12:30:22', '$2y$10$QFPiqMsL3aP1MFm.H6zZWuBSThKs8imoyTx0ri1rN1ByACM53Cbli', NULL, NULL, NULL, '2024-07-17 16:02:15', '2024-07-17 16:02:15')
ON CONFLICT (id) DO NOTHING;

-- 5. Orders Table
CREATE TABLE IF NOT EXISTS orders (
    id BIGSERIAL PRIMARY KEY,
    user_id VARCHAR(255) DEFAULT NULL,
    name VARCHAR(255) DEFAULT NULL,
    email VARCHAR(255) DEFAULT NULL,
    phone VARCHAR(255) DEFAULT NULL,
    address VARCHAR(255) DEFAULT NULL,
    product_title VARCHAR(255) DEFAULT NULL,
    product_id VARCHAR(255) DEFAULT NULL,
    price VARCHAR(255) DEFAULT NULL,
    quantity VARCHAR(255) DEFAULT NULL,
    image VARCHAR(255) DEFAULT NULL,
    tracking_id VARCHAR(255) DEFAULT NULL,
    delivery_status VARCHAR(50) DEFAULT NULL,
    payment_status VARCHAR(50) DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

-- 6. Messages Table
CREATE TABLE IF NOT EXISTS messages (
    id BIGSERIAL PRIMARY KEY,
    sender_id BIGINT NOT NULL,
    receiver_id BIGINT NOT NULL,
    product_id BIGINT DEFAULT NULL,
    message TEXT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

-- 7. Rewards Table
CREATE TABLE IF NOT EXISTS rewards (
    id BIGSERIAL PRIMARY KEY,
    user_id BIGINT NOT NULL,
    title VARCHAR(255) NOT NULL,
    points INT NOT NULL,
    status VARCHAR(50) DEFAULT 'claimed',
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

-- 8. Password Reset Tokens
CREATE TABLE IF NOT EXISTS password_reset_tokens (
    email VARCHAR(255) PRIMARY KEY,
    token VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL
);

-- 9. Sessions Table
CREATE TABLE IF NOT EXISTS sessions (
    id VARCHAR(255) PRIMARY KEY,
    user_id BIGINT DEFAULT NULL,
    ip_address VARCHAR(45) DEFAULT NULL,
    user_agent TEXT DEFAULT NULL,
    payload TEXT NOT NULL,
    last_activity INT NOT NULL
);

-- 10. Failed Jobs
CREATE TABLE IF NOT EXISTS failed_jobs (
    id BIGSERIAL PRIMARY KEY,
    uuid VARCHAR(255) UNIQUE NOT NULL,
    connection TEXT NOT NULL,
    queue TEXT NOT NULL,
    payload TEXT NOT NULL,
    exception TEXT NOT NULL,
    failed_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- 11. Personal Access Tokens
CREATE TABLE IF NOT EXISTS personal_access_tokens (
    id BIGSERIAL PRIMARY KEY,
    tokenable_type VARCHAR(255) NOT NULL,
    tokenable_id BIGINT NOT NULL,
    name VARCHAR(255) NOT NULL,
    token VARCHAR(64) UNIQUE NOT NULL,
    abilities TEXT DEFAULT NULL,
    last_used_at TIMESTAMP NULL DEFAULT NULL,
    expires_at TIMESTAMP NULL DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

-- 12. Migrations Table
CREATE TABLE IF NOT EXISTS migrations (
    id SERIAL PRIMARY KEY,
    migration VARCHAR(255) NOT NULL,
    batch INT NOT NULL
);

INSERT INTO migrations (id, migration, batch) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_04_23_203544_create_sessions_table', 1),
(7, '2023_05_01_112737_create_categories_table', 1),
(8, '2023_05_01_125620_create_products_table', 1),
(9, '2023_05_03_185136_create_carts_table', 1),
(10, '2023_05_04_102600_create_orders_table', 1)
ON CONFLICT (id) DO NOTHING;
