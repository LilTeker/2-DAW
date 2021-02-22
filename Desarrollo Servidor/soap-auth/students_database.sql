-- soap-auth example database

CREATE DATABASE students;

CREATE TABLE IF NOT EXISTS students.students (
  id int unsigned PRIMARY KEY,
  name varchar(15) NOT NULL
);

INSERT INTO students.students (id, name) VALUES
(1, 'Ana'),
(2, 'Diana'),
(3, 'Triana');


