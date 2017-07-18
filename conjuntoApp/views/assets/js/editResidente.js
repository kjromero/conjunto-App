let  EditResidente =(function(){
   let c = console.log;

   editResidente = function(e)
   {
   	  //e.preventDefault();
   	  let data = {
   	  	 url:'../routes/editResidenteCode.php',
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
          c("error!!!!!!!")
		}
   	  });

       $("form[id=residente]").reset();
   	  
   }

 return {
 	residente : function(e){
    console.log("entramos");
 		editResidente(e);
 	}

 }

}());