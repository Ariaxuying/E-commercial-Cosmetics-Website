var xmlhttp;
function addcart(cartpid){
   var q = document.getElementById(cartpid).value;
   if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();} 
   else {xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}

         xmlhttp.open("GET","addcart.php?cartpid="+cartpid+"&cartqty="+q,true);
         xmlhttp.send();
    
         
         xmlhttp.onreadystatechange = function(){
             
             if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
                 window.alert(xmlhttp.responseText); 
                
             }
             
            }
         }
    



function validateprofile(){
                   var fn=document.getElementsByName("fn")[0].value;
                   var ln=document.getElementsByName("ln")[0].value;
                   var an=document.getElementsByName("an")[0].value;
                   var pw=document.getElementsByName("pw")[0].value;
                   var cpw=document.getElementsByName("cpw")[0].value;
                   var em=document.getElementsByName("em")[0].value;
                   var ph=document.getElementsByName("ph")[0].value;
                   var sa=document.getElementsByName("sa")[0].value;
                   var ba=document.getElementsByName("ba")[0].value;
                   if(fn=="")
                   {window.alert("Please enter your first name!");
                       return false;}
                   else if(ln=="")
                   {window.alert("Please enter your last name!");
                       return false;}
                   else if(an=="")
                   {window.alert("Please enter your account name!");
                       return false;}
                   else if(pw=="")
                   {window.alert("Please enter your password!");
                       return false;}
                   else if (cpw!=pw)
                       {window.alert("Incorrect Confirmation Password!");
                          return false;} 
                 
                   else
                   {if (window.XMLHttpRequest) {
                    xmlhttp=new XMLHttpRequest();} 
               else {xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}

         xmlhttp.open("GET","edit-add-profile.php?an="+an+"&pw="+pw+"&fn="+fn+"&ln="+ln+"&em="+em+"&ph="+ph+"&sa="+sa+"&ba="+ba,true);
         xmlhttp.send();
    
         
         xmlhttp.onreadystatechange = function(){
             
             if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
                 window.alert(xmlhttp.responseText); 
                 
                 } 
                
             }
             
            }
                   }
               

function cartqtychange1(pid,qty,price,proprice){
var newqty=document.getElementById(pid).value;
if(!(newqty>0)){
    
    
    alert("Invalid quantity number!");}
else{
if (window.XMLHttpRequest) {
                    xmlhttp=new XMLHttpRequest();} 
               else {xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}

         xmlhttp.open("GET","cartqtychange1.php?pid="+pid+"&qty="+newqty,true);
         xmlhttp.send();
    
         
         xmlhttp.onreadystatechange = function(){
             
             if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
                 document.getElementById(price).innerHTML="$"+newqty*proprice;
                 window.alert("Quantity Changed!"); }
        
    }
    
}}


function cartqtychange2(pid,qty,price,proprice){
var newqty=document.getElementById(pid).value;
if(!(newqty>0))
    alert("Invalid quantity number!");
else{
if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();} 
else {xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}

xmlhttp.open("GET","cartqtychange2.php?pid="+pid+"&qty="+newqty,true);
xmlhttp.send();
    
         
xmlhttp.onreadystatechange = function(){
    if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
    document.getElementById(price).innerHTML="$"+newqty*proprice;
                 window.alert("Quantity Changed!");}
        
    }
}}

function emptycart1(){
    if(confirm("Would you like to empty your shopping cart?")){
    if (window.XMLHttpRequest) {
                    xmlhttp=new XMLHttpRequest();} 
               else {xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}

         xmlhttp.open("GET","emptycart1.php?",true);
         xmlhttp.send();
    
         
         xmlhttp.onreadystatechange = function(){
             
             if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
                 
                 window.alert("Delete Successfully!"); 
             location.reload(true);}
}}}


function emptycart2(){
    if(confirm("Would you like to empty your shopping cart?")){
    if (window.XMLHttpRequest) {
                    xmlhttp=new XMLHttpRequest();} 
               else {xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}

         xmlhttp.open("GET","emptycart2.php?",true);
         xmlhttp.send();
    
         
         xmlhttp.onreadystatechange = function(){
             
             if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
                 
                 window.alert("Delete Successfully!"); 
             location.reload(true);}
}
    
}}

function deletecart1(){
    num=0;
    var pid=new Array(num);
    var opt=document.getElementsByName("cart");
    for(i=0;i<opt.length;i++){
        if(opt[i].checked)
        {pid[num]=opt[i].value;
         num=num+1;}}
if(num==0)
        alert("No item selected!");
else
{if(num==opt.length)
        emptycart1();
else{
    if (window.XMLHttpRequest) {
                    xmlhttp=new XMLHttpRequest();} 
               else {xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}

         xmlhttp.open("GET","deletecart1.php?pid="+pid+"&num="+num,true);
         xmlhttp.send();
    
         
         xmlhttp.onreadystatechange = function(){
             
             if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
                
                 window.alert("Delete itmes successfully!"); 
                 location.reload(true);
             }
}
        
}}}


function deletecart2(){
    num=0;
    var pid=new Array(num);
    var opt=document.getElementsByName("cart");
    for(i=0;i<opt.length;i++){
        if(opt[i].checked)
        {pid[num]=opt[i].value;
         num=num+1;}}
if(num==0)
        alert("No item selected!");

else
{if(num==opt.length)
        emptycart2();   
else{
  
    if (window.XMLHttpRequest) {
                    xmlhttp=new XMLHttpRequest();} 
               else {xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}

         xmlhttp.open("GET","deletecart2.php?pid="+pid+"&num="+num,true);
         xmlhttp.send();
    
         
         xmlhttp.onreadystatechange = function(){
             
             if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
                
                 window.alert("Delete itmes successfully!"); 
             location.reload(true);}
}
        
}}}


function validatepay(){
     
                   var t=/^[0-9]*$/
                   var fn=document.getElementsByName("fn")[0].value;
                   var ln=document.getElementsByName("ln")[0].value;
                   var ph=document.getElementsByName("ph")[0].value;
                   var sa=document.getElementsByName("sa")[0].value;
                   var ba=document.getElementsByName("ba")[0].value; 
                   var cn=document.getElementsByName("cn")[0].value; 
                   
                   if(fn=="")
                   {window.alert("Please enter your first name!");
                       return false;}
                   else if(ln=="")
                   {window.alert("Please enter your last name!");
                       return false;}
                   else if((!t.test(ph))||(ph.length!=10))
                   {window.alert("Phone Number must be 10 digits!");
                    return false;}
                   else if(sa=="")
                   {window.alert("Please enter your shipping address!");
                       return false;}
                   else if(ba=="")
                   {window.alert("Please enter your billing address!");
                       return false;}
                   else if((!t.test(cn))||(cn.length!=16))
                   {window.alert("Card number must be 16 digits!");
                    return false;}
                   else 
                       return true;
                   
}

function search(){
    var cat=document.getElementById("cat").value;
    var pro=document.getElementById("pro").value;
  
    var bd=document.getElementById("bd").value;
    var ed=document.getElementById("ed").value;
    
    if (window.XMLHttpRequest) {
                    xmlhttp=new XMLHttpRequest();} 
               else {xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}

         xmlhttp.open("GET","search.php?cat="+cat+"&pro="+pro+"&bd="+bd+"&ed="+ed,true);
     
         xmlhttp.send();
    
         
         xmlhttp.onreadystatechange = function(){
             
             if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
                document.getElementById("result").innerHTML=xmlhttp.responseText;
                 }
}
    
    
}
                   
                   
function spe(){
    var bd=document.getElementById("bd").value;
    var ed=document.getElementById("ed").value;
   if (window.XMLHttpRequest) {
                    xmlhttp=new XMLHttpRequest();} 
               else {xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}

         xmlhttp.open("GET","search1.php?bd="+bd+"&ed="+ed,true);
     
         xmlhttp.send();
    
         
         xmlhttp.onreadystatechange = function(){
             
             if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
                document.getElementById("result").innerHTML=xmlhttp.responseText;
                 }
} 
}
    
    


