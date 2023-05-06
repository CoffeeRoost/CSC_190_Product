# CMC Workforce Development 360 Management Software Draft
![Logo](https://www.greatersacramento.com/wp-content/uploads/2020/12/CMC-logo-horizontal.png)


## About This Project
* This is a project about a case management system that can keep and track client records and progress in the Career Pathways Program. The system would track individual clients and accept information based on an existing intake form. After clients input their basic information, employees report a client’s progress in the program to the system following an existing activity report form. Alongside this basic info compilation, backhouse accounting is expected for individual client’s profit gain/loss and grant connections.

* The current system used to track this information employs excel sheets and a google survey. The former requires manual updating which is prone to human error and the latter does not completely fulfil the client’s expectations concerning certain information recording.
This program will provide a set system that stores information in a MySQl database that can be accessed using specific pages or by the database admin. This controls the information insertion which is otherwise compromised by an inconsistent system.

## Team Chicken Node Members and Contacts
![TeamChickeNodeArt](https://user-images.githubusercontent.com/90881895/236378467-f492487a-629b-4d1a-894f-cf4c6a7cf3ac.png)
1. Name: Gabby Cocke
    * Email address: gabcocke@gmail.com
    * Phone number: 530-379-6925

2. Name: Hardev Singh
    * Email address: hardevsingh2001@gmail.com
    * Phone number: 916-318-1264

3. Name: Thuy Duong
    * Email address: cindyduong999@gmail.com
    * Phone number: 916-812-5912

4. Name: Tyler Ito
    * Email address: t_ito132@yahoo.com
    * Phone number: 916-477-0356

5. Name: Mimi Darke
    * Email address: medinillamagnifica26@gmail.com
    * Phone number: 651-497-7858

6. Name: Steven Symansiv
    * Email address: divisionadversus@gmail.com
    * Phone number: 916-963-6630

7. Name: Sirapicha Sawettanant
    * Email address: sawettanants@gmail.com
    * Phone number: 279-799-6989

8. Name: Thinh Nguyen
    * Email address: tinnnguyen1deff5@gmail.com
    * Phone number: 916-838-0641

9. Name: David Wen
    * Email address: davidwen25@gmail.com
    * Phone number: 707-934-0999

## Working Product Screenshots

###Homepage

###Login Page

###Participant
![My Image](/image/Participant_Dashboard.JPG)
###Employee
![My Image](/image/Employee_Dashboard.JPG)
###Admin
![My Image](/image/Admin_Dashboard.JPG)
## Technologies

* Frontend: The frontend is primarily designed using HTML and is styled with the help of Bootstrap v5 and a dedicated CSS stylesheet. To ensure consistency with the backend, all frontend files are converted to PHP.

* Backend: The backend is developed exclusively in PHP, supplemented with some JavaScript code.

* Database: This application primarily utilizes a MySQL relational database for data management.

* Integrated Development Environment (IDE): The program was developed in Visual Studio, with XAMPP serving as the localhost display and database reference. Visual Studio Code provided access to PowerShell for testing purposes. Selenium IDE was employed as the automated testing tool.

* Amazon Web Services (AWS) Stack: This program is hosted on AWS, utilizing both EC2 and RDS services. For the EC2 setup, the operating system employed is Amazon Linux, with the instance type being t2.micro and an allocated storage capacity of 8GB. The selected region is us-west-1 (Northern California). As for RDS, MySQL Community 8.0.28 serves as the chosen engine option, running on Amazon Linux. The database instance class is a Burstable class db.t2.micro, featuring general-purpose SSD storage (gp2). The region for RDS is also us-west-1 (Northern California). Additionally, Amazon Simple Email Service (SES) is used for handling email functionality.

##### Figure: Initial Webpage

![image](https://user-images.githubusercontent.com/79181285/204054772-0e3ea5e5-16d0-488b-a6b8-fe15314f3604.png)

## Dependencies:

* Frameworks: Frontend Framework: Bootstrap v5 is used as the frontend framework for display purposes.
              Localhost Testing: XAMPP Version 8.1.10 serves as the localhost test environment.
              Testing Framework: PHPUnit is used for testing, along with XAMPP Version 8.1.10.
              Email Functionality: PHPMailer facilitates the sending of emails.

* Languages: PHP serves as the primary programming language for this application.

* MySQL Version: MySQL 8.0.28 (2022-01-18)

* Email Functionality and Configuration: Email functionality plays a crucial role in authentication processes, including login requirements and client account creation. PHPMailer is employed for this purpose. To modify the email address or email server settings, update the email_config.inc.php file, which can be found in the following directory: CSC_190_Product > includes > email_config.inc.php. While these files are accessible in the XAMPP file settings, they might be inconsistent with other applications. Therefore, it is essential to adjust these files to align with your hosting server's SMTP settings, ensuring smooth functionality.

## Deployment

* As seen in story CN-118 File Organization, the github was reorganized to format the pages in an accessible way from the Xampp application. Header, form, href lines were rewritten accordingly. As such, if these folders are inserted into a given hosting site in any other format/organization, these line of code will break to 404 pages. It is required that the file organization remains as it is presented in the github.

* Deployment on AWS
(AWS Account is Required)
 * Amazon Elastic Compute (EC2)

   1. [Go to aws.amazon.com and Login ](https://aws.amazon.com)
   2. Click on EC2
![Step 2 screenshot](https://images.tango.us/workflows/815afb00-fb9d-4ffe-ab74-43d3ad1d06c4/steps/bcba5c46-2903-4564-8423-b0fffb8021d8/81340f5a-59bf-42cf-9da7-d82baa022811.png?crop=focalpoint&fit=crop&fp-x=0.1550&fp-y=0.1668&fp-z=3.1331&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=555&mark-y=342&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz01NiZoPTQ0JmZpdD1jcm9wJmNvcm5lci1yYWRpdXM9MTA%3D)


   3. Click on EC2 Dashboard
![Step 3 screenshot](https://images.tango.us/workflows/815afb00-fb9d-4ffe-ab74-43d3ad1d06c4/steps/bf4f2215-aee0-477a-b996-e98c1eb33d91/84742efc-11c1-4a25-a6f3-0fbd973fe5f5.png?crop=focalpoint&fit=crop&fp-x=0.0372&fp-y=0.0993&fp-z=2.8701&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=45&mark-y=188&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz0xNjcmaD00MCZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw)


   4. Click on Instances
![Step 4 screenshot](https://images.tango.us/workflows/815afb00-fb9d-4ffe-ab74-43d3ad1d06c4/steps/b3297a3e-88ef-4173-bdd2-5a50369b0d2e/c6a29ba3-3db9-43dc-8d88-9cd05693c6fa.png?crop=focalpoint&fit=crop&fp-x=0.0286&fp-y=0.2243&fp-z=3.0194&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=47&mark-y=343&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz0xMTMmaD00MiZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw)


   5. Click on Launch instances
![Step 5 screenshot](https://images.tango.us/workflows/815afb00-fb9d-4ffe-ab74-43d3ad1d06c4/steps/77a8d6ac-00e8-4ac2-b082-69625e786bb8/a84ab4db-5e8c-4c14-b908-bc148488c0dd.png?crop=focalpoint&fit=crop&fp-x=0.8184&fp-y=0.0184&fp-z=3.0524&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=458&mark-y=10&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz0yODMmaD02MSZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw)


   6. Type "Name of instance"
![Step 6 screenshot](https://images.tango.us/workflows/815afb00-fb9d-4ffe-ab74-43d3ad1d06c4/steps/72265c88-0fae-46aa-9047-0c40577f6535/03dd3b02-6690-47b3-8e41-dd9f6cebb9d4.png?crop=focalpoint&fit=crop&fp-x=0.1767&fp-y=0.2730&fp-z=1.7909&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=102&mark-y=336&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz01NTUmaD00MCZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw)


   7. Click on Amazon Linux
![Step 7 screenshot](https://images.tango.us/workflows/815afb00-fb9d-4ffe-ab74-43d3ad1d06c4/steps/5ebc9704-c993-4ad8-8b38-c5bdd104f9b0/7c391177-27df-430c-b47d-b2d2d75923f3.png?crop=focalpoint&fit=crop&fp-x=0.5000&fp-y=0.5000&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n)


   8. Click on t2.micro as free tier
![Step 8 screenshot](https://images.tango.us/workflows/815afb00-fb9d-4ffe-ab74-43d3ad1d06c4/steps/2af072dd-8b64-4475-bc85-86dbc9151790/e140af09-2b7b-4006-851d-09afb3c5a195.png?crop=focalpoint&fit=crop&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n)


   9. Create key pair to using SSH from terminal
![Step 9 screenshot](https://images.tango.us/workflows/815afb00-fb9d-4ffe-ab74-43d3ad1d06c4/steps/c1af647d-1e22-4294-830e-62bfc95b9972/9cfdb85f-960e-4865-9e76-e6845fc254d6.png?crop=focalpoint&fit=crop&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n)


   10. Click on Create new key pair
![Step 10 screenshot](https://images.tango.us/workflows/815afb00-fb9d-4ffe-ab74-43d3ad1d06c4/steps/60752d01-e4e1-470f-b2c9-de652f7750e3/a5812310-5b7b-48dc-aab1-cb2a9b233035.png?crop=focalpoint&fit=crop&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n)


   11. Type "name_of_key_pair"
![Step 11 screenshot](https://images.tango.us/workflows/815afb00-fb9d-4ffe-ab74-43d3ad1d06c4/steps/b8aa362e-1fd6-475a-9e6e-299a6027f474/fb334cb3-ebf8-472c-b822-9fd4dde61cb6.png?crop=focalpoint&fit=crop&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n)


   12. Choose RSA type for key pair
![Step 12 screenshot](https://images.tango.us/workflows/815afb00-fb9d-4ffe-ab74-43d3ad1d06c4/steps/571767c9-fad9-4f77-bc8e-a7e2ac71418b/95ad0796-1375-4c14-a1dc-26f82da1afc3.png?crop=focalpoint&fit=crop&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n)


   13. Choose .pem when using OpenSSH or .ppk when using PuTTY
![Step 13 screenshot](https://images.tango.us/workflows/815afb00-fb9d-4ffe-ab74-43d3ad1d06c4/steps/1fdb589d-491f-4a35-8877-4c96c4e8ea5f/97fdeb00-02a5-4f0b-acb2-01cf5a60ed40.png?crop=focalpoint&fit=crop&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n)


   14. Click on Create key pair
![Step 14 screenshot](https://images.tango.us/workflows/815afb00-fb9d-4ffe-ab74-43d3ad1d06c4/steps/a3f5faf3-7576-4d58-a507-b2f138069460/133f4948-324e-488c-aeec-054970f0b416.png?crop=focalpoint&fit=crop&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n)


   15. Configuration Network
![Step 15 screenshot](https://images.tango.us/workflows/815afb00-fb9d-4ffe-ab74-43d3ad1d06c4/steps/4869fa2d-9334-4d51-a43a-66ace39fd701/731c5aa8-19ad-4591-ae83-45d0498acc7f.png?crop=focalpoint&fit=crop&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n)


   16. Configuration storage Information
![Step 16 screenshot](https://images.tango.us/workflows/815afb00-fb9d-4ffe-ab74-43d3ad1d06c4/steps/558471e5-22d1-49aa-9743-c84f34c4787d/5b880736-eb44-4375-96bf-eaeb90c9a473.png?crop=focalpoint&fit=crop&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n)


   17. Click on Advanced details Info and configure depend on client setting
![Step 17 screenshot](https://images.tango.us/workflows/815afb00-fb9d-4ffe-ab74-43d3ad1d06c4/steps/d8f1d94a-956c-42c5-be94-7e5f079bfdb4/22edf227-281e-43fc-a463-c3854510a759.png?crop=focalpoint&fit=crop&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n)


   18. Click on Launch instance
![Step 18 screenshot](https://images.tango.us/workflows/815afb00-fb9d-4ffe-ab74-43d3ad1d06c4/steps/c934729e-0b0c-4d6c-aae4-7872c164f629/02a56fd3-5a88-4717-9d46-2ff7f3452793.png?crop=focalpoint&fit=crop&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n)


   19. Click on Instances
![Step 19 screenshot](https://images.tango.us/workflows/815afb00-fb9d-4ffe-ab74-43d3ad1d06c4/steps/21fb1553-3e9f-4e7e-a696-4462ac832be7/a73e39e8-411b-4d7d-a1ac-8226bcd1b85f.png?crop=focalpoint&fit=crop&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n)


   20. Click on the instance ID for detail information about instance
![Step 20 screenshot](https://images.tango.us/workflows/815afb00-fb9d-4ffe-ab74-43d3ad1d06c4/steps/a96630a0-2e29-4166-844a-15f361c738f1/f79056cc-770f-4057-8a75-646a0e264d99.png?crop=focalpoint&fit=crop&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n)

* Amazon Relational Database Service (RDS)
   1. [Go to aws.amazon.com and Login ](https://aws.amazon.com)


   2. Click on RDS
![Step 2 screenshot](https://images.tango.us/workflows/d2f08431-bcc7-41eb-87d3-e352db14d51e/steps/5764635e-a280-48c5-8d0a-5b9d4fde203a/7736b63e-d07c-45ee-885c-bea55a0571ca.png?crop=focalpoint&fit=crop&fp-x=0.1555&fp-y=0.1744&fp-z=3.1245&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=553&mark-y=327&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz01OSZoPTQ0JmZpdD1jcm9wJmNvcm5lci1yYWRpdXM9MTA%3D)


   3. Click on Databases
![Step 3 screenshot](https://images.tango.us/workflows/d2f08431-bcc7-41eb-87d3-e352db14d51e/steps/67c6980f-ad5f-43f1-a0ad-72bd1ddf18ee/ef327a1b-5b38-4bbb-aa96-177db278e260.png?crop=focalpoint&fit=crop&fp-x=0.0291&fp-y=0.1247&fp-z=2.9941&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=43&mark-y=239&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz0xMjImaD00MiZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw)


   4. Click on Create database
![Step 4 screenshot](https://images.tango.us/workflows/d2f08431-bcc7-41eb-87d3-e352db14d51e/steps/73c524ab-05c0-4642-adca-ceb974caa439/fcf50f59-4daf-4a5a-9315-a7d577ed4151.png?crop=focalpoint&fit=crop&fp-x=0.9369&fp-y=0.1949&fp-z=3.0113&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=838&mark-y=315&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz0yNjcmaD02NyZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw)


   5. Choosing Standard create
![Step 5 screenshot](https://images.tango.us/workflows/d2f08431-bcc7-41eb-87d3-e352db14d51e/steps/b89b69b4-018b-4eac-a8be-3235aab84f24/aff6ef6d-407d-4f15-8e4d-6ee9b93dbfc5.png?crop=focalpoint&fit=crop&fp-x=0.2142&fp-y=0.2831&fp-z=1.5651&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=84&mark-y=256&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz02MzcmaD0xMDUmZml0PWNyb3AmY29ybmVyLXJhZGl1cz0xMA%3D%3D)


   6. On the Engine Option
![Step 6 screenshot](https://images.tango.us/workflows/d2f08431-bcc7-41eb-87d3-e352db14d51e/steps/81873226-4829-4250-bc17-fdf7cabf8097/aa29ad41-4e53-425c-b926-f2bedf4f2c1d.png?crop=focalpoint&fit=crop&fp-x=0.2142&fp-y=0.6155&fp-z=1.5651&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=84&mark-y=142&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz02MzcmaD00MTImZml0PWNyb3AmY29ybmVyLXJhZGl1cz0xMA%3D%3D)


   7. Select "MySQL"
![Step 7 screenshot](https://images.tango.us/workflows/d2f08431-bcc7-41eb-87d3-e352db14d51e/steps/4ded8711-804f-4480-b66a-2c85ca57f091/27997285-f14c-484d-8e60-0bb6da821ad8.png?crop=focalpoint&fit=crop&fp-x=0.2872&fp-y=0.4539&fp-z=3.1482&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=581&mark-y=329&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz0zOSZoPTM5JmZpdD1jcm9wJmNvcm5lci1yYWRpdXM9MTA%3D)


   8. Click on MySQL 8.0.32
![Step 8 screenshot](https://images.tango.us/workflows/d2f08431-bcc7-41eb-87d3-e352db14d51e/steps/2d0e8676-9d19-45fb-a078-91949d170890/a53c1164-4441-4f33-a96f-35d77e8dfc8a.png?crop=focalpoint&fit=crop&fp-x=0.2142&fp-y=0.6969&fp-z=1.5651&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=84&mark-y=349&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz02MzcmaD0zNSZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw)


   9. On the templates
![Step 9 screenshot](https://images.tango.us/workflows/d2f08431-bcc7-41eb-87d3-e352db14d51e/steps/4ad1ea37-106d-4661-9a95-75490f724a19/5970d50f-dc88-4ae0-9212-5663624e0886.png?crop=focalpoint&fit=crop&fp-x=0.2142&fp-y=0.5253&fp-z=1.5651&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=84&mark-y=282&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz02MzcmaD0xMzMmZml0PWNyb3AmY29ybmVyLXJhZGl1cz0xMA%3D%3D)

   10. Select "FreeTierTemplate"
![Step 10 screenshot](https://images.tango.us/workflows/d2f08431-bcc7-41eb-87d3-e352db14d51e/steps/01129acd-8b28-4710-b02e-ffb838c12cb6/2f27c2fd-bd7b-4893-8296-1d30fbfb9af8.png?crop=focalpoint&fit=crop&fp-x=0.2872&fp-y=0.4916&fp-z=3.1482&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=581&mark-y=329&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz0zOSZoPTM5JmZpdD1jcm9wJmNvcm5lci1yYWRpdXM9MTA%3D)


   11. Type name of DB instance
![Step 11 screenshot](https://images.tango.us/workflows/d2f08431-bcc7-41eb-87d3-e352db14d51e/steps/68ff6dec-102d-4467-b065-649c658145f9/ddf42d97-bffc-41fc-a2e3-70565648d091.png?crop=focalpoint&fit=crop&fp-x=0.1711&fp-y=0.5694&fp-z=1.8090&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=97&mark-y=328&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz01NDkmaD00MCZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw)


   12. Type Master username
![Step 12 screenshot](https://images.tango.us/workflows/d2f08431-bcc7-41eb-87d3-e352db14d51e/steps/2574f181-5e08-4fc2-8de6-627158aa1239/170c38de-1a6f-4439-8b2b-626b09c5a6fe.png?crop=focalpoint&fit=crop&fp-x=0.1711&fp-y=0.5878&fp-z=1.8090&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=97&mark-y=328&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz01NDkmaD00MCZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw)


   13. Create password by typing your password or auto-generation
![Step 13 screenshot](https://images.tango.us/workflows/d2f08431-bcc7-41eb-87d3-e352db14d51e/steps/2e9c7ea0-76e5-4f17-8f16-24d4c9a67ee9/75cc90eb-ca89-4548-bafb-be6b0a625f4b.png?crop=focalpoint&fit=crop&fp-x=0.1711&fp-y=0.5204&fp-z=1.8090&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=97&mark-y=328&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz01NDkmaD00MCZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw)


   14. Choose the type of instance
![Step 14 screenshot](https://images.tango.us/workflows/d2f08431-bcc7-41eb-87d3-e352db14d51e/steps/85e7d619-f406-4030-b47a-42d8b1336013/b584b792-71c8-426f-857f-a6bfb4515f11.png?crop=focalpoint&fit=crop&fp-x=0.1711&fp-y=0.5525&fp-z=1.8090&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=97&mark-y=320&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz01NDkmaD01NyZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw)


   15. Configuration the storage
![Step 15 screenshot](https://images.tango.us/workflows/d2f08431-bcc7-41eb-87d3-e352db14d51e/steps/b74e98fb-5103-4cbd-bd79-922702ae244a/32a9e804-223e-4d5d-9d48-ba1a78d32095.png?crop=focalpoint&fit=crop&fp-x=0.2142&fp-y=0.6319&fp-z=1.5208&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=65&mark-y=157&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz02NTMmaD0zODImZml0PWNyb3AmY29ybmVyLXJhZGl1cz0xMA%3D%3D)


   16. Select "add-ec2-compute-resource"
![Step 16 screenshot](https://images.tango.us/workflows/d2f08431-bcc7-41eb-87d3-e352db14d51e/steps/ec2ad27e-e810-4fd8-ac4c-966df045e8d9/83f58efe-2083-4bb7-a60c-747e1a0d2005.png?crop=focalpoint&fit=crop&fp-x=0.2300&fp-y=0.2542&fp-z=3.1482&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=581&mark-y=329&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz0zOSZoPTM5JmZpdD1jcm9wJmNvcm5lci1yYWRpdXM9MTA%3D)


   17. Click on Public accessInfo
![Step 17 screenshot](https://images.tango.us/workflows/d2f08431-bcc7-41eb-87d3-e352db14d51e/steps/8b552937-dd77-496a-be05-c7904757cc7b/9257cc54-0206-4fa5-b016-01ce0717d32a.png?crop=focalpoint&fit=crop&fp-x=0.2142&fp-y=0.2630&fp-z=1.5651&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=84&mark-y=226&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz02MzcmaD0xMjImZml0PWNyb3AmY29ybmVyLXJhZGl1cz0xMA%3D%3D)


   18. Choosing the PVC security group
![Step 18 screenshot](https://images.tango.us/workflows/d2f08431-bcc7-41eb-87d3-e352db14d51e/steps/24a5e5de-ac10-47a7-a8c9-20282e3686fe/cc618b92-a270-4e0a-93d4-88bbe3079043.png?crop=focalpoint&fit=crop&fp-x=0.2142&fp-y=0.3793&fp-z=1.5427&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=74&mark-y=285&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz02NDUmaD0xMjYmZml0PWNyb3AmY29ybmVyLXJhZGl1cz0xMA%3D%3D)


   19. Click on Password authentication…
![Step 19 screenshot](https://images.tango.us/workflows/d2f08431-bcc7-41eb-87d3-e352db14d51e/steps/e320a562-a92d-4a26-8805-cf1516ca03fb/4772f3bb-1004-47bb-b4f3-0e372cca92c1.png?crop=focalpoint&fit=crop&fp-x=0.2142&fp-y=0.4667&fp-z=1.5651&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=84&mark-y=268&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz02MzcmaD0xNjEmZml0PWNyb3AmY29ybmVyLXJhZGl1cz0xMA%3D%3D)


   20. Review the information if using free tier
![Step 20 screenshot](https://images.tango.us/workflows/d2f08431-bcc7-41eb-87d3-e352db14d51e/steps/c76142c4-06ec-438b-8375-9b247a5fa607/7431e1ed-55f2-445f-8ee6-9f5146a905e1.png?crop=focalpoint&fit=crop&fp-x=0.2142&fp-y=0.7265&fp-z=1.5208&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=65&mark-y=302&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz02NTMmaD0yMTEmZml0PWNyb3AmY29ybmVyLXJhZGl1cz0xMA%3D%3D)


   21. Click on Create database
![Step 21 screenshot](https://images.tango.us/workflows/d2f08431-bcc7-41eb-87d3-e352db14d51e/steps/22ead2f3-df17-4505-9a65-e47c36c92fcb/01fe21dd-6f9f-49c9-9852-758dbf003a3a.png?crop=focalpoint&fit=crop&fp-x=0.3559&fp-y=0.9318&fp-z=2.6736&w=1200&border=2%2CF4F2F7&border-radius=8%2C8%2C8%2C8&border-radius-inner=8%2C8%2C8%2C8&blend-align=bottom&blend-mode=normal&blend-x=0&blend-w=1200&blend64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL21hZGUtd2l0aC10YW5nby13YXRlcm1hcmstdjIucG5n&mark-x=481&mark-y=540&m64=aHR0cHM6Ly9pbWFnZXMudGFuZ28udXMvc3RhdGljL2JsYW5rLnBuZz9tYXNrPWNvcm5lcnMmYm9yZGVyPTglMkNGRjc0NDImdz0yMzcmaD02MCZmaXQ9Y3JvcCZjb3JuZXItcmFkaXVzPTEw)

* Amazon Simple Email Service (SES)
   More info: https://aws.amazon.com/ses/developer-resources/?whats-new-cards.sort-by=item.additionalFields.postDateTime&whats-new-cards.sort-order=desc

* Install server on EC2
   1. Open your terminal or SSH client.
   2. Locate the private key (.pem) file that corresponds to the public key you specified when you launched the instance.
   3. Change the file permissions of your private key file to 400, so that only the owner has read and write permissions

      ```chmod 400 /path/to/your/private/key.pem```

   4. Connect to your instance using SSH. Replace the example IP address with the IP address of your EC2 instance. Use the following command

      ```ssh -i /path/to/your/private/key.pem ec2-user@<EC2-instance-public-IP>```

      b. Note: The username might be different based on the operating system of your EC2 instance. For Amazon Linux 2, use "ec2-user". For
   5. Install the Apache web server by running the following command:

      ```sudo yum install httpd -y```

   6. Start the Apache service by running the following command:

      ```sudo service httpd start```

      b. Verify that the web server is running by opening a web browser and entering the public IP address or DNS name of your instance in the address bar. You should see the default Apache test page.
   7. To ensure that Apache starts automatically when the instance is rebooted, run the following command

      ```sudo chkconfig httpd on```

* Host File into server
   1. Copy file from local machine into server
   2. Open your Power Shell or cmd in Windows or terminal in Linux/Mac
   3. Navigate to the directory containing the file you want to copy.
   4. Use the scp command to copy the file to the EC2 instance.
     ```scp /path/to/local/file ec2-user@<IPaddress>:/var/www/html/```
     Note server file in var/www/html

   5. When prompted, enter the password for the EC2 instance.
   6. If necessary, adjust the ownership or permissions of the copied file to allow the apache user to access it.


* As a LAMP stack website, this project is set up in such a way where these aspects are intergral to the project and require availability and installation.

* Particularly, regarding the database, the current SQL for table creation is found in the database folder and is labeled CSC190_database_2.2. Use this file to base your database on. Several php pages require this exact format. To edit the database's name go into the includes folder and edit the dbh.inc file database settings appropriately.

* All files located in the oldFiles folder may be removed and are recommended to be removed for security reasons (before deployment this folder will be removed along with all of its contents). This also applies to all old database files not pertaining to the current database version.

## Testing: Important Features to Consider
  ### To ensure that important features are thoroughly tested, we use PHPUnit for unit tests, integration tests, and functional tests of PHP code, as well as Selenium for automated testing of web application functionality.
  1. The instructions for setting up a test environment for PHPUnit testing on Windows are:
  * Install PHP:
      a. If you don't already have PHP installed, download the latest version of PHP for Windows from the official PHP website at https://windows.php.net/download/. Choose the version that matches your system architecture.
      b. After downloading the PHP zip file, extract it to a directory on your computer.
      c. Add the path to the PHP executable to your system’s PATH environment variable. This will allow you to run the ‘php’ command from anywhere in the command prompt.

  * Install Composer:
      a. Composer is a dependency manager for PHP.
      b. Download the latest version of Composer for Windows from the official Composer website at https://getcomposer.org/download/.
      c. After downloading the Composer setup file, run it and follow the prompts to install Composer.

  * Install PHPUnit:
      PHPUnit is a PHP testing framework, and you can install it using Composer.

  * Create a test file:
      a. Create a test directory.
      b. Write your tests.

  * Run tests by running this command line: ./vendor/bin/phpunit

  2. Setting up PHPUnit testing on a Mac is similar to that on Windows. You can use Homebrew to install PHP and Composer.

  3. For setting up a test environment for Selenium, you can refer to the following link for instructions on how to set up Selenium for automated testing of web applications: https://www.selenium.dev/selenium-ide/.

### After setting up the testing environment:
 - We have written test cases for important database functions and performed PHP Unit tests on them. These tests were run on the command line and the results were output on the terminal window. The important functions we created tests for include:

     * **Connection to the database**
     * **Insert statements**
     * **Select statements**
     * **Update statements**
     * **Delete statements**
  - Here are some examples of important database function test cases, along with the screenshots of their test results and descriptions. Other important features will be tested similarly.

    + Database Connection Test Result: This screenshot shows the result of a test case for the database connection function. It confirms whether the database connection is successful or not.

      ![My Image](/image/connectDatabase.jpg)

    + Insert Statement Test Result: This screenshot shows the result of a test case for the insert statement function. It confirms whether the data is successfully inserted into the database or not.
      ![My Image](/image/insert.jpg)
      ![My Image](/image/insertDatabase.jpg)

    + Select Statement Test Result: This screenshot shows the result of a test case for the select statement function. It confirms whether the correct data is retrieved from the database or not.
      ![My Image](/image/select.jpg)


  - We perform Selenium tests on the entire system of our web application. To create the test cases, we first create a test project and enter our website link into the Selenium extension. Then, we write down each test case one by one and execute them. We open our webpage and click on the record button to allow Selenium to record our steps. Afterwards, we run the test cases and take a screenshot of the pass/fail result. At the same time, we also perform visualization tests for the frontend. The results can be seen in the screenshot below.

  - Here are the important features that we tested:
    * **Participation**:
      + Survey Intake Form for First-Time User
        - Able  to Fill Out Survey
      + Account Creation
        - Receive the Link to Activate and Activate Account
      + Login Page
        - Able to Login Using Email and Password
        - Display Error Message if Login Fails
      + ForgotPassword
         - Able to Request Password Reset Link through Email
         - Able to Create a New Password
      + Dashboard
        - Able to Edit and Save Personal Information
        - Able to Upload File
        - Able to View, Eidt , and Save Contact and Demographic Information
        - Able to View Training Information
        - Able to View Support Services
        - Able to Navigate and Interact with Different Tabs and Button

    * **Employee**:
        + Login Page
          - Able to Login Using Email and Password
          - Display Error Messages if Login Fails
        + Forgot Password
        + DashBoard
          - Able to Edit and Save Personal Information
          - Able to Search for Client Records( ID and Named Based)
          - Able View Client Accounts
          - Able to Log Training Activity Forms
          - Able to Search for Client Records with Report Display
    * **Admin**:
        + Login Page
          - Able to Login using Email and Password
          - Display Error Messages if Login Fails
        + Forgot Password
          - Able to Request Password Reset Link though Email
          - Able to Create a New Password
        + Dashboard
          - Able to Edit and Save Personal Information
          - Able to Search for Specific Employee Records
          - Able to Search for Specific Client Records
          - Able to Assign Clients to Employees
          - Able View , Access/Edit, Delete, and Deactivate Client Account
          - Edit Password and Email Link of Employee or Admin Account
          - Able to Log Training Activity Forms
          - Able to Log Grant Forms
          - Able to View, Search , and Filter Grant Information
          - Able to Edit and Delete Grant Information

  - Here are some examples of the screenshots of test results and their descriptions of some important features that we listed above. Other important features will be tested similarly.

    - **Participation**:
      + Survey Intake Form for First-Time User: This screenshot shows the result of a test case for a new user able to fill out the survey intake form. It confirms whether the form submission is successful or not.
        ![My Image](/image/survey1.jpg)
        ![My Image](/image/survey2.jpg)
        ![My Image](/image/survey3.jpg)
        ![My Image](/image/testcaseSurvey.jpg)
      + Account Creation: This screenshot shows the result of a test case for participants who are able to create an account after completing the survey and receive an account activation code through email. They are then able to click on the link to activate their account. The screenshot confirms whether this process is successful or not
        ![My Image](/image/accountcreation1.jpg)
        ![My Image](/image/accountcreation2.jpg)
        ![My Image](/image/accountcreation3.jpg)
      + Upload File: This screenshot shows the result of a test case where we tested whether participants are able to successfully upload and download files. The test confirms whether this functionality is working properly or not.
        ![My Image](/image/uploadfile1.jpg)
        ![My Image](/image/uploadfile2.jpg)
    - **Employee**:
      + Training Activity Form: This screenshot shows the result of a test case for an employee's ability to fill out the training report form for a client whom they coach. It confirms whether the submission of the training report form is successful or not.
        ![My Image](/image/trainingreport1.jpg)
        ![My Image](/image/trainingreport2.jpg)
        ![My Image](/image/trainingreport3.jpg)
    - **Admin**:
      + Search for Specific Employee Records: This screenshot shows the result of a test case for searching specific employee records. It confirms whether we are able to successfully perform a search or not.
        ![My Image](/image/adminsearchemployee1.jpg)
        ![My Image](/image/adminsearchemployee2.jpg)
      + Logging Grant Forms: This screenshot shows the result of a test case that verifies whether we are able to successfully fill out and submit a grant form.
        ![My Image](/image/grantreport1.jpg)
        ![My Image](/image/grantreport2.jpg)
        ![My Image](/image/grantreport3.jpg)
        ![My Image](/image/grantreport4.jpg)
        ![My Image](/image/grantreport5.jpg)












## System Diagram
### Participation
![My Image](/image/participationSystemDagram.jpg)
### Employee
![My Image](/image/EmployeeSystemDiagram.jpg)
### Admin
![My Image](/image/AdminSystemDiagram.jpg)
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

  5. Sprint 5: (2/1--2/22)

      * Total Stories Completed: 1

      * Major Milestones: CN-190 Grant Report: Finished (2/16)

  6. Sprint 6: (2/22--3/8)

      * Total Stories Completed: 1

      * Major Milestones: CN-232 Grant Report Synch: Finished (3/2)

  7. Sprint 7: (3/8--3/22)

      * Total Stories Completed: 4

      * Major Milestones: CN-213 Participation Dashboard: Finished (3/9), CN-227 Participation Login Page: Finished (3/16), CN-213 Participation Dashboard: Finished (3/16)

  8. Sprint 8: (3/22--4/5)

      * Total Stories Completed: 2

      * Major Milestones: CN-14 Task Report: Finished (3/22), CN-187 CSC 191: Recovery Admin: Finished (4/5)

  9. Sprint 9: (4/5--4/19)

      * Total Stories Completed: 7

      * Major Milestones: CN-294 Edit Participation Info: Finished (4/17), CN-242 Employee Dashboard: Finished (4/13), CN-231 Administration Dashboard: Finished (4/19), CN-214 AWS test server: Finished (4/19), CN-13 Search Option: Finished (4/19)

  10. Sprint 10: (4/19--5/3)

      * Total Stories Completed: None concerning Jira

      * Major Milestones: Documentation Being Completed

## Database Diagrams


![My Image](/image/EERDagram.jpg)

##### Figure:EER Diagram
<br>

![My Image](/image/RelationalDagram.jpg)
#### Figure: Relational Diagram
