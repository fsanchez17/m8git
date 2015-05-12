$(function(){
	var randNum=0;
	var lista=new Array();
	var keypad_correct = false;
	var input_correct = false;
	
	function correctLogin(){
		if(keypad_correct){
			if(jQuery.inArray($("#input-dni").val(), lista) != -1){
				correct = true;
				dni = $("#input-dni").val();
				 $.ajax({
				      type: "POST",
				      url: "controllers/permitLogin.php",
				      data: {
				    	  correct : correct,
				    	  dni : dni
				      },
				      success: function(data){}
				   });
				
				window.location.href = "views/usermod.php";
			}
			
		}
	}
	
	$.ajax({
		url: "controllers/randomNum.php",
		dataType: "json",
		success: function(data){
			randNum=data[0];
		}
	});
	
	$(this).on('click', 'div.keypad-content table td', function(e){
		if($("#inputKeypad").val() == randNum && randNum != 0){
			//alert("Correcto");
			keypad_correct = true;
			correctLogin();
		}
	});
	
	$.ajax({
		url: "controllers/getDNIs.php",
		dataType : "json",
		success : function(data) {
			console.log(data);
			lista = data;
			$("#input-dni").typeahead({ source:lista });
		}
	});
	
	
	$("#input-dni").click(function(){
		$.ajax({
			url: "controllers/getDNIs.php",
			dataType : "json",
			success : function(data) {
				lista = data;
				$("#input-dni").typeahead({ source:lista });
			}
		});
		//correctLogin();
	});
	
	$("#input-dni").blur(function(){
		correctLogin();
	});
	
	$("#logout").click(function(e){
		a = $(this);
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: "../controllers/logout.php",
			data : {
				salir : true
			},
			success: function(data){window.location.href = $(a).attr('href')}
		});
	});
	
	
	
});