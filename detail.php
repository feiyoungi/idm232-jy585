<?php
error_reporting(E_ALL);
ini_set('display_error', 1);
ini_set('display_startup_errors', 1);

require_once 'includes/database.php';

// Check if an ID is provided in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "No recipe ID provided.";
    exit;
}

$recipe_id = intval($_GET['id']); // Ensure the ID is an integer

// Prepare and execute a SQL query to fetch recipe details
$statement = $connection->prepare('SELECT * FROM recipes_test_run WHERE id = ?');
$statement->bind_param('i', $recipe_id);
$statement->execute();

$recipe = $statement->get_result()->fetch_assoc();

// Check if the recipe exists
if (!$recipe) {
    echo "Recipe not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="detail.css">
    <title><?php echo $recipe['title']; ?> - Recipe Details</title>
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
            <button onclick="window.location.href='help.html';">Help</button>    
        </div>
    </div>

<div class="recipe-detail">
    <div class="detail1">
        <!-- Recipe Title -->
        <h1><?php echo $recipe['title']; ?></h1>
        <h2><?php echo $recipe['subtitle']; ?></h2><br>

        <!-- Recipe Information -->
        <p><strong>Cooking Time:</strong> <?php echo $recipe['cook_time']; ?></p><br>
        <p><strong>Serving Size:</strong> <?php echo $recipe['serving_size']; ?></p><br>
        <p><strong>Protein:</strong> <?php echo $recipe['protein']; ?></p><br>
        <p><strong>Calories:</strong> <?php echo $recipe['calories']; ?></p><br>

        <!-- Recipe Description -->
        <p><?php echo $recipe['description']; ?></p>
    </div>

    <div class="detail2">
        <!-- Recipe Image -->
        <img src="pics/pics/<?php echo $recipe['main_image']; ?>" alt="Recipe Image" class="recipe-image">
    </div>
</div>

<div class="ingredients">
    <hr>
    <h2>Ingredients</h2>
</div>

<div class="recipe-detail">  
    <div class="detail1">
        <!-- Ingredients List -->
        <img src="pics/pics/<?php echo $recipe['ingredients_image']; ?>" alt="Ingredient image" class="ingredient-image">
    </div>

    <!-- <div class="detail2">
        <div class="ingredients">
            <h2>Ingredients</h2>
            <div class="ingredients-container">
            <ul>
                <?php
                    $ingredients = explode('*', $recipe['ingredients']);
                    foreach ($ingredients as $ingredient) {
                        echo '<li>' . $ingredient . '</li>';
                    }
                ?>
            </ul>
            </div>
        </div>
    </div> -->

    <div class="detail2">
        <!-- <div class="ingredients"> -->
            <!-- <h2>Ingredients</h2> -->
            <div class="ingredients-container">
            <ul>
                <?php
                    $ingredients = explode('*', $recipe['ingredients']);
                    foreach ($ingredients as $ingredient) {
                        echo '<li>' . $ingredient . '</li>';
                    }
                ?>
            </ul>
            </div>
        <!-- </div> -->
    </div>

</div>

<div class="steps">
    <hr>
    <h2>Steps</h2>
    <div class="steps-container">
        <?php
        $steps = explode('*', $recipe['steps']);
        $images = explode('*', $recipe['steps_image']);

        foreach ($steps as $index => $step) {
            $stepParts = explode('^^', $step);

            if (count($stepParts) == 2) {
                echo '<div class="step-card">';
                // Display the step image at the top
                if (isset($images[$index])) {
                    echo '<img src="pics/pics/' . $images[$index] . '" alt="Step ' . ($index + 1) . ' Image" class="step-card-image">';
                }
                // Display step number and description
                echo '<div class="step-card-content">';
                echo '<strong>Step ' . ($index + 1) . ': ' . trim($stepParts[0]) . '</strong>';
                echo '<p>' . trim($stepParts[1]) . '</p>';
                echo '</div>';
                echo '</div>';
            }
        }
        ?>
    </div>
</div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Pocket Recipes. All Rights Reserved.</p>
    </footer>
</body>
</html>
