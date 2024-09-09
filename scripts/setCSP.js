// setCSP.js
function setCSP() {
    const meta = document.createElement('meta');
    meta.httpEquiv = 'Content-Security-Policy';
    meta.content = "default-src 'self'; script-src 'self'; style-src 'self'; img-src 'self'; connect-src 'self';";
    document.head.appendChild(meta);
}

// Set CSP rules
setCSP();
