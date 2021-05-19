use knjiznica;

select concat(b.ime, ' ', b.prezime) as 'Autor', a.naslov as 'Naslov'
from katalog a inner join autor b
on a.autor = b.sifra
where lower(b.ime) = "august" and lower(b.prezime) = "šenoa";