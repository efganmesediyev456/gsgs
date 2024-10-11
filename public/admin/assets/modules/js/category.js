function getForm(route) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: route,
            data: {show:true},
            type: 'GET',
            success: function (response) {
                resolve(response);
            },
            error: function (e) {
                reject(e);
            }
        });
    });
}



$("body").on("click", "#openmodal", function(e){
    e.preventDefault();
    let route   = $(this).attr("data-route");
    let formDiv = $("#formDiv");
    if (formDiv.attr("loaded") != 'true') {
        loader();
        getForm(route,formDiv).then(response => {
            if (response.status == 'success') {
                $("#categoryModal").modal("show");
                formDiv.html(response.html);
                $('#saveForm .tab-pane').hide()
                $('#saveForm .tab-pane').eq(0).show()
                $('.tagsview').tagsInput({
                    width: 'auto'
                });
            }
            else{
                basicAlert(response.message,response.status);
            }
        }).catch(error => {
            console.log(error);
            showError(error);
        }).finally(() => {
            loader(0);
        });
    }
});

$("body").on("click","#saveSale", function(e){
    e.preventDefault();
    let form = $("#saveForm");
    if (!validateForm(form)) {
        return;
    }
    loader();
    saveForm(form).then(response => {
        if (response.status == 'success') {
            $("#categoryModal").modal("hide");
            // window.dTable.ajax.reload();
            if(response.status == 'success'){
                clearForm("#saveForm");
                loader(1);
                window.location.reload();
            }
        }
        basicAlert(response.message,response.status);
    }).catch(error => {
        console.log(error);
        loader(0);
        showError(error);
    }).finally(() => {
        // loader(0);
    });
});



function saveForm(form){
    return new Promise((resolve, reject) => {
        var formData = new FormData(form[0]);
            $.ajax({
                url: form.attr("action"),
                data: formData,
                type: 'POST',
                processData: false, // Prevent jQuery from automatically transforming the data into a query string
                contentType: false, // Prevent jQuery from automatically setting the Content-Type header
                success: function (response) {
                    // Handle success
                    resolve(response);
                },
                error: function (e) {
                    // Handle error
                    reject(e);
                }
            });
    });
}



$("body").on("click", ".edit-category", function(e){
    e.preventDefault();
    let route   = $(this).attr("data-route");
    let formDiv = $("#formDiv");
    loader();
    getForm(route,formDiv).then(response => {
        if (response.status == 'success') {
            $("#categoryModal").modal("show");
            formDiv.html(response.html);
            $('#saveForm .tab-pane').hide();
            $('#saveForm .tab-pane').eq(0).show()
            $('.tagsview').tagsInput({
                width: 'auto'
            });
        }
        else{
            basicAlert(response.message,response.status);
        }
    }).catch(error => {
        console.log(error);
        showError(error);
    }).finally(() => {
        loader(0);
    });
});


$(function (){
    $("body").on("click", "#saveForm .nav-item", function(e){
        var index = $(this).index();
        $('#saveForm .tab-pane').hide();
        $('#saveForm .tab-pane').eq(index).show();
    });
})
