DELIMITER $$
CREATE TRIGGER GENERAR_CORRELATIVO_MANTENIMIENTO
BEFORE INSERT ON ws_mantenimientos
FOR EACH ROW
BEGIN
    DECLARE cont1 int default 0;
    DECLARE anio text;
    set anio = (SELECT YEAR(CURDATE()));
    SET cont1= (SELECT count(*) FROM ws_mantenimientos WHERE year(fRegistroMant) = year(now()));
    IF (cont1 < 1) THEN
    SET NEW.correlativo_Mant = CONCAT('FM-',anio,'-', LPAD(cont1 + 1, 5, '0'));
    ELSE
    SET NEW.correlativo_Mant = CONCAT('FM-',anio,'-', LPAD(cont1 + 1, 5, '0'));
    END IF;
END$$