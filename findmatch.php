<?php
/**
 * Plugin Name: Find Match
 * Plugin URI:
 * Description: Filters For Finding Match
 * Version:  0.1.1
 * Author: Developer Lucas
 * Author URI:
 * Text Domain: Display Lead Management
 *
 * Requires at least: 5.2
 * Requires PHP: 7.0
 *
 * @package WooCommerce
 */

//  ================================================================================================================================================================================

//                                                                                  FIND MATCH BACKEND


//  ================================================================================================================================================================================

add_shortcode( 'find_match_display', 'find_match_func' );
function find_match_func(){ ?>



    <style>
        p.countspost {position: relative;top: 50px;font-size: 20px !important;background: #25184d !important;text-align: center;padding: 10px;color: #fff !important;border-radius: 8px;}
        ul.p-b-meta-one span {text-transform: capitalize !important;}
        h2.no-post {text-align: center !important;margin: 0 auto;background: #46065a;width: 100%;padding: 20px;border-radius: 6px;color: #fff !important;}
        .profile-about-box {transition: 1s !important; width:350px !important;}
        .profile-about-box:hover {transform: scale(1.1);transition: 1s !important;}
        input.filter-search-btn {background: transparent !important;}
        .profile-section .left-profile-area .profile-about-box .p-inner-content .p-b-meta-two .right a.custom-button {
            display: inline-block;
            font-weight: normal;
            padding: 5px 15px;
            background-image: -o-linear-gradient(141deg, #f664bc 0%, #fb7bbc 35%, #ff92bb 100%) !important;
            background-image: linear-gradient(-51deg, #563e7b 0%, #563e7b 35%, #563e7b 100%) !important;
            -webkit-box-shadow: 0px 5px 20px 0px rgb(139 122 132 / 50%);
            box-shadow: 0px 5px 20px 0px rgb(139 122 132 / 50%);
        }
        .profile-section .left-profile-area .profile-about-box .top-bg {
            height: 160px !important;
            background: url("https://staging.designinternal.com/wp/lets-get-serious/wp-content/uploads/2022/05/profile-box-bg.png") !important;
            background-repeat: no-repeat;
            background-position: bottom center;
            background-size: cover !important;
            filter:brightness(0.5) !important;

        }
        ul.p-b-meta-one {font-size: 14px;text-align: center;display: flex;margin: 0 auto;justify-content: center;}
        .page-id-229 .col-xl-4.col-lg-4.col-md-4 {margin-top: 20px;}
        .profile-about-box {box-shadow: 0px 0px 10px 0px #ccc !important;border: 3px solid #281a52 !important;}

        .page-id-229 .widget{
            background:unset !important;
        }
        input.filter-search-btn {background: transparent;color: #000 !important;width: 29%;display: inline-grid;float: right; transition:1s !important;}
        input.filter-search-btn:hover{
            background:#2e1f5b !important;
            transition:1s !important;
            border-color:#2e1f5b;
            color:#fff !important;
            border-radius:50px;
        }
        input.age {height: 38px;border: 1px solid #ced4da;}
        .row.filter-searc {padding-bottom: 30px;width: 100%;}
        section.search-filter {box-shadow: 0px 0px 10px 0px #e5e5e5;padding: 20px;margin-top: 30px;}
        /* .row.filter-searc {margin-top: 50px;box-shadow: 0px 0px 10px 0px #ccc;padding: 20px;width: 100% !important;border-radius: 6px !important;display: flex;} */
    </style>
    <link rel="stylesheet" href="https://staging.designinternal.com/wp/lets-get-serious/wp-content/uploads/2022/05/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- ======================================================================================== -->

    <!-- Filter   Search  -->


    <!-- ======================================================================================== -->
    <section class="search-filter">
        <form action="" method="get" enctype="">
            <div class="container">
                <div class="row filter-searc">
                    <div class="col-sm-3">
                        <label for="">Seeking</label>
                        <select id="gender" class='form-control' name="gender" value="">
                            <option value="">-- Search by Gender --</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="">Age</label>
                        <select name="age" id="age" class="age" placeholder="Age">
                            <option value="-1">-</option>
                            <option value="18" selected="">18</option>
                            <option value="19" >19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                            <option value="60">60</option>
                            <option value="61">61</option>
                            <option value="62">62</option>
                            <option value="63">63</option>
                            <option value="64">64</option>
                            <option value="65">65</option>
                            <option value="66">66</option>
                            <option value="67">67</option>
                            <option value="68">68</option>
                            <option value="69">69</option>
                            <option value="70">70</option>
                            <option value="71">71</option>
                            <option value="72">72</option>
                            <option value="73">73</option>
                            <option value="74">74</option>
                            <option value="75">75</option>
                            <option value="76">76</option>
                            <option value="77">77</option>
                            <option value="78">78</option>
                            <option value="79">79</option>
                            <option value="80">80</option>
                            <option value="81">81</option>
                            <option value="82">82</option>
                            <option value="83">83</option>
                            <option value="84">84</option>
                            <option value="85">85</option>
                            <option value="86">86</option>
                            <option value="87">87</option>
                            <option value="88">88</option>
                            <option value="89">89</option>
                            <option value="90">90</option>
                            <option value="91">91</option>
                            <option value="92">92</option>
                            <option value="93">93</option>
                            <option value="94">94</option>
                            <option value="95">95</option>
                            <option value="96">96</option>
                            <option value="97">97</option>
                            <option value="98">98</option>
                            <option value="99">99</option>
                        </select>
                        <!-- <input type="text" name="age" placeholder="Age" class="age" > -->
                    </div>
                    <div class="col-sm-3">
                        <label for="">Search by Country</label>
                        <select id="country" class='form-control' name="country" value="">
                            <option value="<?php echo the_field('country');?>" >-- Country --</option>.
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="">Search by Region</label>
                        <select id="region" class='form-control' name="region" value="">
                            <option value="">-- Region --</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="">Search by City</label>
                        <select id="city" class='form-control' name="city" value="">
                            <option value="">-- City --</option>
                        </select>
                    </div>

                </div>
            </div>
            <div class="row submit">
                <div class="col-lg-12">
                    <input type="submit" value="Search" class="filter-search-btn">
                </div>
            </div>
        </form>
    </section>

    <section class="foundmatchs">
        <?php
        $country ='';
        $state ='';
        $city='';
        $Visitor_location = ip_info("Visitor", "Location");
        $country = $Visitor_location['country'];
        $state = $Visitor_location['state'];
        $city =$Visitor_location['city'];


        $meta_query = array();
        // $worker_state = '';
        // $worker_city = '';
        // $worker_interest = '';

        //  if( count( $_GET ) > 1 ){
        //     $meta_query['relation'] = 'OR';
        // }

        $args  =  [
            'post_type' => 'lets_get_serious',

        ];


        if( isset($_GET['age']) )
        {

            $args['meta_query'][]  =  [
                'key'       => 'age',
                'value'     => isset( $_GET["age"] ) ? $_GET["age"]  : '',
                'compare'   => '=',
            ];

        }


        if( isset($_GET['gender']) )
        {

            $args['meta_query'][]  =  [
                'key'       => 'gender',
                'value'     => isset( $_GET["gender"] ) ? $_GET["gender"]  : '',
                'compare'   => '=',
            ];

        }


        if( isset($_GET['country']) )
        {

            $args['meta_query'][]  =  [
                'key'       => 'country',
                'value'     => isset( $_GET["country"] ) ? $_GET["country"]  : '',
                'compare'   => '=',
            ];

        }else{

            $args['meta_query'][]  =  [
                'key'       => 'country',
                'value'     => isset( $_GET["country"] ) ? $_GET["country"]  : $country,
                'compare'   => '=',
            ];

        }

        if( isset($_GET['region']) )
        {

            $args['meta_query'][]  =  [
                'key'       => 'region',
                'value'     => isset( $_GET["region"] ) ? $_GET["region"]  : '' ,
                'compare'   => '=',
            ];

        }else{
            $args['meta_query'][]  =  [
                'key'       => 'region',
                'value'     => isset( $_GET["region"] ) ? $_GET["region"]  : $state ,
                'compare'   => '=',
            ];
        }

        if( isset($_GET['city']) )
        {

            $args['meta_query'][]  =  [
                'key'       => 'city',
                'value'     => isset( $_GET["city"] ) ? $_GET["city"]  : '',
                'compare'   => '=',
            ];
        }
        //       else{
        //         $args['meta_query'][]  =  [
        //           'key'       => 'city',
        //           'value'     => isset( $_GET["city"] ) ? $_GET["city"]  : $city ,
        //           'compare'   => '=',
        // ];
        //       }

        $loop = new WP_Query( $args );
        echo "<p class='countspost'>$loop->found_posts matches found in your area</p>";
        ?>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

        $(document).ready(function() {
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
    <!-- ======================================================================================== -->

    <!-- Filter   Search Ends  -->


    <!-- ======================================================================================== -->





    <div class="container-fluid">
        <section class="profile-section">
            <div class="row">

                <?php
                if ( $loop->have_posts() ) {

                    while ( $loop->have_posts() ) : $loop->the_post();

                        ?>

                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="left-profile-area">
                                <div class="profile-about-box">
                                    <div class="top-bg"></div>
                                    <div class="p-inner-content">
                                        <div class="profile-img">
                                            <?php if( get_the_post_thumbnail_url(get_the_ID(),'full') ){
                                                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'small')
                                                ?>
                                                <img src="<?php echo $featured_img_url;?>" alt="">
                                            <?php }else{ ?>
                                                <img src="https://staging.designinternal.com/wp/lets-get-serious/wp-content/uploads/2022/05/useravata-2.png" alt="">
                                            <?php } ?>
                                            <div class="active-online"></div>
                                        </div>
                                        <h5 class="name">
                                            <?php  the_title(); ?></h5>
                                        <ul class="p-b-meta-one">
                                            <li>
                                                <span><?php the_field('age'); ?> Years Old</span>
                                            </li>
                                            <li>
                                                <span> <i class="fas fa-map-marker-alt"></i><?php the_field('country'); ?>,<?php the_field('city');?></span>
                                            </li>

                                        </ul>
                                        <ul class="p-b-meta-three">
                                            <li>
                                                <span> Gender: <?php the_field('gender'); ?></span>
                                            </li>
                                            <li>
                                                <span> Interests: </i> <?php the_field('interests'); ?></span>
                                            </li>

                                        </ul>
                                        <div class="p-b-meta-two">
                                            <div class="left">
                                                <div class="icon">
                                                    <i class="far fa-comment"></i>
                                                </div>
                                                <a href="javascript:void(0)" class="start_chat" data-post_ID="<?php echo get_the_ID();?>" data-image="<?php echo $featured_img_url;?>" data-touserid="<?php echo get_the_author_ID();?>" data-tousername="<?php echo get_the_title();?>">Chat now</a>
                                            </div>
                                            <div class="right">
                                                <a href="<?php echo get_permalink(); ?>" class="custom-button">
                                                    <i class="fab fa-cloudversify"></i> View Detail
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                } else {
                    $no_post = 'no-post';
//                                                     echo "<h2 class=".$no_post.">No Matches Found</h2>";
                } ?>

            </div>
        </section>
    </div>


    <script>
        $(document).ready(function(){

            // fetch_user();

            setInterval(function(){
                //update_last_activity();
                //fetch_user();
                update_chat_history_data();
            }, 3000);

            function fetch_user()
            {
                $.ajax({
                    url:"fetch_user.php",
                    method:"POST",
                    success:function(data){
                        $('#user_details').html(data);
                    }
                })
            }

            function update_last_activity()
            {
                $.ajax({
                    url:"update_last_activity.php",
                    success:function()
                    {

                    }
                })
            }

            function make_chat_dialog_box(to_user_id, to_user_name,to_image,post_ID)
            {
                var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
                modal_content += '<span>You have chat with '+to_user_name+' </span>';
                modal_content += '<img src="'+to_image+'" alt="">';
                modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
                modal_content += fetch_user_chat_history(to_user_id);
                modal_content += '</div>';
                modal_content += '<div class="form-group">';
                modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control"></textarea>';
                modal_content += '</div><div class="form-group" align="right">';
                <?php  $nonce = wp_create_nonce("user_send_chat_nonce"); ?>
                modal_content += '<input type="hidden" id="nonce" value="<?php echo $nonce ?>" name="send-user-register-nonce">';
                modal_content+= '<button type="button" name="send_chat" data-post_id="'+post_ID+'" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
                $('#user_model_details').html(modal_content);
            }

            $(document).on('click', '.start_chat', function(){
                var to_user_id = $(this).data('touserid');
                var to_user_name = $(this).data('tousername');
                var post_ID = $(this).data('post_id');
                var to_image = $(this).data('image');
                make_chat_dialog_box(to_user_id, to_user_name,to_image,post_ID);
                $("#user_dialog_"+to_user_id).dialog({
                    autoOpen:false,
                    width:400
                });
                $('#user_dialog_'+to_user_id).dialog('open');
            });

            $(document).on('click', '.send_chat', function(){
                var post_ID = $(this).data('post_id');
                var to_user_id = $(this).attr('id');
                var chat_message = $('#chat_message_'+to_user_id).val();
                var nonce = jQuery('#nonce').val();
                $.ajax({
                    url : pollAjax.ajaxurl,
                    method:"POST",
                    data:{action: "insert_chat", nonce: nonce, to_user_id:to_user_id, chat_message:chat_message,post_ID:post_ID },
                    success:function(data)
                    {
                        $('#chat_message_'+to_user_id).val('');
                        $('#chat_history_'+to_user_id).html(data);
                    }
                })
            });

            function fetch_user_chat_history(to_user_id)
            {
                $.ajax({
                    url : pollAjax.ajaxurl,
                    // url:"fetch_user_chat_history.php",
                    method:"POST",
                    data:{action: "users_chat_history",to_user_id:to_user_id},
                    success:function(data){
                        $('#chat_history_'+to_user_id).html(data);
                    }
                })
            }

            function update_chat_history_data()
            {
                $('.chat_history').each(function(){
                    var to_user_id = $(this).data('touserid');
                    fetch_user_chat_history(to_user_id);
                });
            }

            $(document).on('click', '.ui-button-icon', function(){
                $('.user_dialog').dialog('destroy').remove();
            });

        });
    </script>
    <?php

}





// // Insert  shortcode Ajax Functionality
add_action( 'init', 'send_chat_to_user_script_enqueuer' );
function send_chat_to_user_script_enqueuer() {
    wp_register_script( "send_chat_to_user_voter_script", WP_PLUGIN_URL.'/', array('jquery') );
    wp_localize_script( 'send_chat_to_user_voter_script', 'pollAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'send_chat_to_user_voter_script' );

}

add_action("wp_ajax_insert_chat", "insert_chat");
add_action("wp_ajax_nopriv_insert_chat", "insert_chat");




function insert_chat() {
    global $wpdb;
    if ( !wp_verify_nonce($_POST['nonce'], 'user_send_chat_nonce')) {
        exit("No naughty business please");
    }

    $post_ID = $_POST['post_ID'];
    $to_user_id = $_POST['to_user_id'];
    $user_id = get_current_user_id();
    $chat_message = $_POST['chat_message'];
    $status = '1';

    $is_first_timeChat = $wpdb->get_results("SELECT to_user FROM wp_is_first_timechat WHERE from_user = '$user_id' AND  to_user = '$to_user_id' ",OBJECT );
    if ( count($is_first_timeChat) == 0 ){
        $args=array(
            'post_type' => 'lets_get_serious',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'author' => $user_id
        );

        $current_user_posts = get_posts( $args );
        $remaing_chat  = get_field( "match_count", $current_user_posts[0]->ID );
        $wpdb->insert('wp_is_first_timechat',
            array(
                'to_user' =>$to_user_id,
                'from_user' => $user_id,

            ));

        $amount_remaing = $remaing_chat - 1;
        update_field("match_count", $amount_remaing, $current_user_posts[0]->ID );

    }




    $has_dataInsert = $wpdb->insert('wp_chat_message',
        array(
            'to_user_id' =>$to_user_id,
            'from_user_id' => $user_id,
            'chat_message' => $chat_message,
            'status' =>  $status,
            'timestamp' => date("Y-m-d H:i:s")

        ));

    if( $has_dataInsert ){


        echo fetch_user_chat_history($user_id, $_POST['to_user_id']);
        //$result['type'] = "success";

    }else{
        $result['type'] = "error";

    }


    //$result = json_encode($result);
    //echo $result;

    exit();

}


add_action("wp_ajax_users_chat_history", "users_chat_history");
add_action("wp_ajax_nopriv_users_chat_history", "users_chat_history");


function users_chat_history(){

    $to_user_id = $_POST['to_user_id'];
    $user_id = get_current_user_id();
    echo fetch_user_chat_history($user_id, $_POST['to_user_id']);
    exit();

}



function fetch_user_chat_history($from_user_id, $to_user_id)
{
    global $wpdb;
    $result = $wpdb->get_results("SELECT * FROM wp_chat_message 
                                  WHERE (from_user_id = '".$from_user_id."' 
                                  AND to_user_id = '".$to_user_id."') 
                                  OR (from_user_id = '".$to_user_id."' 
                                  AND to_user_id = '".$from_user_id."') 
                                  ORDER BY timestamp ASC",
        OBJECT );

    $output = '<ul class="list-unstyled">';
    foreach($result as $row)
    {
        $user_name = '';
        if( $row->from_user_id == $from_user_id)
        {
            $user_name = '<b class="text-success">You</b>';
        }
        else
        {
            $user_name = '<b class="text-danger">'.get_user_name($row->from_user_id).'</b>';
        }
        $output .= '
        <li style="border-bottom:1px dotted #ccc">
        <p>'.$user_name.' - '.$row->chat_message.'
          <div align="right">
          - <small><em>'.$row->timestamp.'</em></small>
          </div>
        </p>
        </li>
        ';
    }
    $output .= '</ul>';
    return $output;
}


function get_user_name($user_id)
{
    global $wpdb;

    $result = $wpdb->get_results("SELECT user_login FROM wp_users WHERE ID = '$user_id'",
        OBJECT );
    foreach($result as $row)
    {
        return $row->user_login;
    }
}

