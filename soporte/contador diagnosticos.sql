SELECT IFEMPTY(diagnostico,'SIN DIAGNOSTICO') diagno1, count(*) AS CONTEO from ws_mantenimientos_2  as p1 left join
ws_diagnosticos as d2 on p1.diag1 = d2.idDiagnostico where ;

/*
IF(field1 IS NULL or field1 = '', 'empty', field1)
*/
select diagnostico , count(*) as DIAGNOSTICOS
    from ws_diagnosticos
group by diagnostico;

SELECT IFEMPTY(obsOtros, 'SIN DATOS') as obsOtros 
from ws_mantenimientos_2;

SELECT * FROM `sti-web`.ws_mantenimientos_2;

SELECT diagnostico from ws_mantenimientos_2  as p1 left join
ws_diagnosticos as d2 on p1.diag1 = d2.idDiagnostico where diag1 > 0;