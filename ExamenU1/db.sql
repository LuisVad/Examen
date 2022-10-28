drop database if exists KOF;
create database KOF;
use KOF;

create table magia (
   id int primary key auto_increment,
   name varchar(50) not null
);

create table tipo_lucha (
   id int primary key auto_increment,
   name varchar(80) not null
);

create table personaje (
   id bigint primary key auto_increment,
   name varchar(50) not null unique ,
   lastname varchar(50) not null,
   birthday date not null ,
   utiliza_magia tinyint not null ,
   estatura double not null ,
   peso double not null ,
   equipo int not null ,
   magia_id int null,
   tipo_lucha_id int,
   constraint fk_magia foreign key (magia_id) references magia (id),
   constraint fk_tipo_lucha foreign key (tipo_lucha_id) references tipo_lucha (id)
);
