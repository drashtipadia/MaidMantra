
const spequeform=document.getElementById("addSpeQueform");
const que=document.getElementById("question");
const quemsg=document.getElementById("questionmsg");
const quevalue=document.getElementById("questionvalue");
const valmsg=document.getElementById("valuemsg");
const service=document.getElementById("service");
const sermsg=document.getElementById("servicemsg");
spequeform.addEventListener("submit", function (e)
{
    if (blankvalidation() === true) {  
    } else {
      e.preventDefault();  
    } 
});
function blankvalidation() {
    let flag = true;
    if (que.value.trim() === "" || que.value === null) {
      flag = false;
      quemsg.classList.remove("d-none");
    } else if(que.value.match(/^[A-Za-z\s]+$/) == null)
    {
      flag = false;
      quemsg.classList.remove("d-none");
      quemsg.innerText="Enter Proper formate in question";
    }
    else {
      quemsg.classList.add("d-none");
    }
    if (quevalue.value.trim() === "" || quevalue.value === null) {
      flag = false;
      valmsg.classList.remove("d-none");
    } else {
      valmsg.classList.add("d-none");
    }
    if (service.value.trim() === "" || service.value === null) {
      flag = false;
      sermsg.classList.remove("d-none");
    } else {
      sermsg.classList.add("d-none");
    }
    return flag;
}

function showUpdate(id) {
  
  document.getElementById("editRowSpeQue"  +  id).classList.add("d-none"); 
  document.getElementById("editFormSpeQue" + id).classList.remove("d-none");
}

function cancelEdit(id) {
  document.getElementById("editRowSpeQue" + id).classList.remove("d-none");
  document.getElementById("editFormSpeQue" + id).classList.add("d-none");
}

function  blankvalid(id)
{ 
 
   var sqname=document.getElementById("SQ_name"+id);
   var sqvalue=document.getElementById("SQ_value"+id);
   if(sqname.value === "" || sqname.value.match(/^[A-Za-z\s]+$/) == null)
   {
     alert("please enter value")
     return false;
   }
   else if(sqvalue.value === ""){
     alert("please enter a value");
      return false;
    }else
   {
    return true;
   }
  
}
