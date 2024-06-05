const form=document.getElementById("paymentform");
const chname=document.getElementById("cardholdername");
const number=document.getElementById("cardnumber");
const expirydate=document.getElementById("cardexpiry");
const cvv=document.getElementById("cardcvv");
const namemsg=document.getElementById("cardnamemsg");
const numbermsg=document.getElementById("cardnumbermsg");
const datemsg=document.getElementById("carddatemsg");
const cvvmsg=document.getElementById("cardcvvmsg");
form.addEventListener("submit",function(e){
  
if (blankValidation() === true && valueValidation() === true) {
} else {
  e.preventDefault();
}
});
function blankValidation()
{
    let flag=true;
    if(chname.value.trim()=== "" || chname.value === null) {
        flag = false;
        namemsg.classList.remove("d-none");
    } else {
        namemsg.classList.add("d-none");
    }
    if(number.value.trim() === "" || number.value === null)
    {
        flag=false;
        numbermsg.classList.remove("d-none");
    }
    else
    {
        numbermsg.classList.add("d-none");
    }
    if(expirydate.value.trim() === "" || expirydate.value === null)
    {
       flag=false;
       datemsg.classList.remove("d-none");
    }else
    {
       datemsg.classList.add("d-none");
    }
    if(cvv.value.trim()=== "" || cvv.value=== null)
    {
        flag=false;
        cvvmsg.classList.remove("d-none");
    }
    else{
        cvvmsg.classList.add("d-none");
    }
     
      return flag;
}
function valueValidation()
{
    let flag=true;
    if(chname.value.match(/^[A-Za-z\s]+$/) == null)
    {
        flag=false;
        namemsg.classList.remove("d-none");
        namemsg.innerText="Give Proper name";
    }else{
        namemsg.classList.add("d-none");
    }
    if(number.value.match(/^[0-9]+$/) == null)
    {
         flag=false;
         numbermsg.classList.remove("d-none");
         numbermsg.innerText="Only numeric value enter";
    }else if(number.value.length !== 16)
    {
        flag=false;
        numbermsg.classList.remove("d-none");
        numbermsg.innerText="Must have 16 number"; 
    }else
    {
         numbermsg.classList.add("d-none");
    }
    if(cvv.value.length !==3 || cvv.value.match(/^[0-9]+$/) == null)
    {
        flag=false;
        cvvmsg.classList.remove("d-none");
        cvvmsg.innerText="Must 3 number";
    }
    else{
        cvvmsg.classList.add("d-none");
    }
    return flag;
}

window.addEventListener("load", function() {
    var mydate = new Date();
    mydate.setDate(mydate.getDate() + 90);
    var date = ("0" + mydate.getDate()).slice(-2);
    var month = ("0" + (mydate.getMonth())).slice(-2); 
    var year = mydate.getFullYear();
    document.getElementById("cardexpiry").setAttribute("max", year + "-" + month + "-" + date);
   
});