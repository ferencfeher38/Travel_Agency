DROP TABLE Users CASCADE CONSTRAINTS;
DROP TABLE Flight CASCADE CONSTRAINTS;
DROP TABLE Ticket CASCADE CONSTRAINTS;
DROP TABLE INSURANCE CASCADE CONSTRAINTS;
DROP TABLE HOTEL CASCADE CONSTRAINTS;
DROP TABLE AIRLINE CASCADE CONSTRAINTS;
DROP TABLE AIRPLANE CASCADE CONSTRAINTS;
DROP TABLE Insurance_Company CASCADE CONSTRAINTS;
DROP TABLE T_HAS_IC;
DROP TABLE IC_HAS_I;
DROP TABLE F_HAS_H;
DROP TABLE F_HAS_A;
DROP TABLE A_HAS_A;
DROP SEQUENCE seq_users;
DROP SEQUENCE seq_flight;
DROP SEQUENCE seq_ticket;
DROP SEQUENCE seq_insurance_company;
DROP SEQUENCE SEQ_INSURANCE;
DROP SEQUENCE SEQ_HOTEL;
DROP SEQUENCE SEQ_AIRLINE;
DROP SEQUENCE SEQ_AIRPLANE;

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
  
CREATE SEQUENCE SEQ_INSURANCE
    MINVALUE 1
    START WITH 1
    INCREMENT BY 1;
    
CREATE TABLE INSURANCE(
    insurance_id NUMBER(6),
    insurance_name VARCHAR2(128),
    insurance_price NUMBER(10),
    PRIMARY KEY(insurance_id)
);

CREATE SEQUENCE SEQ_HOTEL
    MINVALUE 1
    START WITH 1
    INCREMENT BY 1;
    
CREATE TABLE HOTEL(
    hotel_id NUMBER(6),
    hotel_name VARCHAR2(128),
    PRIMARY KEY(hotel_id)
);

CREATE SEQUENCE SEQ_AIRLINE
    MINVALUE 1
    START WITH 1
    INCREMENT BY 1;
    
CREATE TABLE AIRLINE(
    airline_id NUMBER(6),
    airline_name VARCHAR2(128),
    PRIMARY KEY(airline_id)
);

CREATE SEQUENCE SEQ_AIRPLANE
    MINVALUE 1
    START WITH 1
    INCREMENT BY 1;
    
CREATE TABLE AIRPLANE(
    airplane_id NUMBER(6),
    airplane_name VARCHAR2(128),
    capacity NUMBER(6),
    PRIMARY KEY(airplane_id) 
);

CREATE TABLE A_HAS_A(
    airline_id NUMBER(6),
    airplane_id NUMBER(6),
    PRIMARY KEY(airline_id, airplane_id),
    FOREIGN KEY(airplane_id) REFERENCES AIRPLANE(airplane_id) ON DELETE SET NULL ENABLE,
    FOREIGN KEY(airline_id) REFERENCES AIRLINE(airline_id) ON DELETE SET NULL ENABLE
);

CREATE TABLE F_HAS_A(
    flight_id NUMBER(6),
    airline_id NUMBER(6),
    PRIMARY KEY(flight_id, airline_id),
    FOREIGN KEY(flight_id) REFERENCES Flight(flight_id) ON DELETE SET NULL ENABLE,
    FOREIGN KEY(airline_id) REFERENCES AIRLINE(airline_id) ON DELETE SET NULL ENABLE
);

CREATE TABLE F_HAS_H(
    flight_id NUMBER(6),
    hotel_id NUMBER(6),
    PRIMARY KEY(flight_id, hotel_id),
    FOREIGN KEY(flight_id) REFERENCES Flight(flight_id) ON DELETE SET NULL ENABLE,
    FOREIGN KEY(hotel_id) REFERENCES HOTEL(hotel_id) ON DELETE SET NULL ENABLE
);

CREATE TABLE IC_HAS_I(
    ic_id NUMBER(6),
    insurance_id NUMBER(6),
    PRIMARY KEY(ic_id, insurance_id),
    FOREIGN KEY(ic_id) REFERENCES Insurance_Company(ic_id) ON DELETE SET NULL ENABLE,
    FOREIGN KEY(insurance_id) REFERENCES INSURANCE(insurance_id) ON DELETE SET NULL ENABLE
);

CREATE TABLE T_HAS_IC(
    ticket_id NUMBER(6),
    ic_id NUMBER(6),
    FOREIGN KEY(ticket_id) REFERENCES Ticket(ticket_id) ON DELETE SET NULL ENABLE,
    FOREIGN KEY(ic_id) REFERENCES Insurance_Company(ic_id) ON DELETE SET NULL ENABLE,
    PRIMARY KEY(ticket_id,ic_id)
);
    
