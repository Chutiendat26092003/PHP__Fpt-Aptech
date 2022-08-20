CREATE  TABLE authors(
        authorid int(11) NOT NULL AUTO_INCREMENT,
        name varchar(55) NOT NULL DEFAULT '',
        PRIMARY KEY (authorid)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;

INSERT INTO authors (authorid, name) VALUES (1, 'J.R.R. Tolkien'),
                                            (2, 'Alex Haley'),
                                            (3, 'Tom Clancy'),
                                            (4, 'Isaac Asimov');

CREATE TABLE books (
        bookid int(11) NOT NULL AUTO_INCREMENT,
        authorid int(11) NOT NULL DEFAULT '0',
        title varchar(55) NOT NULL DEFAULT '',
        ISBN varchar(25) NOT NULL DEFAULT '',
        pub_year smallint(6)  NOT NULL DEFAULT '0',
        available smallint(4) NOT NULL,
        PRIMARY KEY (bookid)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=19;

INSERT INTO books (bookid, authorid, title, ISBN, pub_year, available)  VALUES
(1, 1, 'The Two Towers', '0-261-10236-2', 1954, 1),
(2, 1, 'The Return of the King', '0-261-10237-0', 1955, 1),
(3, 2, 'Roots', '0-440-17464-3', 1974, 1),
(4, 3, 'Rainbow Six', '0-425-17034-9', 1998, 1),
(5, 3, 'Teeth of the Tiger', '6-399-15079-X', 2003, 1),
(6, 3, 'Executive Orders', '0-425-15863-2', 1996, 1),
(7, 1, 'The Hobbit', '0-261-10221-4', 1937, 1),
(8, 3, 'The Sum of All Fears', '0-425-13354-0', 1991, 1),
(9, 3, 'Red Rabbit', '0-399-14870-1', 2000, 0),
(10, 4, 'I, Robot', '0-553-29438-5', 1950, 1);