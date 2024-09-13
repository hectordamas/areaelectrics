$(document).ready(function(){
    //Colores Producto
    $('.selectColor').on('click', function(){
      var color = $(this).data('color')
      $('#color').val(color);
    });

    //Tallas Producto
    $('.selectSize').on('click', function(){
      var size = $(this).data('size')
      $('#size').val(size);
    });

    //Añadir al Carrito

    //Añadir al carrito desde la página Show
    $('#addToCart').on('click', function(){
      let id = $('#id').val();
      let name = $('#name').val();
      let price = $('#price').val();
      let image = $('#image').val();
      let quantity = $('#quantity').val();
      let size = $('#size').val();
      let color = $('#color').val();

      $.ajax({
        headers:{
          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        url:'/cart/addToCart',
        type:'POST',
        data: { id, name, price, image, quantity, size, color},
        success:function(data){
          Swal.fire({
            icon: 'success',
            text: 'Producto agregado con éxito!',
            confirmButtonText: 'Procesar Orden',
            showCancelButton:true,
            cancelButtonColor:'#343a40',
            cancelButtonText: "Continuar Comprando",
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.replace("/carrito-de-compras");
            }
          }); 

          var count = data.count;
          $('.cart_count').html(count);

          var cart_subtotal = '$' + data.cart_subtotal;
          $('.cart_price').html(cart_subtotal);
          $('.amount').html(cart_subtotal);

          $('.cart_list').html('');
          let items = Object.values(data.items)              
          items.map((item) => {
            $('.cart_list').append(`<li>\
                  <a href="#"><img src="${item.options['image']}" alt="${item.name}">${item.name}</a>\
                  <span class="cart_quantity">${item.qty} x <span class="cart_amount">${'$' + item.price}</span>\
              </li>`);
          })
        },
      });
    })

    //Añadir al carrito desde fuera de show, es decir, sin ver el detalle del producto
    $('.addToCartWithQty').on('click', function(){
      var id = $(this).data('id');
      Swal.fire({
        title: 'Añadir al Carrito',
        input: 'number',
        inputPlaceholder: 'Agregar Cantidad deseada...',
        inputAttributes: {min: 1},
        confirmButtonText:'<i class="fas fa-shopping-cart"></i> Añadir al Carrito',
        confirmButtonColor: "#1cc88a",
      }).then((quantity) => {
        $.ajax({
          headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
          },
          url:'/cart/addToCart',
          type:'POST',
          data:{ id, quantity: quantity.value },
          success:function(data){
            Swal.fire({
              icon: 'success',
              text: 'Producto agregado con éxito!',
              confirmButtonText: 'Procesar Orden',
              showCancelButton:true,
              cancelButtonColor:'#343a40',
              cancelButtonText: "Continuar Comprando",
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.replace("/carrito-de-compras");
              }
            }); 
  
            var count = data.count;
            $('.cart_count').html(count);
  
            var cart_subtotal = '$' + data.cart_subtotal;
            $('.cart_price').html(cart_subtotal);
            $('.amount').html(cart_subtotal);
  
            $('.cart_list').html('');

            let items = Object.values(data.items)              
            items.map((item) => {
              $('.cart_list').append(`<li>\
                    <a href="#"><img src="${item.options['image']}" alt="${item.name}">${item.name}</a>\
                    <span class="cart_quantity">${item.qty} x <span class="cart_amount">${'$' + item.price}</span>\
                </li>`);
            })
          },
        });
      })
    })

    //Actualizar QTY del carrito
    $('.updateCartItem').on('click',function(){
      var rowId = $(this).data('rowid');
      var qty = $('#qty-input' + rowId).val();
  
      Swal.fire({
        title: 'Modificar Producto',
        input: 'number',
        inputPlaceholder: 'Agrega la Cantidad deseeada...',
        inputValue: qty,
        inputAttributes: {min: 1},
        confirmButtonText:'<i class="fas fa-shopping-cart"></i> Añadir al Carrito',
        confirmButtonColor: "#DD6B55",
      }).then((qty) => {
        $.ajax({
          headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
          },
          url:'/cart/updateCartItem',
          type:'POST',
          data:{rowId, quantity: qty.value},
          success:function(data){
            let {count, cart_subtotal, cart_total, cart_tax, updatedItemQuantity, updatedItemPrice} = data
            $('.cart_count').html(count);
            $('.cart_subtotal').html('$' + cart_subtotal);
            $('.cart_subtotal_amount').html('$' + cart_subtotal)
            $('.cart_total_amount').html('$' + cart_total);
            $('.cart_tax_amount').html('$' + cart_tax);
  
            $('.cart_list').html('')
            
            let items = Object.values(data.items)              
            items.map((item) => {
            $('.cart_list').append(`<li>\
                    <a href="#"><img src="${item.options['image']}" alt="${item.title}">${item.name}</a>\
                    <span class="cart_quantity">${item.qty} x <span class="cart_amount">${'$' + item.price}</span>\
                </li>`);
            })
  
            $('.product-quantity-' + rowId).html(updatedItemQuantity)
            $('#qty-input' + rowId).val(updatedItemQuantity)
            $('.product-subtotal-' + rowId).html('$' + updatedItemPrice.toFixed(2))
            
            Swal.fire({
              icon: 'success',
              text: 'Producto modificado con éxito!'
            }); 
          },
        });
      });
    });

    //Remove Item del carrito
    $('.removeCartItem').on('click', function() {
      if(confirm('Estás seguro de eliminar este producto?')){
        let rowId = $(this).data('rowid')
        $.ajax({
          headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
          },
          url:'/cart/removeCartItem',
          type:'POST',
          data:{ rowId },
          success:function(data){
              Swal.fire({
                icon: 'success',
                text: 'Producto eliminado con éxito!'
              }); 
    
              let {count, cart_subtotal, cart_total, cart_tax} = data
              $('.cart_count').html(count);
              $('.cart_subtotal').html('$' + cart_subtotal);
              $('.cart_subtotal_amount').html('$' + cart_subtotal)
              $('.cart_total_amount').html('$' + cart_total);
              $('.cart_tax_amount').html('$' + cart_tax);
    
              $('.cart_list').html('')
              
              let items = Object.values(data.items)              
  
              items.map((item) => {
              $('.cart_list').append(`<li>\
                      <a href="#"><img src="${item.options['image']}" alt="${item.title}">${item.title}</a>\
                      <span class="cart_quantity">${item.quantity} x <span class="cart_amount">${'$' + item.price}</span>\
                  </li>`);
              })
    
              $('#tr' + rowId).remove()
            }
        })
      }
    })
})