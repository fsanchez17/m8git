$(function(){
	$("#form-user").submit(function(e){
		e.preventDefault();
		form = $(this);
		$("#password_user").val(hex_sha1($("#password_user").val()));
		$.ajax({
			url : form.attr("action"),
			type : form.attr("method"),
			data: form.serialize(),
			dataType: "json",
			success: function(data){
				if(data['return'] == 1){
					window.location.href = "views/usermod.php";
				}else{
					bootbox.alert("ERROR: DNI o contraseña incorrecta");
				}
			}
		});
	});
});