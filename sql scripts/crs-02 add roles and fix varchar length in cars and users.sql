-- add data into roles
INSERT INTO roles (name, description, created_at, is_active) 
VALUES('Admin', 'Super user', current_timestamp(), 1),
('Staff', 'Able to perform all staff tasks', current_timestamp(), 1),
('Customer', 'Customer of this system. Basic functions', current_timestamp(), 1);
