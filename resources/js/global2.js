$(function(){
	$.ajax({
		url: "../controllers/getInfoUser.php",
		dataType : "json",
		success : function(data) {
			$("#nombre").val(data['nombre']);
			$("#apellidos").val(data['apellidos']);
			$("#email").val(data['email']);
			$("#telefono").val(data['telefono']);
		}
	});
	var aux = [true, true, true, true];
	
	/*$("#guardar").click(function(e){
		e.stopPropagation();
		$("#mod_user_form").submit();
	});*/
	
	
	
	$("#nombre").blur(function(){
		if($("#nombre").val()==""){
			$("#nombre").css({
				'border-color' : 'red'
			});
			aux[0]=false;
		}else{
			$("#nombre").css({
				'border-color' : '#CCCCCC'
			});
			aux[0]=true;
		}
	});
	$("#apellidos").blur(function(){
		if($("#apellidos").val()==""){
			$("#apellidos").css({
				'border-color' : 'red'
			});
			aux[1]=false;
		}else{
			$("#apellidos").css({
				'border-color' : '#CCCCCC'
			});
			aux[1]=true;
		}
	});
	
	
	$("#email").blur(function(){
		if($("#email").val()==""){
			$("#email").css({
				'border-color' : 'red'
			});
			aux[2]=false;
		}else{
			$("#email").css({
				'border-color' : '#CCCCCC'
			});
			aux[2]=true;
		}
	});
	
	
	$("#telefono").blur(function(){
		if($("#telefono").val()==""){
			$("#telefono").css({
				'border-color' : 'red'
			});
			aux[3]=false;
		}else{
			$("#telefono").css({
				'border-color' : '#CCCCCC'
			});
			aux[3]=true;
		}
	});
	
	$('#nombre, #apellidos, #email, #telefono').blur(function(){
		if(jQuery.inArray(false, aux)==-1){
			$("#guardar").attr("disabled", false);
		}else{
			$("#guardar").attr("disabled", true);
		}
	});
	var aux2 = [true, true, true, true, true];
	
	
	
	$("#password_new").blur(function(){
		if($("#password_new").val()!=""){
			
			if($("#password_new").val().length < 8){
			
				aux2[0]=false;
			}else{
				
				aux2[0]=true;
			}
			
			if (!/[0-9]/.test($("#password_new").val())){
				
				aux2[1]=false;
			}else{
				
				aux2[1]=true;
			}
			
			if (!/[A-Z]/.test($("#password_new").val())){
			
				aux2[2]=false;
			}else{
				
				aux2[2]=true;
			}
			if(!/[a-z]/.test($("#password_new").val())){
				
				aux2[3]=false;
			}else{
				
				aux2[3]=true;
			}
			console.log(aux2);
		}else{
			aux2[0]=true;
			aux2[1]=true;
			aux2[2]=true;
			aux2[3]=true;
			aux2[4]=true;
		}
	});
	
	$('#password_new2').blur(function(){
		if($("#password_new").val()!=$("#password_new2").val()){
			$("#password_new2").css({
				'border-color' : 'red'
			});
			$("#guardar").attr("disabled", true);
		}else{
			$("#password_new2").css({
				'border-color' : '#CCC'
			});
			$("#guardar").attr("disabled", false);
		}
	});
	
	$('#password_new').blur(function(){
		if(jQuery.inArray(false, aux2)==-1){
			$("#guardar").attr("disabled", false);
			$("#password_new").css({
				'border-color' : '#CCC'
			});
		}else{
			$("#guardar").attr("disabled", true);
			$("#password_new").css({
				'border-color' : 'red'
			});
			
		}
		console.log(jQuery.inArray(false, aux2));
	});
	
	$("#mod_user_form").submit(function(e){
		e.preventDefault();
		e.stopPropagation();
		form= $(this);
		if($("#password_old").val()!=""){
			$("#password_old").val(hex_sha1($("#password_old").val()));
		}
		if($("#password_new").val()!=""){
			$("#password_new").val(hex_sha1($("#password_new").val()));
			$("#password_new2").val(hex_sha1($("#password_new2").val()));
		}
		$.ajax({
			url: form.attr("action"),
			type: form.attr("method"),
			dataType: "json",
			data: form.serialize(),
			success: function(data){
				//console.log(data);
				bootbox.alert(data['msg']);
				$("#password_old").val("");
				$("#password_new").val("");
				$("#password_new2").val("");
			}
		});
	});
});