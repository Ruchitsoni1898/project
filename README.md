Here are some test cases you can use to verify the functionality of the code:

1. Test Case: Database Connection and Table Creation
- Connect to the database and verify that the connection is successful.
- Check if the "sales" table exists in the database.
- Check if the "products" table exists in the database.

2. Test Case: Reading JSON Data and Saving to Database
- Provide a JSON data array with multiple sale records.
- Read the JSON data and save it to the "sales" and "products" tables in the database.
- Verify that the data is correctly inserted into the tables by checking the number of rows and comparing the values with the original JSON data.

3. Test Case: Filtering Sales Data by Customer, Product, and Price
- Create a test scenario where you have a mixture of sales records with different customers, products, and prices.
- Implement the PHP code to handle the filters for customer, product, and price.
- Apply filters individually and in combination to test the correctness of the filtering logic.
- Verify that the filtered results match the expected output.

4. Test Case: Total Price Calculation
- Apply filters to the sales data and retrieve the filtered results.
- Calculate the total price of the filtered entries.
- Compare the calculated total price with the expected total price for the given filter criteria.
