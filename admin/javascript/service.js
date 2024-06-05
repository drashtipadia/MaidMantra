const form = document.getElementById("addservice");
const service = document.getElementById("newservice");
const msg = document.getElementById("addservicemsg");
form.addEventListener("submit", function (e) {
  if (blankvalidation() === true && valuevalidation() === true) {
  } else {
    e.preventDefault();
  }
});
function blankvalidation() {
  let flag = true;
  if (service.value.trim() === "" || service.value === null) {
    flag = false;
    msg.classList.remove("d-none");
  } else {
    msg.classList.add("d-none");
  }
  return flag;
}
function valuevalidation() {
  let temp = true;
  if (service.value.match(/^[A-Za-z\s]+$/) == null) {
    temp = false;
    msg.classList.remove("d-none");
    msg.innerText = "Give proper value";
  } else {
    msg.classList.add("d-none");
  }
  return temp;
}

function showUpdate(id) {
  document.getElementById("editRowservice" + id).classList.add("d-none");
  document.getElementById("editserviceForm" + id).classList.remove("d-none");
}

function cancelEdit(id) {
  document.getElementById("editRowservice" + id).classList.remove("d-none");
  document.getElementById("editserviceForm" + id).classList.add("d-none");
}

function blankvalid(id) {
  var sername = document.getElementById("ser_name" + id);
  if (sername.value === "") {
    alert("please enter value");
    return false;
  } else {
    return true;
  }
}
