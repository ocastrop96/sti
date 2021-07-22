SELECT id,ap_paterno,ap_materno,nombres,departamento,date_format(fPrimera,'%d/%m/%Y') as fPrimera,date_format(fSegunda,'%d/%m/%Y') as fSegunda,observaciones FROM pm_medicos;


SELECT id,ap_paterno,ap_materno,nombres,departamento,date_format(fPrimera,'%d/%m/%Y') as fPrimera,date_format(fSegunda,'%d/%m/%Y') as fSegunda,observaciones FROM pm_medicos where departamento = "DEPARTAMENTO DE EMERGENCIA" AND fPrimera = "2020-12-31";

SELECT * FROM pm_medicos where departamento = "OFICINA DE ESTADÍSTICA E INFORMATICA" and fPrimera = "2020-12-31";

select * from pm_medicos where fPrimera = "2020-12-31";

SELECT DISTINCT departamento FROM pm_medicos;
SELECT count( DISTINCT departamento) FROM pm_medicos;


SELECT DISTINCT departamento FROM pm_medicos where departamento != '' order by departamento asc;
SELECT count(DISTINCT departamento) FROM pm_medicos where departamento != "";


UPDATE pm_medicos SET departamento = "DEPARTAMENTO DE ODONTOESTOMATOLOGIA" WHERE id = 1026;
UPDATE pm_medicos SET departamento = "DEPARTAMENTO DE ODONTOESTOMATOLOGIA" WHERE id = 1614;

select * from pm_medicos where departamento = "DEPARTAMENTO DE ENFERMERIA" and fPrimera = "2020-12-31";

SELECT id,ap_paterno,ap_materno,nombres,departamento,date_format(fPrimera,'%d/%m/%Y') as fPrimera,date_format(fSegunda,'%d/%m/%Y') as fSegunda,observaciones FROM pm_medicos ORDER by ap_paterno ASC
