    <!-- Main JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <!-- Optional JavaScript -->
    <!-- Sweet Alert -->
    <script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
    <!-- Datatables -->
    <script src="../assets/js/plugin/datatables/datatables.min.js"></script>
    <script>
        function startTime() {
            var today = new Date();
            var hariID=["Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu"];
            var hariEN=["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
            var dayID = hariID[today.getDay()-1];
            var dayEN = hariEN[today.getDay()-1];
            var bulanEN = ["January","February","March","April","May","June","July","August","September","October","November","December"];
            var bulanID = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
            var dd = today.getDate();
            var mmID = bulanID[today.getMonth()];
            var mmEN = bulanEN[today.getMonth()];
            var yyyy = today.getFullYear();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('jam').innerHTML =
            dayID + ", " + dd + " " + mmID + " " + yyyy + " " + h + ":" + m + ":" + s + "<br>" + dayEN + ", " + dd + " " + mmEN + " " + yyyy + " " + h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 1000);
        }
        
        function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }

        $(document).ready( function () {
            startTime();
            $('#tableDataTable').DataTable({
                // paging : false,
                searching : false,
                ordering : false,
                lengthChange : false,
                bInfo : false,
                "pageLength" : 10,

                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url" : window.location.origin+"/JadwalPoli/Home/listSchedule",
                    "dataType": "json",
                    "type": "POST",
                    data: function (d) {
                        d.filter=$('#filter').val();
                        // d.departemen=idDep;
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
                    {"data":'paramedicname', "width":"35%",},
                    {"data":'doctor_speciality' , "width":"30%"},
                    {"data":'time_slot' , "width":"10%"},
                    {"data":'room' , "width":"10%"},
                    {"data":'status' , "width":"15%"},
                ],
            });
        });
    </script>
</html>