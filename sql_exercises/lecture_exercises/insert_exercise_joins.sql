use edunovapp23;

select * from smjer;

-- unesite novi smjer serviser
-- s minimalnim skupom atributa

insert into smjer(naziv)
	values ("Serviser");
	
delete from smjer where naziv = "Serviser";

select a.naziv as grupa, b.naziv as smjer
from grupa a inner join smjer b
on a.smjer = b.sifra;

insert into grupa(naziv, smjer) values
("PP24", 1);

-- using subqueries
insert into grupa(naziv, smjer) values
("test item", (select sifra from smjer where lower(naziv) like "%php%"));