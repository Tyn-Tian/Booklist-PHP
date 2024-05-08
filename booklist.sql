create database belajar_php_booklist;

create database belajar_php_booklist_test;

create table booklist(
	id int not null auto_increment,
    book varchar(100) not null,
    primary key (id)
) engine = InnoDB;

desc booklist;