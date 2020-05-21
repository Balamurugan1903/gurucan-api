const axios = require('axios');

const api_url = 'https://{YOURDOMAIN}.gurucan.com/api/';
const api_key = 'API_KEY';


const user_id = 'USER_ID';
const course_id = 'COURSE_ID';
const tag_id = "TAG_ID";

const instance = axios.create({
    baseURL: api_url,
    headers: {'gc-api-key': api_key}
});



//Get users
instance({
    url:`/admin/users`,
    method:"GET"
})
.then(function (response) {
    console.log("users ",response.data);
})

//Get courses
instance({
    url:`/admin/courses`,
    method:"GET"
})
.then(function (response) {
    console.log("courses ",response.data);
})

/*
//Granting access to a course
instance({
    url:`/admin/users/grant-access`,
    method:"POST",
    data:{
        item:{
            refPath:"Course",
            module:"course",
            _id: course_id
        },
        sendPaymentEmail:true,
        //email: user_email,
        //_id : user_id
    }
})
.then(function (response) {
    console.log("access grant result ",response.data);
})
*/

//Create a new tag
/*
instance({
    url:`/admin/tags`,
    method:"POST",
    data:{
        name:"My tag",
        for:"user"
    }
})
.then(function (response) {
    console.log("tag create result ",response.data);
})
*/

//Add tag to a user
//Please note: tags are OVERWRITTEN, not appended
/*
instance({
    url:`/admin/users/${user_id}`,
    method:"POST",
    data:{
        tags:[tag_id]
    }
})
.then(function (response) {
    console.log("add tag result ",response.data);
})
*/