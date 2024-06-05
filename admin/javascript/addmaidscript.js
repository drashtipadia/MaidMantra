const addmaidform = document.getElementById("adminaddmaidform");
const maidname = document.getElementById("maid_name");
const maidnamemsg = document.getElementById("mnamemsg");
const maidage = document.getElementById("maid_age");
const maidagemsg = document.getElementById("magemsg");
const maidnumber = document.getElementById("maid_number");
const maidnumbermsg = document.getElementById("mnumbermsg");
const maidpicture = document.getElementById("image1");
const maidpicturemsg = document.getElementById("mimagemsg");
const maidservice = document.getElementById("Service");
const maidservicemsg = document.getElementById("mservicemsg");
//const maidgender=document.getElementById("gender");
//const maidgenmsg=document.getElementById("mgendermsg");
addmaidform.addEventListener("submit", function (e) {
  if (blankvalidation() === true) {
  } else {
    e.preventDefault();
  }
});

function blankvalidation() {
  let flag = true;
  if (maidname.value.trim() === "" || maidname.value === null) {
    flag = false;
    maidnamemsg.classList.remove("d-none");
  } else {
    maidnamemsg.classList.add("d-none");
  }
  if (maidage.value.trim() === "" || maidage.value === null) {
    flag = false;
    maidagemsg.classList.remove("d-none");
  } else {
    maidagemsg.classList.add("d-none");
  }
  if (maidnumber.value.trim() === "" || maidnumber.value === null) {
    flag = false;
    maidnumbermsg.classList.remove("d-none");
  } else {
    maidnumbermsg.classList.add("d-none");
  }
  if (maidpicture.value.trim() === "" || maidpicture.value === null) {
    flag = false;
    maidpicturemsg.classList.remove("d-none");
  } else {
    maidpicturemsg.classList.add("d-none");
  }
  if (maidservice.value === "blank") {
    flag = false;
    maidservicemsg.classList.remove("d-none");
  } else {
    maidservicemsg.classList.add("d-none");
  }

  return flag;
}