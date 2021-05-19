use knjiznica;

select concat(b.ime, ' ', b.prezime) as 'Autor', a.naslov as 'Naslov'
from katalog a inner join autor b
on a.autor = b.sifra
where lower(b.ime) = "august" and lower(b.prezime) = "šenoa";

-- odaberite nazive svih mjesta u kojima

select c.naziv as 'Izdavac', a.naziv as 'Mjesto'
from mjesto a inner join katalog b
on b.mjesto = a.sifra
inner join izdavac c on c.sifra = b.izdavac
where lower(c.naziv) not like "%h%";