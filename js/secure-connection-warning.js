// js/secure-connection-warning.js

// Alert if the site is not served over HTTPS
document.addEventListener('DOMContentLoaded', () => {
    if (location.protocol !== 'https:') {
      alert('You are accessing this site over an insecure connection. For your safety, please use HTTPS.');
    }
  });
  