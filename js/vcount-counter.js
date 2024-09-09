const cookieName = 'visitor_id';
const cookieExpireDays = 1; // Cookie expiration in days for session-based counting
const storageKey = 'visitorCount';

// Function to set a cookie
function setCookie(name, value, days) {
    const expires = new Date(Date.now() + days * 864e5).toUTCString();
    document.cookie = `${name}=${encodeURIComponent(value)}; expires=${expires}; path=/`;
}

// Function to get a cookie value
function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return decodeURIComponent(parts.pop().split(';').shift());
}

// Function to update the visitor count
function updateVisitorCount() {
    let count = parseInt(localStorage.getItem(storageKey) || '0', 10);
    count += 1;
    localStorage.setItem(storageKey, count);
    document.getElementById('visitor-count').textContent = `... ${count}`;
}

// Check if the visitor has a unique identifier cookie
const visitorId = getCookie(cookieName);

if (!visitorId) {
    // If no cookie, set a new cookie with a unique ID
    setCookie(cookieName, 'unique-id-' + Date.now(), cookieExpireDays);
    updateVisitorCount(); // Update visitor count
} else {
    // If cookie exists, do not increment the count
    const count = parseInt(localStorage.getItem(storageKey) || '0', 10);
    document.getElementById('visitor-count').textContent = `... ${count}`;
}