<!-- Toastr and alert notifications for PHP scripts -->
<script type="text/javascript">
function notify(message) {
  $.NotificationApp.send("<?php echo get_phrase('heads_up'); ?>!", message ,"top-right","rgba(0,0,0,0.2)","info");
}

function success_notify(message) {
  $.NotificationApp.send("<?php echo get_phrase('congratulations'); ?>!", message ,"top-right","rgba(0,0,0,0.2)","success");
}

function error_notify(message) {
  $.NotificationApp.send("<?php echo get_phrase('oh_snap'); ?>!", message ,"top-right","rgba(0,0,0,0.2)","error");
}
</script>

<?php if ($this->session->flashdata('info_message') != ""):?>
<script type="text/javascript">
  // $.NotificationApp.send("<?php echo get_phrase('success'); ?>!", '<?php echo $this->session->flashdata("info_message");?>' ,"top-right","rgba(0,0,0,0.2)","info");
</script>
<?php endif;?>

<?php if ($this->session->flashdata('error_message') != ""):?>
<script type="text/javascript">
 // $.NotificationApp.send("<?php echo get_phrase('oh_snap'); ?>!", '<?php echo $this->session->flashdata("error_message");?>' ,"top-right","rgba(0,0,0,0.2)","error");
</script>
<?php endif;?>

<?php if ($this->session->flashdata('flash_message') != ""):?>
<script type="text/javascript">
 // $.NotificationApp.send("<?php echo get_phrase('congratulations'); ?>!", '<?php echo $this->session->flashdata("flash_message");?>' ,"top-right","rgba(0,0,0,0.2)","success");
</script>
<?php endif;?>



<!-- SHOW TOASTR NOTIFICATION FOR AJAX-->
<?php if ($this->session->flashdata('ajax_flash_message') != ""):?>

<script type="text/javascript">
	toastr.success('<?php echo $this->session->flashdata("ajax_flash_message");?>');
</script>

<?php endif;?>

<?php if ($this->session->flashdata('ajax_error_message') != ""):?>

<script type="text/javascript">
	toastr.error('<?php echo $this->session->flashdata("ajax_error_message");?>');
</script>
<?php endif;?>