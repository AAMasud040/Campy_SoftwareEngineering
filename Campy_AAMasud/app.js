const express = require('express');
const appModel = require("./models/appModel");

const app = express();
const cors = require('cors');

app.use(cors('*'));
app.set('view engine','ejs');
app.use(express.static('public'));


app.listen(3000);

const studentRouter = require('./routes/student');
app.use(studentRouter);

app.use((req, res) => {
    res.send("404");
})
