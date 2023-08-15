<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
            <i class="mdi mdi-navigation title_icon"></i> <?php echo get_phrase('bus_routes'); ?>
            <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?php echo site_url('modal/popup/bus_routes/create'); ?>', '<?php echo get_phrase('add_bus_route'); ?>')"> <i class="mdi mdi-plus"></i> <?php echo get_phrase('add_bus_route'); ?></button>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body route_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>

<script>
    var showAllRoutes = function () {
        var url = '<?php echo route('bus_routes/list'); ?>';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('.route_content').html(response);
                initDataTable('basic-datatable');
            }
        });
    }
</script>
