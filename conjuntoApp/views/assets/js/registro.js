let Registro = (function(){
 
 sendData = function()
 {
      let data = 
      {
      	  url:'../routes/registroCode.php',
      	  method:'POST',
      	  data:$("form#registroForm").serialize()
      }
      console.log(data);
 	  $.ajax({
 	  	url: data.url,
 	  	type: data.method, 	
 	  	data: data.data,
 	  	success: function(response) {
 	  	    console.log(response);
 	  	    if (response.estado === "true") {
 	  	        alert('Se registro el usuario en la base de datos');
 	  	    } else {
 	  	        console.log(response);
 	  	        alert('Error al ingresar los datos');
 	  	    }

 	  	    
 	  	}
 	  });
 	  
 	  
 }

 return {
 	registro: function()
 	{
 		sendData();
 	}
 }

}());