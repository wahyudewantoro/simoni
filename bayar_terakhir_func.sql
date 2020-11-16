DELIMITER $$

USE `etax`$$

DROP FUNCTION IF EXISTS `bayar_terakhir`$$

CREATE DEFINER=`root`@`localhost` FUNCTION `bayar_terakhir`(vnpwp VARCHAR(100)) RETURNS DATE
BEGIN
    
	DECLARE i INT;
	DECLARE res DATE;
	SELECT COUNT(kd_trx) INTO i FROM tb_transaksi WHERE npwp=vnpwp;
	IF i >0 THEN 
		SELECT tanggal_insert INTO res FROM tb_transaksi WHERE npwp=vnpwp ORDER BY tanggal_insert DESC LIMIT 1;
	ELSE
		SET res=NULL;
	END IF;
	RETURN res;
    END$$

DELIMITER ;