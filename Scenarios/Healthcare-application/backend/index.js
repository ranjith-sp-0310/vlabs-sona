const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');

const app = express();
const port = 3000;

app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());
app.set('view engine', 'ejs');

const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'healthcare'
  });
  
  db.connect(err => {
    if (err) throw err;
    console.log('Connected to the database');
  });

  const checkAccessControl = (req, res, next) => {
    // In a real scenario, you would check if the user has the necessary permissions.
    // For demonstration purposes, we're allowing access to everyone for now.
    next();
};

// Apply the middleware to the /patients endpoint
app.get('/patients', checkAccessControl, (req, res) => {
    const query = 'SELECT * FROM patients';
    db.query(query, (err, results) => {
        if (err) throw err;
        res.render('patient', { results: results });
    });
});


  app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
  });
  
  