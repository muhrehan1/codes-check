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


    function data_calendario(){
        global $wpdb;

        $logged_user = wp_get_current_user(); // Get current user info
        $user_id =  $logged_user->id;
        $result = $wpdb->get_results("SELECT * FROM wp_fitness_measurements where user_id=$user_id",OBJECT);

        foreach ($result as $rs){


            $created_data = date("Y-m-d", strtotime($rs->created_data));
            $user_chest = $rs->user_chest;


            echo "{title: '$user_chest', start: '$created_data',
                     popup: {
                          title: 'This is the title',
                          descri: 'This is the description',
                       }    
                },";
        }
    }




    // user registration login form
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


    // user login form
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





    // registration form fields
    function crlfwnr_custom_registration_form_fields() {

        ob_start(); ?>
        <h3 class="custom_header"><?php _e('Register New Account'); ?></h3>

        <?php
        // show any error messages after form submission
        crlfwnr_custom_show_error_messages();
        $reg_options = get_option( 'reg_options' );
        //echo "------------<pre>";
        //print_r($reg_options);
        ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <form id="registerform"  name="registerform" class="crlfwnr_custom_form" action="" method="POST">
            <fieldset>
                <div class="column one-second rgistr-frm">
                    <label for="custom_user_Login"><?php _e('Username'); ?><span class="crlfwnr_required">*</span></label>
                    <input name="custom_user_login" id="custom_user_login" class="required" type="text" required value="<?php echo $_POST['custom_user_login']; ?>"/>
                </div>

                <div class="column one-second rgistr-frm">
                    <label for="custom_user_email"><?php _e('Email'); ?><span class="crlfwnr_required">*</span></label>
                    <input name="custom_user_email" id="custom_user_email" class="required" type="email" required value="<?php echo $_POST['custom_user_email']; ?>"/>
                </div>

                <div class="column one-second rgistr-frm">
                    <label for="custom_user_first"><?php _e('First Name'); ?></label>
                    <input name="custom_user_first" id="custom_user_first" type="text" required value="<?php echo $_POST['custom_user_first']; ?>"/>
                </div>

                <div class="column one-second rgistr-frm">
                    <label for="custom_user_last"><?php _e('Last Name'); ?></label>
                    <input name="custom_user_last" id="custom_user_last" type="text" required value="<?php echo $_POST['custom_user_last']; ?>"/>
                </div>

                <div class="column one-second rgistr-frm">
                    <label for="password"><?php _e('Password'); ?><span class="crlfwnr_required">*</span></label>
                    <input name="custom_user_pass" id="password" class="required" type="password" required />
                </div>

                <div class="column one-second rgistr-frm">
                    <label for="password_again"><?php _e('Password Again'); ?></label>
                    <input name="custom_user_pass_confirm" id="password_again" class="required" type="password" required />
                </div>

                <div class="column one-second rgistr-frm">
                    <label for="custom_user_date"><?php _e('Birth Date'); ?></label>
                    <input name="custom_user_date" id="birth_date" class="required" type="date" required />
                </div>

                <div class="column one-second rgistr-frm">
                    <label for="custom_user_phone"><?php _e('Phone Number'); ?></label>
                    <input name="custom_user_phone" id="custom_user_phone" class="required" type="tel" required />
                </div>

                <div class="column one rgistr-frm">
                    <label for="custom_user_street_address"><?php _e('Street Address'); ?></label>
                    <input name="custom_user_street_address" id="custom_user_street_address" type="text" value="<?php echo $_POST['custom_user_street_address']; ?>"/>
                </div>

                <div class="column one-fourth rgistr-frm">
                    <label for="custom_user_city"><?php _e('City'); ?></label>
                    <input name="custom_user_city" id="custom_user_city" type="text" value="<?php echo $_POST['custom_user_city']; ?>"/>
                </div>

                <div class="column one-fourth rgistr-frm">
                    <label for="custom_user_state"><?php _e('State'); ?></label>
                    <input name="custom_user_state" id="custom_user_state" type="text" value="<?php echo $_POST['custom_user_state']; ?>"/>
                </div>

                <div class="column one-fourth rgistr-frm">
                    <label for="custom_user_zipcode"><?php _e('Zipcode'); ?></label>
                    <input name="custom_user_zipcode" id="custom_user_zipcode" type="text" value="<?php echo $_POST['custom_user_zipcode']; ?>"/>
                </div>

                <div class="column one-fourth rgistr-frm">
                    <label for="custom_user_country"><?php _e('Country'); ?></label>
                    <input name="custom_user_country" id="custom_user_country" type="text" value="<?php echo $_POST['custom_user_country']; ?>"/>
                </div>

                <div class="column one rgistr-frm-txt">
                    <h6>MEDICAL HISTORY</h6>
                </div>

                <div class="column one rgistr-frm-txt">
                    <p>Have you had any family history of chronic disease (heart disease, diabetes, etc.)</p>
                </div>

                <div class="column one-third rgistr-frm">
                    <select id="custom_mh_1" name="mh-q1">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <div class="column two-third rgistr-frm">
                    <input name="custom_mh_ans_1" id="custom_mh_ans_1" type="text" placeholder="If yes, please list" value="<?php echo $_POST['custom_mh_ans_1']; ?>"/>
                </div>

                <div class="column one rgistr-frm-txt">
                    <p>Have you ever been diagnosed or treated for any chronic disease including asthma?</p>
                </div>

                <div class="column one-third rgistr-frm">
                    <select id="custom_mh_2" name="mh-q2">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>

                </div>

                <div class="column two-third rgistr-frm">
                    <input name="custom_mh_ans_2" id="custom_mh_ans_2" type="text" placeholder="If yes, please list" value="<?php echo $_POST['custom_mh_ans_2']; ?>"/>
                </div>

                <div class="column one rgistr-frm-txt">
                    <p>Are you currently taking any medication?</p>
                </div>

                <div class="column one-third rgistr-frm">
                    <select id="custom_mh_3" name="mh-q3">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>

                </div>

                <div class="column two-third rgistr-frm">
                    <input name="custom_mh_ans_3" id="custom_mh_ans_3" type="text" placeholder="If yes, please list" value="<?php echo $_POST['custom_mh_ans_3']; ?>"/>
                </div>

                <div class="column one rgistr-frm-txt">
                    <p>Any other conditions that we need to be aware of (i.e. Past or present injuries, etc)?</p>
                </div>

                <div class="column one-third rgistr-frm">
                    <select id="custom_mh_4" name="mh-q4">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <div class="column two-third rgistr-frm">
                    <input name="custom_mh_ans_4" id="custom_mh_ans_4" type="text" placeholder="If yes, please list" value="<?php echo $_POST['custom_mh_ans_4']; ?>"/>
                </div>

                <div class="column one rgistr-frm-txt">
                    <h6>PERSONAL DETAILS</h6>

                    <h5>If You Have Answered YES To Any Of The Above Questions, You Must Obtain A Medical Clearance Prior To Carrying Out A Physical Exercise Program.</h5>

                    <h6>HEALTH RELATED BEHAVIOURS</h6>
                </div>


                <div class="column one rgistr-frm-txt">
                    <p>Do you smoke?</p>
                </div>

                <div class="column one-second rgistr-frm">
                    <select id="custom_behaviour_1" name="behaviour_1">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>

                </div>

                <div class="column one-second rgistr-frm">
                    <input name="ans_behaviour_1" id="ans_behaviour_1" type="text" placeholder="If yes, How many a day?" value="<?php echo $_POST['ans_behaviour_1']; ?>"/>
                </div>

                <div class="column one rgistr-frm-txt">
                    <p>Do you drink alcohol regularly?</p>
                </div>

                <div class="column one-second rgistr-frm">
                    <select id="custom_behaviour_2" name="behaviour_2">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>

                </div>

                <div class="column one-second rgistr-frm">
                    <input name="ans_behaviour_2" id="ans_behaviour_2" type="text" placeholder="If yes, how much per week?" value="<?php echo $_POST['ans_behaviour_2']; ?>"/>
                </div>

                <div class="column one-second rgistr-frm">
                    <label for="custom_behaviour_3"><?php _e('How many times on average do you eat fast food per week?'); ?></label>
                    <select id="custom_behaviour_3" name="behaviour_3">
                        <option value="1-2">1-2</option>
                        <option value="3-4">3-4</option>
                        <option value="1-2">5-6</option>
                        <option value="3-4">7-8</option>
                    </select>
                </div>

                <div class="column one-second rgistr-frm">
                    <label for="custom_behaviour_4"><?php _e('How many hours of sleep do you normally get per night?'); ?></label>
                    <select id="custom_behaviour_4" name="behaviour_4">
                        <option value="0-3hrs">0-3hrs</option>
                        <option value="4-6hrs">4-6hrs</option>
                        <option value="7-8hrs">7-8hrs</option>
                        <option value="8-10hrs">8-10hrs</option>
                        <option value="10hrs+">10hrs+</option>
                    </select>
                </div>

                <div class="column one rgistr-frm-txt">
                    <h6>PSYCHOLOGICAL</h6>
                    <p>Please rate the following. One star being negative to five stars being positive</p>
                </div>

                <div class="column one rgistr-frm">
                    <label for="custom_positive_attitude"><?php _e('I have a positive attitude towards things'); ?></label>

                    <div class="star-rating">
                        <input type="radio" name="positive_attitude" id="star-a-positive" value="5"/>
                        <label for="star-a-positive"></label>

                        <input type="radio" name="positive_attitude" id="star-b-positive" value="4"/>
                        <label for="star-b-positive"></label>

                        <input type="radio" name="positive_attitude" id="star-c-positive" value="3"/>
                        <label for="star-c-positive"></label>

                        <input type="radio" name="positive_attitude" id="star-d-positive" value="2"/>
                        <label for="star-d-positive"></label>

                        <input type="radio" name="positive_attitude" id="star-e-positive" value="1"/>
                        <label for="star-e-positive"></label>
                    </div>
                </div>


                <div class="column one rgistr-frm">
                    <label for="custom_job_stresses"><?php _e('My job stresses me out.'); ?></label>

                    <div class="star-rating">
                        <input type="radio" name="job_stresses" id="star-a-stresses" value="5"/>
                        <label for="star-a-stresses"></label>

                        <input type="radio" name="job_stresses" id="star-b-stresses" value="4"/>
                        <label for="star-b-stresses"></label>

                        <input type="radio" name="job_stresses" id="star-c-stresses" value="3"/>
                        <label for="star-c-stresses"></label>

                        <input type="radio" name="job_stresses" id="star-d-stresses" value="2"/>
                        <label for="star-d-stresses"></label>

                        <input type="radio" name="job_stresses" id="star-e-stresses" value="1"/>
                        <label for="star-e-stresses"></label>
                    </div>
                </div>

                <div class="column one rgistr-frm">
                    <label for="custom_best_shape"><?php _e('I am in the best shape of my life.'); ?></label>

                    <div class="star-rating">
                        <input type="radio" name="best_shape" id="star-a-shape" value="5"/>
                        <label for="star-a-shape"></label>

                        <input type="radio" name="best_shape" id="star-b-shape" value="4"/>
                        <label for="star-b-shape"></label>

                        <input type="radio" name="best_shape" id="star-c-shape" value="3"/>
                        <label for="star-c-shape"></label>

                        <input type="radio" name="best_shape" id="star-d-shape" value="2"/>
                        <label for="star-d-shape"></label>

                        <input type="radio" name="best_shape" id="star-e-shape" value="1"/>
                        <label for="star-e-shape"></label>
                    </div>
                </div>

                <div class="column one rgistr-frm">
                    <label for="custom_current_health"><?php _e('I would rate my current health.'); ?></label>

                    <div class="star-rating">
                        <input type="radio" name="current_health" id="star-a-health" value="5"/>
                        <label for="star-a-health"></label>

                        <input type="radio" name="current_health" id="star-b-health" value="4"/>
                        <label for="star-b-health"></label>

                        <input type="radio" name="current_health" id="star-c-health" value="3"/>
                        <label for="star-c-health"></label>

                        <input type="radio" name="current_health" id="star-d-health" value="2"/>
                        <label for="star-d-health"></label>

                        <input type="radio" name="current_health" id="star-e-health" value="1"/>
                        <label for="star-e-health"></label>
                    </div>
                </div>

                <div class="column one rgistr-frm">
                    <label for="custom_my_goals"><?php _e('I am serious about acheiving my goals'); ?></label>

                    <div class="star-rating">
                        <input type="radio" name="my_goals" id="star-a-goals" value="5"/>
                        <label for="star-a-goals"></label>

                        <input type="radio" name="my_goals" id="star-b-goals" value="4"/>
                        <label for="star-b-goals"></label>

                        <input type="radio" name="my_goals" id="star-c-goals" value="3"/>
                        <label for="star-c-goals"></label>

                        <input type="radio" name="my_goals" id="star-d-goals" value="2"/>
                        <label for="star-d-goals"></label>

                        <input type="radio" name="my_goals" id="star-e-goals" value="1"/>
                        <label for="star-e-goals"></label>
                    </div>
                </div>

                <div class="column one rgistr-frm-txt">
                    <h6>GOALS</h6>
                </div>

                <div class="column one rgistr-frm-txt">
                    <p>Do you have any health related goals (i.e. Lower blood pressure, etc)?</p>
                </div>

                <div class="column one-third rgistr-frm">
                    <select id="custom_health_goal" name="health_goal">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>

                </div>

                <div class="column two-third rgistr-frm">
                    <input name="ans_health_goal" id="ans_health_goal" type="text" placeholder="If yes, please list" value="<?php echo $_POST['ans_health_goal']; ?>"/>
                </div>

                <div class="column one rgistr-frm-txt">
                    <p>Do you have specific goals related to body composition (i.e. weight loss, build biceps etc)?</p>
                </div>

                <div class="column one-third rgistr-frm">
                    <select id="custom_body_composition" name="body_composition">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>

                </div>

                <div class="column two-third rgistr-frm">
                    <input name="ans_body_composition" id="ans_body_composition" type="text" placeholder="If yes, please list" value="<?php echo $_POST['ans_body_composition']; ?>"/>
                </div>

                <div class="column one rgistr-frm-txt">
                    <p>Do you have any performance specic goals (i.e. Increase 10km run, increase chest strength, etc.)?</p>
                </div>

                <div class="column one-third rgistr-frm">
                    <select id="custom_performance" name="performance">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>

                </div>

                <div class="column two-third rgistr-frm">
                    <input name="ans_performance" id="ans_performance" type="text" placeholder="If yes, please list" value="<?php echo $_POST['ans_performance']; ?>"/>
                </div>


                <div class="column one rgistr-frm-txt">
                    <p>Do you wish to achieve any of these goals in a specific time frame?</p>
                </div>

                <div class="column one-third rgistr-frm">
                    <select id="custom_time_frame" name="time_frame">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>

                </div>

                <div class="column two-third rgistr-frm">
                    <input name="ans_time_frame" id="ans_time_frame" type="text" placeholder="If yes, please list" value="<?php echo $_POST['ans_time_frame']; ?>"/>
                </div>

                <div class="column one rgistr-frm-txt">
                    <h6>LIABILITY WAIVER</h6>
                    <p>Please read carefully before submitting form.</p>
                </div>

                <div class="column one rgistr-frm-txt">
                    <p>I agree, being aware of my own health and physical condition, and having knowledge that my participation in any exercise program may be injurious to my health, am voluntarily participating in physical activity with Fearless Boxing & Fitness.</p>
                    <p>Having such knowledge, I hereby release Fearless Boxing & Fitness, their representatives, agents, and successors from liability for accidental injury or illness, which I may incur as a result of participating in the said physical activity. I hereby assume all risks connected therewith and consent to participate in said program.</p>
                    <p>I agree to disclose any physical limitations, disabilities, ailments, or impairments that may affect my ability to participate in said fitness program.</p>
                </div>

                <div class="column one rgistr-frm">
                    <input name="custom_user_agreement" id="custom_user_agreement" type="checkbox" value="Yes" required />
                    <label for="custom_user_agreement"><?php _e('Please tick box in agreement to the above liability waiver'); ?></label>
                </div>




                <?php if($reg_options['captcha_registration']){
                    $captcha_theme = $reg_options['theme'];
                    ?>


                    <div class="g-recaptcha" data-theme="<?php echo $captcha_theme; ?>" data-sitekey="<?php echo $reg_options['site_key']; ?>"></div>
                <?php } ?>

                <div class="column one">
                    <input type="hidden" name="custom_register_nonce" value="<?php echo wp_create_nonce('custom-register-nonce'); ?>"/>
                    <input type="submit" value="<?php _e('Register Your Account'); ?>"/>
                </div>
            </fieldset>
        </form>
        <script>
            jQuery(':radio').change(function() {
                console.log('New star rating: ' + this.value);
            });
        </script>
        <?php
        return ob_get_clean();
    }



    // register a new user
    function crlfwnr_custom_add_new_member() {
        if (isset( $_POST["custom_user_login"] ) && wp_verify_nonce($_POST['custom_register_nonce'], 'custom-register-nonce')) {
            $user_login        = $_POST["custom_user_login"];
            $user_email        = $_POST["custom_user_email"];
            $user_first     = $_POST["custom_user_first"];
            $user_last         = $_POST["custom_user_last"];
            $user_pass        = $_POST["custom_user_pass"];
            $pass_confirm     = $_POST["custom_user_pass_confirm"];
            $user_date        =$_POST["custom_user_date"];
            $user_phone       =$_POST["custom_user_phone"];
            $user_street_address       =$_POST["custom_user_street_address"];
            $user_city       =$_POST["custom_user_city"];
            $user_state       =$_POST["custom_user_state"];
            $user_zipcode       =$_POST["custom_user_zipcode"];
            $user_country       =$_POST["custom_user_country"];
            $mh_1       =$_POST["mh-q1"];
            $mh_ans_1      =$_POST["custom_mh_ans_1"];
            $mh_2       =$_POST["mh-q2"];
            $mh_ans_2      =$_POST["custom_mh_ans_2"];
            $mh_3       =$_POST["mh-q3"];
            $mh_ans_3      =$_POST["custom_mh_ans_3"];
            $mh_4       =$_POST["mh-q4"];
            $mh_ans_4      =$_POST["custom_mh_ans_4"];
            $custom_behaviour_1      =$_POST["behaviour_1"];
            $ans_behaviour_1      =$_POST["ans_behaviour_1"];
            $custom_behaviour_2      =$_POST["behaviour_2"];
            $ans_behaviour_2      =$_POST["ans_behaviour_2"];
            $behaviour_3      =$_POST["behaviour_3"];
            $behaviour_4     =$_POST["behaviour_4"];
            $custom_positive_attitude     =$_POST["positive_attitude"];
            $custom_job_stresses     =$_POST["job_stresses"];
            $custom_best_shape     =$_POST["best_shape"];
            $custom_current_health    =$_POST["current_health"];
            $custom_my_goals    =$_POST["my_goals"];
            $custom_health_goal    =$_POST["health_goal"];
            $health_goal   =$_POST["ans_health_goal"];
            $custom_body_composition    =$_POST["body_composition"];
            $body_composition   =$_POST["ans_body_composition"];
            $custom_performance    =$_POST["performance"];
            $performance  =$_POST["ans_performance"];
            $custom_time_frame    =$_POST["time_frame"];
            $time_frame  =$_POST["ans_time_frame"];
            $user_agreement  =$_POST["custom_user_agreement"];


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
            /*if(!empty($recaptcha))
            {
                $google_url="https://www.google.com/recaptcha/api/siteverify";
                $secret=$reg_options['secrete_key'];
                $ip=$_SERVER['REMOTE_ADDR'];
                $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
                $res=getCurlData($url);
                //$res= json_decode($res, true);
                echo "<pre>";
                print_r($res);
                if($res)
                {
                    $flag=1;
                }else{
                    echo "hello11111";  exit;
                crlfwnr_custom_errors()->add('g-recaptcha-response', __($captcha_error));
                }
            }elseif($flag!=1){
                echo $flag."hello222222"; exit;
                crlfwnr_custom_errors()->add('g-recaptcha-response', __($captcha_error));
            } */
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
                        'role'                => 'subscriber'
                    )
                );
                if($new_user_id) {
                    // send an email to the admin alerting them of the registration
                    wp_new_user_notification($new_user_id);
                    update_field( 'username', $user_login , 'user_'.$new_user_id );
                    update_field( 'email', $user_email , 'user_'.$new_user_id );
                    update_field( 'first_name', $user_first , 'user_'.$new_user_id );
                    update_field( 'last_name', $user_last , 'user_'.$new_user_id );
                    update_field( 'password', $user_pass , 'user_'.$new_user_id );
                    update_field( 'birth_date', $user_date , 'user_'.$new_user_id );
                    update_field( 'phone_number', $user_phone , 'user_'.$new_user_id );
                    update_field( 'street_address', $user_street_address , 'user_'.$new_user_id );
                    update_field( 'city', $user_city , 'user_'.$new_user_id );
                    update_field( 'state', $user_state , 'user_'.$new_user_id );
                    update_field( 'zipcode', $user_zipcode , 'user_'.$new_user_id );
                    update_field( 'country', $user_country , 'user_'.$new_user_id );
                    update_field( 'have_you_had_any_family_history_of_chronic_disease_heart_disease_diabetes_etc-q', $mh_1 , 'user_'.$new_user_id );
                    update_field( 'have_you_had_any_family_history_of_chronic_disease_heart_disease_diabetes_etc', $mh_ans_1 , 'user_'.$new_user_id );
                    update_field( 'have_you_ever_been_diagnosed_or_treated_for_any_chronic_disease_including_asthma_q', $mh_2 , 'user_'.$new_user_id );
                    update_field( 'have_you_ever_been_diagnosed_or_treated_for_any_chronic_disease_including_asthma', $mh_ans_2 , 'user_'.$new_user_id );
                    update_field( 'are_you_currently_taking_any_medication_q', $mh_3 , 'user_'.$new_user_id );
                    update_field( 'are_you_currently_taking_any_medication', $mh_ans_3 , 'user_'.$new_user_id );
                    update_field( 'any_other_conditions_that_we_need_to_be_aware_of_ie_past_or_present_injuries_etc_q', $mh_4 , 'user_'.$new_user_id );
                    update_field( 'any_other_conditions_that_we_need_to_be_aware_of_ie_past_or_present_injuries_etc', $mh_ans_4 , 'user_'.$new_user_id );
                    update_field( 'do_you_smoke_q', $custom_behaviour_1 , 'user_'.$new_user_id );
                    update_field( 'do_you_smoke', $ans_behaviour_1 , 'user_'.$new_user_id );
                    update_field( 'do_you_drink_alcohol_regularly_q', $custom_behaviour_2 , 'user_'.$new_user_id );
                    update_field( 'do_you_drink_alcohol_regularly', $user_street_address , 'user_'.$new_user_id );
                    update_field( 'how_many_times_on_average_do_you_eat_fast_food_per_week', $behaviour_3 , 'user_'.$new_user_id );
                    update_field( 'how_many_hours_of_sleep_do_you_normally_get_per_night', $behaviour_4 , 'user_'.$new_user_id );
                    update_field( 'i_have_a_positive_attitude_towards_things', $custom_positive_attitude , 'user_'.$new_user_id );
                    update_field( 'my_job_stresses_me_out', $custom_job_stresses , 'user_'.$new_user_id );
                    update_field( 'i_am_in_the_best_shape_of_my_life', $custom_best_shape , 'user_'.$new_user_id );
                    update_field( 'i_would_rate_my_current_health', $custom_current_health , 'user_'.$new_user_id );
                    update_field( 'i_am_serious_about_acheiving_my_goals', $custom_my_goals , 'user_'.$new_user_id );
                    update_field( 'do_you_have_any_health_related_goals_ie_lower_blood_pressure_etc_q', $custom_health_goal , 'user_'.$new_user_id );
                    update_field( 'do_you_have_any_health_related_goals_ie_lower_blood_pressure_etc', $health_goal , 'user_'.$new_user_id );
                    update_field( 'do_you_have_specific_goals_related_to_body_composition_ie_weight_loss_build_biceps_etc_q', $custom_body_composition , 'user_'.$new_user_id );
                    update_field( 'do_you_have_specific_goals_related_to_body_composition_ie_weight_loss_build_biceps_etc', $body_composition , 'user_'.$new_user_id );
                    update_field( 'do_you_have_any_performance_specific_goals_ie_increase_10km_run_increase_chest_strength_etc_q', $custom_performance , 'user_'.$new_user_id );
                    update_field( 'do_you_have_any_performance_specific_goals_ie_increase_10km_run_increase_chest_strength_etc', $performance , 'user_'.$new_user_id );
                    update_field( 'do_you_wish_to_achieve_any_of_these_goals_in_a_specific_time_frame_q', $custom_time_frame , 'user_'.$new_user_id );
                    update_field( 'do_you_wish_to_achieve_any_of_these_goals_in_a_specific_time_frame', $time_frame , 'user_'.$new_user_id );
                    update_field( 'please_tick_box_in_agreement_to_the_above_liability_waiver', $user_agreement , 'user_'.$new_user_id );

                    $my_post = array(
                        'post_type' =>  'user_profile',
                        'post_title'    => wp_strip_all_tags( $user_first ),
                        'post_content'  => '',
                        'post_status'   => 'publish',
                        'post_author'   => $new_user_id,
                        //'post_category' => array( 8,39 )
                    );

                    // Insert the post into the database
                    wp_insert_post( $my_post );


                    wp_redirect(home_url('/login')); exit;
                    // log the new user in
                    wp_setcookie($user_login, $user_pass, true);
                    wp_set_current_user($new_user_id, $user_login);
                    do_action('wp_login', $user_login);

                    // send the newly created user to the home page after logging them in
                    wp_redirect(home_url()); exit;
                }

            }

        }
    }
    add_action('init', 'crlfwnr_custom_add_new_member');


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




    function bux_update_profile() {

        if (isset( $_POST["bux_update_nonce"] ) && wp_verify_nonce($_POST['bux_update_nonce'], 'bux_update_nonce')) {


            if ( !is_user_logged_in() ) {
                wp_redirect( home_url('/login'), 302 );
                exit();
            }



            $post_type_id  = $_POST["post_type_id"];
            $about_user_info  = $_POST["about_me"];
            $PhoneNumber  = $_POST["custom_user_phone"];
            $custom_user_first  = $_POST["custom_user_first"];



            $tagline_freelancer     = $_POST["tagline_freelancer_"];
            $location_freelancer_         = $_POST["custom_user_city"];
            $profile_picture        = $_POST["profile_picture"];
            $banner_image     = $_POST["banner_image"];


            if ( !function_exists('wp_handle_upload') ) {
                require_once(ABSPATH . 'wp-admin/includes/file.php');
            }

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

            // Move file to media library
            $movefile = wp_handle_upload( $_FILES['banner_image'], array('test_form' => false) );

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
                //set_post_thumbnail($post_type_id, $attach_id);
                update_field('banner_image', $attach_id, $post_type_id);

            }



            // Update post 37
            $my_post = array(
                'ID'           =>  $post_type_id,
                'post_title'   => $custom_user_first,
                'post_content' => $about_user_info,
            );

            // Update the post into the database
            wp_update_post( $my_post );
            update_field( 'phone_number', $PhoneNumber , $post_type_id );
            update_field( 'tagline_freelancer_', $tagline_freelancer , $post_type_id );
            update_field( 'location_freelancer_', $location_freelancer_ , $post_type_id );


        }

    }

    add_action('init', 'bux_update_profile');


    function marstechcoder_send_email(){

        $message = '';
        if (isset( $_POST["marstechcoder_send_email_nonce"] ) && wp_verify_nonce($_POST['marstechcoder_send_email_nonce'], 'marstechcoder_send_email_nonce')) {
            global $wpdb;
            $current_user_name =  $_POST['current_user_name'];
            $user_chest        =  $_POST['user_chest'];
            $user_biceps       =  $_POST['user_biceps'];
            $user_waist        =  $_POST['user_waist'];
            $user_hips         =  $_POST['user_hips'];
            $user_quads        =  $_POST['user_quads'];
            $user_calfs        =  $_POST['user_calfs'];
            $weight        =  $_POST['weight'];
            $date = date('Y-m-d H:i:s');


            $to = 'thembsconnection@outlook.com'; //sendto@example.com
            $subject = 'Fitness Measurements';
            $body = '<h3>User Fitness Measurements Details</h3> <br/> Name: '.$current_user_name.' 
                            <br/>Chese: '.$user_chest.'<br/>Bicep: '.$user_biceps.'<br/> Waist: '.$user_waist.'<br/> Hips: '.$user_hips.'<br/>
                            Quads: '.$user_quads .'<br/>Calfs: '.$user_calfs .'<br/>';
            $headers = array('Content-Type: text/html; charset=UTF-8');

            $mailResult = wp_mail( $to, $subject, $body, $headers );


            if($mailResult){
                $message = 'Your Details has been sent to Admin';



                $logged_user = wp_get_current_user(); // Get current user info
                $user_id =  $logged_user->id;
                $date = date('Y-m-d H:i:s');
                $status = '0';

                $has_dataInsert = $wpdb->insert('wp_fitness_measurements',
                    array(
                        'user_chest'  => $user_chest,
                        'user_biceps' => $user_biceps,
                        'user_waist' =>  $user_waist,
                        'user_hips' => $user_hips,
                        'user_quads' => $user_quads,
                        'user_calfs' => $user_calfs,
                        'user_id' => $user_id,
                        'created_data' => $date,
                        'status' => $status,
                        'weight' => $weight,
                    ));


            }else{
                $message = 'Error! Message Can not sent';
            }


            //   $to = 'tariq.mahesar@gmail.com';
            //   $subject = 'The subject';
            //   $body = 'dd';
            //   $headers = array('Content-Type: text/html; charset=UTF-8','From: My Site Name <support@example.com>');

            //   wp_mail( $to, $subject, $body, $headers );

        }
    }


    add_action('init', 'marstechcoder_send_email');

    function um_current_user_profile(){

        if (  ! is_user_logged_in() ) { ?>
            <script>location.href = '<?php echo home_url('/login') ;?>';</script>
        <?php }


        $user_id = get_current_user_id();
        $user = get_userdata( $user_id );
        $user_roles = $user->roles;




        global $current_user;
        $email = $current_user->user_email;


        $args = array(
            'post_type' =>   'user_profile',
            'author'         => $current_user->ID,

        );
        $the_query = new WP_Query( $args );

        // The Loop
        if ( $the_query->have_posts() ) {

            while ( $the_query->have_posts() ) {

                $the_query->the_post(); ?>

                <div class="container">
                    <div class="user-profile">
                        <?php if(get_field('tagline_ banner_image')){?>
                            <div class="profile-header-background"><img src="<?php the_field('banner_image');?>" alt="Profile Header Background"></div>
                        <?php }else{ ?>
                            <div class="profile-header-background"><img src="https://staging.designinternal.com/wp/mywork/wp-content/uploads/2022/01/vector-illustration-circuit-board-hexagons-260nw-1186861738.jpg" alt="Profile Header Background"></div>
                        <?php } ?>
                        <div class="row">
                            <div class="column one-third">
                                <div class="profile-info-left">
                                    <div class="text-center">
                                        <?php if(get_field('profile_picture')){?>
                                            <img src="<?php the_field('profile_picture');?>" alt="Avatar" class="avatar img-circle">
                                        <?php }else{ ?>
                                            <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="Avatar" class="avatar img-circle">
                                        <?php } ?>
                                        <h2><?php the_title();?></h2>
                                    </div>
                                    <div class="action-buttons">
                                        <div class="row">
                                            <?php if(get_field('tagline_freelancer_')){?>
                                                <div class="col-xs-6">
                                                    <a href="#" class="btn btn-success btn-block"><i class="fa fa-plus-round"></i> <?php the_field('tagline_freelancer_');?></a>
                                                </div>
                                            <?php } ?>
                                            <!-- <div class="col-xs-6">
                                                <a href="#" class="btn btn-primary btn-block"><i class="fa fa-android-mail"></i> Message</a>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="section">
                                        <h3>My Goals</h3>
                                        <p><?php echo get_the_content();?></p>
                                    </div>
                                    <div class="section">
                                        <h3>Contact</h3>
                                        <p><span class="badge">Phone:</span> <?php the_field('phone_number');?></p>
                                        <p><span class="badge">Email:</span> <?php echo $email;?></p>
                                        <p><span class="badge">Location:</span> <?php the_field('location_freelancer_');?></p>
                                    </div>

                                    <div class="section">
                                        <div class="tab">
                                            <button class="tablinks" onclick="openCity(event, 'Dashboard')" id="defaultOpen">My Dashboard</button>
                                            <button class="tablinks" onclick="openCity(event, 'fitness-holistic-week')">Challenge of the week</button>
                                            <button class="tablinks" onclick="openCity(event, 'presentation-recipe-week')">Recipe of the week</button>
                                            <button class="tablinks" onclick="openCity(event, 'bonus-extras')">Bonus Material</button>
                                            <button class="tablinks" onclick="openCity(event, 'my-zoom-videos')">Techniques</button>
                                            <button class="tablinks" onclick="openCity(event, 'my-fitness-videos')">Workout videos</button>
                                            <button class="tablinks" onclick="openCity(event, 'interviews-videos')">Presentations/Guest Speakers</button>
                                            <button class="tablinks fitness" onclick="openCity(event, 'fitness-measurements')">Fitness Measurements</button>
                                            <div id="sub-btn1" style="display:none;">
                                                <button class="tablinks" onclick="openCity(event, 'mybuttonrecorddata')">Record My Data</button>

                                                <button class="tablinks" onclick="openCity(event, 'mybuttonhistory')">My History</button>
                                            </div>

                                            <button class="tablinks" onclick="openCity(event, 'fitness-user-data')">Measurements Record</button>
                                            <button class="tablinks" onclick="openCity(event, 'recipes')">Recipes</button>
                                            <button class="tablinks" onclick="openCity(event, 'printableresources')">Printable Resources</button>

                                            <?php if ( is_user_logged_in() ) { ?>
                                                <a href="<?php echo wp_logout_url(site_url() ); ?>">Logout</a>
                                            <?php } else { ?>
                                                <!--<a href="/wp-login.php" title="Members Area Login" rel="home">Welcome to Member Area</a>-->
                                            <?php } ?>
                                        </div>

                                        <?php // }?>

                                    </div>

                                </div>
                            </div>
                            <div class="column two-third">
                                <p class="message_custom"> <?php echo $message; ?> </p>
                                <div class="profile-info-right">
                                    <!-- activities -->
                                    <div id="Dashboard" class="tabcontent">
                                        <h3>My Dashboard</h3>


                                        <form action="" method="post" enctype='multipart/form-data'>
                                            <input type="hidden" name="post_type_id" value="<?php echo get_the_ID();?>">
                                            <fieldset>

                                                <div class="column one rgistr-frm">
                                                    <label for="about_me">What Are Your Health and Wellness Goals?</label>
                                                    <textarea id="about_me" name="about_me"  value="<?php echo get_the_content();?>" placeholder="Write Here..."><?php echo get_the_content();?></textarea>
                                                </div>

                                                <div class="column one-second rgistr-frm">
                                                    <label for="custom_user_first"><?php _e('First Name'); ?></label>
                                                    <input name="custom_user_first" id="custom_user_first" type="text"  value="<?php the_title(); ?>"/>
                                                </div>


                                                <div class="column one-second rgistr-frm">
                                                    <label for="custom_user_phone"><?php _e('Phone Number'); ?></label>
                                                    <input name="custom_user_phone" id="custom_user_phone"  type="tel" value="<?php the_field('phone_number'); ?>" />
                                                </div>


                                                <div class="column one-second rgistr-frm">
                                                    <label for="custom_user_city"><?php _e('City'); ?></label>
                                                    <input name="custom_user_city" id="custom_user_city" type="text" value="<?php the_field('location_freelancer_'); ?>"/>
                                                </div>

                                                <div class="column one rgistr-frm">
                                                    <label for="profile_picture">Profile Picture</label>
                                                    <input type="file" name="profile_picture" class="form-control" id="profile_picture" placeholder="Profile Picture">
                                                </div>

                                                <div class="column one rgistr-frm">
                                                    <label for="banner_image">Banner Image</label>
                                                    <input type="file" name="banner_image" class="form-control" id="banner_image" placeholder="Banner Image">
                                                </div>

                                                <div class="column one ">
                                                    <input type="hidden" name="bux_update_nonce" value="<?php echo wp_create_nonce('bux_update_nonce'); ?>"/>
                                                    <input type="submit" value="<?php _e('Update'); ?>"/>
                                                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                                </div>
                                            </fieldset>
                                        </form>

                                    </div>





                                    <div id="mybuttonrecorddata" class="tabcontent">
                                        <h3>Record my Data</h3>

                                    </div>

                                    <div id="mybuttonhistory" class="tabcontent">
                                        <h3>My History</h3>

                                    </div>


                                    <div id="printableresources" class="tabcontent">

                                        <button class="tablinks" onclick="openCity(event, 'check-button')">Check Button</button>
                                    </div>

                                    <div id="fitness-holistic-week" class="tabcontent">
                                        <h3>Challenge of the week</h3>
                                    </div>


                                    <div id="presentation-recipe-week" class="tabcontent">
                                        <h3>Recipe of the week</h3>
                                    </div>

                                    <div id="bonus-extras" class="tabcontent">
                                        <h3>Bonus Material’s</h3>
                                    </div>

                                    <div id="my-zoom-videos" class="tabcontent">
                                        <h3>Techniques</h3>
                                        <div class="column one">

                                            <?php if( get_field('zoom_videos') ): ?>
                                                <?php while( the_repeater_field('zoom_videos') ): ?>
                                                    <div class="content column one-second vdo-box">
                                                        <div class="rwd-media">
                                                            <video  width="100%" height="auto" controls frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen>
                                                                <source src="<?php the_sub_field('uplaod_zoom_videos'); ?>">
                                                            </video>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>

                                        </div>
                                    </div>

                                    <div id="my-fitness-videos" class="tabcontent">
                                        <h3>Workout videos</h3>
                                        <div class="column one">

                                            <?php if( get_field('fitness_videos') ): ?>
                                                <?php while( the_repeater_field('fitness_videos') ): ?>
                                                    <div class="content column one-second vdo-box">
                                                        <div class="rwd-media">
                                                            <video  width="100%" height="auto" controls frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen>
                                                                <source src="<?php the_sub_field('upload_fitness_videos_videos'); ?>">
                                                            </video>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>

                                        </div>
                                    </div>

                                    <div id="interviews-videos" class="tabcontent">
                                        <h3>Presentations/Guest Speakers</h3>

                                        <div class="column one">
                                            <?php if( get_field('interviews_videos') ): ?>
                                                <?php while( the_repeater_field('interviews_videos') ): ?>
                                                    <div class="content column one-second vdo-box">
                                                        <div class="rwd-media">
                                                            <video  width="100%" height="auto" controls  frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen>
                                                                <source src="<?php the_sub_field('upload_interviews_videos'); ?>">
                                                            </video>

                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>

                                        </div>
                                    </div>

                                    <div id="fitness-measurements" class="tabcontent">
                                        <h3>Fitness Measurements</h3>

                                        <p><?php echo $message;?></p>
                                        <div class="column one">

                                            <form role="form" action="" method="post" enctype='multipart/form-data'>
                                                <input type="hidden" name="current_user_name" value="<?php echo the_title();?>">

                                                <fieldset>
                                                    <div class="column one-second rgistr-frm">
                                                        <label for="user_chest"><?php _e('Chest'); ?></label>
                                                        <input name="user_chest" id="user_chest" type="text" class="required" value="<?php echo $_POST['user_chest']; ?>"/>
                                                    </div>

                                                    <div class="column one-second rgistr-frm">
                                                        <label for="user_biceps"><?php _e('Biceps'); ?></label>
                                                        <input name="user_biceps" id="user_biceps" type="text" class="required" value="<?php echo $_POST['user_biceps']; ?>"/>
                                                    </div>

                                                    <div class="column one-second rgistr-frm">
                                                        <label for="user_waist"><?php _e('Waist'); ?></label>
                                                        <input name="user_waist" id="user_waist" type="text" class="required" value="<?php echo $_POST['user_waist']; ?>"/>
                                                    </div>

                                                    <div class="column one-second rgistr-frm">
                                                        <label for="user_hips"><?php _e('Hips'); ?></label>
                                                        <input name="user_hips" id="user_hips" type="text" class="required" value="<?php echo $_POST['user_hips']; ?>"/>
                                                    </div>

                                                    <div class="column one-second rgistr-frm">
                                                        <label for="user_quads"><?php _e('Quads Left'); ?></label>
                                                        <input name="user_quads" id="user_quads" type="text" class="required" value="<?php echo $_POST['user_quads']; ?>"/>
                                                    </div>

                                                    <div class="column one-second rgistr-frm">
                                                        <label for="user_quads"><?php _e('Quads Right'); ?></label>
                                                        <input name="user_quads_right" id="user_quads_right" type="text" class="required" value="<?php echo $_POST['user_quads_right']; ?>"/>
                                                    </div>

                                                    <div class="column one-second rgistr-frm">
                                                        <label for="user_calfs"><?php _e('Calfs Left'); ?></label>
                                                        <input name="user_calfs" id="user_calfs" type="text" class="required" value="<?php echo $_POST['user_calfs']; ?>"/>
                                                    </div>
                                                    <div class="column one-second rgistr-frm">
                                                        <label for="user_calfs"><?php _e('Calfs Right'); ?></label>
                                                        <input name="user_calfs_right" id="user_calfs_right" type="text" class="required" value="<?php echo $_POST['user_calf_right']; ?>"/>
                                                    </div>
                                                    <div class="column one-second rgistr-frm">
                                                        <label for="weight"><?php _e('weight'); ?></label>
                                                        <input name="weight" id="weight" type="text" class="required" value="<?php echo $_POST['weight']; ?>"/>
                                                    </div>
                                                    <div class="column one-second rgistr-frm">
                                                        <label for="date"><?php _e('Date'); ?></label>
                                                        <input name="weight" id="date" type="date" class="required" value="<?php echo $_POST['date']; ?>"/>
                                                    </div>
                                                    <!-- Calender View -->
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



                                                                eventRender: function (event, element, view) {
                                                                    var nextEventLeft = element.offset().left + element.width() + 5;
                                                                    element.parent().children().eq(element.index()+1).css('left',nextEventLeft);
                                                                },
                                                                selectable: true,
                                                                selectHelper: true,

                                                                //defaultDate: '2016-12-12',
                                                                navLinks: false, // can click day/week names to navigate views
                                                                editable: false,
                                                                eventLimit: true, // allow "more" link when too many events
                                                                events: [
    // 				{
    // 					title: 'helo',
    // 					start: '2022-04-08'

    // 				}
                                                                    <?php data_calendario();?>
    // 				{
    // 					title: 'All Day Event',
    // 					start: '2016-12-01'
    // 				},
    // 				{
    // 					title: 'Long Event',
    // 					start: '2016-12-07',
    // 					end: '2016-12-10'
    // 				},
    // 				{
    // 					id: 999,
    // 					title: 'Repeating Event',
    // 					start: '2016-12-09T16:00:00'
    // 				},
    // 				{
    // 					id: 999,
    // 					title: 'Repeating Event',
    // 					start: '2016-12-16T16:00:00'
    // 				},
    // 				{
    // 					title: 'Conference',
    // 					start: '2016-12-11',
    // 					end: '2016-12-13'
    // 				},
    // 				{
    // 					title: 'Meeting',
    // 					start: '2016-12-12T10:30:00',
    // 					end: '2016-12-12T12:30:00'
    // 				},
    // 				{
    // 					title: 'Lunch',
    // 					start: '2016-12-12T12:00:00'
    // 				},
    // 				{
    // 					title: 'Meeting',
    // 					start: '2016-12-12T14:30:00'
    // 				},
    // 				{
    // 					title: 'Happy Hour',
    // 					start: '2016-12-12T17:30:00'
    // 				},
    // 				{
    // 					title: 'Dinner',
    // 					start: '2016-12-12T20:00:00'
    // 				},
    // 				{
    // 					title: 'Birthday Party',
    // 					start: '2016-12-13T07:00:00'
    // 				},
    // 				{
    // 					title: 'Click for Google',
    // 					url: 'https://google.com/',
    // 					start: '2016-12-28'
    // 				}
                                                                ],





                                                            });




                                                            function IsCurrentMonth() {
                                                                if ($('.fc-today-button').hasClass('fc-state-disabled'))
                                                                    $('.fc-prev-button').closest('#calendar').addClass('current-month');
                                                                else
                                                                    $('.fc-prev-button').closest('#calendar').removeClass('current-month');
                                                            }
                                                            IsCurrentMonth();

                                                            $('.fc-prev-button').click(function() {
                                                                IsCurrentMonth();
                                                            });

                                                            $('.fc-next-button').click(function() {
                                                                IsCurrentMonth();
                                                            });


                                                        });


                                                    </script>


                                                    <div class="column one ">
                                                        <input type="hidden" name="marstechcoder_send_email_nonce" value="<?php echo wp_create_nonce('marstechcoder_send_email_nonce'); ?>"/>
                                                        <input type="hidden" name="submit" value="<?php echo wp_create_nonce('submit'); ?>"/>
                                                        <input type="submit" value="<?php _e('submit'); ?>"/>
                                                    </div>

                                                </fieldset>
                                            </form>



                                        </div>


                                        <!-- End Code -->

                                    </div>


                                    <div id="fitness-user-data" class="tabcontent">
                                        <h3>Your Record</h3>

                                        <?php global $wpdb;

                                        $logged_user = wp_get_current_user(); // Get current user info
                                        $user_id =  $logged_user->id;

                                        $fitnes_records = $wpdb->get_results("SELECT * FROM wp_fitness_measurements where user_id=$user_id",OBJECT);  ?>

                                        <table class="table ftnes-rcrdtbl">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">User Chest</th>
                                                <th scope="col">User Biceps</th>
                                                <th scope="col">User Waist</th>
                                                <th scope="col">User Hips</th>
                                                <th scope="col">User Quads</th>
                                                <th scope="col">User Calfs</th>
                                                <th scope="col">User Weight</th>
                                                <th scope="col">Date</th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            <?php foreach($fitnes_records as $key => $fitnes_record){?>
                                                <tr>
                                                    <td><?php echo $key+1;?></td>
                                                    <th><?php echo $fitnes_record->user_chest;?></th>
                                                    <th><?php echo $fitnes_record->user_biceps;?></th>
                                                    <th><?php echo $fitnes_record->user_waist;?></th>
                                                    <th><?php echo $fitnes_record->user_hips;?></th>
                                                    <th><?php echo $fitnes_record->user_quads;?></th>
                                                    <th><?php echo $fitnes_record->user_calfs;?></th>
                                                    <th><?php echo $fitnes_record->weight;?></th>
                                                    <th><?php echo $fitnes_record->created_data;?></th>
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div id="recipes" class="tabcontent">
                                        <h2>
                                            Coming Soon
                                        </h2>

                                    </div>

                                    <div id="printableresources" class="tabcontent">
                                        <!-- 						/*  Code For Pdf File */ -->

                                        <h3>Printable Resources  Workouts Stretches Presenter Handouts</h3>
                                        <div class="column one">

                                            <?php if( get_field('fitness_videos') ): ?>
                                                <?php while( the_repeater_field('printable_resources') ): ?>
                                                    <div class="content column one-second vdo-box">
                                                        <div class="rwd-media">
                                                            <!--              <video  width="100%" height="auto" controls frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen>
                    <source src="<?php the_sub_field('upload_fitness_videos_videos'); ?>">
                            </video> -->


                                                            <iframe src="<?php the_sub_field('upload_pdf'); ?>" width="100%" height="500px"></iframe>
                                                            <!-- 					<p> <a href="<?php the_sub_field('upload_pdf'); ?>" download>Download File</a>.</p>  -->

                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>

                                        </div>
                                        <!-- 						/* End Code */ -->

                                    </div>


                                    <!-- end activities -->
                                    <!-- followers -->
                                    <div class="tab-pane fade" id="change_password">
                                        <div class="media user-follower">
                                            <?php //echo do_shortcode( '[submit_job_form]' );?>
                                        </div>

                                    </div>
                                    <!-- end followers -->
                                    <!-- following -->
                                    <div class="tab-pane fade" id="my_zoom">



                                        <?php //echo do_shortcode( '[job_dashboard]' );?>

                                    </div>
                                    <!-- end following -->

                                    <!-- following -->
                                    <div class="tab-pane fade" id="my_videos">



                                        <?php //echo do_shortcode( '[job_dashboard]' );?>

                                    </div>
                                    <!-- end following -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>


            <?php }


        } else {
            // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();


    }

    add_shortcode('bu_user_profile','um_current_user_profile');


    function redirect_after_login(){

        if ( is_user_logged_in() ) { ?>
            <script>location.href = '<?php echo home_url('/user-profil/') ;?>';</script>
        <?php }

    }
    add_shortcode('bu_redirect_after_login','redirect_after_login');
    // // poll shortcode Ajax Functionality
    add_action( 'init', 'sendEmail_script_enqueuer' );
    function sendEmail_script_enqueuer() {
        wp_register_script( "marscodertech__sendEmail_script", WP_PLUGIN_URL.'/', array('jquery') );
        wp_localize_script( 'marscodertech__sendEmail_script', 'sendEmailAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'marscodertech__sendEmail_script' );

    }

    add_action("wp_ajax_marscodertech_news_sendEmail", "marscodertech_news_sendEmail");
    add_action("wp_ajax_nopriv_marscodertech_news_sendEmail", "marscodertech_news_sendEmail");

    function marscodertech_news_sendEmail() {

        $current_user_name =  $_POST['current_user_name'];
        $user_chest        =  $_POST['user_chest'];
        $user_biceps       =  $_POST['user_biceps'];
        $user_waist        =  $_POST['user_waist'];
        $user_hips         =  $_POST['user_hips'];
        $user_quads        =  $_POST['user_quads'];
        $user_calfs        =  $_POST['user_calfs'];

        $to = 'thembsconnection@outlook.com'; //sendto@example.com
        $subject = 'Fitness Measurements';
        $body = '<h3>User Fitness Measurements Details</h3> <br/>Chese: '.$user_chest.'<br/>Bicep: '.$user_biceps.'<br/> Waist: '.$user_waist.'<br/> Hips: '.$user_hips.'<br/>
                    Quads: '.$user_quads .'<br/>Calfs: '.$user_calfs .'<br/>';
        $headers = array('Content-Type: text/html; charset=UTF-8');

        $mailResult = wp_mail( $to, $subject, $body, $headers );

        if($mailResult){
            $message = 'Your Details has been sent to Admin';
        }else{
            $message = 'Error! Message Can not sent';
        }

    }
    function marscodertech_script() {
        ?>
        <script>
            jQuery()
            function b(id){
                post_id     = jQuery('#post_id').val();
                nonce       = jQuery('#poll_nonce').val();
                visitor_Id  = jQuery('#visitor_Id').val();

                jQuery.ajax({
                    type : "post",
                    dataType : "json",
                    url : pollAjax.ajaxurl,
                    data : {action: "marscodertech_news_sendEmail", post_id : post_id, nonce: nonce, polls: polls, visitor_Id: visitor_Id},
                    success: function(response) {
                        if(response.type == "success") {
                            jQuery('#success_msg_'+response.post_id).show();
                            //jQuery("#success_msg").html(response.vote_message)
                            jQuery('#poll-form-data_'+response.post_id).hide();
                            var total = response.total;
                            jQuery.each(response.Data, function(index) {
                                jQuery('#success_msg_show_'+response.post_id).append('<p class="mb-0 pt-20">'+response.Data[index]['name']+'</p><div class="progress" style="height: 18px;"><div class="progress-bar progress-bar-striped" role="progressbar" style="width: '+Math.round((response.Data[index]['new_vote_count']/total)*100)+'%;" aria-valuenow="'+Math.round((response.Data[index]['new_vote_count']/total)*100)+'" aria-valuemin="0" aria-valuemax="1000">'+Math.round((response.Data[index]['new_vote_count']/total)*100)+'%</div></div>');

                            })
                            jQuery('.totalvote').text(response.total);

                        }
                        else {
                            jQuery('#alert_msg_'+response.post_id).show();
                            jQuery('#poll-form-data_'+response.post_id).hide();
                            var total = response.total;
                            jQuery.each(response.Data, function(index) {
                                jQuery('#alert_msg_show_'+response.post_id).append('<p class="mb-0 pt-20">'+response.Data[index]['name']+'</p><div class="progress" style="height: 18px;"><div class="progress-bar progress-bar-striped" role="progressbar" style="width: '+Math.round((response.Data[index]['new_vote_count']/total)*100)+'%;" aria-valuenow="'+Math.round((response.Data[index]['new_vote_count']/total)*100)+'" aria-valuemin="0" aria-valuemax="1000">'+Math.round((response.Data[index]['new_vote_count']/total)*100)+'%</div></div>');

                            })
                            jQuery('.totalvote').text(response.total);
                            //alert("You have a already added poll, ")
                        }
                    }
                })


            }

            jQuery(document).ready( function() {

                jQuery.ajaxSetup({
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    complete: function(){
                        $('#loader').hide();
                    },
                    success: function() {}
                });

                jQuery('#success_msg').hide();
                jQuery('#alert_msg').hide();
                jQuery('#loader').hide();


            })
        </script>
        <?php
    }
    add_action( 'wp_footer', 'marscodertech_script' );



    function fitness_form(){
        if(isset($_POST['submit'])){
            global $wpdb;

            $logged_user = wp_get_current_user(); // Get current user info
            $user_id =  $logged_user->id;
            $date = date('Y-m-d H:i:s');
            $status = '0';

            $user_chest = $wpdb->escape($_POST['user_chest']);
            $user_biceps = $wpdb->escape($_POST['user_biceps']);
            $user_waist= $wpdb->escape($_POST['user_waist']);
            $user_hips = $wpdb->escape($_POST['user_hips']);
            $user_quads = $wpdb->escape($_POST['user_quads']);
            $user_calfs = $wpdb->escape($_POST['user_calfs']);
            $user_id = $wpdb->escape($_POST['user_id']);
            $date = $wpdb->escape($_POST['created_data']);
            $status = $wpdb->escape($_POST['status']);
            $weight = $wpdb->escape($_POST['weight']);

            $user_data = array(

                'user_chest'  => $user_chest,
                'user_biceps' => $user_biceps,
                'user_waist' =>  $user_waist,
                'user_hips' => $user_hips,
                'user_quads' => $user_quads,
                'user_calfs' => $user_calfs,
                'user_id' => $user_id,
                'date' => $date,
                'status' => $status,
                'weight' => $weight,

                 
            );
            $has_dataInsert = $wpdb->insert('wp_fitness_measurements',
                array(
                    'user_chest'  => $user_chest,
                    'user_biceps' => $user_biceps,
                    'user_waist' =>  $user_waist,
                    'user_hips' => $user_hips,
                    'user_quads' => $user_quads,
                    'user_calfs' => $user_calfs,
                    'user_id' => $user_id,
                    'date' => $date,
                    'status' => $status,
                    'weight' => $weight,
                ));
            $table_name = 'wp_fitness_measurements';
            $result = $wpdb->insert($table_name,$data,$format=NULL);
            if ($result == 1){
                echo "<script>alert(' Saved')</script>";

            }
            else{

                echo "<script>alert('Unable  Saved')</script>";
            }
        }
    }
    function user_details()
    {

        add_menu_page('User Fitness Details', 'User Fitness Details', 'manage_options', 'user-admin-user-fitness-details', 'User_Fitness_Details', '', 200);

    }

    add_action('admin_menu', 'user_details');
    function User_Fitness_Details(){ ?>
        <style>table.table.usradmdetctm  tbody tr td {
                font-size: 15px;
                line-height: 23px;
                font-weight: 600;
                text-transform: initial;
                color: #000;
                border: 1px solid rgb(0 0 0 / 25%);
                padding: 10px 20px;
                box-shadow: inset 0px 0px 3px #00000038;
                border-radius: 3px;
            }
            table.table.usradmdetctm tbody tr th {
                font-size: 15px;
                line-height: 23px;
                font-weight: 400;
                text-transform: initial;
                color: #000;
                border: 1px solid rgb(0 0 0 / 25%);
                padding: 10px 20px;
                box-shadow: inset 0px 0px 3px #00000038;
                border-radius: 3px;
            }
            table.table.usradmdetctm thead tr th {
                text-transform: capitalize;
                font-size: 15px;
                line-height: 20px;
                font-weight: 500;
                color: #fff;
                border: 1px solid #447FB6;
                background-color: #447FB6;
                padding: 10px 20px;
                box-shadow: inset 0px 0px 9px #00000038;
                border-radius: 3px;
            }
            table.table.usradmdetctm {
                width: 80%;
                margin: 40px auto;
                text-align: left;
                background-color: #fff;
                padding: 30px 30px;
                box-shadow: 0px 0px 3px rgb(0 0 0 / 28%);
                border-radius: 10px;
            }
            table.table.usradmdetctm  tbody tr th a {
                font-size: 16px;
                font-weight: 600;
                color: #E41A1A;
            }
            table.table.usradmdetctm tbody tr th a:hover {
                color: #000;
            }
            table.table.usradmdetctm tbody tr:hover {
                background-color: #24629c9c;
            }
            table.table.usradmdetctm tbody tr:hover td, table.table.usradmdetctm   tbody tr:hover th {
                color: #fff;
            }
            table.table.usradmdetctm tbody tr {
                transition: 0.5s;
            }
            h2.admin-side-custom-heading { background-color: #fff; color: #000; text-transform: capitalize; font-size: 30px; line-height: 40px; width: 80%; margin: 30px auto; padding: 30px 40px; border-radius: 3px; box-shadow: 0px 0px 3px rgb(0 0 0 / 19%); } a.link-custom-admin { background-color: #447FB6; color: #fff; text-transform: capitalize; font-size: 18px; line-height: 26px; padding: 10px 19px; border-radius: 3px; box-shadow: 0px 0px 3px rgb(0 0 0 / 19%); text-decoration: none; position: relative; left: 10%; }
            p.no-record-found-user { text-align: center; font-size: 25px; line-height: 35px; text-transform: capitalize; font-weight: 300; color: #EA0B0B; }
        </style>

        <?php global $wpdb;

        if( isset($_GET['user_id']) ){
            $users_id = $_GET['user_id'];

            $fitnes_records = $wpdb->get_results("SELECT * FROM wp_fitness_measurements where user_id=$users_id",OBJECT);  ?>

            <h2 class="admin-side-custom-heading">User Detail</h2>
            <a class="link-custom-admin" href="admin.php?page=user-admin-user-fitness-details">Back to List</a>

            <?php if($fitnes_records){?>
                <table class="table usradmdetctm">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Chest</th>
                        <th scope="col">User Biceps</th>
                        <th scope="col">User Waist</th>
                        <th scope="col">User Hips</th>
                        <th scope="col">User Quads</th>
                        <th scope="col">User Calfs</th>
                        <th scope="col">User Weight</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php foreach($fitnes_records as $key => $fitnes_record){?>
                        <tr>
                            <td><?php echo $key+1;?></td>
                            <th><?php echo $fitnes_record->user_chest;?></th>
                            <th><?php echo $fitnes_record->user_biceps;?></th>
                            <th><?php echo $fitnes_record->user_waist;?></th>
                            <th><?php echo $fitnes_record->user_hips;?></th>
                            <th><?php echo $fitnes_record->user_quads;?></th>
                            <th><?php echo $fitnes_record->user_calfs;?></th>
                            <th><?php echo $fitnes_record->weight;?></th>
                            <th><?php echo $fitnes_record->created_data;?></th>

                        </tr>
                    <?php }?>


                    </tbody>
                </table>
            <?php }else{
                echo '<p class="no-record-found-user">No Record found.</p>';
            }
            ?>


        <?php   }else{
            $all_users = $wpdb->get_results("SELECT wp_users.ID, wp_users.user_nicename,wp_users.user_email  
            FROM wp_users INNER JOIN wp_usermeta 
            ON wp_users.ID = wp_usermeta.user_id 
            WHERE wp_usermeta.meta_key = 'wp_capabilities' 
            AND wp_usermeta.meta_value LIKE '%subscriber%' 
            ORDER BY wp_users.user_nicename",OBJECT);  ?>

            <h2 class="admin-side-custom-heading" >All Users</h2>
            <table class="table usradmdetctm">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Name</th>
                    <th scope="col">User Email</th>

                    <th scope="col">Action</th>
                </tr>
                </thead>

                <tbody>

                <?php foreach($all_users as $key => $all_user){?>
                    <tr>
                        <td><?php echo $key+1;?></td>
                        <th><?php echo $all_user->user_nicename;?></th>
                        <th><?php echo $all_user->user_email;?></th>

                        <th><a href="admin.php?page=user-admin-user-fitness-details&user_id=<?php echo $all_user->ID;?>"STYLE="TEXT-DECORATION: NONE">View</a></th>

                    </tr>
                <?php }?>


                </tbody>
            </table>
            <?php
        }


    }


    /* Weekly Cron JOb */


    /* Time Interval */

    function time_cron_schedule( $schedules ) {
        $schedules['every_week_hours'] = array(
            'interval' => 604800, // Every Week hours
            'display'  => __( 'Every Week hours' ),
        );
        return $schedules;
    }
    add_filter( 'cron_schedules', 'time_cron_schedule' );


    /* Time Interval ENd */


    if (!wp_next_scheduled('week_task_cron')) {
        wp_schedule_event(time(), 'every_week_hours', 'week_task_cron');
    }
    add_action('week_task_cron', 'email_cron_task_function');
    function email_cron_task_function() {
        global $wpdb;

        $all_users = $wpdb->get_results("SELECT  wp_users.user_email  
            FROM wp_users INNER JOIN wp_usermeta 
            ON wp_users.ID = wp_usermeta.user_id 
            WHERE wp_usermeta.meta_key = 'wp_capabilities' 
            AND wp_usermeta.meta_value LIKE '%subscriber%' 
            ORDER BY wp_users.user_nicename",OBJECT);


        foreach($all_users as $key => $all_user){

            $to = $all_user->user_email;
            $subject = 'Weekly reminder';
            $body .= '<h3>Time to Measure up!</h3>';
            $body .= '<h4>Good morning Fitness Family,</h4>';
            $body .= '<p>This is your friendly Friday reminder to log into your personal dashboard and input your weight. It’s by keeping track that you will be able to easily see all the progress you’ve made, keeping you motivated each week as you push yourself further.</p>';
            $body .= '<p>Hit the link below and let’s get you measured up!</p>';
            $body .= '<a href="https://staging.designinternal.com/wp/pamstilwell/login/">Login</a>';
            $headers = array('Content-Type: text/html; charset=UTF-8');

            $checkmail = wp_mail( $to, $subject, $body, $headers );

            if($checkmail){
                echo 'done';
            }

        }
    }
    /* Weekly Cron JOb  End */





    /* Montly  Cron JOb */


    /* Time Interval */

    function time_mon_cron_schedule( $schedules ) {
        $schedules['every_month_hours'] = array(
            'interval' => 2.628e+6, // Every Month hours
            'display'  => __( 'Every Month hours' ),
        );
        return $schedules;
    }
    add_filter( 'cron_schedules', 'time_mon_cron_schedule' );


    /* Time Interval ENd */


    if (!wp_next_scheduled('month_task_cron')) {
        wp_schedule_event(time(), 'every_month_hours', 'month_task_cron');
    }
    add_action('month_task_cron', 'mon_email_cron_task_function');
    function mon_email_cron_task_function() {
        global $wpdb;

        $all_users = $wpdb->get_results("SELECT  wp_users.user_email  
            FROM wp_users INNER JOIN wp_usermeta 
            ON wp_users.ID = wp_usermeta.user_id 
            WHERE wp_usermeta.meta_key = 'wp_capabilities' 
            AND wp_usermeta.meta_value LIKE '%subscriber%' 
            ORDER BY wp_users.user_nicename",OBJECT);


        foreach($all_users as $key => $all_user){

            $to = $all_user->user_email;
            $subject = 'Monthly reminder';
            $body .= '<h3>Time to Measure up!</h3>';
            $body .= '<h4>Good morning Fitness Family,</h4>';
            $body .= '<p>This is your friendly monthly reminder to log into your personal dashboard and input your weight and your measurements. When we start getting fit and build muscle mass, our weight will fluctuate on a scale, but measurements are more accurate so it is important to input both in order for you to see your overall progress each month.</p>';
            $body .= '<p>Hit the link below and let’s get you measured up!</p>';
            $body .= '<a href="https://staging.designinternal.com/wp/pamstilwell/login/">Login</a>';
            $headers = array('Content-Type: text/html; charset=UTF-8');

            $checkmail = wp_mail( $to, $subject, $body, $headers );

            if($checkmail){
                echo 'done';
            }

        }
    }
    /* Month Cron JOb  End */



    add_action( 'wp_footer', 'custom_scripts_on_footer' );
    function custom_scripts_on_footer(){


        ?>

        <script>

            jQuery(document).ready(function($) {
                jQuery('.fitness').click(function () {
                    jQuery('#sub-btn1').toggle();

                });
            });



        </script>
        <?php


    }
