function basketadd (data) {
	$( "#ajax-answer" ).load( "/eshop/web/basket/ajaxadd", { id: data, count: 1 }, function() {
		$('#basket-message').modal('show');
	});
	ind = $( "#basket-badge" ).text();
	ind++;
	$( "#basket-badge" ).text(ind);
}
jQuery(document).ready(function($) {
    /*
     * Добавление товара в корзину с использованием AJAX
     
    $('.add-to-basket').on('click', function (event) {
        $( "#ajax-answer" ).load( "/eshop/web/basket/ajaxadd", { id: 3, count: 1 }, function() {
			$('#basket-message').modal('show');
		});
	});*/
    /*
     * Удаление товара из корзины в модальном окне
     */
    $('#basket-modal .modal-body').on('click', 'table a.text-danger', function (event) {
        /* ... */
    });
    /*
     * Удаление товара из корзины на странице корзины
     */
    $('#basket-content').on('click', 'table a.text-danger', function (event) {
        /* ... */
    });
    /*
     * Удаление всех товаров из корзины в модальном окне
     */
    $('#basket-modal .modal-body').on('click', 'p a.text-danger', function (event) {
        /* ... */
    });
    /*
     * Удаление всех товаров из корзины на странице корзины
     */
    $('#basket-content').on('click', 'p a.text-danger', function (event) {
        /* ... */
    });
    /*
     * Обновление содержимого корзины в модальном окне
     */
    $('#basket-modal').on('submit', 'form', function (event) {
        var action = $(this).attr('action');
        var method = $(this).attr('method');
        if (method == undefined) {
            method = 'get';
        }
        var data = $(this).serialize();
        $.ajax({
            url: action,
            type: method,
            data: data,
            dataType: 'html',
            success: function (response) {
                $('#basket-modal .modal-body').html(response);
                // если корзина пуста, скрываем кнопку «Оформить заказ»
                if ( ! $('#basket-modal .modal-body table').length) {
                    $('#basket-modal .modal-footer .btn-warning').hide();
                }
            },
            error: function () {
                alert('Произошла ошибка при обновлении корзины');
            }
        });
        event.preventDefault();
    })
    /*
     * Обновление содержимого корзины на странице корзины
     */
    $('#basket-content').on('submit', 'form', function (event) {
        var action = $(this).attr('action');
        var method = $(this).attr('method');
        if (method == undefined) {
            method = 'get';
        }
        var data = $(this).serialize();
        $.ajax({
            url: action,
            type: method,
            data: data,
            dataType: 'html',
            success: function (response) {
                $('#basket-content').html(response);
                // если корзина пуста, скрываем кнопку «Оформить заказ»
                if ( ! $('#basket-content table').length) {
                    $('#basket-content').next('.btn-warning').hide();
                }
            },
            error: function () {
                alert('Произошла ошибка при обновлении корзины');
            }
        });
        event.preventDefault();
    });
});