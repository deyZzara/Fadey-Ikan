<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Fadey Fish Store - Fish</title>
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
                <h3>Data Ikan</h3>
            </div>
            <div class="search">
                <form action="fish.php" method="post">
                    <h5>Cari Ikan</h5>
                    <input type="text" name="cari" placeholder="Masukkan nama ikan">
                    <input type="submit" name="tombol_cari" value="Cari">
                </form>
            </div>
            <div class="filter">
                <form action="fish.php" method="post">
                    <h5>Urutkan Berdasarkan</h5>
                    <select name="urutan">
                        <option value="reset">Reset</option>
                        <option value="fish_id_asc">Fish ID (Naik)</option>
                        <option value="fish_id_desc">Fish ID (Turun)</option>
                        <option value="fish_name_asc">Fish Name (A - Z)</option>
                        <option value="fish_name_desc">Fish Name (Z - A)</option>
                        <option value="price_per_kg_asc">Price Per Kg (Naik)</option>
                        <option value="price_per_kg_desc">Price Per Kg (Turun)</option>
                        <option value="stock_kg_asc">Stock Kg (Naik)</option>
                        <option value="stock_kg_desc">Stock Kg (Turun)</option>
                    </select>
                    <input type="submit" name="tombol_urutan" value="Urutkan">
                </form>
            </div>
            <div class="content">
                <table>
                    <tbody>
                        <tr>
                            <th>Fish ID</th>
                            <th>Fish Name</th>
                            <th>Price Per Kg</th>
                            <th>Stock Kg</th>
                        </tr>
                        <?php
                            require_once 'db.php';
    
                            if (isset($_POST['tombol_cari'])) {
                                $cari = $_POST['cari'];
                                $query = "SELECT * FROM fish WHERE MATCH(fish_name) AGAINST('" . $cari .  "' IN NATURAL LANGUAGE MODE)";
                            } else if (isset($_POST['tombol_urutan'])) {
                                $urutan = $_POST['urutan'];
    
                                if ($urutan == 'fish_id_asc') {
                                    $query = "SELECT * FROM fish ORDER BY fish_id ASC";
                                } else if ($urutan == 'fish_id_desc') {
                                    $query = "SELECT * FROM fish ORDER BY fish_id DESC";
                                } else if ($urutan == 'fish_name_asc') {
                                    $query = "SELECT * FROM fish ORDER BY fish_name ASC";
                                } else if ($urutan == 'fish_name_desc') {
                                    $query = "SELECT * FROM fish ORDER BY fish_name DESC";
                                } else if ($urutan == 'price_per_kg_asc') {
                                    $query = "SELECT * FROM fish ORDER BY price_per_kg ASC";
                                } else if ($urutan == 'price_per_kg_desc') {
                                    $query = "SELECT * FROM fish ORDER BY price_per_kg DESC";
                                } else if ($urutan == 'stock_kg_asc') {
                                    $query = "SELECT * FROM fish ORDER BY stock_kg ASC";
                                } else if ($urutan == 'stock_kg_desc') {
                                    $query = "SELECT * FROM fish ORDER BY stock_kg DESC";
                                } else if ($urutan == 'reset') {
                                    $query = "SELECT * FROM fish";
                                }
                            } else {
                                $query = "SELECT * FROM fish";
                            }
    
                            $result = mysqli_query($conn, $query);
                            
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                    <td>" . $row['fish_id'] . "</td>
                                    <td>" . $row['fish_name'] . "</td>
                                    <td>" . $row['price_per_kg'] . "</td>
                                    <td>" . $row['stock_kg'] . "</td>
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