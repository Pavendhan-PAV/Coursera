/*Add the JavaScript here for the function billingFunction().  It is responsible for setting and clearing the fields in Billing Information */
/*Add the JavaScript here for the function billingFunction().  It is responsible for setting and clearing the fields in Billing Information */
function billingFunction()
{
if(document.getElementById("same").checked)
{
  var nm= document.getElementById("shippingName");
  var cd= document.getElementById("shippingZip");
  
document.getElementById("billingName").value=nm.value;
   document.getElementById("billingZip").value=cd.value;
 
}
 else{
   document.getElementById("billingName").value="";
document.getElementById("billingZip").value="";
 }
}