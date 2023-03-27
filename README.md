# Login Form with Regex in PHP

Displays basic login, registration, change password, and logout forms in the PHP programming language. The login, registration and change password forms use regex so that users can submit entries that are adjusted by the system.

## Features

### Login

- Ask the user to enter email and password
- The system will check if the email has been registered
- The system will check if the password is correct
- If everything is correct the system will redirect to the index.php page

### Register

- Ask the user to enter username, full name, email and password
- The system will check whether the email entered by the user is correct and following the regex
- The system will check whether the email already exists
- If so, the system will suggest several new email addresses that is not exists
- The system will check if the password entered by the user is correct and following the regex
- There is a 'generate' button to create a password that is suggested by the system according to the regex
- If all are correct the system will redirect to the login.php page

## How to setup

- Clone or download this repository
- Unzip the downloaded folder if the folder is compressed
- Download and install the xampp application
- Open the xampp folder on each computer and navigate to the htdocs folder then create a new folder. Example: C:\xampp\htdocs\your new folder
- Move all extracted files into that folder
- Open the xampp application > start/run the Apache and MySQL modules
- Open a browser > go to the phpmyadmin page 'http://localhost/phpmyadmin' > create a new database with the name 'regex_db' > enter the database 'regex_db' and go to the import menu > insert a file called 'regex_db.sql' > Go
- Go to 'http://localhost/regex/' page to run it
