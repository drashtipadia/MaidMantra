
const comqueform=document.getElementById("addcommonquestion");
const commonque=document.getElementById("commonquestion");
const comquemsg=document.getElementById("addQuemsg");
const Qtype=document.getElementById("valuetype");
const typemsg=document.getElementById("valtypemsg");
comqueform.addEventListener("submit", function (e)
{
    if (blankvalidation() === true) {  
    } else {
      e.preventDefault();  
    } 
});
function blankvalidation() {
    let flag = true;
    if (commonque.value.trim() === "" || commonque.value === null) {
      flag = false;
      comquemsg.classList.remove("d-none");
    } else if(commonque.value.match(/^[A-Za-z\s]+$/) == null)
    {
      flag = false;
      comquemsg.classList.remove("d-none");
      comquemsg.innerText="Please Enter proper formate";
    }
    else {
      comquemsg.classList.add("d-none");
    }
    if ( Qtype.value === "blank") {
      flag = false;
      typemsg.classList.remove("d-none");
    } else {
      typemsg.classList.add("d-none");
    }
    return flag;
}

function showUpdate(id) {
  
  document.getElementById("editRowCommonQuestion"  +  id).classList.add("d-none"); 
  document.getElementById("editFormCommonQuestion" + id).classList.remove("d-none");
}

function cancelEdit(id) {
  document.getElementById("editRowCommonQuestion" + id).classList.remove("d-none");
  document.getElementById("editFormCommonQuestion" + id).classList.add("d-none");
}

function  blankvalid(id)
{ 
  
   var cqname=document.getElementById("cq_name"+id);
   var cqtype=document.getElementById("cq_type");
   if(cqname.value === "" || cqname.value.match(/^[A-Za-z\s]+$/) == null)
   {
     alert("please enter value")
     return false;
   }
   else if(cqtype.value === "no"){
     alert("please select the type");
     return false;
   }else
   {
    return true;
   }
  
}
