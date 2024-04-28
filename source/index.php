<?php
   $servername = "db";
   $database = "proyecto";
   $username = "user";
   $password = "pass";

   // Create connection
   $conn = mysqli_connect($servername, $username, $password, $database);
   // Check connection
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error()."</p>");
   }
   echo "Connected successfully";

   if ($conn->query("DROP TABLE IF EXISTS products;")===TRUE) {
      printf("Se borró con éxito la tabla products.\n</p>");
   }

   if ($conn->query("CREATE TABLE products ( productID    INT UNSIGNED  NOT NULL AUTO_INCREMENT, productCode  CHAR(3)       NOT NULL DEFAULT '', name         VARCHAR(30)   NOT NULL DEFAULT '', quantity     INT UNSIGNED  NOT NULL DEFAULT 0, price        DECIMAL(7,2)  NOT NULL DEFAULT 99999.99, PRIMARY KEY  (productID) );") === TRUE) {
      printf("Se creó con éxtio la tabla products.\n");
   }

   if ($conn->query("INSERT INTO products VALUES (NULL, 'PEN', 'Pen Blue',  8000, 1.25), (NULL, 'PEN', 'Pen Black', 2000, 1.25);")===TRUE) {
      printf("Se insertaron products.\n</p>");
   }

   if ($resultado=$conn->query("SELECT name FROM products;")) {
      while ($row = $resultado->fetch_assoc()){
         printf("Product ->". $row["name"]. "\n</p>");
      }
      $resultado->close();
   }

   printf("Se leyeron products.\n</p>");

   mysqli_close($conn);

   phpinfo();
?>

