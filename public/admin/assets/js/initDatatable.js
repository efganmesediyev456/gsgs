
function getColumnsInitTable(dTableRoute,dTableSourceRoute, dTableElement = null, options = null){

    dTableElement = dTableElement == null ? 'datatable' : dTableElement;
    options = options == null ? [[10, 25, 50, 100, 300,'-1'], ['10 Ədəd', '25 Ədəd', '50 Ədəd', '100 Ədəd', '300 Ədəd', 'Hamısı']] : options;
    return new Promise((resolve, reject) => {
        $.ajax({
            url: dTableRoute,
            type:'get',
            success:function (result){
                let dt = initTable(result, dTableSourceRoute, dTableElement, options);
                resolve(dt);
            },
            error:function (error){
                reject(error);
            }
        });
    });
}


function initTable(_columns, dTableSourceRoute, dTableElement, options, callback) {
    console.log('calis')
    if (typeof __cusomParam !== 'undefined' && __cusomParam !== null) {
        __cusomParam = __cusomParam.replace("amp;", "");
    }
    window.dTable = dTableElement.DataTable({
        ...rowReorderConfig,
        "language": {
            "url": "/admin/json/az.json"
        },
        "lengthMenu": options,
        buttons: [],
        "ajax": {
            url: dTableSourceRoute,
            type: "GET", //POST
            data: function(d) {
                var customParams = get_query(__cusomParam);
                customParams.sorted = '1';
                customParams.imageable_id = imageable_id;
                customParams.imageable_type  = imageable_type;
                $.extend(d, customParams);
            }
        },
        columns: _columns,
        serverSide: true,
        responsive: false,
        lengthChange: true,
        processing: true,
        order: [
            [0, 'desc']
        ],
        "columnDefs": [{
            // "className": "dt-center",
            "targets": "_all"
        },
            {
                orderable: false,
                targets: [0]
            },
            {
                targets: 'no-sort',
                orderable: false
            }
        ],
        "fnPreDrawCallback": function() {
            //alert("Pre Draw");
            setTimeout(function() {
                initDatatableUiElements();
            }, 1);
            $('#dataTables_processing').attr('style',
                'font-size: 20px; font-weight: bold; padding-bottom: 60px; display: block; z-index: 10000 !important'
            );
        },
        "initComplete": function(settings, json) {
            if (typeof callback === 'function') {
                callback();
            }
        },
        "createdRow": function(row, data, dataIndex) {
            $(row).attr('data-id', data.id);
        }
    });





    return window.dTable;
}



$(function (){
    setTimeout(function () {

        window.dTable.on('row-reorder', function (e, diff, edit) {
            var reorderedData = [];

            for (var i = 0, ien = diff.length; i < ien; i++) {
                reorderedData.push({
                    id: window.dTable.row(diff[i].node).data().id, // Satır ID'si alınıyor
                    newPosition: diff[i].newPosition // newPosition doğru alan olarak kullanılmalı
                });
            }

            console.log(reorderedData);

            if (reorderedData.length) {
                $.ajax({
                    url: '/gopanel/process/order/datatable',
                    method: 'POST',
                    data: {
                        reorderedData: reorderedData,
                        model:model
                    },
                    success: function (response) {
                        toastr.success(response.message);
                    }
                });
            }
        });
    }, 2000);

})
