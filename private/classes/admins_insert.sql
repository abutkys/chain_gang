INSERT INTO admins (first_name,last_name,email,username,hashed_password)


| id              | int(11)      | NO   | PRI | NULL    | auto_increment |
| first_name      | varchar(255) | NO   |     | NULL    |                |
| last_name       | varchar(255) | NO   |     | NULL    |                |
| email           | varchar(255) | NO   |     | NULL    |                |
| username        | varchar(255) | NO   | MUL | NULL    |                |
| hashed_password