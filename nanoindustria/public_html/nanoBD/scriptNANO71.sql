-- Generado por Oracle SQL Developer Data Modeler 17.2.0.188.1104
--   en:        2017-07-22 22:32:08 COT
--   sitio:      DB2/UDB 7.1
--   tipo:      DB2/UDB 7.1



CREATE TABLE c_size (
    id_co_size         VARCHAR(50) NOT NULL,
    size_description   VARCHAR(50) NOT NULL
);

ALTER TABLE c_size ADD CONSTRAINT c_size_pk PRIMARY KEY ( id_co_size );

CREATE TABLE city (
    id_city          VARCHAR(50) NOT NULL,
    city_name        VARCHAR(50) NOT NULL,
    state_id_state   VARCHAR(50) NOT NULL
);

ALTER TABLE city ADD CONSTRAINT city_pk PRIMARY KEY ( id_city );

CREATE TABLE company 
    (
     id_company VARCHAR (50) NOT NULL , 
     company_name VARCHAR (50) NOT NULL , 
     company_address VARCHAR (50) NOT NULL , 
     company_phone VARCHAR (50) , 
     ciiu_code VARCHAR (50) , 
     security_protocol CHAR (1) , 
     patents_id_patents VARCHAR (50) NOT NULL , 
     c_size_id_co_size VARCHAR (50) NOT NULL , 
     final_p_id_fprod VARCHAR (50) NOT NULL , 
     state_id_state VARCHAR (50) NOT NULL , 
     city_id_city VARCHAR (50) NOT NULL , 
     country_id_country VARCHAR (50) NOT NULL , 
     section_id_section VARCHAR (50) NOT NULL , 
     division_id_division VARCHAR (50) NOT NULL , 
     Group_id_group VARCHAR (50) NOT NULL , 
     headquarter_id_headq VARCHAR (50) NOT NULL , 
     university_id_univ VARCHAR (50) NOT NULL 
    )
;
CREATE UNIQUE INDEX company__IDX
    ON company 
    ( 
     city_id_city ASC 
    ) 
    PCTFREE 10 
    DISALLOW REVERSE SCANS 
;
CREATE UNIQUE INDEX company__IDXv1
    ON company 
    ( 
     country_id_country ASC 
    ) 
    PCTFREE 10 
    DISALLOW REVERSE SCANS 
;
CREATE UNIQUE INDEX company__IDXv2
    ON company 
    ( 
     c_size_id_co_size ASC 
    ) 
    PCTFREE 10 
    DISALLOW REVERSE SCANS 
;
CREATE UNIQUE INDEX company__IDXv3
    ON company 
    ( 
     division_id_division ASC 
    ) 
    PCTFREE 10 
    DISALLOW REVERSE SCANS 
;
CREATE UNIQUE INDEX company__IDXv4
    ON company 
    ( 
     Group_id_group ASC 
    ) 
    PCTFREE 10 
    DISALLOW REVERSE SCANS 
;
CREATE UNIQUE INDEX company__IDXv5
    ON company 
    ( 
     headquarter_id_headq ASC 
    ) 
    PCTFREE 10 
    DISALLOW REVERSE SCANS 
;
CREATE UNIQUE INDEX company__IDXv6
    ON company 
    ( 
     section_id_section ASC 
    ) 
    PCTFREE 10 
    DISALLOW REVERSE SCANS 
;
CREATE UNIQUE INDEX company__IDXv7
    ON company 
    ( 
     state_id_state ASC 
    ) 
    PCTFREE 10 
    DISALLOW REVERSE SCANS 
;

ALTER TABLE company ADD CONSTRAINT company_pk PRIMARY KEY ( id_company );

CREATE TABLE country (
    id_country     VARCHAR(50) NOT NULL,
    name_country   VARCHAR(50) NOT NULL
);

ALTER TABLE country ADD CONSTRAINT country_pk PRIMARY KEY ( id_country );

CREATE TABLE division (
    id_division          VARCHAR(50) NOT NULL,
    division_name        VARCHAR(50) NOT NULL,
    section_id_section   VARCHAR(50) NOT NULL
);

ALTER TABLE division ADD CONSTRAINT division_pk PRIMARY KEY ( id_division );

CREATE TABLE final_p 
    (
     id_fprod VARCHAR (50) NOT NULL , 
     description_final_product VARCHAR (50) NOT NULL , 
     valuechainp_id_vchainpos VARCHAR (50) NOT NULL 
    )
;
CREATE UNIQUE INDEX final_p__IDX
    ON final_p 
    ( 
     valuechainp_id_vchainpos ASC 
    ) 
    PCTFREE 10 
    DISALLOW REVERSE SCANS 
;

ALTER TABLE final_p ADD CONSTRAINT final_p_pk PRIMARY KEY ( id_fprod );

CREATE TABLE "Group" (
    id_group               VARCHAR(50) NOT NULL,
    group_name             VARCHAR(50) NOT NULL,
    division_id_division   VARCHAR(50) NOT NULL
);

ALTER TABLE "Group" ADD CONSTRAINT group_pk PRIMARY KEY ( id_group );

CREATE TABLE headquarter (
    id_headq                  VARCHAR(50) NOT NULL,
    headquarter_description   VARCHAR(50) NOT NULL
);

ALTER TABLE headquarter ADD CONSTRAINT headquarter_pk PRIMARY KEY ( id_headq );

CREATE TABLE patents (
    id_patents    VARCHAR(50) NOT NULL,
    description   VARCHAR(50) NOT NULL
);

ALTER TABLE patents ADD CONSTRAINT patents_pk PRIMARY KEY ( id_patents );

CREATE TABLE section (
    id_section     VARCHAR(50) NOT NULL,
    section_name   VARCHAR(50) NOT NULL
);

ALTER TABLE section ADD CONSTRAINT section_pk PRIMARY KEY ( id_section );

CREATE TABLE state (
    id_state             VARCHAR(50) NOT NULL,
    state_name           VARCHAR(50) NOT NULL,
    country_id_country   VARCHAR(50) NOT NULL
);

ALTER TABLE state ADD CONSTRAINT state_pk PRIMARY KEY ( id_state );

CREATE TABLE university (
    id_univ           VARCHAR(50) NOT NULL,
    university_name   VARCHAR(50) NOT NULL
);

ALTER TABLE university ADD CONSTRAINT university_pk PRIMARY KEY ( id_univ );

CREATE TABLE valuechainp (
    id_vchainpos               VARCHAR(50) NOT NULL,
    description_value_chain    VARCHAR(50) NOT NULL,
    final_p_id_final_product   VARCHAR(50) NOT NULL
);

ALTER TABLE valuechainp ADD CONSTRAINT valuechainp_pk PRIMARY KEY ( id_vchainpos );

ALTER TABLE city
    ADD CONSTRAINT city_state_FK FOREIGN KEY
    ( 
     state_id_state
    ) 
    REFERENCES state 
    ( 
     id_state
    )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
;

ALTER TABLE company
    ADD CONSTRAINT company_c_size_FK FOREIGN KEY
    ( 
     c_size_id_co_size
    ) 
    REFERENCES c_size 
    ( 
     id_co_size
    )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
;

ALTER TABLE company
    ADD CONSTRAINT company_city_FK FOREIGN KEY
    ( 
     city_id_city
    ) 
    REFERENCES city 
    ( 
     id_city
    )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
;

ALTER TABLE company
    ADD CONSTRAINT company_country_FK FOREIGN KEY
    ( 
     country_id_country
    ) 
    REFERENCES country 
    ( 
     id_country
    )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
;

ALTER TABLE company
    ADD CONSTRAINT company_division_FK FOREIGN KEY
    ( 
     division_id_division
    ) 
    REFERENCES division 
    ( 
     id_division
    )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
;

ALTER TABLE company
    ADD CONSTRAINT company_final_p_FK FOREIGN KEY
    ( 
     final_p_id_fprod
    ) 
    REFERENCES final_p 
    ( 
     id_fprod
    )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
;

ALTER TABLE company
    ADD CONSTRAINT company_Group_FK FOREIGN KEY
    ( 
     Group_id_group
    ) 
    REFERENCES "Group" 
    ( 
     id_group
    )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
;

ALTER TABLE company
    ADD CONSTRAINT company_headquarter_FK FOREIGN KEY
    ( 
     headquarter_id_headq
    ) 
    REFERENCES headquarter 
    ( 
     id_headq
    )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
;

ALTER TABLE company
    ADD CONSTRAINT company_patents_FK FOREIGN KEY
    ( 
     patents_id_patents
    ) 
    REFERENCES patents 
    ( 
     id_patents
    )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
;

ALTER TABLE company
    ADD CONSTRAINT company_section_FK FOREIGN KEY
    ( 
     section_id_section
    ) 
    REFERENCES section 
    ( 
     id_section
    )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
;

ALTER TABLE company
    ADD CONSTRAINT company_state_FK FOREIGN KEY
    ( 
     state_id_state
    ) 
    REFERENCES state 
    ( 
     id_state
    )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
;

ALTER TABLE company
    ADD CONSTRAINT company_university_FK FOREIGN KEY
    ( 
     university_id_univ
    ) 
    REFERENCES university 
    ( 
     id_univ
    )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
;

ALTER TABLE division
    ADD CONSTRAINT division_section_FK FOREIGN KEY
    ( 
     section_id_section
    ) 
    REFERENCES section 
    ( 
     id_section
    )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
;

ALTER TABLE final_p
    ADD CONSTRAINT final_p_valuechainp_FK FOREIGN KEY
    ( 
     valuechainp_id_vchainpos
    ) 
    REFERENCES valuechainp 
    ( 
     id_vchainpos
    )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
;

ALTER TABLE "Group"
    ADD CONSTRAINT Group_division_FK FOREIGN KEY
    ( 
     division_id_division
    ) 
    REFERENCES division 
    ( 
     id_division
    )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
;

ALTER TABLE state
    ADD CONSTRAINT state_country_FK FOREIGN KEY
    ( 
     country_id_country
    ) 
    REFERENCES country 
    ( 
     id_country
    )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
;



-- Informe de Resumen de Oracle SQL Developer Data Modeler: 
-- 
-- CREATE TABLE                            13
-- CREATE INDEX                             9
-- ALTER TABLE                             29
-- CREATE VIEW                              0
-- ALTER VIEW                               0
-- CREATE PACKAGE                           0
-- CREATE PACKAGE BODY                      0
-- CREATE PROCEDURE                         0
-- CREATE FUNCTION                          0
-- CREATE TRIGGER                           0
-- ALTER TRIGGER                            0
-- CREATE STRUCTURED TYPE                   0
-- CREATE ALIAS                             0
-- CREATE BUFFERPOOL                        0
-- CREATE DATABASE                          0
-- CREATE DISTINCT TYPE                     0
-- CREATE INSTANCE                          0
-- CREATE NODE GROUP                        0
-- CREATE TABLESPACE                        0
-- 
-- DROP TABLESPACE                          0
-- DROP DATABASE                            0
-- 
-- ERRORS                                   0
-- WARNINGS                                 0
