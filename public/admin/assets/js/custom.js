$(function (){
    // $('.tags').each(function() {
    //     new Tagify(this);
    // });

    $('.tagsview').tagsInput({
        width: 'auto'
    });



})





$('.ckeditor').each(function() {
    var locale = 'az'
    CKEDITOR.replace(this.id, {
        toolbar: [
            { name: 'document', items: ['Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates'] },
            { name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll'] },
            { name: 'forms', items: ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'] },
            '/',
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript', '-', 'RemoveFormat'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
            { name: 'links', items: ['Link', 'Unlink', 'Anchor'] },
            { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe'] },
            '/',
            { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize'] },
            { name: 'colors', items: ['TextColor', 'BGColor'] },
            { name: 'about', items: ['About'] }
        ],
        language: 'az',
        allowedContent : true
    });
});




function add_ckeditor_to_formdata(formdata){
    for (var instanceName in CKEDITOR.instances) {
        if (CKEDITOR.instances.hasOwnProperty(instanceName)) {
            var editor = CKEDITOR.instances[instanceName];
            var name = editor.element.$.name;
            var data = editor.getData();
            formdata.append(name, data);
            console.log(`Added ${name}: ${data}`);
        }
    }
}

$(".icon_class").on("click", function (){
    $("#staticBackdrop").modal("show");
})


$('.iconslist i').click(function (){
    var icon=$(this).attr('class').trim();
    $("[name='icon_class']").val(icon);
    $("#staticBackdrop").modal("hide");
    $(".icon_class").html(`<span class="rightlove">Seçdiyiniz ikon:<i class="${icon}"></i></span>`)
})





//select2 get pagination function
function initializeSelect2(selector) {

    model = $(selector).data('model')
    column = $(selector).data("column")
    var route = $(selector).data("route")
    var selectedValues=$(selector).data("selected");
    console.log(selectedValues)

    if (selectedValues.length > 0) {
        let selectElement = $(selector);
        selectedValues.forEach(function(item) {
            let option = new Option(item[column], item.id, true, true);
            $(selector).append(option).trigger('change');
        });
    }

    $(selector).select2({
        placeholder: 'Choose ...',
        allowClear: true,
        ajax: {
            url: route,
            type: 'POST',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    search: params.term,
                    model: model,
                    page: params.page || 1
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.items, function(item) {
                        return {
                            id: item.id,
                            text: item[column]
                        };
                    }),
                    pagination: {
                        more: data.more
                    }
                };
            },
            cache: true
        }
    });
}


$(function (){
    $('.app-search input').on('input', function (){
        $('.search-list').slideDown();
        $('#searchDriverListBody li:not(:nth-child(1))').remove();
        $('#searchDriverListBody li:nth-child(1)').show();
        let route  = $(this).data("route");
        var search = $(this).val();
        $.ajax({
            url:route,
            type:'post',
            data:{'_token':token, search},
            success:function (e){
                $('#searchDriverListBody li:not(:nth-child(1))').remove();
                $('#searchDriverListBody li:nth-child(1)').hide();
                $('#searchDriverListBody').append(e.view);
            },
            error:function (e){
                console.log(e);
            }
        })

    })
});

$("body").on("click",".statuschanged input",function (){
    var id           =  $(this).parents('.statuschanged').attr('data-id')
    var row          =  $(this).parents('.statuschanged').attr('data-row')
    var model        =  $(this).parents('.statuschanged').attr('data-model')
    var url          =  $(this).parents('.statuschanged').attr('data-url');
    $.ajax({
        url: url,
        data:{ id : id, row : row, model : model, status:status},
        type:"post",
        success:function (e){
            if(window && window.dTable)
                window.dTable.draw();
            Swal.fire({
                'type':'success',
                icon:"success",
                text:"Uğurla dəyişdirildi",
                timer:1200,
                showConfirmButton:false,
            })
        },
        error:function (response){
            toastr.error(response.message);
        }
    })
})



$('.tags').tagsInput({
    width: 'auto'
});
