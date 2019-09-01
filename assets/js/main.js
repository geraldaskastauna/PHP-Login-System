$(document)
.on("submit", "form.js-register", function(event) {
	event.preventDefault();

	var _form = $(this);
	var _error = $(".js-error", _form);

	var dataObj = {
		username: $(".username", _form).val(),
		email: $(".email", _form).val(),
		password: $(".password", _form).val()
	};

	if (dataObj.username.length >= 16) {
			_error
			.text("Username is too long. Maximum characters allowed is 16.")
			.show();
		return false;

	}	else if(dataObj.username.length < 4) {
			_error
			.text("Username is too short. Minimum characters allowed is 4.")
			.show();
		return false;

	}	else if (dataObj.email.length < 6) {
			_error
			.text("Please enter a valid email address")
			.show();
		return false;

	} else if (dataObj.password.length < 6) {
		_error
			.text("Please enter a passphrase that is at least 6 characters long.")
			.show();
		return false;
	}

	// Assuming the code gets this far, we can start the ajax process
	_error.hide();

	$.ajax({
		type: 'POST',
		url: '/ajax/register.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		// Whatever data is
		if(data.redirect !== undefined) {
			window.location = data.redirect;
		} else if(data.error !== undefined) {
			_error
				.text(data.error)
				.show();
		}
	})
	.fail(function ajaxFailed(e) {
		// This failed
	})
	.always(function ajaxAlwaysDoThis(data) {
		// Always do
		console.log('Always');
	})

	return false;
})
//
.on("submit", "form.js-login", function(event) {
	event.preventDefault();

	var _form = $(this);
	var _error = $(".js-error", _form);

	var dataObj = {
		email: $(".email", _form).val(),
		password: $(".password", _form).val()
	};

	if(dataObj.email.length < 6) {
		_error
			.text("Please enter a valid email address")
			.show();
		return false;
	} else if (dataObj.password.length < 6) {
		_error
			.text("Please enter a passphrase that is at least 6 characters long.")
			.show();
		return false;
	}

	// Assuming the code gets this far, we can start the ajax process
	_error.hide();

	$.ajax({
		type: 'POST',
		url: '/ajax/login.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		// Whatever data is
		if(data.redirect !== undefined) {
			window.location = data.redirect;
		} else if(data.error !== undefined) {
			_error
				.html(data.error)
				.show();
		}
	})
	.fail(function ajaxFailed(e) {
		// This failed
		console.log(e);
	})
	.always(function ajaxAlwaysDoThis(data) {
		// Always do
		console.log('Always');
	})

	return false;
})
