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

        <?php if($halaman=="doktor"){?>
            const listDokter=[];
            var counterDokter=0;
            
            <?php foreach($doktor as $dok){?>
                listDokter.push('<?php echo ($dok->nama."@@".$dok->namaDepartemen."@@".$dok->departementName."@@".$dok->foto); ?>');
            <?php } ?>
            
            function isiDokter(){
                if(counterDokter>=listDokter.length){
                    // window.location.href = '<?php echo base_url() ?>Home/';
                }
                var isi='';
                var currDept=listDokter[counterDokter].split('@@');
                $('#namaDep').html(currDept[1]+' | '+currDept[2]);
                for($i=0;$i<3;$i++){
                    if(counterDokter<listDokter.length){
                        var dataDokter=listDokter[counterDokter].split('@@');
                        if(dataDokter[1]==currDept[1]){
                            isi+=`<div class="col-sm-6" style="background-image: url('../assets/img/bg/frame1.png');height:33%">`+
                                `<div class="row mt-2 px-0 py-0">`+
                                    `<div class="col">`+
                                    `<img class="mt-4 ml-3" src="../assets/img/doktor/`+dataDokter[3]+`" style="height: 245px;width:300px">`+
                                    `</div>`+
                                    `<div class="col" style="color:black;font-weight:bolder;font-size:3vh;margin-top:9vh;margin-left:-2vw;text-align:justify">`+
                                        dataDokter[0]+
                                    `</div>`+
                                `</div>`+
                            `</div>`;
                            counterDokter++;
                        }
                    }
                    if(counterDokter<listDokter.length){
                        var dataDokter=listDokter[counterDokter].split('@@');
                        if(dataDokter[1]==currDept[1]){
                            isi+=`<div class="col-sm-6" style="background-image: url('../assets/img/bg/frame2.png');height:33%">`+
                                `<div class="row mt-2 px-0 py-0">`+
                                    `<div class="col">`+
                                    `<img class="mt-4 ml-3" src="../assets/img/doktor/`+dataDokter[3]+`" style="height: 245px;width:290px">`+
                                    `</div>`+    
                                    `<div class="col" style="color:black;font-weight:bolder;font-size:3vh;margin-top:8vh;margin-left:-2vw;text-align:justify">`+
                                        dataDokter[0]+
                                    `</div>`+
                                `</div>`+
                            `</div>`;
                            counterDokter++;
                        }
                    }
                }
                
                $('#rowDoktor').html(isi);
                var dd = setTimeout(isiDokter,10000);
            }
        <?php }?>

        $(document).ready( function () {
            startTime();
            <?php if($halaman=="doktor"){ ?>
            isiDokter();
            <?php } ?>
            <?php if($halaman=="home"){ ?>
            var tabelSchedule = $('#tableDataTable').DataTable({
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
            setInterval(function(){ 
                var info = tabelSchedule.page.info();
                var pageNum = (info.page < info.pages) ? info.page + 1 : 1;
                tabelSchedule.page(pageNum).draw(false);    
            }, 60000);
            <?php } ?>
        });
    </script>
</html>