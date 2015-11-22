drop table if exists gameTimKorisnik;
create table gameTimKorisnik (
sifra int not null primary key auto_increment,
timKorisnik int,
lang decimal(15,7),
lat decimal(15,7),
score int,
mrtav boolean,
game int
)engine=innodb;

drop table if exists timKorisnik;
create table timKorisnik (
sifra int not null primary key auto_increment,
tim int,
korisnik int
)engine=innodb;

drop table if exists game;
create table game (
sifra int not null primary key auto_increment,
broj int,
mec int,
pocetak datetime,
kraj datetime
)engine=innodb;

drop table if exists mec;
create table mec (
sifra int not null primary key auto_increment,
aktivan boolean
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
lozinka varchar(250),
device varchar(250)
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

alter table game add foreign key (mec) references mec(sifra);
alter table gameTimKorisnik add foreign key (game) references game(sifra);
alter table gameTimKorisnik add foreign key (timKorisnik) references timKorisnik(sifra);
alter table timKorisnik add foreign key (tim) references timovi(sifra);
alter table timKorisnik add foreign key (korisnik) references korisnik(sifra);
alter table korisnik add foreign key (status) references status(sifra);

insert into mec (aktivan) values (1);
insert into game (broj, mec, pocetak, kraj) values (1, 1, "2015-11-22 00:30:00", "2015-11-23 23:00:00");
insert into game (broj, mec, pocetak, kraj) values (2, 1, "2015-11-23 00:30:00", "2015-11-23 01:00:00");
insert into game (broj, mec, pocetak, kraj) values (3, 1, "2015-11-24 01:00:00", "2015-11-24 01:30:00");
insert into timovi (naziv) values ("Team 1");
insert into timovi (naziv) values ("Team 2");
insert into status (naziv) values ("Judge");
insert into status (naziv) values ("Player");
insert into korisnik (ime, prezime, avatar, status, kor_ime, lozinka, device) values ("Antun", "Matanovic", "slike/antun.jpg", 2, "antun", md5("123"), "4124bc0a9335c27f086f24ba207a4912 | APA91bHr8dX1RWuAAR2RtkCqW2NPVYWIeW0oN8lpQvEMwH09N0yNOSZFklv-RQkjvQJ1fPx4stsTDWsDBb_PzUpyYdsp9zhoGB5U7LpTNK7Lq2NLjyuof12Q8tZhq0LJaO15yw2DbW5m");
insert into korisnik (ime, prezime, avatar, status, kor_ime, lozinka) values ("Tena", "Vilcek", "slike/tena.jpg", 2, "tena", md5("123"));
insert into korisnik (ime, prezime, avatar, status, kor_ime, lozinka) values ("Manuela", "Mikulecki", "slike/mani.jpg", 2, "mani", md5("123"));
insert into korisnik (ime, prezime, avatar, status, kor_ime, lozinka) values ("Sudac", "Sudic", "slike/drea.jpg", 1, "sudac", md5("123"));

insert into timKorisnik (tim, korisnik) values (1, 1);
insert into timKorisnik (tim, korisnik) values (1, 2);
insert into timKorisnik (tim, korisnik) values (2, 3);
insert into gameTimKorisnik (timKorisnik, lat, lang, score, mrtav, game) values (1, "16.336607", "46.305746", 2, 0, 1);
insert into gameTimKorisnik (timKorisnik, lat, lang, score, mrtav, game) values (2, "16.336900", "46.306999", 0, 0, 1);
insert into gameTimKorisnik (timKorisnik, lat, lang, score, mrtav, game) values (3, "16.337900", "46.306000", 0, 0, 1);
insert into prepreke (naziv, lat, lang) values ("Zastavica 1", "16.338000", "46.307000");
insert into prepreke (naziv, lat, lang) values ("Zastavica 2", "16.335000", "46.305000");
insert into prepreke (naziv, lat, lang) values ("Motel", "16.337500", "46.307000");
