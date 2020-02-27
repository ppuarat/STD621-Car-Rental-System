-- add data into roles
INSERT INTO roles (name, description, created_at, is_active) 
VALUES('Admin', 'Super user', now(), 1),
('Staff', 'Able to perform all staff tasks', now(), 1),
('Customer', 'Basic functions', now(), 1);

-- change size of varchar in users
ALTER table users MODIFY COLUMN address varchar(255);
ALTER TABLE users MODIFY COLUMN email varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
ALTER TABLE users MODIFY COLUMN first_name varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL NULL;
ALTER TABLE users MODIFY COLUMN last_name varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL NULL;

-- change size of varchar in cars
ALTER TABLE cars MODIFY COLUMN detail varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL NULL;
ALTER TABLE cars MODIFY COLUMN brand varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL NULL;
ALTER TABLE cars MODIFY COLUMN model varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL NULL;
