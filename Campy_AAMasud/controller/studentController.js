const appModel = require('../models/appModel');
const id = '011183040';
let get_student = async (req, res) => {
    if(id)
    {
        let r = await appModel.get_all_student_request(1);
        res.send(r);
    }
    else
    {
        res.send(404);
    }
}
let get_course_list = async (req,res) =>{
    if(id)
    {
        let r1 = await appModel.get_course_list(1);
        let r2 = await appModel.getEnrolledcourseList(id);
        /*console.log(r1[0].course_id);
        console.log(r1[1].course_id);
        console.log(r2[0].courses_classroomcoursescourse_id);*/
        let array1 = r1.map(x=>{
            return x.course_id;
        });
        let array2 = r2.map(x=>{
            return x.courses_classroomcoursescourse_id;
        });
        
        let array3 = array1.filter(function(val) {
            return array2.indexOf(val) == -1;
        });

        // console.log(array3);
        let array4 = r1.filter(function(n) {
            if(array3.indexOf(n.course_id) !== -1)
                  return n;
        });
        // console.log(array4);
        data =  {array4};
        res.render("addCourse.ejs",data);
    }
    else
    {
        res.send(404);
    }
}

let Enrollinto_course = async(req,res) =>{
    let val = req.query.cid;
    let r = await appModel.enrollIntoCourseClassroom(val,id); 
    res.redirect('/course')
}
module.exports ={
    get_student,
    get_course_list,
    Enrollinto_course
}