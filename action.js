

const express = require('express');
const { MongoClient } = require('mongodb');
const bodyParser = require('body-parser');
const path = require('path');

const app = express();
const port = 3000;

// MongoDB connection details
const uri = "mongodb://localhost:27017/?directConnection=true"; // Replace with your MongoDB connection string
const client = new MongoClient(uri, { useNewUrlParser: true, useUnifiedTopology: true });

app.use(bodyParser.urlencoded({ extended: true }));

// Serve static files like CSS, images, etc.
app.use(express.static(path.join(__dirname, 'public')));

// HTML page with the form to login
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'index.html')); // Replace with the path to your form (index.html)
});

// Handle form submission
app.post('/admin', async (req, res) => {
    const { name, pass } = req.body;

    if (name === "Admin" && pass === "entered") {
        try {
            // Connect to MongoDB
            await client.connect();
            const db = client.db("your_db_name"); // Replace with your DB name
            const collection = db.collection("customer"); // Replace with your collection name

            // Fetch all data from the `customer` collection
            const customers = await collection.find({}).toArray();

            // HTML page rendering
            let tableHTML = `
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <style>
                        table {
                            border-collapse: collapse;
                            width: 100%;
                        }
                        th, td {
                            border: 1px solid black;
                            padding: 8px;
                            text-align: left;
                        }
                        th {
                            background-color: #f2f2f2;
                        }
                    </style>
                    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
                </head>
                <body style="background-image: url('images/bg_1.jpg')">
                <a class="navbar-brand" href="/"><span>Go Back</span></a>
                <table>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                    </tr>
            `;

            // Loop through customers and generate table rows
            customers.forEach((row, index) => {
                tableHTML += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${row.Name}</td>
                        <td>${row.Mobile}</td>
                        <td>${row.Email}</td>
                        <td>${row.Subject}</td>
                        <td>${row.Message}</td>
                    </tr>
                `;
            });

            // Close table and HTML tags
            tableHTML += `
                    </table>
                    </body>
                    </html>
            `;

            res.send(tableHTML); // Send the table to the browser
        } catch (error) {
            console.log("Error connecting to MongoDB:", error);
            res.send("<script>alert('Database connection error'); window.location.href = '/';</script>");
        } finally {
            await client.close();
        }
    } else {
        res.send("<script>alert('The Password or Username is Incorrect. Admins can only login.'); window.location.href = '/';</script>");
    }
});

// Start the server
app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});

