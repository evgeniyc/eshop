jQuery(document).ready(function($) { 
    $('#accordion ul').hide(); 
    $('#accordion .badge').on('click', function () { 
        var $badge = $(this); 
        var closed = $badge.siblings('ul') && !$badge.siblings('ul') .is(':visible'); 
 
        if (closed) { 
            $badge.siblings('ul').slideDown('normal', function () { 
                $badge.children('i').removeClass('fa-plus').addClass('fa-minus'); 
            }); 
        } else { 
            $badge.siblings('ul').slideUp('normal', function () { 
                $badge.children('i').removeClass('fa-minus').addClass('fa-plus'); 
            }); 
        } 
    }); 
});

jQuery(document).ready(function($) {
    /*
     * Аккордеон для меню каталога в левой колонке
     */
    $('#accordion').dcAccordion({
        speed: 'fast'
    });

    /*
     * Добавление товара в корзину с использованием AJAX
     */
    $('.add-to-basket').on('submit', function (event) {
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
                $('#basket-modal').modal();
            },
            error: function () {
                alert('Произошла ошибка при добавлении товара в корзину');
            }
        });
        event.preventDefault();
    });
});