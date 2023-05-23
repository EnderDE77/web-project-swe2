const validation = new JustValidate("#signup");
const validation1 = new JustValidate("#signin");

validation 
.addField("#Username" , [
    {
        rule: "required"
       
    }
])

.addField("#Email" , [
    {
        rule: "required"
       
    }
])

.addField("#Password" , [
    {
        rule: "required"
       
    }
])

.onSuccess((event)=>{
    document.getElementById("signup").submit();
       })


       validation1
       
       .addField("#Email" , [
           {
               rule: "required"
              
           }
       ])
       
       .addField("#Password" , [
           {
               rule: "required"
              
           }
       ])
       
       .onSuccess((event)=>{
           document.getElementById("signin").submit();
              })