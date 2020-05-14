function formValidation()  
{  
var customerpass = document.registration.customer_pass;  
var customername = document.registration.customer_name;  
var customeraddress = document.registration.customer_address;  
var customercountry = document.registration.customer_country;  
var customeremail = document.registration.customer_email;  
 
{  
if(customerpass_validation(customer_pass,7,12))  
{  
if(allLetter(customername))  
{  
if(alphanumeric(customeraddress))  
{   
if(countryselect(customercountry))  
{  
  
if(ValidateEmail(customeremail))  
{  
  
}  
}   
}  
}   
}  
}  
 
return false;  
}  
function customerpass_validation(customer_pass,mx,my)  
{  
var customer_pass_len = customer_pass.value.length;  
if (customer_pass_len == 0 ||customer_pass_len >= my || customer_pass_len < mx)  
{  
alert("Password should not be empty / length be between "+mx+" to "+my);  
customer_pass.focus();  
return false;  
}  
return true;  
}  
