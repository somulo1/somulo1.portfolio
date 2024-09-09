// setReferrerPolicy.js
function setReferrerPolicy() {
    const meta = document.createElement('meta');
    meta.name = 'referrer';
    meta.content = 'no-referrer';
    document.head.appendChild(meta);
}

// Set referrer policy
setReferrerPolicy();
