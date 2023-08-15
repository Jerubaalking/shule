<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
          <i class="mdi mdi-bus title_icon"></i>Transportation Vehicles
          <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?php echo site_url('modal/popup/vehicle/create'); ?>', '<?php echo get_phrase('create_vehicle'); ?>')"> <i class="mdi mdi-plus"></i> <?php echo get_phrase('create_vehicle'); ?></button>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body vehicle_content">
        <?php include 'list.php'; ?>
      </div>
    </div>
  </div>
</div>

<script>
var showAllvehicles = function () {
  var url = '<?php echo route('vehicle/list'); ?>';
      console.log("response =====>>>> <?php echo route('vehicle/list'); ?>");
  $.ajax({
    type : 'GET',
    url: url,
    success : function(response) {
      // alert('show me vehcles');
      $('.vehicle_content').html(response);
      console.log("response =====>>>>", response);
      initDataTable('basic-datatable');
      // console.log(response);
    }
  });
}
</script>
