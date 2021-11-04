<!DOCTYPE html>

<!--html xmlns="http://www.w3.org/1999/xhtml"-->

<html>
    <head>
        <meta charset="UTF-8">
        <title> Expense Tracker </title>
    </head>
    
    <body>
        
        <?php
        
        /* transaction table */
        $transaction_query = 
        'CREATE TABLE transaction(
            transactionID INT AUTO_INCREMENT NOT NULL,
            categoryName CHAR(100),
            source CHAR(100),
            sourceType CHAR(100) NOT NULL,
            amount DECIMAL(65,2) NOT NULL,
            amountType BOOLEAN NOT NULL,
            description VARCHAR(255),
            dateOfTransaction DATE,
            PRIMARY KEY(transactionID)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8';
        
        
        /* user table */
        $user_query =
        'CREATE TABLE user(
            userID INT AUTO_INCREMENT NOT NULL,
            userName CHAR(100) NOT NULL,
            password CHAR(20) NOT NULL,
            firstName CHAR(100) NOT NULL,
            lastName CHAR(100) NOT NULL,
            middleInitial CHAR(1),
            securityQ1 CHAR(250) NOT NULL,
            securityA1 CHAR(100) NOT NULL,
            securityQ2 CHAR(250) NOT NULL,
            securityA2 CHAR(100) NOT NULL,
            DOB DATE NOT NULL,
            businessName CHAR(100),
            PRIMARY KEY(userID),
            FOREIGN KEY(transactionID) REFERENCES transaction(transactionID)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8';
        
        echo "query added <br>";
        ?>
    </body>
</html>