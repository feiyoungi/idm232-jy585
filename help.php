<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Page</title>
    <link href="style.css" rel="stylesheet" type="text/css"> 
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

    <div class="help-content">
        <h2>How to Use and Navigate Through This Website</h2>
        <h3>Home Page</h3>
            <ul>
                <li>"Pocket Recipes" Logo: Redirects users to the home page from whichever page they are currently on.</li>
                <li>Help Button: Redirects users to the help page, which is home to descriptions and explanations of the functionality of the website.</li>
                <li>Filter: The filter allows users to select the protein that they wish to view. This is in place to account for dietary restrictions and easy of navigation. At the moment, the filtering buttons are not functional. They only display a simple hover and mouse down state.</li>
                <li>Search Bar: The search bar allows users to narrow down the content that is shown to them by inserting key words. In this Alpha version, users can search up any gibberish, and an error message will pop up and wipe the content. However, if the user search for something that exists like "Ancho", the search will bring forth the item cards that match.</li>
            </ul>
        <h3>Recipes Page</h3>
            <ul>
                <li>This page shows the food and provides a description. It will also show and list the ingredients and give users a step by step manual.</li>
            </ul>
        <h3>Help Page</h3>
            <ul>
                <li>This is the current page. This page is made to help users successfully identify the tasks and components of the website that can and should be interacted with.</li>
            </ul>
    </div>

    <script src="scripts.js"></script>
</body>
</html>