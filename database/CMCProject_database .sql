
CREATE TABLE EMPLOYEE(
employeeID INT(11) AUTO_INCREMENT NOT NULL,
empfname  CHAR(20) NOT NULL,
emplname  CHAR(20) NOT NULL,
empMI     CHAR(20),
empDOB	DATE NOT NULL,
empStreet CHAR(255) NOT NULL,
empCity CHAR(255) NOT NULL,
empState CHAR(10) NOT NULL,
empZipcode CHAR(11) NOT NULL,
empCounty VARCHAR(50),
empPhone	CHAR(20) NOT NULL,
empGender CHAR(50) NOT NULL,
empRaces CHAR(50) NOT NULL,
email CHAR(255) NOT NULL,
employeeRole CHAR(255) NOT NULL,
userPassword CHAR(255) NOT NULL,
programMember CHAR(255) NOT NULL,
empStatus BOOLEAN DEFAULT 1,
PRIMARY KEY (employeeID)
);

CREATE TABLE ADMIN(
adminID INT(11) AUTO_INCREMENT NOT NULL,
employeeID INT(11) NOT NULL,
PRIMARY KEY (adminID),
FOREIGN KEY (employeeID) REFERENCES EMPLOYEE (employeeID) ON DELETE CASCADE
);

CREATE TABLE PARTICIPATION(
userID INT(11) AUTO_INCREMENT  NOT NULL,
fname  CHAR(20) NOT NULL,
lname  CHAR(20) NOT NULL,
MI     CHAR(2),
email CHAR(255) NOT NULL,
newUserPassword CHAR(255) NOT NUll,
programPartnerReference CHAR(255) NOT NULL,
last4SSN INT(5) NOT NULL,
DOB    DATE NOT NULL,
gender CHAR(50) NOT NULL,
primaryPhone CHAR(20) NOT NULL,
phoneNumType CHAR(15) NOT NULL,
altPhone CHAR(20),
status INT(1) DEFAULT 0,
activation_code VARCHAR(255) NOT NULL,
activation_expiry DATETIME NOT NULL,
activated_at DATETIME	DEFAULT NULL,
created_at TIMESTAMP NOT NULL DEFAULT current_timestamp(),
updated_at DATETIME DEFAULT current_timestamp() ON UPDATE current_timestamp(),
PRIMARY KEY (userID)
);

CREATE TABLE ADDRESS(
userID INT(11) NOT NULL,
street CHAR(255)NOT NULL,
city CHAR(255)NOT NULL,
state CHAR(255)NOT NULL,
zipcode CHAR(11)NOT NULL,
county CHAR (255),
mailingStreet CHAR(255),
mailingCity CHAR(255),
mailingState CHAR(255),
mailingZipcode CHAR(11),
mailingCounty CHAR (255),
FOREIGN KEY (userID) REFERENCES PARTICIPATION (userID) ON DELETE CASCADE
);

CREATE TABLE COACH(

userID INT(11) NOT NULL,
employeeID INT(11) NOT NULL,
accepted INT(1) DEFAULT 0,
FOREIGN KEY (employeeID) REFERENCES EMPLOYEE (employeeID) ON DELETE CASCADE,
FOREIGN KEY (userID) REFERENCES PARTICIPATION (userID) ON DELETE CASCADE
);

CREATE TABLE LOGIN (
loginRoleID  INT(11) AUTO_INCREMENT  NOT NULL,
userID      INT(11) NOT NULL,
loginEmail  CHAR (255) NOT NULL,
loginPassword CHAR(255),
PRIMARY KEY (loginRoleID),
FOREIGN KEY (userID) REFERENCES PARTICIPATION (userID) ON DELETE CASCADE

);

CREATE TABLE participationReportActivity(
reportActID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
userID INT(11) NOT NULL,
employeeID INT(11) NOT NULL,
coach CHAR(255) NOT NULL,
clientLName CHAR(255) NOT NULL,
clientFName CHAR(255) NOT NULL,
activityCode CHAR(255) NOT NULL,
trainingProgram CHAR(255),
startDate DATE NOT NULL,
endDate DATE NOT NULL,
minutes INT(11) NOT NULL,
notes CHAR(255) NOT NULL
);


CREATE TABLE CITIZEN(
userID INT(11) NOT NULL,
usCitizenshipStatus CHAR(100) NOT NULL,
alienRegistrationCode CHAR(20),
alienRegistrationCodeEXP DATE,
FOREIGN KEY (userID) REFERENCES PARTICIPATION(userID) ON DELETE CASCADE
);

CREATE TABLE ETHNICITY(
userID INT(11) NOT NULL,
hispanicHeritage CHAR(3) DEFAULT 'No',
africanAmercian_black CHAR(3) DEFAULT 'No',
americanIndian_alaskanNative CHAR(3) DEFAULT 'No',
asian CHAR(3) DEFAULT 'No',
hawaiian_other CHAR(3) DEFAULT 'No',
white Char(3) DEFAULT 'No',
noAnswer CHAR(3) DEFAULT 'No',
primaryLanguage CHAR(20) NOT NULL,
englishProficiency CHAR(3) NOT NULL,
FOREIGN KEY (userID) REFERENCES PARTICIPATION(userID) ON DELETE CASCADE
);

CREATE TABLE EDUCATION(
userID INT(11) NOT NULL,
highSchoolStatus CHAR(4) NOT NULL,
highSchooolDiplomaOrEquil CHAR(3) NOT NULL,
highestGradeComplete CHAR(100) NOT NULL,
inSchool Char(3) NOT NULL,
FOREIGN KEY (userID) REFERENCES PARTICIPATION(userID) ON DELETE CASCADE
);

CREATE TABLE EMPLOYMENT(
userID INT(11) NOT NULL,
currentMilitaryOrVet CHAR(3) NOT NULL,
militarySpouse CHAR(3) NOT NULL,
selectiveService CHAR(50),
employmentStatus CHAR(100) NOT NULL,
payRate INT(11),
unemployemntInsurance CHAR(20) NOT NULL,
unemploymentWeeks INT(11),
farmworker12Months CHAR(3) NOT NULL,
desiredJobTitle CHAR(100) NOT NULL,
techExperience CHAR(10) NOT NULL,
FOREIGN KEY (userID) REFERENCES PARTICIPATION(userID) ON DELETE CASCADE
);

CREATE TABLE SERVICES(
userID INT(11) NOT NULL,
fosterCare CHAR(3) NOT NULL,
adultEducationWIOATittleII CHAR(3) NOT NULL,
youthBuild CHAR(3) NOT NULL,
youthBuildGrant CHAR(30),
jobCorps CHAR(3) NOT NULL,
vocationalEducationCarlPerkins CHAR(3) NOT NULL,
tanfRecipient CHAR(3) NOT NULL,
ssiRecipient CHAR(3) NOT NULL,
gaRecipient CHAR(3) NOT NULL,
snapRecipientCalFresh CHAR(3) NOT NULL,
rcaRecipient CHAR(3) NOT NULL,
ssdiRecipient CHAR(3) NOT NULL,
snapEmploymentAndTrainingProgram CHAR(3) NOT NULL,
pellGrant CHAR(3) NOT NULL,
FOREIGN KEY (userID) REFERENCES PARTICIPATION(userID) ON DELETE CASCADE
);

CREATE TABLE HARDSHIP(
userID INT(11) NOT NULL,
ticketToWork CHAR(3) NOT NULL,
homelessStatus CHAR(3) NOT NULL,
exOffender CHAR(3) NOT NULL,
displacedHomemaker CHAR(3) NOT NULL,
IsDisability CHAR(3) NOT NULL,
disabilityDescription CHAR(100),
singleParent CHAR(3) NOT NULL,
culturalBarriers CHAR(3) NOT NULL,
familySize INT(11) NOT NULL,
annualizedFamilyIncome INT(11) NOT NULL,
FOREIGN KEY (userID) REFERENCES PARTICIPATION(userID) ON DELETE CASCADE
);



-- Grant Information Storage

CREATE TABLE GRANT_MAIN(
	adminID INT(11) NOT NULL,
	grant_name CHAR(255) NOT NULL,
	grantID INT(11) NOT NULL,
	startDate DATE NOT NULL,
	endDate DATE NOT NULL,
	personal_contact INT(11) NOT NULL,
	supporting_organization CHAR(255) NOT NULL,
	shared_grant_ID INT(11) AUTO_INCREMENT NOT NULL,
	PRIMARY KEY (shared_grant_ID)
);

CREATE TABLE GRANT_PARTICIPATION(
	shared_grant_ID INT(11) NOT NULL,
	userID INT(11) NOT NULL,
	characteristic_grant_ID INT(11) AUTO_INCREMENT NOT NULL,
	PRIMARY KEY (characteristic_grant_ID),
	FOREIGN KEY (shared_grant_ID) REFERENCES GRANT_MAIN(shared_grant_ID) ON DELETE CASCADE
);

CREATE TABLE GRANT_CHARACTERISTICS(
	characteristic_grant_ID INT(11) NOT NULL,
	char_title CHAR(255) NOT NULL,
	char_status CHAR(255) NOT NULL,
	FOREIGN KEY (characteristic_grant_ID) REFERENCES GRANT_PARTICIPATION(characteristic_grant_ID) ON DELETE CASCADE
);

-- login participation forget password


CREATE TABLE passReset(
passResetId INT (11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
passResetEmail TEXT NOT NULL,
passResetSelector TEXT NOT NULL,
passResetToken LONGTEXT NOT NULL,
passResetExpires TEXT NOT NULL

);
CREATE TABLE FILES(
fileID INT(11) AUTO_INCREMENT PRIMARY KEY,
userID INT(11) NOT NULL,
file_name VARCHAR(255) NOT NULL,
file_size int(11) NOT NULL DEFAULT 0,
file_path VARCHAR(255) NOT NULL,
file_type VARCHAR(255) NOT NULL,
uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (userID) REFERENCES PARTICIPATION(userID)

);
