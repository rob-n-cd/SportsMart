document.getElementById('username').addEventListener('input', function () {
  let username = this.value;
  if (username.length > 0) {
    fetch('validate.php?username=' + username)
      .then(res => res.text())
      .then(data => {
        document.getElementById('userError').textContent = data;
      });
  } else {
    document.getElementById('userError').textContent = "";
  }
});

document.getElementById('password').addEventListener('input', function () {
  let password = this.value;
  let username = document.getElementById('username').value;
  if (password.length > 0 && username.length > 0) {
    fetch('validate.php?username=' + username + '&password=' + password)
      .then(res => res.text())
      .then(data => {
        document.getElementById('passError').textContent = data;
      });
  } else {
    document.getElementById('passError').textContent = "";
  }
});

// Optional: prevent real submit
document.getElementById('loginForm').addEventListener('submit', function(e) {
  e.preventDefault(); // Remove if you want to allow real login
});
