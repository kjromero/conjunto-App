let  Vehiculo =(function(){
    let c = console.log;

    postVehiculo = function()
    {
        //e.preventDefault();
        let data = {
            url:'../routes/vehiculoCode.php',
            data: $("form[id=vehiculo]").serialize()
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

        //$("form[id=vehiculo]").reset();
    }

  

    return {
        vehiculo : function(){
                postVehiculo();
        }

    }

}());