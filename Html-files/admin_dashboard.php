<?php
include 'db.php'; // Include your DB connection

// Fetch categories for the category dropdown
$categoryQuery = "SELECT * FROM categories";
$categoryResult = $conn->query($categoryQuery);
$categories = [];
if ($categoryResult->num_rows > 0) {
    while ($row = $categoryResult->fetch_assoc()) {
        $categories[] = $row;
    }
}

// Image Upload Path
$upload_dir = 'uploads/';

// Insert Menu Item
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_menu_item'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];

    // Handle image upload
    $image_url = '';
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == 0) {
        $image_tmp_name = $_FILES['image_url']['tmp_name'];
        $image_name = basename($_FILES['image_url']['name']);
        $image_url = $upload_dir . $image_name;

        // Move the uploaded file to the server
        if (move_uploaded_file($image_tmp_name, $image_url)) {
            echo "Image uploaded successfully!";
        } else {
            echo "Failed to upload image.";
        }
    }

    // Insert the menu item into the database
    $insertQuery = "INSERT INTO menu_items (category_id, name, price, image_url, description, created_at, updated_at) 
                    VALUES ('$category_id', '$name', '$price', '$image_url', '$description', NOW(), NOW())";

    if ($conn->query($insertQuery)) {
        echo "Menu Item Added Successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Update Menu Item
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_menu_item'])) {
    $item_id = $_POST['item_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];

    // Handle image upload for update
    $image_url = $_POST['existing_image_url']; // Preserve existing image if not uploading new one
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == 0) {
        $image_tmp_name = $_FILES['image_url']['tmp_name'];
        $image_name = basename($_FILES['image_url']['name']);
        $image_url = $upload_dir . $image_name;

        // Move the uploaded file to the server
        if (move_uploaded_file($image_tmp_name, $image_url)) {
            echo "Image uploaded successfully!";
        } else {
            echo "Failed to upload image.";
        }
    }

    // Update the menu item in the database
    $updateQuery = "UPDATE menu_items SET 
                    category_id = '$category_id', name = '$name', price = '$price', 
                    image_url = '$image_url', description = '$description', updated_at = NOW() 
                    WHERE id = '$item_id'";

    if ($conn->query($updateQuery)) {
        echo "Menu Item Updated Successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Delete Menu Item
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM menu_items WHERE id = '$delete_id'";

    if ($conn->query($deleteQuery)) {
        echo "Menu Item Deleted Successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Search Menu Items
$searchQuery = "";
if (isset($_POST['search'])) {
    $searchQuery = $_POST['search_query'];
    $searchQuery = "WHERE name LIKE '%$searchQuery%'";
}

// Fetch Menu Items
$menuQuery = "SELECT * FROM menu_items $searchQuery";
$menuResult = $conn->query($menuQuery);
$menuItems = [];
if ($menuResult->num_rows > 0) {
    while ($row = $menuResult->fetch_assoc()) {
        $menuItems[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <!-- Add Menu Item -->
    <h3>Add Menu Item</h3>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Item Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <?php foreach ($categories as $category) { ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label">Image</label>
            <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <button type="submit" name="add_menu_item" class="btn btn-primary">Add Item</button>
    </form>

    <!-- Update Menu Item -->
    <h3>Update Menu Item</h3>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="item_id" class="form-label">Item ID</label>
            <input type="number" class="form-control" id="item_id" name="item_id" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Item Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label">Image (Leave blank to keep existing image)</label>
            <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*">
        </div>
        <input type="hidden" name="existing_image_url" value="<?= $item['image_url'] ?>" />
        <button type="submit" name="update_menu_item" class="btn btn-warning">Update Item</button>
    </form>

    <!-- Search Menu Item -->
    <h3>Search Menu Items</h3>
    <form method="POST" action="">
        <input type="text" name="search_query" class="form-control" placeholder="Search by name" value="<?= $searchQuery ?>">
        <button type="submit" name="search" class="btn btn-secondary mt-2">Search</button>
    </form>

    <h3>Menu Items</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Item ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($menuItems as $item) { ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['price'] ?></td>
                    <td><?= $item['category_id'] ?></td>
                    <td><?= $item['description'] ?></td>
                    <td>
                        <a href="admin_dashboard.php?delete_id=<?= $item['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
