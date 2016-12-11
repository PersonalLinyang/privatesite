$(function(){

	$("#login_form").submit(function() {
		var login_id = $('#login_id').val();
		var login_pw = $('#login_pw').val();
		if(!login_id) {
			$("#error_message").text("ログインIDを入力してください");
			return false;
		} else if(!login_pw) {
			$("#error_message").text("パスワードを入力してください");
			return false;
		} else {
			this.submit();
		}
	});

});