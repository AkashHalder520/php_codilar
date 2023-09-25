console.log("asdfa");
const form=document.getElementById('formq')
const uname=document.getElementById('nameid')
const mobile=document.getElementById('mobileid')

const email=document.getElementById('emailid')
const password= document.getElementById('passwordid')


const setError = (element, message) => {
    const errorDisplay = document.getElementById(`${element}err`); // slelecting error id in that div
    errorDisplay.innerText = message; //to display the message
  };
let isvalid = {};

const namevalid = () => {
    if (uname.value.length > 0 && uname.value.length < 3) {
    setError("name", "Name should be more than 2 char");
    Object.assign(isvalid, { uname: false });
  } else if (uname.value.length == 0) {
    setError("name", "You must enter a First name");
    Object.assign(isvalid, { uname: false });
  } else {
    setError("name", " ");
    Object.assign(isvalid, { uname: true });
  }
};
const emailvalid = () => {
    // console.log(email.value);
    let regx = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/;
    if (email.value.length == 0) {
      setError("email", "You must enter a email");
      Object.assign(isvalid, { email: false });
    } else if (!regx.test(email.value)) {
      setError("email", "You must enter a valid email");
      Object.assign(isvalid, { email: false });
    } else {
      setError("email", " ");
      Object.assign(isvalid, { email: true });
    }
  };
  
  const passwordvalid = () => {
    console.log(password.value);
    var lengthPattern = /^.{8,16}$/;
    var uppercasePattern = /[A-Z]/;
    var specialCharPattern = /[!@#$%^&*]/;
    var digitPattern = /[0-9]/;
  
    if (
      !lengthPattern.test(password.value) ||
      !uppercasePattern.test(password.value) ||
      !specialCharPattern.test(password.value) ||
      !digitPattern.test(password.value)
    ) {
      setError(
        "password",
        "Password should be 8-16 characters and include at least one uppercase letter, one special character, and one digit."
      );
      Object.assign(isvalid, { password: false });
    } else {
      setError("password", "");
      Object.assign(isvalid, { password: true });
    }
  };
  const contactnumvalid = () => {
    const mobregx = /^[6-9]\d{9}$/;
    if (mobile.value.length == 0) {
      setError("contactnum", "You must enter a contact ");
      Object.assign(isvalid, { mobile: false });
    } else if (!mobregx.test(mobile.value)) {
      setError("contactnum", "You must enter a valid contact number");
      Object.assign(isvalid, { mobile: false });
    } else {
      // return true
      setError("contactnum", "");
      Object.assign(isvalid, { mobile: true });
    }
  };

  function senddata() {
    
    if (Object.keys(isvalid).length === 0) {
      alert("please enter data");
    } else if (isvalid.mobile == false) {
      alert("enter correct contact number");
    } else if (isvalid.password == false) {
      alert("enter correct password");
    } else if (isvalid.email == false) {
      alert("enter correct email");
    } 
     else if (isvalid.name == false) {
      alert("enter the correct name");
    } else {
      alert("success");
      // document.getElementById('submit-button').click();
    }
  }
