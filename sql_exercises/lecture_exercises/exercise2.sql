use classicmodels;

select a.productName as 'Product name', b.productLine as 'Product line'
from products a inner join productlines b
on a.productLine = b.productLine;