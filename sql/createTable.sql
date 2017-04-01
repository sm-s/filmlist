CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(50) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE films (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    year INT,
    director VARCHAR(150),
    genre VARCHAR(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    film_id INT NOT NULL,
    user_id INT NOT NULL,
    title VARCHAR(50),
    body VARCHAR(500),
    rating INT NOT NULL,
    created_at DATETIME,
    is_public TINYINT(1),
    FOREIGN KEY film_key (film_id) REFERENCES films(id),
    FOREIGN KEY user_key (user_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE roles_users (
    role_id INT NOT NULL,
    user_id INT NOT NULL,
    PRIMARY KEY (role_id, user_id),
    FOREIGN KEY role_key (role_id) REFERENCES roles(id),
    FOREIGN KEY user_key (user_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
