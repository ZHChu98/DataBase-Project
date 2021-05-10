DELIMITER $$
CREATE OR REPLACE PROCEDURE ydzc_cust_bk_bor_p (IN this_cust_id INT, IN this_bkcpy_id INT)
BEGIN
START TRANSACTION;
	UPDATE ydzc_bkcpy SET bkcpy_stat="N" WHERE bkcpy_id=this_bkcpy_id;
	INSERT INTO ydzc_rent VALUES (NULL, "B", CURRENT_DATE(), DATE_ADD(CURRENT_DATE(), INTERVAL 30 DAY), NULL, this_bkcpy_id, this_cust_id);
	COMMIT;
END $$
DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE ydzc_cust_evt_reg_p (IN this_cust_id INT, IN this_evt_id INT)
BEGIN
START TRANSACTION;
	INSERT INTO ydzc_reg VALUES (NULL, this_evt_id, this_cust_id);
	COMMIT;
END $$
DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE ydzc_cust_rm_resv_p (IN this_cust_id INT, IN this_rmsect_id INT)
BEGIN
START TRANSACTION;
	INSERT INTO ydzc_resv VALUES (NULL, this_cust_id, this_rmsect_id);
	UPDATE ydzc_rmsect SET rmsect_rmncap=rmsect_rmncap-1 WHERE rmsect_id=this_rmsect_id;
	COMMIT;
END $$
DELIMITER ;
