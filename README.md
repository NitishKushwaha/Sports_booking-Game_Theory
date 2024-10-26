# Sports booking 
## college ID - IIT2021086
## Name - Nitish Kushwaha

### Project Overview
This project is a sports booking website for a sports technology company's operations team, where users can book various sports facilities at two centers: Indiranagar and Koramangala. The system prevents double bookings, allowing users to select time slots and view current bookings.

### Prerequisites
Before setting up the project, ensure you have the following installed on your local machine:

**XAMPP** – for PHP and MySQL setup.  
**PHP** – Make sure it's installed with XAMPP.  
**MySQL** – for database management.  
**Web Browser** – to test the website.  

### Project Structure
The project includes the following core components:  

Frontend: Developed using HTML, CSS, and JavaScript.  
Backend: Developed using PHP for server-side logic.  
Database: MySQL is used for managing bookings, sports, centers, and resources.  

### Setting Up the Project
1. clone the repo:
   ```bash
    git clone https://github.com/yourusername/sports-booking-website](https://github.com/NitishKushwaha/Sports_booking-Game_Theory.git
   
2. Move the project folder to XAMPP's `htdocs` directory:  
    Copy the entire project folder to `C:/xampp/htdocs/`.

3. Start XAMPP:
   Open XAMPP Control Panel and start both the Apache and MySQL services.

4. Setup the database:  
   Open your web browser and go to http://localhost/phpmyadmin.  
   Create a new database called sports_booking.

5. Configure the Database Connection:  
   Ensure the database credentials are set as follows (or adjust them according to your setup
   
   ```php
   $servername = "localhost"; 
   $username = "root"; 
   $password = ""; 
   $dbname = "sports_booking";

6. In your web browser, go to `http://localhost/sports-booking-website/index.php` to access the booking website.


### Running the Project

The user is prompted to enter their name and the date of the booking.

![image](https://github.com/user-attachments/assets/6c857393-8a95-4167-b923-8356b84ca83f)  
The user selects a center (Indiranagar or Koramangala).  

![image](https://github.com/user-attachments/assets/e2f74329-cd14-4696-9664-425106d509d5)

After selecting the center, the user can choose a sport.  
only those sports which are available at particular center are displayed  

![image](https://github.com/user-attachments/assets/b7a607da-d532-40d7-93cb-b8948026207e)  

The user can either view current bookings or create a new booking by selecting a resource (court) and a time slot.  

![image](https://github.com/user-attachments/assets/ee7520f2-1ac9-446f-93f6-4022750ed430)  

![image](https://github.com/user-attachments/assets/163b569c-ea81-4887-9000-76952bbb8516)  

double bookings are not allowed  

![image](https://github.com/user-attachments/assets/25f5095a-4b05-43da-8b84-5188d240d022)

Screen on successful booking  

![image](https://github.com/user-attachments/assets/bed99850-e9d5-4c71-aa47-e4cd82dcb28f)  

### Links to Deployed Applications:

Frontend + Backend (on AWS) : ec2-16-171-38-227.eu-north-1.compute.amazonaws.com
Frontend (on vercel) : https://sports-booking-game-theory.vercel.app/  

Limitations:  

* The website is not yet mobile-responsive.
*  There is no user authentication system implemented (future improvement).  
* Real-time database locking for concurrent access has not yet been implemented (future improvement).  










   
