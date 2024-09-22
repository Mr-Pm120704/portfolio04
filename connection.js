

const express = require('express');
const { MongoClient } = require('mongodb');

const app = express();
const port = 3000;

// MongoDB connection details
const uri = "mongodb://localhost:27017/?directConnection=true"; // Replace with your actual MongoDB connection string
const client = new MongoClient(uri, { useNewUrlParser: true, useUnifiedTopology: true });

client.connect(err => {
    if (err) {
        console.log("Failed to connect to the database: " + err);
    } else {
        console.log("Connected to the MongoDB database");

        app.get('/', (req, res) => {
            res.send(`
                <form action='/submit' method='POST'>
                    <!-- Your form fields go here -->
                </form>
            `);
        });
    }
});

// Start the server
app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});

