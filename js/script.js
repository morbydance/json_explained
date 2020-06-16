$(document).ready(function () {
  // Message btn event listener
  $('.message-btn').click(function () {
    const dataStr = $('.message-dataStr').val();
    const dataInt = $('.message-dataInt').val();

    $.post('php/message.php', { dataStr, dataInt }, function (res) {
      const resJson = JSON.parse(res);
      if (resJson.error) {
        // Van hiba
        alert(resJson.msg);
      } else {
        // Nincs hiba
      }

      console.log(resJson);
    });
  });

  // Data btn event listener
  $('.data-btn').click(function () {
    const dataStr = $('.data-dataStr').val();

    $.post('php/data.php', { dataStr }, function (res) {
      const resJson = JSON.parse(res);
      if (resJson.error) {
        // Van hiba
      } else {
        alert(`${resJson.msg}\n${resJson.data}`);
        // Nincs hiba
      }

      console.log(resJson);
    });
  });

  // Array btn event listener
  $('.array-btn').click(function () {
    $.post('php/array.php', {}, function (res) {
      const resJson = JSON.parse(res);
      if (resJson.error) {
        // Van hiba
      } else {
        alert(`${resJson.msg}\n${resJson.data}`);
        // Nincs hiba
      }

      console.log(resJson);
    });
  });

  // Object btn event listener
  $('.object-btn').click(function () {
    $.post('php/object.php', {}, function (res) {
      const resJson = JSON.parse(res);

      alert(`${resJson.msg}\n${resJson.data}`);

      console.log(resJson);
    });
  });

  // Object-array btn event listener
  $('.object-array-btn').click(function () {
    $.post('php/object-array.php', {}, function (res) {
      const resJson = JSON.parse(res);

      // Példa az asszociatív tömb használatára
      alert(
        `A 29-es azonosítójú felhasználó neve\n${resJson.dataAssoc[29].username}`
      );

      console.log(resJson);
    });
  });

  // Type btn event listener
  $('.type-btn').click(function () {
    const unameInput = $('.type-username')[0];
    const uname = $('.type-username').val();
    const pwdInput = $('.type-password')[0];
    const pwd = $('.type-password').val();
    $.post('php/error-type.php', { uname, pwd }, function (res) {
      const resJson = JSON.parse(res);
      if (resJson.error) {
        if (resJson.errType === 'uname') {
          unameInput.setCustomValidity(resJson.msg);
          pwdInput.setCustomValidity('');
        } else if (resJson.errType === 'pwd') {
          unameInput.setCustomValidity('');
          pwdInput.setCustomValidity(resJson.msg);
        }
      } else {
        unameInput.setCustomValidity('');
        pwdInput.setCustomValidity('');
      }
      console.log(resJson);
    });
  });
});
