// js/disable-text-selection.js

// Prevent text selection on the entire page
document.addEventListener('selectstart', function (e) {
    e.preventDefault();
  });
  