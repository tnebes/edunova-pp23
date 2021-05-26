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