# Helpdesk-UI
Helpdesk-UI is a project developed for 

# Setup
To setup this up and running you need a webserver. In this project we used some spesific HTML5 elements that require Google Chrome as your browser. Furthermore you need the latest MySQL version. The setup consists of two phases.
1. Webserver Installation
2. Database Installation

## 1. Webserver Installation
To install your webserver you can either buy a hosting server or install your own. The simplest way to install your own webserver is by downloading and installing XAMPP webserver. It consists of many services but we only need Apache and MySQL. After downloading XAMPP from the official website, go an install it. Notice, that you may need to disable and close any applications running on port 80 or 8080 such as 'Skype' or 'Steam'. To verify that you can installed and started APache and MySQL webservices go to the url 'http://localhost/' in your Google Chrome web browser.
Next, the source files of the project must be copied in the C:\xampp\htdocs\ for windows users or /opt/lampp/htdocs for linux users. Then you can simply go to 'http://localhost/helpdesk-UI/ and open the helpdesk interface. It should not be working 100% since we need to complete the step2.

## 2 Database Installation
Go to 'http://localhost/phpmyadmin' and create a new database with the name 'helpdesk'. After that click on the new database that you have just created and import the .sql file that can be found in the source code. Once done, the helpdesk interface should be running smoothly.

# Contact
For any buys or issues in the installation part or the source code please contact us at vtzivaras (at) gmail.com.
