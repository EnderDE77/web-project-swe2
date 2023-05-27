const validation = new JustValidate("#signup");
const validation1 = new JustValidate("#signin");

validation 
.addField("#Level" , [
    {
        rule: "required"
       
    }
])

.addField("#Name" , [
    {
        rule: "required"
       
    }
])

.addField("#Surname" , [
    {
        rule: "required"
       
    }
])

.addField("#Email" , [
    {
        rule: "required"
       
    },
    {
        rule: "email"
    }
])

.addField("#Password" , [
    {
        rule: "required"
       
    },
    {
     rule: "password"
 }
])

.onSuccess((event)=>{
    document.getElementById("signup").submit();
       })


 validation1
       
       .addField("#Email" , [
           {
               rule: "required"
              
           },
           {
            rule: "email"
        }
       ])
       
       .addField("#Password" , [
           {
               rule: "required"
              
           },
           {
            rule: "password"
        }
       ])
       
       .onSuccess((event)=>{
           document.getElementById("signin").submit();
              })