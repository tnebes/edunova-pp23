/*
Create a function that ensures that ints between 980 and 5098 are entered.
Use this function in one query, procedure or trigger.
*/

use example_1;

delimiter $$
create function return_between(my_int int) returns int
	begin
		if (my_int > 950 and my_int < 5098) then
			return my_int;
		else
			return 0; -- this is not great.
		end if;
	end
$$
delimiter ;
