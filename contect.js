const express = require('express');
const bodyParser = require('body-parser');
const MongoClient = require('mongodb').MongoClient;
const app = express();

app.use(bodyParser.urlencoded({ extended: true }));

// MongoDB connection details
const url = 'mongodb://localhost:27017/?directConnection=true'; // Replace with actual connection string
const dbName = 'portfolio'; // Your MongoDB database name

MongoClient.connect(url, { useNewUrlParser: true, useUnifiedTopology: true }, (err, client) => {
    if (err) {
        console.error('Error connecting to the database', err);
        return;
    }
    
    console.log("Connected to MongoDB");

    const db = client.db(dbName);
    const collection = db.collection('customer');

    app.post('/submit', (req, res) => {
        const name = req.body.name;
        const mail = req.body.email;
        const mob = req.body.num;
        const subject = req.body.sub;
        const message = req.body.message;

        // Input validation
        if (!mail.includes("@")) {
            res.send("<script>alert('The E-Mail Is Invalid Or Empty.');</script>");
            return res.sendFile(__dirname + '/contect.html');
        } else if (mob.length != 10) {
            res.send("<script>alert('The Mobile Number Is Invalid Or Empty.');</script>");
            return res.sendFile(__dirname + '/contect.html');
        } else {
            // Insert data into MongoDB
            collection.insertOne({
                Name: name,
                Email: mail,
                Mobile: mob,
                Subject: subject,
                Message: message
            }, (err, result) => {
                if (err) {
                    res.send("<script>alert('Error sending message.');</script>");
                } else {
                    res.send("<script>alert('Message was sent successfully.');</script>");
                    res.sendFile(__dirname + '/upload.html');
                }
            });
        }
    });

    app.listen(3000, () => {
        console.log('Server is running on port 3000');
    });
});// MongoDB connection details
const uri = "mongodb://localhost:27017/?directConnection=true"; // Replace with your actual MongoDB connection string
exports.uri = uri;

