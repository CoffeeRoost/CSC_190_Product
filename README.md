# CMC Workforce Development 360 Management Software Draft
Summary:
The client needs a case management system that can keep and track client records and progress in the Career Pathways Program. The system would track individual clients and accept information based on an existing intake form. After clients input their basic information, employees report a client’s progress in the program to the system following an existing activity report form. Alongside this basic info compilation, backhouse accounting is expected for individual client’s profit gain/loss and grant connections.

The current system used to track this information employs excel sheets and a google survey. The former requires manual updating which is prone to human error and the latter does not completely fulfil the client’s expectations concerning certain information recording.
This program will provide a set system that stores information in SQL databases that can be accessed using specific pages or by the database admin. This controls the information insertion which is otherwise compromised by an inconsistent system.

Technologies:	
Frontend: Primarily written in html, the frontend is primarily stylized with bootstrap v5 with support by a CSS style page. For consistency with the backend, though, all frontend files are converted to php.
Backend: The backend is solely coded in php.
Database: This program primarily uses a MySQL database (relational).
IDE: This program was coded in Visual Studios with Xampp serving as the localhost display and database reference.

![image](https://user-images.githubusercontent.com/79181285/204054772-0e3ea5e5-16d0-488b-a6b8-fe15314f3604.png)

Dependencies:
Frameworks: As previously mentioned, this program uses Bootstrap v5 as it’s frontend framework for display purposes.
Languages: The primarily language of this application is PHP.
MySQL Version: 15.1 Distrib 10.4.25-MariaDB, for Win64 (AMD64)
Email functionality: For authentication purposes for login requirements and client account creation, this program requires email functionality. Currently in the newAccount.inc file (located in the includes file), the php mail function is utilized. This requires the php.ini and sendmail configuration file to be edited with smtp information. These files are easily accessible in the Xampp file settings but are probably inconsistent with other applications. Editing this file in congruence for your hosting server’s smtp settings is required for functionality.

Installation:

Configuration:

Usage:

Testing:
