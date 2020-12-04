
function getDepartemen(id){
    var idIndoEN=departemen[id].split('@@');
    
    var idDep=idIndoEN[0];
    var indo=idIndoEN[1];
    var en=idIndoEN[2];
    $('#spID').html("JADWAL DOKTER - "+indo.toUpperCase());
    $('#spEN').html("DOCTOR SCHEDULE - "+en.toUpperCase());
    loadDatanya(idDep);
}

function loadDatanya(idDep)
{
    var jadwal = $('#schedule-datatables').DataTable({
        paging : false,
        searching : false,
        ordering : false,
        lengthChange : false,
        bInfo : false,
        "pageLength" : 10,

        "processing": true,
        "serverSide": true,
        "ajax": {
            "url" : window.location.origin+"/JadwalDokter/Home/listSchedule",
            "dataType": "json",
            "type": "POST",
            data: function (d) {
                // d.filter=$('#filter').val();
                d.departemen=idDep;
            },

            "complete": function (json, type) {
                    // console.log(json);
                    temp=json['responseText'].substr ( json['responseText'].indexOf ( 'token' ) + 8 );
                    temp2=temp.split('"');
                    $token=temp2[0];
                // $('#token').val(temp2[0]);

            },
            "error": function (xhr, ajaxOptions, thrownError) {
                //alert(xhr.status);
                // alert(xhr.responseText);
                console.log(xhr.responseText);
                // alert(thrownError);
            }
        },
        "columns": [
            {"data":'nama', "width":"20%"},
            {"data":'senin' , "width":"10%"},
            {"data":'selasa' , "width":"10%"},
            {"data":'rabu' , "width":"10%"},
            {"data":'kamis' , "width":"10%"},
            {"data":'jumat' , "width":"10%"},
            {"data":'sabtu' , "width":"10%"},
        ],
    });

    jadwal.destroy();
}