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
    departure_date TIMESTAMP,
    arrive_name VARCHAR2(128),
    arrive_date TIMESTAMP,
    flight_price NUMBER(10),
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
    class_number NUMBER(10),
    seat_number NUMBER(10),
    child NUMBER(1),
    adult NUMBER(1),
    ticket_price NUMBER(10),
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

insert into F_HAS_A (FLIGHT_ID, AIRLINE_ID) values (1, 1);
insert into F_HAS_A (FLIGHT_ID, AIRLINE_ID) values (2, 2);
insert into F_HAS_A (FLIGHT_ID, AIRLINE_ID) values (3, 3);
insert into F_HAS_A (FLIGHT_ID, AIRLINE_ID) values (4, 4);
insert into F_HAS_A (FLIGHT_ID, AIRLINE_ID) values (5, 5);
insert into F_HAS_A (FLIGHT_ID, AIRLINE_ID) values (6, 6);
insert into F_HAS_A (FLIGHT_ID, AIRLINE_ID) values (7, 7);
insert into F_HAS_A (FLIGHT_ID, AIRLINE_ID) values (8, 8);
insert into F_HAS_A (FLIGHT_ID, AIRLINE_ID) values (9, 9);
insert into F_HAS_A (FLIGHT_ID, AIRLINE_ID) values (10, 10);
insert into F_HAS_A (FLIGHT_ID, AIRLINE_ID) values (11, 11);
insert into F_HAS_A (FLIGHT_ID, AIRLINE_ID) values (12, 12);
insert into F_HAS_A (FLIGHT_ID, AIRLINE_ID) values (13, 13);
insert into F_HAS_A (FLIGHT_ID, AIRLINE_ID) values (14, 14);
insert into F_HAS_A (FLIGHT_ID, AIRLINE_ID) values (15, 15);
insert into F_HAS_A (FLIGHT_ID, AIRLINE_ID) values (16, 16);
insert into F_HAS_A (FLIGHT_ID, AIRLINE_ID) values (17, 17);
insert into F_HAS_A (FLIGHT_ID, AIRLINE_ID) values (18, 18);

insert into F_HAS_H (FLIGHT_ID, HOTEL_ID) values (1, 1);
insert into F_HAS_H (FLIGHT_ID, HOTEL_ID) values (2, 2);
insert into F_HAS_H (FLIGHT_ID, HOTEL_ID) values (3, 3);
insert into F_HAS_H (FLIGHT_ID, HOTEL_ID) values (4, 4);
insert into F_HAS_H (FLIGHT_ID, HOTEL_ID) values (5, 5);
insert into F_HAS_H (FLIGHT_ID, HOTEL_ID) values (6, 6);
insert into F_HAS_H (FLIGHT_ID, HOTEL_ID) values (7, 7);
insert into F_HAS_H (FLIGHT_ID, HOTEL_ID) values (8, 8);
insert into F_HAS_H (FLIGHT_ID, HOTEL_ID) values (9, 9);
insert into F_HAS_H (FLIGHT_ID, HOTEL_ID) values (10, 10);
insert into F_HAS_H (FLIGHT_ID, HOTEL_ID) values (11, 11);
insert into F_HAS_H (FLIGHT_ID, HOTEL_ID) values (12, 12);
insert into F_HAS_H (FLIGHT_ID, HOTEL_ID) values (13, 1);
insert into F_HAS_H (FLIGHT_ID, HOTEL_ID) values (14, 2);
insert into F_HAS_H (FLIGHT_ID, HOTEL_ID) values (15, 3);
insert into F_HAS_H (FLIGHT_ID, HOTEL_ID) values (16, 4);
insert into F_HAS_H (FLIGHT_ID, HOTEL_ID) values (17, 5);
insert into F_HAS_H (FLIGHT_ID, HOTEL_ID) values (18, 6);



INSERT INTO FLIGHT VALUES(SEQ_FLIGHT.nextval, 'Budapest', TO_DATE('2021/05/16 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 'London', TO_DATE('2021/05/24 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 10000);
INSERT INTO FLIGHT VALUES(SEQ_FLIGHT.nextval, 'Budapest', TO_DATE('2021/05/24 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 'London', TO_DATE('2021/05/31 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 10000);
INSERT INTO FLIGHT VALUES(SEQ_FLIGHT.nextval, 'Budapest', TO_DATE('2021/05/28 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 'London', TO_DATE('2021/06/04 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 10000);
INSERT INTO FLIGHT VALUES(SEQ_FLIGHT.nextval, 'Budapest', TO_DATE('2021/05/16 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 'Róma', TO_DATE('2021/05/24 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 10000);
INSERT INTO FLIGHT VALUES(SEQ_FLIGHT.nextval, 'Budapest', TO_DATE('2021/05/24 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 'Róma', TO_DATE('2021/05/31 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 10000);
INSERT INTO FLIGHT VALUES(SEQ_FLIGHT.nextval, 'Budapest', TO_DATE('2021/05/28 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 'Róma', TO_DATE('2021/06/04 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 10000);
INSERT INTO FLIGHT VALUES(SEQ_FLIGHT.nextval, 'Budapest', TO_DATE('2021/05/16 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 'Barcelona', TO_DATE('2021/05/24 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 10000);
INSERT INTO FLIGHT VALUES(SEQ_FLIGHT.nextval, 'Budapest', TO_DATE('2021/05/24 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 'Barcelona', TO_DATE('2021/05/31 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 10000);
INSERT INTO FLIGHT VALUES(SEQ_FLIGHT.nextval, 'Budapest', TO_DATE('2021/05/28 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 'Barcelona', TO_DATE('2021/06/04 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 10000);
INSERT INTO FLIGHT VALUES(SEQ_FLIGHT.nextval, 'Budapest', TO_DATE('2021/05/16 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 'Berlin', TO_DATE('2021/05/24 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 10000);
INSERT INTO FLIGHT VALUES(SEQ_FLIGHT.nextval, 'Budapest', TO_DATE('2021/05/24 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 'Berlin', TO_DATE('2021/05/31 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 10000);
INSERT INTO FLIGHT VALUES(SEQ_FLIGHT.nextval, 'Budapest', TO_DATE('2021/05/28 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 'Berlin', TO_DATE('2021/06/04 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 10000);
INSERT INTO FLIGHT VALUES(SEQ_FLIGHT.nextval, 'Budapest', TO_DATE('2021/05/16 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 'Milánó', TO_DATE('2021/05/24 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 10000);
INSERT INTO FLIGHT VALUES(SEQ_FLIGHT.nextval, 'Budapest', TO_DATE('2021/05/24 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 'Milánó', TO_DATE('2021/05/31 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 10000);
INSERT INTO FLIGHT VALUES(SEQ_FLIGHT.nextval, 'Budapest', TO_DATE('2021/05/28 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 'Milánó', TO_DATE('2021/06/04 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 10000);
INSERT INTO FLIGHT VALUES(SEQ_FLIGHT.nextval, 'Budapest', TO_DATE('2021/05/16 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 'Dubai', TO_DATE('2021/05/24 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 10000);
INSERT INTO FLIGHT VALUES(SEQ_FLIGHT.nextval, 'Budapest', TO_DATE('2021/05/24 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 'Dubai', TO_DATE('2021/05/31 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 10000);
INSERT INTO FLIGHT VALUES(SEQ_FLIGHT.nextval, 'Budapest', TO_DATE('2021/05/28 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 'Dubai', TO_DATE('2021/06/04 14:00:00', 'YYYY/MM/DD HH24:MI:SS'), 10000);


INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Aegean Airlines');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Aer Lingus');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Aeroflot');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Air Algerie');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Air Baltic');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Air Serbia');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Air Transat');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Alitalia');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'American Airlines');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Asiana Airlines');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Austrian Airlines');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Bangkok Airways');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'British Airways');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Brussels Airways');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Cathay Pacific');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'China Airlines');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'China Eastern Airlines');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'China Southern Airlines');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Condor');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Czech Airlines');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Delta');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'EasyJet');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'EgyptAir');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'EL AL');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Emirates');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Etidhad Airways');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Eurowings');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'EVA AIR');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Finnair');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Flybe');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'flydubai');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Frontier');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Hainan Airlines');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Iberian Airlines');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Iran Air');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Jet2');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Jetblue');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Jetstar');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'KLM');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Korean Air');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Laudamotion');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Lufthansa');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Norwegian Air Shuttle');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Qatar Airways');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Ryanair');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'S7 Airlines');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Scandinavian Airlines');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Singapore Airlines');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Smartwings');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'South African Airways');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Spirit Airlines');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'SunExpress');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'SWISS');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'TAP Air Portugal');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Tarom');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Thai Airways');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Transavia');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Turkish Airlines');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Ukraine International Airlines');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'United Airlines');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Ural Airlines');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Virgin Australia');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Vueling Airlines');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'Wizz Air');
INSERT INTO airline VALUES(SEQ_AIRLINE.nextval, 'XiamenAir');


INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'Airbus A300',220);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'Airbus A310',218);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'Airbus A320',150);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'Antonov An-24',50);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'BAC VC-10',130);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'BAe (HS) 748',40);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'BAe /BAC/ One-Eleven 475',89);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'BAe 146',111);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'Boeing 707',219);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'Boeing 727',163);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'Boeing 737',110);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'Boeing 747',420);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'DHC-5 Buffalo',35);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'DHC-6 Twin Otter',20);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'DHC-7 Dash 7',54);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'DHC-8 Dash 8',40);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'Dornier 228',19);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'Fokker F27 Friendship',52);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'Fokker F28 Fellowship',85);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'Iljusin Il-18 Moszkva',85);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'Iljusin Il-62',186);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'Iljusin Il-86',350);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'Jakovlev Jak-40',32);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'Jakovlev Jak-42',120);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'Lockheed L-1011 Tristar',400);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'McDonnell Douglas DC-8',251);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'McDonnell Douglas DC-9',172);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'McDonnell Douglas DC-10',345);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'Tupoljev Tu-134',80);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'Tupoljev Tu-154',169);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'Concorde',144);
INSERT INTO AIRPLANE VALUES(SEQ_AIRPLANE.nextval,'Tupoljev Tu-144',140);


INSERT INTO HOTEL VALUES(SEQ_HOTEL.nextval, 'Central Park Hotel, London');
INSERT INTO HOTEL VALUES(SEQ_HOTEL.nextval, 'Royal Eagle, London');
INSERT INTO HOTEL VALUES(SEQ_HOTEL.nextval, 'The Tower A Guoman Hotel, London');
INSERT INTO HOTEL VALUES(SEQ_HOTEL.nextval, 'Villa Eur Parco Dei Pini, Róma');
INSERT INTO HOTEL VALUES(SEQ_HOTEL.nextval, 'Atlante Star Hotel, Róma');
INSERT INTO HOTEL VALUES(SEQ_HOTEL.nextval, 'Hotel Serena, Róma');
INSERT INTO HOTEL VALUES(SEQ_HOTEL.nextval, 'Travelodge Barcelona Poblenou , Barcelona');
INSERT INTO HOTEL VALUES(SEQ_HOTEL.nextval, 'Barcelona Princess , Barcelona');
INSERT INTO HOTEL VALUES(SEQ_HOTEL.nextval, 'Hotel Barcelona Center, Barcelona');
INSERT INTO HOTEL VALUES(SEQ_HOTEL.nextval, 'Atana Hotel , Dubai');
INSERT INTO HOTEL VALUES(SEQ_HOTEL.nextval, 'Wyndham Dubai Marina , Dubai');
INSERT INTO HOTEL VALUES(SEQ_HOTEL.nextval, 'Five Jumeirah Village, Dubai');


INSERT INTO INSURANCE_COMPANY VALUES(seq_insurance_company.nextval, 'HTH WorldWide');
INSERT INTO INSURANCE_COMPANY VALUES(seq_insurance_company.nextval, 'John Hancock Insurance Agency');
INSERT INTO INSURANCE_COMPANY VALUES(seq_insurance_company.nextval, 'Seven Corners');
INSERT INTO INSURANCE_COMPANY VALUES(seq_insurance_company.nextval, 'Trawick International');
INSERT INTO INSURANCE_COMPANY VALUES(seq_insurance_company.nextval, 'USI Affinity Travel Insurance Services');
INSERT INTO INSURANCE_COMPANY VALUES(seq_insurance_company.nextval, 'AIG Travel');
INSERT INTO INSURANCE_COMPANY VALUES(seq_insurance_company.nextval, 'April International');
INSERT INTO INSURANCE_COMPANY VALUES(seq_insurance_company.nextval, 'AXA Assistance USA');
INSERT INTO INSURANCE_COMPANY VALUES(seq_insurance_company.nextval, 'Generali Global Assistance');
INSERT INTO INSURANCE_COMPANY VALUES (seq_insurance_company.nextval, 'Nationwide');
INSERT INTO INSURANCE_COMPANY VALUES (seq_insurance_company.nextval, 'CF Travel Insured');
INSERT INTO INSURANCE_COMPANY VALUES (seq_insurance_company.nextval, 'Tin Leg');
INSERT INTO INSURANCE_COMPANY VALUES (seq_insurance_company.nextval, 'TravelSafe');
INSERT INTO INSURANCE_COMPANY VALUES (seq_insurance_company.nextval, 'Travelex');
INSERT INTO INSURANCE_COMPANY VALUES (seq_insurance_company.nextval, 'Berkshire Hathaway Travel Protection');


INSERT INTO INSURANCE VALUES (SEQ_INSURANCE.nextval,'TripProtector', 1000);
INSERT INTO INSURANCE VALUES (SEQ_INSURANCE.nextval,'Gold', 2000);
INSERT INTO INSURANCE VALUES (SEQ_INSURANCE.nextval,'RoundTrip Elite', 3000);
INSERT INTO INSURANCE VALUES (SEQ_INSURANCE.nextval,'Safe Travels Voyager', 2000);
INSERT INTO INSURANCE VALUES (SEQ_INSURANCE.nextval,'Travel Insurance Select - Elite', 1000);
INSERT INTO INSURANCE VALUES (SEQ_INSURANCE.nextval,'Deluxe', 4000);
INSERT INTO INSURANCE VALUES (SEQ_INSURANCE.nextval,'VIP plan', 10000);
INSERT INTO INSURANCE VALUES (SEQ_INSURANCE.nextval,'Platinum', 5000);
INSERT INTO INSURANCE VALUES (SEQ_INSURANCE.nextval,'Premium', 6000);
INSERT INTO INSURANCE VALUES (SEQ_INSURANCE.nextval,'Prime', 4000);
INSERT INTO INSURANCE VALUES (SEQ_INSURANCE.nextval,'Worldwide Trip Protector Plus', 3000);
INSERT INTO INSURANCE VALUES (SEQ_INSURANCE.nextval,'Tin Leg Gold', 2000);
INSERT INTO INSURANCE VALUES (SEQ_INSURANCE.nextval,'Classic', 1500);
INSERT INTO INSURANCE VALUES (SEQ_INSURANCE.nextval,'Travel Select', 2000);
INSERT INTO INSURANCE VALUES (SEQ_INSURANCE.nextval,'LuxuryCare', 11000);