
window.addEventListener("load", function () {
  var mydate = new Date();
  mydate.setDate(mydate.getDate() + 90);
  var date = ("0" + mydate.getDate()).slice(-2);
  var month = ("0" + mydate.getMonth()).slice(-2);
  var year = mydate.getFullYear();
  document
    .getElementById("bdate")
    .setAttribute("max", year + "-" + month + "-" + date);
});



const form = document.getElementById("packagebookform");
const text = document.getElementById("textfield");
const textmsg = document.getElementById("txtmsg");
const userdate=document.getElementById("bdate");
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


