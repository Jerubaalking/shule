<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
            <i class="mdi mdi-account-minus title_icon"></i> <?php echo get_phrase('deductions'); ?>
            <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?php echo site_url('modal/popup/deductions/create'); ?>', '<?php echo get_phrase('add_deduction'); ?>')"> <i class="mdi mdi-plus"></i> <?php echo get_phrase('add_deduction'); ?></button>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body deduction_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>

<script>
    var showAllDeductions = function () {
        var url = '<?php echo route('deductions/list'); ?>';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('.deduction_content').html(response);
                initDataTable('basic-datatable');
            }
        });
    }
</script>