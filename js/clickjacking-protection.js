// js/clickjacking-protection.js

// Prevent the site from being embedded in an iframe
if (top !== self) {
    top.location.replace(self.location);
  }
  