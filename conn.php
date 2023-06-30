
<?php
$server = "localhost";
$db = "rexx_systems";
$uname = "root";
$pass = "soni";
$port = 3307; // Specify the port number separately

//Read json file
$jsondata = file_get_contents('sales_data.json');

// Check if the JSON file was read successfully
if ($jsondata === false) {
    die("Failed to read the JSON file.");
}

//decode the data
$data = json_decode($jsondata, true);

// Check if JSON decoding was successful
if ($data === null) {
    die("Failed to decode the JSON data.");
}

// Create connection
$conn = mysqli_connect($server, $uname, $pass, $db, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


foreach ($data as $item) {
    // Insert into sales table
    $saleId = mysqli_real_escape_string($conn, $item['sale_id']);
    $customerName = mysqli_real_escape_string($conn, $item['customer_name']);
    $customerMail = mysqli_real_escape_string($conn, $item['customer_mail']);
    $productId = mysqli_real_escape_string($conn, $item['product_id']);
    $saleDate = mysqli_real_escape_string($conn, $item['sale_date']);

    $query = "INSERT INTO sales_table (sale_id, customer_name, customer_mail, product_id, sale_date) 
              VALUES ('$saleId', '$customerName', '$customerMail', '$productId', '$saleDate')
              ON DUPLICATE KEY UPDATE 
              customer_name = VALUES(customer_name),
              customer_mail = VALUES(customer_mail),
              product_id = VALUES(product_id),
              sale_date = VALUES(sale_date)";

    $conn->query($query);

    // Insert into products table if the product price exists
    if (isset($item['product_price'])) {
        $productName = mysqli_real_escape_string($conn, $item['product_name']);
        $productPrice = mysqli_real_escape_string($conn, $item['product_price']);

        $query = "INSERT INTO product_table (product_id, product_name, product_price) 
                  VALUES ('$productId', '$productName', '$productPrice')
                  ON DUPLICATE KEY UPDATE 
                  product_name = VALUES(product_name),
                  product_price = VALUES(product_price)";

        $conn->query($query);
    }

}

// Close the database connection
echo "Data has been imported into the database.";
mysqli_close($conn);
// Close the database connection
?>
