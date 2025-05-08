README.txt - Workly Job Portal  

1. Requirements  
- Install XAMPP ([Download](https://www.apachefriends.org/download.html))  
- Ensure Apache and MySQL are running  

2. Setup Instructions 
1. Extract `Workly.zip` and move it to `C:\xampp\htdocs\`  
2. Import Database: 
   - Open `http://localhost/phpmyadmin/`  
   - Create a database named workly  
   - Import `Workly/database/workly.sql`  

3. Configure Database** (`config.php`)  
```php

4. Run the Project**  
- Open `http://localhost/Workly/` in your browser  

5. Default Login Credentials**  
- Admin: `admin@example.com` / `admin123`  
- User: `user@example.com` / `user123`  

6. Troubleshooting**  
- Database error?** Check MySQL is running & re-import `workly.sql`.  
- Page not found?** Ensure the project is in `htdocs`.  

