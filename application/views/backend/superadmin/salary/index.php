<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
          <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('salaries'); ?>
          <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="rightModal('<?php echo site_url('modal/popup/salary/create'); ?>', '<?php echo get_phrase('pay_salary'); ?>')"> <i class="mdi mdi-plus"></i> <?php echo get_phrase('pay_salary'); ?></button>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body salary_content">
        <?php include 'list.php'; ?>
      </div>
    </div>
  </div>
</div>

<script>
var showAllSalaries = function () {
  var url = '<?php echo route('salary/list'); ?>';

  $.ajax({
    type : 'GET',
    url: url,
    success : function(response) {
      $('.salary_content').html(response);
      initDataTable('basic-datatable');
    }
  });
}
</script>
