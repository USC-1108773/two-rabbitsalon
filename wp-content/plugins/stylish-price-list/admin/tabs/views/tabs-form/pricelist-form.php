<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    wp_enqueue_style( 'wp-color-picker' ); 
    wp_enqueue_script('spl-bootstrap-min');
    wp_enqueue_script('spl-pricelist-admin-core');

    wp_enqueue_script('spl-pricelist-admin');
    wp_enqueue_style('spl-bootstrap-min');
    wp_enqueue_style('spl-list-style');


$id='';
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
?>
<!--Include library sortable-->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<?php 
$list_count=spl_get_tabs_count();
$opt=spl_get_options();

$google_fonts_preview_out=$opt['google_fonts_preview_out'];
$opt['html_out'] = 'select_html';
$html_out=$opt['html_out'];
$opt['get_fonts_options'] = 'get_fonts_options';
$get_fonts_options=$opt['get_fonts_options'];
$max_cat_count=$opt['max_cat_count'];
$max_service_count=$opt['max_service_count'];
$max_list_count=$opt['max_list_count'];
if($list_count>=$max_list_count && empty($id)){echo want_more_lists(); return;};
// $want_more_lists=$opt['want_more_lists'];
?>

<?php 
$cats_data=array();
$_init_service=array(
            'service_name' =>'',
            'service_regular_price' => '',
            'service_price' => '',
            'service_desc' => '',
            'service_button' => '',
            'service_button_url' => '',
            'service_image' => ''
      
// 		'service_url'  => ''
    );
$init_cat=array(
        'name'=>'',
        0=>$_init_service
    );
$cats_data['category'][1]=array(
        'name'=>'',
        1=>$_init_service
    );

$list_name='';
$hover_color='';
$title_color='';
$title_color_top='';
$price_color='';
$service_description_color='';
$tab_description_color='';
$service_color='';

$list_name_font='';
$title_font='';
$price_font='';
$service_description_font='';
$tab_description_font='';
$desc_font='';
$optionArr = array('Thin'=>100,'Extra_Light'=>200,'Light'=>300,'Normal'=>400,'Medium'=>500,'Semi_Bold'=>600,'Bold'=>700,'Extra_Bold'=>800,'Ultra_Bold'=>900);
if(!empty($id)){
    $cats_data=spl_get_option($id);
    /*echo "<pre>";
    print_r($cats_data);
    echo "</pre>";*/

    $list_name= isset($cats_data['list_name']) ? $cats_data['list_name'] : ''; //$cats_data['list_name']
	$all_tab= isset($cats_data['all_tab']) ? $cats_data['all_tab'] : ''; //$cats_data['all_tab']
	$style_cat_tab_btn= isset($cats_data['style_cat_tab_btn']) ? $cats_data['style_cat_tab_btn'] : ''; //$cats_data['style_cat_tab_btn']
	$spl_remove_title= isset($cats_data['spl_remove_title']) ? $cats_data['spl_remove_title'] : '';
    $style= isset($cats_data['tab_style']) ? $cats_data['tab_style'] : '';
    $style5_category= isset($cats_data['style5_category']) ? $cats_data['style5_category'] : '';
     //$cats_data['tab_style']
    $hover_color= isset($cats_data['hover_color']) ? $cats_data['hover_color'] : ''; //$cats_data['hover_color']
    $service_color= isset($cats_data['service_color']) ? $cats_data['service_color'] : ''; //$cats_data['service_color']
    $title_color= isset($cats_data['title_color']) ? $cats_data['title_color'] : ''; //$cats_data['title_color']
    $price_color= isset($cats_data['price_color']) ? $cats_data['price_color'] : ''; //$cats_data['price_color']
    $service_description_color= isset($cats_data['service_description_color']) ? $cats_data['service_description_color'] : ''; //$cats_data['service_description_color']
    $tab_description_color= isset($cats_data['tab_description_color']) ? $cats_data['tab_description_color'] : ''; //$cats_data['service_description_color']
    $title_size= isset($cats_data['title_font_size']) ? $cats_data['title_font_size'] : ''; //$cats_data['title_font_size']
    $title_color_top= isset($cats_data['title_color_top']) ? $cats_data['title_color_top'] : ''; //$cats_data['title_color_top']
    $select_price= isset($cats_data['service_price_font_size']) ? $cats_data['service_price_font_size'] : ''; //$cats_data['service_price_font_size']

    $list_name_font= isset($cats_data['list_name_font']) ? $cats_data['list_name_font'] : ''; //$cats_data['list_name_font']
    $title_font= isset($cats_data['title_font']) ? $cats_data['title_font'] : ''; //$cats_data['title_font']
    $price_font= isset($cats_data['price_font']) ? $cats_data['price_font'] : ''; //$cats_data['price_font']
    $service_description_font= isset($cats_data['service_description_font']) ? $cats_data['service_description_font'] : ''; //$cats_data['service_description_font']
    $tab_description_font= isset($cats_data['tab_description_font']) ? $cats_data['tab_description_font'] : ''; //$cats_data['service_description_font']
    $desc_font= isset($cats_data['desc_font']) ? $cats_data['desc_font'] : ''; //$cats_data['desc_font']
	$toggle= isset($cats_data['toggle']) ? $cats_data['toggle'] : ''; //$cats_data['toggle']
	$toggle_all_tab= isset($cats_data['toggle_all_tab']) ? $cats_data['toggle_all_tab'] : ''; //$cats_data['toggle_all_tab']
	$price_list_desc= isset($cats_data['price_list_desc']) ? $cats_data['price_list_desc'] : ''; //$cats_data['price_list_desc']
 	
	$brack_title_desktop = isset($cats_data['brack_title_desktop']) ? $cats_data['brack_title_desktop'] : ''; //$cats_data['brack_title_desktop']
	$brack_title_tablets = isset($cats_data['brack_title_tablets']) ? $cats_data['brack_title_tablets'] : ''; //$cats_data['brack_title_tablets']
}
$id=isset($_GET['id']) ? $_GET['id'] : '';
$cats_data1=spl_get_option($id);
//echo '<pre>'; print_r($cats_data1); echo '</pre>';
$lang_obj= new convert_lang;
if(isset($_REQUEST['lang'])){
        $Select_Language = $lang_obj->convert_lang_function($_REQUEST['lang'],'Select_Language');
        $Select_Column = $lang_obj->convert_lang_function($_REQUEST['lang'],'Select_Column');
        $Max_Width = $lang_obj->convert_lang_function($_REQUEST['lang'],'Max_Width');
        $Save = $lang_obj->convert_lang_function($_REQUEST['lang'],'Save');
        $Price_List_Name = $lang_obj->convert_lang_function($_REQUEST['lang'],'Price_List_Name');
        $Select_Style = $lang_obj->convert_lang_function($_REQUEST['lang'],'Select_Style');
        $More_Settings = $lang_obj->convert_lang_function($_REQUEST['lang'],'More_Settings');
        $Default_Tab = $lang_obj->convert_lang_function($_REQUEST['lang'],'Default_Tab');
        $Change_All_word_for_Categories = $lang_obj->convert_lang_function($_REQUEST['lang'],'Change_All_word_for_Categories');
        $different_languages = $lang_obj->convert_lang_function($_REQUEST['lang'],'different_languages');
        $Remove_title = $lang_obj->convert_lang_function($_REQUEST['lang'],'Remove_title');
        $Display_the_All_word = $lang_obj->convert_lang_function($_REQUEST['lang'],'Display_the_All_word');
        $Category_Separator_Symbol = $lang_obj->convert_lang_function($_REQUEST['lang'],'Category_Separator_Symbol');
        $Stylish_Category_Tabs_Buttons = $lang_obj->convert_lang_function($_REQUEST['lang'],'Stylish_Category_Tabs_Buttons');
        $Break_title_of_Service = $lang_obj->convert_lang_function($_REQUEST['lang'],'Break_title_of_Service');
        $Break_line_of_categories_on_Desktop = $lang_obj->convert_lang_function($_REQUEST['lang'],'Break_line_of_categories_on_Desktop');
        $Break_line_of_categories_on_Tablets = $lang_obj->convert_lang_function($_REQUEST['lang'],'Break_line_of_categories_on_Tablets');
        $Price_List_Description = $lang_obj->convert_lang_function($_REQUEST['lang'],'Price_List_Description');
        $Title = $lang_obj->convert_lang_function($_REQUEST['lang'],'Title');
        $Category_Tabs = $lang_obj->convert_lang_function($_REQUEST['lang'],'Category_Tabs');
        $Category_description_Tabs = $lang_obj->convert_lang_function($_REQUEST['lang'],'Category_description_Tabs');
        $Service_Name = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_Name');
        $Service_Price = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_Price');
        $Service_Description = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_Description');
        $Category_description_Tabs = $lang_obj->convert_lang_function($_REQUEST['lang'],'Category_description_Tabs');
        $Font_Size = $lang_obj->convert_lang_function($_REQUEST['lang'],'Font_Size');
        $Font_Color = $lang_obj->convert_lang_function($_REQUEST['lang'],'Font_Color');
        $Font_Style = $lang_obj->convert_lang_function($_REQUEST['lang'],'Font_Style');
        $Font_Weight = $lang_obj->convert_lang_function($_REQUEST['lang'],'Font_Weight');
        $Hover_Color = $lang_obj->convert_lang_function($_REQUEST['lang'],'Hover_Color');
        $GLOBALS['Category_Name']= $lang_obj->convert_lang_function($_REQUEST['lang'],'Category_Name');
        $GLOBALS['Category_Description'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Category_Description');
        $GLOBALS['Service_Name'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_Name');
        $GLOBALS['Service_Regular_Price'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_Regular_Price');
        $GLOBALS['Service_Price'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_Price');
        $GLOBALS['Service_Description_Length'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_Description_Length');
        $GLOBALS['Service_Button'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_Button');
        $GLOBALS['Service_Button_URL'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_Button_URL');
        $GLOBALS['Service_Image'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_Image');
        // $GLOBALS['Service_URL'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_URL');
        $GLOBALS['Remove_Service'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Remove_Service');
		$GLOBALS['Add_Service'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Add_Service');
		$GLOBALS['Add_Category'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Add_Category');
		$GLOBALS['Remove_Category'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Remove_Category');
		$Restore = $lang_obj->convert_lang_function($_REQUEST['lang'],'Restore');
		$Backup = $lang_obj->convert_lang_function($_REQUEST['lang'],'Backup');
		$Preview_List = $lang_obj->convert_lang_function($_REQUEST['lang'],'Preview_List');
		$FONT_SETTINGS = $lang_obj->convert_lang_function($_REQUEST['lang'],'FONT_SETTINGS');
		$ADD_TO_WEBPAGE = $lang_obj->convert_lang_function($_REQUEST['lang'],'ADD_TO_WEBPAGE');
		$GLOBALS['CATEGORY'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'CATEGORY');
}
else{
    if($cats_data1['select_lang']!=''){
        $Select_Language = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Select_Language');
        $Select_Column = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Select_Column');
        $Max_Width = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Max_Width');
        $Save = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Save');
        $Price_List_Name = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Price_List_Name');
        $Select_Style = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Select_Style');
        $More_Settings = $lang_obj->convert_lang_function($cats_data1['select_lang'],'More_Settings');
        $Default_Tab = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Default_Tab');
        $Change_All_word_for_Categories = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Change_All_word_for_Categories');
        $different_languages = $lang_obj->convert_lang_function($cats_data1['select_lang'],'different_languages');
        $Remove_title = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Remove_title');
        $Display_the_All_word = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Display_the_All_word');
        $Category_Separator_Symbol = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Category_Separator_Symbol');
        $Stylish_Category_Tabs_Buttons = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Stylish_Category_Tabs_Buttons');
        $Break_title_of_Service = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Break_title_of_Service');
        $Break_line_of_categories_on_Desktop = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Break_line_of_categories_on_Desktop');
        $Break_line_of_categories_on_Tablets = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Break_line_of_categories_on_Tablets');
        $Price_List_Description = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Price_List_Description');
        $Title = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Title');
        $Category_Tabs = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Category_Tabs');
        $Service_Name = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_Name');
        $Service_Price = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_Price');
        $Service_Description = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_Description');
        $Category_description_Tabs = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Category_description_Tabs');
        $Font_Size = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Font_Size');
        $Font_Color = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Font_Color');
        $Font_Style = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Font_Style');
        $Font_Weight = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Font_Weight');
        $Hover_Color = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Hover_Color');
        $GLOBALS['Category_Name']= $lang_obj->convert_lang_function($cats_data1['select_lang'],'Category_Name');
        $GLOBALS['Category_Description'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Category_Description');
        $GLOBALS['Service_Name'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_Name');
        $GLOBALS['Service_Regular_Price'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_Regular_Price');
        $GLOBALS['Service_Price'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_Price');
        $GLOBALS['Service_Description_Length'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_Description_Length');
        $GLOBALS['Service_Button'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_Button');
        $GLOBALS['Service_Button_URL'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_Button_URL');
        $GLOBALS['Service_Image'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_Image');
        // $GLOBALS['Service_URL'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_URL');
        $GLOBALS['Remove_Service'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Remove_Service');
		$GLOBALS['Add_Service'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Add_Service');
		$GLOBALS['Add_Category'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Add_Category');
		$GLOBALS['Remove_Category'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Remove_Category');
		$Restore = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Restore');
		$Backup = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Backup');
		$Preview_List = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Preview_List');
		$FONT_SETTINGS = $lang_obj->convert_lang_function($cats_data1['select_lang'],'FONT_SETTINGS');
		$ADD_TO_WEBPAGE = $lang_obj->convert_lang_function($cats_data1['select_lang'],'ADD_TO_WEBPAGE');
		$GLOBALS['CATEGORY'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'CATEGORY');
    }
    else{
        $Select_Language = $lang_obj->convert_lang_function('EN','Select_Language');
        $Select_Column = $lang_obj->convert_lang_function('EN','Select_Column');
        $Max_Width = $lang_obj->convert_lang_function('EN','Max_Width');
        $Save = $lang_obj->convert_lang_function('EN','Save');
        $Price_List_Name = $lang_obj->convert_lang_function('EN','Price_List_Name');
        $Select_Style = $lang_obj->convert_lang_function('EN','Select_Style');
        $More_Settings = $lang_obj->convert_lang_function('EN','More_Settings');
        $Default_Tab = $lang_obj->convert_lang_function('EN','Default_Tab');
        $Change_All_word_for_Categories = $lang_obj->convert_lang_function('EN','Change_All_word_for_Categories');
        $different_languages = $lang_obj->convert_lang_function('EN','different_languages');
        $Remove_title = $lang_obj->convert_lang_function('EN','Remove_title');
        $Display_the_All_word = $lang_obj->convert_lang_function('EN','Display_the_All_word');
        $Category_Separator_Symbol = $lang_obj->convert_lang_function('EN','Category_Separator_Symbol');
        $Stylish_Category_Tabs_Buttons = $lang_obj->convert_lang_function('EN','Stylish_Category_Tabs_Buttons');
        $Break_title_of_Service = $lang_obj->convert_lang_function('EN','Break_title_of_Service');
        $Break_line_of_categories_on_Desktop = $lang_obj->convert_lang_function('EN','Break_line_of_categories_on_Desktop');
        $Break_line_of_categories_on_Tablets = $lang_obj->convert_lang_function('EN','Break_line_of_categories_on_Tablets');
        $Price_List_Description = $lang_obj->convert_lang_function('EN','Price_List_Description');
        $Title = $lang_obj->convert_lang_function('EN','Title');
        $Category_Tabs = $lang_obj->convert_lang_function('EN','Category_Tabs');
        $Service_Name = $lang_obj->convert_lang_function('EN','Service_Name');
        $Service_Price = $lang_obj->convert_lang_function('EN','Service_Price');
        $Service_Description = $lang_obj->convert_lang_function('EN','Service_Description');
        $Category_description_Tabs = $lang_obj->convert_lang_function('EN','Category_description_Tabs');
        $Font_Size = $lang_obj->convert_lang_function('EN','Font_Size');
        $Font_Color = $lang_obj->convert_lang_function('EN','Font_Color');
        $Font_Style = $lang_obj->convert_lang_function('EN','Font_Style');
        $Font_Weight = $lang_obj->convert_lang_function('EN','Font_Weight');
        $Hover_Color = $lang_obj->convert_lang_function('EN','Hover_Color');
        $GLOBALS['Category_Name']= $lang_obj->convert_lang_function('EN','Category_Name');
        $GLOBALS['Category_Description'] = $lang_obj->convert_lang_function('EN','Category_Description');
        $GLOBALS['Service_Name'] = $lang_obj->convert_lang_function('EN','Service_Name');
        $GLOBALS['Service_Regular_Price'] = $lang_obj->convert_lang_function('EN','Service_Regular_Price');
        $GLOBALS['Service_Price'] = $lang_obj->convert_lang_function('EN','Service_Price');
        $GLOBALS['Service_Description_Length'] = $lang_obj->convert_lang_function('EN','Service_Description_Length');
        $GLOBALS['Service_Button'] = $lang_obj->convert_lang_function('EN','Service_Button');
        $GLOBALS['Service_Button_URL'] = $lang_obj->convert_lang_function('EN','Service_Button_URL');
        $GLOBALS['Service_Image'] = $lang_obj->convert_lang_function('EN','Service_Image');
        // $GLOBALS['Service_URL'] = $lang_obj->convert_lang_function('EN','Service_URL');
        $GLOBALS['Remove_Service'] = $lang_obj->convert_lang_function('EN','Remove_Service');
		$GLOBALS['Add_Service'] = $lang_obj->convert_lang_function('EN','Add_Service');
		$GLOBALS['Add_Category'] = $lang_obj->convert_lang_function('EN','Add_Category');
		$GLOBALS['Remove_Category'] = $lang_obj->convert_lang_function('EN','Remove_Category');
		$Restore = $lang_obj->convert_lang_function('EN','Restore');
		$Backup = $lang_obj->convert_lang_function('EN','Backup');
		$Preview_List = $lang_obj->convert_lang_function('EN','Preview_List');
	    $FONT_SETTINGS = $lang_obj->convert_lang_function('EN','FONT_SETTINGS');
		$ADD_TO_WEBPAGE = $lang_obj->convert_lang_function('EN','ADD_TO_WEBPAGE');
		$GLOBALS['CATEGORY'] = $lang_obj->convert_lang_function('EN','CATEGORY');
    }
    
}


/*function global_lang(){
    return 'hello';
}*/

function want_more_lists(){
    ob_start();
    include_once dirname(__FILE__) . '/logo-header.php';
    ?>
    <div class="body-inner container-fluid" style="max-width:900px;margin-left:0px;">
        <div class="row cats-row">
            You're using the free version of this plugin, you can only use a maximum of 2 lists, 3 categories and 4 services. You can purchase a license to add unlimited lists and services. and categories. <a href="http://designful.ca/apps/stylish-price-list-wordpress/"> Purchase Here</a>
        </div>
    </div>
    <?php
    $html=ob_get_clean();
    return $html;
}//end want_more_lists() 

if(!function_exists('color_out')){
    function color_out($id,$value="",$title=""){
        ob_start();
        ?>
<div class="row cats-row">
    <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
        <label for="<?php echo $id; ?>"><?php echo $title; ?></label>
    </div>
    <div class="col-xs-7 col-sm-7 col-md-8  col-lg-8 padl-align">
        <input type="text" name="<?php echo $id; ?>" id="<?php echo $id; ?>" class="form-control <?php echo $id; ?> color-picker" value="<?php echo $value; ?>" title="<?php echo $title; ?>">
    </div>
</div> <!-- <?php echo $title; ?> -->
        <?php
        $html=ob_get_clean();
        return $html;
    }//end color_out() 
}//end if !function_exists('color_out')
if(!function_exists('how_to_get_google_fonts')){
    function how_to_get_google_fonts(){
        ob_start();
        ?>
        <div class="row cats-row font_setting_container">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                Enter your <b>license key</b> to get Google fonts, 
                how Google fonts look like? check <a href="https://fonts.google.com/">Google fonts preview</a>
            </div>
        </div>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end how_to_get_google_fonts() 
}//end if !function_exists('how_to_get_google_fonts')
if(!function_exists('google_fonts_preview')){
    function google_fonts_preview(){
        ob_start();
        ?>
        <!--<div class="row cats-row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="google">
                <b>How Google font looks like? check </b> <a href="https://fonts.google.com/">google fonts preview</a>
                </div>
            </div>
        </div>-->
        <?php
        $html=ob_get_clean();
        return $html;
    }//end google_fonts_preview() 
}//end if !function_exists('google_fonts_preview')

if(!function_exists('html_out')){
    function html_out($name, $options=array(),$current_value='',$title=""){
        $html_out='hidden_html';//
        ob_start();
        ?>
        <div class="row cats-row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 lbl">
                <label for="<?php echo $name; ?>"><?php echo $title; ?></label>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <?php echo $html_out($name,$options,$current_value); ?>
            </div>
        </div> <!-- List Name Font -->
        <?php
        $html=ob_get_clean();
        return $html;
    }//end html_out() 
}//end if !function_exists('html_out')


if(!function_exists('hidden_html')){
    function hidden_html($name, $options=array(),$current_value='',$title="")
    {
        ob_start();
?>
<input type="hidden" name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="form-control" value="<?php echo $current_value; ?>">
<?php
        $html=ob_get_clean();
        return $html;
    }
}//end if !function_exists('hidden_html')
?>

<?php
if(!function_exists('select_html')){
    function select_html($name, $options=array(),$current_value='',$title="")
    {
        ob_start();
?>
<div class="row cats-row">
    <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
        <label for="<?php echo $name; ?>"><?php echo $title; ?></label>
    </div>
    <div class="col-xs-7 col-sm-7 col-md-8  col-lg-8 padl-align">
        <select name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="form-control" style="box-shadow: 2px 2px 0px #888;">
            <?php foreach ($options as $value => $label): ?>
                <?php 
                    $selected='';
                    if($current_value==$value){
                        $selected=' selected="selected"';
                    }
          if($current_value==''){
          if($label=='Open Sans'){
            $selected=' selected="selected"';
            }
          } 
                 ?>
                <option value="<?php echo $value; ?>"<?php echo $selected; ?>><?php echo $label; ?></option>
            <?php endforeach ?>
        </select>
    </div>
</div> <!-- <?php echo $title; ?> -->
<?php
        $html=ob_get_clean();
        return $html;
    }
}//end if !function_exists('select_html')
?>
<?php 
if(!function_exists('service_items_html')){
    function service_items_html($cat_id=0,$service_id=0,$service=null){
        ob_start();
        $items=array(
                array(
                    'title'=>$GLOBALS['Service_Name'],
                    'id'=>'service_name',
                    ),
                    array(
                    'title'=>$GLOBALS['Service_Regular_Price'],
                    'id'=>'service_regular_price',
                    ),
                array(
                    'title'=>$GLOBALS['Service_Price'],
                    'id'=>'service_price',
                    ),
                array(
                    'title'=>$GLOBALS['Service_Description_Length'],
                    'id'=>'service_desc',
                    ),
            array(
                    'title'=>$GLOBALS['Service_Button'],
                    'id'=>'service_button',
                    ),
            array(
                    'title'=>$GLOBALS['Service_Button_URL'],
                    'id'=>'service_button_url',
                    ),
                    array(
                    'title'=>$GLOBALS['Service_Image'],
                    'id'=>'service_image',
                    ),
// 	array(
//                     'title'=>$GLOBALS['Service_URL'],
//                     'id'=>'service_url',
//                     ),
            );
        // $cat_id=0;
        // $service_id=0;
        foreach ($items as $key => $item) {
			
            $item['cat_id']=$cat_id;
            $item['service_id']=$service_id;
            $item['value']=$service[$item['id']] ?? null;
            echo service_item($item);
        }
		$html=ob_get_clean();
        return $html;
    }//end service_items_html()
}//end if !function_exists('service_items_html')
if(!function_exists('add_remove_service')){
    function add_remove_service($max_service_count){
        ob_start();
        ?>
        <div class="row add-remove-service custom-mobile">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 remove-service">
                <a href="javascript:void(0);" onclick="remove_service(this)" class="remove-service add-remove-service"><?php echo $GLOBALS['Remove_Service']; ?> [-] </a>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 add-service">
                <a href="javascript:void(0);" onclick="add_service(this,<?php echo $max_service_count; ?>)" class="add-service add-remove-service"><?php echo $GLOBALS['Add_Service']; ?> [+] </a>
            </div>
        </div>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end add_remove_service() 
}//end if !function_exists('add_remove_service')

if(!function_exists('service_item')){
    function service_item($item){
        /*
        $item=array(
            'cat_id'=>0,
            'service_id'=>0,
            'title'=>'Service Name',
            'id'=>'service_name',
        );
        */
        ob_start();
        extract($item);
        $title="$title($service_id)";
        $name="category[{$cat_id}][{$service_id}][{$id}]";
        $html_id="category_{$cat_id}_{$service_id}_{$id}";
        //$title=remove_slash_quotes($title);
        $value=remove_slash_quotes($value);
        ?>
        <div class="row service-price-length <?php if($id == 'service_regular_price' || $id == 'service_image'){ echo 'spl_style6_element'; } ?>">
            <div class="col-xs-6 col-sm-5 col-md-5 col-lg-5 lbl">
                <label for="<?php echo $html_id; ?>"><?php echo $title; ?></label>
            </div>
            <div class="col-xs-6 col-sm-7 col-md-7 col-lg-7">
                <?php if($id == 'service_button'){ ?>
                <div class="col-md-2 col-xs-4 padding_zero_spl">
                <div class="custom-control custom-checkbox <?php echo $id; ?>">
                   <?php if($value != ''){ ?>
                      <input type="checkbox" data-id="<?php echo "category_{$cat_id}_{$service_id}"; ?>" name="<?php echo "category[{$cat_id}][{$service_id}][service_button_enable]"; ?>" class="custom-control-input spl_service_button_enable" checked="checked">
                   <?php }else{ ?>
                    <input type="checkbox" data-id="<?php echo "category_{$cat_id}_{$service_id}"; ?>" name="<?php echo "category[{$cat_id}][{$service_id}][service_button_enable]"; ?>" class="custom-control-input spl_service_button_enable">
                    <?php } ?>
                </div>
                </div>
                <div class="col-md-10 col-xs-8 padding_zero_spl">
                <input type="text" name="<?php echo $name; ?>" id="<?php echo $html_id; ?>" class="form-control <?php echo $id; ?>" value="<?php echo $value; ?>" placeholder="Button Title" title="">
                </div>
                <?php }else if($id == 'service_button_url'){ ?>
                <input type="text" name="<?php echo $name; ?>" id="<?php echo $html_id; ?>" class="form-control <?php echo $id; ?> <?php echo "category_{$cat_id}_{$service_id}_service_button_url"; ?>" value="<?php echo $value; ?>" title="">
                <?php }elseif($id == 'service_image'){ ?>
                <img src="<?php echo $value; ?>" width="45px;" height="45px;" />
                <input type="file" name="<?php echo $name; ?>" id="<?php echo $html_id; ?>" class="form-control <?php echo $id; ?>" value="<?php echo $value; ?>" title="">
                <input type="hidden" name="<?php echo $name; ?>" id="<?php echo $html_id; ?>" class="form-control <?php echo $id; ?>" value="<?php echo $value; ?>" title="">
                <?php }else{ ?>
                <input type="text" name="<?php echo $name; ?>" id="<?php echo $html_id; ?>" class="form-control <?php echo $id; ?>" value="<?php echo $value; ?>" title="">
               <?php } ?>
            </div>
        </div>  <?php echo '<!-- ' . $title . ' -->'; ?> 
        <?php
        $html=ob_get_clean();
        return $html;
    }//end service_item() 
}//end if !function_exists('service_item')

if(!function_exists('category_name_row')){
    
    function category_name_row($cat_id,$cat_name="",$cat_description){
        $cat_name=remove_slash_quotes($cat_name);
        ob_start();
        ?>
         <div class="categor-sec-first">
             <div class="heading-catag">
			 <div><i class="fa fa-arrows" aria-hidden="true" style="float: right;margin: 11px;font-size: 19px;"></i></div>
                 <span><?php echo $GLOBALS['CATEGORY']; ?></span>
                 <?php
                 //if($service_id > 1){
                ?>
				<a href="javascript:void(0);" id="remove-category-row" class="remove-category" onclick=""><?php echo $GLOBALS['Remove_Category']; ?> [-]</a>
				<?php //} ?>
                 </div>
        <div class="row category-name-row">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 lbl">
                <label for="category_<?php echo $cat_id; ?>_name"><?php echo $GLOBALS['Category_Name']; ?>(<?php echo $cat_id; ?>)</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 ini">
                <input type="text" name="category[<?php echo $cat_id; ?>][name]" id="category_<?php echo $cat_id; ?>_name" class="form-control category_name" value="<?php echo $cat_name; ?>" title="">
            </div>
        </div> <!-- Category Name -->
		<!--Category Description-->
		<div class="row category-description-row">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 lbl">
                <label for="category_<?php echo $cat_id; ?>_description"><?php echo $GLOBALS['Category_Description']; ?>(<?php echo $cat_id; ?>)</label>
            </div> 
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 ini">
				<textarea name="category[<?php echo $cat_id; ?>][description]" id="category_<?php echo $cat_id; ?>_description" class="form-control category_description" rows="2" cols="50"><?php echo remove_slash_quotes($cat_description); ?></textarea>
            </div>
        </div>
         </div>
		<!--End Category Description-->
        <?php
        $html=ob_get_clean();
        return $html;
    }//end category_name_row() 
}//end if !function_exists('category_name_row')

if(!function_exists('category_row')){
    function category_row($cat_id,$cat=null,$max_service_count=3){
		//echo $cat_id;
        ob_start();
        $cat_name="";
        if(!is_null($cat)){
            $cat_name=$cat['name'];
            unset($cat['name']);//remove the name items, so, we can use foreach to process 
        }
		$cat_description="";
		if(!is_null($cat)){
            //$cat_description=$cat['description'];
			$cat_description=isset($cat['description']) ? $cat['description'] : '';
            unset($cat['description']);//remove the name items, so, we can use foreach to process 
        }
        ?>
            <div id="sortable" class="row category-row ui-widget-content">
                <?php 
		
                    // $cat_id=0;
                    // $service_id=0;
                    echo category_name_row($cat_id,$cat_name,$cat_description);
                 ?>
                 <?php 
                 foreach ($cat as $service_id => $service):
                ?>
                            <!-- echo category_row($cat_id,$service_id,$cat_name); -->
                    <div class="service-price-length-rows-wrapper">
                        <div class="spl_ser_sec_ico"><i class="fa fa-arrows" aria-hidden="true" style="float: right;margin: 11px;font-size: 19px;"></i></div>
                    <?php 
                        echo service_items_html($cat_id,$service_id,$service);
                        echo add_remove_service($max_service_count);
                    ?>
                    </div> <!-- service-price-length-rows-wrapper -->
					
                <?php   
                 endforeach;
				if($service_id > 1){
                ?>
				<!--<a href="javascript:void(0);" id="remove-category-row" class="remove-category" onclick=""><?php echo $GLOBALS['Remove_Category']; ?></a>-->
				<?php } ?>
            </div> <!-- category-row -->
        <?php
        $html=ob_get_clean();
        return $html;
    }//end category_row() 
}//end if !function_exists('category_row')
?>

<?php 
  include_once dirname(__FILE__) . '/logo-header.php';
?>

<?php if (array_key_exists('error', $_GET)): ?>
    <div class="notice notice-error"><p><?php esc_html_e( $_GET['error'], 'text_domain' ); ?></p></div>
<?php endif; ?>
<?php if (array_key_exists('success', $_GET)): ?>
    <div class="notice notice-success"><p><?php esc_html_e( $_GET['success'], 'text_domain' ); ?></p></div>
<?php endif; ?>
<?php 


            global $spl_googlefonts_var;
            $google_fonts=$spl_googlefonts_var->$get_fonts_options();
            // $google_fonts=array(
            //         ''=>'Select a Google Font',
            //     );

            // $gf_fonts=$spl_googlefonts_var->get_fonts();
            // foreach($gf_fonts as $font){
            //     $class = array();           
            //     $has_variants = false;
            //     $has_subsets = false;
            //     $normalized_name = $spl_googlefonts_var->gf_normalize_font_name($font->family);
                
            //     $class[] = $normalized_name;
                
            //     if(count($font->variants)>1){
            //         $class[] = "has-variant";
            //     }
            //     if(count($font->subsets)>1){
            //         $class[] = "has-subsets";
            //     }
            //     $google_fonts[$normalized_name]=$font->family;
            // }
        ?>
    <h1 style="height:1px; margin:0px; padding:0px;"></h1>
<div class="body-inner price_wrapper container-fluid" style="margin-left:0px;">

<!---// INNER FORM IN ONE ROW --->
<div class="form-save-and-restore">
    <form action="" method="POST" enctype="multipart/form-data" role="form">

    <div style="max-width:900px;margin-left:0px;">
        <div class="row cats-row">
            <!--<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 lbl">-->
            <!--    <label for="list_name"><?php echo $Price_List_Name; ?></label>-->
            <!--</div>-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 custom-inner-input" >
                <?php $list_name=remove_slash_quotes($list_name) ?>
                <input type="text" name="list_name" id="list_name" class="form-control list_name" placeholder="<?php echo $Price_List_Name; ?>" required="" value="<?php echo $list_name; ?>" title="" style="max-width:100% !important; height:40px;margin-top: 20px;margin-bottom:-10px;">
            </div>
        </div>
        <div class="row cats-row">    
			 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <select class="form-control" id="sel1" name="tab_style" style="max-width:100% !important;height:40px;">
                  <option class="form-control default_tab" value="">Select Style</option>
                  <option class="form-control default_tab" value="with_tab" <?php echo isset($style) && $style =='with_tab' ? "selected": ""; ?> >Style #1</option>
				  <option class="form-control default_tab" value="without_tab" <?php echo isset($style) && $style =='without_tab' ? "selected": ""; ?>>Style #2</option>
				  <option class="form-control default_tab" value="without_tab_single_column" <?php echo isset($style) && $style=='without_tab_single_column' ? "selected": ""; ?>>Style #2 (Single Column)</option>
				  <option class="form-control default_tab" value="style_3" <?php echo isset($style) && $style=='style_3' ? "selected": ""; ?>>Style #3</option>
				  <option class="form-control default_tab" value="style_4" <?php echo isset($style) && $style=='style_4' ? "selected": ""; ?>>Style #4</option>
				  <option class="form-control default_tab" value="style_5" <?php echo isset($style) && $style=='style_5' ? "selected": ""; ?>>Style #5</option>
				  <option class="form-control default_tab" value="style_6" <?php echo isset($style) && $style=='style_6' ? "selected": ""; ?>>Style #6</option>
                </select>
            </div>
        </div>
        <div class="row cats-row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="style5_category_container" style="display:none">
            <div class="form-group">
                <label for="exampleInputEmail1">Category (Navigation) Bar Style for Style #5</label>
                <select class="form-control" id="style5_category" name="style5_category" style="max-width:100% !important;">
                    <option class="form-control default_tab" value="style5_category_1" <?php echo isset($style5_category) && $style5_category =='style5_category_1' ? "selected": ""; ?> >Style 1 | Right Side</option>
                    <option class="form-control default_tab" value="style5_category_2" <?php echo isset($style5_category) && $style5_category =='style5_category_2' ? "selected": ""; ?> >Style 2 | Thicker</option>
                </select>
            </div>
                
            </div>
    </div>
	
	<!--Section for Change Style-->

	<div class="row cats-row">
    
        
 

            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 lbl">
                <!--<label for="default_tab"><?php echo $Select_Style; ?></label>-->
            </div>
        </div>
	<!--End Section for Change Style-->
         <div class="row" style="margin-top:30px;">

                <div class="col-sm-4 col-md-4 save-head">
                 <span class="spl_btn_primary price-save">
                     <?php submit_button( __( $Save, 'spl' ), 'primary', 'submit_tabs' ); ?>
                </span>
                </div>
                <div class="col-sm-4 col-md-4 custom-size">
                 <button type="button" name="load_template" value="" class="button button-primary advance_setting"><?php echo $More_Settings; ?></button>
                </div>
                <div class="col-sm-4 col-md-4 custom-size">
                   <button type="button" name="font_settitng" value="" class="button button-primary font_settitng"><?php echo $FONT_SETTINGS; ?></button>
                </div>
         </div>
            <br>
            <br>

             <div class="row" style="margin-top:-30px;">
                <div class="col-sm-3 col-md-3 custom-size">
                 <button type="button" name="add_to_webpage" value="" class="button button-primary add_to_webpage"><?php echo $ADD_TO_WEBPAGE; ?></button>
                </div>
			    <div class="col-sm-3 col-md-3 custom-size">
                 <button type="button" id="myBtnVideos" name="video_tutorial_btn" value="" class="button button-primary video_tutorial_btn">VIDEO TUTORIAL</button>
                </div>
                <div class="col-sm-3 col-md-3 custom-size">
                 <button type="button" id="liveDemoBtn" name="video_tutorial_btn" value="" class="button button-primary video_tutorial_btn"><a href="https://designful.ca/stylish-price-list-live/" style="color:#FFF;" target="_blank">LIVE DEMO</a></button>
                </div>
                <div class="col-sm-3 col-md-3 custom-size">
                 <button type="button" id="myBtnSupport" name="video_tutorial_btn" value="" class="button button-primary video_tutorial_btn">CONTACT SUPPPORT</button>
                </div>
            </div>

  <div class="row cats-row show_hide_shortcode" style="display:none;">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <span>Shortcode <b>[pricelist id="<?php esc_html_e( $id, 'text_domain' );?>"]</b></span>
        </div>
  </div>
  
  <?php  
  /*$opt=get_option('spllk_opt'); 
     if(empty($opt)){
       echo '<p class="free_version">You are using the <span class="highlighted">Demo</span> version of the plugin. Click <span class="highlighted"><a href="https://stylishpricelist.com/">here</a></span> to buy the pro version.</p>';
     }*/
  ?>
  
  <div class="row cats-row">
    <div class="col-xs-7 col-sm-7 col-md-4 col-lg-4">
                <!--<span>Shortcode <b>[pricelist id="<?php //echo $id; ?>"]</b></span>-->
              </div>
  </div>
		<!-- START of Change DEFAULT Tab name-->
				
		
  <div class="row cats-row more_setting">
      <!-- add select language-->
      <!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 lbl">
                <label for="select_lang"><?php echo $Select_Language; ?></label>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no-pa">
                <select class="form-control" id="select_lang" name="select_lang"> 
                <?php if(isset($_REQUEST['lang'])){ ?>
                  <option  value="EN" <?php if($_REQUEST['lang']=='EN' ){ echo "selected"; } ?> >EN</option>
				  <option  value="SP" <?php if($_REQUEST['lang']=='SP'){ echo "selected"; } ?> >SP</option>
				  <option  value="FR" <?php if($_REQUEST['lang']=='FR'){ echo "selected"; } ?> >FR</option>
				  <option  value="DE" <?php if($_REQUEST['lang']=='DE'){ echo "selected"; } ?> >DE</option>
               <?php }
                else{
                ?>
                    <option  value="EN" <?php if($cats_data1['select_lang']=='EN'){ echo "selected"; } ?> >EN</option>
                    <option  value="SP" <?php if($cats_data1['select_lang']=='SP'){ echo "selected"; } ?> >SP</option>
                    <option  value="FR" <?php if($cats_data1['select_lang']=='FR'){ echo "selected"; }?> >FR</option>
                    <option  value="DE" <?php if($cats_data1['select_lang']=='DE'){ echo "selected"; } ?> >DE</option>
                <?php 
                }
                ?>
                
                </select>
            </div>
        </div>
      <!--End Select language-->
      <!-- START Select Column Count -->
	  <div class="row cats-row more_setting">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 lbl">
                <label for="select_lang"><?php echo $Select_Column; ?></label>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no-pa">
                <select class="form-control" id="select_column" name="select_column">
                    <option><?php echo $Select_Column; ?></option>
                    <option  value="One" <?php if(isset($cats_data1['select_column']) && $cats_data1['select_column'] =='One'){ echo "selected"; } ?> >One</option>
                    <option  value="Two" <?php if(isset($cats_data1['select_column']) && $cats_data1['select_column']=='Two'){ echo "selected"; } ?> >Two</option>
                </select>
            </div>
        </div>
	  <!-- End Select Column Count -->
	  <!-- START Max Width Box -->
	  <div class="row cats-row more_setting">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 lbl">
                <label for="select_lang"><?php echo $Max_Width; ?></label>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no-pa">
                <input type="text" name="spl_container_max_width" placeholder="Example : 1200px" value="<?php echo isset($cats_data['spl_container_max_width']) ? $cats_data['spl_container_max_width'] : '' ; ?>" id="spl_container_max_width" class="form-control spl_container_max_width" />
            </div>
        </div>
	  <!-- END Max Width Box -->
      <div class="row more_setting">
      
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 lbl">
                <label for="default_tab"><?php echo $Default_Tab; ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-4 col-lg-4">
                <select class="form-control" id="sel1" name="default_tab">
                <?php 
                    if(isset($all_tab) && $all_tab !=''){
						$all=$all_tab;
						}else{
							$all="All";
						}
				?>
                  <option class="form-control default_tab" value=""><?php echo $all?></option>
                   <?php 
			if(isset($cats_data1) && is_array($cats_data1)) {
           foreach($cats_data1['category'] as $key => $cats_datas['category']){
            
             if(strtolower($key)== strtolower($cats_data['default_tab']))
             {$sel="Selected"; } else{$sel="";} ?>
                  <option class="form-control default_tab <?php if($cats_datas['category']['name']==""){echo " hidden";}?>" value="<?php echo $key;?>" <?php echo $sel;?>><?php echo $cate_name=$cats_datas['category']['name'];?></option>
  <?php } } 
           ?>
                </select>
            </div>
        </div>
		<!-- END of Change DEFAULT Tab name-->
		<!--Change All Tab name-->
    <div class="row cats-row more_setting">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 lbl">
                <label for="all_tab"><?php echo $Change_All_word_for_Categories; ?> <span class="all_tab_span">(<?php echo $different_languages; ?>)</span></label>
            </div>
			<?php
			$all_tab= isset($cats_data['all_tab']) ? $cats_data['all_tab'] : '';
			if($all_tab!='' && isset($all_tab)){$all_tab=$all_tab;}else{$all_tab="All";}
			?>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <input type="text" name="all_tab" id="all_tab" class="form-control all_tab" value="<?php echo $all_tab; ?>" title="">
            </div>
    </div>
	<!--End Change All Tab name-->
		 
			<!--Hide All Tab-->
			
	   <!--START remove title-->
        <div class="row cats-row more_setting">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 lbl">
        <label for="remove_title_tab"><?php echo $Remove_title; ?> ? </label>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
        <?php
        
        $spl_remove_title= isset($cats_data['spl_remove_title']) ? $cats_data['spl_remove_title'] : '';
        $checked="checked";
        $unchecked="";
        ?>
        <div class="custom_radio_btn"><input type="radio" name="spl_remove_title" id="spl_remove_title" class="spl_remove_title" required="" value="0" <?php if($spl_remove_title==0 ){ echo $checked;} else{echo $unchecked; }?> >Off<label class="radio-inline"><span></span></label></div>
        <div class="custom_radio_btn"><input type="radio" name="spl_remove_title" id="spl_remove_title" class="spl_remove_title" required="" value="1" <?php if($spl_remove_title==1 ){ echo $checked;} else{echo $unchecked; }?> >On<label class="radio-inline"><span></span></label></div>
        </div>
        </div>
        <!--END remove title-->	
        
	<div class="row cats-row more_setting">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 lbl">
                <label for="default_tab"><?php echo $Display_the_All_word; ?> <span class="all_tab_span" style="color:red">*</span></label>
            </div>
      <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
      <?php
        $toggle_all_tab= isset($cats_data['toggle_all_tab']) ? $cats_data['toggle_all_tab'] : '';
        $checked="checked";
        $unchecked="";
        ?>
<div class="custom_radio_btn"><input type="radio" name="toggle_all_tab" id="toggle_all_tab" class="toggle_all_tab" required="" value="0" <?php if($toggle_all_tab==0 ){ echo $checked;} else{echo $unchecked; }?>>Off<label class="radio-inline"><span></span></label></div>
<div class="custom_radio_btn"><input type="radio" name="toggle_all_tab" id="toggle_all_tab" class="toggle_all_tab" required="" value="1" <?php if($toggle_all_tab==1 || $toggle_all_tab==''){ echo $checked;} else{echo $unchecked; }?>>On<label class="radio-inline"><span></span></label></div>
         </div>
         </div>
	<!--End Hide All Tab-->
		
    <!--Toggle setting-->
    <div class="row cats-row more_setting">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 lbl">
                <label for="default_tab"><?php echo $Category_Separator_Symbol; ?><span class="category_separator_symbol" style="color:red">*</span></label>
            </div>
      <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
      <?php
        $toggle= isset($cats_data['toggle']) ? $cats_data['toggle'] : '';
        $checked="checked";
        $unchecked="";
        ?>
         <div class="custom_radio_btn"><input type="radio" name="toggle" id="toggle" class="toggle" required="" value="0" <?php if($toggle== '0' || $toggle==''){ echo $checked;}?> >Off<label class="radio-inline"><span></span></label></div>
          
          <div class="custom_radio_btn"><input type="radio" name="toggle" id="toggle" class="toggle" required="" value="1" <?php if($toggle == '1' ){ echo $checked; }?> >On<label class="radio-inline"><span></span></label></div>
         </div>
    </div>  
    <!--end toggle setting-->

	
	<!--Style Category Tab Button-->
	<div class="row cats-row more_setting">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 lbl">
                <label for="category_tab_button"><?php echo $Stylish_Category_Tabs_Buttons; ?><span class="category_tab_button" style="color:red">*</span></label>
            </div>
      <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
      <?php
        $style_cat_tab_btn= isset($cats_data['style_cat_tab_btn']) ? $cats_data['style_cat_tab_btn'] : '';
        $checked="checked";
        $unchecked="";
        ?>
		<div class="custom_radio_btn"><input type="radio" name="style_cat_tab_btn" id="style_cat_tab_btn" class="style_cat_tab_btn" required="" value="0" <?php if($style_cat_tab_btn==0 || $toggle_all_tab==''){ echo $checked;} else{echo $unchecked; }?>>Off<label class="radio-inline"><span></span></label></div>
        <div class="custom_radio_btn"><input type="radio" name="style_cat_tab_btn" id="style_cat_tab_btn" class="style_cat_tab_btn" required="" value="1" <?php if($style_cat_tab_btn==1 ){ echo $checked;} else{echo $unchecked; }?>>On<label class="radio-inline"><span></span></label></div>
        
            </div>
    </div> 
	<!--End Style Category Tab Button-->
	<!--Brack title of Service-->
	<div class="row cats-row more_setting">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 lbl">
                <label for="category_tab_button"><?php echo $Break_title_of_Service; ?></label>
            </div>
      <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
            <?php
            $brack_title_desktop = isset($cats_data['brack_title_desktop']) ? $cats_data['brack_title_desktop'] : '';
            $brack_title_tablets = isset($cats_data['brack_title_tablets']) ? $cats_data['brack_title_tablets'] : '';
            
               if($brack_title_desktop!='' && $brack_title_desktop==1){
                   $desktop_check='checked="checked"';
               }else{
                   $desktop_check="";
               }
               if($brack_title_tablets != "" && $brack_title_tablets==1){
                   $tab_check='checked="checked"';
               }else{
                   $tab_check="";
               }
            ?>
          <div class="checkbox">
              <label><input name="brack_title_desktop" type="checkbox" value="1" <?php echo $desktop_check; ?> ><?php echo $Break_line_of_categories_on_Desktop; ?> </label>
            </div>
            <div class="checkbox">
              <label><input name="brack_title_tablets" type="checkbox" value="1" <?php echo $tab_check; ?> ><?php echo $Break_line_of_categories_on_Tablets; ?> </label>
          </div>
        </div>
    </div> 
	<!--End Brack title of Service-->
	
	
	<!--Add Textarea for price list description-->
	<div class="row cats-row more_setting">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 lbl">
                <label for="all_tab"><?php echo stripslashes($Price_List_Description); ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <textarea name="price_list_desc" id="price_list_desc" class="form-control price_list_desc" rows="2" cols="50"><?php if(isset($price_list_desc)){ echo str_replace('\"','"',str_replace("\'","'",stripslashes($price_list_desc))); } ?></textarea>
            </div>
    </div>
   <div style="max-width:900px;margin-left:0px;">
        <?php 
            global $spl_googlefonts_var;
            $google_fonts=$spl_googlefonts_var->$get_fonts_options();
            // $google_fonts=array(
            //         ''=>'Select a Google Font',
            //     );

            // $gf_fonts=$spl_googlefonts_var->get_fonts();
            // foreach($gf_fonts as $font){
            //     $class = array();           
            //     $has_variants = false;
            //     $has_subsets = false;
            //     $normalized_name = $spl_googlefonts_var->gf_normalize_font_name($font->family);
                
            //     $class[] = $normalized_name;
                
            //     if(count($font->variants)>1){
            //         $class[] = "has-variant";
            //     }
            //     if(count($font->subsets)>1){
            //         $class[] = "has-subsets";
            //     }
            //     $google_fonts[$normalized_name]=$font->family;
            // }
        ?>
        <?php //echo $google_fonts_preview_out(); ?>
        <?php //if(false): ?>
        
        <!--<div class="row cats-row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="google">
                <b>How Google font looks like? check </b> <a href="https://fonts.google.com/">google fonts preview</a>
                </div>
            </div>
        </div>-->
        <?php //endif;//end false ?>
        <?php //echo $html_out('list_name_font',$google_fonts,$list_name_font,'Title (Font Style)'); ?>
        <?php //echo $html_out('title_font',$google_fonts,$title_font,'Service Categories (Font Style)'); ?>
        <?php //echo $html_out('price_font',$google_fonts,$price_font,'Price (Font Style)'); ?>
        <?php //echo $html_out('desc_font',$google_fonts,$desc_font,'Description (Font Style)'); ?>
    </div>     
   <div class="container font_setting_container" style="max-width:900px;margin-left:0px; display:none;">
     <div class="row">     
      <div class="col-md-5">
          <div class="title-list-style">
      <div class="col-md-12">
        <h4 class="title-font"><b><?php echo $Title; ?></b></h4>
      </div>
      
        <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
                <label for="title_font_size"><?php echo $Font_Size; ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-8  col-lg-8 padl-align">
                <select class="form-control" id="sel1" name="title_font_size" style="box-shadow: 2px 2px 0px #888;">
                  <option class="form-control title_size" value="">Size</option>
                <?php 
          
          for($i=1; $i<=100; $i++){ 
            if(array_key_exists('title_font_size', $cats_data)) {
                if($i.'px'== $cats_data['title_font_size']){
                    $select_ser = "selected";
                }
                else{
                    $select_ser = "";
                }
            }
            else{
                $select_ser = "";
            }
        ?>
           <option class="form-control title_font_size" value="<?php echo $i ?>px" <?php echo isset($select_ser) ? $select_ser : ''; ?>><?php echo $i ?>px</option>
          <?php 
          }
          ?>
                </select>
            </div>
        </div>
    
    <?php if($title_color_top == ''){ echo color_out('title_color_top','#000',$Font_Color); }?>
    <?php if($title_color_top != ''){ echo color_out('title_color_top',$title_color_top,$Font_Color); }?>
    <?php echo $html_out('list_name_font',$google_fonts,$list_name_font,$Font_Style); ?>
    <!--start spl font weight setting for title-->
        <div class="row cats-row font-weight-row">
        <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4">
        <label for="title_font_weight">Font Weight</label>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8 padl-align">
        <select class="form-control" id="title_font-weight" name="title_font-weight" style="box-shadow: 2px 2px 0px #888;">
        <option class="form-control title_weight" value="">Font Weight</option>    
        <?php
                foreach($optionArr as $key => $value){
                   $isSelected =""; //added this line
                   if(isset($cats_data['title_font-weight']) && $cats_data['title_font-weight'] == $value){
                     $isSelected = "selected";
                   }
                   echo '<option class="form-control title_font-weight" value="'.$value.'"'.$isSelected.'>'.str_replace("_"," ",$key).'</option>';
                }
        ?>    
        </select>
        </div>
        </div>
    <!--end spl font weight setting for title-->    
       </div> 
       </div>
        <div class="col-md-5"> 
        <div class="title-list-style">
            <div class="col-md-12">
                <h4 class="title-font"><b><?php echo $Category_Tabs; ?></b></h4>
            </div>
            <div class="row cats-row">
                    <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
                        <label for="tab_font_size"><?php echo $Font_Size; ?></label>
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-8  col-lg-8 padl-align">
                        <select class="form-control" id="sel1" name="tab_font_size" style="box-shadow: 1px 1px 0px #888;">
                        <option class="form-control tab_size" value="">Size</option>
        <?php 

            for($j=1; $j<=100; $j++){ 
            if(array_key_exists('tab_font_size', $cats_data)) {
                if($j.'px'== $cats_data['tab_font_size']){
                    $select_ser = "selected";
                }
                else{
                    $select_ser = "";
                }
            }
            else{
                $select_ser = "";
            }

        ?>
                        <option class="form-control tab_font_size" value="<?php echo isset($j) ? $j : '' ;?>px" <?php echo isset($select_ser) ? $select_ser : ''; ?>><?php echo isset($j) ? $j : '';?>px</option>
        <?php }
        ?>
                        </select>
                    </div>
                </div>
    <?php if($title_color == ''){ echo color_out('title_color','#000',$Font_Color); }?>
        <?php if($title_color != ''){ echo color_out('title_color',$title_color,$Font_Color); }?>
    <?php echo $html_out('title_font',$google_fonts,$title_font,$Font_Style); ?>
        <?php if(false): ?>
          
      <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
                <label for="title_color_top">Title (Font Color)</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="title_color_top" id="title_color_top" class="form-control title_color_top color-picker" value="<?php echo $title_color_top; ?>" title="">
            </div>
        </div> 
        <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
                <label for="title_color">Service Categories (Font Color)</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="title_color" id="title_color" class="form-control title_color color-picker" value="<?php echo $title_color; ?>" title="">
            </div>
        </div> <!-- Title Color -->
        

        <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
                <label for="price_color"><?php echo $Font_Color; ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8">
                <input type="text" name="price_color" id="price_color" class="form-control price_color color-picker" value="<?php echo $price_color; ?>" title="">
            </div>
        </div> <!-- Price Color -->

        <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
                <label for="hover_color"><?php echo $Hover_Color; ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="hover_color" id="hover_color" class="form-control hover_color color-picker" value="<?php echo $hover_color; ?>" title="">
            </div>
        </div>
    
         <!-- Hover Color -->
         <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
                <label for="service_color">Service Description (Font Color)</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="service_color" id="service_color" class="form-control service_color color-picker" value="<?php echo $service_color; ?>" title="">
            </div>
        </div>
         
        <?php endif;//end false ?>
        <script type="text/javascript">
              jQuery(function($){
                   jQuery('.color-picker').wpColorPicker();
              });
        </script>
        <!--start spl font weight setting for category tabs-->
        <div class="row cats-row font-weight-row">
        <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4">
        <label for="tab_font_weight">Font Weight</label>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8 padl-align">
        <select class="form-control" id="font-weight" name="tab_font-weight" style="box-shadow: 2px 2px 0px #888;">
        <option class="form-control tab_weight" value="">Font Weight</option>
        <?php
                foreach($optionArr as $key => $value){
                   $isSelected =""; //added this line
                   if(isset($cats_data['tab_font-weight']) && $cats_data['tab_font-weight'] == $value){
                     $isSelected = "selected";
                   }
                   echo '<option class="form-control tab_font-weight" value="'.$value.'"'.$isSelected.'>'.str_replace("_"," ",$key).'</option>';
                }
        ?>
        </select>
        </div>
        </div>
        <!--end spl font weight setting for category tabs-->        
         </div>
         </div>
          </div>
       <div class="row">     
      <div class="col-md-5"> 
      <div class="title-list-style">
      <div class="col-md-12">
        <h4 class="title-font"><b><?php echo $Service_Name; ?></B></h4>
      </div>
        <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
                <label for="tab_font_size"><?php echo $Font_Size; ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-8  col-lg-8 padl-align">
                <select class="form-control" id="sel1" name="service_font_size" style="box-shadow: 2px 2px 0px #888;">
                  <option class="form-control service_size" value="">Size</option>
                <?php 
        
        for($k=1; $k<=100; $k++){ 
            if(array_key_exists('service_font_size', $cats_data)) {
                if($k.'px'== $cats_data['service_font_size']){
                    $select_ser = "selected";
                }
                else{
                    $select_ser = "";
                }
            }
            else{
                $select_ser = "";
            }
        
        ?>
           <option class="form-control service_font_size" value="<?php echo $k ;?>px" <?php echo $select_ser; ?>><?php echo $k ;?>px</option>
          <?php }
          ?>
                </select>
            </div>
        </div>
    <?php if($service_color == ''){ echo color_out('service_color','#000',$Font_Color); }?>
        <?php if($service_color != ''){echo color_out('service_color',$service_color,$Font_Color); }?>
    <?php echo $html_out('desc_font',$google_fonts,$desc_font,$Font_Style); ?>
    <?php if($hover_color == ''){ echo color_out('hover_color','#000',$Hover_Color); } ?>
        <?php if($hover_color != ''){ echo color_out('hover_color',$hover_color,$Hover_Color); }?>
        <!--start spl font weight setting for services-->
        <div class="row cats-row font-weight-row">
        <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4">
        <label for="service_font_weight">Font Weight</label>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8 padl-align">
        <select class="form-control" id="font-weight" name="service_font-weight" style="box-shadow: 2px 2px 0px #888;">
        <option class="form-control service_weight" value="">Font Weight</option>
        <?php
                foreach($optionArr as $key => $value){
                   $isSelected =""; //added this line
                   if(isset($cats_data['service_font-weight']) && $cats_data['service_font-weight'] == $value){
                     $isSelected = "selected";
                   }
                   echo '<option class="form-control service_font-weight" value="'.$value.'"'.$isSelected.'>'.str_replace("_"," ",$key).'</option>';
                }
        ?>
        </select>
        </div>
        </div>
        <!--end spl font weight setting for services-->        
       </div> 
       </div>
        <div class="col-md-5"> 
        <div class="title-list-style">
      <div class="col-md-12">
        <h4 class="title-font"><b><?php echo $Service_Price; ?></b></h4>
      </div>  
    <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
                <label for="tab_font_size"><?php echo $Font_Size; ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-8  col-lg-8 padl-align">
                <select class="form-control" id="sel1" name="service_price_font_size" style="box-shadow: 2px 2px 0px #888;">
                  <option class="form-control service_price_font_size" value="">Size</option>
                <?php 

        for($n=1; $n<=100; $n++){ 
            $change_lang_value = '';
            if(array_key_exists('service_price_font_size', $cats_data)) {
                if($n.'px'== $cats_data['service_price_font_size']){
                    $select_ser = "selected";
                    }
                    else{
                      $select_ser = "";
                      }
            }else{
                $select_ser = "";
                }
        ?>
           <option class="form-control service_price_font_size" value="<?php echo $n ;?>px" <?php echo $select_ser; ?>><?php echo $n ;?>px</option>
          <?php }
          ?>
                </select> 
            </div>
        </div>
    <?php if($price_color == ''){ echo color_out('price_color','#000',$Font_Color); }?>
        <?php if($price_color != ''){ echo color_out('price_color',$price_color,$Font_Color); }?>
    <?php echo $html_out('price_font',$google_fonts,$price_font,$Font_Style); ?>
        <?php if(false): ?>
          
        <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl">
                <label for="title_color">Service Categories (Font Color)</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="title_color" id="title_color" class="form-control title_color color-picker" value="<?php echo $title_color; ?>" title="">
            </div>
        </div> <!-- Title Color -->

        <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
                <label for="price_color"><?php echo $Font_Color; ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8">
                <input type="text" name="price_color" id="price_color" class="form-control price_color color-picker" value="<?php echo $price_color; ?>" title="">
            </div>
        </div> <!-- Price Color -->

        <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
                <label for="hover_color"><?php echo $Hover_Color; ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="hover_color" id="hover_color" class="form-control hover_color color-picker" value="<?php echo $hover_color; ?>" title="">
            </div>
        </div>
         <!-- Hover Color -->
         <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
                <label for="service_color">Service Description (Font Color)</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="service_color" id="service_color" class="form-control service_color color-picker" value="<?php echo $service_color; ?>" title="">
            </div>
        </div>
         
        <?php endif;//end false ?>
        <script type="text/javascript">
              jQuery(function($){
                   jQuery('.color-picker').wpColorPicker();
              });
        </script>
        <!--start spl font weight setting for service price-->
        <div class="row cats-row font-weight-row">
        <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4">
        <label for="service_price_font_weight">Font Weight</label>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8 padl-align">
        <select class="form-control" id="font-weight" name="service_price_font-weight" style="box-shadow: 2px 2px 0px #888;">
        <option class="form-control service_price_weight" value="">Font Weight</option>
        <?php
                foreach($optionArr as $key => $value){
                   $isSelected =""; //added this line
                   if(isset($cats_data['service_price_font-weight']) && ($cats_data['service_price_font-weight'] == $value)){
                     $isSelected = "selected";
                   }
                   echo '<option class="form-control service_price_font-weight" value="'.$value.'"'.$isSelected.'>'.str_replace("_"," ",$key).'</option>';
                }
        ?>
        </select>
        </div>
        </div>
        <!--end spl font weight setting for service price-->        
         </div>
         </div>
         
          </div>
		  <div class="row">
		  <div class="col-md-5"> 
        <div class="title-list-style">
      <div class="col-md-12">
        <h4 class="title-font"><b><?php echo $Service_Description; ?></b></h4>
      </div>  
    <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
                <label for="tab_font_size"><?php echo $Font_Size; ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-8  col-lg-8 padl-align">
                <select class="form-control" id="sel1" name="service_description_font_size" style="box-shadow: 2px 2px 0px #888;">
                  <option class="form-control service_description_font_size" value="">Size</option>
                <?php 
        
        for($n=1; $n<=100; $n++){ 
    
            if(array_key_exists('service_description_font_size', $cats_data)) {
                if($n.'px'== $cats_data['service_description_font_size']){
                    $select_ser = "selected";
                }
                else{
                    $select_ser = "";
                }
            }
            else{
                $select_ser = "";
            }
           
        ?>
           <option class="form-control service_description_font_size" value="<?php echo $n ;?>px" <?php echo $select_ser; ?>><?php echo $n ;?>px</option>
          <?php }
          ?>
                </select>
            </div>
        </div>
    <?php if($service_description_color == ''){ echo color_out('service_description_color','#000',$Font_Color); }?>
        <?php if($service_description_color != ''){ echo color_out('service_description_color',$service_description_color,$Font_Color); }?>
    <?php echo $html_out('service_description_font',$google_fonts,$service_description_font,$Font_Style); ?>
        <?php if(false): ?>
          
        <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl">
                <label for="title_color">Service Categories (Font Color)</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="title_color" id="title_color" class="form-control title_color color-picker" value="<?php echo $title_color; ?>" title="">
            </div>
        </div> <!-- Title Color -->

        <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
                <label for="price_color"><?php echo $Font_Color; ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8">
                <input type="text" name="price_color" id="price_color" class="form-control price_color color-picker" value="<?php echo $price_color; ?>" title="">
            </div>
        </div> <!-- Price Color -->

        <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
                <label for="hover_color"><?php echo $Hover_Color; ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="hover_color" id="hover_color" class="form-control hover_color color-picker" value="<?php echo $hover_color; ?>" title="">
            </div>
        </div>
         <!-- Hover Color -->
         <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
                <label for="service_color">Service Description (Font Color)</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="service_color" id="service_color" class="form-control service_color color-picker" value="<?php echo $service_color; ?>" title="">
            </div>
        </div>
         
        <?php endif;//end false ?>
        <script type="text/javascript">
              jQuery(function($){
                   jQuery('.color-picker').wpColorPicker();
              });
        </script>
        <!--start spl font weight setting for description-->
        <div class="row cats-row font-weight-row">
        <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4">
        <label for="description_font_weight">Font Weight</label>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8 padl-align">
        <select class="form-control" id="description_font-weight" name="description_font-weight" style="box-shadow: 2px 2px 0px #888;">
        <option class="form-control description_weight" value="">Font Weight</option>
        <?php
                foreach($optionArr as $key => $value){
                   $isSelected =""; //added this line
                   if(isset($cats_data['description_font-weight']) && ($cats_data['description_font-weight'] == $value)){
                     $isSelected = "selected";
                   }
                   echo '<option class="form-control description_font-weight" value="'.$value.'"'.$isSelected.'>'.str_replace("_"," ",$key).'</option>';
                }
        ?>
        </select>
        </div>
        </div>
        <!--end spl font weight setting for description-->        
         </div>
         </div>
 <!--START  spl CATEGORY DESCRIPTIONS !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->        
 <div class="col-md-5"> 
        <div class="title-list-style">
            <div class="col-md-12">
                <h4 class="title-font"><b><?php echo $Category_description_Tabs; ?></b></h4>
            </div>
            <div class="row cats-row">
                    <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
                        <label for="tab_description_font_size"><?php echo $Font_Size; ?></label>
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-8  col-lg-8 padl-align">
                        <select class="form-control" id="sel1" name="tab_description_font_size" style="box-shadow: 1px 1px 0px #888;">
                        <option class="form-control tab_description_size" value="">Size</option>
        <?php 

            for($j=1; $j<=100; $j++){ 
            if(array_key_exists('tab_description_font_size', $cats_data)) {
                if($j.'px'== $cats_data['tab_description_font_size']){
                    $select_ser = "selected";
                }
                else{
                    $select_ser = "";
                }
            }
            else{
                $select_ser = "";
            }

        ?>
                        <option class="form-control tab_description_font_size" value="<?php echo isset($j) ? $j : '' ;?>px" <?php echo isset($select_ser) ? $select_ser : ''; ?>><?php echo isset($j) ? $j : '';?>px</option>
        <?php }
        ?>
                        </select>
                    </div>
                </div>
    <?php if($tab_description_color == ''){ echo color_out('tab_description_color','#000',$Font_Color); }?>
        <?php if($tab_description_color != ''){ echo color_out('tab_description_color',$tab_description_color,$Font_Color); }?>
    <?php echo $html_out('tab_description_font',$google_fonts,$tab_description_font,$Font_Style); ?>
        <?php if(false): ?>
          
      <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
                <label for="title_color_top">Title (Font Color)</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="title_color_top" id="title_color_top" class="form-control title_color_top color-picker" value="<?php echo $title_color_top; ?>" title="">
            </div>
        </div> 
        <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
                <label for="title_color">Service Categories (Font Color)</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="title_color" id="title_color" class="form-control title_color color-picker" value="<?php echo $title_color; ?>" title="">
            </div>
        </div> <!-- Title Color -->
        

        <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
                <label for="price_color"><?php echo $Font_Color; ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8">
                <input type="text" name="price_color" id="price_color" class="form-control price_color color-picker" value="<?php echo $price_color; ?>" title="">
            </div>
        </div> <!-- Price Color -->

        <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
                <label for="hover_color"><?php echo $Hover_Color; ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="hover_color" id="hover_color" class="form-control hover_color color-picker" value="<?php echo $hover_color; ?>" title="">
            </div>
        </div>
    
         <!-- Hover Color -->
         <div class="row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
                <label for="service_color">Service Description (Font Color)</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="service_color" id="service_color" class="form-control service_color color-picker" value="<?php echo $service_color; ?>" title="">
            </div>
        </div>
         
        <?php endif;//end false ?>
        <script type="text/javascript">
              jQuery(function($){
                   jQuery('.color-picker').wpColorPicker();
              });
        </script>
        <!--start spl font weight setting for category tabs-->
        <div class="row cats-row font-weight-row">
        <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4">
        <label for="tab_font_weight">Font Weight</label>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8 padl-align">
        <select class="form-control" id="font-weight" name="tab_description_font-weight" style="box-shadow: 2px 2px 0px #888;">
        <option class="form-control tab_weight" value="">Font Weight</option>
        <?php
                foreach($optionArr as $key => $value){
                   $isSelected =""; //added this line
                   if(isset($cats_data['tab_description_font-weight']) && ($cats_data['tab_description_font-weight'] == $value)){
                     $isSelected = "selected";
                   }
                   echo '<option class="form-control tab_description_font-weight" value="'.$value.'"'.$isSelected.'>'.str_replace("_"," ",$key).'</option>';
                }
        ?>
        </select>
        </div>
        </div>
        <!--end spl font weight setting for category tabs-->        
         </div>
         </div>





		  </div>
      </div>
      <div style="max-width:900px;margin-left:0px;">
        <?php 
            global $spl_googlefonts_var;
            $google_fonts=$spl_googlefonts_var->$get_fonts_options();
            // $google_fonts=array(
            //         ''=>'Select a Google Font',
            //     );

            // $gf_fonts=$spl_googlefonts_var->get_fonts();
            // foreach($gf_fonts as $font){
            //     $class = array();           
            //     $has_variants = false;
            //     $has_subsets = false;
            //     $normalized_name = $spl_googlefonts_var->gf_normalize_font_name($font->family);
                
            //     $class[] = $normalized_name;
                
            //     if(count($font->variants)>1){
            //         $class[] = "has-variant";
            //     }
            //     if(count($font->subsets)>1){
            //         $class[] = "has-subsets";
            //     }
            //     $google_fonts[$normalized_name]=$font->family;
            // }
        ?>
        <?php //echo $google_fonts_preview_out(); ?>
        <?php //if(false): ?>
        
        <!--<div class="row cats-row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="google">
                <b>How Google font looks like? check </b> <a href="https://fonts.google.com/">google fonts preview</a>
                </div>
            </div>
        </div>-->
        <?php //endif;//end false ?>
        <?php //echo $html_out('list_name_font',$google_fonts,$list_name_font,'Title (Font Style)'); ?>
        <?php //echo $html_out('title_font',$google_fonts,$title_font,'Service Categories (Font Style)'); ?>
        <?php //echo $html_out('price_font',$google_fonts,$price_font,'Price (Font Style)'); ?>
        <?php //echo $html_out('desc_font',$google_fonts,$desc_font,'Description (Font Style)'); ?>
          </div>
        <?php if(false): ?>
          
        <div class="row cats-row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 lbl">
                <label for="list_name_font">Title (Font Style)</label>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <?php echo $html_out('list_name_font',$google_fonts,$list_name_font); ?>
            </div>
        </div> <!-- List Name Font -->

        <div class="row cats-row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 lbl">
                <label for="title_font">Service Categories (Font Style)</label>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <?php echo $html_out('title_font',$google_fonts,$title_font); ?>
            </div>
        </div> <!-- Title Font -->
        <div class="row cats-row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 lbl">
                <label for="price_font">Price (Font Style)</label>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <?php echo $html_out('price_font',$google_fonts,$price_font); ?>
            </div>
        </div> <!-- Price Font -->
        <div class="row cats-row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 lbl">
                <label for="desc_font">Description (Font Style)</label>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <?php echo $html_out('desc_font',$google_fonts,$desc_font); ?>
            </div>
         <!-- Description Font -->
        
   
 
 
  
        <?php endif;//end false ?>
        <div id="category-row-template" style="display:none;float: left;width: 100%;max-width: 900px;">
            <?php 
            echo category_row(0,$init_cat,$max_service_count); 
            ?>
        </div> <!-- category-row-template -->
        <div class="category-rows-master-cls">
        <div id="category-rows-wrapper" style="float: left;width: 100%;max-width: 900px;">
            <?php 
                $cats=$cats_data['category'];
                foreach ($cats as $cat_id => $cat) {
                    // $cat_name=$cat['name'];
                    echo category_row($cat_id,$cat,$max_service_count);
                    // unset($cat['name']);//remove the name items, so, we can use foreach to process 
                    // foreach ($cat as $service_id => $service) {
                    //     echo category_row($cat_id,$service_id,$cat_name);
                    // }
                }
            ?>
        </div> <!-- category-rows-wrapper -->
        </div>
        <div class="row" style="clear:both;padding:0px 15px;">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 add-category-row-lbl">
                <div class="add-new-cat"> 
                    <a href="javascript:void(0);" id="add-category-row" class="add-category-row" onclick="add_category(this,<?php echo $max_cat_count; ?>)"><?php echo $GLOBALS['Add_Category']; ?></a>
			    </div>
		    </div>
        </div>
        <input type="hidden" name="field_id" class="form-control" value="<?php esc_html_e( $id, 'text_domain' ); ?>">
        <?php wp_nonce_field( 'spl_nonce' ); ?>
        <input type="hidden" name="spl_nonce" value="<?php echo wp_create_nonce( 'spl_nonce' ) ?>">
        <div class="row">
            <div class="col-md-12">
                <div class="bottom-save spl_btn_primary">
                    <?php submit_button( __( $Save, 'spl' ), 'primary', 'submit_tabs' ); ?>
                </div>
            </div>
        </div>
    
    </div>
    </form>
    
    <!----Preview, Restore & Backup Section---->
    <div class="row">
        <div class="res-prev-bkp">
    <?php if($id!=''){ ?>
        <div class="col-sm-3">
         <button type="button" name="preview_list" value="" class="spl_btn_primary button button-primary preview_list"><?php echo $Preview_List; ?></button>
        </div>
    <?php 
    }
    if($id!=''){ 
    	if(!empty($opt) && (isset($opt['result']) && $opt['result'] =='success')){
    	$AddClass='';
	?>    
        <div class="col-sm-3">
         <button type="button" name="backup" value="" class="spl_btn_primary button button-primary backup"><?php echo $Backup; ?></button>
        </div>
    <?php 
    	}
    }
    	if($id=='' || $id!=''){ 
    	if(!empty($opt) && (isset($opt['result']) && $opt['result'] =='success')){
	?>    
        <div class="col-sm-3">
           <button type="button" name="restore" value="" class="spl_btn_primary button button-primary restore"><?php echo $Restore; ?></button>
        </div>
    
    <?php 
    	//endif;
    	}
    	}
	?>
	</div>
	</div>
	<?php 
    	if($id=='' || $id!=''){ 
    	if(!empty($opt) && (isset($opt['result']) && $opt['result'] =='success')){
	?> 
	<div class="row restore_content" style="display:none">
	    <div class="col-md-12">
	        <div class="back-up">
    	<form class="custom-backup-restore" method="post" action="<?php echo site_url()?>/wp-admin/admin.php?page=backup-restore.php" enctype="multipart/form-data">
    	<input type="hidden" name="list_id" value="<?php esc_html_e( $id, 'text_domain' ); ?>">
    	<input type="file" name="importtocsv" id="fileupload">
    	<button type="submit" name="restore" value="restore" class="button button-primary"><?php echo $Restore; ?></button>
    	</form>
    	</div>
    	</div>
	</div>
	<?php 
    	//endif;
    	}
    	}
	
	if($id!=''){ 
    	if(!empty($opt) && (isset($opt['result']) && $opt['result'] =='success')){
    	$AddClass='';
	?>  
	<?php 
    	}
	}
	?>
    <!--End Preview, Restore & Backup Section-->
    
	<?php
	if($id!=''){ 
    	if(!empty($opt) && (isset($opt['result']) && $opt['result'] =='success')){
    	$AddClass='';
	?>
	<div class="row backup_content" style="display:none;">
	    <div class="col-md-12">
	        <div class="back-up">
    	<form class="panel_accordian" method="post" action="<?php echo site_url()?>/wp-admin/admin.php?page=backup-restore.php">
    	<input type="hidden" name="list_id" value="<?php echo htmlentities($id); ?>">
    	<button type="submit" name="backup" value="<?php echo urlencode(htmlspecialchars($list_name)); ?>" class="button button-primary"><?php echo $Backup; ?></button>
    	</form>
    	</div>
    	</div>
	</div>
	<?php 
    	    
    	}
	}
	if($id!=''){ 
	?>
	<div class="row" id="preview_content" style="display:none"><?php echo do_shortcode('[pricelist id="'.$_REQUEST["id"].'"]');?></div>
	<?php } ?>
	</div>
	
<input type="hidden" class="save_lang" value="<?php echo isset($cats_data1['select_lang']) ? $cats_data1['select_lang'] : 'EN' ; ?> ">
<?php
    $change_lang_value = '';
    if(array_key_exists('lang', $_REQUEST)) {
        $change_lang_value = esc_html_e( $_REQUEST['lang'], 'text_domain' );
    }
?>
<input type="hidden" class="change_lang" value="<?php echo $change_lang_value ?>">
<footer id="admin_footer">
<?php 
  include_once dirname(__FILE__) . '/logo-footer.php';
?>
</footer>

<script>

jQuery(document).ready(function(){ 
    if(jQuery('#sel1').val() === "style_5"){
        jQuery('#style5_category_container').css('display', 'block')
    }
	jQuery('#select_lang').change(function(){
	    var lang= jQuery(this).val();
	    var url= "<?php echo esc_url_raw($_SERVER['REQUEST_URI']).'&lang='?>"+lang;
	    window.location.href = url;
	});
	jQuery('.remove-category').click(function(){
		jQuery(this).closest('.category-row').remove();
	});
});
</script>
<script>
jQuery(document).ready(function(){
    var spl_styl = jQuery('select[name="tab_style"]') .val();
    if(spl_styl == 'style_6'){
       jQuery('.spl_style6_element').show();
    }else{
        jQuery('.spl_style6_element').hide();
    }
});    
</script>
<script>
    jQuery("#sel1").change(function () {
    if (jQuery(this).val() == "with_tab") {
        jQuery('#sell1').modal('show');
        jQuery('.spl_style6_element').hide();
        jQuery('#style5_category_container').css('display', 'none')
      }
    if (jQuery(this).val() == "without_tab") {
        jQuery('#sell2').modal('show');
        jQuery('.spl_style6_element').hide();
        jQuery('#style5_category_container').css('display', 'none')
      }
      if (jQuery(this).val() == "without_tab_single_column") {
        jQuery('#sell2').modal('show');
        jQuery('.spl_style6_element').hide();
        jQuery('#style5_category_container').css('display', 'none')
      }
    if (jQuery(this).val() == "style_3") {
        jQuery('#sell3').modal('show');
        jQuery('.spl_style6_element').hide();
        jQuery('#style5_category_container').css('display', 'none')
      }
    if (jQuery(this).val() == "style_4") {
        jQuery('#sell4').modal('show');
        jQuery('.spl_style6_element').hide();
        jQuery('#style5_category_container').css('display', 'none')
      }
     if (jQuery(this).val() == "style_5") {
        jQuery('#sell5').modal('show');
        jQuery('.spl_style6_element').hide();
        jQuery('#style5_category_container').css('display', 'block')
      }
      if (jQuery(this).val() == "style_6") {
        jQuery('.spl_style6_element').show();
        jQuery('#style5_category_container').css('display', 'none')
      }
 });
    
</script>

<!-- JS for Video Tutorials BTN --->
<script>
// Get the modal
var modalvideo = document.getElementById('myModalVideos');

// Get the button that opens the modal
var btnvideo = document.getElementById("myBtnVideos");

// Get the <span> element that closes the modal
var spanvideo = document.getElementsByClassName("closevideo")[0];

// When the user clicks the button, open the modal 
btnvideo.onclick = function() {
    modalvideo.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanvideo.onclick = function() {
    modalvideo.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalvideo) {
        modalvideo.style.display = "none";
    }
}
</script>
<script>
// Get the modal
var modalsupport = document.getElementById('myModalSupport');

// Get the button that opens the modal
var btnsupport = document.getElementById("myBtnSupport");

// Get the <span> element that closes the modal
var spansupport = document.getElementsByClassName("closesupport")[0];

// When the user clicks the button, open the modal 
btnsupport.onclick = function() {
    modalsupport.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spansupport.onclick = function() {
    modalsupport.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalsupport) {
        modalsupport.style.display = "none";
    }
}
</script>
<script>

 jQuery(document).ready(function() {
     
//   jQuery('.service-price-length-rows-wrapper').sortable();
    
// jQuery(".service-price-length-rows-wrapper").droppable({
//     accept: '.service-price-length-rows-wrapper',
//     greedy: false,
//     containment: jQuery('#sortable'),
//     helper: 'clone',
//     hoverClass: "highlight",
//     revert: "valid",
//     drop: function (e, ui) {
        
//         jQuery(this).addClass("dropped-elemet-service");
//         jQuery(ui.draggable).addClass('dragged-elemet-service');
        
//         var dragged_ser_name = jQuery('.dropped-elemet-service').find('.service_name').attr('id');
//         var dragged_ser_pric = jQuery('.dropped-elemet-service').find('.service_price').attr('id');
//         var dragged_ser_des = jQuery('.dropped-elemet-service').find('.service_desc').attr('id');
//         var dragged_ser_btnn = jQuery('.dropped-elemet-service').find('.service_button').attr('id');
//         var dragged_ser_btn_enable = jQuery('.dropped-elemet-service').find('.spl_service_button_enable').attr('id');
//         var dragged_ser_btn_urls = jQuery('.dropped-elemet-service').find('.service_button_url').attr('id');
//         var dragged_ser_num = dragged_ser_name.split("_");
//         var dragged_cat_number = dragged_ser_num[1]; 
//         var dragged_ser_number = dragged_ser_num[2];
        
//         var dropped_ser_name = jQuery('.dragged-elemet-service').find('.service_name').attr('id');
//         var dropped_ser_pric = jQuery('.dragged-elemet-service').find('.service_price').attr('id');
//         var dropped_ser_des = jQuery('.dragged-elemet-service').find('.service_desc').attr('id');
//         var dropped_ser_btnn = jQuery('.dragged-elemet-service').find('.service_button').attr('id');
//         var dropped_ser_btn_enable = jQuery('.dragged-elemet-service').find('.spl_service_button_enable').attr('id');
//         var dropped_ser_btn_urls = jQuery('.dragged-elemet-service').find('.service_button_url').attr('id');
//         var dropped_ser_num = dropped_ser_name.split("_");
//         var dropped_cat_number = dropped_ser_num[1]; 
//         var dropped_ser_number = dropped_ser_num[2];  
        
//         //assign dropped and dragged cat ids
        
//         // service name
//         jQuery('.dragged-elemet-service').find('.service_name').attr('id',dragged_ser_name);
//         jQuery('.dragged-elemet-service').find('.service_name').attr('name','category['+dragged_cat_number+']['+dragged_ser_number+'][service_name]');
//         jQuery('.dropped-elemet-service').find('.service_name').attr('id',dropped_ser_name);
//         jQuery('.dropped-elemet-service').find('.service_name').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_name]');        
        
//         // service description
//         jQuery('.dragged-elemet-service').find('.service_desc').attr('id',dragged_ser_des);
//         jQuery('.dragged-elemet-service').find('.service_desc').attr('name','category['+dragged_cat_number+']['+dragged_ser_number+'][service_desc]');
//         jQuery('.dropped-elemet-service').find('.service_desc').attr('id',dropped_ser_des);
//         jQuery('.dropped-elemet-service').find('.service_desc').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_desc]');
        
//         // service price
//         jQuery('.dragged-elemet-service').find('.service_price').attr('id',dragged_ser_pric);
//         jQuery('.dragged-elemet-service').find('.service_price').attr('name','category['+dragged_cat_number+']['+dragged_ser_number+'][service_price]');
//         jQuery('.dropped-elemet-service').find('.service_price').attr('id',dropped_ser_pric);
//         jQuery('.dropped-elemet-service').find('.service_price').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_price]');
        
//         // service button enable
//         jQuery('.dragged-elemet-service').find('.spl_service_button_enable').attr('id',dragged_ser_btn_enable);
//         jQuery('.dragged-elemet-service').find('.spl_service_button_enable').attr('name','category['+dragged_cat_number+']['+dragged_ser_number+'][service_button_enable]');
//         jQuery('.dropped-elemet-service').find('.spl_service_button_enable').attr('id',dropped_ser_btn_enable);
//         jQuery('.dropped-elemet-service').find('.spl_service_button_enable').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_button_enable]');
        
//         // service button
//         jQuery('.dragged-elemet-service').find('.service_button').attr('id','category_'+dragged_cat_number+'_'+dragged_ser_number+'_service_button');
//         jQuery('.dragged-elemet-service').find('.service_button').attr('name','category['+dragged_cat_number+']['+dragged_ser_number+'][service_button]');
//         jQuery('.dropped-elemet-service').find('.service_button').attr('id','category_'+dropped_cat_number+'_'+dropped_ser_number+'_service_button');
//         jQuery('.dropped-elemet-service').find('.service_button').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_button]');
        
//         // service button url
//         jQuery('.dragged-elemet-service').find('.service_button_url').attr('id',dragged_ser_btn_urls);
//         jQuery('.dragged-elemet-service').find('.service_button_url').attr('name','category['+dragged_cat_number+']['+dragged_ser_number+'][service_button_url]');
//         jQuery('.dropped-elemet-service').find('.service_button_url').attr('id',dropped_ser_btn_urls);
//         jQuery('.dropped-elemet-service').find('.service_button_url').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_button_url]');
        
//         // service image
//         jQuery('.dragged-elemet-service').find('.service_image').attr('id','category_'+dragged_cat_number+'_'+dragged_ser_number+'_service_image');
//         jQuery('.dragged-elemet-service').find('.service_image').attr('name','category['+dragged_cat_number+']['+dragged_ser_number+'][service_image]');
//         jQuery('.dropped-elemet-service').find('.service_image').attr('id','category_'+dropped_cat_number+'_'+dropped_ser_number+'_service_image');
//         jQuery('.dropped-elemet-service').find('.service_image').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_image]');
        
        
//             jQuery(this).removeClass("dropped-elemet-service");
//             jQuery(ui.draggable).removeClass('dragged-elemet-service');    
        
//         var $this = jQuery(this);
//         jQuery(".service-price-length-rows-wrapper").removeClass("highlight");
//         jQuery(ui.draggable).animate({
//         "left": jQuery(ui.draggable).data("left"),
//         "top": jQuery(ui.draggable).data("top"),
//         }, "fast");
//     }
     
// });

//   jQuery(".categor-sec-first").droppable({
//     accept: '.categor-sec-first',
//     greedy: true,
//     hoverClass: "highlight",
//     revert: "valid",
//     drop: function (e, ui) {
//         jQuery(this).addClass("dropped-elemet");
//         jQuery(ui.draggable).addClass('dragged-elemet');
        
//         var dragged_cat_name = jQuery('.dropped-elemet').find('.category_name').attr('id');
//         var dragged_cat_des = jQuery('.dropped-elemet').find('.category_description').attr('id');
//         var dragged_cat_num = dragged_cat_name.split("_");
//         var dragged_cat_number = dragged_cat_num[1];
        
//         var dropped_cat_name = jQuery('.dragged-elemet').find('.category_name').attr('id');
//         var dropped_cat_des = jQuery('.dragged-elemet').find('.category_description').attr('id');
//         var dropped_cat_num = dropped_cat_name.split("_");
//         var dropped_cat_number = dropped_cat_num[1];
        
//         //assign dropped and dragged cat ids
        
//         //category name
//         jQuery('.dragged-elemet').find('.category_name').attr('id',dragged_cat_name);
//         jQuery('.dragged-elemet').find('.category_name').attr('name','category['+dragged_cat_number+'][name]');
//         jQuery('.dropped-elemet').find('.category_name').attr('id',dropped_cat_name);
//         jQuery('.dropped-elemet').find('.category_name').attr('name','category['+dropped_cat_number+'][name]');
        
//         //category description
//         jQuery('.dragged-elemet').find('.category_description').attr('id',dragged_cat_des);
//         jQuery('.dragged-elemet').find('.category_description').attr('name','category['+dragged_cat_number+'][description]');
//         jQuery('.dropped-elemet').find('.category_description').attr('id',dropped_cat_des);
//         jQuery('.dropped-elemet').find('.category_description').attr('name','category['+dropped_cat_number+'][description]');
        
//         // remove the classes
//         jQuery(this).removeClass("dropped-elemet");
//         jQuery(ui.draggable).removeClass('dragged-elemet');
        
//         var $this = jQuery(this);
//         jQuery(".service-price-length-rows-wrapper").removeClass("highlight");
//         jQuery(ui.draggable).animate({
//         "left": jQuery(ui.draggable).data("left"),
//         "top": jQuery(ui.draggable).data("top"),
//         }, "fast");
//     }
//   });

 }); 

    
//  jQuery( "#category-rows-wrapper" ).sortable({
//     items: '#sortable,.categor-sec-first,.service-price-length-rows-wrapper',
//     helper: 'clone',
//     cursor: 'move',
//     connectWith: "#sortable",
//     // cancel: '.categor-sec-first',
// 	placeholder : "ui-state-highlight",
// 	update  : function(event, ui)
// 	{
// 		jQuery('#category-rows-wrapper #sortable').each(function(){
// 		});

// 	}

//  });


// Start 12th November 2019

jQuery( ".category-rows-master-cls" ).sortable({
    items: '.service-price-length-rows-wrapper',
    handle: '.spl_ser_sec_ico',
    cursor: 'move',
    //helper: 'clone',
    dropOnEmpty: true,
    placeholder : "ui-state-highlight",
    start: function(event, ui){
          jQuery('#sortable.category-row').removeClass('highlight');
          jQuery('.service-price-length-rows-wrapper').removeClass('highlight_ser');
          ui.item.addClass('highlight_ser');
    },
    // remove: function(event, ui) {
    //         ui.item.clone().remove();
    //   },
	stop  : function(event, ui)
	{
	     var last_ser_col_id = jQuery('.highlight_ser').parent().children().last().find('.service_name').attr('id');
	     var sortable_cat_num = jQuery('.highlight_ser').find('.service_name').attr('id');
	     var sortable_cat_num = sortable_cat_num.split("_");
	     var sortable_cat_number = sortable_cat_num[1];  
	     var dropped_cat_num = last_ser_col_id.split("_");
	     var dropped_cat_number = dropped_cat_num[1]; 
	     
	     var dropped_ser_number = jQuery('.highlight_ser').parent().children('.service-price-length-rows-wrapper').length;
	     
	     
	     var service_name_id = 'category_'+dropped_cat_number+'_'+dropped_ser_number+'_service_name';
	     var service_price_id = 'category_'+dropped_cat_number+'_'+dropped_ser_number+'_service_price';
	     var service_desc_id = 'category_'+dropped_cat_number+'_'+dropped_ser_number+'_service_desc';
	     var ser_btn_enable_id = 'category_'+dropped_cat_number+'_'+dropped_ser_number+'_ser_btn_enable';
	     var service_button_id = 'category_'+dropped_cat_number+'_'+dropped_ser_number+'_service_button';
	     var service_button_url_id = 'category_'+dropped_cat_number+'_'+dropped_ser_number+'_service_button_url';
	     var service_image_id = 'category_'+dropped_cat_number+'_'+dropped_ser_number+'_service_image';
	     var service_regular_price_id = 'category_'+dropped_cat_number+'_'+dropped_ser_number+'_service_regular_price';
	     
	    if(sortable_cat_number != dropped_cat_number){
        jQuery('.highlight_ser').children().find('.service_name').attr('id',service_name_id);
        jQuery('.highlight_ser').children().find('.service_name').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_name]');
        
        jQuery('.highlight_ser').children().find('.service_price').attr('id',service_price_id);
        jQuery('.highlight_ser').children().find('.service_price').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_price]');
        
        jQuery('.highlight_ser').children().find('.service_regular_price').attr('id',service_regular_price_id);
        jQuery('.highlight_ser').children().find('.service_regular_price').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_regular_price]');
        
        jQuery('.highlight_ser').children().find('.service_desc').attr('id',service_desc_id);
        jQuery('.highlight_ser').children().find('.service_desc').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_desc]');
       
        jQuery('.highlight_ser').children().find('.spl_service_button_enable').attr('id',ser_btn_enable_id);
        jQuery('.highlight_ser').children().find('.spl_service_button_enable').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_button_enable]');
        
        jQuery('.highlight_ser').children().find('.service_button').attr('id',service_button_id);
        jQuery('.highlight_ser').children().find('.service_button').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_button]');

        jQuery('.highlight_ser').children().find('.service_button_url').attr('id',service_button_url_id);
        jQuery('.highlight_ser').children().find('.service_button_url').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_button_url]');

        jQuery('.highlight_ser').children().find('.service_image').attr('id',service_image_id);
        jQuery('.highlight_ser').children().find('.service_image').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_image]');
        
        update_all_service_rows_html_in_wrapper(jQuery('.highlight_ser').parent());
        
	    }

         update_all_service_rows_html_in_wrapper(jQuery('.highlight_ser').parent());
	     setTimeout(function(){
	         jQuery('.service-price-length-rows-wrapper').removeClass('highlight_ser');
	     },3000);
	}
});

// End 12th November 2019

// jQuery( ".category-row" ).sortable({
//     items: '.service-price-length-rows-wrapper',
//     handle: '.spl_ser_sec_ico',
//     cursor: 'move',
//     cancel: '.categor-sec-first',
//     placeholder : "ui-state-highlight",
//     //connectWith: "#sortable",
//     start: function(event, ui){
//           jQuery('.service-price-length-rows-wrapper').removeClass('highlight_ser');
//           ui.item.addClass('highlight_ser');
//     },
// 	update  : function(event, ui)
// 	{
// 	     setTimeout(function(){
// 	         jQuery('.service-price-length-rows-wrapper').removeClass('highlight_ser');
// 	     },3000);
// 	}
// });

 jQuery( "#category-rows-wrapper" ).sortable({
    items: '#sortable',
    handle: '.categor-sec-first',
    helper: 'clone',
    cursor: 'move',
    connectWith: "#sortable",
	placeholder : "ui-state-highlight",
	start: function(event, ui){
	      jQuery('.service-price-length-rows-wrapper').removeClass('highlight_ser');
	      jQuery('#sortable.category-row').removeClass('highlight');
          ui.item.addClass('highlight');
    },
	update  : function(event, ui)
	{
	     setTimeout(function(){
	         jQuery('#sortable.category-row').removeClass('highlight');
	     },3000);
	}
 });





</script>

<script>

jQuery(".service-price-length-rows-wrapper").mouseenter(function() {
    jQuery(this).css('box-shadow','0px 1px 6px rgba(17, 17, 17, 0.18)');
}).mouseleave(function() {
    jQuery(this).css('box-shadow','none');
});

</script>

<script>
    jQuery("document").ready(function(){
        jQuery(document).on('change', '.service_image', function() {
            var form_data = new FormData();
            var file_data = jQuery(this).prop('files')[0];
            var id = jQuery(this).attr('id');
            form_data.append('file', file_data);
            form_data.append('action', 'spl_upload_ser_img');
            
            var adminurl = '<?php echo admin_url( 'admin-ajax.php'); ?>';
            
            jQuery.ajax({
                url: adminurl,
                type: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData:false,
                success: function(data){
                    var spl_ser_id = document.getElementById(id);
                    jQuery(spl_ser_id).parent().find('img').attr('src',data);
                    jQuery( spl_ser_id ).parent().find( 'input:hidden' ).val(data);
                }    
              });
        });
    });
</script>


<!--- TIDIO CUTSOM BUTTON CHAT HELP -->
<!---<script>
function chatShow(e) { 
tidioChatApi.method('popUpOpen'); 
}
</script> -->
<!--- TIDIO CHAT HELP -->
<!--- TIDIO CHAT HELP -->
<!----<script src="//code.tidio.co/rjrinwxitmkczxakuxdvtzalnbxi1f1x.js"></script>-->
<!--- END TIDIO CHAT HELP -->