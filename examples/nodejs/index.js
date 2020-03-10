const axios = require('axios');
const api_url = 'https://{YOURDOMAIN}.gurucan.com/api/';
const api_key = 'API_KEY';


const user_id = 'USER_ID';
const course_id = 'COURSE_ID';

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


//Provide access to a course
instance({
    url:`/admin/users/${user_id}/grant-access`,
    method:"POST",
    data:{
        item:{
            refPath:"Course",
            module:"course",
            _id: course_id
        },
        sendPaymentEmail:true
    }
})
.then(function (response) {
    console.log("access grant result ",response.data);
})
