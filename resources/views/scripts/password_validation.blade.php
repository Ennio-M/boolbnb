<script>
console.log('veditu');
const form = document.getElementById('registration_form');
const register_btn = document.getElementById('register_btn');
console.log(register_btn);
register_btn.addEventListener('click', pass);   
function pass(event) {
    console.log('checazzo');
    console.log(event);
    event.preventDefault();
    const password = document.forms["myForm"].password.value;
    const password_confirmation = document.forms["myForm"].password_confirmation.value;
    if (password != password_confirmation) {
        alert("the password and the password_confirmation must be equal");
        
    }else {
        form.submit();
    }
   
    
}
</script>