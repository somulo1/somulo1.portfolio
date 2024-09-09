// blockTrackers.js
function blockTrackers() {
    // List of known tracker script URLs
    const trackers = [
        'google-analytics.com',
        'facebook.com/tr',
        'twitter.com',
        // Add more known trackers here
    ];

    // Check and block known trackers
    trackers.forEach(tracker => {
        const scripts = document.querySelectorAll(`script[src*="${tracker}"]`);
        scripts.forEach(script => {
            script.parentNode.removeChild(script); // Remove the script element
        });
    });
}

// Run the function to block known trackers
blockTrackers();
