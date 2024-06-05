
const maidform = document.getElementById("updatemaid");
const maidname = document.getElementById("m_name");
const maidnamemsg = document.getElementById("mnamemsg");
const mage = document.getElementById("m_age");
const maidagemsg = document.getElementById("magemsg");
const maidnumber = document.getElementById("m_number");
const maidnumbermsg = document.getElementById("mnumbermsg");
maidform.addEventListener("submit", function (e) {
  if (blankvalidation() === true) {
  } else {
    e.preventDefault();
  }
});

function blankvalidation() {
  let flag = true;
  if (maidname.value.trim() === "" || maidname.value === null) {
    flag = false;
    maidnamemsg.classList.add("errmsg");
    maidnamemsg.innerText = "Please Enter a name";
  } else {
    maidnamemsg.classList.remove("errmsg");
  }
  if (mage.value.trim() === "" || mage.value === null) {
    flag = false;
    maidagemsg.classList.add("errmsg");
    maidagemsg.innerText = "Please enter age";
  } else {
    maidagemsg.classList.remove("errmsg");
  }
  if (maidnumber.value.trim() === "" || maidnumber.value === null) {
    flag = false;
    maidnumbermsg.classList.add("errmsg");
    maidnumbermsg.innerText = "Please enter phone number ";
  } else if (maidnumber.value.length !== 10) {
    flag = false;
    maidnumbermsg.classList.add("errmsg");
    maidnumbermsg.innerText = "Phone Number Length must be 10";
  } else if (maidnumber.value.match(/^[0-9]*$/) == null) {
    flag = false;
    maidnumbermsg.classList.add("errmsg");
    maidnumbermsg.innerText = "Phone Number  must be numeric";
  } else {
    maidnumbermsg.classList.remove("errmsg");
  }

  return flag;
}
