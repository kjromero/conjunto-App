let  AsignarParking =(function(){
   let c = console.log;

   asignarParking = function(e)
   {
   	  //e.preventDefault();
   	  let data = {
   	  	 url:'../routes/asignarCode.php',
   	  	 data: $("form[id=residente]").serialize()
   	  };

   	  c('xx', data);
   	 $.ajax({
   	  	url: data.url,
   	  	type: "POST",
   	  	data: data.data,
   	  	success:function(response){
   	  		c(response);

          window.location.href = "../dashboard/pagos.php";


   	  		if(response.estado === "true")
   	  		{
                c(response.data);
                window.location.href = "../dashboard/pagos.php";
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
 	asignar : function(e){
    // console.log("entramos");
 		asignarParking(e);
 	}

 }

}());