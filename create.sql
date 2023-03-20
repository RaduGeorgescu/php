
CREATE DATABASE testDb;

USE testDb;

CREATE TABLE testTable (
  id INT IDENTITY(1,1) PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  position VARCHAR(50) NOT NULL,
  office VARCHAR(50) NOT NULL,
  age INT NOT NULL,
  startdate DATE NOT NULL,
  salary FLOAT NOT NULL,
  message VARCHAR(MAX),
  others VARCHAR(MAX)
);

INSERT INTO dbo.testTable (Name, Position, Office, Age, StartDate, Salary, Message, Others)
	VALUES 
('Garrett Winters', 'Accountant', 'Tokyo', 63, DATEFROMPARTS(2011, 07, 25), 41113.26, 'A secret message is put here to show up in details', 'Some more details'),
('Angelica Ramos', 'Chief Executive Officer (CEO)', 'London', 47, DATEFROMPARTS(2009, 10, 09), 13880.41, 'A secret message is put here to show up in details', 'Some more details'),
('Paul Byrd', 'Chief Financial Officer (CFO)', 'New York', 64, DATEFROMPARTS(2010, 06, 09), 43664.3, 'A secret message is put here to show up in details', 'Some more details'),
('Yuri Berry', 'Chief Marketing Officer (CMO)', 'New York', 40, DATEFROMPARTS(2009, 06, 25), 93740.65, 'A secret message is put here to show up in details', 'Some more details'),
('Fiona Green', 'Chief Operating Officer (COO)', 'San Francisco', 48, DATEFROMPARTS(2010, 03, 11), 62513.89, 'A secret message is put here to show up in details', 'Some more details'),
('Donna Snider', 'Customer Support', 'New York', 27, DATEFROMPARTS(2011, 01, 25), 2621.78, 'A secret message is put here to show up in details', 'Some more details'),
('Serge Baldwin', 'Data Coordinator', 'Singapore', 64, DATEFROMPARTS(2012, 04, 09), 19214.08, 'A secret message is put here to show up in details', 'Some more details'),
('Gavin Joyce', 'Developer', 'Edinburgh', 42, DATEFROMPARTS(2010, 12, 22), 19814.03, 'A secret message is put here to show up in details', 'Some more details'),
('Jonas Alexander', 'Developer', 'San Francisco', 30, DATEFROMPARTS(2010, 07, 14), 9967.16, 'A secret message is put here to show up in details', 'Some more details'),
('Suki Burks', 'Developer', 'London', 53, DATEFROMPARTS(2009, 10, 22), 92867.99, 'A secret message is put here to show up in details', 'Some more details'),
('Thor Walton', 'Developer', 'New York', 61, DATEFROMPARTS(2013, 08, 11), 19602.71, 'A secret message is put here to show up in details', 'Some more details'),
('Jenette Caldwell', 'Development Lead', 'New York', 30, DATEFROMPARTS(2011, 09, 03), 28422.28, 'A secret message is put here to show up in details', 'Some more details'),
('Jackson Bradshaw', 'Director', 'New York', 65, DATEFROMPARTS(2008, 09, 26), 91436.24, 'A secret message is put here to show up in details', 'Some more details'),
('Vivian Harrell', 'Financial Controller', 'San Francisco', 62, DATEFROMPARTS(2009, 02, 14), 13470.76, 'A secret message is put here to show up in details', 'Some more details'),
('Brielle Williamson', 'Integration Specialist', 'New York', 61, DATEFROMPARTS(2012, 12, 02), 6799.08, 'A secret message is put here to show up in details', 'Some more details'),
('Michelle House', 'Integration Specialist', 'Sydney', 37, DATEFROMPARTS(2011, 06, 02), 98324.58, 'A secret message is put here to show up in details', 'Some more details'),
('Rhona Davidson', 'Integration Specialist', 'Tokyo', 55, DATEFROMPARTS(2010, 10, 14), 25055.64, 'A secret message is put here to show up in details', 'Some more details'),
('Colleen Hurst', 'Javascript Developer', 'San Francisco', 39, DATEFROMPARTS(2009, 09, 15), 86412.76, 'A secret message is put here to show up in details', 'Some more details'),
('Michael Bruce', 'Javascript Developer', 'Singapore', 29, DATEFROMPARTS(2011, 06, 27), 94056.34, 'A secret message is put here to show up in details', 'Some more details'),
('Jennifer Acosta', 'Junior Javascript Developer', 'Edinburgh', 43, DATEFROMPARTS(2013, 02, 01), 4880.59, 'A secret message is put here to show up in details', 'Some more details'),
('Ashton Cox', 'Junior Technical Author', 'San Francisco', 66, DATEFROMPARTS(2009, 01, 12), 55144.17, 'A secret message is put here to show up in details', 'Some more details'),
('Michael Silva', 'Marketing Designer', 'London', 66, DATEFROMPARTS(2012, 11, 27), 47979.66, 'A secret message is put here to show up in details', 'Some more details'),
('Unity Butler', 'Marketing Designer', 'San Francisco', 47, DATEFROMPARTS(2009, 12, 09), 11114.43, 'A secret message is put here to show up in details', 'Some more details'),
('Howard Hatfield', 'Office Manager', 'San Francisco', 51, DATEFROMPARTS(2008, 12, 16), 98691.98, 'A secret message is put here to show up in details', 'Some more details'),
('Jena Gaines', 'Office Manager', 'London', 30, DATEFROMPARTS(2008, 12, 19), 58213.66, 'A secret message is put here to show up in details', 'Some more details'),
('Timothy Mooney', 'Office Manager', 'London', 37, DATEFROMPARTS(2008, 12, 11), 66447.22, 'A secret message is put here to show up in details', 'Some more details'),
('Dai Rios', 'Personnel Lead', 'Edinburgh', 35, DATEFROMPARTS(2012, 09, 26), 76294.25, 'A secret message is put here to show up in details', 'Some more details'),
('Martena Mccray', 'Post-Sales support', 'Edinburgh', 46, DATEFROMPARTS(2011, 03, 09), 10516.16, 'A secret message is put here to show up in details', 'Some more details'),
('Caesar Vance', 'Pre-Sales Support', 'New York', 21, DATEFROMPARTS(2011, 12, 12), 97943.34, 'A secret message is put here to show up in details', 'Some more details'),
('Charde Marshall', 'Regional Director', 'San Francisco', 36, DATEFROMPARTS(2008, 10, 16), 65976.68, 'A secret message is put here to show up in details', 'Some more details'),
('Hermione Butler', 'Regional Director', 'London', 47, DATEFROMPARTS(2011, 03, 21), 37683.34, 'A secret message is put here to show up in details', 'Some more details'),
('Jennifer Chang', 'Regional Director', 'Singapore', 28, DATEFROMPARTS(2010, 11, 14), 70732.19, 'A secret message is put here to show up in details', 'Some more details'),
('Shad Decker', 'Regional Director', 'Edinburgh', 51, DATEFROMPARTS(2008, 11, 13), 50450.26, 'A secret message is put here to show up in details', 'Some more details'),
('Tatyana Fitzpatrick', 'Regional Director', 'London', 19, DATEFROMPARTS(2010, 03, 17), 93049.23, 'A secret message is put here to show up in details', 'Some more details'),
('Shou Itou', 'Regional Marketing', 'Tokyo', 20, DATEFROMPARTS(2011, 08, 14), 49374.36, 'A secret message is put here to show up in details', 'Some more details'),
('Cara Stevens', 'Sales Assistant', 'New York', 46, DATEFROMPARTS(2011, 12, 06), 29122.85, 'A secret message is put here to show up in details', 'Some more details'),
('Doris Wilder', 'Sales Assistant', 'Sydney', 23, DATEFROMPARTS(2010, 09, 20), 94844.49, 'A secret message is put here to show up in details', 'Some more details'),
('Herrod Chandler', 'Sales Assistant', 'San Francisco', 59, DATEFROMPARTS(2012, 08, 06), 76198.55, 'A secret message is put here to show up in details', 'Some more details'),
('Hope Fuentes', 'Secretary', 'San Francisco', 41, DATEFROMPARTS(2010, 02, 12), 50046.31, 'A secret message is put here to show up in details', 'Some more details'),
('Cedric Kelly', 'Senior Javascript Developer', 'Edinburgh', 22, DATEFROMPARTS(2012, 03, 29), 49365.44, 'A secret message is put here to show up in details', 'Some more details'),
('Haley Kennedy', 'Senior Marketing Designer', 'London', 43, DATEFROMPARTS(2012, 12, 18), 7887.18, 'A secret message is put here to show up in details', 'Some more details'),
('Bradley Greer', 'Software Engineer', 'London', 41, DATEFROMPARTS(2012, 10, 13), 8073.57 , 'A secret message is put here to show up in details', 'Some more details'),
('Brenden Wagner', 'Software Engineer', 'San Francisco', 28, DATEFROMPARTS(2011, 06, 07), 60001.12, 'A secret message is put here to show up in details', 'Some more details'),
('Bruno Nash', 'Software Engineer', 'London', 38, DATEFROMPARTS(2011, 05, 03), 72460.72, 'A secret message is put here to show up in details', 'Some more details'),
('Sonya Frost', 'Software Engineer', 'Edinburgh', 23, DATEFROMPARTS(2008, 12, 13), 78719.64, 'A secret message is put here to show up in details', 'Some more details'),
('Zenaida Frank', 'Software Engineer', 'New York', 63, DATEFROMPARTS(2010, 01, 04), 46971.93, 'A secret message is put here to show up in details', 'Some more details'),
('Zorita Serrano', 'Software Engineer', 'San Francisco', 56, DATEFROMPARTS(2012, 06, 01), 78304.13, 'A secret message is put here to show up in details', 'Some more details'),
('Finn Camacho', 'Support Engineer', 'San Francisco', 47, DATEFROMPARTS(2009, 07, 07), 40986.24, 'A secret message is put here to show up in details', 'Some more details'),
('Olivia Liang', 'Support Engineer', 'Singapore', 64, DATEFROMPARTS(2011, 02, 03), 89151.14, 'A secret message is put here to show up in details', 'Some more details'),
('Sakura Yamamoto', 'Support Engineer', 'Tokyo', 37, DATEFROMPARTS(2009, 08, 19), 51946.23, 'A secret message is put here to show up in details', 'Some more details'),
('Quinn Flynn', 'Support Lead', 'Edinburgh', 22, DATEFROMPARTS(2013, 03, 03), 92577.43, 'A secret message is put here to show up in details', 'Some more details'),
('Tiger Nixon', 'System Architect', 'Edinburgh', 61, DATEFROMPARTS(2011, 04, 25), 68049.8, 'A secret message is put here to show up in details', 'Some more details'),
('Gloria Little', 'Systems Administrator', 'New York', 59, DATEFROMPARTS(2009, 04, 10), 38092.04, 'A secret message is put here to show up in details', 'Some more details'),
('Lael Greer', 'Systems Administrator', 'London', 21, DATEFROMPARTS(2009, 02, 27), 61850.97, 'A secret message is put here to show up in details', 'Some more details'),
('Gavin Cortez', 'Team Leader', 'San Francisco', 22, DATEFROMPARTS(2008, 10, 26), 21800.71, 'A secret message is put here to show up in details', 'Some more details'),
('Prescott Bartlett', 'Technical Author', 'London', 27, DATEFROMPARTS(2011, 05, 07), 21285.37, 'A secret message is put here to show up in details', 'Some more details');

SELECT * FROM testTable;