# **QuickBite – Online Food Ordering System**



#### &#x20;**Project Overview**



* QuickBite is a web-based food ordering system developed for academic purposes. The system allows users to browse food items, manage a cart, place orders, and submit inquiries through a contact form.



* The application is designed with a clean user interface and supports user authentication, order management, and database integration.





##### **Features**



* User registration and login with session management
* Menu browsing with category filtering
* Search functionality for menu items
* Add to cart and manage cart items
* Order placement with delivery details
* Payment method selection (interface-based)
* User dashboard displaying account details
* Contact form with message storage
* Order details stored in the database





##### &#x20;**Technologies Used**



###### &#x20;**Frontend**



* HTML5
* CSS3
* Bootstrap 5
* JavaScript



###### &#x20;**Backend**



* PHP



###### &#x20;**Database**



* MySQL



###### &#x20;**Server Environment**



* WAMP Server







##### &#x20;**Project Structure**





QuickBite/

│

├── auth/

│   ├── login.php

│   ├── register.php

│   └── logout.php

│

├── includes/

│   ├── db.php

│   └── functions.php

│

├── css/

│   └── style.css

│

├── js/

│   └── script.js

│

├── images/

│

├── index.php

├── menu.php

├── cart.php

├── order.php

├── contact.php

├── dashboard.php

│

├── quickbite\_db.sql

└── README.md







##### &#x20;**Setup Instructions**



**Step 1: Install WAMP Server**



Download and install WAMP Server on your computer.



**Step 2: Copy Project Folder**



Place the QuickBite folder inside:



C:\\wamp64\\www\\



**Step 3: Start WAMP Services**



Ensure that:



1. Apache is running
2. MySQL is running



**Step 4: Import Database**



1\. Open: http://localhost/phpmyadmin

2\. Create a database named: quickbite\_db

3\. Import the file: quickbite\_db.sql



**Step 5: Run the Application**



Open your browser and go to:



http://localhost/QuickBite/



###### **Database Tables**



The system uses the following main tables:



1. users
2. orders
3. messages





###### **Additional Notes**



* Passwords are securely stored using hashing
* Cart functionality is managed using browser localStorage
* Payment functionality is simulated for demonstration purposes
* The system is designed for academic use and does not include real payment integration





