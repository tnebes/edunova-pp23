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

select a.naziv as grupa, b.naziv as smjer,
a.predavac
from grupa a inner join smjer b
on a.smjer = b.sifra;

insert into osoba(ime, prezime)
values ("Marija", "Zimska");

insert into predavac(osoba)
values ((select sifra from osoba where lower(ime) like "%marija%" and lower(prezime) like "%zimska%"));

update grupa set predavac = (
select a.sifra 
from predavac a inner join osoba b 
on a.osoba = b.sifra
where b.ime like "%marija%" and b.prezime like "zimska"
) where lower(grupa.naziv) like "%pp23%";

---

select a.naziv, c.ime, c.prezime 
from grupa a inner join predavac b
on a.predavac = b.sifra
inner join osoba c 
on b.osoba = c.sifra;


