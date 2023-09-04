console.log("asdfa");
const form=document.getElementById('formq')
const uname=document.getElementById('nameid')
const mobile=document.getElementById('mobileid')

const email=document.getElementById('emailid')
const password= document.getElementById('passwordid')
function senddata(){
console.log("senddata");
if(validation()){
    document.getElementById('submit-button').click();
}
}
// form.addEventListener('submit',event=>{
//     event.preventDefault();
//     if(validation()){
//         form.action='actionpage.php';
//     }
// })


const setError= (element,message)=>{
    const inputcontrol=element.parentElement;//given id parent div
    const errorDisplay = inputcontrol.querySelector("#err");// slelecting error id in that div
    errorDisplay.innerText=message //to display the message
}
function validation(){

   const nameval=uname.value
   const emailval=email.value
   const passwordval=password.value
   const mobileval=mobile.value

    if(nameval === ""){
        setError(uname,"username is required")
    }
    if(emailval === ""){
        setError(email,"email is required")
    }
    if(passwordval === ""){
        setError(password,"password is required")
    }
    if(mobileval === ""){
        setError(mobile,"mobile is required")
    }
    else 
    {
        return true
    }
}