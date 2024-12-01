
(function($) {

    $('.item-quantity').on('change', function(e) {
        const itemId = $(this).data('id');
        const quantity = $(this).val();
    
        $.ajax({
            url: `/cart/${itemId}`,
            method: 'PUT',
            data: {
                quantity: quantity,
                _token: csrf_token
            },
            success: function(response) {
                console.log(response.message);
    
                // Update the UI dynamically if needed
                $(`#item-${response.id} .quantity-display`).text(response.quantity);
    
                // Optionally, refresh the cart total or other dependent values
                refreshCartTotal();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseJSON.message || 'An error occurred');
                alert('Failed to update cart. Please try again.');
            }
        });
    });
    
    $('.remove-item').on('click', function(e) {
       let id = $(this).data('id');
        $.ajax({
            url: "/cart/" + $(this).data('id'), //data-id
            method: 'delete',
            data: {
                _token: csrf_token
            },
            success:response => {
                $(`#${id}`).remove();
            }
        });
    });
    $('.add-to-cart').on('click', function(e) {
         $.ajax({
             url: "/cart/" , //data-id
             method: 'post',
             data: {
                product_id: $(this).data('id'),
                quantity :$(this).data('quantity'),
                 _token: csrf_token
             },
             success:response => {
                 alert('product added')
             }
         });
     });
})(jQuery);