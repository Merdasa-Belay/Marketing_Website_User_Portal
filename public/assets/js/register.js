
  function showPassword() {
  
    if (document.getElementById('Confirmpassword').type == 'password') {
    document.getElementById('confirmtoggler').classList = 'far fa-eye-slash'
    document.getElementById('Confirmpassword').type = 'text';   

  } else {
    document.getElementById('confirmtoggler').classList = 'far fa-eye'
    document.getElementById('Confirmpassword').type = 'password';   
  }

  }

function showHide () {
  if (document.getElementById('password').type == 'password') {
    document.getElementById('toggler').classList = 'far fa-eye-slash'
    document.getElementById('password').type = 'text';   


  } else {
    document.getElementById('toggler').classList = 'far fa-eye'
    document.getElementById('password').type = 'password';   
  }
}












