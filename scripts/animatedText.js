// animatedText.js
document.addEventListener('DOMContentLoaded', () => {
    const textElement = document.getElementById('animated-text');
    const text = textElement.innerHTML; // Get the original HTML content
    const typingSpeed = 60; // Speed in milliseconds
    let index = 0;
    
    // Function to type text character by character
    function typeText() {
        if (index < text.length) {
            textElement.innerHTML = text.substring(0, index + 1);
            index++;
            if (text[index - 1] === '<' && text.substring(index - 1, index + 4) === '<br>') {
                // If a <br> tag is detected, pause for a moment
                setTimeout(typeText, 500); // Adjust pause time as needed
                index += 4; // Skip the <br> tag
            } else {
                setTimeout(typeText, typingSpeed);
            }
        } else {
            // Remove the hidden class once typing is complete
            textElement.classList.remove('hidden');
        }
    }
    
    typeText(); // Start typing
});
