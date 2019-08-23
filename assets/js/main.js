
$(document)
.on("submit", "form.js-register", function(event) {
  // returns false to keep on the same page
  event.preventDefault();

  // this refers to the entire form
  var _form = $(this);
  var _error = $(".js-error", _form);

  var data = {
    email: $("input[type='email']", _form).val(),  /* Looks only through the form */
    password: $("input[type='password']", _form).val()
  };

  if(data.email.length < 6) {
    _error
          .text("Please enter a valid email address")
          .show();
    return false;
  } else if (data.password.length < 8) {
    _error
          .text("Please enter a password that is atleast 8 characters long.")
          .show();
    return false;
  }

  // Start ajax proccess if we get past register validation
  _error.hide();

  return false;
})
