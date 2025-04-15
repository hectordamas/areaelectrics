$(document).ready(function(){
    //Añadir al Carrito

    //Añadir al carrito desde la página Show
    $('#addToCart').on('click', function(){
      let id = $('#id').val();
      let name = $('#name').val();
      let price = $('#price').val();
      let priceDetal = $('#priceDetal').val();
      let image = $('#image').val();
      let quantity = $('#quantity').val();

      $.ajax({
        headers:{
          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        url:'/cart/addToCart',
        type:'POST',
        data: { id, name, price, image, quantity, priceDetal},
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
            let priceDetal = item.options['price_detal'] ?? 'N/A';
            let priceMayor = item.price;
            
            $('.cart_list').append(`<li>
              <a href="#"><img src="${item.options['image']}" alt="${item.name}">${item.name}</a>
              <span class="cart_quantity">${item.qty} x 
                <span class="cart_amount">
                  <small>(Detal: $${priceDetal})</small><br>
                  <small>(Mayor: $${priceMayor})</small>
                </span>
              </span>
            </li>`);
          })

          // Actualizar los totales de detal
          $('#cart_subtotal_mayor').html('$' + data.cart_subtotal);
          $('#cart_subtotal_detal').html('$' + data.subtotalDetal);
          $('#cart_total').html('$' + data.cart_total);
          $('#cart_tax').html('$' + data.cart_tax);
          $('#cart_tax_detal').html('$' + data.taxDetal);
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
              let priceDetal = item.options['price_detal'] ?? 'N/A';
              let priceMayor = item.price;
              
              $('.cart_list').append(`<li>
                <a href="#"><img src="${item.options['image']}" alt="${item.name}">${item.name}</a>
                <span class="cart_quantity">${item.qty} x 
                  <span class="cart_amount">
                    <small>(Detal: $${priceDetal})</small><br>
                    <small>(Mayor: $${priceMayor})</small>
                  </span>
                </span>
              </li>`);

              // Actualizar los totales de detal
              $('#cart_subtotal_mayor').html('$' + data.cart_subtotal);
              $('#cart_subtotal_detal').html('$' + data.subtotalDetal);
              $('#cart_total').html('$' + data.cart_total);
              $('#cart_tax').html('$' + data.cart_tax);
              $('#cart_tax_detal').html('$' + data.taxDetal);
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
              let priceDetal = item.options['price_detal'] ?? 'N/A';
              let priceMayor = item.price;
              
              $('.cart_list').append(`<li>
                <a href="#"><img src="${item.options['image']}" alt="${item.name}">${item.name}</a>
                <span class="cart_quantity">${item.qty} x 
                  <span class="cart_amount">
                    <small>(Detal: $${priceDetal})</small><br>
                    <small>(Mayor: $${priceMayor})</small>
                  </span>
                </span>
              </li>`);
            })

            $('.product-quantity-' + rowId).html(updatedItemQuantity)
            $('#qty-input' + rowId).val(updatedItemQuantity)
            $('.product-subtotal-' + rowId).html('$' + updatedItemPrice.toFixed(2))
            $('.product-subtotalDetal-' + rowId).html('$' + (data.updatedItemQuantity * data.updatedItemPriceDetal).toFixed(2))


                          // Actualizar los totales de detal
                          $('#cart_subtotal_mayor').html('$' + data.cart_subtotal);
                          $('#cart_subtotal_detal').html('$' + data.subtotalDetal);
                          $('#cart_total').html('$' + data.cart_total);
                          $('#cart_tax').html('$' + data.cart_tax);
                          $('#cart_tax_detal').html('$' + data.taxDetal);
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
                let priceDetal = item.options['price_detal'] ?? 'N/A';
                let priceMayor = item.price;
                
                $('.cart_list').append(`<li>
                  <a href="#"><img src="${item.options['image']}" alt="${item.name}">${item.name}</a>
                  <span class="cart_quantity">${item.qty} x 
                    <span class="cart_amount">
                      <small>(Detal: $${priceDetal})</small><br>
                      <small>(Mayor: $${priceMayor})</small>
                    </span>
                  </span>
                </li>`);
              })

                            // Actualizar los totales de detal
                            $('#cart_subtotal_mayor').html('$' + data.cart_subtotal);
                            $('#cart_subtotal_detal').html('$' + data.subtotalDetal);
                            $('#cart_total').html('$' + data.cart_total);
                            $('#cart_tax').html('$' + data.cart_tax);
                            $('#cart_tax_detal').html('$' + data.taxDetal);
    
              $('#tr' + rowId).remove()
            }
        })
      }
    })
})