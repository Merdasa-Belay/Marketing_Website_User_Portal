  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Register</title>
      <!-- inter font -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
      <!-- Bootstrap cdn -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <!-- Stylesheet -->
      <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
      <!-- Font awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


  </head>

  <body>



      <!-- Nav Bar -->

      <nav class="navbar navbar-expand-sm bg-body-tertiary">
          <div id="search-data-container">
              <input type="text" placeholder="datadudu.com" id="input-search">
          </div>
      </nav>






      <!-- Datadudu image -->

      <div id="image-dudu">
          <img id="datadudu-image" src="{{ asset('assets/image/DataDudu 3.png') }} " alt="">


          <!-- register form -->

          <div class="container-fuild" id="register-form">

              <div id="first-line">
                  <h2>Register for a DataTree account.</h2>
                  <span id="lorem">Lorem ipsum dolor sit amet consectetur.</span>

              </div>

              <!-- Individual and corporate button -->

              <div class="topbuttons">
                  <button id="individual" type="button" class="btn btn-primary btn-sm">Individual</button>
                  <button id="corporate" type="button" class="btn btn-primary btn-sm">Corporate</button>
              </div>

              <!-- title form -->
              <div id="register-input" class="form-group">
                  <label id="register-name" for="inputPassword5" class="form-label">Title</label>


                  <select class="form-select" id="inputGroupSelect02">
                      <option selected>Select title</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                  </select>
              </div>

              <!--  Full name -->
              <div id="register-input" class="form-group">
                  <label id="register-name" for="inputPassword5" class="form-label">Full name</label>

                  <input id="register-input" type="password" id="inputPassword5" class="form-control"
                      aria-describedby="passwordHelpBlock" placeholder="First and last name">
              </div>


              <!-- select country -->
              <div id="register-input" class="form-group">
                  <label id="register-name" for="inputPassword5" class="form-label">Country</label>




                  <select class="form-select" id="inputGroupSelect02">
                      <option selected>Select country</option>
                      <option value="1">Ethiopia</option>
                      <option value="2">Kenya</option>
                      <option value="3">Uganada</option>
                  </select>
              </div>

              <!--  Phone number -->
              <div id="register-input" class="form-group">
                  <label id="register-name" class="form-label">Phone number</label>

                  <input type="text" class="form-control" aria-describedby="passwordHelpBlock"
                      placeholder="Phone number">
              </div>

              <!--Email address  -->
              <div id="register-input" class="form-group">
                  <label id="register-name" class="form-label">Email address</label>


                  <input type="text" class="form-control" aria-describedby="passwordHelpBlock"
                      placeholder="Email address">

              </div>


              <!--  Password -->
              <div class="form-group password-container">
                  <label id="register-name" for="inputPassword5" class="form-label">Password</label>

                  <input type="password" class="form-control" aria-describedby="passwordHelpBlock" required>

                  <i id="toggler"class="far fa-eye"></i>


              </div>
              <div id="passwordHelpBlock" class="form-text">
                  Must be at least 8 characters.
              </div>


              <!--Confirm password  -->
              <div class="form-group password-container">
                  <label id="register-name" for="inputPassword5" class="form-label">Confirm password</label>


                  <input type="password" id="inputPassword5" class="form-control"
                      aria-describedby="passwordHelpBlock" placeholder="">
                  <span><i id="toggler"class="far fa-eye"></i></span>
              </div>

              <!-- Terms and policy -->
              <div class="terms-policy">
                  By registering, you agree to DataDudu
                  <span id="term">
                      Terms and Privacy Policy.
                  </span>
              </div>

              <!-- Register button -->



              <button id="register-btn" type="button" class="btn btn-primary">Register</button>

          </div>

          <div class="login">Already have an account?
              <a id="login-link" href="/student_login">Login</a>

          </div>


      </div>


      </div>





  </body>

  <script></script>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>

  </html>
