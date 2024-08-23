
### **Reset MySQL Root Password**

1. **Stop MySQL Service:**
   - Stop MySQL from the XAMPP Control Panel.

2. **Edit `my.ini` Configuration File:**
   - Open `my.ini` from the XAMPP Control Panel under `Config`.
   - Add the following line under the `[mysqld]` section:
     ```ini
     skip-grant-tables
     ```
   - Save and close the file.

3. **Start MySQL Without Grant Tables:**
   - Restart MySQL from the XAMPP Control Panel.

4. **Log in Without a Password:**
   - Open the XAMPP Shell and connect to MySQL:
     ```bash
     mysql -u root
     ```

5. **Reset the Root Password:**
   - Run the following SQL command:
     ```sql
     UPDATE mysql.user SET authentication_string=PASSWORD('your_new_password') WHERE User='root';
     FLUSH PRIVILEGES;
     ```
     Replace `'your_new_password'` with your desired new password.

6. **Remove `skip-grant-tables` and Restart MySQL:**
   - Go back to the `my.ini` file and remove the `skip-grant-tables` line.
   - Save the file and restart MySQL from the XAMPP Control Panel.

### **Final Check:**

After following these steps, the `ERROR 1130` should be resolved, and you should be able to connect to the MariaDB server as the root user from `localhost`.