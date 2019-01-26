# Web_Attendance_App
LAMP attendance web server receives POST requests from devices and logs it into SQL database. 

### Device Requirments
- Any Raspberry Pi
- Arduino Uno
- Arduino Ethernet Shield
- MRFC522 RFID Card Reader


### Wiring



## Setup Raspberry Pi
Use these commands to configure the raspberry PI web server.

1. **sudo apt-get update** and **sudo apt-get upgrade** :Update your PI.

2. **sudo apt-get install apache2 -y** :Install Apache2 Debian server.

3. **sudo chown -R pi:www-data /var/www/html/** :Change directory permissions.

4. **sudo chmod -R 770 /var/www/html/** : Change directory file permissions.

5. **sudo apt install php php-mbstring** :Install PHP.

6. **sudo apt-get install php-mbstring php7.0-mbstring php-gettext** :More PHP installation.

7. **sudo service apache2 restart** :Restart Apache web service.

8. **sudo rm /var/www/html/index.html** :Delete index.html file created by the Apache install.

9. **echo "<?php phpinfo ();?>" > /var/www/html/index.php** :Create a PHP test file in the same directory.

10. **sudo apt install mysql-server php-mysql** :Install MYSQL database.

11. **sudo mysql --user=root** :Test to make sure MYSQL is working.

12. Now you need to configure the root user on MYSQL. Type each of the bolded commands then press enter.
   - **DROP USER 'root'@'localhost';**
   - **CREATE USER 'root'@'localhost' IDENTIFIED BY 'password';**
   - **GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost';**

13. **sudo apt install phpmyadmin** :Install phpmyadmin web server to graphically manage your MYSQL databse.


Follow this link to setup wifi connection and learn more abou the installation procedure. 
https://www.teachmemicro.com/raspberry-pi-zero-web-server/
Follow this link for more detailed installation instructions.
https://howtoraspberrypi.com/how-to-install-web-server-raspberry-pi-lamp/
