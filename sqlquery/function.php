<?php
function getString($query)
{
    // Replace 'username', 'password', 'database_name', and 'localhost' with your actual credentials
    $conn = mysqli_connect("localhost","root","","hotel_management");

    // Check if the connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Execute the query
    $result = mysqli_query($conn, $query);
    $value;
    // Check if the query was successful
    if ($result) {
        // Fetch the single value from the result set
        $row = mysqli_fetch_array($result);

        // Access the value using the column name or index (e.g., $row['column_name'] or $row[0])
        // Here, I assume you are selecting a single column in the query
        $value = $row['email'];
        // Free the result set
        mysqli_free_result($result);
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
    
    if ($value){
        return $value;
    }
    else{
        return "Error";
    }
}


function getForCombo($query)
{
    // Replace 'username', 'password', and 'database_name' with your actual credentials
    try {
        $conn = new PDO("mysql:host=localhost;dbname=hotel_management", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Execute the query
        $stmt = $conn->query($query);

        // Return the PDOStatement object
        return $stmt;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}

function displaySQLData($query)
{
    $db = mysqli_connect("localhost", "root", "", "hotel_management");

// Check the database connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the database (Replace 'your_table_name' with the actual name of your table)
$sql = $query;
$result = mysqli_query($db, $sql);

// Close the database connection
mysqli_close($db);
}

?>