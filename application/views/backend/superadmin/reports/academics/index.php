<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
          <i class="mdi mdi-format-list-numbered title_icon"></i> <?php echo get_phrase('Reports'); ?>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<div class="row">
    <div class="col-12">
        <div class="card" style="background:#f2f2f2;">
            <div class="row mt-3">
                <div class="col-md-4 mb-1"></div>
                <div class="col-md-4 mb-1">
                  <div class="form-group">
                  <select name="user_id" id="user_id" class="form-control select2" data-toggle = "select2" required>
                        <option value=""><?php echo get_phrase('select_a_student'); ?></option>
                        <?php
                        $students = $this->db->get_where('students', array('school_id' => school_id()))->result_array();
                        foreach($students as $student){
                          $users = $this->db->get_where('users', array('school_id' => school_id()))->result_array();
                            foreach($users as $user){
                                if($user['id'] == $student['user_id']){
                            ?>
                            <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
                        <?php
                            }
                        }
                     } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4 mb-1"></div>
                <div class="col-md-4 mb-1"></div>
                <div class="col-md-4 mb-1">
                        <div class="form-group">
                        <div id="selectedValue" class="form-control text-center" data-toggle="date-picker-range" data-target-display="#selectedValue"  data-cancel-class="btn-light">
                            <i class="mdi mdi-calendar"></i>&nbsp;
                            <span id="selectedValue" style = "text-align: center;"> <?php echo date('F d, Y', $date_from).' - '.date('F d, Y', $date_to); ?> </span> <i class="mdi mdi-menu-down"></i>
                        </div>
                        </div>
                    </div>
                <div class="col-md-4 mb-1"></div>
                <div class="col-md-4 mb-1"></div>
                
                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary" onclick="getViewReport()" id="export-csv1"><?php echo get_phrase('filter'); ?></button>
                </div><div class="col-md-2">
                    <button class="btn btn-block btn-success" onclick="getExportUrl('pdf')" id="export-csv"><i class="mdi mdi-download"></i> <?php echo get_phrase('download'); ?></button>
                </div>
            </div>
            <div class="row" style="margin-top:15px;">
              <div class="col-1"></div>
          <div class="col-10">
            <div class="card">
              <div class="card-body report_content">
                  <div class="empty_box">
                      <img class="mb-3" width="150px" src="<?php echo base_url('assets/backend/images/empty_box.png'); ?>" />
                      <br>
                      <span class=""><?php echo get_phrase('no_data_found'); ?></span>
                  </div>
              </div>
                    </div>
                    </div>
        </div>
    </div>
</div>
<script>
    
function getViewReport() {
  var url = '<?php echo route('academics/list'); ?>';
  var dateRange = $('#selectedValue').text();
  var selectedUser = $('#user_id').val();
  $.ajax({
    type : 'post',
    url: url,
    data : {date : dateRange, selectedUser : selectedUser},
    success : function(response) {
      $('.report_content').html(response);
    }
  });
}
// $(document).ready(function(){
//   $('#export-csv').on('click', function(){
//   // alert('find the hill');
//     getExportUrl('pdf');
//   });
// });

function getExportUrl(type) {
  var url = '<?php echo route('academics/url'); ?>';
  var dateRange = $('#selectedValue').text();
  var selectedUser = $('#user_id').val();
  $.ajax({
    type : 'post',
    url: url,
    data : {type : type, dateRange : dateRange, selectedUser : selectedUser},
    success : function(response) {
      if (type == 'csv') {
        window.open(response, '_self');
      }else{
        window.open(response, '_self');
      }
    }
  });
}
// function getDocument(url) {
//         const blobTest =  new Blob([url], { type: 'application/pdf' });
//         const fileUrl = URL.createObjectURL(blobTest );
//         return fileUrl;
//     }
</script>