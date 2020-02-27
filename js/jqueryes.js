                // DIALOGO ELIMINAR DATOS 


$(function () {

    $(".ok3").on("click", ".submitquest", function(e){
        e.preventDefault();
        // alert('Si llega');
        var atributo = $(this).attr("href");
        // var atributoUsu = "atributo configurado";
        console.log(atributo);

        $.ajax({
            url: "../ajax_examenes/ajax_principios_de_pruebas.php",
            type: "POST",
            data: {
                'atributo' : atributo
            },
            dataType:'json',
            success: function(result){
                perf.value = result.IdUsu;
            }
        });
    });
        

  function eliminarRegistro(id){
      
        $("#delete").dialog({
            autoOpen: true,
            modal: true,
            buttons: {
            "Aceptar": function () {  
                $.ajax({
                    url: "borrar_json.php",
                    type: "POST",
                    data: {
                        'attdelete' : id
                    },
                    dataType:'json',
                    success: function(result){
                        eval(result);
                        alert('El registro se eliminó correctamente');
                        document.location.href="tabla_datos2.0.php";
                    }
                });
                $(this).dialog("close");
            },
                "Cerrar": function () {
                        $(this).dialog("close");
                }
            }
        });

        $("#delete").dialog("option", "width", 400);
        $("#delete").dialog("open");
    }
 
    $(".tabla").on("click", ".id1", function(e){
        e.preventDefault();
        var attdelete = $(this).attr("href");
        eliminarRegistro(attdelete);
    });


                // DIALOGO ALTA DATOS


    $("#ok").dialog({
        autoOpen: false,
        modal: true
    });

    $("#btn-alta").button().click(function (e){
        e.preventDefault();
        $("#ok").dialog("option", "width", 1100);
        $("#ok").dialog("option", "height", 340);
        $("#ok").dialog("option", "resizable", false);
        $("#ok").dialog("open");
    });


                //  DIALOGO BUSCAR DATOS


    $("#buscar").dialog({
        autoOpen: false,
        modal: true
    });

    $("#btn-buscar").button().click(function (e){
        e.preventDefault();
        $("#buscar").dialog("option", "width", 1100);
        $("#buscar").dialog("option", "height", 340);
        $("#buscar").dialog("option", "resizable", false);
        $("#buscar").dialog("open");
    });


                    // DIALOGO EDITAR DATOS 
    

    $("#ok1").dialog({
        autoOpen: false,
        modal: true,
    });


    $(".tabla").on("click", ".abrir", function(e){
        e.preventDefault();
        var atributo = $(this).attr("href");
        // console.log(atributo);

                    //AJAX PARA TRAER DATOS DEL ID AL DIALOGO DE EDITAR DATOS


        $.ajax({
                url: "editar_json.php",
                type: "POST",
                data: {
                    'atributo' : atributo
                },
                dataType:'json',
                success: function(result){
                    nombre_completo.value = result.Nombre_completo;
                    telefono1.value = result.Telefono1;
                    telefono2.value = result.Telefono2;
                    telefono3.value = result.Telefono3;
                    comentarios.value = result.Comentarios;
                    Respuesta1.value = result.Respuesta1;
                    Respuesta2.value = result.Respuesta2;
                    Respuesta3.value = result.Respuesta3;
                    Folio.value = result.Folio;
                    id_datos.value = result.Id_datos;
                    ok1.value = result.Telefono1;
                    }
        });

        $("#ok1").dialog("option", "width", 1100);
        $("#ok1").dialog("option", "height", 340);
        $("#ok1").dialog("option", "resizable", false);
        $("#ok1").dialog("open");
    });


                    //BUSCAR DATOS

    $("#btn_buscar_dat").button().click(function (e) {
        e.preventDefault();
        
        var element = document.getElementById("tabla");
        while (element.firstChild) {
        element.removeChild(element.firstChild);
        }
        
        var action = $('#form_buscar').attr('action');
        var datos = $('#form_buscar').serialize();

                
                    //AJAX PARA BUSCAR DATOS


        $.ajax({
                url: action,
                type: "POST",
                data: datos,
                dataType:"json",
                success: function(result){  

                var elemento = document.createElement('tr');
                elemento.innerHTML += ("<th>" + "Nombre" + "</th>");
                elemento.innerHTML += ("<th>" + "Tel1" + "</th>");
                elemento.innerHTML += ("<th>" + "Tel2" + "</th>");
                elemento.innerHTML += ("<th>" + "Tel3" + "</th>");
                elemento.innerHTML += ("<th>" + "Comentarios" + "</th>");
                elemento.innerHTML += ("<th>" + "Fecha modificación" + "</th>");
                elemento.innerHTML += ("<th>" + "Resp1" + "</th>");
                elemento.innerHTML += ("<th>" + "Resp2" + "</th>");
                elemento.innerHTML += ("<th>" + "Resp3" + "</th>");
                elemento.innerHTML += ("<th>" + "Id Usuario" + "</th>");
                elemento.innerHTML += ("<th>" + "Folio" + "</th>");
                elemento.innerHTML += ("<th>" + "Opciones" + "</th>");
                document.getElementById('tabla').appendChild(elemento);

                if (Object.keys(result).length === 0) {
                    alert('No se encontraron coincidencias en la base');
                } 

                if (result.sinUsuario) {
                    alert('Ingresa un criterio de busqueda');                    
                }

                for (var i in result) {
                    
                    var fecha_mod = result[i].fecha_modificacion.date;
                    var fecha_mod_slice = fecha_mod.substr(0,19)

                        var elemento = document.createElement('tr');

                        elemento.innerHTML += ("<td>" + result[i].nombre_completo + "</td>");
                        elemento.innerHTML += ("<td>" + result[i].telefono1 + "</td>");
                        elemento.innerHTML += ("<td>" + result[i].telefono2 + "</td>");
                        elemento.innerHTML += ("<td>" + result[i].telefono3 + "</td>");
                        elemento.innerHTML += ("<td>" + result[i].comentarios + "</td>");
                        elemento.innerHTML += ("<td>" + fecha_mod_slice + "</td>");
                        elemento.innerHTML += ("<td>" + result[i].Respuesta1 + "</td>");
                        elemento.innerHTML += ("<td>" + result[i].Respuesta2 + "</td>");
                        elemento.innerHTML += ("<td>" + result[i].Respuesta3 + "</td>");
                        elemento.innerHTML += ("<td>" + result[i].id_usuario + "</td>");
                        elemento.innerHTML += ("<td>" + result[i].Folio + "</td>");
                        elemento.innerHTML += ("<td class='opciones'>" + "<a href='" + result[i].id_datos + "' class='abrir btnn'>Editar</a>" + "</td>");
                        document.getElementById('tabla').appendChild(elemento);
                }

                $('#nom_dat').val('');
                $('#tel1_dat').val('');
                $('#tel2_dat').val('');
                $('#tel2_dat').val('');
                $('#fol_dat').val('');
                $('#idusu_dat').val('');
            }
        });
    });


                    // DIALOGO ELIMINAR USUARIOS


    function eliminarUsuario(id){
        
        $("#delete_usu").dialog({
            autoOpen: true,
            modal: true,
            buttons: {
            "Aceptar": function () {  
                $.ajax({
                    url: "borrar_json.php",
                    type: "POST",
                    data: {
                        'usudelete' : id
                    },
                    dataType:'json',
                    success: function(result){
                        eval(result);
                        alert('El usuario se eliminó correctamente');
                        document.location.href="tabla_usuarios.php";
                    }
                });
                $(this).dialog("close");
            },
                "Cerrar": function () {
                        $(this).dialog("close");
                }
            }
        });

        $("#delete_usu").dialog("option", "width", 400);
        $("#delete_usu").dialog("open");

    }

    $(".tabla").on("click", ".id2", function(e){
        e.preventDefault();
        var usudelete = $(this).attr("href");
        eliminarUsuario(usudelete);
    });    


                    //DIALOGO EDITAR USUARIOS


    $("#ok2").dialog({
        autoOpen: false,
        modal: true,
    });

    $(".tabla").on("click", ".abrir_usu", function(e){
        e.preventDefault();
        var atributoUsu = $(this).attr("href");

        $.ajax({
            url: "editar_usuarios.php",
            type: "POST",
            data: {
                'atributoUsu' : atributoUsu
            },
            dataType:'json',
            success: function(result){
                perf.value = result.IdUsu;
                nombre.value = result.Nom;
                apellido_ma.value = result.Ap_Ma;
                apellido_pa.value = result.Ap_Pa;
                usu.value = result.Usu;
                usuario.value = result.Pass;
                perfil.value = result.Pass;
            }
        });

        $("#ok2").dialog("option", "width", 1100);
        $("#ok2").dialog("option", "height", 340);
        $("#ok2").dialog("option", "resizable", false);
        $("#ok2").dialog("open");
    });

        
                // AJAX PARA TRAER DATOS DEL ID AL DIALOGO DE EDITAR USUARIOS


    $(".tabla").on("click", ".abrir_usu", function(e){
        e.preventDefault();
        var atributoUsu = $(this).attr("href");

        $.ajax({
                url: "editar_json.php",
                type: "POST",
                data: {
                    'atributoUsu' : atributoUsu
                },
                dataType:'json',
                success: function(result){
                    id_usuario.value = result.IdUsu;
                    nombre.value = result.Nom;
                    apellido_ma.value = result.Ap_Ma;
                    apellido_pa.value = result.Ap_Pa;
                    pass.value = result.Pass;
                    usuario.value = result.Usu;
                    perfil.value = result.Perf;
                }
        });

        $("#ok2").dialog("option", "width", 1100);
        $("#ok2").dialog("option", "height", 340);
        $("#ok2").dialog("option", "resizable", false);
        $("#ok2").dialog("open");
    });


                    //BUSCAR USUARIOS

    $(".specific-btn-bsq").button().click(function (e) {
        e.preventDefault();
        
        var element = document.getElementById("tabla");
        while (element.firstChild) {
        element.removeChild(element.firstChild);
        }
        
        var action = $('#form_buscar').attr('action');
        var datos = $('#form_buscar').serialize();

                
                    //AJAX PARA BUSCAR USUARIOS


        $.ajax({
                url: action,
                type: "POST",
                data: datos,
                dataType:"json",
                success: function(result){  

                var elemento = document.createElement('tr');
                elemento.innerHTML += ("<th>" + "Nombre" + "</th>");
                elemento.innerHTML += ("<th>" + "Apellido Materno" + "</th>");
                elemento.innerHTML += ("<th>" + "Apellido Paterno" + "</th>");
                elemento.innerHTML += ("<th>" + "Usuario" + "</th>");
                elemento.innerHTML += ("<th>" + "Password" + "</th>");
                elemento.innerHTML += ("<th>" + "Fecha modificación" + "</th>");
                elemento.innerHTML += ("<th>" + "Fecha de alta" + "</th>");
                elemento.innerHTML += ("<th>" + "Perfil" + "</th>");
                elemento.innerHTML += ("<th>" + "Opciones" + "</th>");
                document.getElementById('tabla').appendChild(elemento);

                if (Object.keys(result).length === 0) {
                    alert('El usuario no se encuentra en la base');
                } 

                if (result.sinUsuario) {
                    alert('Ingresa un criterio de busqueda');                    
                }

                for (var i in result) {
                    
                    var fecha_mod = result[i].fecha_modificacion_pass.date;
                    var fecha_mod_slice = fecha_mod.substr(0,19)

                    var fecha_alta = result[i].fecha_alta.date;
                    var fecha_alta_slice = fecha_alta.substr(0,19)

                        var elemento = document.createElement('tr');
                        elemento.innerHTML += ("<td>" + result[i].nombre + "</td>");
                        elemento.innerHTML += ("<td>" + result[i].apellido_paterno + "</td>");
                        elemento.innerHTML += ("<td>" + result[i].apellido_materno + "</td>");
                        elemento.innerHTML += ("<td>" + result[i].usuario + "</td>");
                        elemento.innerHTML += ("<td>" + result[i].pswd + "</td>");
                        elemento.innerHTML += ("<td>" + fecha_mod_slice + "</td>");
                        elemento.innerHTML += ("<td>" + fecha_alta_slice + "</td>");
                        elemento.innerHTML += ("<td>" + result[i].descripcion + "</td>");
                        elemento.innerHTML += ("<td class='opciones'>" + "<a href='" + result[i].id_usuario + "' class='id2 btnn'>Eliminar</a>" + "<a href='" + result[i].id_usuario + "' class='abrir_usu btnn'>Editar</a>" + "</td>");
                        document.getElementById('tabla').appendChild(elemento);
                }

                $('#nom').val('');
                $('#ap').val('');
                $('#am').val('');
                $('#usu').val('');
                $('#perf').val('');
            }
        });
    });


    // RE-LOGIN PARA DAR DE ALTA UN ADMINISTRADOR


    $("#confirm-admin").dialog({
        autoOpen: false,
        modal: true,
        buttons: {
        "Aceptar": function () {  
            var userConf = usuario_conf.value;
            var pswdConf = pswd_conf.value;

            if (usuario_conf.value == "" || pswd_conf.value == "") {
                alert('Dejaste campos en blanco');
                $('#select_perf').prop('disabled', false);
                $(select_perf).val(""); 
                $(usuario_conf).val(""); 
                $(pswd_conf).val(""); 
            }

            $.ajax({
                url: "check_confirm.php",
                type: "POST",
                data: {
                    'userConf' : userConf,
                    'pswdConf' : pswdConf
                },
                dataType:'json',
                success: function(result){
                    eval(result);

                    if (result.sinRespuesta) {
                        alert('Usuario y/o contraseña incorrectos');
                        $('#select_perf').prop('disabled', false);
                        $(select_perf).val(""); 
                        $(usuario_conf).val(""); 
                        $(pswd_conf).val(""); 
                    }

                    if (result.hayRespuesta) {
                        $(select_marcacion).val('3');
                        $(select_marcacion).prop('disabled', true);
                    }
                    
                }
            });
            $(this).dialog("close");
        },
            "Cerrar": function () {
                $(select_perf).val("");
                $(usuario_conf).val(""); 
                $(pswd_conf).val("");  
                $(this).dialog("close");
                $('#select_perf').prop('disabled', false);
            }
        }
    });

    $('.ui-dialog-titlebar-close').prop('disabled', true);
    $('.ui-dialog-titlebar-close').hide();

    $("#admin_select").button().click(function () {

        $("#confirm-admin").dialog("option", "width", 700);
        $("#confirm-admin").dialog("option", "height", "auto");
        $("#confirm-admin").dialog("option", "resizable", false);
        $("#confirm-admin").dialog("open");

        $("#select_marcacion").val("");

    });


    $("#usu_select").button().click(function () {
        $('#no_apl').prop('disabled', true);
    });

    // BLOQUEO DE SELECT EN TIPO DE USUARIO (MODULO ALTA)


    $("#select_perf").change(function() {
        if($("#select_perf").val() !== "0"){
        $('#select_perf').prop('disabled', true);
        }
    });

    // DESBLOQUEO DE SELECT AL DAR CLICK EN GUARDAR


    $(".alter-btn").button().click(function () {
        $('#select_perf').prop('disabled', false);
    });

    $(".alter-btn").button().click(function () {
        $('#select_marcacion').prop('disabled', false);
    });

    // VALIDACIONES PARA NO INGRESAR ESPACIOS EN FORM OCULTO DE ALTA USUARIOS


    $( "#nom_usu_al" ).change(function() {
        prueba = nom_usu_al.value;
        a1 = prueba.trim();
        if (a1.length == 0) {
            alert('No puedes ingresar solo espacios');
            $(nom_usu_al).val("");
        }
    });

    $( "#ap_usu_al" ).change(function() {
        act = ap_usu_al.value;
        a2 = act.trim();
        if (a2.length == 0) {
            alert('No puedes ingresar solo espacios');
            $(ap_usu_al).val("");
        }
    });

    $( "#am_usu_al" ).change(function() {
        act2 = am_usu_al.value;
        a2 = act2.trim();
        if (a2.length == 0) {
            alert('No puedes ingresar solo espacios');
            $(am_usu_al).val("");
        }
    });

    $( "#pswd_al" ).change(function() {
        act2 = pswd_al.value;
        a2 = act2.trim();
        if (a2.length == 0) {
            alert('No puedes ingresar solo espacios');
            $(pswd_al).val("");
        }
    });

    
    // VALIDACIONES PARA NO INGRESAR ESPACIOS EN FORM OCULTO DE EDITAR USUARIOS


    $( "#nombre" ).change(function() {
        act2 = nombre.value;
        a2 = act2.trim();
        if (a2.length == 0) {
            alert('No puedes ingresar solo espacios');
            console.log(a2);
            $(nombre).val("");
        }
    });

    $( "#apellido_pa" ).change(function() {
        act2 = apellido_pa.value;
        a2 = act2.trim();
        if (a2.length == 0) {
            alert('No puedes ingresar solo espacios');
            console.log(a2);
            $(apellido_pa).val("");
        }
    });
    
    $( "#apellido_ma" ).change(function() {
        act2 = apellido_ma.value;
        a2 = act2.trim();
        if (a2.length == 0) {
            alert('No puedes ingresar solo espacios');
            console.log(a2);
            $(apellido_ma).val("");
        }
    });
    

        // VALIDACIONES PARA NO INGRESAR ESPACIOS EN FORM OCULTO DE ALTA DATOS


        $( "#nom_alt_dat" ).change(function() {
            act2 = nom_alt_dat.value;
            a2 = act2.trim();
            if (a2.length == 0) {
                alert('No puedes ingresar solo espacios');
                $(nom_alt_dat).val("");
            }
        });
 
        function validarEspacios(val,id){
                 a1 = val.trim();
                if (a1.length == 0) {
                    alert('No puedes ingresar solo espacios');
                    $("#"+id+"").val("");
                }
        }

        $("#com_alt_dat").change(function(){
                var comentariosVal = $("#com_alt_dat").val();
                var id ="com_alt_dat";
                validarEspacios(comentariosVal, id);
        });

        // VALIDACIONES PARA NO INGRESAR ESPACIOS EN FORM OCULTO DE EDITAR DATOS
      
        $( "#nombre_completo" ).change(function() {
            act2 = nombre_completo.value;
            a2 = act2.trim();
            if (a2.length == 0) {
                alert('No puedes ingresar solo espacios');
                $(nombre_completo).val("");
            }
        });

        $( "#comentarios" ).change(function() {
            act2 = comentarios.value;
            a2 = act2.trim();
            if (a2.length == 0) {
                alert('No puedes ingresar solo espacios');
                $(comentarios).val("");
            }
        });

        $( "#Folio" ).change(function() {
            act2 = Folio.value;
            a2 = act2.trim();
            if (a2.length == 0) {
                alert('No puedes ingresar solo espacios');
                $(Folio).val("");
            }
        });

            // VALIDACIONES PARA NO INGRESAR ESPACIOS EN FORM OCULTO DE BUSCAR DATOS 

        $( "#nom_dat" ).change(function() {
            act2 = nom_dat.value;
            a2 = act2.trim();
            if (a2.length == 0) {
                alert('No puedes ingresar solo espacios');
                $(nom_dat).val("");
            }
        });

        $( "#fol_dat" ).change(function() {
            act2 = fol_dat.value;
            a2 = act2.trim();
            if (a2.length == 0) {
                alert('No puedes ingresar solo espacios');
                $(fol_dat).val("");
            }
        });
});