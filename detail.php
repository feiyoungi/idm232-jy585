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
    <link rel="stylesheet" href="css/detail.css">
    <title><?php echo $recipe['title']; ?> - Recipe Details</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
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

<div class="recipe-detail">
    <!-- Recipe Title -->
    <h1><?php echo $recipe['title']; ?></h1>
    <h2><?php echo $recipe['subtitle']; ?></h2>

    <!-- Recipe Image -->
    <img src="pics/pics/<?php echo $recipe['main_image']; ?>" alt="Recipe Image" class="recipe-image">

    <!-- Recipe Information -->
    <p><strong>Cooking Time:</strong> <?php echo $recipe['cook_time']; ?></p>
    <p><strong>Serving Size:</strong> <?php echo $recipe['serving_size']; ?></p>
    <p><strong>Protein:</strong> <?php echo $recipe['protein']; ?></p>
    <p><strong>Calories:</strong> <?php echo $recipe['calories']; ?></p>

    <!-- Recipe Description -->
    <p><strong>Description:</strong> <?php echo $recipe['description']; ?></p>

    <!-- Ingredients List -->
    <img src="pics/pics/<?php echo $recipe['ingredients_image']; ?>" alt="Ingredient image" class="ingredient-image">
    <h2>Ingredients</h2>
    <ul>
        <?php
        $ingredients = explode('*', $recipe['ingredients']);
        foreach ($ingredients as $ingredient) {
            echo '<li>' . $ingredient . '</li>';
        }
        ?>
    </ul>

    <!-- Steps List -->
    <h2>Steps</h2>
    <div class="steps-container">
        <?php
        $steps = explode('*', $recipe['steps']);
        $images = explode('*', $recipe['steps_image']);

        foreach ($steps as $index => $step) {
            $stepParts = explode('^^', $step);

            if (count($stepParts) == 2) {
                echo '<div class="step">';
                // Display step number next to the title
                echo '<strong>' . trim($stepParts[0]) . ' (' . ($index + 1) . '):</strong> ';
                echo '<p>' . trim($stepParts[1]) . '</p>';

                // Display the step image if available
                if (isset($images[$index])) {
                    // Ensure that the image URL is valid
                    echo '<img src="pics/pics/' . $images[$index] . '" alt="Step ' . ($index + 1) . ' Image" class="step-image">';
                }

                echo '</div>';
            }
        }
        ?>
    </div>
</div>
</body>
</html>
