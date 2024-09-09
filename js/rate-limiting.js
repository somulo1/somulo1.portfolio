// // js/rate-limiting.js

// // Example of simple rate limiting (for demonstration only; server-side implementation is recommended)
// let lastRequestTime = 0;
// const requestInterval = 1000; // 1 second

// document.addEventListener('click', () => {
//   const now = Date.now();
//   if (now - lastRequestTime < requestInterval) {
//     alert('Please wait before making another request.');
//   } else {
//     lastRequestTime = now;
//     // Handle request here
//   }
// });
