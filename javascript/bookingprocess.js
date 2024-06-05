const nxtbtn = document.getElementById("next-btn");
const prebtn = document.getElementById("pre-btn");
const submitbtn = document.getElementById("submit-btn");
const parts = document.getElementsByClassName("part");
const gender = document.getElementById("hour/salary");
const gendermsg = document.getElementById("genmsg");
var counterClick = 0;
nxtbtn.addEventListener("click", function () {
  counterClick = counterClick + 1;
  if (counterClick == 1) {
    prebtn.classList.remove("d-none");
  }
  if (counterClick == 2) {
    nxtbtn.classList.add("d-none");
    submitbtn.classList.remove("d-none");
  }
  parts[counterClick].classList.remove("d-none");
  parts[counterClick - 1].classList.add("d-none");
});
prebtn.addEventListener("click", function () {
  counterClick = counterClick - 1;
  if (counterClick == 0) {
    prebtn.classList.add("d-none");
  }
  if (counterClick == 1) {
    nxtbtn.classList.remove("d-none");
    submitbtn.classList.add("d-none");
  }
  parts[counterClick + 1].classList.add("d-none");
  parts[counterClick].classList.remove("d-none");
});

window.addEventListener("load", function () {
  var mydate = new Date();
  mydate.setDate(mydate.getDate() + 90);
  var date = ("0" + mydate.getDate()).slice(-2);
  var month = ("0" + mydate.getMonth()).slice(-2);
  var year = mydate.getFullYear();
  document
    .getElementById("datefield")
    .setAttribute("max", year + "-" + month + "-" + date);
});

const form = document.getElementById("bookingform");
const text = document.getElementById("textfield");
const textmsg = document.getElementById("txtmsg");
const num=document.getElementById("numberfield");
const nummsg=document.getElementById("numbermsg");
const userdate=document.getElementById("datefield");
const userdatemsg=document.getElementById("datemsg");
const usertime=document.getElementById("time");
const usertimemsg=document.getElementById("timemsg");
form.addEventListener("submit", function (e) {
  if (valuevalidation() === true) {
  } else {
    e.preventDefault();
  }
});
function valuevalidation() {
  let flag;
  if (text.value.trim() === null || text.value == "") {
    flag = false;
    textmsg.classList.remove("d-none");
  } else {
    flag=true;
    textmsg.classList.add("d-none");
  }
  if (num.value.trim() === null || num.value == "") {
    flag = false;
    nummsg.classList.remove("d-none");
  } else {
    flag=true;
    nummsg.classList.add("d-none");
  }
  if (userdate.value.trim() === null || userdate.value == "") {
    flag = false;
    userdatemsg.classList.remove("d-none");
  } else {
    flag=true;
    userdatemsg.classList.add("d-none");
  }
  if (usertime.value.trim() === null || usertime.value == "") {
    flag = false;
    usertimemsg.classList.remove("d-none");
  } else {
    flag=true;
    usertimemsg.classList.add("d-none");
  }
  return flag;
}



