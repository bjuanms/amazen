SELECT id_producto FROM PRODUCTO ORDER BY id_producto DESC;



SELECT MIN(id_producto), MAX(id_producto) FROM PRODUCTO;



UPDATE producto 
set img_1 = "airforce1.png"
where titulo_prod = "Nike Air Force 1 (Gs) Zapatillas de baloncesto unisex";


--- Query para seleccionar la media de valoraciones de 1 producto:
-- En lugar de FLOOR se puede usar ROUND para seguir las normas del redoendo o CEILING para que suba hacia arriba 
SELECT FLOOR(AVG(rate)) 
FROM valoracion
WHERE id_producto = 1;

-- Query para seleccionar el numero de valoraciones en ese producto
SELECT COUNT(id_valoracion)
FROM valoracion
WHERE id_producto = 1;