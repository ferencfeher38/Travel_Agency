DROP TABLE Users CASCADE CONSTRAINTS;
DROP TABLE Flight CASCADE CONSTRAINTS;
DROP TABLE Ticket CASCADE CONSTRAINTS;
DROP TABLE T_HAS_IC;
DROP TABLE Insurance_Company;
DROP SEQUENCE seq_users;
DROP SEQUENCE seq_flight;
DROP SEQUENCE seq_ticket;
DROP SEQUENCE seq_insurance_company;

CREATE SEQUENCE seq_users
    MINVALUE 1
    START WITH 1
    INCREMENT BY 1;

CREATE TABLE Users(
    user_id NUMBER(6) NOT NULL,
    username VARCHAR2(30),
    user_email VARCHAR2(128) NOT NULL,
    password VARCHAR2(255),
    permission_id NUMBER(6),
    permission_name VARCHAR2(30),
    PRIMARY KEY(user_id,user_email)
);
    
INSERT INTO Users(user_id,username,user_email,permission_id,permission_name) VALUES (SEQ_USERS.nextval, 'davad', 'davad@coolmail.com', 1, 'ugyintezo');
INSERT INTO Users(user_id,username,user_email,permission_id,permission_name) VALUES (SEQ_USERS.nextval, 'bence', 'bence@coolmail.com', 1, 'felhasznalo');
    
CREATE SEQUENCE seq_flight
    MINVALUE 1
    START WITH 1
    INCREMENT BY 1;
    
CREATE TABLE Flight(
    flight_id NUMBER(6),
    departure_name VARCHAR2(128),
    departure_date DATE,
    arrive_name VARCHAR2(128),
    arrive_date DATE,
    PRIMARY KEY(flight_id)
);
    
CREATE SEQUENCE seq_ticket
    MINVALUE 1
    START WITH 1
    INCREMENT BY 1;
    
CREATE TABLE Ticket(
    ticket_id NUMBER(6) NOT NULL,
    user_id NUMBER(6) NOT NULL,
    user_email VARCHAR2(128),
    flight_id NUMBER(6) NOT NULL,
    ticket_price NUMBER(10),
    class_number NUMBER(10),
    seat_number NUMBER(10),
    child NUMBER(1),
    adult NUMBER(1),
    PRIMARY KEY(ticket_id),
    FOREIGN KEY(user_id,user_email) REFERENCES Users(user_id,user_email) ON DELETE SET NULL ENABLE,
    FOREIGN KEY(flight_id) REFERENCES Flight(flight_id) ON DELETE SET NULL ENABLE
);

CREATE SEQUENCE seq_insurance_company
    MINVALUE 1
    START WITH 1
    INCREMENT BY 1;

CREATE TABLE Insurance_Company(
    ic_id NUMBER(6) NOT NULL,
    ic_name VARCHAR2(128),
    PRIMARY KEY (ic_id)
);

CREATE TABLE T_HAS_IC(
    ticket_id NUMBER(6),
    ic_id NUMBER(6),
    FOREIGN KEY(ticket_id) REFERENCES Ticket(ticket_id) ON DELETE SET NULL ENABLE,
    FOREIGN KEY(ic_id) REFERENCES Insurance_Company(ic_id) ON DELETE SET NULL ENABLE,
    PRIMARY KEY(ticket_id,ic_id)
);