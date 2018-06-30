var url = "http://localhost:8000/nodo_nuevo";

// crear nuevo producto / actualizar producto existente
function guardarNodo(e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })
    e.preventDefault();
    var formData = {
        nombre: $('#nombre').val(),
        descripcion: $('#descripcion').val(),
    }
    // utilizado para determinar el metodo http que se va a utilizar [add = POST], [update = PUT]
    var state = $('#btn-save').val();
    var type = "POST"; // para crear un nuevo recurso
    var producto_id = $('#producto_id').val();;
    var my_url = url;
    if (state == "update") {
        type = "PUT"; // para actualizar recursos existentes
        my_url += '/' + producto_id;
    }
    console.log(formData);
    $.ajax({
        type: type,
        url: my_url,
        data: formData,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            var producto = '<tr id="producto' + data.id + '"><td>' + data.id + '</td><td>' + data.nombre + '</td><td>' + data.descripcion + '</td>';
            producto += '<td><button class="btn btn-warning btn-detail open_modal" value="' + data.id + '">Editar</button>';
            producto += ' <button class="btn btn-danger btn-delete delete-producto" value="' + data.id + '">Eliminar</button></td></tr>';
            if (state == "add") { // para actualizar recursos existentes...
                $('#productos-list').append(producto);
            } else { // si el usuario actualiza un registro existente
                $("#producto" + producto_id).replaceWith(producto);
            }
            $('#frmproductos').trigger("reset");
            $('#myModal').modal('hide')
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
};