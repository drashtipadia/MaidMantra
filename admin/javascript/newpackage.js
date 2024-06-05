const form = document.getElementById("package");
const title = document.getElementById("pack_title");
const titlemsg = document.getElementById("packtitlemsg");
const information = document.getElementById("pack_descripition");
const infomsg = document.getElementById("packdecsmsg");
const image = document.getElementById("newpackimage");
const imgmsg = document.getElementById("packimgmsg");
const service = document.getElementById("pack_service");
const sermsg = document.getElementById("pack_sermsg");
form.addEventListener("submit", function (e) {
  if (blankvalue() === true) {
  } else {
    e.preventDefault();
  }
});
function blankvalue() {
  let flag;

  if (title.value.trim() === "" || title.value === null) {
    flag = false;
    titlemsg.classList.add("errmsg");
    titlemsg.innerText = "please Write Title ";
  } else {
    flag=true;
    titlemsg.classList.remove("errmsg");
  }
  if (information.value.trim() === "" || information.value === null) {
    flag = false;
    infomsg.classList.add("errmsg");
    infomsg.innerText = "please Write Here information ";
  } else {
    flag=true;
    infomsg.classList.remove("errmsg");
  }
  if (image.value.trim() === "" || image.value === null) {
    flag = false;
    imgmsg.classList.remove("d-none");
  } else {
    flag=true;
    imgmsg.classList.add("d-none");
  }
  if (service.value === "no") {
    flag = false;
    sermsg.classList.remove("d-none");
  } else {
    flag=true;
    sermsg.classList.add("d-none");
  }
  return flag;
}

