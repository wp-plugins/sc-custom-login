<?php
add_action( 'admin_menu', 'sclogin_add_admin_menu' );
add_action( 'admin_init', 'sclogin_settings_init' );

function sclogin_add_admin_menu() { 
	add_menu_page( 'SC Custom Login', 'SC Custom Login', 'manage_options', 'sc_custom_login', 'sc_custom_login_options_page' );
}

function sclogin_settings_init() { 
	register_setting( 'sccustomloginpage', 'sclogin_settings' );

	add_settings_section(
		'sclogin_pluginPage_section', 
		__( 'Just customize and enjoy! =D', 'sclogin' ), 
		'sclogin_settings_section_callback', 
		'sccustomloginpage'
	);

	add_settings_field( 
		'sclogin_errormsgs', 
		__( 'Insert your custom error messages for logging in. Only one per line!', 'sclogin' ), 
		'sclogin_error_msgs_render', 
		'sccustomloginpage', 
		'sclogin_pluginPage_section' 
	);
}

function sclogin_error_msgs_render() { 
	$options = get_option( 'sclogin_settings' ); ?>
	<textarea cols='40' rows='5' name='sclogin_settings[sclogin_errormsgs]'> 
		<?php echo $options['sclogin_errormsgs']; ?>
 	</textarea> <?php
}

function sclogin_settings_section_callback() { 
	echo __( 'Customize following the instructions', 'sclogin' );
}

function sc_custom_login_options_page() { ?>
	<form action='options.php' method='post'>
		<h2>SC Custom Login</h2>
		<?php
		settings_fields( 'sccustomloginpage' );
		do_settings_sections( 'sccustomloginpage' );
		submit_button();
		?>
	</form>	<?php
}
?>