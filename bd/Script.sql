drop database if exists confeitaria;

create database confeitaria;

use confeitaria;

create table clientes (
id int not null auto_increment,
nome varchar(80) not null,
endereco varchar(120) not null,
telefone varchar(11) not null,
email varchar(255) not null unique,
cpf varchar(11) not null unique,
imagem varchar(255) not null,
senha varchar(45) not null,
primary key (id)
);

create table produtos(
id int not null auto_increment,
nome varchar(120) not null,
preco decimal(18,2) not null,
ingrediente varchar(255) not null,
imagem varchar(255) not null,
primary key(id)
);

create table status(
id int auto_increment not null,
descricao varchar(45),
primary key(id)
);

create table pedidos(
id int not null auto_increment,
valor_total decimal(18,2),
status_id int not null,
clientes_id int not null,
primary key(id),
constraint fk_status_pedidos
foreign key (status_id)
references status(id),
constraint fk_clientes_pedidos
foreign key (clientes_id)
references clientes(id)
);

create table pedidos_has_produtos(
pedidos_id int not null,
produtos_id int not null,
primary key(pedidos_id,produtos_id),
constraint fk_pedidos_produtos
foreign key (pedidos_id)
references pedidos(id),
constraint fk_produtos_pedidos
foreign key (produtos_id)
references produtos(id)
);
