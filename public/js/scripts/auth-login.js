$(function() {
	'use strict';
	var isRtl = $('html').attr('data-textdirection') === 'rtl';
	if (AuthService.isAuthenticated())
		window.location.href = AppConfig.DEFAULT_REDIRECT_URL;
	var pageLoginForm = $('.auth-login-form');
	if (pageLoginForm.length) {
		pageLoginForm.validate({

			onkeyup: function(element) {
				$(element).valid();
			},
			onfocusout: function(element) {
				$(element).valid();
			},
			rules: {
				'login-email': {
					required: true,
					email: true
				},
				'login-password': {
					required: true
				}
			},
			submitHandler: function(form) {
				const loginData = {
					email: $(form).find('input[name="login-email"]').val(),
					password: $(form).find('input[name="login-password"]').val()
				};
				$.ajax({
					url: `${AppConfig.API_ENDPOINT}/auth/get_token`,
					type: 'POST',
					contentType: 'application/json',
					data: JSON.stringify(loginData),
					success: function(response) {
						localStorage.setItem(AppConfig.TOKEN_KEY, response.data.token);
						const intendedUrl = localStorage.getItem('intended_url');
						localStorage.removeItem('intended_url'); // Clean up
						window.location.href = intendedUrl || AppConfig.DEFAULT_REDIRECT_URL;
					},
					error: function(jqXHR) {
						let errorMessage = 'An unknown error occurred.';
						if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
							errorMessage = jqXHR.responseJSON.message;
							toastr['error'](errorMessage, jqXHR.responseJSON.errors[0], {
								closeButton: true,
								tapToDismiss: true,
								rtl: isRtl
							});
						} else {
							toastr['error'](errorMessage, 'Error!', {
								closeButton: true,
								tapToDismiss: true,
								rtl: false
							});
						}

					}
				});
			}

		});
	}
});