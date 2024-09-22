const express = require('express');
const { MongoClient } = require('mongodb');
const bodyParser = require('body-parser');
const { uri } = require('./contect');

const app = express();
const port = 3000;

const client = new MongoClient(uri, { useNewUrlParser: true, useUnifiedTopology: true });

// Middleware to parse form data
app.use(bodyParser.urlencoded({ extended: true }));

app.post('/register', async (req, res) => {
    const name = req.body.name;
    const mail = req.body.email;
    const mob = req.body.num;
    const pass = req.body.pass;
    const cpass = req.body.cpass;

    // Direct conversion of PHP to Node.js logic
    if (pass !== cpass) {
        res.send("Password mismatch");
        return;
    }

    try {
        // Connect to MongoDB
        await client.connect();
        const db = client.db("examination"); // Replace with your actual DB name
        const collection = db.collection("User_register"); // Replace with your actual collection name

        // Insert user data into MongoDB
        const query1 = {
            User_name: name,
            pass: pass,
            mobile: mob,
            email: mail
        };

        await collection.insertOne(query1);
        res.send("Registration successfully");
    } catch (error) {
        console.log("Error connecting to MongoDB:", error);
        res.send("Error during registration");
    } finally {
        await client.close(); // Close connection after the operation
    }
});

// Start the server
app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});
