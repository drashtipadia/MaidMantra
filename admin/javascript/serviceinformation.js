console.log("helllo");

const serviceinfo = document.getElementById("serviceinfo");
const title = document.getElementById("info_title");
const titlemsg=document.getElementById("titlemsg");
const information=document.getElementById("info_descripition");
const infomsg=document.getElementById("info_msg");
const image=document.getElementById("newimage");
const imgmsg=document.getElementById("img_msg");
const service=document.getElementById("info_service");
const sermsg=document.getElementById("info_sermsg");

serviceinfo.addEventListener("submit", function (e) {
  if (blankvalid() === true) {
    
  } else {
    e.preventDefault();
  }
});
function blankvalid()
{
  let flag;
 
  if (title.value.trim() === "" || title.value === null) {
    flag = false;
    titlemsg.classList.add("errmsg");
    titlemsg.innerText="please Write Title ";
  } else {
    titlemsg.classList.remove("errmsg");
  }
  if (information.value.trim() === "" || information.value === null) {
    flag = false;
    infomsg.classList.add("errmsg");
    infomsg.innerText="please Write Here information ";
  } else {
    infomsg.classList.remove("errmsg");
  }
  if (image.value.trim() === "" || image.value === null) {
    flag = false;
    imgmsg.classList.remove("d-none");  
  } else {
    imgmsg.classList.add("d-none");
  }
  if (service.value === "no") {
    flag = false;
    sermsg.classList.remove("d-none");
  } else {
    sermsg.classList.add("d-none");
  }
   return flag;
}

