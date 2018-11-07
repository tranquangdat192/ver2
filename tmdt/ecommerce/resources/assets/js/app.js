/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));

// const app = new Vue({
//     el: '#app'
// });

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var addToCart = false;
$('body').on('click', '.addToCart', function (e) {
    if (addToCart) return;
    addToCart = true;

    var $this = $(this);
    var $id = $this.attr('data-id');

    $.ajax({
        type: 'post',
        url: '/api/cart',
        data: {
            id: $id,
        },
        dataType: 'json',
        success: function (data) {
            $('#quick-cart').empty().html(data.cart);
            addToCart = false;
        }
    });
});

var removeCart = false;
$('body').on('click', '.removeCart', function (e) {
    if (removeCart) return;
    removeCart = true;

    var $this = $(this);
    var $id = $this.closest('.order').attr('data-id');

    $.ajax({
        type: 'post',
        url: '/api/removeCart',
        data: {
            id: $id,
        },
        dataType: 'json',
        success: function (data) {
            $('#quick-cart').empty().html(data.cart);
            if ($this.closest('#shopping-cart').length > 0) {
                $('#shopping-cart').empty().html(data.order);
            }
            removeCart = false;
        }
    });
});

var minusCart = false;
$('body').on('click', '.minus', function (e) {
    if (minusCart) return;
    minusCart = true;

    var $this = $(this);
    var $input = $this.closest('.qty').find('input');
    var $id = $this.closest('.order').attr('data-id');
    $input.val(parseInt($input.val()) - 1);

    $.ajax({
        type: 'post',
        url: '/api/editCart',
        data: {
            qty: $input.val(),
            id: $id,
        },
        dataType: 'json',
        success: function (data) {
            $('#quick-cart').empty().html(data.cart);
            $('#shopping-cart').empty().html(data.order);
            minusCart = false;
        }
    });
});

var plusCart = false;
$('body').on('click', '.plus', function (e) {
    if (plusCart) return;
    plusCart = true;

    var $this = $(this);
    var $input = $this.closest('.qty').find('input');
    var $id = $this.closest('.order').attr('data-id');
    $input.val(parseInt($input.val()) + 1);

    $.ajax({
        type: 'post',
        url: '/api/editCart',
        data: {
            qty: $input.val(),
            id: $id,
        },
        dataType: 'json',
        success: function (data) {
            $('#quick-cart').empty().html(data.cart);
            $('#shopping-cart').empty().html(data.order);
            plusCart = false;
        }
    });
});

var editCart = false;
$('body').on('change', '.editCart', function (e) {
    if (editCart) return;
    editCart = true;

    var $this = $(this);
    var $id = $this.closest('.order').attr('data-id');

    $.ajax({
        type: 'post',
        url: '/api/editCart',
        data: {
            qty: $this.val(),
            id: $id,
        },
        dataType: 'json',
        success: function (data) {
            $('#quick-cart').empty().html(data.cart);
            $('#shopping-cart').empty().html(data.order);
            editCart = false;
        }
    });
});

var login = false;
$('.loginButton').on('click', function (e) {
    if (login) return;
    login = true;

    var $this = $(this);
    var $email = $this.closest('.content').find('#email').val();
    var $password = $this.closest('.content').find('#password').val();
    $this.closest('.content').removeClass('error');

    $.ajax({
        type: 'post',
        url: '/loginUser',
        data: {
            email: $email,
            password: $password,
        },
        dataType: 'json',
        success: function (data) {
            location.reload();
            login = false;
        },
        error: function (data) {
            $this.closest('.content').addClass('error');
            login = false;
        }
    });
});

$('body').on('click', 'input[name="account"]', function () {
    if ($(this).val() == 'guest') {
        $(this).closest('.content').find('.account').addClass('guest');
    } else {
        $(this).closest('.content').find('.account').removeClass('guest');
    }
    ;
});

var continueStep = false;
$('.continueStep').on('click', function (e) {
    if (continueStep) return;
    continueStep = true;

    var $this = $(this);
    var data = {};
    $this.closest('.detail').find('.warning').removeClass('warning');
    if ($(this).closest('#info').length > 0) {
        if ($('input[name="account"]:checked').val() == 'register') {
            data = {
                name: $this.closest('.content').find('#fullname').val(),
                email: $this.closest('.content').find('#emailRegister').val(),
                password: $this.closest('.content').find('#passwordRegister').val(),
                password_confirmation: $this.closest('.content').find('#confirm').val(),
            };
            $.ajax({
                type: 'post',
                url: '/checkRegister',
                data: data,
                dataType: 'json',
                success: function (data) {
                    $this.closest('.detail').removeClass('active');
                    $('#billing').find('.detail').addClass('active');
                    continueStep = false;
                },
                error: function (data) {
                    $.each(data.responseJSON, function (k, v) {
                        if (k == 'name') {
                            $this.closest('.content').find('#fullname').addClass('warning');
                        } else if (k == 'email') {
                            $this.closest('.content').find('#emailRegister').addClass('warning');
                        } else {
                            $this.closest('.content').find('#passwordRegister').addClass('warning');
                            $this.closest('.content').find('#confirm').addClass('warning');
                        }
                    });
                    continueStep = false;
                }
            });
        } else {
            data = {
                name: $this.closest('.content').find('#fullname').val(),
                email: $this.closest('.content').find('#emailRegister').val(),
            };

            $.ajax({
                type: 'post',
                url: '/checkGuest',
                data: data,
                dataType: 'json',
                success: function (data) {
                    $this.closest('.detail').removeClass('active');
                    $('#billing').find('.detail').addClass('active');
                    continueStep = false;
                },
                error: function (data) {
                    $.each(data.responseJSON, function (k, v) {
                        if (k == 'name') {
                            $this.closest('.content').find('#fullname').addClass('warning');
                        } else {
                            $this.closest('.content').find('#emailRegister').addClass('warning');
                        }
                    });
                    continueStep = false;
                }
            });
        }
    } else if ($(this).closest('#billing').length > 0) {
        data = {
            phone: $this.closest('.detail').find('#telephone').val(),
            address: $this.closest('.detail').find('#address').val(),
        };

        $.ajax({
            type: 'post',
            url: '/checkBilling',
            data: data,
            dataType: 'json',
            success: function (data) {
                $this.closest('.detail').removeClass('active');
                $('#delivery').find('.detail').addClass('active');
                continueStep = false;
            },
            error: function (data) {
                $.each(data.responseJSON, function (k, v) {
                    if (k == 'phone') {
                        $this.closest('.detail').find('#telephone').addClass('warning');
                    } else {
                        $this.closest('.detail').find('#address').addClass('warning');
                    }
                });
                continueStep = false;
            }
        });
    } else if ($(this).closest('#delivery').length > 0) {
        $this.closest('.detail').removeClass('active');
        $('#paymentMethod').find('.detail').addClass('active');
        continueStep = false;
    } else if ($(this).closest('#paymentMethod').length > 0) {
        $this.closest('.detail').removeClass('active');
        $('#confirmOder').find('.detail').addClass('active');
        continueStep = false;
    } else if ($(this).closest('#confirmOder').length > 0) {
        data = {
            name:  $('#info').find('#fullname').val(),
            email:  $('#info').find('#emailRegister').val(),
            password:  $('#info').find('#passwordRegister').val(),
            password_confirmation:  $('#info').find('#confirm').val(),
            phone: $('#billing').find('#telephone').val(),
            address: $('#billing').find('#address').val(),
        };

        $.ajax({
            type: 'post',
            url: '/save',
            data: data,
            dataType: 'json',
            success: function (data) {
                window.location.href = 'thankyou';
                continueStep = false;
            },
            error: function (data) {
                continueStep = false;
            }
        });
    }
});

var tabCategory = false;
$('.tabCategory').on('click', function (e) {
    if (tabCategory) return;
    tabCategory = true;

    var $this = $(this);
    var $slug = $this.attr('data-slug');

    $.ajax({
        type: 'post',
        url: '/api/getProduct',
        data: {
            slug: $slug,
        },
        dataType: 'json',
        success: function (data) {
            $this.closest('ul').find('li').removeClass('active');
            $this.addClass('active');
            $this.closest('.container').find('.content').empty().html(data.products);
            tabCategory = false;
        }
    });
});

var cw = $('.imgthumb').width();
$('.imgthumb').find('img').css({'height':cw+'px'});

var checkSearch = false;
$('#grid').find('.checkSearch').on('click', function () {
    if (checkSearch) return;
    checkSearch = true;

    var $this = $(this);

    if ($this.hasClass('active')) {
        $this.removeClass('active');
    } else {
        $this.closest('ul').find('.active').removeClass('active');
        $this.addClass('active');
    }

    var data = new FormData();

    if ($('#grid').attr('data-slug')) {
        data.append( 'slug', $('#grid').attr('data-slug') );
    }
    if ($('#brand').find('.checkSearch.active').length > 0) {
        data.append( 'idBrand', $('#brand').find('.checkSearch.active').attr('data-id') );
    }
    if ($('#price').find('.checkSearch.active').length > 0) {
        data.append( 'max-price', $('#price').find('.checkSearch.active').attr('data-max-price') );
        data.append( 'min-price', $('#price').find('.checkSearch.active').attr('data-min-price') );
    }

    $.ajax({
        type: 'post',
        url: '/api/searchProduct',
        data: data,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (data) {
            $this.closest('#grid').find('.showProduct').find('.content').empty().append(data.products);
            checkSearch = false;
        },
        error: function (data) {
            checkSearch = false;
        }
    });
});

///////// Admin

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            if ($('.preview-image').find('img').length > 0){
                $('.preview-image').find('img').attr('src', e.target.result);
            } else {
                $($.parseHTML('<img>')).attr('src', event.target.result).appendTo('.preview-image');
            }
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$(".image-button").change(function() {
    readURL(this);
});

var imagesPreview = function(input, placeToInsertImagePreview) {

    if (input.files) {
        var filesAmount = input.files.length;
        $(placeToInsertImagePreview).empty();
        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();

            reader.onload = function(event) {
                $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
            }

            reader.readAsDataURL(input.files[i]);
        }
    }

};

$('.thumbnail-button').on('change', function() {
    imagesPreview(this, 'span.gallery');
});

$('.deleteItem').on('click', function () {
    var $this = $(this);
    var id = $this.attr('data-id');
    $('#delete-modal').find('.delete').attr('data-id', id);
});

var deleteItem = false;
$('.delete').on('click', function () {
    if (deleteItem) return;
    deleteItem = true;

    var $this = $(this);
    var id = $this.attr('data-id');
    var model = $this.attr('data-model');

    $.ajax({
        type: 'post',
        url: '/admin/delete',
        data: {
            model: model,
            id: id
        },
        dataType: 'json',
        success: function (data) {
            location.reload();
            deleteItem = false;
        },
        error: function (data) {
            deleteItem = false;
        }
    });
});

$('.allCheck').on('change', function () {
    var $this = $(this);
    var checked = this.checked;
    $this.closest('table').find('input[type = checkbox]').prop('checked', checked);
})

$('input[name="name"]').on('change',function () {
    var $this = $(this);
    if ($('input[name="slug"]').length > 0){
        $('input[name="slug"]').val($this.val().toLowerCase()
            .replace(/ /g,'-')
            .replace(/[^\w-]+/g,'')
        );
    }
})

var dataDelete = [];
$('.deleteAll').on('click', function () {
    var $this = $(this);
    var input = $this.closest('#content').find('input[type=checkbox]:checked');
    input.each(function( index ) {
        if ($(this).val() && !$(this).hasClass('allCheck')){
            dataDelete.push($(this).val());
        }
    });
})

var deleteAll = false;
$('.bulk-delete').on('click', function () {
    if (deleteAll) return;
    deleteAll = true;

    var $this = $(this);
    var model = $this.attr('data-model');
    $.ajax({
        type: 'post',
        url: '/admin/deleteAll',
        data: {
            model: model,
            id: dataDelete
        },
        dataType: 'json',
        success: function (data) {
            location.reload();
            deleteAll = false;
        },
        error: function (data) {
            deleteAll = false;
        }
    });
})