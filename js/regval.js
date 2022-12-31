
     function emailValidation(){
        email = document.getElementById("email").value;
        var pattern = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (email.match(pattern))
                {
                 return true
                }
         else{ 
                 document.getElementById("emailval").style.color = "red";
                 document.getElementById("emailval").innerHTML = "The email is not valid";
                 return false
            }
            }
        function passwordValidation(){
            password = document.getElementById("password1").value;
            var pattern = "^(?=.*[0-9])" + "(?=.*[a-z])(?=.*[A-Z])" + "(?=.*[@#$%^&+=])" + "(?=\\S+$).{8,20}$";
            if (password.match(pattern))
                {
                 return true
                }
            else{ 
                 document.getElementById("passval").style.color = "red";
                 document.getElementById("passval").innerHTML = "The password is not valid";
                 return false
                }
            }
        function passwordMatching(){
            password1 = document.getElementById("password1").value;
            password2 = document.getElementById("password2").value;
            if(password1 == password2)
            {
                return true
            }
            else{ 
                document.getElementById("passmatch").style.color = "red";
                document.getElementById("passmatch").innerHTML = "The password is not matching";
                 return false
                }
            }
        function registrationValidation(){
           if( (emailValidation() && passwordValidation() && passwordMatching()) == true){  
              return true
           }
           else {
            emailValidation();
            passwordValidation();
            passwordMatching();
           }
        }