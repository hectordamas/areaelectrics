Dropzone.options.dropzone = {
    acceptedFiles: 'image/*', // Solo aceptar imágenes
    dictDefaultMessage: 'Arrastra tus imágenes o haz click aquí para seleccionarlas',
    init: function() {
        var imagesIdArray = []; // Array para almacenar los IDs de las imágenes
        var imagesCount = 0; // Contador de imágenes

        this.on("success", function(file, response) {
            // Manejar la respuesta JSON aquí
            console.log(response); // Verifica la respuesta en la consola

            // Añadir el nuevo ID al array
            imagesIdArray.push(response.id);
            imagesCount++; // Incrementa el contador de imágenes

            // Convertir el array a JSON y asignarlo al input hidden
            var imagesArrayInput = document.getElementById('imagesArray');
            imagesArrayInput.value = JSON.stringify(imagesIdArray);

            console.log(imagesArrayInput.value); // Verifica el contenido del input en la consola

            // Actualizar el texto del botón
            var imagesButton = document.getElementById('imagesButtonModal');
            imagesButton.innerHTML = `<i class="fas fa-images"></i> ${imagesCount} ${ imagesCount > 1 ? 'imágenes cargadas' : 'imagen cargada' }`;
        });

        this.on("error", function(file, response) {
            // Manejar errores si los hay
            console.log(response);
        });
    }
};

//Sidebar
document.addEventListener('DOMContentLoaded', function() {
    // Detecta si el dispositivo es un móvil o una tablet
    var isMobileOrTablet = /Mobi|Tablet|iPad|iPhone|Android/i.test(navigator.userAgent) || (window.innerWidth <= 768);

    if (isMobileOrTablet) {
        // Selecciona el elemento con la clase sidebar
        var sidebarElement = document.querySelector('.sidebar');
        var table = document.querySelector('.table');

        if(table){
            table.classList.add('table-responsive');
        }
    
        if (sidebarElement) {
            // Agrega la clase toggled al sidebar
            sidebarElement.classList.add('toggled');
        }
    }
});

// Especificaciones
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('add-specification').addEventListener('click', function() {
        var container = document.getElementById('specifications-container');
        var item = document.createElement('div');
        item.className = 'row mb-1 specification-item';
        item.innerHTML = `
            <div class="col-md-5 form-group">
                <input type="text" required name="item[]" class="form-control" placeholder="Ítem" />
            </div>
            <div class="col-md-5 form-group">
                <input type="text" required name="specDescription[]" class="form-control" placeholder="Descripción" />
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger btn-sm remove-specification">
                    <i class="far fa-trash-alt"></i> Eliminar
                </button>
            </div>
        `;
        container.appendChild(item);
    });

    document.getElementById('specifications-container').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-specification')) {
            e.target.closest('.specification-item').remove();
        }
    });
});

$(document).ready(function(){
    //Summernote
    if ($('#summernote')) {
        $('#summernote').summernote({
            height: 200
        });
    }

    var gArrayFonts = ['Poppins', 'Nunito', 'Arial', 'Verdana', 'Impact'];
    if ($('#description')) {
        $('#description').summernote({
            fontNames: gArrayFonts,
            height: 200
        });
    }

    //Color
    colorSuccess = '#1cc88a' 

    //Precio
    $('#price').on('input', function(){
        let val = parseFloat($('#price').val()) || 0
        let priceFormat = new Intl.NumberFormat('en-US', { 
            style: 'currency', 
            currency: 'USD', 
            currencyDisplay: 'narrowSymbol'
        }).format(val)
        $('#priceFormat').html(priceFormat);
    })

    //Select2
    if($('.select2')){
        $('.select2').select2();
    }

    //Ordenar Posiciones de imagenes
    var el = document.getElementById('sortable-images');
    if(el){
        Sortable.create(el, {
            animation: 150,
            onEnd: function (evt) {
                var itemEl = evt.item;  // item that was dragged
                // You can get the new order of items and send it to the server if needed
                var order = [];
                $('#sortable-images .col-md-2').each(function (index, element) {
                    var id = $(element).attr('class').match(/image(\d+)/)[1];
                    order.push(id);
                });
                
                // Send the new order to the server via AJAX
                $.ajax({
                    url: '/update-image-order',
                    method: 'POST',
                    data: {
                        order: order,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        console.log('Order updated successfully');
                    },
                    error: function (xhr) {
                        console.error('Error updating order', xhr);
                    }
                });
            }
        });
    }


    //Destroy Image
    $('.destroy-image').on('click', function(){
        var id = $(this).data('id');
        $('#image_id').val(id);
        $('#destroyImage').attr('action', `/images/${id}/destroy`);
    });
      
    //DataTables
    if ($('.datatable')) {
        $('.datatable').DataTable({
            columnDefs: [
                { "orderable": false, "targets": [-1] } // Deshabilita la ordenación para la primera columna (index 0)
            ],
          lengthMenu: [ [10, 25, 50, -1], ["10", "25", "50", "Ver Todos"] ],
          order: [[0, 'desc']],
          language: {
              "decimal": "",
              "emptyTable": "No hay información",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
              "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
              "infoFiltered": "(Filtrado de _MAX_ total entradas)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Entradas",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscar: ",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": '<i class="fas fa-angle-right"></i>',
                  "previous": '<i class="fas fa-angle-left"></i>'
              }
          },
        });
    }

    //Check All
    $("#checkAll").click(function(){
        $('.checkOne').not(this).prop('checked', this.checked);
    });

    //Delete Product
    $('.deleteProductButton').on('click', function(){
        var id = $(this).data('id');
        $('.deleteProductForm').attr('action', `/products/${id}/delete`);
    });

    $('.handleProducts').on('submit', function(event) {
        event.preventDefault(); // Prevenir el envío automático del formulario
        
        const form = this; // Guardar una referencia al formulario actual
        
        Swal.fire({
            title: "¿Estás seguro de ejecutar esta acción?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Confirmar",
            cancelButtonText: "Cancelar",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, enviar el formulario
                form.submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // Opcional: manejar la cancelación si es necesario
            }
        });
    });

    //Categorias 

    //Ordenar categorias
    var el = document.getElementById('sortable-categories');
    if(el){
        Sortable.create(el, {
            animation: 150,
            onEnd: function (evt) {
                var itemEl = evt.item;  // item that was dragged
                // You can get the new order of items and send it to the server if needed
                var order = [];
                $('#sortable-categories .category-item').each(function (index, element) {
                    order.push($(element).data('id'));
                });
                
                // Send the new order to the server via AJAX
                $.ajax({
                    url: '/update-categories-order',
                    method: 'POST',
                    data: {
                        order: order,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        console.log('Order updated successfully');
                    },
                    error: function (xhr) {
                        console.error('Error updating order', xhr);
                    }
                });
            }
        });
    }

    $('.deleteCategoryButton').on('click', function(){
        var id = $(this).data('id');
        $('.deleteCategoryForm').attr('action', `/categories/${id}/delete`);
    });

    //Marcas 

    //Ordenar marcas
    var el = document.getElementById('sortable-brands');
    if(el){
        Sortable.create(el, {
            animation: 150,
            onEnd: function (evt) {
                var itemEl = evt.item;  // item that was dragged
                // You can get the new order of items and send it to the server if needed
                var order = [];
                $('#sortable-brands .brand-item').each(function (index, element) {
                    order.push($(element).data('id'));
                });
                
                // Send the new order to the server via AJAX
                $.ajax({
                    url: '/update-brands-order',
                    method: 'POST',
                    data: {
                        order: order,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        console.log('Order updated successfully');
                    },
                    error: function (xhr) {
                        console.error('Error updating order', xhr);
                    }
                });
            }
        });
    }

    $('.deleteBrandButton').on('click', function(){
        var id = $(this).data('id');
        $('.deleteBrandForm').attr('action', `/brands/${id}/delete`);
    });

    // Usuarios
    //Delete User
    $('.deleteUserButton').on('click', function(){
        var id = $(this).data('id');
        var active = $(this).data('active');

        $('.deleteUserForm').attr('action', `/admin/users/${id}/destroy`);

        if(!active){
            $('#inactive-title').html('Activar usuario');
        }
    });

    $('.usersHandle').on('submit', function(event) {
        event.preventDefault(); // Prevenir el envío automático del formulario
        
        const form = this; // Guardar una referencia al formulario actual
        
        Swal.fire({
            title: "¿Estás seguro de ejecutar esta acción?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Confirmar",
            cancelButtonText: "Cancelar",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, enviar el formulario
                form.submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // Opcional: manejar la cancelación si es necesario
            }
        });
    });
    
})
