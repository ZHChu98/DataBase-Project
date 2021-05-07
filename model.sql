CREATE TABLE ydzc_auth (
    auth_id       INT NOT NULL AUTO_INCREMENT COMMENT 'AUTHOR ID',
    auth_password VARCHAR(40) NOT NULL COMMENT 'ANTHOR PASSWORD',
    auth_fname    VARCHAR(20) NOT NULL COMMENT 'AUTHOR FIRST NAME',
    auth_lname    VARCHAR(20) NOT NULL COMMENT 'AUTHOR LAST NAME',
    auth_email    VARCHAR(25) NOT NULL COMMENT 'AUTHOR EMAIL',
    auth_hno      VARCHAR(10) NOT NULL COMMENT 'AUTHOR HOUSE NUMBER',
    auth_st       VARCHAR(20) NOT NULL COMMENT 'AUTHOR STREET',
    auth_city     VARCHAR(20) NOT NULL COMMENT 'AUTHOR CITY',
    auth_state    CHAR(2) NOT NULL COMMENT 'AUTHOR STATE ABBREVIATION',
    auth_country  CHAR(2) NOT NULL COMMENT 'AUTHOR COUNTRY ABBREVIATION',
    auth_zip      INT NOT NULL COMMENT 'AUTHOR ZIPCODE',
	PRIMARY KEY (auth_id)
);

CREATE TABLE ydzc_bk (
    bk_isbn   BIGINT NOT NULL COMMENT 'INTERNATION STANDARD BOOK NUMBER',
    bk_title  VARCHAR(30) NOT NULL COMMENT 'BOOK TITLE',
	PRIMARY KEY (bk_isbn)
);

CREATE TABLE ydzc_bk_auth (
    auth_id  INT NOT NULL,
    bk_isbn  BIGINT NOT NULL,
	PRIMARY KEY (auth_id, bk_isbn),
	FOREIGN KEY (auth_id) REFERENCES ydzc_auth(auth_id),
	FOREIGN KEY (bk_isbn) REFERENCES ydzc_bk(bk_isbn)
);

CREATE TABLE ydzc_top (
    top_name VARCHAR(20) NOT NULL COMMENT 'TOPIC NAME',
	PRIMARY KEY (top_name)
);

CREATE TABLE ydzc_bk_top (
    bk_isbn   BIGINT NOT NULL,
    top_name  VARCHAR(20) NOT NULL,
	PRIMARY KEY (bk_isbn, top_name),
	FOREIGN KEY (bk_isbn) REFERENCES ydzc_bk(bk_isbn),
	FOREIGN KEY (top_name) REFERENCES ydzc_top(top_name)
);

CREATE TABLE ydzc_bkcpy (
    bkcpy_id    INT NOT NULL AUTO_INCREMENT COMMENT 'BOOK COPY ID',
    bkcpy_stat  CHAR(1) NOT NULL COMMENT 'BOOK COPY STATUS: AVAILABLE(Y) OR UNAVAILABLE(N)',
    bk_isbn     BIGINT NOT NULL,
	PRIMARY KEY (bkcpy_id),
	FOREIGN KEY (bk_isbn) REFERENCES ydzc_bk(bk_isbn),
	CHECK(bkcpy_stat in ('Y', 'N'))
);

CREATE TABLE ydzc_cust (
    cust_id       INT NOT NULL AUTO_INCREMENT COMMENT 'CUSTOMER ID',
    cust_password VARCHAR(40) NOT NULL COMMENT 'CUSTOMER PASSWORD',
    cust_fname    VARCHAR(20) NOT NULL COMMENT 'CUSTOMER FIRST NAME',
    cust_lname    VARCHAR(20) NOT NULL COMMENT 'CUSTOMER LAST NAME',
    cust_phone    BIGINT NOT NULL COMMENT 'CUSTOMER PHONE NUMBER',
    cust_email    VARCHAR(30) NOT NULL COMMENT 'CUSTOMER EMAIL',
    cust_idtype   CHAR(1) NOT NULL COMMENT 'CUSTOMER ID TYPE: DRIVER LICENSE(D), PASSPORT(P) OR SSN(S)',
    cust_idno     BIGINT NOT NULL COMMENT 'CUSTOMER ID NUMBER',
	PRIMARY KEY (cust_id),
	CHECK (cust_idtype in ('P', 'S', 'D'))
);

CREATE TABLE ydzc_rent (
    rent_id      INT NOT NULL AUTO_INCREMENT COMMENT 'RENTAL ID',
    rent_stat    CHAR(1) NOT NULL COMMENT 'RENTAL STATUS: BORROWED(B), LATE(L), RETURNED(R)',
    rent_bordt   DATETIME NOT NULL COMMENT 'BORROW DATE',
    rent_erntdt  DATETIME NOT NULL COMMENT 'EXPECTED RETURN DATE',
    rent_arntdt  DATETIME COMMENT 'ACTUAL RETURN DATE',
    bkcpy_id     INT NOT NULL,
    cust_id      INT NOT NULL,
	PRIMARY KEY (rent_id),
	FOREIGN KEY (bkcpy_id) REFERENCES ydzc_bkcpy(bkcpy_id),
	FOREIGN KEY (cust_id) REFERENCES ydzc_cust(cust_id),
	CHECK(rent_stat in ('B', 'L', 'R'))
);

CREATE TABLE ydzc_invc (
    invc_id      INT NOT NULL AUTO_INCREMENT COMMENT 'INVOICE ID',
    invc_date    DATETIME NOT NULL COMMENT 'INVOICE DATE',
    invc_amount  DECIMAL(6, 2) NOT NULL COMMENT 'INVOICE AMOUNT',
    rent_id      INT NOT NULL,
	PRIMARY KEY (invc_id),
	FOREIGN KEY (rent_id) REFERENCES ydzc_rent(rent_id)
);

CREATE TABLE ydzc_pay (
    pay_id      BIGINT NOT NULL AUTO_INCREMENT COMMENT 'PAYMENT ID',
    pay_date    DATETIME NOT NULL COMMENT 'PAYMENT DATE',
    pay_amount  DECIMAL(6, 2) NOT NULL COMMENT 'PAYMENT AMOUNT',
    pay_meth    VARCHAR(8) NOT NULL COMMENT 'PAYMENT METHOD',
    rent_id     INT NOT NULL,
	invc_id 	INT NOT NULL,
	PRIMARY KEY (pay_id),
	FOREIGN KEY (rent_id) REFERENCES ydzc_rent(rent_id),
	FOREIGN KEY (invc_id) REFERENCES ydzc_invc(invc_id),
	CHECK (pay_meth IN ('CREDIT', 'CASH', 'DEBIT', 'PAYPAL'))
);

CREATE TABLE ydzc_cc (
    pay_id     BIGINT NOT NULL COMMENT 'PAYMENT ID',
    paycc_chn  VARCHAR(40) NOT NULL COMMENT 'CREDIT CARD HOLDER NAME',
	PRIMARY KEY (pay_id),
	FOREIGN KEY (pay_id) REFERENCES ydzc_pay(pay_id)
);

CREATE TABLE ydzc_evt (
    evt_id       INT NOT NULL AUTO_INCREMENT COMMENT 'EVENT ID',
    evt_name     VARCHAR(50) NOT NULL COMMENT 'EVENT NAME',
    evt_type     CHAR(1) NOT NULL COMMENT 'EVENT TYPE',
    evt_startdt  DATETIME NOT NULL COMMENT 'EVENT START DATETIME',
    evt_stopdt   DATETIME NOT NULL COMMENT 'EVENT STOP DATETIME',
	PRIMARY KEY (evt_id),
	CHECK (evt_type IN ('E', 'S'))
);

CREATE TABLE ydzc_exh (
    evt_id          INT NOT NULL COMMENT 'EVENT ID',
    evtexh_expense  DECIMAL(6, 2) NOT NULL COMMENT 'EXHIBITION EXPENSE',
	PRIMARY KEY (evt_id),
	FOREIGN KEY (evt_id) REFERENCES ydzc_evt(evt_id)
);

CREATE TABLE ydzc_sem (
    evt_id          INT NOT NULL COMMENT 'EVENT ID',
    evtsem_totfund  DECIMAL(10, 2) NOT NULL COMMENT 'TOTAL FUND AMOUNT',
	PRIMARY KEY (evt_id),
	FOREIGN KEY (evt_id) REFERENCES ydzc_evt(evt_id)
);

CREATE TABLE ydzc_evt_top (
    evt_id    INT NOT NULL,
    top_name  VARCHAR(20) NOT NULL,
	PRIMARY KEY (evt_id, top_name),
	FOREIGN KEY (evt_id) REFERENCES ydzc_evt(evt_id),
	FOREIGN KEY (top_name) REFERENCES ydzc_top(top_name)
);

CREATE TABLE ydzc_reg (
    reg_id   BIGINT NOT NULL AUTO_INCREMENT COMMENT 'REGISTRATION ID FOR AUTHOR TO JOIN SEMINAR',
    evt_id   INT NOT NULL,
    cust_id  INT NOT NULL,
	PRIMARY KEY (reg_id),
	FOREIGN KEY (evt_id) REFERENCES ydzc_exh(evt_id),
	FOREIGN KEY (cust_id) REFERENCES ydzc_cust(cust_id)
);

CREATE TABLE ydzc_invt (
    invt_id  INT NOT NULL AUTO_INCREMENT COMMENT 'INVITATION ID FOR CUSTOMER TO ATTEND EXHIBITION',
    evt_id   INT NOT NULL,
    auth_id  INT NOT NULL,
	PRIMARY KEY (invt_id),
	FOREIGN KEY (evt_id) REFERENCES ydzc_sem(evt_id),
	FOREIGN KEY (auth_id) REFERENCES ydzc_auth(auth_id)
);

CREATE TABLE ydzc_spr (
    spr_id    SMALLINT NOT NULL AUTO_INCREMENT COMMENT 'SPONSOR ID',
    spr_type  CHAR(1) NOT NULL COMMENT 'SPONSOR TYPE: INDIVIDUAL(I) OR ORGANIZATION(O)',
	PRIMARY KEY (spr_id),
	CHECK (spr_type IN ('I', 'O'))
);

CREATE TABLE ydzc_ind (
    spr_id        SMALLINT NOT NULL COMMENT 'SPONSOR ID',
    sprind_fname  VARCHAR(20) NOT NULL COMMENT 'INDIVIDUAL SPONSOR FIRST NAME',
    sprind_lname  VARCHAR(20) NOT NULL COMMENT 'INDIVIDUAL SPONSOR LAST NAME',
	PRIMARY KEY (spr_id),
	FOREIGN KEY (spr_id) REFERENCES ydzc_spr(spr_id)
);

CREATE TABLE ydzc_org (
    spr_id       SMALLINT NOT NULL COMMENT 'SPONSOR ID',
    sprorg_name  VARCHAR(40) NOT NULL COMMENT 'ORGANIZATION SPONSOR NAME',
	PRIMARY KEY (spr_id),
	FOREIGN KEY (spr_id) REFERENCES ydzc_spr(spr_id)
);

CREATE TABLE ydzc_fund (
    fund_amount  DECIMAL(10, 2) NOT NULL COMMENT 'SPONSOR FUND AMOUNT',
    spr_id       SMALLINT NOT NULL,
    evt_id       INT NOT NULL,
	PRIMARY KEY (spr_id, evt_id),
	FOREIGN KEY (spr_id) REFERENCES ydzc_spr(spr_id),
	FOREIGN KEY (evt_id) REFERENCES ydzc_sem(evt_id)
);

CREATE TABLE ydzc_rm (
    rm_id   SMALLINT NOT NULL COMMENT 'ROOM ID',
    rm_cap  SMALLINT NOT NULL COMMENT 'ROOM CAPACITY',
	PRIMARY KEY (rm_id)
);

CREATE TABLE ydzc_rmsect (
    rmsect_id      INT NOT NULL AUTO_INCREMENT COMMENT 'ROOM SECTION ID IDENTIFY DATE AND TIMESLOT',
    rmsect_dt      DATETIME NOT NULL COMMENT 'ROOM SECTION DATE',
    rmsect_ts      CHAR(1) NOT NULL COMMENT 'RESERVATION TIMESLOT: 8AM-10AM(A),11AM-1PM(B),1PM-3PM(C),4PM-6PM(D)',
    rmsect_rmncap  SMALLINT NOT NULL COMMENT 'REMIANING ROOM CAPACITY',
    rm_id          SMALLINT NOT NULL,
	PRIMARY KEY (rmsect_id),
	FOREIGN KEY (rm_id) REFERENCES ydzc_rm(rm_id),
	CHECK(rmsect_ts in ('A', 'B', 'C', 'D'))
);

CREATE TABLE ydzc_resv (
    cust_id    INT NOT NULL,
    rmsect_id  INT NOT NULL,
	PRIMARY KEY (cust_id, rmsect_id),
	FOREIGN KEY (cust_id) REFERENCES ydzc_cust(cust_id),
	FOREIGN KEY (rmsect_id) REFERENCES ydzc_rmsect(rmsect_id)
);

CREATE TABLE ydzc_admin (
    admin_id       	INT NOT NULL AUTO_INCREMENT COMMENT 'ADMINISTRATOR ID',
    admin_password  VARCHAR(40) NOT NULL COMMENT 'ADMINISTRATOR PASSWORD',
    PRIMARY KEY (admin_id)
);

CREATE OR REPLACE VIEW ydzc_cust_evt_v AS
SELECT a.evt_id, a.evt_name, a.evt_startdt, a.evt_stopdt, b.top_name
FROM ydzc_evt a, ydzc_evt_top b
WHERE a.evt_id=b.evt_id AND a.evt_type='E';

CREATE OR REPLACE VIEW ydzc_auth_sem_v AS
SELECT b.evt_id, b.evt_name, b.evt_startdt, b.evt_stopdt, c.invt_id, c.auth_id
FROM ydzc_sem a, ydzc_evt b, ydzc_invt c
WHERE a.evt_id=b.evt_id AND a.evt_id=c.evt_id;

CREATE OR REPLACE VIEW ydzc_auth_bk_v AS
SELECT a.bk_isbn, a.bk_title, b.auth_id
FROM ydzc_bk a, ydzc_auth b, ydzc_bk_auth c
WHERE a.bk_isbn=c.bk_isbn AND b.auth_id=c.auth_id;

CREATE OR REPLACE VIEW ydzc_cust_bk_v AS
SELECT a.bk_isbn, a.bk_title, b.auth_fname, b.auth_lname, d.top_name, f.bkcpy_id, f.bkcpy_stat
FROM ydzc_bk a, ydzc_auth b, ydzc_bk_auth c, ydzc_top d, ydzc_bk_top e, ydzc_bkcpy f
WHERE a.bk_isbn=c.bk_isbn AND b.auth_id=c.auth_id AND a.bk_isbn=e.bk_isbn AND d.top_name=e.top_name AND a.bk_isbn=f.bk_isbn;

CREATE OR REPLACE PROCEDURE ydzc_cust_bk_borrow(IN this_cust_id INT, IN this_bkcpy_id INT)
BEGIN 
    UPDATE ydzc_bkcpy SET bkcpy_stat="N" WHERE bkcpy_id=this_bkcpy_id;
    INSERT INTO ydzc_rent VALUES (NULL, "B", CURRENT_DATE(), DATE_ADD(CURRENT_DATE(), INTERVAL 30 DAY), NULL, this_bkcpy_id, this_cust_id);
END;
