<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Rizky Fish Store - Sales</title>
</head>
<body>
    <header>
        <div class="banner"></div>
        <nav>
            <div>
                <h2>Fadey Fish Store</h2>
            </div>
            <div>
                <a href="index.php">Home</a>
                <a href="fish.php">Fish</a>
                <a href="customers.php">Customers</a>
                <a href="sales.php">Sales</a>
            </div>
        </nav>
    </header>
    <main>
        <div class="data">
            <div class="title">
                <h3>Data Transaksi</h3>
            </div>
            <div class="content">
                <table>
                    <tbody>
                        <tr>
                            <th>Sale ID</th>
                            <th>Customer ID</th>
                            <th>Fish ID</th>
                            <th>Quantity Kg</th>
                            <th>Sale Date</th>
                        </tr>
                        <?php
                            require_once 'db.php';
        
                            $query = "SELECT * FROM sales";
                            $result = mysqli_query($conn, $query);
                            
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                    <td>" . $row['sale_id'] . "</td>
                                    <td>" . $row['customer_id'] . "</td>
                                    <td>" . $row['fish_id'] . "</td>
                                    <td>" . $row['quantity_kg'] . "</td>
                                    <td>" . $row['sale_date'] . "</td>
                                </tr>";
                            }
        
                            mysqli_close($conn)
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>