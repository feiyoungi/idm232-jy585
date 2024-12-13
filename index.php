<?php
    error_reporting(E_ALL);
    ini_set('display_error', 1);
    ini_set('display_startup_errors', 1);

    require_once 'includes/database.php';

    $statement = $connection->prepare('SELECT * FROM recipes_test_run');
    $statement->execute();
    $recipes = $statement->get_result()->fetch_all(MYSQLI_ASSOC);

    // Get the search input (if any)
    $search = $_GET['search'] ?? ''; // Default to empty string if not set
    $filter = $_GET['filter'] ?? ''; // Default to empty string if not set

    // Prepare a SQL query with a WHERE clause for filtering
    if (!empty($search) && !empty($filter)) {
        // Filter by both search term and category
        $statement = $connection->prepare('SELECT * FROM recipes_test_run WHERE (title LIKE ? OR ingredients LIKE ? OR protein LIKE ?) AND protein = ?');
        $searchParam = '%' . $search . '%'; // Add wildcards for partial matching
        $statement->bind_param('ssss', $searchParam, $searchParam, $searchParam, $filter);
    } elseif (!empty($search)) {
        // Filter by search term only
        $statement = $connection->prepare('SELECT * FROM recipes_test_run WHERE title LIKE ? OR ingredients LIKE ? OR protein LIKE ?');
        $searchParam = '%' . $search . '%';
        $statement->bind_param('sss', $searchParam, $searchParam, $searchParam);
    } elseif (!empty($filter)) {
        // Filter by protein category only
        $statement = $connection->prepare('SELECT * FROM recipes_test_run WHERE protein = ?');
        $statement->bind_param('s', $filter);
    } else {
        // If no search term or filter, fetch all recipes
        $statement = $connection->prepare('SELECT * FROM recipes_test_run');
    }

    // Execute the statement
    $statement->execute();

    // Fetch the result
    $recipes = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pocket Recipes</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-text">
            <a href="index.php">
                <h1>Pocket Recipes</h1>
            </a>
        </div>
        <div class="help">
            <button onclick="window.location.href='help.php';">Help</button>    
        </div>
    </div>

    <!-- Search Bar -->
    <div class="search">
        <div class="search-bar">
            <form action="index.php" method="get" class="search-form">
                <input type="text" name="search" placeholder="Search for recipes..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit">Search</button>
            </form>
        </div>
    </div>

    <!-- Filter Buttons -->
    <div class="filter-button">
        <form action="index.php" method="get">
            <input type="hidden" name="filter" value="Fish">
            <button type="submit">Fish</button>
        </form>
        <form action="index.php" method="get">
            <input type="hidden" name="filter" value="Beef">
            <button type="submit">Beef</button>
        </form>
        <form action="index.php" method="get">
            <input type="hidden" name="filter" value="Chicken">
            <button type="submit">Chicken</button>
        </form>
        <form action="index.php" method="get">
            <input type="hidden" name="filter" value="Turkey">
            <button type="submit">Turkey</button>
        </form>
        <form action="index.php" method="get">
            <input type="hidden" name="filter" value="Pork">
            <button type="submit">Pork</button>
        </form>
        <form action="index.php" method="get">
            <input type="hidden" name="filter" value="Vegetarian">
            <button type="submit">Vegetarian</button>
        </form>

        <!-- Reset Button -->
        <form action="index.php" method="get">
            <button type="submit" class="reset-button">Reset Filters</button>
        </form>
    </div>

    <!-- Recipe Cards Display -->
    <div class="recipe-cards">
        <?php foreach ($recipes as $recipe): ?>
            <div class="recipe-card">
                <!-- Recipe Image -->
                <a href="detail.php?id=<?php echo $recipe['id']; ?>" class="recipe-link">
                    <img src="pics/pics/<?php echo ($recipe['main_image']); ?>" alt="Recipe Image" class="recipe-image">
                    <h2 class="recipe-title"><?php echo ($recipe['title']); ?></h2>
                    <h3 class="recipe-subtitle"><?php echo ($recipe['subtitle']); ?></h3>
                </a>

                <!-- Recipe Information -->
                <p><?php echo ($recipe['cook_time']); ?> | <?php echo ($recipe['protein']); ?></p>
            </div>
        <?php endforeach; ?>
        <?php if (count($recipes) > 0): ?>
            <!-- Display recipes as before -->
        <?php else: ?>
            <div class="no-results-container">
            <p>No Results Found. Please Try Again.</p>
            <img src="pics/sad-carrot.jpg" alt="Sad Carrot" class="sad-carrot"></img>
            </div>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Pocket Recipes. All Rights Reserved.</p>
    </footer>
</body>
</html>
