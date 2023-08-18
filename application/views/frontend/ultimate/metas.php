<meta charset="utf-8" />
    <title><?php echo get_phrase($page_title); ?> | <?php echo $this->db->get_where('schools', array('id' => school_id()))->row('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured school system. Saincraft revolutionalize how schools are managed! Ensure good policy to parents." name="description" />
    <meta content="Saincraft Lab" name="author" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!-- App favicon -->
<link rel="shortcut icon" href="<?php echo $this->settings_model->get_favicon(); ?>">
