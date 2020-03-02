-- add data into roles
INSERT INTO roles (name, description, created_at, is_active) 
VALUES('Admin', 'Super user', now(), 1),
('Staff', 'Able to perform all staff tasks', now(), 1),
('Customer', 'Basic functions', now(), 1);
