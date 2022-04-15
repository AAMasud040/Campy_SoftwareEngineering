const studentController = require('../controller/studentController');
const express = require('express');
const router = express.Router();
// const appModel = require('../../models/appModel copy.js');
// const studentController = require("../../controller/Student_controller");

router.get('/' ,studentController.get_student);

module.exports = router;

