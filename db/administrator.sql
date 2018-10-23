CREATE DATABASE administrator;

USE administrator;

CREATE TABLE employees(
				id_employee INT AUTO_INCREMENT,

				first_name VARCHAR(50),
				middle_name VARCHAR(50),
				last_name VARCHAR(50),
				id_number VARCHAR(50),
				email VARCHAR(50),
				current_address VARCHAR(80),
				date_birth DATE,
				birth_place VARCHAR(80),
				cellphone VARCHAR(20),
				telephone VARCHAR(20),
				gender VARCHAR(10),
				civil_status VARCHAR(20),
				nationality VARCHAR(20),

				created_by_user VARCHAR(20),
				updated_by_user VARCHAR(20),
				created_date DATETIME,
				updated_date DATETIME,

				PRIMARY KEY(id_employee)
					);

CREATE TABLE  profiles(
				id_profile INT AUTO_INCREMENT,

				id_user INT NOT NULL,
				id_employee INT NOT NULL,
				id_department INT NOT NULL,
				id_image INT NOT NULL,

				work_phone VARCHAR(20),
				work_email VARCHAR(50),
				hours_per_week INT (50),
				date_hired DATETIME,
				status VARCHAR (20),
				notes  VARCHAR (500),

				created_by_user VARCHAR(20),
				updated_by_user VARCHAR(20),
				created_date DATETIME,
				updated_date DATETIME,

				PRIMARY KEY(id_profile)
					);

CREATE TABLE  users(
				id_user INT AUTO_INCREMENT,
				id_employee INT NOT NULL,
				
				user_name VARCHAR(50),
				password VARCHAR(250),
				user_role VARCHAR(50),

				created_by_user VARCHAR(20),
				updated_by_user VARCHAR(20),
				created_date DATETIME,
				updated_date DATETIME,

				PRIMARY KEY(id_user)
					);

CREATE TABLE departments (
				id_department INT AUTO_INCREMENT,
				id_user INT NOT NULL,
				id_employee INT NOT NULL,

				name_department VARCHAR(150),

				created_by_user VARCHAR(20),
				updated_by_user VARCHAR(20),
				created_date DATETIME,
				updated_date DATETIME,

				PRIMARY KEY(id_department)
						);

CREATE TABLE   images(
				id_image INT AUTO_INCREMENT,
				id_employee INT NOT NULL,

				image_name VARCHAR(500),
				path VARCHAR(500),

				created_by_user VARCHAR(20),
				updated_by_user VARCHAR(20),
				created_date DATETIME,
				updated_date DATETIME,

				PRIMARY KEY(id_image)
					);
CREATE TABLE   salaries(
				id_salary INT (11),
				id_user INT NOT NULL,
				id_employee INT NOT NULL,


				salary INT (11),

				created_by_user VARCHAR(20),
				updated_by_user VARCHAR(20),
				created_date DATETIME,
				updated_date DATETIME,

				PRIMARY KEY(id_emp)
					);

CREATE TABLE   documents(
				id_document INT AUTO_INCREMENT,
				id_employee INT NOT NULL,

				document_name VARCHAR(500),
				path VARCHAR(500),

				created_by_user VARCHAR(20),
				updated_by_user VARCHAR(20),
				created_date DATETIME,
				updated_date DATETIME,

				PRIMARY KEY(id_document)
					);

CREATE TABLE   messages(
				id_message INT (11),
				id_user INT NOT NULL,
				id_employee INT NOT NULL,

				subject VARCHAR(50),
				message VARCHAR(1000),

				created_by_user VARCHAR(20),
				created_date DATETIME,

				PRIMARY KEY(id_message)
					);

CREATE TABLE   stats(
				id_stat INT (11),
				PRIMARY KEY(id_stat )
					);
