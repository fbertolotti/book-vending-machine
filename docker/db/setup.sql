CREATE DATABASE book_vending_machine;

USE book_vending_machine;

CREATE TABLE author (
  id INT AUTO_INCREMENT NOT NULL,
  name VARCHAR(255) NOT NULL,
  PRIMARY KEY(id)
) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;

INSERT author (name) VALUES
  ('Antoine de Saint-Exupery'),
  ('William Gibson'),
  ('John Ronald Reuel Tolkien'),
  ('Louisa May Alcott'),
  ('Jack London'),
  ('Andrea Camilleri'),
  ('Carlo Lucarelli');

CREATE TABLE book (
  id INT AUTO_INCREMENT NOT NULL,
  title VARCHAR(255) NOT NULL,
  isbn_code VARCHAR(13) NOT NULL,
  PRIMARY KEY(id)
) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;

INSERT book (title, isbn_code) VALUES
  ('Il piccolo principe', '9781529047961'),
  ('Neuromante', '7693476982934'),
  ('Lo Hobbit', '5823487671236'),
  ('Piccole donne', '8457396293834'),
  ('Zanna Bianca', '2384972374254'),
  ('Acqua in bocca', '4576293847523');

CREATE TABLE book_author (
  book_id INT NOT NULL,
  author_id INT NOT NULL,
  INDEX IDX_9478D34516A2B381 (book_id),
  INDEX IDX_9478D345F675F31B (author_id),
  PRIMARY KEY(book_id, author_id),
  FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE,
  FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE
) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;

INSERT book_author VALUES
  (1, 1),
  (2, 2),
  (3, 3),
  (4, 4),
  (5, 5),
  (6, 6),
  (6, 7);
