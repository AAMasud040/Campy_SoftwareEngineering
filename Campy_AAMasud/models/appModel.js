const {query} = require("../helper/db");

let get_all_student_request = async(uniid)=> //authority, unapproved student display
{
    let sqlCommand = "SELECT * FROM student WHERE approval=1 AND Universityuniversity_id='"+uniid+"'";
    //after update "SELECT * FROM student where approval = 0"
    let result = await query(sqlCommand);
    return result;
}

let get_course_list = async(uniid)=>{
    let sqlCommand = "SELECT * FROM student WHERE approval=1 AND Universityuniversity_id='"+uniid+"'";
    let result = await query(sqlCommand);
    return result;
}
module.exports={
    get_all_student_request,
    get_course_list
}