

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
    telefone_user char(11), 
    telefone_con char(11),

    constraint telefone_user_messages foreign key (telefone_user) references user (telefone),
    constraint telefone_contact_messages foreign key (telefone_con) references user (telefone)
);

insert user (nome, descricao, telefone) values ("Pessoa 1","Teste",11111111111);
insert user (nome, descricao, telefone) values ("Pessoa 2","Teste",11111111112);
insert user (nome, descricao, telefone) values ("Pessoa 3","Teste",11111111113);
insert user (nome, descricao, telefone) values ("Pessoa 4","Teste",11111111114);
insert into category (nome) values ('Categoria1');
insert into contacts (id_cat, id_user,id_con) values (1,1,2);
insert into contacts (id_cat, id_user,id_con) values (1,1,3);
insert into contacts (id_cat, id_user,id_con) values (1,1,4);
insert into messages (descricao,telefone_user,telefone_con) values ("Teste de mensagem de pessoa 1 para pessoa 2",11111111111,11111111112);
insert into messages (descricao,telefone_user,telefone_con) values ("Teste de mensagem de pessoa 1 para pessoa 3",11111111111,11111111113);


SET FOREIGN_KEY_CHECKS=1;
   
