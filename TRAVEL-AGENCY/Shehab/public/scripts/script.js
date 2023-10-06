//arrow function
// Registration
const registrationValidator = () => {
  const username = document.querySelector('#username').value;
  const email = document.querySelector('#email').value;
  const password = document.querySelector('#password').value;
  const gender = document.querySelector('#gender').value;
  const birthday = document.querySelector('#birthday').value;
  const address = document.querySelector('#address').value;
  const contact = document.querySelector('#contact').value;
  const pattern =
    /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/;
  const request = {};

  if (
    username.length === 0 ||
    email.length === 0 ||
    password.length === 0 ||
    gender.length === 0 ||
    birthday.length === 0 ||
    address.length === 0 ||
    contact.length === 0
  ) {
    modal.style.display = 'block';
    document.querySelector('.modal-content-paragraph').textContent =
      'Fill up all the input field';
  } else if (!pattern.test(email)) {
    modal.style.display = 'block';
    document.querySelector('.modal-content-paragraph').textContent =
      'Invalid email';
  } else if (password.length < 8) {
    modal.style.display = 'block';
    document.querySelector('.modal-content-paragraph').textContent =
      'Weak password';
  } else {
    request['username'] = username;
    request['email'] = email;
    request['password'] = password;
    request['gender'] = gender;
    request['birthday'] = birthday;
    request['address'] = address;
    request['contact'] = contact;

    // ajax request
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        modal.style.display = 'block';
        document.querySelector('.modal-content-paragraph').textContent =
          'User Inserted Successfully';
        document.querySelector('#username').value = '';
        document.querySelector('#email').value = '';
        document.querySelector('#password').value = '';
        document.querySelector('#gender').value = '';
        document.querySelector('#birthday').value = '';
        document.querySelector('#address').value = '';
        document.querySelector('#contact').value = '';
      } else {
        modal.style.display = 'block';
        document.querySelector('.modal-content-paragraph').textContent =
          'Unable to insert user';
      }
    };
    const theUrl = '../controls/registration-controls.php';
    xhr.open('POST', theUrl, true);
    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
    xhr.send(JSON.stringify(request));
  }
};

//Login
const loginValidator = () => {
  const email = document.querySelector('#email').value;
  const password = document.querySelector('#password').value;
  const pattern =
    /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/;
  const request = {};
  if (email.length === 0 || password.length === 0) {
    modal.style.display = 'block';
    document.querySelector('.modal-content-paragraph').textContent =
      'Fill up all the input field';
  } else if (!pattern.test(email)) {
    modal.style.display = 'block';
    document.querySelector('.modal-content-paragraph').textContent =
      'Invalid email';
  } else {
    request['email'] = email;
    request['password'] = password;

    // ajax request
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        //console.log(this.responseText);
        if (this.responseText != false) {
          const d = new Date();
          d.setTime(d.getTime() + 1 * 24 * 60 * 60 * 1000);
          let expires = 'expires=' + d.toUTCString();
          document.cookie = `signed-in = ${this.responseText}; ${expires}`;
          window.location.href = 'dashboard.php';
        } else {
          modal.style.display = 'block';
          document.querySelector('.modal-content-paragraph').textContent =
            "User doesn't exist";
        }
      }
    };
    const theUrl = '../controls/login-controls.php';
    xhr.open('POST', theUrl, true);
    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
    xhr.send(JSON.stringify(request));
  }
};
