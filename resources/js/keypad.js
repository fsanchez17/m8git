$(function(){
	
	var usados;
	
	function repetido(num) {
	    var repe = false;
	    for (var i=0; i<usados.length; i++) {
	        if (num == usados[i]) {
	            repe = true;
	        }
	    }
	    return repe;
	}


	function aleatorio(min, max) {
	    while (repe != false) {
	        var num = Math.floor(Math.random()*(max-min))+min;
	        var repe = repetido(num);
	    }
	    usados.push(num);
	}
	
	$(this).on('click', 'button.keypad-close',function(e){
		e.stopPropagation();
		$("div.keypad-content").remove();
	});
	
	$(this).on('click', 'button.keypad-erase', function(e){
		e.stopPropagation();
		var str = $("#inputKeypad").val();
		$("#inputKeypad").val(str.substring(0, str.length-1));
	});
	
	$(this).on('click', 'div.keypad-content table td', function(e){
		e.stopPropagation();
		var valor = $(this).html();
		$("#inputKeypad").val($("#inputKeypad").val()+""+valor);
		
	});
	
	
	$("#open-keyboard").click(function(e){
		var pos = $(this).position();
		var sizeHeight = e.pageY;
		var sizeWidth = e.pageX;
		
		console.log(e.pageX+" "+e.pageY);
		
		$("div.keypad-content").remove();
		usados = new Array();
		for (var i = 0; i<10; i++){
			aleatorio(0,10);
		}
		console.log(usados);
		var cont = 0;
		contenedor = $('<div/>',{"class":"keypad-content"});
		button = $('<button />',{
			"class" : "btn btn-danger keypad-close",
			html: "x"
		});
		$(button).css({
			"margin-left" : "43px",
			"padding" : "5px 10px 5px 10px",
			"margin-bottom" : "5px"
			
		});
		
		button2 = $('<button />',{
			"class" : "btn btn-success keypad-erase",
			html: "<"
		});
		$(button2).css({
			
			"padding" : "5px 10px 5px 10px",
			"margin-bottom" : "5px"
			
		});
		
		$(button2).appendTo($(contenedor));
		$(button).appendTo($(contenedor));
		
		tabla = $('<table/>',{"class":""});
		
		
		for(var i = 0; i<3; i++){
			tr = $('<tr/>');
			for(var j = 0; j<3; j++){
				td = $('<td/>', {
					html : usados[cont],
					"class" : "btn btn-primary"
				});
				
				$(td).appendTo($(tr));
				cont++;
			}
			$(tr).appendTo($(tabla));
		}
		tr_fin = $('<tr><td style="margin-left:35px" class="btn btn-primary">'+usados[cont]+'</td></tr>');
		$(tr_fin).appendTo($(tabla));
		$(tabla).appendTo($(contenedor));
		$(contenedor).appendTo('body').fadeIn();
		
		$(contenedor).css({
			"position" : "absolute",
			"top" : pos.top+sizeHeight+25,
			"left" :sizeWidth-120,
			"background-color" : "#DBDBDB",
			"padding" : "10px",
			"border-radius" : "8px"
		})
		
	});
});