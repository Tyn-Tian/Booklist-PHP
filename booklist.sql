create database belajar_php_booklist;

create table booklist(
	id int not null auto_increment,
    book varchar(100) not null,
    primary key (id)
) engine = InnoDB;

desc booklist;