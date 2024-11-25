<?php
// Database connection using environment variables (use a config file or set these variables securely)
$conn = new mysqli('localhost', 'root', '', 'login_register');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Constants
$allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
$uploadDir = 'uploads/';

// Pagination settings
$limit = 10;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Fetch products with pagination
$sql = "SELECT * FROM products LIMIT ?, ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $start, $limit);
$stmt->execute();
$result = $stmt->get_result();

// Handle form submission for adding a product
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['product_image'])) {
    $productName = htmlspecialchars($_POST['product_name']);
    $productPrice = htmlspecialchars($_POST['product_price']);
    $productImage = $_FILES['product_image'];

    // Validate and handle image upload
    if (in_array($productImage['type'], $allowedTypes) && $productImage['size'] <= 2 * 1024 * 1024) {
        $imageName = time() . '_' . basename($productImage['name']);
        $targetFile = $uploadDir . $imageName;

        if (move_uploaded_file($productImage['tmp_name'], $targetFile)) {
            // Insert product into the database
            $stmt = $conn->prepare("INSERT INTO products (name, price, image) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $productName, $productPrice, $imageName);
            if ($stmt->execute()) {
                $successMessage = "Product added successfully!";
            } else {
                $errorMessage = "Error adding product: " . $conn->error;
            }
        } else {
            $errorMessage = "Failed to upload image.";
        }
    } else {
        $errorMessage = "Invalid file type or size exceeds 2MB.";
    }
}

// Handle form submission for deleting a product
if (isset($_POST['delete_product'])) {
    $productId = (int)$_POST['product_id'];
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $productId);

    if ($stmt->execute()) {
        $successMessage = "Product deleted successfully!";
    } else {
        $errorMessage = "Error deleting product: " . $conn->error;
    }
}

// Get total products for pagination
$totalResult = $conn->query("SELECT COUNT(*) AS total FROM products");
$totalProducts = $totalResult->fetch_assoc()['total'];
$totalPages = ceil($totalProducts / $limit);

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Add the same CSS from your original code */
        /* Sidebar and topbar styles */
        /* Product grid and form styles */
        /* Pagination styles */
        /* Add responsive styles */
    </style>
</head>
<body>
    <!-- Topbar -->
    <div class="topbar">
        <button class="toggle-btn" onclick="toggleSidebar()">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
        <h1>Admin Dashboard</h1>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <a href="#">Dashboard</a>
        <a href="#">Manage Products</a>
        <a href="#">Orders</a>
        <a href="#">Settings</a>
        <a href="index.php">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main">
        <?php if (isset($successMessage)) echo "<p style='color: green;'>$successMessage</p>"; ?>
        <?php if (isset($errorMessage)) echo "<p style='color: red;'>$errorMessage</p>"; ?>

        <h2>Add New Product</h2>
        <form action="admin_dashboard.php" method="post" enctype="multipart/form-data">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" id="product_name" required>

            <label for="product_price">Product Price:</label>
            <input type="number" step="0.01" name="product_price" id="product_price" required>

            <label for="product_image">Product Image:</label>
            <input type="file" name="product_image" id="product_image" required>

            <button type="submit">Add Product</button>
        </form>

        <h2>Product List</h2>
        <div class="product-grid">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="product-item">
                    <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
                    <h6><?php echo htmlspecialchars($row['name']); ?></h6>
                    <p>$<?php echo htmlspecialchars($row['price']); ?></p>
                    <form action="admin_dashboard.php" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_product">Delete</button>
                    </form>
                </div>
            <?php } ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                <a href="admin_dashboard.php?page=<?php echo $i; ?>" <?php if ($i == $page) echo 'style="font-weight: bold;"'; ?>><?php echo $i; ?></a>
            <?php } ?>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("open");

            var main = document.querySelector(".main");
            if (sidebar.classList.contains("open")) {
                main.style.marginLeft = "200px";
            } else {
                main.style.marginLeft = "0";
            }
        }
    </script>
</body>
</html>


<?php $conn->close(); ?>
