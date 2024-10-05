
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



// register.js
function showCountry() {
  const countrySelect = document.getElementById("country");

  // Fetch list of countries from REST API
  fetch("https://restcountries.com/v3.1/all")
      .then(response => {
          if (!response.ok) {
              throw new Error('Network response was not ok');
          }
          return response.json();
      })
      .then(data => {
          // Sort the countries by name
          data.sort((a, b) => a.name.common.localeCompare(b.name.common));
          // Populate the select element with country options
          data.forEach(country => {
              const option = document.createElement("option");
              option.value = country.name.common.toLowerCase();
              option.textContent = country.name.common;
              countrySelect.appendChild(option);
          });
      })
      .catch(error => console.error("Error fetching country data:", error));
}



    document.addEventListener("DOMContentLoaded", function() {
        const countrySelect = document.getElementById("country");

        // Fetch list of countries from REST API
        fetch("https://restcountries.com/v3.1/all")
            .then(response => response.json())
            .then(data => {
                data.sort((a, b) => a.name.common.localeCompare(b.name.common));
                data.forEach(country => {
                    const option = document.createElement("option");
                    option.value = country.name.common.toLowerCase();
                    option.textContent = country.name.common;
                    countrySelect.appendChild(option);
                });
            })
            .catch(error => console.error("Error fetching country data:", error));
    });
    document.addEventListener("DOMContentLoaded", showCountry);
  





