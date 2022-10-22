DROP TABLE EMPLOYEE;
DROP TABLE PARTICIPATION;
DROP TABLE ADMIN;
DROP TABLE LOGIN;
DROP TABLE USER;
DROP TABLE ACCOUNT;


CREATE TABLE USER(
userID INT(11) AUTO_INCREMENT  NOT NULL,
fname  CHAR(20) NOT NULL,
lname  CHAR(20) NOT NULL,
MI     CHAR(2),
DOB    DATE NOT NULL,
gender CHAR(1) NOT NULL,
address CHAR(100),
city    CHAR(20),
state   CHAR(10),
zipcode int(5),
email  CHAR(255) NOT NULL,
newUserPassword CHAR(255) NOT NUll,
phone  CHAR(10),

PRIMARY KEY (userID)
);
CREATE TABLE ACCOUNT(
loginRoleID  INT(11) NOT NULL,
PRIMARY KEY (loginRoleID)
);
CREATE TABLE EMPLOYEE(
userID INT(11) NOT NULL,
EmployeeID INT(11) NOT NULL,
PRIMARY KEY (EmployeeID),
FOREIGN KEY (userID) REFERENCES USER(userID)
);

CREATE TABLE PARTICIPATION (
userID INT(11) NOT NULL,
ParticipationID INT(11) NOT NULL,
PRIMARY KEY (ParticipationID),
FOREIGN KEY (userID) REFERENCES USER (userID)
);

CREATE TABLE ADMIN (
userID INT(11) NOT NULL,
AdminID INT(11) NOT NULL,
PRIMARY KEY (AdminID),
FOREIGN KEY (userID) REFERENCES USER (userID)
);

CREATE TABLE LOGIN (
loginRoleID  INT(11) NOT NULL,
userID      INT(11) NOT NULL,
loginEmail  CHAR (255) NOT NULL,
loginPassword CHAR(255),
FOREIGN KEY (loginRoleID) REFERENCES ACCOUNT (loginRoleID),
FOREIGN KEY (userID) REFERENCES USER (userID)

);



-- create name query

CREATE VIEW LOGIN_VIEW AS
SELECT loginRoleID, userID, loginEmail, loginPassword FROM LOGIN;

SELECT * FROM LOGIN_VIEW;
