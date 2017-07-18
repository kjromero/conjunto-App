let  Residente =(function(){
   let c = console.log;

   postResidente = function(e)
   {
   	  //e.preventDefault();
   	  let data = {
   	  	 url:'../routes/residenteCode.php',
   	  	 data: $("form[id=residente]").serialize()
   	  };

   	  c('xx', data);
   	 $.ajax({
   	  	url: data.url,
   	  	type: "POST",
   	  	data: data.data,
   	  	success:function(response){
   	  		c(response);

   	  		if(response.estado === "true")
   	  		{
                c(response.data);
                location.reload();
   	  		}else{
                c(response);
   	  		}

   	  	},
		error:function(xhr, ajaxOptions, thrownError){
   	  		c(xhr);
   	  		c(ajaxOptions);
   	  		c(thrownError);
		}
   	  });

       $("form[id=residente]").reset();
   	  
   }

 return {
 	residente : function(e){
 		postResidente(e);
 	}

 }

}());