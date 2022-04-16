const appModel = require('../models/appModel');

let get_student = async (req, res) => {
    let r = await appModel.get_all_student_request(1);
    res.send(r);
}
let get_course_list = async (req,res) =>{
    let r = await appModel.getCourse_list(1);
    res.send(r)
}
module.exports ={
    get_student,
}