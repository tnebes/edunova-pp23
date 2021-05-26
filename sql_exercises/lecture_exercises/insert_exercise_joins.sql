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

select a.naziv as smjer,
	b.naziv as grupa,
	concat(d.ime , ' ' , d.prezime) as predavac,
	concat(g.ime, ' ', g.prezime) as polaznik
from smjer a
inner join grupa b on b.smjer = a.sifra 
inner join predavac c on b.predavac = c.sifra
inner join osoba d on c.osoba = d.sifra
inner join clan e on a.sifra = e.grupa
inner join polaznik f on e.polaznik = f.sifra
inner join osoba g on f.osoba = g.sifra;

--

select a.naziv as 'grupa', e.naziv as 'smjer', concat(d.ime, ' ', d.prezime) as polaznik
from grupa a
inner join clan b on a.sifra = b.grupa
inner join polaznik c on b.polaznik = c.sifra
inner join osoba d on d.sifra = c.osoba
inner join smjer e on a.smjer = e.sifra 
where lower(a.naziv) like "%pp24%";







