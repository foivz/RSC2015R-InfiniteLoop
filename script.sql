drop table if exists timKorisnik;
create table timKorisnik (
sifra int not null primary key auto_increment,
tim int,
korisnik int
)engine=innodb;

drop table if exists gameTimKorisnik;
create table gameTimKorisnik (
sifra int not null primary key auto_increment,
timKorisnik int,
lang decimal(8,6),
lat decimal(8,6),
score int,
mrtav boolean,
game int
)engine=innodb;

drop table if exists game;
create table game (
sifra int not null primary key auto_increment,
broj int,
mec int
)engine=innodb;

drop table if exists mec;
create table mec (
sifra int not null primary key auto_increment,
aktivan boolean,
pocetak datetime,
kraj datetime
)engine=innodb;

drop table if exists timovi;
create table timovi (
sifra int not null primary key auto_increment,
naziv varchar(200)
)engine=innodb;

drop table if exists korisnik;
create table korisnik (
sifra int not null primary key auto_increment,
ime varchar(250),
prezime varchar(250),
avatar varchar(250),
status int,
kor_ime varchar(250),
lozinka varchar(250)
)engine=innodb;

drop table if exists status;
create table status (
sifra int not null primary key auto_increment,
naziv varchar(250)
)engine=innodb;


drop table if exists prepreke;
create table prepreke (
sifra int not null primary key auto_increment,
naziv varchar(250),
lang decimal(8,6),
lat decimal(8,6)
)engine=innodb;

drop table if exists flag;
create table flag (
sifra int not null primary key auto_increment,
lang decimal(8,6),
lat decimal(8,6)
)engine=innodb;

alter table game add foreign key (mec) references mec(sifra);
alter table gameTimKorisnik add foreign key (game) references game(sifra);
alter table timKorisnik add foreign key (tim) references timovi(sifra);
alter table timKorisnik add foreign key (korisnik) references korisnik(sifra);
alter table korisnik add foreign key (status) references status(sifra);

insert into mec (aktivan, pocetak, kraj) values (1, "2015-11-21 17:00:00", "2015-11-21 21:00:00");
insert into game (broj, mec) values (1, 1);
insert into game (broj, mec) values (2, 1);
insert into game (broj, mec) values (3, 1);
insert into gameTimKorisnik (timKorisnik, lang, lat, score, mrtav, game) values (1, "46.305746", "16.336607", 30, 0, 1);
insert into timovi (naziv) values ("Tim 1");
insert into timovi (naziv) values ("Tim 2");
insert into status (naziv) values ("Sudac");
insert into status (naziv) values ("Igrač");
insert into korisnik (ime, prezime, avatar, status, kor_ime, lozinka) values ("Antun", "Matanović", "slike/....", 2, "antun", md5("123"));
insert into timKorisnik (tim, korisnik) values (1, 1);
