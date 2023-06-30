<!DOCTYPE html>
<html>
<head>
    <title>Simple Filters record page using php</title>
</head>
<body>
    <h2>Filter Records</h2>
    <form method="post" action="filter_record.php">
        <label for="customer">Customer:</label>
        <input type="text" name="customer" id="customer">

        <label for="product">Product:</label>
        <input type="text" name="product" id="product">

        <label for="price">Price:</label>
        <input type="number" name="price" step="0.01" id="price">

        <input type="submit" name="submit" value="Filter">
    </form>
</body>
</html>
