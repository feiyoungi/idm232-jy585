<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case-Study Page</title>
    <link href="style.css" rel="stylesheet" type="text/css"> 
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

    <div class="container">
        <section class="overview">
            <h1>The Overview</h1>
            <p><strong>Pocket Recipes</strong> was a project created for my <strong>Scripting for Interactive Digital Media</strong> course. The primary objective of this project was to design and develop a cooking recipe website using <strong>HTML, CSS, JavaScript, and PHP</strong>. This project helped me understand how PHP can be used to streamline web development by minimizing the number of HTML pages that I needed to create. With PHP, I could dynamically pull information from a MySQL database and display it on the site, making the website more efficient and scalable.</p>
            <p><strong>Key features of my website included:</strong></p>
            <ul>
                <li>Responsive design for small, medium, and larger screens</li>
                <li>Interactive user interface with dynamic content</li>
                <li>Search bar functionality for easy recipe lookup</li>
                <li>Filtering options for different cuisine types</li>
                <li>Integration with a MySQL database for data storage</li>
            </ul>
            <p><strong>The project involved:</strong></p>
            <ul>
                <li>Designing the layout of the website to ensure it was user-friendly and visually appealing.</li>
                <li>Organizing recipe data in phpMyAdmin, a MySQL database management tool.</li>
                <li>Coding the entire project in VSCode, integrating front-end and back-end components seamlessly.</li>
            </ul>
        </section>

        <section class="context-challenge">
            <h1>Context and Challenge</h1>
            <h2>Background</h2>
            <p>This was an independent project assigned as a practical exercise to deepen our understanding of how server-side scripting (PHP) works in tandem with client-side technologies. It also introduced us to database management concepts through phpMyAdmin.</p>
            <h2>Timeline</h2>
            <img src="pics/timeline-min.jpg" alt="Timeline">
            <p>Over the course of 10 weeks, the project was divided in four stages:<p>
            <ul>
                <li><strong>Alpha:</strong> Incorporation of HTML, CSS, and JavaScript </li>
                <li><strong>Beta:</strong> Incorporation of PHP with MySQL and phpMyAdmin</li>
                <li><strong>Case-Study:</strong> Storytelling and Presentation</li>
                <li><strong>Final:</strong> Polished Website</li>
            </ul>
            <h2>Challenge</h2>
            <p>The challenge was to find a way to dynamically generate pages and manage recipe data without manual duplication as well as to provide a user interface for browsing, searching, and filtering recipes. All pages must be responsive.</p>
            <h2>Goals and Objectives</h2>
            <ul>
                <li>Implement a dynamic content system using PHP and MySQL</li>
                <li>Create an intuitive user interface that enhances the user experience</li>            
                <li>Develop functional features like search and filtering to cater to diverse user needs</li>
            </ul>
        </section>

        <section class="process-insight">
            <h1>Process and Insight</h1>
            <h2>Alpha</h2>
            <img src="pics/alpha-home-min.jpg" alt="Alpha">
            <h2>Beta</h2>
            <h2>Case-Study</h2>
            <h2>Final</h2>
        </section>

        <section class="solution">
            <h1>The Solution</h1>
            <p>Showcase the final design with detailed images, videos, and a link to the live project if available. Describe the defining features like UX, navigation structure, content strategy, or unique mobile attributes. Thoughtful descriptions complement your visuals and strengthen your case as a designer/developer.</p>
        </section>

        <section class="results">
            <h1>The Results</h1>
            <p>Summarize the success of the project with qualitative and quantitative metrics. Address the objectives from "The Context and Challenge" section. If this was client work, include a client testimonial. Wrap up by discussing lessons learned and changes you’d make to your approach in the future.</p>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Pocket Recipes. All Rights Reserved.</p>
    </footer>

    <script src="scripts.js"></script>
</body>
</html>