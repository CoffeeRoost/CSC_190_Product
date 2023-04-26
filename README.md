# CMC Workforce Development 360 Management Software Draft
![Logo](https://www.greatersacramento.com/wp-content/uploads/2020/12/CMC-logo-horizontal.png)


## About This Project
* This is a project about a case management system that can keep and track client records and progress in the Career Pathways Program. The system would track individual clients and accept information based on an existing intake form. After clients input their basic information, employees report a client’s progress in the program to the system following an existing activity report form. Alongside this basic info compilation, backhouse accounting is expected for individual client’s profit gain/loss and grant connections.

* The current system used to track this information employs excel sheets and a google survey. The former requires manual updating which is prone to human error and the latter does not completely fulfil the client’s expectations concerning certain information recording.
This program will provide a set system that stores information in SQL databases that can be accessed using specific pages or by the database admin. This controls the information insertion which is otherwise compromised by an inconsistent system.

## Technologies

* Frontend: Primarily written in html, the frontend is primarily stylized with bootstrap v5 with support by a CSS style page. For consistency with the backend, though, all frontend files are converted to php.

* Backend: The backend is solely coded in php and some of Javascript.

* Database: This program primarily uses a MySQL database (relational).

* IDE: This program was coded in Visual Studios with Xampp serving as the localhost display and database reference.

##### Figure: Initial Webpage

![image](https://user-images.githubusercontent.com/79181285/204054772-0e3ea5e5-16d0-488b-a6b8-fe15314f3604.png)

## Dependencies:

* Frameworks: As previously mentioned, this program uses Bootstrap v5 as it’s frontend framework for display purposes.

* Languages: The primary language of this application is PHP.

* MySQL Version: 15.1 Distrib 10.4.25-MariaDB, for Win64 (AMD64)

* Email functionality: For authentication purposes for login requirements and client account creation, this program requires email functionality. Currently in the newAccount.inc file (located in the includes file), the php mail function is utilized. This requires the php.ini and sendmail configuration file to be edited with smtp information. These files are easily accessible in the Xampp file settings but are probably inconsistent with other applications. Editing this file in congruence for your hosting server’s smtp settings is required for functionality.

## Deployment

* As seen in story CN-118 File Organization, the github was reorganized to format the pages in an accessible way from the Xampp application. Header, form, href lines were rewritten accordingly. As such, if these folders are inserted into a given hosting site in any other format/organization, these line of code will break to 404 pages. It is required that the file organization remains as it is presented in the github.

Deployment on AWS
(AWS Account is Required)
  1.  Go to AWS Management Console

    a.Find services: route53 (Establish Domain Service)
      i.Register or Transfer already existing domain (Google, GoDaddy, etc)
      ii.Assuming Registration:  type in your wanted name and choose suffix (.com, .org, yearly price)
        1.Note: Your choice might already be taken
      iii.Add to Cart
      iv.Fill out necessary Information
        1.Privacy Protection: check Enable
        2.Go to Domains that you can register with Amazon Route 53 - Amazon Route 53 for more information
      v.Look over post-information (orders are suggested to be taken in advanced)
      vi.Return to AWS Management Console
    b.Find services: Lightsail (Creating a Lightsail Instance to host your website)
      i.Create Instance
        1.Select Region (recommend: closest to you or majority of traffic)
        2.Pick platform Linux/Unix
        3.Recommended blueprint: WordPress
        4.Instance Plan (Related to Computer hosting)
          a.Price (USD) Monthly
          b.Memory
          c.Processing (vCPU)
          d.Storage (SSD)
          e.Transfer
        5.Identify your Instance (varies on account uses)
        6.Create Instance
          a.May take a few moments to start it up
          b.Note this will not appear in EC2 instances (What is in Lightsail stays in Lightsail)
      ii.Click on Orange Button on Instance Tab (Logging into your instance wordpress credentials)
        1.Will be brought to a terminal
          a.Command: cat $HOME/bitnami_application_password
          b.Returns password for wordpress instance
          c.Close
        2.Return to Instance Tab and copy paste given IP address
          a.Paste in tab
            i.IP_ADDRESS/wp-admin
            ii.Username: user
            iii.Password: previously gotten password from terminal
          b.While in account, go to users
            i.Change Password
      iii.Return to Lightsail page (Creating a static IP address)
        1.Go to Networking
          a.Create Static IP
          b.Choose Location
          c.Choose Instance (should match above)
          d.Create Static IP (this IP is always the IP associated now)
    c.Return to AWS Management Console (copy IP address) (Connecting static IP address to domain)
      i.Find services: route53
        1.Click on Hosted Zone
        2.Click on previously made domain name
          a.On Hosted zone details: Make sure Name servers match registered domains (under tab Domains)
          b.Create record
            i.Simple Routing -> Next
            ii.Define simple record:
              1.Leave Record name blank
              2.Choose endpoint: IP address
                a.Paste the IP address in
              3.Leave as A
              4.Choose TTL
              5.Define simple Record
            iii.Create Record
          c.Connection Established time varies
          d.Create another record on same Hosted Zone
            i.Simple Routing
            ii.Define simple record:
              1.Insert www into Record name
              2.Choose endpoint: IP address
                a.Paste the IP address in
              3.Leave as A
              4.Choose TTL
              5.Define simple Record
            iii.Create Record
          e.Connection Established time varies
    d.Return to Lightsail page (establishing a DNS zone)
      i.Go to Networking
        1.Create DNS zone
          a.Enter your domain name into the section
          b.Create DNS zone
        2.Receive server names and return to route53 to enter into settings (unclear: will need to go through demo)
    e.Go to wordpress login and login (establishing WP Mail SMTP)
      i.Click Pluggins and go to Installed pluggins
      ii.Click update now on WP Mail SMTP for latest version
      iii.Launch Setup Wizard (on pluggins settings page)
        1.Pick appropriate mailer for the website (AWS SES is an option
        2.Depending on mailer choice configurations will vary
        3.Closing the Wizard will automatically send a test email
      iv.Make sure to add DNS records from mailer to route53 records


## Developer Instructions

* As a LAMP stack website, this project is set up in such a way where these aspects are intergral to the project and require availability and installation.

* Particularly, regarding the database, the current SQL for table creation is found in the database folder and is labeled CSC190_database_2.2. Use this file to base your database on. Several php pages require this exact format. To edit the database's name go into the includes folder and edit the dbh.inc file database settings appropriately.

* All files located in the oldFiles folder may be removed and are recommended to be removed for security reasons (before deployment this folder will be removed along with all of its contents). This also applies to all old database files not pertaining to the current database version.

## Testing: Important Features to Consider

  1. Survey and Email Authentication: Once the website is running, the user is recommended to make sure the client survey form is accepting information into the database. To test this feature, simply fill out the intake survey with all required information and then provide the account's password. Following this, if email functionality is working, the user should receive an email with their authentication link. Clicking it leads into the next test function.

      * Tests Database Select, Insert, and Update statements
      * Email functionality is also tested

  2. Client Login: After clicking the authentication link, the client account should be activated. This enables login for the provided client account. To test if restricted client access is working, simply try to login without clicking the email link. If the restricted access is working, the user will not be able to access the account.

      * Tests Select statement primarily

  3. Account Recovery: Available for all types of account, the user simply should click the provided account recovery links, enter their email connected to their account, and wait for the email that will take them to their password input page.

      * Tests Delete, Select, and Update statements
      * Email functionality is also tested

  4.  Other tests to be added with more page functionality...

## Timeline

  1. Sprint 0/1 (9/27—10/9):

      * Total Stories Completed: 5

      * Major Milestones: CN-9 Wireframes: Finished (9/29), CN-22 Simple Login: Finished (10/7)

  2. Sprint 2 (10/11—10/24):

      * Total Stories Completed: 6

      * Major Milestones: CN-10 Client Login: Finished (10/20), CN-31 Survey: Finished (10/23),

  3. Sprint 3 (10/24—11/6):

      * Total Stories Completed: 3

      * Major Milestones: CN-17 Account Recovery: Finished (11/7), CN-119 Revamp newAccount (Survey, Login Auth: Finished (11/6)

  4. Sprint 4 (11/7—11/25):

      * Total Stories Completed: 6

      * Major Milestones: CN-101 Database Adjustment: Finished (11/10), CN-139 Report Activity form: Finished (11/22)

  5. Sprint 5: (2/6--2/19)

      * Stories: CN-118 File Organization, CN-13 Search Page, CN-14 Task Report, CN-178 Connecting Prior Pages with Session Data

  6. Sprint 6: (2/20--3/5)

      * Stories: CN-177 Grant Page

  7. Sprint 7: (3/6--3/19)

  8. Sprint 8: (3/20--4/2)

      * Stories: CN-36 Reports and Guidelines System

  9. Sprint 9: (4/3--4/17)

## Database

##### Figure:EER Diagrams

![My Image](/image/EERDagram.jpg)


#### Figure: Relational Diagram

![My Image](/image/RelationalDagram.jpg)