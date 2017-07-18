let  EditVehiculo =(function(){
    let c = console.log;

    editVehiculo = function()
    {
        //e.preventDefault();
        let data = {
            url:'../routes/editVehiculoCode.php',
            data: $("form[id=vehiculo]").serialize()
        };

        c('xx', data);
        $.ajax({
            url: data.url,
            type: "POST",
            data: data.data,
            success:function(response){
                c(response);

                
                     window.location.href = "../../dashboard/listUsuarios.php";

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
                editVehiculo();
        }

    }

}());