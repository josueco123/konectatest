-- Esta es la consulta para obtener el producto que más stock tiene
SELECT products.name, products.stock
FROM products
ORDER BY products.stock DESC
LIMIT 1;
-- Esta es la consulta para obtener el producto más vendido
SELECT p.name, SUM(v.amount) AS total_sell
FROM products p
INNER JOIN sells v ON p.id = v.product_id
GROUP BY p.name
ORDER BY total_sell DESC
LIMIT 1;