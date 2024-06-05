const infoform = document.getElementById("updateinfoform");
const utitle = document.getElementById("uptitle");
const titlemsg =document.getElementById("updatetitlemsg");
const info=document.getElementById("descripition");
const infomsg=document.getElementById("updateinfomsg");
infoform.addEventListener("submit", function (e) {
  if (blankvalue() === true) {
  } else {
    e.preventDefault();
  }
});
console.log(utitle.value);

function blankvalue() {
  let flag = true;
  if (utitle.value.trim() === null || utitle.value == "") {
    flag = false;
   titlemsg.classList.add("errmsg");
    titlemsg.innerText="Please enter title";  
  } else  {
    titlemsg.classList.remove("errmsg");
  }


  if(info.value.trim() === null || info.value == "")
  {
    flag=false;
    infomsg.classList.add("errmsg");
    infomsg.innerText="Please enter description";
  }
  else
  {
    infomsg.classList.remove("errmsg");
  }
  return flag;
}

