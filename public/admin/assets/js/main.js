document.addEventListener("DOMContentLoaded", function() {

    if (typeof toastr != 'undefined') {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        // toastr["success"]("Are you the six fingered man?");
    }
    //Toltip
    initToltip()

    if($(".sortableBasic").length){
        $(function() {
            $(".sortableBasic").sortable();
            $(".sortableBasic").disableSelection();
        });
    }

    if($(".sortableIcon").length){
        $(function() {
            $(".sortableIcon").sortable({
                handle: "td.sort-td",
                axis: "y"
            });
        });
    }
});



var token = document.querySelector('meta[name="csrf-token"]') != null ? document.querySelector('meta[name="csrf-token"]').getAttribute('content') : null;
var currentUrl = window.location.href;
window.dTable = null;

function pageLoader(status=1,text='Loading...') {
  if (status == 0) {
      $("#pageLoader").fadeOut(200, function() {
          $(this).remove();
      });
  } else {
      if ($("#pageLoader").length == 0) {
          $("body").append("<div id='pageLoader' style='position:fixed;top:0;left:0;width:100%;height:100%;z-index:999999999;background: rgba(0,0,0,0.4);'><div style='width: 120px; height: 40px; position: absolute; top: 0px; bottom: 0px; left: 0px; right: 0px; margin: auto; background: none repeat scroll 0% 0% rgb(238, 238, 238); text-align: center; line-height: 38px; border: 1px solid rgb(221, 221, 221); vertical-align: middle; border-radius: 5px ! important; color: rgb(131, 131, 131);'><i class='fa fa-spinner fa-spin'></i> "+text+"</div></div>");
          $("body>div:last").hide().fadeIn(200);
      }
  }
  setTimeout(function(e){
      $("#pageLoader").fadeOut(200, function() {
          $(this).remove();
      });
  }, 30000);
}


function printData(divToPrint){
    //    var divToPrint = document.getElementById("printTable");
    newWin= window.open("");
    newWin.document.write(divToPrint.outerHTML);
    newWin.print();
    newWin.close();
}



// const axiosInstance = axios.create({
//     headers: {
//         'X-CSRF-TOKEN': token
//     }
// });

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': token
    }
});

function basicAlert(html,type='error') {
    Swal.fire({html:html, type:type});
}



function basicDataTabel(element,exportColunm){
    $(element).DataTable({
        // dom: '<"html5buttons"B>lTfgitp',
        dom: '<"html5buttons"B>lTfgitp',
        "language": {
            "url": "/json/table_az.json"
        },
        "lengthMenu": [ [10, 25, 50, 100, -1], ['10 Ədəd', '25 Ədəd', '50 Ədəd', '100 Ədəd', "Hamısı"] ],
        order:[
            [0, 'asc']
        ],
        buttons: [
            {
                extend: 'copy',exportOptions: {columns: exportColunm},
                text: ' Kopyala',
                className: 'far fa-copy fa-2x copy_icon'
            },
            {
                extend: 'csv',exportOptions: {columns: exportColunm},
                text: ' CSV',
                className: 'fas fa-file-csv fa-2x csv_icon'
            },
            {
                extend: 'excel',exportOptions: {columns: exportColunm}, title: 'ExampleFile',
                text: ' Excel',
                className: 'fas fa-file-excel fa-2x excel_icon'
            },
            // {extend: 'pdf', title: 'ExampleFile'},
            {
              extend: 'pdf',
              text: ' PDF',
              className: 'far fa-file-pdf fa-2x pdf_icon',
              customize: function (doc) {
                doc.content[1].table.widths =
                    Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                // doc.content[1].margin = [ -50, 0, 50, 0 ];
              },
              exportOptions: {columns: exportColunm}
            },
            {extend: 'print',
                 text: ' Çap',
                 className: 'fas fa-print fa-2x print_icon',
                 customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                },
                exportOptions: {columns: exportColunm}
            },
            {extend: 'colvis'}
        ],
        "filter": true,
        "responsive": false,
        "processing": true,
        "columnDefs": [
            {"className": "dt-center", "targets": "_all"}
        ],
        "fnPreDrawCallback":function(){
            setTimeout(function(){
                $('.status').bootstrapToggle()
             }, 1);
            $('#example_processing').attr('style', 'font-size: 20px; font-weight: bold; padding-bottom: 60px; display: block; z-index: 10000 !important');
        }
    });
}


function copyToClipboard(text) {
    const textarea = document.createElement('textarea');
    textarea.value = text;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');
    document.body.removeChild(textarea);
}


if($(".select2").length){
    $(".select2").select2();
}


function convertToJsonIfNeeded(data,includes = []) {
    for (const key in data) {
        if (includes.includes(key) && data[key] !== null) {
            try {
                console.log(data[key]);
                data[key] = JSON.parse(data[key]);
                console.log(data[key]);
            } catch (error) {
                console.error(error);
            }
        }
    }
    return data;
}

var routes;
function getRouteLists(route = '/gopanel/general/get/route') {
    let routes = localStorage.getItem('routes');
    if (routes) {
        return new Promise((resolve, reject) => {resolve(JSON.parse(base64Decode(routes)))});
    } else {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: route,
                data: { show: true },
                type: 'GET',
                success: function (response) {
                    localStorage.setItem('routes', base64Encode(JSON.stringify(response)));
                    resolve(response);
                },
                error: function (e) {
                    console.error('AJAX error:', e);
                    reject(e);
                }
            });
        });
    }
}

getRouteLists().then(function(response) {
    routes = response; // Assign resolved routes to the variable
}).catch(function(error) {
    console.error('Error getting routes:', error);
});

function route(routeName,param = null) {
    let route = routes.find(r => r.name === routeName);
    if (route) {
        let url = route.url;
        if (!url.endsWith('/') && param != null) {
            url += '/';
        }
        if (param != null) {
            return url + param;
        }
        return url;
    } else {
        console.error('Route notfound:', routeName);
        return null;
    }
}

function base64Encode(str) {
    return btoa(unescape(encodeURIComponent(str)));
}

function base64Decode(str) {
    return decodeURIComponent(escape(atob(str)));
}

function optimize() {
    let cookies = document.cookie.split("; ");
    for (let c of cookies) {
        let cookieName = c.split("=")[0];
        document.cookie = cookieName + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }
    sessionStorage.clear();
    localStorage.clear();

    console.info("Successfuly cleared all data");
}


function initToltip(){
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
}

function getQueryParams() {
    return location.search
        ? location.search.substr(1).split`&`.reduce((qd, item) => {let [k,v] = item.split`=`;
        v = v && decodeURIComponent(v); (qd[k] = qd[k] || []).push(v); return qd}, {})
        : {}
}


function initDatatableUiElements(){
    if ($('input.status').length > 0) {
        $('input.status').bootstrapToggle();
    }
    initToltip();
}



function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

function get_query(text = ''){
    var url = location.search + text;
    var qs = url.substring(url.indexOf('?') + 1).split('&');
    for(var i = 0, result = {}; i < qs.length; i++){
        qs[i] = qs[i].split('=');
        result[qs[i][0]] = decodeURIComponent(qs[i][1]);
    }
    return result;
}

//   $.fn.selectpicker.Constructor.BootstrapVersion = '5';

if($('.bs-select').length){
    $('.bs-select').selectpicker();
}




function loader(status=1,text='Gözləyin...') {
    if (status == 0) {
        $("#pageLoader").fadeOut(200, function() {
            $(this).remove();
        });
    } else {
        if ($("#pageLoader").length == 0) {
            $("body").append("<div id='pageLoader' style='position:fixed;top:0;left:0;width:100%;height:100%;z-index:999999999;background: rgba(0,0,0,0.4);'><div style='width: 120px; height: 40px; position: absolute; top: 0px; bottom: 0px; left: 0px; right: 0px; margin: auto; background: none repeat scroll 0% 0% rgb(238, 238, 238); text-align: center; line-height: 38px; border: 1px solid rgb(221, 221, 221); vertical-align: middle; border-radius: 5px ! important; color: rgb(131, 131, 131);'><i class='fa fa-spinner fa-spin'></i> "+text+"</div></div>");
            $("body>div:last").hide().fadeIn(200);
        }
    }
    setTimeout(function(e){
        $("#pageLoader").fadeOut(200, function() {
            $(this).remove();
        });
    }, 30000);
}




function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}


function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function showError(error){
    let errorMessage = 'An error occurred';
    if (error.responseJSON && error.responseJSON.message) {
        errorMessage = error.responseJSON.message;
    } else if (error.responseText) {
        errorMessage = error.responseText;
    }
    basicAlert(errorMessage, 'error');
}


function validateForm(formElement) {
    let isValid = true;

    $(formElement).find('input[required], select[required], textarea[required]').each(function() {
        $(this).removeClass('errorinput');
    });
    $(formElement).find('input[required], select[required], textarea[required]').each(function() {
        if ($(this).is('input[type="radio"], input[type="checkbox"]')) {
            // Radio button veya checkbox kontrolü
            const groupName = $(this).attr('name');
            if ($(`input[name="${groupName}"]:checked`).length === 0) {
                $(`input[name="${groupName}"]`).addClass('errorinput');
                const errorMsg = $(this).data('error-msg');
                basicAlert(errorMsg);
                isValid = false;
                return false;
            }
        } else if ($(this).is('select')) {
            // Select kontrolü
            if ($(this).val() === '') {
                $(this).addClass('errorinput');
                const errorMsg = $(this).data('error-msg');
                basicAlert(errorMsg);
                isValid = false;
                return false;
            }
        } else {
            if ($(this).val().trim() === '') {
                $(this).addClass('errorinput');
                const errorMsg = $(this).data('error-msg');
                basicAlert(errorMsg);
                isValid = false;
                return false;
            }
        }
    });
    return isValid;
}


function clearForm(formId) {
    let form = $(formId)[0];
    $(form).find('select, input, textarea').each(function() {
        if ($(this).is('select')) {
            $(this).val('').trigger('change');
        } else if ($(this).is(':checkbox') || $(this).is(':radio')) {
            // $(this).prop('checked', false);
        } else {
            $(this).val('');
        }
    });
    for (var instanceName in CKEDITOR.instances) {
        if (CKEDITOR.instances.hasOwnProperty(instanceName)) {
            CKEDITOR.instances[instanceName].setData('');
        }
    }
}

function addselect2(id,modal){
    $(id).select2({
        dropdownParent: $(modal),
        width:"100%"
    });
}


$('body').on('click','.basedelete', function (){
    var model          =   $(this).attr('data-model');
    var id             =   $(this).attr('data-id');
    var route          =   $(this).attr('data-route');
    var hard           =   $(this).attr('data-hard');
    var permission     =   $(this).attr('data-permission');
    var _this          =   $(this).parents('tr');
    Swal.fire({
        title: 'Silmək istədiyinizə əminsiniz?',
        text: 'Qalıcı olaraq silinəcək',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Bəli, sil',
        cancelButtonText: 'Xeyr, silmə',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url:route,
                data:{model:model, id:id,hard:hard, permission:permission},
                method:'POST',
                success: function (response) {
                    pageLoader(false);
                    basicAlert(response.message, response.status);
                    _this.remove();
                },
                error: function (e) {
                    console.log(e);
                    pageLoader(false);
                    basicAlert(e.responseJSON.message, 'error');
                }
            })
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire('Ləğv olundu', 'Silinmə funksiyası ləğv edildi', 'error');
        }
    });
});


$("body").on("change",".status", function(e){
    let status  = $(this).prop('checked');
    let row     = $(this).attr("data-row");
    let id      = $(this).attr("data-id");
    let model   = $(this).attr("data-model");
    let route   = $(this).attr("data-route");
    if(id > 0){
        $.ajax({
            url: route,
            data: {id:id,row:row,model:model,status:status},
            // contentType: "application/json",
            type: 'POST',
            success: function (response) {
                toastr[response.status](response.message)
                // basicAlert(response.message, response.status);
                if(response.status == 'success' && window.dTable != null){
                    window.dTable.ajax.reload();
                }
            },
            error: function (e) {
                console.log(e);
                showError(e);
            }
        });
    }
});


$('body').on('click','.basearchive', function (){
    var key         =   $(this).attr('data-key');
    var uid         =   $(this).attr('data-uid');
    var route       =   $(this).attr('data-route');
    var hash        =   $(this).attr('data-hash');
    var _this       =   $(this).parents('tr');
    Swal.fire({
        title: 'Arxivləmək istədiyinizə əminsiniz?',
        text: 'Geri qaytarmaq üçün adminstrator ilə əlaqə saxlamalısınız',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Bəli, arxivlə',
        cancelButtonText: 'Xeyr, arxivləmə',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:route,
                data:{key:key, uid:uid, hash:hash},
                method:'POST',
                success: function (response) {
                    pageLoader(false);
                    basicAlert(response.message, response.status);
                    _this.remove();
                },
                error: function (e) {
                    console.log(e);
                    pageLoader(false);
                }
            })
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire('Ləğv olundu', 'Arxivləmə funksiyası ləğv edildi', 'error');
        }
    });
});


$(".sortable").on("sortupdate", function(event,ui){
    let data    = $(this).sortable("serialize");
    let row     = $(this).attr("data-row");
    let model   = $(this).attr("data-model");
    $.ajax({
        url: '/gopanel/general/sortable',
        data: {data:data,row:row,model:model},
        method: 'POST',
        success: function (response) {
            toastr[response.status](response.message)
            if(response.status == 'success' && window.dTable != null){
                window.dTable.ajax.reload();
            }
        },
        error: function (e) {
            console.log(e);
            showError(e);
        }
    });
});

var options = {
    filebrowserImageBrowseUrl: '/'+ 'gopanel'+'/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/'+'gopanel'+'/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/'+'gopanel'+'/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/'+'gopanel'+'/laravel-filemanager/upload?type=Files&_token=',
    allowedContent : true,
};

CKEDITOR.editorConfig = function(config) {
    config.toolbar = [
        { name: 'document', items: [ 'Source' ] },
        { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'Undo', 'Redo' ] },
        { name: 'editing', items: [ 'Find', 'Replace', 'SelectAll' ] },
        { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline' ] },
        { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', 'Blockquote' ] },
        { name: 'links', items: [ 'Link', 'Unlink' ] },
        { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule' ] },
        { name: 'styles', items: [ 'Styles', 'Format' ] },
        { name: 'tools', items: [ 'Maximize' ] }
    ];
    config.extraPlugins = 'sourcearea';
};

function ckeditorSet(){
    document.querySelectorAll('.ckeditor').forEach(function(textarea) {
        CKEDITOR.replace(textarea, options);
    });
}
