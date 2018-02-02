$.fn.reset = function () {
    $(this).each (function() { this.reset(); });
}

function decision(message, url){
    if(confirm(message)) location.href = url;
}
function confirmSubmit(form, message) { 
    var agree=confirm(message); 
    if (agree) {
        form.submit();
        return false; //de todas formas el link no se ejecutara
    } else {
        return false;
    } 
}

toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: false,
    progressBar: false,
    positionClass: "toast-top-right",
    preventDuplicates: true,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut"
}

jQuery('.datepicker').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: "dd/mm/yyyy"
});

var tablaData = $('#datatable').DataTable({
    "language": {
        "lengthMenu": "Mostrar _MENU_ resultados por página",
        "zeroRecords": "Sin resultados",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "Sin ninguna información",
        "infoFiltered": "(Filtrado de _MAX_ resultados totales)",
        "search":         "Buscar:",
        "paginate": {
            "first":      "Primero",
            "last":       "Último",
            "next":       "Siguiente",
            "previous":   "Anterior"
        },
    }, 
    "order": [[ 0, "desc" ]]
});

$('.tooltip-error').click(function (e) {
    e.preventDefault();
    var message = "¿Está realmente seguro(a) de eliminar este registro?";
    var id = $(this).data('id');
    var form = $('#form-delete');
    var action = form.attr('action').replace('USER_ID', id);
    var rowss =  $(this).parents('tr');
    swal({
        title: message,
        type: "warning",
        showCancelButton: true,
        cancelButtonClass: 'btn-secondary waves-effect',
        confirmButtonClass: 'btn-warning',
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: true
    }, function () {
        row.fadeOut(1000);
        $.post(action, form.serialize(), function(result) {
            if (result.success) {
                tablaData.row(rowss).remove().draw();
                    //swal("¡Eliminado!", result.msg, "success");
                    toastr["success"](result.msg);              
                } 
                //else 
                    //row.show();
                }, 'json');
    });
});

$("form#loginForm").validate({
    rules: {
        username: {
            required: true
        },
        password: {
            required: true
        }
    },
    messages: {
        username: {
            required: 'Ingrese un usuario'
        },
        password: {
            required: 'Ingrese una contraseña'
        }
    },
    invalidHandler: function (event, validator) { 
        $('.alert-error', $('.login-form')).show();
    },

    highlight: function (e) {
        $(e).closest('.form-group').removeClass('has-info').addClass('has-danger');
    },

    success: function (e) {
        $(e).closest('.form-group').removeClass('has-danger').addClass('has-success');
        $(e).remove();
    },
    errorPlacement: function (error, element) {
        if(element.is(':checkbox') || element.is(':radio')) {
            var controls = element.closest('.controls');
            if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
            else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
        }
        else if(element.is('.select2')) {
            error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
        }
        else if(element.is('.chzn-select')) {
            error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
        }
        else error.insertAfter(element);
    },
    submitHandler: function () {
        var accion = '';
        var cargando = '<img src="assets/images/loading.gif" />';
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#loginForm")[0]);
        $.ajax({
            url:  $("form#loginForm").attr('action'),
            type: $("form#loginForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $('div#respuesta').html(cargando);
                $('.btn-block').attr('disabled', true);
            },
            success:function(respuesta){
                if(respuesta.message == "error") {
                    var mensaje = 'Usuario o contraseña incorrectos';
                    toastr["error"](mensaje);
                    $('.btn-block').attr('disabled', false);
                    $('div#respuesta').empty();
                }
                else {
                    window.location = 'http://'+window.location.host+"/siaho";
                }
            }
        })            
        return false;
    }
});

$("form#usuarioForm").validate({
    rules: {
        name: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        username: {
            required: true
        },
        password: {
            required: true
        },
        password_confirmation: {
            required: true,
            equalTo: "#password"
        },
        rol: {
            required: true
        },
        cedula: {
            required: true
        }
    },
    messages: {
        name: {
            required: 'Ingrese nombre y apellido'
        },
        username: {
            required: 'Ingrese un nombre de usuario'
        },
        email: {
            required: 'Ingrese un email',
            email: 'Ingrese un email válido'
        },
        password: {
            required: 'Ingrese una contraseña'
        },
        password_confirmation: {
            required: 'Repita la contraseña',
            equalTo: 'Las contraseñas deben de ser iguales'
        },
        rol: {
            required: 'Seleccione un rol'
        },
        cedula: {
            required: 'Ingrese un número de cédula'
        }
    },
    invalidHandler: function (event, validator) { 
        $('.alert-error', $('.login-form')).show();
    },

    highlight: function (e) {
        $(e).closest('.form-group').removeClass('has-info').addClass('has-danger');
    },

    success: function (e) {
        $(e).closest('.form-group').removeClass('has-danger').addClass('has-success');
        $(e).remove();
    },
    errorPlacement: function (error, element) {
        if(element.is(':checkbox') || element.is(':radio')) {
            var controls = element.closest('.controls');
            if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
            else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
        }
        else if(element.is('.select2')) {
            error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
        }
        else if(element.is('.chzn-select')) {
            error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
        }
        else error.insertAfter(element);
    },
    submitHandler: function () {
        var accion = '';
        if($("button#usuarioSubmit").attr('data') == 1)
            accion = 'agregado';
        else if($("button#usuarioSubmit").attr('data') == 0)
            accion = 'actualizado';
        var alertMessage = 'Usuario '+accion+' satisfactoriamente';
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#usuarioForm")[0]);
        $.ajax({
            url:  $("form#usuarioForm").attr('action'),
            type: $("form#usuarioForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#usuarioSubmit").addClass('disabled');
                $("button#cancelar").addClass('disabled');
            },
            success:function(respuesta){
                swal("¡Registrado!", alertMessage, "success");
                if($("button#usuarioSubmit").attr('data') == 1) {
                    $('form#usuarioForm').reset();
                    $('.form-group').removeClass('has-success');
                }
                $("button#usuarioSubmit").removeClass('disabled');
                $("button#cancelar").removeClass('disabled');
            }
        })
        return false;
    }
});

$("form#usuarioEditarForm").validate({
    rules: {
        name: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        username: {
            required: true
        },
        password: {
            required: false
        },
        password_confirmation: {
            required: false,
            equalTo: "#password"
        },
        rol: {
            required: true
        },
        cedula: {
            required:true
        }
    },
    messages: {
        name: {
            required: 'Ingrese nombre y apellido'
        },
        username: {
            required: 'Ingrese un nombre de usuario'
        },
        email: {
            required: 'Ingrese un email',
            email: 'Ingrese un email válido'
        },
        password: {
            required: 'Ingrese una contraseña'
        },
        password_confirmation: {
            required: 'Repita la contraseña',
            equalTo: 'Las contraseñas deben de ser iguales'
        },
        rol: {
            required: 'Seleccione un rol'
        },
        cedula:{
            required: 'Ingrese un número de cédula'
        }
    },
    invalidHandler: function (event, validator) { 
        $('.alert-error', $('.login-form')).show();
    },

    highlight: function (e) {
        $(e).closest('.form-group').removeClass('has-info').addClass('has-danger');
    },

    success: function (e) {
        $(e).closest('.form-group').removeClass('has-danger').addClass('has-success');
        $(e).remove();
    },
    errorPlacement: function (error, element) {
        if(element.is(':checkbox') || element.is(':radio')) {
            var controls = element.closest('.controls');
            if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
            else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
        }
        else if(element.is('.select2')) {
            error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
        }
        else if(element.is('.chzn-select')) {
            error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
        }
        else error.insertAfter(element);
    },
    submitHandler: function () {
        var accion = '';
        if($("button#usuarioEditarSubmit").attr('data') == 1)
            accion = 'agregado';
        else if($("button#usuarioEditarSubmit").attr('data') == 0)
            accion = 'actualizado';
        var alertMessage = 'Usuario '+accion+' satisfactoriamente';
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#usuarioEditarForm")[0]);
        $.ajax({
            url:  $("form#usuarioEditarForm").attr('action'),
            type: $("form#usuarioEditarForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#usuarioEditarSubmit").addClass('disabled');
                $("button#cancelar").addClass('disabled');
            },
            success:function(respuesta){
                swal("¡Registrado!", alertMessage, "success");
                if($("button#usuarioEditarSubmit").attr('data') == 1)
                {
                    $('form#usuarioEditarForm').reset();
                    $('.form-group').removeClass('has-success');
                }
                $("button#usuarioEditarSubmit").removeClass('disabled');
                $("button#cancelar").removeClass('disabled');
            }
        })
        return false;
    }
});

$("form#trabajadorForm").validate({
    rules: {
        nombre: {
            required: true
        },
        apellido: {
            required: true
        },
        cedula: {
            required: true, 
            number: true
        },
        cargo: {
            required: true
        },
        departamento: {
            required: true
        }
    },
    messages: {
        nombre: {
            required: 'Ingrese un nombre'
        },
        apellido: {
            required: 'Ingrese un apellido'
        }, 
        cedula: {
            required: 'Ingrese una cédula', 
            number: 'Ingrese solo números'
        },
        cargo: {
            required: 'Ingrese un cargo'
        },
        departamento: {
            required: 'Seleccione un departamento'
        }
    },
    invalidHandler: function (event, validator) { 
        $('.alert-error', $('.login-form')).show();
    },

    highlight: function (e) {
        $(e).closest('.form-group').removeClass('has-info').addClass('has-danger');
    },

    success: function (e) {
        $(e).closest('.form-group').removeClass('has-danger').addClass('has-success');
        $(e).remove();
    },
    errorPlacement: function (error, element) {
        if(element.is(':checkbox') || element.is(':radio')) {
            var controls = element.closest('.controls');
            if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
            else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
        }
        else if(element.is('.select2')) {
            error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
        }
        else if(element.is('.chzn-select')) {
            error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
        }
        else error.insertAfter(element);
    },
    submitHandler: function () {
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#trabajadorForm")[0]);
        $.ajax({
            url:  $("form#trabajadorForm").attr('action'),
            type: $("form#trabajadorForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#trabajadorSubmit").addClass('disabled');
                $("button#cancelar").addClass('disabled');
            },
            success:function(response){
                var accion = '';
                var alertMessage = '';
                var count = 0;

                if(response.validations == false){
                    //alertMessage = "<b>Campos únicos:</b> <br>";
                    $.each(response.errors, function(index, value){
                        count++;
                        alertMessage+= count+". "+value+"<br>";
                    });
                    toastr["warning"](alertMessage);
                }
                else if(response.validations == true){
                    if($("button#trabajadorSubmit").attr('data') == 1)
                        accion = 'registrado';
                    else if($("button#trabajadorSubmit").attr('data') == 0)
                        accion = 'actualizado';
                    var alertMessage = 'Trabajador '+accion+'';
                    toastr["success"](alertMessage);
                    if($("button#trabajadorSubmit").attr('data') == 1) {
                        $('form#trabajadorForm').reset();
                        $('.form-group').removeClass('has-success');
                    }
                }             
                $("button#trabajadorSubmit").removeClass('disabled');
                $("button#cancelar").removeClass('disabled');
            }
        })
        return false;
    }
});

$("form#cursoForm").validate({
    rules: {
        nombre: {
            required: true
        },
        trabajador: {
            required: true
        },
        horas: {
            required: true, 
            number: true
        }
    },
    messages: {
        nombre: {
            required: 'Ingrese un nombre'
        },
        trabajador: {
            required: 'Seleccione un trabajador'
        }, 
        horas: {
            required: 'Ingrese las horas', 
            number: 'Ingrese solo números'
        }
    },
    invalidHandler: function (event, validator) { 
        $('.alert-error', $('.login-form')).show();
    },

    highlight: function (e) {
        $(e).closest('.form-group').removeClass('has-info').addClass('has-danger');
    },

    success: function (e) {
        $(e).closest('.form-group').removeClass('has-danger').addClass('has-success');
        $(e).remove();
    },
    errorPlacement: function (error, element) {
        if(element.is(':checkbox') || element.is(':radio')) {
            var controls = element.closest('.controls');
            if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
            else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
        }
        else if(element.is('.select2')) {
            error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
        }
        else if(element.is('.chzn-select')) {
            error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
        }
        else error.insertAfter(element);
    },
    submitHandler: function () {
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#cursoForm")[0]);
        $.ajax({
            url:  $("form#cursoForm").attr('action'),
            type: $("form#cursoForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#cursoSubmit").addClass('disabled');
                $("button#cancelar").addClass('disabled');
            },
            success:function(response){
                var accion = '';
                var alertMessage = '';
                var count = 0;

                if(response.validations == false){
                    //alertMessage = "<b>Campos únicos:</b> <br>";
                    $.each(response.errors, function(index, value){
                        count++;
                        alertMessage+= count+". "+value+"<br>";
                    });
                    toastr["warning"](alertMessage);
                }
                else if(response.validations == true){
                    if($("button#cursoSubmit").attr('data') == 1)
                        accion = 'registrado';
                    else if($("button#cursoSubmit").attr('data') == 0)
                        accion = 'actualizado';
                    var alertMessage = 'Curso '+accion+'';
                    toastr["success"](alertMessage);
                    if($("button#cursoSubmit").attr('data') == 1) {
                        $('form#cursoForm').reset();
                        $('.form-group').removeClass('has-success');
                    }
                }             
                $("button#cursoSubmit").removeClass('disabled');
                $("button#cancelar").removeClass('disabled');
            }
        })
        return false;
    }
});

$("form#delegadoForm").validate({
    rules: {
        fecha: {
            required: true
        },
        trabajador: {
            required: true
        },
        tipo: {
            required: true
        }
    },
    messages: {
        fecha: {
            required: 'Ingrese una fecha'
        },
        trabajador: {
            required: 'Seleccione un trabajador'
        }, 
        tipo: {
            required: 'Ingrese el tipo de delegado'
        }
    },
    invalidHandler: function (event, validator) { 
        $('.alert-error', $('.login-form')).show();
    },

    highlight: function (e) {
        $(e).closest('.form-group').removeClass('has-info').addClass('has-danger');
    },

    success: function (e) {
        $(e).closest('.form-group').removeClass('has-danger').addClass('has-success');
        $(e).remove();
    },
    errorPlacement: function (error, element) {
        if(element.is(':checkbox') || element.is(':radio')) {
            var controls = element.closest('.controls');
            if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
            else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
        }
        else if(element.is('.select2')) {
            error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
        }
        else if(element.is('.chzn-select')) {
            error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
        }
        else error.insertAfter(element);
    },
    submitHandler: function () {
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#delegadoForm")[0]);
        $.ajax({
            url:  $("form#delegadoForm").attr('action'),
            type: $("form#delegadoForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#delegadoSubmit").addClass('disabled');
                $("button#cancelar").addClass('disabled');
            },
            success:function(response){
                var accion = '';
                var alertMessage = '';
                var count = 0;

                if(response.validations == false){
                    //alertMessage = "<b>Campos únicos:</b> <br>";
                    $.each(response.errors, function(index, value){
                        count++;
                        alertMessage+= count+". "+value+"<br>";
                    });
                    toastr["warning"](alertMessage);
                }
                else if(response.validations == true){
                    if($("button#delegadoSubmit").attr('data') == 1)
                        accion = 'registrado';
                    else if($("button#delegadoSubmit").attr('data') == 0)
                        accion = 'actualizado';
                    var alertMessage = 'Delegado '+accion+'';
                    toastr["success"](alertMessage);
                    if($("button#delegadoSubmit").attr('data') == 1) {
                        $('form#delegadoForm').reset();
                        $('.form-group').removeClass('has-success');
                    }
                }             
                $("button#delegadoSubmit").removeClass('disabled');
                $("button#cancelar").removeClass('disabled');
            }
        })
        return false;
    }
});

$("form#inspeccionForm").validate({
    rules: {
        fecha: {
            required: true
        },
        realizado: {
            required: true
        },
        tipo: {
            required: true
        }
    },
    messages: {
        fecha: {
            required: 'Ingrese una fecha'
        },
        realizado: {
            required: 'Seleccione una opción'
        }, 
        tipo: {
            required: 'Ingrese el tipo de inspección'
        }
    },
    invalidHandler: function (event, validator) { 
        $('.alert-error', $('.login-form')).show();
    },

    highlight: function (e) {
        $(e).closest('.form-group').removeClass('has-info').addClass('has-danger');
    },

    success: function (e) {
        $(e).closest('.form-group').removeClass('has-danger').addClass('has-success');
        $(e).remove();
    },
    errorPlacement: function (error, element) {
        if(element.is(':checkbox') || element.is(':radio')) {
            var controls = element.closest('.controls');
            if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
            else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
        }
        else if(element.is('.select2')) {
            error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
        }
        else if(element.is('.chzn-select')) {
            error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
        }
        else error.insertAfter(element);
    },
    submitHandler: function () {
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#inspeccionForm")[0]);
        $.ajax({
            url:  $("form#inspeccionForm").attr('action'),
            type: $("form#inspeccionForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#inspeccionSubmit").addClass('disabled');
                $("button#cancelar").addClass('disabled');
            },
            success:function(response){
                var accion = '';
                var alertMessage = '';
                var count = 0;

                if(response.validations == false){
                    //alertMessage = "<b>Campos únicos:</b> <br>";
                    $.each(response.errors, function(index, value){
                        count++;
                        alertMessage+= count+". "+value+"<br>";
                    });
                    toastr["warning"](alertMessage);
                }
                else if(response.validations == true){
                    if($("button#inspeccionSubmit").attr('data') == 1)
                        accion = 'registrada';
                    else if($("button#inspeccionSubmit").attr('data') == 0)
                        accion = 'actualizada';
                    var alertMessage = 'Inspección '+accion+'';
                    toastr["success"](alertMessage);
                    if($("button#inspeccionSubmit").attr('data') == 1) {
                        $('form#inspeccionForm').reset();
                        $('.form-group').removeClass('has-success');
                    }
                }             
                $("button#inspeccionSubmit").removeClass('disabled');
                $("button#cancelar").removeClass('disabled');
            }
        })
        return false;
    }
});

$("form#notificacionForm").validate({
    rules: {
        fecha: {
            required: true
        },
        lugar:{
            required: true
        },
        trabajador: {
            required: true
        }
    },
    messages: {
        fecha: {
            required: 'Ingrese una fecha'
        },
        lugar:{
            required: 'Ingrese un lugar'
        },
        trabajador: {
            required: 'Seleccione un trabajador'
        }
    },
    invalidHandler: function (event, validator) { 
        $('.alert-error', $('.login-form')).show();
    },

    highlight: function (e) {
        $(e).closest('.form-group').removeClass('has-info').addClass('has-danger');
    },

    success: function (e) {
        $(e).closest('.form-group').removeClass('has-danger').addClass('has-success');
        $(e).remove();
    },
    errorPlacement: function (error, element) {
        if(element.is(':checkbox') || element.is(':radio')) {
            var controls = element.closest('.controls');
            if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
            else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
        }
        else if(element.is('.select2')) {
            error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
        }
        else if(element.is('.chzn-select')) {
            error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
        }
        else error.insertAfter(element);
    },
    submitHandler: function () {
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#notificacionForm")[0]);
        $.ajax({
            url:  $("form#notificacionForm").attr('action'),
            type: $("form#notificacionForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#notificacionSubmit").addClass('disabled');
                $("button#cancelar").addClass('disabled');
            },
            success:function(response){
                var accion = '';
                var alertMessage = '';
                var count = 0;

                if(response.validations == false){
                    //alertMessage = "<b>Campos únicos:</b> <br>";
                    $.each(response.errors, function(index, value){
                        count++;
                        alertMessage+= count+". "+value+"<br>";
                    });
                    toastr["warning"](alertMessage);
                }
                else if(response.validations == true){
                    if($("button#notificacionSubmit").attr('data') == 1)
                        accion = 'registrada';
                    else if($("button#notificacionSubmit").attr('data') == 0)
                        accion = 'actualizada';
                    var alertMessage = 'Notificación '+accion+'';
                    toastr["success"](alertMessage);
                    if($("button#notificacionSubmit").attr('data') == 1) {
                        $('form#notificacionForm').reset();
                        $('.form-group').removeClass('has-success');
                    }
                }             
                $("button#notificacionSubmit").removeClass('disabled');
                $("button#cancelar").removeClass('disabled');
            }
        })
        return false;
    }
});

$("form#politicaForm").validate({
    rules: {
        fecha: {
            required: true
        },
        trabajador: {
            required: true
        }
    },
    messages: {
        fecha: {
            required: 'Ingrese una fecha'
        },
        trabajador: {
            required: 'Seleccione un trabajador'
        }
    },
    invalidHandler: function (event, validator) { 
        $('.alert-error', $('.login-form')).show();
    },

    highlight: function (e) {
        $(e).closest('.form-group').removeClass('has-info').addClass('has-danger');
    },

    success: function (e) {
        $(e).closest('.form-group').removeClass('has-danger').addClass('has-success');
        $(e).remove();
    },
    errorPlacement: function (error, element) {
        if(element.is(':checkbox') || element.is(':radio')) {
            var controls = element.closest('.controls');
            if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
            else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
        }
        else if(element.is('.select2')) {
            error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
        }
        else if(element.is('.chzn-select')) {
            error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
        }
        else error.insertAfter(element);
    },
    submitHandler: function () {
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#politicaForm")[0]);
        $.ajax({
            url:  $("form#politicaForm").attr('action'),
            type: $("form#politicaForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#politicaSubmit").addClass('disabled');
                $("button#cancelar").addClass('disabled');
            },
            success:function(response){
                var accion = '';
                var alertMessage = '';
                var count = 0;

                if(response.validations == false){
                    //alertMessage = "<b>Campos únicos:</b> <br>";
                    $.each(response.errors, function(index, value){
                        count++;
                        alertMessage+= count+". "+value+"<br>";
                    });
                    toastr["warning"](alertMessage);
                }
                else if(response.validations == true){
                    if($("button#politicaSubmit").attr('data') == 1)
                        accion = 'registrada';
                    else if($("button#politicaSubmit").attr('data') == 0)
                        accion = 'actualizada';
                    var alertMessage = 'Política '+accion+'';
                    toastr["success"](alertMessage);
                    if($("button#politicaSubmit").attr('data') == 1) {
                        $('form#politicaForm').reset();
                        $('.form-group').removeClass('has-success');
                    }
                }             
                $("button#politicaSubmit").removeClass('disabled');
                $("button#cancelar").removeClass('disabled');
            }
        })
        return false;
    }
});