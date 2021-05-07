-- ydzc_auth
INSERT INTO ydzc_auth VALUES (NULL, '356A192B7913B04C54574D18C28D46E6395428AB', 'Zeke', 'Yeager', 'zeke@nyu.edu', '3', 'West Road', 'NewYork', 'NY', 'US', 10001);
INSERT INTO ydzc_auth VALUES (NULL, 'DA4B9237BACCCDF19C0760CAB7AEC4A8359010B0', 'Bertolt', 'Hoover', 'bertolt@nyu.edu', '81', 'North Road', 'Phoenix', 'AZ', 'US', 10021);
INSERT INTO ydzc_auth VALUES (NULL, '77DE68DAECD823BABBB58EDB1C8E14D7106E83BB', 'Annie', 'Leonhart', 'annie@nyu.edu', '21', 'South Road', 'Montgomery', 'AL', 'US', 10081);
INSERT INTO ydzc_auth VALUES (NULL, '1B6453892473A467D07372D45EB05ABC2031647A', 'Marcel', 'Galliard', 'marcel@nyu.edu', '33', 'West Road', 'Denver', 'CO', 'US', 10011);
INSERT INTO ydzc_auth VALUES (NULL, 'AC3478D69A3C81FA62E60F5C3696165A4E5E6AC4', 'Porco', 'Galliard', 'porco@nyu.edu', '22', 'West Road', 'Los Angeles', 'CA', 'US', 10026);
INSERT INTO ydzc_auth VALUES (NULL, 'C1DFD96EEA8CC2B62785275BCA38AC261256E278', 'Pieck', 'Finger', 'pieck@nyu.edu', '88', 'West Road', 'Chicago', 'IL', 'US', 10024);
INSERT INTO ydzc_auth VALUES (NULL, '902BA3CDA1883801594B6E1B452790CC53948FDA', 'Gabi', 'Braun', 'gabi@nyu.edu', '72', 'West Road', 'Boston', 'MA', 'US', 10052);
INSERT INTO ydzc_auth VALUES (NULL, 'FE5DBBCEA5CE7E2988B8C69BCFDFDE8904AABC1F', 'Falco', 'Grice', 'falco@nyu.edu', '90', 'West Road', 'Detroit', 'MI', 'US', 10073);
-- ydzc_bk
INSERT INTO ydzc_bk VALUES (9782222211111, 'Western Culture');
INSERT INTO ydzc_bk VALUES (9783333322222, 'Le Petit Prince');
INSERT INTO ydzc_bk VALUES (9784444433333, 'Van Gogh: The Life');
INSERT INTO ydzc_bk VALUES (9785555544444, 'Lonely Planet');
INSERT INTO ydzc_bk VALUES (9786666655555, 'The Beauty of Science');
INSERT INTO ydzc_bk VALUES (9787777766666, 'Little Duck');
INSERT INTO ydzc_bk VALUES (9788888877777, 'Hundred Thousand Whys');
INSERT INTO ydzc_bk VALUES (9789999988888, 'Ancient Egypt');
-- ydzc_bk_auth
INSERT INTO ydzc_bk_auth VALUES (1, 9782222211111);
INSERT INTO ydzc_bk_auth VALUES (1, 9783333322222);
INSERT INTO ydzc_bk_auth VALUES (2, 9783333322222);
INSERT INTO ydzc_bk_auth VALUES (3, 9784444433333);
INSERT INTO ydzc_bk_auth VALUES (4, 9785555544444);
INSERT INTO ydzc_bk_auth VALUES (5, 9786666655555);
INSERT INTO ydzc_bk_auth VALUES (6, 9787777766666);
INSERT INTO ydzc_bk_auth VALUES (7, 9788888877777);
INSERT INTO ydzc_bk_auth VALUES (8, 9788888877777);
INSERT INTO ydzc_bk_auth VALUES (8, 9789999988888);
-- ydzc_top
INSERT INTO ydzc_top VALUES ('History');
INSERT INTO ydzc_top VALUES ('Children');
INSERT INTO ydzc_top VALUES ('Science');
INSERT INTO ydzc_top VALUES ('Arts');
INSERT INTO ydzc_top VALUES ('Travel');
-- ydzc_bk_top
INSERT INTO ydzc_bk_top VALUES (9782222211111, 'Arts');
INSERT INTO ydzc_bk_top VALUES (9784444433333, 'Arts');
INSERT INTO ydzc_bk_top VALUES (9789999988888, 'Arts');
INSERT INTO ydzc_bk_top VALUES (9783333322222, 'Children');
INSERT INTO ydzc_bk_top VALUES (9786666655555, 'Children');
INSERT INTO ydzc_bk_top VALUES (9787777766666, 'Children');
INSERT INTO ydzc_bk_top VALUES (9788888877777, 'Children');
INSERT INTO ydzc_bk_top VALUES (9786666655555, 'History');
INSERT INTO ydzc_bk_top VALUES (9788888877777, 'History');
INSERT INTO ydzc_bk_top VALUES (9784444433333, 'Science');
INSERT INTO ydzc_bk_top VALUES (9789999988888, 'Science');
INSERT INTO ydzc_bk_top VALUES (9785555544444, 'Travel');
-- ydzc_bkcpy
INSERT INTO ydzc_bkcpy VALUES (NULL, 'N', 9782222211111);
INSERT INTO ydzc_bkcpy VALUES (NULL, 'Y', 9782222211111);
INSERT INTO ydzc_bkcpy VALUES (NULL, 'Y', 9782222211111);
INSERT INTO ydzc_bkcpy VALUES (NULL, 'N', 9783333322222);
INSERT INTO ydzc_bkcpy VALUES (NULL, 'N', 9784444433333);
INSERT INTO ydzc_bkcpy VALUES (NULL, 'Y',9785555544444);
INSERT INTO ydzc_bkcpy VALUES (NULL, 'Y', 9786666655555);
INSERT INTO ydzc_bkcpy VALUES (NULL, 'Y', 9787777766666);
INSERT INTO ydzc_bkcpy VALUES (NULL, 'Y', 9788888877777);
INSERT INTO ydzc_bkcpy VALUES (NULL, 'Y', 9788888877777);
INSERT INTO ydzc_bkcpy VALUES (NULL, 'Y', 9788888877777);
INSERT INTO ydzc_bkcpy VALUES (NULL, 'Y', 9789999988888);
-- ydzc_cust
INSERT INTO ydzc_cust VALUES (NULL, '356A192B7913B04C54574D18C28D46E6395428AB', 'Eren', 'Yeager', 2129981211, 'eren@nyu.edu', 'S', 437625001);
INSERT INTO ydzc_cust  VALUES (NULL, 'DA4B9237BACCCDF19C0760CAB7AEC4A8359010B0', 'Mikasa', 'Ackerman', 2129981212, 'mikasa@nyu.edu', 'D', 437625002);
INSERT INTO ydzc_cust VALUES (NULL, '77DE68DAECD823BABBB58EDB1C8E14D7106E83BB', 'Armin', 'Arlert', 2129981213, 'armin@nyu.edu', 'S', 437625003);
INSERT INTO ydzc_cust VALUES (NULL, '1B6453892473A467D07372D45EB05ABC2031647A', 'Reiner', 'Braun', 2129981214, 'reiner@nyu.edu', 'P', 437625004);
INSERT INTO ydzc_cust VALUES (NULL, 'AC3478D69A3C81FA62E60F5C3696165A4E5E6AC4', 'Jean', 'Kirstein', 2129981215, 'jean@nyu.edu', 'D', 437625005);
INSERT INTO ydzc_cust VALUES (NULL, 'C1DFD96EEA8CC2B62785275BCA38AC261256E278', 'Marco', 'Bott', 2129981216, 'marco@nyu.edu', 'S', 437625006);
INSERT INTO ydzc_cust VALUES (NULL, '902BA3CDA1883801594B6E1B452790CC53948FDA', 'Connie', 'Springer', 2129981217, 'connie@nyu.edu', 'P', 437625007);
INSERT INTO ydzc_cust VALUES (NULL, 'FE5DBBCEA5CE7E2988B8C69BCFDFDE8904AABC1F', 'Sasha', 'Blouse', 2129981218, 'sasha@nyu.edu', 'P', 437625008);
INSERT INTO ydzc_cust VALUES (NULL, '0ADE7C2CF97F75D009975F4D720D1FA6C19F4897', 'Historia', 'Reiss', 2129981219, 'historia@nyu.edu', 'D', 437625009);
-- ydzc_rent
INSERT INTO ydzc_rent VALUES (10000001, 'R', STR_TO_DATE('01/02/2021', '%d/%m/%Y'), STR_TO_DATE('08/02/2021', '%d/%m/%Y'), STR_TO_DATE('08/02/2021', '%d/%m/%Y'), 4, 3);
INSERT INTO ydzc_rent VALUES (10000002, 'R', STR_TO_DATE('01/02/2021', '%d/%m/%Y'), STR_TO_DATE('15/02/2021', '%d/%m/%Y'), STR_TO_DATE('06/02/2021', '%d/%m/%Y'), 6, 2);
INSERT INTO ydzc_rent VALUES (10000003, 'R', STR_TO_DATE('01/02/2021', '%d/%m/%Y'), STR_TO_DATE('15/02/2021', '%d/%m/%Y'), STR_TO_DATE('11/02/2021', '%d/%m/%Y'), 8, 1);
INSERT INTO ydzc_rent VALUES (10000004, 'L', STR_TO_DATE('01/02/2021', '%d/%m/%Y'), STR_TO_DATE('15/02/2021', '%d/%m/%Y'), STR_TO_DATE('18/02/2021', '%d/%m/%Y'), 11, 5);
INSERT INTO ydzc_rent VALUES (10000005, 'L', STR_TO_DATE('01/02/2021', '%d/%m/%Y'), STR_TO_DATE('15/02/2021', '%d/%m/%Y'), STR_TO_DATE('18/02/2021', '%d/%m/%Y'), 12, 5);
INSERT INTO ydzc_rent VALUES (10000006, 'B', STR_TO_DATE('01/04/2021', '%d/%m/%Y'), STR_TO_DATE('01/05/2021', '%d/%m/%Y'), NULL, 1, 6);
INSERT INTO ydzc_rent VALUES (10000007, 'B', STR_TO_DATE('01/04/2021', '%d/%m/%Y'), STR_TO_DATE('01/05/2021', '%d/%m/%Y'), NULL, 4, 6);
INSERT INTO ydzc_rent VALUES (10000008, 'B', STR_TO_DATE('01/04/2021', '%d/%m/%Y'), STR_TO_DATE('01/05/2021', '%d/%m/%Y'), NULL, 5, 6);
-- ydzc_invc
INSERT INTO ydzc_invc VALUES (20000001, STR_TO_DATE('06/02/2021', '%d/%m/%Y'), 1.00, 10000002);
INSERT INTO ydzc_invc VALUES (20000002, STR_TO_DATE('08/02/2021', '%d/%m/%Y'), 1.40, 10000001);
INSERT INTO ydzc_invc VALUES (20000003, STR_TO_DATE('11/02/2021', '%d/%m/%Y'), 2.00, 10000003);
INSERT INTO ydzc_invc VALUES (20000004, STR_TO_DATE('18/02/2021', '%d/%m/%Y'), 4.00, 10000004);
INSERT INTO ydzc_invc VALUES (20000005, STR_TO_DATE('18/02/2021', '%d/%m/%Y'), 4.00, 10000005);
-- ydzc_pay
INSERT INTO ydzc_pay VALUES (30000001, STR_TO_DATE('06/02/2021', '%d/%m/%Y'), 1.00, 'PAYPAL', 10000002, 20000001);
INSERT INTO ydzc_pay VALUES (30000002, STR_TO_DATE('08/02/2021', '%d/%m/%Y'), 1.40, 'CREDIT', 10000001, 20000002);
INSERT INTO ydzc_pay VALUES (30000003, STR_TO_DATE('12/02/2021', '%d/%m/%Y'), 1.00, 'CREDIT', 10000003, 20000003);
INSERT INTO ydzc_pay VALUES (30000004, STR_TO_DATE('14/02/2021', '%d/%m/%Y'), 0.50, 'CREDIT', 10000003, 20000003);
INSERT INTO ydzc_pay VALUES (30000005, STR_TO_DATE('14/02/2021', '%d/%m/%Y'), 0.50, 'CREDIT', 10000003, 20000003);
INSERT INTO ydzc_pay VALUES (30000006, STR_TO_DATE('20/02/2021', '%d/%m/%Y'), 2.00, 'DEBIT', 10000004, 20000004);
INSERT INTO ydzc_pay VALUES (30000007, STR_TO_DATE('20/02/2021', '%d/%m/%Y'), 1.50, 'CASH', 10000005, 20000005);
INSERT INTO ydzc_pay VALUES (30000008, STR_TO_DATE('22/02/2021', '%d/%m/%Y'), 2.50, 'DEBIT', 10000005, 20000005);
INSERT INTO ydzc_pay VALUES (30000009, STR_TO_DATE('24/02/2021', '%d/%m/%Y'), 2.00, 'CREDIT', 10000004, 20000004);
-- ydzc_cc
INSERT INTO ydzc_cc VALUES (30000002, 'Armin');
INSERT INTO ydzc_cc VALUES (30000003, 'Eren');
INSERT INTO ydzc_cc VALUES (30000004, 'Eren');
INSERT INTO ydzc_cc VALUES (30000005, 'Mikasa');
INSERT INTO ydzc_cc VALUES (30000009, 'Connie');
-- ydzc_evt
INSERT INTO ydzc_evt VALUES (21001, 'Ancient Greek Arts', 'E', STR_TO_DATE('01/03/2021', '%d/%m/%Y'), STR_TO_DATE('03/03/2021', '%d/%m/%Y'));
INSERT INTO ydzc_evt VALUES (21002, 'Van Gogh Works Exhibition', 'E', STR_TO_DATE('01/03/2021', '%d/%m/%Y'), STR_TO_DATE('01/04/2021', '%d/%m/%Y'));
INSERT INTO ydzc_evt VALUES (21003, 'Tiny Physical Experiment', 'E', STR_TO_DATE('05/03/2021', '%d/%m/%Y'), STR_TO_DATE('25/03/2021', '%d/%m/%Y'));
INSERT INTO ydzc_evt VALUES (21004, 'Travel Photography', 'E', STR_TO_DATE('15/03/2021', '%d/%m/%Y'), STR_TO_DATE('16/03/2021', '%d/%m/%Y'));
INSERT INTO ydzc_evt VALUES (21005, 'The Second War', 'E', STR_TO_DATE('20/03/2021', '%d/%m/%Y'), STR_TO_DATE('27/03/2021', '%d/%m/%Y'));
INSERT INTO ydzc_evt VALUES (21006, 'Quantum Mechanics Future', 'S', STR_TO_DATE('28/03/2021', '%d/%m/%Y'), STR_TO_DATE('31/03/2021', '%d/%m/%Y'));
INSERT INTO ydzc_evt VALUES (21007, 'Crystal Mechanics Future', 'S', STR_TO_DATE('28/03/2021', '%d/%m/%Y'), STR_TO_DATE('31/03/2021', '%d/%m/%Y'));
INSERT INTO ydzc_evt VALUES (21008, 'Flow Mechanics Future', 'S', STR_TO_DATE('28/03/2021', '%d/%m/%Y'), STR_TO_DATE('31/03/2021', '%d/%m/%Y'));
INSERT INTO ydzc_evt VALUES (21009, 'Structural Mechanics Future', 'S', STR_TO_DATE('28/03/2021', '%d/%m/%Y'), STR_TO_DATE('31/03/2021', '%d/%m/%Y'));
INSERT INTO ydzc_evt VALUES (21010, 'Engineering Mechanics Future', 'S', STR_TO_DATE('28/03/2021', '%d/%m/%Y'), STR_TO_DATE('31/03/2021', '%d/%m/%Y'));
INSERT INTO ydzc_evt VALUES (21011, 'How to SURVIVE THE FINAL', 'E', STR_TO_DATE('15/05/2021', '%d/%m/%Y'), STR_TO_DATE('23/05/2021', '%d/%m/%Y'));
-- ydzc_exh
INSERT INTO ydzc_exh VALUES (21001, 2800.00);
INSERT INTO ydzc_exh VALUES (21002, 5000.00);
INSERT INTO ydzc_exh VALUES (21003, 2100.50);
INSERT INTO ydzc_exh VALUES (21004, 2000.00);
INSERT INTO ydzc_exh VALUES (21005, 1500.00);
INSERT INTO ydzc_exh VALUES (21011, 6666.66);
-- ydzc_sem
INSERT INTO ydzc_sem VALUES (21006, 1500.00);
INSERT INTO ydzc_sem VALUES (21007, 2000.00);
INSERT INTO ydzc_sem VALUES (21008, 600.00);
INSERT INTO ydzc_sem VALUES (21009, 600.00);
INSERT INTO ydzc_sem VALUES (21010, 450.00);
-- ydzc_evt_top
INSERT INTO ydzc_evt_top VALUES (21001, 'Arts');
INSERT INTO ydzc_evt_top VALUES (21001, 'History');
INSERT INTO ydzc_evt_top VALUES (21002, 'Arts');
INSERT INTO ydzc_evt_top VALUES (21002, 'History');
INSERT INTO ydzc_evt_top VALUES (21003, 'Children');
INSERT INTO ydzc_evt_top VALUES (21003, 'Science');
INSERT INTO ydzc_evt_top VALUES (21004, 'Arts');
INSERT INTO ydzc_evt_top VALUES (21004, 'Travel');
INSERT INTO ydzc_evt_top VALUES (21005, 'History');
INSERT INTO ydzc_evt_top VALUES (21006, 'Science');
INSERT INTO ydzc_evt_top VALUES (21007, 'Science');
INSERT INTO ydzc_evt_top VALUES (21008, 'Science');
INSERT INTO ydzc_evt_top VALUES (21009, 'Science');
INSERT INTO ydzc_evt_top VALUES (21010, 'Science');
INSERT INTO ydzc_evt_top VALUES (21011, 'Arts');
INSERT INTO ydzc_evt_top VALUES (21011, 'Children');
-- ydzc_reg
INSERT INTO ydzc_reg VALUES (20211001, 21001, 1);
INSERT INTO ydzc_reg VALUES (20211002, 21001, 2);
INSERT INTO ydzc_reg VALUES (20211003, 21001, 3);
INSERT INTO ydzc_reg VALUES (20211004, 21002, 5);
INSERT INTO ydzc_reg VALUES (20211005, 21002, 7);
INSERT INTO ydzc_reg VALUES (20211006, 21002, 8);
INSERT INTO ydzc_reg VALUES (20211007, 21003, 2);
INSERT INTO ydzc_reg VALUES (20211008, 21003, 9);
INSERT INTO ydzc_reg VALUES (20211009, 21004, 5);
INSERT INTO ydzc_reg VALUES (20211010, 21004, 6);
-- ydzc_invt
INSERT INTO ydzc_invt VALUES (20216001, 21006, 1);
INSERT INTO ydzc_invt VALUES (20216002, 21006, 2);
INSERT INTO ydzc_invt VALUES (20216003, 21007, 3);
INSERT INTO ydzc_invt VALUES (20216004, 21007, 4);
INSERT INTO ydzc_invt VALUES (20216005, 21008, 4);
INSERT INTO ydzc_invt VALUES (20216006, 21009, 5);
INSERT INTO ydzc_invt VALUES (20216007, 21009, 6);
INSERT INTO ydzc_invt VALUES (20216008, 21009, 7);
-- ydzc_spr
INSERT INTO ydzc_spr VALUES (NULL, 'I');
INSERT INTO ydzc_spr VALUES (NULL, 'O');
INSERT INTO ydzc_spr VALUES (NULL, 'I');
INSERT INTO ydzc_spr VALUES (NULL, 'I');
INSERT INTO ydzc_spr VALUES (NULL, 'O');
INSERT INTO ydzc_spr VALUES (NULL, 'O');
INSERT INTO ydzc_spr VALUES (NULL, 'I');
INSERT INTO ydzc_spr VALUES (NULL, 'O');
INSERT INTO ydzc_spr VALUES (NULL, 'O');
INSERT INTO ydzc_spr VALUES (NULL, 'I');
-- ydzc_ind
INSERT INTO ydzc_ind VALUES (1, 'Erwin', 'Smith');
INSERT INTO ydzc_ind VALUES (3, 'Hange', 'Zoe');
INSERT INTO ydzc_ind VALUES (4, 'Levi', 'Ackerman');
INSERT INTO ydzc_ind VALUES (7, 'Kenny', 'Ackerman');
INSERT INTO ydzc_ind VALUES (10, 'Frieda', 'Reiss');
-- ydzc_org
INSERT INTO ydzc_org VALUES (2, 'Google');
INSERT INTO ydzc_org VALUES (5, 'Facebook');
INSERT INTO ydzc_org VALUES (6, 'Twitter');
INSERT INTO ydzc_org VALUES (8, 'Netflix');
INSERT INTO ydzc_org VALUES (9, 'FIFA');
-- ydzc_fund
INSERT INTO ydzc_fund VALUES (500.00, 1, 21006);
INSERT INTO ydzc_fund VALUES (1000.00, 2, 21006);
INSERT INTO ydzc_fund VALUES (1200.00, 3, 21007);
INSERT INTO ydzc_fund VALUES (800.00, 4, 21007);
INSERT INTO ydzc_fund VALUES (600.00, 4, 21008);
INSERT INTO ydzc_fund VALUES (250.00, 5, 21009);
INSERT INTO ydzc_fund VALUES (350.00, 6, 21009);
INSERT INTO ydzc_fund VALUES (450.00, 7, 21010);
-- ydzc_rm
INSERT INTO ydzc_rm VALUES (101, 80);
INSERT INTO ydzc_rm VALUES (102, 80);
INSERT INTO ydzc_rm VALUES (103, 80);
INSERT INTO ydzc_rm VALUES (201, 30);
INSERT INTO ydzc_rm VALUES (202, 50);
INSERT INTO ydzc_rm VALUES (301, 20);
-- ydzc_rmsect
INSERT INTO ydzc_rmsect VALUES (NULL, STR_TO_DATE('01/04/2021', '%d/%m/%Y'), 'A', 50, 101);
INSERT INTO ydzc_rmsect VALUES (NULL, STR_TO_DATE('01/04/2021', '%d/%m/%Y'), 'A', 0, 102);
INSERT INTO ydzc_rmsect VALUES (NULL, STR_TO_DATE('01/04/2021', '%d/%m/%Y'), 'A', 26, 103);
INSERT INTO ydzc_rmsect VALUES (NULL, STR_TO_DATE('01/04/2021', '%d/%m/%Y'), 'B', 15, 101);
INSERT INTO ydzc_rmsect VALUES (NULL, STR_TO_DATE('01/04/2021', '%d/%m/%Y'), 'B', 8, 102);
INSERT INTO ydzc_rmsect VALUES (NULL, STR_TO_DATE('02/04/2021', '%d/%m/%Y'), 'A', 16, 301);
INSERT INTO ydzc_rmsect VALUES (NULL, STR_TO_DATE('02/04/2021', '%d/%m/%Y'), 'D', 20, 301);
INSERT INTO ydzc_rmsect VALUES (NULL, STR_TO_DATE('03/04/2021', '%d/%m/%Y'), 'B', 24, 202);
-- ydzc_resv
INSERT INTO ydzc_resv VALUES (1, 2);
INSERT INTO ydzc_resv VALUES (2, 2);
INSERT INTO ydzc_resv VALUES (3, 2);
INSERT INTO ydzc_resv VALUES (1, 5);
INSERT INTO ydzc_resv VALUES (2, 5);
INSERT INTO ydzc_resv VALUES (5, 6);
INSERT INTO ydzc_resv VALUES (7, 6);
INSERT INTO ydzc_resv VALUES (8, 6);
INSERT INTO ydzc_resv VALUES (9, 6);
-- ydzc_admin
INSERT INTO ydzc_admin VALUES (NULL, '356A192B7913B04C54574D18C28D46E6395428AB');
INSERT INTO ydzc_admin VALUES (NULL, 'DA4B9237BACCCDF19C0760CAB7AEC4A8359010B0');

