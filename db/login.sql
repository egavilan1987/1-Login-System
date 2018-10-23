CREATE DATABASE login;

USE login;

CREATE TABLE users(
				id_user INT AUTO_INCREMENT,
				
				email VARCHAR(50),
				password VARCHAR(250),
				first_name VARCHAR(50),
				last_name VARCHAR(50),			

				created_date DATETIME,

				PRIMARY KEY(id_user)
					);
