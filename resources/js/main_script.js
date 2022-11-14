// js is detected

// GLOBAL properties

var role = "buyer";
// Events


// Clear login page
function clearForm(){
    document.getElementById("reg_form").innerHTML = "";
}

// load event
// var user_role = document.getElementById('current-user');
// window.onload = (event) => {
//     console.log(role + 'event: ' + event);
//   };

// DEBUG:
var btn = document.getElementById('btn');
if (btn != null) {
    btn.addEventListener('click', function(){alert("you click the button " + role)})
}

// AJAX FUNCTIONS
var btnRegister = document.getElementById('btnRegister');
function createProfile(){
    if (btnRegister != null) {
        btnRegister.addEventListener('click', function(e){
            $.ajax({
                url: '/User/register',
                type: 'POST',
                data: {role : role}
            });
        });
    }
}
createProfile();

// function for buyer
function registerUser(id){
  
    var container =  document.getElementById("reg_form");
    

    if (id === 'buyer'){
        clearForm();
        document.getElementById("vendor").classList.remove("active");
        document.getElementById(id).classList.add("active");
        var content = '<label for="username">Username: <input placeholder="Enter buyer username"';
            content += 'type="text" name="username" id="username" required></label><br>';
            content += '<label for="password">Password: <input placeholder="Enter password"';
            content += 'type="password" name="password" id="password" required></label><br>';
            content += '<label for="password_verify">Confirm Password: <input placeholder="Re-enter password"';
            content += 'type="password" name="password_verify" id="password_verify" required></label><br>';
        container.innerHTML += content;
        role = "buyer";

     
    } else if (id === "vendor") {
        clearForm();
        document.getElementById("buyer").classList.remove("active");
        document.getElementById(id).classList.add("active");
        var content = '<label for="username">Username: <input placeholder="Enter vendor username"';
            content += 'type="text" name="username" id="username" required></label><br>';
            content += '<label for="password">Password: <input placeholder="Enter password"';
            content += 'type="password" name="password" id="password" required></label><br>';
            content += '<label for="password_verify">Confirm Password: <input placeholder="Re-enter password"';
            content += 'type="password" name="password_verify" id="password_verify" required></label><br>';
        container.innerHTML = content;
       role = "vendor";

    }

}


//NOTE: AJAX CALLS