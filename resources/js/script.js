// js is detected

// Events


// Clear login page
function clearForm(){
    document.getElementById("reg_form").innerHTML = "";
}
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
    }

}


//NOTE: AJAX CALLS