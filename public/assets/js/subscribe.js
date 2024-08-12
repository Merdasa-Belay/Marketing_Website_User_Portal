
function currentPassword () {
    if (document.getElementById('currentpassword').type == 'password') {
      document.getElementById('toggler').classList = 'far fa-eye-slash'
      document.getElementById('currentpassword').type = 'text';   
  
  
    } else {
      document.getElementById('toggler').classList = 'far fa-eye'
      document.getElementById('currentpassword').type = 'password';   
    }
  }
  
  
  function newPassword () {
    if (document.getElementById('newpassword').type == 'password') {
      document.getElementById('newtoggler').classList = 'far fa-eye-slash'
      document.getElementById('newpassword').type = 'text';   
  
  
    } else {
      document.getElementById('newtoggler').classList = 'far fa-eye'
      document.getElementById('newpassword').type = 'password';   
    }
  }
  
  function confirmPassword () {
    if (document.getElementById('confirmpassword').type == 'password') {
      document.getElementById('confirmtoggler').classList = 'far fa-eye-slash'
      document.getElementById('confirmpassword').type = 'text';   
  
  
    } else {
      document.getElementById('confirmtoggler').classList = 'far fa-eye'
      document.getElementById('confirmpassword').type = 'password';   
    }
  }
  
  
  
  
  