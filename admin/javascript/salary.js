const salform = document.getElementById("addsalaryform");
const hours = document.getElementById("hour");
const hourmsg = document.getElementById("addhourmsg");
const salary = document.getElementById("newsalary");
const salarymsg = document.getElementById("addsalarymsg");

salform.addEventListener("submit", function (e) {
  if (blankvalidation() === true) {
  } else {
    e.preventDefault();
  }
});
function blankvalidation() {
  let flag = true;
  if (hours.value.trim() === "" || hours.value === null) {
    flag = false;
    hourmsg.classList.remove("d-none");
  } else {
    hourmsg.classList.add("d-none");
  }
  if (salary.value.trim() === "" || salary.value === null) {
    flag = false;
    salarymsg.classList.remove("d-none");
  }else if(salary.value.match(/^[0-9]*$/) == null) {
    flag= false;
    salarymsg.classList.remove("d-none");
    salarymsg.innerText = "Only Numeric Value";
  } else {
    salarymsg.classList.add("d-none");
  }

  return flag;
}


function showUpdate(id) {
  document.getElementById("editRow" + id).classList.add("d-none");
  document.getElementById("editForm" + id).classList.remove("d-none");
}

function cancelEdit(id) {
  document.getElementById("editRow" + id).classList.remove("d-none");
  document.getElementById("editForm" + id).classList.add("d-none");
}

function  blankvalid(id)
{ 
  alert("hello");
   var updatehours=document.getElementById("edithours"+id);
   var updatesalary=document.getElementById("editsalary"+id);
   if(updatehours.value === "")
   {
     alert("please enter Hour")
     return false;
   }
   else if(updatesalary.value === ""){
     alert("please enter a salary value");
      return false;
    }else if(updatesalary.value.match(/^[0-9]*$/) == null) 
    {
      alert("please enter a salary in number");
      return false;
    }
    else{
    return true;
   }
  
}