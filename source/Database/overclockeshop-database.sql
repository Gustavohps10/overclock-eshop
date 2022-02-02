create database overclock;
use overclock;

create table perfil(
idPerfil int not null auto_increment,
nome varchar(50),
primary key(idPerfil)
);

insert into perfil(nome) values ('CLIENTE'), ('SUPORTE'),('ADMINISTRADOR');

create table metodoPagamento(
idMetodoPagamento int not null auto_increment,
nome varchar(50),
imagem varchar(255),
primary key(idMetodoPagamento)
);

insert into metodoPagamento(nome) value ('PICPAY');

create table usuario(
idUsuario int not null auto_increment,
nome varchar(150),
username varchar(50),
email varchar(100),
senha varchar(45),
fk_idPerfil int not null,
primary key(idUsuario),
foreign key(fk_idPerfil) references perfil(idPerfil)
);

insert into usuario(nome, username, email, senha, fk_idPerfil) values(
'ADMIN', 'admin', 'admin@gmail.com', 'admin', 3);

create table endereco(
idEndereco int not null auto_increment,
nome varchar(75),
principal tinyint(4),
cep int(8),
cidade varchar(100),
rua varchar(150),
numeroCasa varchar(8),
estado char(2),
bairro varchar(50),
fk_idUsuario int not null,
primary key (idEndereco),
foreign key (fk_idUsuario) references usuario(idUsuario)
);

create table produto(
idProduto int not null auto_increment,
nome varchar(100),
descricao text,
valor decimal(8,2),
ativo tinyint,
imagem varchar(100),
quantidade int,
primary key (idProduto)
);

create table pedido(
idPedido int not null auto_increment,
referencia varchar(255),
valor decimal(8,2),
statusPedido varchar(15),
dataPedido datetime,
dataPagamento datetime,
linkPagamento varchar(255),
qrcode longtext,
fk_idUsuario int not null,
fk_idEndereco int not null,
fk_idMetodoPagamento int not null,
primary key (idPedido),
foreign key (fk_idUsuario) references usuario(idUsuario),
foreign key (fk_idEndereco) references endereco(idEndereco),
foreign key (fk_idMetodoPagamento) references metodoPagamento(idMetodoPagamento)
);

create table pedido_produto(
fk_idProduto int not null,
fk_idPedido int not null,
quantidade int,
comentario text,
nota decimal(2,1),
subtotal decimal(8,2),
foreign key (fk_idProduto) references produto(idProduto),
foreign key (fk_idPedido) references pedido(idPedido)
);
