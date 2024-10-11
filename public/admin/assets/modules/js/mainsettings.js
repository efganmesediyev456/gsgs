
$("body").on("click","#saveFormBtn", function(e){
    e.preventDefault();
    let form = $("#saveForm");
    if (!validateForm(form)) {
        return;
    }
    loader();
    saveForm(form).then(response => {
        if (response.status == 'success') {
            $("#brandsModal").modal("hide");
            if(response.status == 'success'){
                clearForm("#saveForm");
                window.dTable.ajax.reload();
            }
        }
        basicAlert(response.message,response.status);
    }).catch(error => {
        console.log(error);
        loader(0);
        showError(error);
    }).finally(() => {
        loader(0);
    });
});



function saveForm(form){
    return new Promise((resolve, reject) => {
        var formData = new FormData(form[0]);
        add_ckeditor_to_formdata(formData);
        formData.append('_method','PUT')
            $.ajax({
                url: form.attr("action"),
                data: formData,
                type: 'POST',
                processData: false,
                contentType: false,
                success: function (response) {
                    if(response.status == 'success'){
                        loader(0);
                    }
                    basicAlert(response.message,response.status);
                },
                error: function (e) {
                    // Handle error
                    reject(e);
                }
            });
    });
}


