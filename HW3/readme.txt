Домашно 3.1 [11.11]
Имате база от данни със следната таблица и данни:

CREATE TABLE electives (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(128),
  description VARCHAR(1024),
  lecturer VARCHAR(128)
);

INSERT INTO electives (title, description, lecturer)
VALUES
  ("Programming with Go", "Let's learn Go", "Nikolay Batchiyski"),
  ("AKDU", "Let's Graduate", "Svetlin Ivanov"),
  ("Web technologies", "Let's learn the web", "Milen Petrov");
Имплементирайте php страница с форма и валидация за добавяне на избираема дисциплина.

Добавете колона created_at на таблицата electives, коята да сочи момента на добавяне на реда.

Домашно 3.2
Добавете функционалност за редактиране на избираема дисциплина.

HTTP GET на /electives.php/1 (или /electives.php?id=1) трябва да върне формата с попълнени текущи стойности.

HTTP POST на /electives.php/1  (или /electives.php?id=1) със съответните параметри трябва 

да промени избираемата с id 1 
и след това да върне същата страницата като при GET.
Забележка - последното би трябвало да е PUT, а не POST, но с чист HTML без JS това не е възможно. Когато вземем JS ще видите правилния начин.
