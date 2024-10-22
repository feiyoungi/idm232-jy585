// keydown enter
document.getElementById("searchInput").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // Check if the 'Enter' key was pressed
        performSearch(); // Call the search function
    }
});

function performSearch() {
    const searchInput = document.getElementById("searchInput").value.toLowerCase();
    const itemCards = document.querySelectorAll(".item-card");
    let found = false;
    
    itemCards.forEach(card => {
        const itemTitle = card.querySelector("h3").textContent.toLowerCase();
        
        if (itemTitle.includes(searchInput)) {
            card.style.display = "block"; // Show the card if it matches the search
            found = true; // Mark that we found at least one match
        } else {
            card.style.display = "none"; // Hide the card if it doesn't match
        }
    });

    // Show or hide error message based on whether a match was found
    const errorMessage = document.getElementById("error-message");
    if (!found) {
        errorMessage.style.display = "block";
        errorMessage.textContent = `No results found for "${searchInput}". Please try again.`;
    } else {
        errorMessage.style.display = "none"; // Hide error message if there was a match
    }
}

/* Filter Buttons */

const filterButtons = document.querySelectorAll(".filter-buttons button");

filterButtons.forEach(button => {
    button.addEventListener("click", function() {
        // Remove 'active' class from all buttons
        filterButtons.forEach(btn => btn.classList.remove("active"));
        
        // Add 'active' class to the clicked button
        this.classList.add("active");
    });
});