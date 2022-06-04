drop schema if exists `birthday`;
create schema  if not exists `birthday` default  character set utf8 collate  utf8_spanish2_ci;
USE `birthday`; 

CREATE table `regalos1`(
`id` int(2) not null auto_increment,
`nombre` varchar(255),
primary key (id)
)engine=Innodb default charset=utf8;
CREATE table `regalos2`(
`id` int(2) not null,
`nombre` varchar(255),
`newid` int(2),
primary key (id)
)engine=Innodb default charset=utf8;
CREATE table `regalos3`(
`id` int(2) not null auto_increment,
`nombre` varchar(255),
`ogid` int(2),
primary key (id)
)engine=Innodb default charset=utf8;

CREATE table `tomado`(
`numeroderegalo` int(2) not null,
`nombre` varchar(255) not null,
primary key (numeroderegalo)
)engine=Innodb default charset=utf8;

CREATE table `contador`(
`round` int(2) not null auto_increment,
`cajasabiertas` int(2),
primary key (round)
)engine=Innodb default charset=utf8;

create table `abierta`(
`nombre` varchar(255),
primary key (`nombre`)
)engine=Innodb default charset=utf8;

insert into regalos1 (nombre) values(
'60 dollars for genshin gems'),
('30 dollars for genshin gems'),
('any ammount of money in pulls until you get a character of your choice in genshin (min 20)'),
('5500 flight rising gems'),
('2150 flight rising gems'),
('2 skins of your choice'),
('play store gift card 30 dollars'),
('lobotomy corporation'),
('a drawing commission in flight rising of one of your dragons'),
('a commission to @Zinma0411 on twitter'),
('a commission to tira'),
('opentable gift card 30 dollars'),
('nintendo switch gift card 30 dollars'),
('miitopia switch code'),
('pokemon sword + all dlc'),
('clothing gift card 40 dollars'),
('paysafecard 30 dollars'),
('paysafecard 20 dollars'),
('550 gems in flight rising'),
('either sony vegas or vsdc complete'),
('10 dollar gift card play store'),
('gems for master duel'),
('3 fics of your request i will make'),
('a spotify playlist'),
('a png of crepe'),
('a png of lico'

);

commit;