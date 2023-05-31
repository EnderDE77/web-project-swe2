console.log("tqrr");

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
        rule:"email"
    },
    {
        validator: (value) => {
            return () => {
                return fetch("../LOGIN/validat-email.php?Email=" + encodeURIComponent(value))
                    .then(function(response) {
                        if (!response.ok) {
                            throw new Error("Network response was not OK");
                        }
                        return response.json();
                    })
                    .then(function(json) {
                        console.log(json);
                        return json.available;
                    })
                    .catch(function(error) {
                        console.log(error);
                        return false; // Return false to indicate validation failure in case of an error
                    });
            };
        },
        errorMessage: "Email already taken"
    }

])
.addField("#Password", [
    {
        rule: "required",
        errorMessage: "Invalid Password"
    }
])


.onSuccess((event) =>{
document.getElementById("signup").submit();
});






validation1
.addField("#Email1" , [
    {
        rule: "required"
       
    },
    {
        rule:"email"
    }
    
])
.addField("#Password1", [
    {
        rule: "required",
        // errorMessage: "Invalid Password"
    },
    
    {
        validator: (value) => {
            return () => {
                return fetch("../LOGIN/validat-password.php?Email=" + encodeURIComponent(document.querySelector("#Email1").value) + "&Password=" + encodeURIComponent(value))
                    .then(function(response) {
                        if (!response.ok) {
                            throw new Error("Network response was not OK");
                        }
                        return response.json();
                    })
                    .then(function(json) {
                        console.log(json);
                        return json.valid;
                    })
                    .catch(function(error) {
                        console.log(error);
                        return false; // Return false to indicate validation failure in case of an error
                    });
            };
        },
        errorMessage: "Email or password are not corect!"
    }
])
 
.onSuccess((event) =>{
    document.getElementById("signin").submit();
    });
    