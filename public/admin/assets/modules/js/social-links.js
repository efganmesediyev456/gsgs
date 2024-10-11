
$("body").on("click","#saveFormBtn", function(e){
    e.preventDefault();
    let form = $("#saveForm");
    if (!validateForm(form)) {
        return;
    }
    loader();
    saveForm(form).then(response => {

        console.log(response)
       if(response.status == 'success'){
           if(response.data.create)
           clearForm("#saveForm");
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



$("body").on("click", ".edit-city", function(e){
    e.preventDefault();
    let route   = $(this).attr("href");
    let formDiv = $("#formDiv");
    loader();
    getForm(route,formDiv).then(response => {
        if (response.status == 'success') {
            $("#brandsModal").modal("show");
            formDiv.html(response.html);
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
