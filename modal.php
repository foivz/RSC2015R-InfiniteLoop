<?php include "konfiguracija.php"; ?>
<div class="modal fade" id="mojPrviModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="modalExit">&times;</span></button>  
      </div>
      <div class="modal-body">
        <img src="http://placehold.it/150x150" alt="Avatar" class="img-circle modalAvatar">
        <p class="imePrezime">Ime Prezime</p>
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-6">
              <p class="nazivStatistike">Won</p>
              <p class="modalStatistika">7</p>
            </div>
            <div class="col-md-6">
              <p class="nazivStatistike">Lost</p>
              <p class="modalStatistika">4</p>
            </div>
            <img src="slike/share.png" class="pull-right">
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->