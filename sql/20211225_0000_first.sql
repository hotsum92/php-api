CREATE DATABASE php_api
/*!40100 DEFAULT CHARACTER SET utf8 */;

USE php_api;

CREATE TABLE user (
  user_id char(36) NOT NULL,
  name varchar(20) NOT NULL,
  email varchar(20) NOT NULL,
  password varchar(20) NOT NULL,
  UNIQUE KEY unique_user_email (email),
  PRIMARY KEY (user_id)
);

INSERT INTO user VALUES (
  'ffa6f79f-1105-4575-9d24-ba14cfc02154',
  'admin',
  'admin@mail.com',
  'p@ssw0rd'
);
