const express = require('express');
const fs = require('fs');
const path = require('path');

const app = express();
const PORT = 3000;

// Serve static files like HTML/CSS/JS/images from the public folder
app.use(express.static(path.join(__dirname, '../frontend')));


// API endpoint to get registration data
app.get('/api/registrations', (req, res) => {
  fs.readFile('registrations.json', (err, data) => {
    if (err) {
      return res.status(500).json({ error: 'Unable to read registration data.' });
    }
    const registrations = JSON.parse(data);
    res.json(registrations);
  });
});

// Start the server
app.listen(PORT, () => {
  console.log(`✅ Server is running at http://localhost:${PORT}`);
});
