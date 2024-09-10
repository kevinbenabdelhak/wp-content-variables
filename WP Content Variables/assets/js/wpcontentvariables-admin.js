document.addEventListener("DOMContentLoaded", function() {
    const shortcodeElements = document.querySelectorAll('.wpcontentvariables-shortcode');
    
    shortcodeElements.forEach(element => {
        element.style.cursor = 'pointer'; // Ajoute un curseur qui pointe
      
        element.addEventListener('click', function() {
            const shortcode = this.getAttribute('data-shortcode');
            navigator.clipboard.writeText(shortcode).then(() => {
                alert('Shortcode copié : ' + shortcode);
            });
        });
    });
});