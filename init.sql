

CREATE DATABASE IF NOT EXISTS RealChat;
use RealChat;

create table user (
	id int primary key auto_increment,
    nome varchar(45) NOT NULL,
    descricao varchar(100) NOT NULL, 
    telefone char(11) unique
);

create table category (
	id int primary key auto_increment,
    nome varchar(45) NOT NULL
);


create table contacts (
	id int primary key auto_increment,
    id_cat int,
    id_user int, 
    id_con int,

    constraint id_categoria_contacts foreign key (id_cat) references category (id),
    constraint id_user_contacts foreign key (id_user) references user (id),
    constraint id_contact_contacts foreign key (id_con) references user (id)
);
    
create table messages (
	id int primary key auto_increment,
    descricao varchar(200) NOT NULL, 
    id_user int, 
    id_con int,

    constraint id_user_messages foreign key (id_user) references user (id),
    constraint id_contact_messages foreign key (id_con) references user (id)
);

insert user (nome, descricao, telefone) values ("Pessoa 1","Teste",11111111111);
insert user (nome, descricao, telefone) values ("Pessoa 2","Teste",11111111112);
insert into category (nome) values ('Categoria1');
insert into contacts (id_cat, id_user,id_con) values (1,1,2);
insert into messages (descricao,id_user,id_con) values ("Teste de mensagem de pessoa 1 para pessoa 2",1,2);


SET FOREIGN_KEY_CHECKS=1;
   
