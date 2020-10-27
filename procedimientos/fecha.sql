CREATE OR REPLACE FUNCTION
fib (puerto_actual integer, fecha1 date, fecha2 date)
RETURNS TABLE (fecha date, iid integer, capacidad float) AS $$
BEGIN
RETURN QUERY 

WITH lista_fechas AS (
  select date::date 
from generate_series(
  fecha1::date,
  fecha2::date,
  '1 day'::interval
) date),
lista_instalaciones AS (
  SELECT instalaciones.iid , instalaciones.capacidad_instalacion, permisos.fecha_atraque, permisos.fecha_salida, permisos.peid
  FROM instalaciones, puerto, permisos 
  WHERE instalaciones.iid = permisos.iid AND instalaciones.ppid = puerto_actual
),
lista_completa AS (SELECT lista_fechas.date::date, lista_instalaciones.iid, (CAST(COUNT(DISTINCT lista_instalaciones.peid) AS float) / CAST(lista_instalaciones.capacidad_instalacion AS float)) AS porcentaje
FROM lista_instalaciones, lista_fechas WHERE lista_instalaciones.fecha_atraque <= lista_fechas.date::date  
GROUP BY lista_fechas.date::date, lista_instalaciones.iid, lista_instalaciones.capacidad_instalacion
HAVING COUNT(DISTINCT lista_instalaciones.peid) <= lista_instalaciones.capacidad_instalacion
ORDER BY lista_fechas.date::date
) 
SELECT * FROM lista_completa;
RETURN;
END
$$ language plpgsql