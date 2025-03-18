<?php
include 'db.php'; // Include your DB connection

// Fetch all categories from the database
$query = "SELECT * FROM categories";
$categoriesResult = $conn->query($query);
$categories = [];

if ($categoriesResult->num_rows > 0) {
    while ($row = $categoriesResult->fetch_assoc()) {
        $categories[] = $row;
    }
}

// Fetch menu items for each category
$menuItems = [];
foreach ($categories as $category) {
    $itemQuery = "SELECT * FROM menu_items WHERE category_id = " . $category['id'];
    $itemResult = $conn->query($itemQuery);
    $items = [];

    if ($itemResult->num_rows > 0) {
        while ($row = $itemResult->fetch_assoc()) {
            $items[] = $row;
        }
    }
    $menuItems[$category['name']] = $items;
}

// Output the categories and menu items as JSON
header('Content-Type: application/json');
echo json_encode(['categories' => $categories, 'menuItems' => $menuItems]);
?>
