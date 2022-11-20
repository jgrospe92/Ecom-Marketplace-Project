// js is detected
$(function(){
    $('#regUser').submit(function(e){
        e.preventDefault();
       $.ajax(
        {
            url: '/User/register',
            type: 'POST',
            data: $(this).serialize(),
        })
    })

    $('#loginUser').submit(function(e){
        e.preventDefault();
       $.ajax(
        {
            url: '/User/register',
            type: 'POST',
            data: $(this).serialize(),
        })
    })
});

// GLOBAL properties

// Events



// load event


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
            e.preventDefault();
            $.ajax({
                url: '/User/register',
                type: 'POST',
                data:  $(this).serialize()
            });
        });
    }
}
createProfile();