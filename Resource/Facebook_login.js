Facebook login

Required 

1.) Facebook App ID		//	geting from :: https://developers.facebook.com/apps/

//	https://developers.facebook.com/docs/facebook-login/web
2.) Check current status check 
<script>

FB.getLoginStatus(function(response) {
	statusChangeCallback(response);
});

function statusChangeCallback(response) {
	if (response.status === 'connected') {
		testAPI();
	} else if (response.status === 'not_authorized') {
		document.getElementById('status').innerHTML = 'Please log ' + 'into this app.';
	} else {
		document.getElementById('status').innerHTML = 'Please log ' + 'into Facebook.';
	}
}

function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      	console.log('Successful login for: ' + response.name);
      	document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.name + '!';
    });
}
</script>

'https://www.facebook.com/dialog/oauth/?client_id=fb_api_id
&redirect_uri=login_view_base_url+'login/after_facebook_login'
&state=true
&scope=emails'