<?php
function filterRecords($customer, $product, $price)
{
    $data = file_get_contents('sales_data.json');
    if ($data === false) {
        die("Failed to read the JSON file.");
    }

    $records = json_decode($data, true);
    if ($records === null) {
        die("Failed to decode the JSON data.");
    }

    // Apply filters
    $filteredRecords = array_filter($records, function ($record) use ($customer, $product, $price) {
        $customerMatch = empty($customer) || stripos($record['customer_name'], $customer) !== false;
        $productMatch = empty($product) || $record['product_id'] == $product;
        $priceMatch = $price <= 0 || $record['product_price'] <= $price;

        return $customerMatch && $productMatch && $priceMatch;
    });

    return $filteredRecords;
}

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    $customer = $_POST['customer'];
    $product = $_POST['product'];
    $price = floatval($_POST['price']);

    $filteredRecords = filterRecords($customer, $product, $price);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Filtered Records</title>
</head>
<body>
    <h2>Filter Records</h2>
    <form method="post" action="">
        <label for="customer">Customer:</label>
        <input type="text" name="customer" id="customer">

        <label for="product">Product:</label>
        <input type="text" name="product" id="product">

        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" id="price">

        <input type="submit" name="submit" value="Filter">
    </form>

    <h2>Filtered Results</h2>
    <?php if (isset($filteredRecords) && !empty($filteredRecords)) { ?>
        <table border="1">
            <tr>
                <th>Customer</th>
                <th>Product</th>
                <th>Price</th>
            </tr>
            <?php
            $totalPrice = 0;
            foreach ($filteredRecords as $record) {
                $totalPrice += $record['product_price'];
            ?>
            <tr>
                <td><?php echo $record['customer_name']; ?></td>
                <td><?php echo $record['product_id']; ?></td>
                <td><?php echo $record['product_price']; ?></td>
            </tr>
            <?php
            }
            ?>
            <tr>
                <td colspan="2" style="text-align: right;"><strong>Total Price:</strong></td>
                <td><?php echo $totalPrice; ?></td>
            </tr>
        </table>
    <?php } else { ?>
        <p>No results found.</p>
    <?php } ?>
</body>
</html>
