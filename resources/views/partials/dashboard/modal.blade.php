{{-- Employer --}}
<div id="emplomodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="employer" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
       <h3 class="col-12 modal-title text-center">Employer</h3>    
     </div>
     <div class="modal-body">
       <div class="row">
        <div class="col-lg">
         <h1 class="display-4"><strong>FERNANDO P. JUNIOR</strong></h1>
         <p><strong>Kompanya:</strong> ABS-GMA TV5</p>
         <p><strong>Address:</strong> BALETE DRIVE</p>
         <p><strong>Cellphone Number:</strong> 31415926</p>
         <p><strong>Mga Kinakailangan:</strong></p>
         @foreach()
         @endforeach()
       </div>
       <div class="col-lgt">
         <img src="img/emplo1x1.png" alt="1x1pic" class="img-thumbnail rounded float-right mr-3">
       </div>
     </div>
     <div class="modal-footer p-2">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Sarado</button>
    </div>
  </div>
</div>

{{-- Applicant --}}
<div class="modal fade applimodal" tabindex="-1" role="dialog" aria-labelledby="applicant" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="col-12 modal-title text-center">Aplikante</h3>    
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg">
            <h1 class="display-4"><strong>NARUTO SHIPPUDEN</strong></h1>
            <p><strong>Antas ng Edukasyon:</strong> S-RANK GENIN</p>
            <p><strong>Kaarawan:</strong> YYYY/MM/DD</p>
            <p><strong>Cellphone Number:</strong> 870055555911</p>
            <p><strong>Tirahan:</strong> KONOHA VILLAGE</p>
            <p><strong>Clearance:</strong></p>
            @foreach()
            @endforeach()
            <p><strong>Kasanayan (Skills):</strong></p>
            @foreach()
            @endforeach()
          </div>
          <div class="col-lgt">
            <img src="img/appli1x1.png" alt="1x1pic" class="img-thumbnail rounded float-right mr-3">
          </div>
        </div>
        <div class="modal-footer p-2">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Sarado</button>
        </div>
      </div>
    </div>
  </div>
</div>