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



  app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
  });
  
  