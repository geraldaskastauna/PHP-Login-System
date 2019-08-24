$(document)
.on("submit", "form.js-register", function(event) {
  // returns false to keep on the same page
  event.preventDefault();

  // this refers to the entire form
  var _form = $(this);
  var _error = $(".js-error", _form);

  var dataObj = {
    email: $("input[type='email']", _form).val(),  /* Looks only through the form */
    password: $("input[type='password']", _form).val()
  };

  if(dataObj.email.length < 6) {
    _error
          .text("Please enter a valid email address")
          .show();
    return false;
  } else if (dataObj.password.length < 8) {
    _error
          .text("Please enter a password that is atleast 8 characters long.")
          .show();
    return false;
  }

  // Start ajax proccess if we get past register validation
  _error.hide();

  $.ajax({
    type: 'POST',   // Always POST
    url: './ajax/register.php',
    data: dataObj,     // Data object
    dataType: 'json',
    async: true,
  })
  .done(function ajaxDone(data) {
    // Return data
    console.log(data);
    if(data.redirect !== undefined) {
      window.location = data.redirect;
    } else if(data.error !== undefined) {
      _error.text(data.error)
            .show()
    }

    alert(data.name);
  })
  .fail(function ajaxFailed(e){
    // This failed
    console.log(e);
  })
  .always(function ajaxAlwaysDoThis(data){
    // Always do this
    console.log("always");
  })

  return false;
})
