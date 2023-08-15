<?php
$school_id = school_id();
$users = $this->db->get_where('users', array('id'=>$user_id))->result_array();
$students = $this->db->get_where('students', array('user_id'=>$user_id))->result_array();
 ?>
  <h2 style="text-align: center;"><?php echo get_phrase('student_academic_report'); ?></h2>
    <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-8">
        <table id="basic-datatable" class="table table-bordered dt-responsive nowrap" width="100%" >
            <thead>
            <tr>
                <th><?php echo get_phrase('name').' : '.$users[0]['name']; ?></th>
                <th><?php echo get_phrase('year'); ?> : 2021</th>
            </tr>
            <tr>
            <th><?php echo get_phrase('class'); ?> : II</th>
            <th><?php echo get_phrase('term'); ?>: All</th>
            </tr>
            </thead>
            </tbody>
        </table>
    </div>
    
    <div class="col-sm-2">
        <img src="<?php echo 'http://localhost:8080/Ekattor/uploads/users/'.$users[0]['id'].'.jpg' ?>" style="width:100px; height:105px; border:2px solid #03254c;"/>
    </div>
    <!-- right table beside attendance -->
    <div class="col-sm-12">
        <table id="basic-datatable" class="table table-bordered dt-responsive nowrap" width="100%" >
            <thead>
            <tr>
                <th><?php echo get_phrase('subject');?></th>
                <th><?php echo get_phrase('term'); ?> I</th>
                <th><?php echo get_phrase('term'); ?> II</th>
                <th><?php echo get_phrase('average'); ?></th>
                <th><?php echo get_phrase('grade'); ?></th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <th>Mathematics</th>
            <td style="padding:0px;">
                <table id="basic-datatable" class="table table-bordered dt-responsive nowrap" width="100%" height="100%">
                    <tr>
                    <td>Weekly</td>
                    <td>Monthly</td>
                    <td>Terminal</td>
                    </tr>
                    <tr>
                    <td>50</td>
                    <td>80</td>
                    <td>75</td>
                    </tr>
                </table>
            </td>
            <td style="padding:0px;margin:0px;">
                <table id="basic-datatable" class="table table-bordered dt-responsive nowrap" width="100%">
                    <tr>
                    <td>Weekly</td>
                    <td>Monthly</td>
                    <td>Terminal</td>
                    </tr>
                    <tr>
                    <td>50</td>
                    <td>80</td>
                    <td>75</td>
                    </tr>
                </table></td>
            <td>70</td>
            <td>B+</td>
            </tr>
            <!-- table body subject 2 -->
            <tr>
            <th>Physics</th>
            <td style="padding:0px;">
                <table id="basic-datatable" class="table table-bordered dt-responsive nowrap" width="100%" height="100%">
                    <tr>
                    <td>Weekly</td>
                    <td>Monthly</td>
                    <td>Terminal</td>
                    </tr>
                    <tr>
                    <td>50</td>
                    <td>80</td>
                    <td>75</td> 
                    </tr>
                </table>
            </td>
            <td style="padding:0px;margin:0px;">
                <table id="basic-datatable" class="table table-bordered dt-responsive nowrap" width="100%">
                    <tr>
                    <td>Weekly</td>
                    <td>Monthly</td>
                    <td>Terminal</td>
                    </tr>
                    <tr>
                    <td>50</td>
                    <td>80</td>
                    <td>75</td>
                    </tr>
                </table></td>
            <td>70</td>
            <td>B+</td>
            </tr>
            </tbody>
        </table>        
    </div>
    <div class="col-sm-1"></div>
    <div class="col-sm-8">
        <table id="basic-datatable" class="table table-bordered dt-responsive nowrap" width="100%" >
            <thead>
            <tr>
                <th><?php echo get_phrase('attendance').' : '.$users[0]['name']; ?></th>
                <th><?php echo get_phrase('year'); ?> : 2021</th>
            </tr>
            <tr>
            <th><?php echo get_phrase('class'); ?> : II</th>
            <th><?php echo get_phrase('term'); ?>: All</th>
            </tr>
            </thead>
            </tbody>
        </table>
    </div>
    </div>
