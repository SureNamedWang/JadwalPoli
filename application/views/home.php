<body class="bg-dark container" id="bodyMain">
  <div class="row">
    <div class="col"></div>
    <div class="col">
      <button id="btnJudul" class="button btn btn-light my-2">
        <p id="judulID">DOCTOR SCHEDULE LIST</p>
        <p id="judulEN">Jadwal Praktek Dokter</p>
      </button>
    </div>
    <div class="col">
      <button id="jam" class="button btn btn-light">12:00:00</button>
    </div>
  </div>
  <div class="row" id="rowDataTable">
    <div class="col">
      <img src="../assets/img/bg/characters.png" id="imgChar">
    </div>
    <div class="col-sm-10" id="colDataTable">
      <table class="table table-light table-striped table-borderless" id="tableDataTable">
        <thead style="height:10px!important;">
          <th>DOCTOR</th>
          <th>SPECIALTY</th>
          <th>SCHEDULE</th>
          <th>ROOM</th>
          <th>STATUS</th>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <!-- <div class="col">
            
    </div> -->
  </div>
  <div class="row" id="rowFooter">
    <div class="col"></div>
    <div class="col-sm-8">
      <div class="row">
        <div class="col" id="textFooter1">
          Info & Appointment
        </div>
        <div class="col" id="textFooter2">
          031-2975 777 EXT 2001/2002
        </div>
        <div class="col-sm-1">
          <img src="../assets/img/bg/cross.png" id="imgCross">  
          <img src="../assets/img/bg/hearth.png" id="imgHeart">  
          <img src="../assets/img/bg/capsule.png" id="imgCapsule">
        </div>
        <marquee behavior="scroll" direction="left" style="color:white;font-weight:900;font-size:2vh">
          WIFI : user:nhpatient pass:nh123456
        </marquee>
      </div>
    </div>
    <div class="col">
      
    </div>
  </div>
</body>