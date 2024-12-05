document.querySelectorAll('.protein-filter').forEach(button => {
    button.addEventListener('click', function() {
        const protein = this.dataset.protein; // Get the selected protein
        fetch('filter.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `protein=${encodeURIComponent(protein)}` // Send the protein to the server
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById('recipes-container').innerHTML = data; // Update the recipes container
        })
        .catch(error => console.error('Error:', error));
    });
});