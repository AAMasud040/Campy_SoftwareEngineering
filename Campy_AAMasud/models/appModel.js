const {query} = require("../helper/db");

let get_all_student_request = async(uniid)=> //authority, unapproved student display
{
    let sqlCommand = "SELECT * FROM student WHERE approval=1 AND Universityuniversity_id='"+uniid+"'";
    //after update "SELECT * FROM student where approval = 0"
    let result = await query(sqlCommand);
    return result;
}

let get_course_list = async(uniid)=>{
    let sqlCommand = "SELECT * FROM courses WHERE Universityuniversity_id='"+uniid+"'";
    let result = await query(sqlCommand);
    return result;
}
let getEnrolledcourseList = async(id)=>{
    let sqlCommand = "SELECT * FROM student_course_classroom WHERE Studentuser_id='"+id+"'";
    let result = await query(sqlCommand);
    return result;
}
let enrollIntoCourseClassroom = async(cid,uid)=>{
    let sqlCommand = "INSERT INTO `student_course_classroom`(`Studentuser_id`, `courses_classroomcoursescourse_id`) VALUES('"+uid+"','"+cid+"') ";
    let result = await query(sqlCommand);
    return result;
}
module.exports={
    get_all_student_request,
    get_course_list,
    getEnrolledcourseList,
    enrollIntoCourseClassroom
}