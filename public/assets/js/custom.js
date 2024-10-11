$(function() {
    $(".filterSelect").on("change", function() {
        var value = $(this).val();
        var currentUrl = window.location.href;
        var newUrl;
        if (currentUrl.indexOf('?filter=') !== -1 || currentUrl.indexOf('&filter=') !== -1) {
            newUrl = currentUrl.replace(/(\?|&)filter=[^&]+/, '$1filter=' + value);
        } else {
            if (currentUrl.indexOf('?') === -1) {
                newUrl = currentUrl + '?filter=' + value;
            } else {
                newUrl = currentUrl + '&filter=' + value;
            }
        }
        window.location.href = newUrl;
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(".formContact").on("submit",function (e){
        var formdata = new FormData(this);
        e.preventDefault();
        var url = $(this).attr('action');
        startLoading();

        $.ajax({
            url: url,
            type: 'POST',
            data: formdata,
            contentType:false,
            processData:false,
            success: function(response) {
                endLoading();
                $(".formContact")[0].reset();
                Swal.fire({
                    'success':'successs',
                    'icon':'success',
                    'text':response.message,
                    'timer':1200,
                    'showConfirmButton':false,
                })
            },
            error: function(xhr, status, error) {
                endLoading();
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;

                    $.each(errors, function (key, value) {
                        toastr.error(value[0]);
                    });
                } else {
                    console.log('Error:', error);
                }
            }
        });

    });
    function ajaxQuery(url, formdata, form){
        $.ajax({
            url: url,
            type: 'POST',
            data: formdata,
            contentType:false,
            processData:false,
            success: function(response) {
                $(form)[0].reset();
                Swal.fire({
                    'success':'successs',
                    'icon':'success',
                    'text':response.message,
                    'timer':1200,
                    'showConfirmButton':false,
                })
            },
            error: function(xhr, status, error) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;

                    $.each(errors, function (key, value) {
                        toastr.error(value[0]);
                    });
                } else {
                    console.log('Error:', error);
                }
            }
        });
    }

    $('.formApply').on("submit", function (e){
        e.preventDefault();
        url = $(this).attr('action')
        var formdata = new FormData(this);
        var form = this;
        ajaxQuery(url, formdata, form);
    })
});



$(function(){
    $(".btn-cart").click(function (e){
        e.preventDefault();

        var phoneNumber = $(this).data('number');
        var message = encodeURIComponent($(this).data('message'));
        var url = "https://wa.me/" + phoneNumber + "?text=" + message;

        window.location.href = url;
        return false;
    });
});



function startLoading() {
    var progressBar = document.getElementById('progress-bar');
    progressBar.style.transition = 'width 0.4s ease'; // Transition aktiv
    progressBar.style.width = '0%';

    setTimeout(function() {
        progressBar.style.width = '70%'; // Progresses to 70% during request
    }, 100);
}

function endLoading() {
    var progressBar = document.getElementById('progress-bar');

    progressBar.style.width = '100%';

    setTimeout(function() {
        progressBar.style.transition = 'none';

        progressBar.style.width = '0%';

        setTimeout(function() {
            progressBar.style.transition = 'width 0.4s ease';
        }, 50);
    }, 500);
}




$(function () {
    setTimeout(function () {
        $(".with-ul a i").click(function (e) {
            if($(this).parent().siblings('ul').hasClass('show')){
                $(this).parent().find('i.fas').addClass('fa-plus').removeClass('fa-minus');
            }else{
                $(this).parent().find('i.fas').addClass('fa-minus').removeClass('fa-plus');
            }
            $(this).parent().siblings('ul').toggleClass('show');
        });
    }, 500);




    $('#products_filter').on('change', 'input[type="checkbox"]', function() {
        var formData = $('#products_filter').serialize();
        startLoading()
        $.ajax({
            url: '/products/filter',
            method: 'GET',
            data: formData,
            success: function(response) {
                $("#brendList").html(response.brend)
                $("#productList").html(response.products)
                $("#parameterList").html(response.parameters)
                endLoading();
                setTimeout(function () {
                    $(".with-ul a i").click(function (e) {
                        if($(this).parent().siblings('ul').hasClass('show')){
                            $(this).parent().find('i.fas').addClass('fa-plus').removeClass('fa-minus');
                        }else{
                            $(this).parent().find('i.fas').addClass('fa-minus').removeClass('fa-plus');
                        }
                        $(this).parent().siblings('ul').toggleClass('show');
                    });
                }, 500);
            },
            error: function(xhr, status, error) {

            }
        });
    });

    $('body').on("click", '.widget-title-next', function (e) {

    });


});




