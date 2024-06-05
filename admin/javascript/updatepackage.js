
const updatepackage = document.getElementById("updatepackage");
const title = document.getElementById("pack_uptitle");
const titlemsg = document.getElementById("packuptitlemsg");
const information = document.getElementById("pack_upinfo");
const infomsg = document.getElementById("updateinfomsg");
const oldimg = document.getElementById("img");
const image = document.getElementById("uppackimage");
const imgmsg = document.getElementById("packimgmsg");

updatepackage.addEventListener("submit", function (e) {
  if (blankvalid() === true) {
  } else {
    
    e.preventDefault();
  }
});

function blankvalid() {
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
    infomsg.classList.remove("errmsg");
  }
  if (image.value === null || oldimg.value === null) {
    flag = false;
    imgmsg.classList.remove("d-none");
  } else {
    imgmsg.classList.add("d-none");
  }

  return flag;
}
