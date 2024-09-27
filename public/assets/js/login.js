function showPassword() {
  
    if (document.getElementById('password').type == 'password') {
    document.getElementById('toggler').classList = 'far fa-eye-slash'
    document.getElementById('password').type = 'text';   

  } else {
    document.getElementById('toggler').classList = 'far fa-eye'
    document.getElementById('password').type = 'password';   
  }
}