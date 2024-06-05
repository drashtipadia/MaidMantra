const cform = document.getElementById("cform");
const cname = document.getElementById("cname");
const cnumber = document.getElementById("cnumber");
const cnamemsg = document.getElementById("cnamemsg");
const cnumbermsg = document.getElementById("cnumbermsg");
const clocation = document.getElementById("locationid");
const clocationmsg = document.getElementById("clocationmsg");
const cservice = document.getElementById("cservices");
const cservicemsg = document.getElementById("cservicemsg");
const ctime = document.getElementById("ctime");
const ctimemsg = document.getElementById("ctimemsg");

cform.addEventListener("submit", function (e) {
  if (cblankValidation() === true && cvalueValidation() === true) {
  } else {
    e.preventDefault();
  }
});

function cblankValidation() {
  let flag = true;
  if (cname.value.trim() === "" || cname.value == null) {
    flag = false;
    cnamemsg.classList.remove("d-none");
  } else {
    cnamemsg.classList.add("d-none");
  }
  if (cnumber.value.trim() === "" || cnumber.value == null) {
    flag = false;
    cnumbermsg.classList.remove("d-none");
  } else {
    cnumbermsg.classList.add("d-none");
  }
  if (clocation.value === "") {
    flag = false;
    clocationmsg.classList.remove("d-none");
  } else {
    clocationmsg.classList.add("d-none");
  }
  if (cservice.value.trim() === "" || cservice.value == null) {
    flag = false;
    cservicemsg.classList.remove("d-none");
  } else {
    cservicemsg.classList.add("d-none");
  }
  if (ctime.value.trim() === "" || ctime.value == null) {
    flag = false;
    ctimemsg.classList.remove("d-none");
  } else {
    ctimemsg.classList.add("d-none");
  }
  return flag;
}

function cvalueValidation() {
  let flag = true;
  if (cname.value.match(/^[A-Za-z\s]+$/) == null) {
    flag = false;
    cnamemsg.classList.remove("d-none");
    cnamemsg.innerText = "give proper name...";
  } else {
    cnamemsg.classList.add("d-none");
  }

  if (cnumber.value.length !== 10) {
    flag = false;
    cnumbermsg.classList.remove("d-none");
    cnumbermsg.innerText = "Phone Number Length must be 10";
  } else if (cnumber.value.match(/^[0-9]*$/) == null) {
    flag = false;
    cnumbermsg.classList.remove("d-none");
    cnumbermsg.innerText = "Phone Number  must be numeric";
  } else {
    cnumbermsg.classList.add("d-none");
  }
  return flag;
}
