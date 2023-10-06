// Load all data
const userID = parseInt(document.cookie.split(';')[0].split('=')[1]);
$.ajax({
  type: 'POST',
  url: '../controls/get-manager-info.php',
  dataType: 'json',
  contentType: 'application/json',
  data: JSON.stringify({ userID }),
  success: function (result) {
    //console.log(result);
    document.querySelector('#username').value = result.username;
    document.querySelector('#email').value = result.email;
    document.querySelector('#password').value = result.password;
    document.querySelector('#gender').value = result.gender;
    document.querySelector('#birthday').value = result.birthday;
    document.querySelector('#address').value = result.address;
    document.querySelector('#contact').value = result.contact;
  },
});

const updateManager = () => {
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
    request['id'] = userID;
    request['username'] = username;
    request['email'] = email;
    request['password'] = password;
    request['gender'] = gender;
    request['birthday'] = birthday;
    request['address'] = address;
    request['contact'] = contact;
    //console.log(request);
    $.ajax({
      type: 'POST',
      url: '../controls/update-manager.php',
      dataType: 'json',
      contentType: 'application/json',
      data: JSON.stringify({ request }),
      success: function (response) {
        console.log();
        if (response.response == 'success') {
          modal.style.display = 'block';
          document.querySelector('.modal-content-paragraph').textContent =
            'Successfully updated user';
        }
      },
    });
  }
};

// const loadAllUser = () => {
//   $.ajax({
//     url: '../controls/get-manager-info.php',
//     type: 'GET',
//     dataType: 'json',
//     success: (response) => {
//       console.log(response);
//     },
//   });
// };

// Delete manager -- ajax using jquery
const deleteManager = () => {
  const userID = parseInt(document.cookie.split(';')[0].split('=')[1]);
  $.ajax({
    type: 'POST',
    url: '../controls/delete-manager.php',
    dataType: 'json',
    contentType: 'application/json',
    data: JSON.stringify({ userID }),
    success: function (result) {
      if (result != true) {
        modal.style.display = 'block';
        document.querySelector('.modal-content-paragraph').textContent =
          'Unable to delete the account';
      } else {
        window.location.href = 'logout.php';
      }
    },
  });
};
