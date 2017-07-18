$(document).ready(function() {

    $("#loginForm").bind("submit", function() {
        let data = 
        {
            method : $(this).attr("method"),
            url :'../routes/loginCode.php',
            data : $(this).serialize()
        }
        
        $.ajax({
            type: data.method,
            url: data.url,
            data: data.data,
            beforeSend: function() {
                
                $("#loginForm button[type=submit]").html("enviando...");
                $("#loginForm button[type=submit]").attr("disabled", "disabled");
            },
            success: function(response) {
                console.log(response);
                if (response.estado == "true") {
                    $("body").overhang({
                        type: "success",
                        message: "Usuario encontrado, te estamos redirigiendo...",
                        callback: function() {
                            window.location.href = "../dashboard/usuario.php";
                        }
                    });
                } else {
                    console.log(response);
                    $("body").overhang({
                        type: "error",
                        message: "Usuario o password incorrecto!"
                    });
                }

                $("#loginForm button[type=submit]").html("Ingresar");
                $("#loginForm button[type=submit]").removeAttr("disabled");
            },
            error: function() {
                $("body").overhang({
                    type: "error",
                    message: "Usuario o password incorrecto!"
                });

                $("#loginForm button[type=submit]").html("Ingresar");
                $("#loginForm button[type=submit]").removeAttr("disabled");
            }
        });

        return false;
    });

});