-- create a procedure called exercise2 that enters 56872 rows into the zarucnica table. The procedure must be called only once.

use example_1;

delimiter $$
create procedure zadatak2()
begin
declare i int default 0;
	while (i < 56872) do
			insert into zarucnica(prstena, modelnaocala, nausnica) values(i, i, i);
			set i = i + 1;
	end while;
end; 
$$
delimiter ;