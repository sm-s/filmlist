ALTER TABLE roles AUTO_INCREMENT = 1;
INSERT INTO roles (description) VALUES ("Admin");
INSERT INTO roles (description) VALUES ("Data admin");
INSERT INTO roles (description) VALUES ("Moderator");
INSERT INTO roles (description) VALUES ("Film reviewer");




INSERT INTO roles_users (role_id, user_id) VALUES (1,2);