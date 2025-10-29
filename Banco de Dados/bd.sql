drop database if exists VolleyConnect;

create database if not exists VolleyConnect;
use VolleyConnect;

create table usuario
(
	id int not null auto_increment,
	cpf int not null,
    nome varchar(40),
    email varchar(20),
    senha varchar(20),
    perfil varchar(20), -- administrador, torcedor, atleta
    foto varchar (100),
    primary key (id)
);

create table time
(
	id int not null auto_increment,
	nome varchar (20),
    logo varchar (100),
	genero varchar(10),
    primary key (id)
);

/*
create table cronograma 
(
	id int not null auto_increment,
    mes varchar(15),
    primary key (id)
);

*/

create table campeonato
(
	id int not null auto_increment,
    nome varchar(40),
    genero varchar(10),
    primary key (id)
);

create table jogo
(
	id int not null auto_increment,
    local varchar(40),
    data datetime,    
    placar_time1 int,
    placar_time2 int,
    placar_set1_time1 int,
	placar_set2_time1 int,
    placar_set3_time1 int,
    placar_set1_time2 int,
	placar_set2_time2 int,
    placar_set3_time2 int,
    id_campeonato int,
    id_time1 int,
    id_time2 int,
    primary key (id),
    constraint FK_Jogo_Time1 foreign key (id_time1) references time(id),
    constraint FK_Jogo_Time2 foreign key (id_time2) references time(id),
	constraint FK_Jogo_Campeonato foreign key (id_campeonato) references campeonato(id)
);


/*
create table administrador
(
	id int not null auto_increment,
    nome varchar(100),
    cpf varchar(20),
    credencial varchar(40),
    email varchar(40),
    senha varchar(100),
    primary key (id)
);
*/


create table atleta
(
	id int not null auto_increment,
    -- nome varchar(100),
    -- cpf varchar(20),
    -- email varchar(40),
    -- senha varchar(100),
    id_time int,
    id_usuario int,
    posicao varchar(40),
    genero varchar(10),
    idade varchar(100),
    -- disponibilidade varchar(50),
    primary key (id),
    constraint FK_Atleta_Time foreign key (id_time) references time(id),
    constraint FK_Atleta_Usuario foreign key (id_usuario) references usuario(id)
);


create table torcedor_atleta_salvo
(
	id int not null auto_increment,    
    id_atleta int,
    id_torcedor int,
    data datetime,
    primary key (id),
    constraint FK_torcedor_atleta_salvo_atleta foreign key (id_atleta) references atleta(id),
    constraint FK_torcedor_atleta_salvo_torcedor foreign key (id_torcedor) references usuario(id)
);
/*
create table torcedor 
(
	id int not null auto_increment,
    nome varchar(100),
    cpf varchar(20),
    email varchar(40),
    senha varchar(100),
    primary key (id)
);

create table seleciona
(
	id_torcedor int not null auto_increment,
    id_atleta int not null,
    primary key (id_torcedor, id_atleta),
    foreign key (id_torcedor) references torcedor (id),
    foreign key (id_atleta) references atleta (id)
);

create table encontro
(
	id_torcedor int not null auto_increment,
    id_atleta int not null,
    primary key (id_torcedor, id_atleta),
    foreign key (id_torcedor) references torcedor (id),
    foreign key (id_atleta) references atleta (id)
);

create table assiste
(
	id_torcedor int not null,
    id_jogo int not null auto_increment,
    primary key (id_torcedor, id_jogo),
    foreign key (id_torcedor) references torcedor (id),
    foreign key (id_jogo) references jogo (id)
);
*/
create table atleta_encontro 
(
	id int not null auto_increment,
    id_atleta int not null,
    id_jogo int not null,
    horario_inicial datetime,
    duracao int,
    vagas int,    
    primary key (id),
    foreign key (id_atleta) references atleta (id),
    foreign key (id_jogo) references jogo (id)
);

create table atleta_encontro_torcedor
(
	id int not null auto_increment,
    id_atleta_encontro int not null,
    id_torcedor int not null ,
    primary key (id),
    foreign key (id_atleta_encontro) references atleta_encontro (id),
    foreign key (id_torcedor) references usuario (id)
    
);

/*
create table acessa 
(
	id_usuario int not null,
    id_mes int not null,
    primary key (id_usuario, id_mes),
    foreign key (id_usuario) references usuario (id),
    foreign key (id_mes) references cronograma (id)
);
*/

-- SELECT * FROM torcedor;