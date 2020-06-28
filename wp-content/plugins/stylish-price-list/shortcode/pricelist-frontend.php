<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$cats=array();
$fonts=array();

$list_name_font='';
$title_font='';
$price_font='';
$desc_font='';
$service_description_font = '';
$default_tab_size=''; 
if(!empty($id)){
	$shortcode_id=isset($id) ? $id : '';
    $cats_data=spl_get_option($id);
    //echo '<pre>'; print_r($cats_data); echo '</pre>';
	$style_cat_tab_btn=isset($cats_data['style_cat_tab_btn']) ? $cats_data['style_cat_tab_btn'] : '';
	$all_tab = isset($cats_data['all_tab']) ? $cats_data['all_tab'] : '';
    $style = isset($cats_data['tab_style']) ? $cats_data['tab_style'] : '';
    $style5_category = isset($cats_data['style5_category']) ? $cats_data['style5_category'] : '';
    $default = isset($cats_data['default_tab']) ? $cats_data['default_tab'] : '';
    $select_column = isset($cats_data['select_column']) ? $cats_data['select_column'] : '';
    $list_name=remove_slash_quotes($cats_data['list_name']);
    $spl_remove_title=isset($cats_data['spl_remove_title']) ? $cats_data['spl_remove_title'] : '';
    $hover_color=isset($cats_data['hover_color']) ? $cats_data['hover_color'] : '';
    $title_color=isset($cats_data['title_color']) ? $cats_data['title_color'] : '';
    $title_color_top=isset($cats_data['title_color_top']) ? $cats_data['title_color_top'] : '';
    $price_color=isset($cats_data['price_color']) ? $cats_data['price_color'] : '';
    $title_size=isset($cats_data['title_font_size']) ? $cats_data['title_font_size'] : '';
    $tab_size=isset($cats_data['tab_font_size']) ? $cats_data['tab_font_size'] : '';

    $tab_description_color=isset($cats_data['tab_description_color']) ? $cats_data['tab_description_color'] : '';
    $tab_description_font_size=isset($cats_data['tab_description_font_size']) ? $cats_data['tab_description_font_size'] : '';
    $tab_description_font=isset($cats_data['tab_description_font']) ? $cats_data['tab_description_font'] : '';

    $service_size=isset($cats_data['service_font_size']) ? $cats_data['service_font_size'] : '';
    $spl_container_max_width=isset($cats_data['spl_container_max_width']) ? $cats_data['spl_container_max_width'] : '';
    $service_description_font_size=isset($cats_data['service_description_font_size']) ? $cats_data['service_description_font_size'] : '';
    $default_tab_size=isset($cats_data['default_tab_font_size']) ? $cats_data['default_tab_font_size'] : '';
    $default_tab_description_font_size=isset($cats_data['default_tab_description_font_size']) ? $cats_data['default_tab_description_font_size'] : '';
    $service_color=isset($cats_data['service_color']) ? $cats_data['service_color'] : '';
    $service_description_color=isset($cats_data['service_description_color']) ? $cats_data['service_description_color'] : '';
    $select_price=isset($cats_data['service_price_font_size']) ? $cats_data['service_price_font_size'] : '';

    $list_name_font=isset($cats_data['list_name_font']) ? $cats_data['list_name_font'] : '';
    $title_font=isset($cats_data['title_font']) ? $cats_data['title_font'] : '';
    $price_font=isset($cats_data['price_font']) ? $cats_data['price_font'] : '';
    $desc_font=isset($cats_data['desc_font']) ? $cats_data['desc_font'] : '';
    $service_description_font=isset($cats_data['service_description_font']) ? $cats_data['service_description_font'] : '';
    $toggle=isset($cats_data['toggle']) ? $cats_data['toggle'] : '';
	$toggle_all_tab=isset($cats_data['toggle_all_tab']) ? $cats_data['toggle_all_tab'] : '';
	$price_list_desc=isset($cats_data['price_list_desc']) ? $cats_data['price_list_desc'] : '';
	
	$brack_title_desktop=isset($cats_data['brack_title_desktop']) ? $cats_data['brack_title_desktop'] : '';
	$brack_title_tablets=isset($cats_data['brack_title_tablets']) ? $cats_data['brack_title_tablets'] : '';

    $fonts['list_name_font']['family']=$list_name_font;
    $fonts['title_font']['family']=$title_font;
    $fonts['price_font']['family']=$price_font;
    $fonts['desc_font']['family']=$desc_font;
    $fonts['service_description_font']['family']=$service_description_font;
    $fonts['tab_description_font']['family']=$tab_description_font;
    

    //convert family like 'Dancing-Script' to DancingScript
    $list_name_font=str_replace("-", " ", $list_name_font);
    $title_font=str_replace("-", " ", $title_font);
    $price_font=str_replace("-", " ", $price_font);
    $desc_font=str_replace("-", " ", $desc_font);
    $service_description_font=str_replace("-", " ", $service_description_font);
    $tab_description_font=str_replace("-", " ", $tab_description_font);
    
    
    // get font weight dynamically
    $title_font_weight=isset($cats_data['title_font-weight']) ? $cats_data['title_font-weight'] : '';
    $tab_font_weight=isset($cats_data['tab_font-weight']) ? $cats_data['tab_font-weight'] : '';
    $service_font_weight=isset($cats_data['service_font-weight']) ? $cats_data['service_font-weight'] : '';
    $service_price_font_weight=isset($cats_data['service_price_font-weight']) ? $cats_data['service_price_font-weight'] : '';
    $tab_description_font_weight=isset($cats_data['tab_description_font-weight']) ? $cats_data['tab_description_font-weight'] : '';
    $description_font_weight=isset($cats_data['description_font-weight']) ? $cats_data['description_font-weight'] : '';

    $opt_cats=$cats_data['category'];
    foreach ($opt_cats as $cat_id => $cat) {
		
        $cat_name=remove_slash_quotes($cat['name']);
        unset($cat['name']);//remove the name items, so, we can use foreach to process 
		$cat_description=remove_slash_quotes($cat['description']);
        unset($cat['description']);//remove the name items, so, we can use foreach to process 
        $services=array();
        foreach ($cat as $service_id => $service) {
            $services[$service_id]['name']=remove_slash_quotes($service['service_name']);
            $services[$service_id]['regular_price']=remove_slash_quotes($service['service_regular_price'] ?? null);
            $services[$service_id]['price']=remove_slash_quotes($service['service_price']);
            $services[$service_id]['desc']=remove_slash_quotes($service['service_desc']);
            $services[$service_id]['service_button'] = remove_slash_quotes($service['service_button'] ?? null);
            $services[$service_id]['service_button_url'] = remove_slash_quotes($service['service_button_url'] ?? null);
			$services[$service_id]['service_url']=   remove_slash_quotes(isset($service['service_url']) ? $service['service_url'] : ''); //remove_slash_quotes($service['service_url']); 
			$services[$service_id]['service_image']=   remove_slash_quotes(isset($service['service_image']) ? $service['service_image'] : ''); //remove_slash_quotes($service['service_image']); 
        }
        $cats[$cat_id]['name']=remove_slash_quotes($cat_name);
		$cats[$cat_id]['description']=remove_slash_quotes($cat_description);
        $cats[$cat_id]['services']=$services;
    }
}
global $spl_googlefonts_var;
$spl_googlefonts_var->enqueue_fonts_style($fonts);//load google fonts css

/* output_service_style2 */
if(!function_exists('output_service_style2')){
    function output_service_style2($service){
        extract($service);
            if(empty($name)){  
              return;
            }
        ob_start();
?>
       <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 name-price-desc">
           <?php if (!empty($service['service_button'])) { ?>
            <div class="row name-price spl_cstm_style2">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 spl_cstm_style_2_book-full">
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 spl_cstm_style_2_book">
                    <?php if (!empty($service['service_url'])) { ?>
                        <a href="<?php echo $service['service_url']; ?>" target="_blank"><?php echo output_a_tag($name, '', 'name a-tag'); ?></a>
                    <?php } else { ?>
                        <?php echo output_a_tag($name, '', 'name a-tag'); ?>
                    <?php } ?>
                    <?php echo output_a_tag($desc, '', 'desc a-tag'); ?>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 right-style-2">
                    <?php echo output_a_tag($price, '', 'spl-price a-tag'); ?>
                    <a href="<?php echo $service['service_button_url']; ?>" class="btn btn-book-now spl_book_now_btn_style_1"><?php echo $service['service_button']; ?></a>
                </div>
                </div>
                </div>
            </div>
            <div class="row liner">
            </div>
            <?php }else{ ?>
            <div class="row name-price">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <?php if (!empty($service['service_url'])) { ?>
                        <a href="<?php echo $service['service_url']; ?>" target="_blank"><?php echo output_a_tag($name, '', 'name a-tag'); ?></a>
                    <?php } else { ?>
                        <?php echo output_a_tag($name, '', 'name a-tag'); ?>
                    <?php } ?>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <?php echo output_a_tag($price, '', 'spl-price a-tag'); ?>
                </div>
            </div>
            <div class="row desc">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php echo output_a_tag($desc, '', 'desc a-tag'); ?>
                </div>
            </div>

            <div class="row liner">
            </div>
            <?php } ?>
        
       </div>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end output_service() 
}
/* output_service_style2 */


/* output_service_style2 single column */
if(!function_exists('output_service_style2_single_column')){
    function output_service_style2_single_column($service){
        extract($service);
            if(empty($name)){  
              return;
            }
        ob_start();
?>
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 name-price-desc">
           <?php if (!empty($service['service_button'])) { ?>
            <div class="row name-price spl_cstm_style2">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 spl_cstm_style_2_book-full">
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 spl_cstm_style_2_book">
                    <?php if (!empty($service['service_url'])) { ?>
                        <a href="<?php echo $service['service_url']; ?>" target="_blank"><?php echo output_a_tag($name, '', 'name a-tag'); ?></a>
                    <?php } else { ?>
                        <?php echo output_a_tag($name, '', 'name a-tag'); ?>
                    <?php } ?>
                    <?php echo output_a_tag($desc, '', 'desc a-tag'); ?>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 right-style-2">
                    <?php echo output_a_tag($price, '', 'spl-price a-tag'); ?>
                    <a href="<?php echo $service['service_button_url']; ?>" class="btn btn-book-now spl_book_now_btn_style_1"><?php echo $service['service_button']; ?></a>
                </div>
                </div>
                </div>
            </div>
            <div class="row liner">
            </div>
            <?php }else{ ?>
            <div class="row name-price">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <?php if (!empty($service['service_url'])) { ?>
                        <a href="<?php echo $service['service_url']; ?>" target="_blank"><?php echo output_a_tag($name, '', 'name a-tag'); ?></a>
                    <?php } else { ?>
                        <?php echo output_a_tag($name, '', 'name a-tag'); ?>
                    <?php } ?>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <?php echo output_a_tag($price, '', 'spl-price a-tag'); ?>
                </div>
            </div>
            <div class="row desc">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php echo output_a_tag($desc, '', 'desc a-tag'); ?>
                </div>
            </div>

            <div class="row liner">
            </div>
            <?php } ?>
        
       </div>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end output_service() 
}
/* output_service_style2 single column */

/* output_service_col1 starts */

if(!function_exists('output_service_col1')){
    function output_service_col1($service){
        extract($service);
            if(empty($name)){  
              return;
            }
        ob_start();
?>
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 name-price-desc">
           <?php if (!empty($service['service_button'])) { ?>
            <div class="row name-price spl_cstm_style1">
                <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 spl_cstm_style_1_book-full">
                    <div class="row">
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-10 padding-left-no spl_cstm_style_1_book ">
                    <?php if (!empty($service['service_url'])) { ?>
                        <a href="<?php echo $service['service_url']; ?>" target="_blank"><?php echo output_a_tag($name, '', 'name a-tag'); ?></a>
                    <?php } else { ?>
                        <?php echo output_a_tag($name, '', 'name a-tag'); ?>
                    <?php } ?>
                    <?php echo output_a_tag($desc, '', 'desc a-tag'); ?>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-2 padding-right-no">
                    <?php echo output_a_tag($price, '', 'spl-price a-tag'); ?>
                </div>
                </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 padding-left-no padding-right-no">
                    <a href="<?php echo $service['service_button_url']; ?>" class="btn btn-book-now spl_book_now_btn_style_1"><?php echo $service['service_button']; ?></a>
                </div>
            </div>
            <div class="row liner">
            </div>
            <?php }else{ ?>
            <div class="row name-price">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <?php if (!empty($service['service_url'])) { ?>
                        <a href="<?php echo $service['service_url']; ?>" target="_blank"><?php echo output_a_tag($name, '', 'name a-tag'); ?></a>
                    <?php } else { ?>
                        <?php echo output_a_tag($name, '', 'name a-tag'); ?>
                    <?php } ?>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <?php echo output_a_tag($price, '', 'spl-price a-tag'); ?>
                </div>
            </div>
            <div class="row desc">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php echo output_a_tag($desc, '', 'desc a-tag'); ?>
                </div>
            </div>

            <div class="row liner">
            </div>
            <?php } ?>
        
       </div>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end output_service() 
}

/* output_service_col1 ends */

// output_service_style6 starts
if(!function_exists('output_service_style6')){
    function output_service_style6($service){
		if(empty($service)){
		  return;
		}
        ob_start();
?>
        <style>
        .padd_0 {
            padding:  0px !important;
        }
        .padd_0 table tr td:last-child {
            text-align: right !important;
        }
        .padd_0 table {
            margin-bottom: 0px !important;
        }
        .spl_cstm_style_6 table.table tr td {
            padding: 8px;
            text-align: left;
        }
        .spl_cstm_style_6 {
            margin: 10px 0px 0px 0px;
        }

		.spl_cstm_style_6 .table table td {
			border-top: 0px solid #e5e5e5;
		}
        .spl_cstm_style_6 table td {
            border-bottom: 0px solid #e5e5e5;
        }
		.spl_cstm_style_6 td {
            border-bottom: 0px solid #e5e5e5;
        }
        .spl_cstm_style_6 table tbody {
            border-left: 0px solid #e5e5e5;
            border-right: 0px solid #e5e5e5;
        }
        .spl_cstm_style_6 table {
            border-bottom: 0px !important;
        }

       </style>
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 name-price-desc">
      <div class="row name-price spl_cstm_style_6">
        <div class="table-responsive">          
         <table class="table ">
            <tbody>
                <tr>
                    <td class="spl_prd_img_td"><img src="<?php echo $service['service_image']; ?>" height="50px;" width="50px;" /></td>
                    <td class="padd_0">
                        <table style="width:100%;">
                          <tr>
                              <td><?php echo output_a_tag($service['name'], '', 'name a-tag'); ?></td> 
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
                              <td><del><?php echo $service['regular_price']; ?></del></td>
                          </tr>
                          <tr>
                              <td colspan="2"><?php echo output_a_tag($service['desc'], '', 'desc a-tag'); ?></td> 
                              <td><?php echo output_a_tag($service['price'], '', 'spl-price a-tag'); ?></td>
                          </tr>
                      </table>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
      </div>
      <div class="row liner">
      </div>
      </div>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end output_service() 
}
// output_service_style6 ends

if(!function_exists('output_service')){
    function output_service($service){
        extract($service);
            if(empty($name)){  
              return;
            }
        ob_start();
?>
       <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 name-price-desc">
           <?php if (!empty($service['service_button'])) { ?>
            <div class="row name-price spl_cstm_style1">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 spl_cstm_style_1_book-full">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-8 padding-left-no spl_cstm_style_1_book ">
                    <?php if (!empty($service['service_url'])) { ?>
                        <a href="<?php echo $service['service_url']; ?>" target="_blank"><?php echo output_a_tag($name, '', 'name a-tag'); ?></a>
                    <?php } else { ?>
                        <?php echo output_a_tag($name, '', 'name a-tag'); ?>
                    <?php } ?>
                    <?php echo output_a_tag($desc, '', 'desc a-tag'); ?>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 padding-left-no padding-right-no">
                    <a href="<?php echo $service['service_button_url']; ?>" class="btn btn-book-now spl_book_now_btn_style_1"><?php echo $service['service_button']; ?></a>
                </div>				
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 padding-right-no">
                    <?php echo output_a_tag($price, '', 'spl-price a-tag'); ?>
                </div>
                </div>
                </div>
            </div>
            <div class="row liner">
            </div>
            <?php }else{ ?>
            <div class="row name-price">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <?php if (!empty($service['service_url'])) { ?>
                        <a href="<?php echo $service['service_url']; ?>" target="_blank"><?php echo output_a_tag($name, '', 'name a-tag'); ?></a>
                    <?php } else { ?>
                        <?php echo output_a_tag($name, '', 'name a-tag'); ?>
                    <?php } ?>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <?php echo output_a_tag($price, '', 'spl-price a-tag'); ?>
                </div>
            </div>
            <div class="row desc">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php echo output_a_tag($desc, '', 'desc a-tag'); ?>
                </div>
            </div>

            <div class="row liner">
            </div>
            <?php } ?>
        
       </div>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end output_service() 
}//end if !function_exists('output_service')

//break sercive col 1
if(!function_exists('output_service_break_col1')){
    function output_service_break_col1($service){
        extract($service);
            if(empty($name)){
              return;
            }
        ob_start();
?>
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 name-price-desc">
           <div class="row name-price">
               <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 custom_line">
                   <?php if(!empty($service['service_url'])){ ?>
                   <a href="<?php echo $service['service_url']; ?>" target="_blank"><?php echo output_a_tag($name,'','name a-tag'); ?></a>
				   <?php } else{ ?>
					   <?php echo output_a_tag($name,'','name a-tag'); ?>
				  <?php }?>
				  <span class="style-4-border style-4-width break_service"></span>
               </div>
               
               <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 style4_break_price">
                   <?php echo output_a_tag($price,'','spl-price a-tag'); ?>
               </div>
           </div>
           <div class="row desc">
               <?php if (!empty($service['service_button'])) { ?>
               <div class="col-xs-8 col-sm-10 col-md-10 col-lg-10 pad-left-0">
                   <?php echo output_a_tag($desc,'','desc a-tag'); ?>
               </div>
               <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 spl_category_brak_style4">
                   <a href="<?php echo $service['service_button_url']; ?>" class="btn btn-book-now spl_book_now_btn_style_4"><?php echo $service['service_button']; ?></a>
               </div>       
               <?php }else{ ?>
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pad-left-0">
                   <?php echo output_a_tag($desc,'','desc a-tag'); ?>
               </div>
               <?php } ?>
           </div>

           <div class="row liner">
           </div>
       </div>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end output_service() 
}//end if !function_exists('output_service')

//End break Service col 1

//break sercive
if(!function_exists('output_service_break')){
    function output_service_break($service){
        extract($service);
            if(empty($name)){
              return;
            }
        ob_start();
?>
       <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 name-price-desc">
           <div class="row name-price">
               <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 custom_line">
                   <?php if(!empty($service['service_url'])){ ?>
                   <a href="<?php echo $service['service_url']; ?>" target="_blank"><?php echo output_a_tag($name,'','name a-tag'); ?></a>
				   <?php } else{ ?>
					   <?php echo output_a_tag($name,'','name a-tag'); ?>
				  <?php }?>
				  <span class="style-4-border style-4-width break_service"></span>
               </div>
               
               <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 style4_break_price">
                   <?php echo output_a_tag($price,'','spl-price a-tag'); ?>
               </div>
           </div>
           <div class="row desc">
               <?php if (!empty($service['service_button'])) { ?>
               <div class="col-xs-8 col-sm-10 col-md-10 col-lg-10 pad-left-0">
                   <?php echo output_a_tag($desc,'','desc a-tag'); ?>
               </div>
               <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 spl_category_brak_style4">
                   <a href="<?php echo $service['service_button_url']; ?>" class="btn btn-book-now spl_book_now_btn_style_4"><?php echo $service['service_button']; ?></a>
               </div>       
               <?php }else{ ?>
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pad-left-0">
                   <?php echo output_a_tag($desc,'','desc a-tag'); ?>
               </div>
               <?php } ?>
           </div>

           <div class="row liner">
           </div>
       </div>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end output_service() 
}//end if !function_exists('output_service')

//End break Service
//Start output service for style 3
if(!function_exists('output_service_style3')){
    function output_service_style3($service){
        extract($service);
        if(empty($name)){
          return;
        }
        ob_start();
        ?>
		<div class="internal-box">
           <div class="row name-price">
                    <?php if (!empty($service['service_button'])) { ?>
                    <div class="col-xs-8 col-sm-8 col-md-6 col-lg-6">
            <?php if (!empty($service['service_url'])) { ?>
                            <a href="<?php echo $service['service_url']; ?>" target="_blank"><?php echo output_a_tag($name, '', 'name a-tag'); ?></a>
                        <?php } else { ?>
                <?php echo output_a_tag($name, '', 'name a-tag'); ?>
            <?php } ?>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
                    <?php echo output_a_tag($price, '', 'spl-price a-tag'); ?>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <a href="<?php echo $service['service_button_url']; ?>" class="btn btn-book-now spl_book_now_btn_style_3"><?php echo $service['service_button']; ?></a>
                    </div>        
                    <?php } else { ?>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <?php if (!empty($service['service_url'])) { ?>
                            <a href="<?php echo $service['service_url']; ?>" target="_blank"><?php echo output_a_tag($name, '', 'name a-tag'); ?></a>
                        <?php } else { ?>
                        <?php echo output_a_tag($name, '', 'name a-tag'); ?>
                    <?php } ?>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <?php echo output_a_tag($price, '', 'spl-price a-tag'); ?>
                    </div>
        <?php } ?>
           </div>
           <div class="row desc">
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                   <?php echo output_a_tag($desc,'','desc a-tag'); ?>
               </div>
           </div>

           <div class="row liner">
           </div>
      </div>
<?php
$html=ob_get_clean();
        return $html;
    }//end output_service_style3() 
}

//Function for style4 col1 //

if(!function_exists('output_service_style4_col1')){
    function output_service_style4_col1($service){
        extract($service);
        if(empty($name)){
          return;
        }
        ob_start();
        ?>
	<div class="internal-box">
                    
            <?php if (!empty($service['service_button'])) { ?>
            <div class="content-section name-price"><span class="style-4-productName style-4-width"><?php if (!empty($service['service_url'])) { ?><a href="<?php echo $service['service_url']; ?>"><?php echo output_a_tag($name, '', 'name a-tag'); ?></a><?php } else { ?><?php echo output_a_tag($name, '', 'name a-tag'); ?><?php } ?></span> <span class="style-4-border"></span><span class="style-4-productPrice style-4-width"> <?php echo output_a_tag($price, '', 'spl-price a-tag'); ?></span></div><span class="row desc spl_cstm_btn_style4"><?php echo output_a_tag($desc, '', 'desc a-tag'); ?><a href="<?php echo $service['service_button_url']; ?>" class="btn btn-book-now spl_book_now_btn_style_4"><?php echo $service['service_button']; ?></a></span>
            <?php }else{ ?>
            <div class="content-section name-price"><span class="style-4-productName style-4-width"><?php if (!empty($service['service_url'])) { ?><a href="<?php echo $service['service_url']; ?>"><?php echo output_a_tag($name, '', 'name a-tag'); ?></a><?php } else { ?><?php echo output_a_tag($name, '', 'name a-tag'); ?><?php } ?></span> <span class="style-4-border"></span><span class="style-4-productPrice style-4-width"> <?php echo output_a_tag($price, '', 'spl-price a-tag'); ?></span></div><span class="row desc"><?php echo output_a_tag($desc, '', 'desc a-tag'); ?></span>
            <?php } ?>
                </div>
<?php
$html=ob_get_clean();
        return $html;
    }//end output_service_style4() 
}	 
//End function for style4 col1 //


//Function for style4 //

if(!function_exists('output_service_style4')){
    function output_service_style4($service){
        extract($service);
        if(empty($name)){
          return;
        }
        ob_start();
        ?>
	<div class="internal-box">
                    
            <?php if (!empty($service['service_button'])) { ?>
            <div class="content-section name-price"><span class="style-4-productName style-4-width"><?php if (!empty($service['service_url'])) { ?><a href="<?php echo $service['service_url']; ?>"><?php echo output_a_tag($name, '', 'name a-tag'); ?></a><?php } else { ?><?php echo output_a_tag($name, '', 'name a-tag'); ?><?php } ?></span> <span class="style-4-border"></span><span class="style-4-productPrice style-4-width"> <?php echo output_a_tag($price, '', 'spl-price a-tag'); ?></span></div><span class="row desc spl_cstm_btn_style4"><?php echo output_a_tag($desc, '', 'desc a-tag'); ?><a href="<?php echo $service['service_button_url']; ?>" class="btn btn-book-now spl_book_now_btn_style_4"><?php echo $service['service_button']; ?></a></span>
            <?php }else{ ?>
            <div class="content-section name-price"><span class="style-4-productName style-4-width"><?php if (!empty($service['service_url'])) { ?><a href="<?php echo $service['service_url']; ?>"><?php echo output_a_tag($name, '', 'name a-tag'); ?></a><?php } else { ?><?php echo output_a_tag($name, '', 'name a-tag'); ?><?php } ?></span> <span class="style-4-border"></span><span class="style-4-productPrice style-4-width"> <?php echo output_a_tag($price, '', 'spl-price a-tag'); ?></span></div><span class="row desc"><?php echo output_a_tag($desc, '', 'desc a-tag'); ?></span>
            <?php } ?>
                </div>
<?php
$html=ob_get_clean();
        return $html;
    }//end output_service_style4() 
}	 
//End function for style4//

//Start output service for style 5 
if(!function_exists('output_service_style5')){
    function output_service_style5($service){
        if(empty($service)){
		  return;
		}
        extract($service);
            if(empty($name)){
              return;
            }
        ob_start(); 
        ?>
		<div class="style-five">
				<div class="spl-style-5">
        <?php if (!empty($service['service_button'])) { ?>
                    <div class="spl-five-bottom">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php if (!empty($service['service_url'])) { ?>
                                <a href="<?php echo $service['service_url']; ?>"><?php echo output_a_tag($name, '', 'name a-tag'); ?></a>
            <?php } else { ?>
                                <?php echo output_a_tag($name, '', 'name a-tag'); ?>
                            <?php }
                            echo output_a_tag($desc, '', 'desc a-tag');
                            ?>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 padding-left-no">
                            <div class="spl-style5-price"><?php echo output_a_tag_style5($price, '', 'spl-price a-tag'); ?><a href="<?php echo $service['service_button_url']; ?>" class="btn btn-book-now spl_book_now_btn_style_5"><?php echo $service['service_button']; ?></a></div>
                        </div>
                    </div>
        <?php } else { ?>
                    <div class="spl-five-bottom">
                        <div class="col-md-9 col-sm-9 col-xs-9" >
                    <?php if (!empty($service['service_url'])) { ?>
                                <a href="<?php echo $service['service_url']; ?>"><?php echo output_a_tag($name, '', 'name a-tag'); ?></a>
            <?php } else { ?>
                <?php echo output_a_tag($name, '', 'name a-tag'); ?>
            <?php }
            echo output_a_tag($desc, '', 'desc a-tag');
            ?>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 padding-left-no" style="margin-top:0px">
                            <div class="spl-style5-price"><?php echo output_a_tag_style5($price, '', 'spl-price a-tag'); ?></div>
                        </div>
                    </div>
        <?php } ?>
					</div>
		</div>	
<?php
$html=ob_get_clean();
        return $html;
    }//end output_service_style5() 
}	

// Style 5 column 1 starts
if(!function_exists('output_tab_contents_style5_col1')){
    function output_tab_contents_style5_col1($cats, $default, $shortcode_id){
        ob_start();
        ?>
        <?php 
            $all_services=array();
            foreach ($cats as $key => $cat){
                $services=$cat['services'];
                foreach ($services as $key => $service){
                    $name=$service['name'];
                    $all_services[]=$service;
                } 
            }
         
        ?>
       <div class="tab <?php echo ($default) ? '' : 'active';?>" id="all_<?php echo $shortcode_id; ?>" style="<?php echo ($default) ? 'display:none' : 'display:block';?>">
       <div class="left-side-style5 col-one-style5">
        <?php 
        $i=0; ?>
        <?php foreach ($all_services as $key => $service){
            echo output_service_style5(isset($all_services[$i]) ? $all_services[$i] : null); //$all_services[$i]
            $i=$i+2;
        } 
        ?>
        </div>
        <?php 
        $j=1; ?>
        <?php foreach ($all_services as $key => $service){
			$class_cont_content = "hide-right";
			if(isset($all_services[$j]) && !empty($all_services[$j])){
				$cont_content = count($all_services[$j]);
				if($cont_content >= 0){
					$class_cont_content="";
				}
			}
        } 
        ?>
 
        <div class="right-side-style5 <?php echo ' '.$class_cont_content; ?> col-one-style5">
        <?php 
        $j=1; ?>
        <?php foreach ($all_services as $key => $service){
            echo output_service_style5(isset($all_services[$j]) ? $all_services[$j] : null); //$all_services[$j]
            $j=$j+2;
        } 
        ?>
        </div>
       </div>

        <?php foreach ($cats as $key => $cat): ?>
        <?php 
           $name=html_entity_decode($cat['name']);
            $id=get_id_name(html_entity_decode($name));
            $services=$cat['services'];

            if($default == $key)
            {
                $act_tab = "active" ;
                $style_act = "display:block";
            }
            else
            {
                $act_tab = "";  
                $style_act = "display:none";
            }
        ?>
           <div class="tab <?php echo $act_tab;?>" id="<?php echo $key.'_'.$shortcode_id; ?>" style="<?php echo $style_act;?>">
		   <?php if($cat['description']!=''){ 
		   ?>
		   <div class="row">
		     <div class="col-sm-6 custom-description-section">
		        <?php echo html_entity_decode($cat['description']); ?>
			 </div>
		   </div>
		   <?php } ?>
		   <div class="row">
		       <div class="left-side-style5 col-one-style5">
            <?php 
            $k=1;
            foreach ($services as $key => $service){
                echo output_service_style5(isset($services[$k]) ? $services[$k] : null); //$services[$k]
                $k=$k+2;
            } 
            ?>
                </div>
                <?php 
                $l=2;?>
                <?php 					
					foreach ($all_services as $key => $service){					
						$class_cont_content = "hide-right";
						if(isset($all_services[$l]) && !empty ($all_services[$l])){ 
							$cont_content = count($all_services[$l]);
							//echo $cont_content;
					        if($cont_content >= 0){
								$class_cont_content="";
							}
						}
                    } 
                ?>
                <?php 
                if (!empty($cont_content)){
                ?>
                <div class="right-side-style5 <?php echo ' '.$class_cont_content; ?> col-one-style5">
            <?php 
            $l=2; ?>
            <?php
            foreach ($services as $key => $service){
                echo output_service_style5(isset($services[$l]) ? $services[$l] : null); // $services[$l]
                $l=$l+2;
            } 
            ?>
                </div>
                <?php } ?>
            </div>
           </div>
        <?php endforeach ?>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end output_tab_contents() 
}
// Style 5 column 1 ends

if(!function_exists('output_tab_contents_style5')){
    function output_tab_contents_style5($cats, $default, $shortcode_id){
        ob_start();
        ?>
        <?php 
            $all_services=array();
            foreach ($cats as $key => $cat){
                $services=$cat['services'];
                foreach ($services as $key => $service){
                    $name=$service['name'];
                    $all_services[]=$service;
                } 
            }
         
        ?>
       <div class="tab <?php echo ($default) ? '' : 'active';?>" id="all_<?php echo $shortcode_id; ?>" style="<?php echo ($default) ? 'display:none' : 'display:block';?>">
       <div class="left-side-style5">
        <?php 
        $i=0; ?>
        <?php foreach ($all_services as $key => $service){
            echo output_service_style5(isset($all_services[$i]) ? $all_services[$i] : null);//$all_services[$i]
            $i=$i+2;
        } 
        ?>
        </div>
        <?php 
        $j=1; ?>
        <?php foreach ($all_services as $key => $service){
			$class_cont_content = "hide-right";
			if(isset($all_services[$j]) && !empty($all_services[$j])){
				$cont_content = count($all_services[$j]);
				if($cont_content >= 0){
					$class_cont_content="";
				}
			}
        } 
        ?>
 
        <div class="right-side-style5 <?php echo ' '.$class_cont_content; ?>">
        <?php 
        $j=1; ?>
        <?php foreach ($all_services as $key => $service){
            echo output_service_style5(isset($all_services[$j]) ? $all_services[$j] : null); //$all_services[$j]
            $j=$j+2;
        } 
        ?>
        </div>
       </div>

        <?php foreach ($cats as $key => $cat): ?>
        <?php 
           $name=html_entity_decode($cat['name']);
            $id=get_id_name(html_entity_decode($name));
            $services=$cat['services'];

            if($default == $key)
            {
                $act_tab = "active" ;
                $style_act = "display:block";
            }
            else
            {
                $act_tab = "";  
                $style_act = "display:none";
            }
        ?>
           <div class="tab <?php echo $act_tab;?>" id="<?php echo $key.'_'.$shortcode_id; ?>" style="<?php echo $style_act;?>">
		   <?php if($cat['description']!=''){ 
		   ?>
		   <div class="row">
		     <div class="col-sm-6 custom-description-section">
		        <?php echo html_entity_decode($cat['description']); ?>
			 </div>
		   </div>
		   <?php } ?>
		   <div class="row">
		       <div class="left-side-style5">
            <?php 
            $k=1;
            foreach ($services as $key => $service){
                echo output_service_style5(isset($services[$k]) ? $services[$k] : null); //$services[$k]
                $k=$k+2;
            } 
            ?>
                </div>
                <?php 
                $l=2;?>
                <?php 					
					foreach ($all_services as $key => $service){					
						$class_cont_content = "hide-right";
						if(isset($all_services[$l]) && !empty ($all_services[$l])){ 
							$cont_content = count($all_services[$l]);
							//echo $cont_content;
					        if($cont_content >= 0){
								$class_cont_content="";
							}
						}
                    } 
                ?>
                <?php 
                if (!empty($cont_content)){
                ?>
                <div class="right-side-style5 <?php echo ' '.$class_cont_content; ?>">
            <?php 
            $l=2; ?>
            <?php
            foreach ($services as $key => $service){
                echo output_service_style5(isset($services[$l]) ? $services[$l] : null); //$services[$l]
                $l=$l+2;
            } 
            ?>
                </div>
                <?php } ?>
            </div>
           </div>
        <?php endforeach ?>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end output_tab_contents() 
}//end if !function_exists('output_tab_contents_style5')

if(!function_exists('output_tabs_style5')){
    function output_tabs_style5($cats, $default, $shortcode_id){
        ob_start();
        ?>
        <?php foreach ($cats as $key => $cat): ?>
        <?php 
            $name=$cat['name'];
			$description=$cat['description'];
            $id=get_id_name(html_entity_decode($name));
            
            $name1=html_entity_decode($cat['name']);
            $id1=get_id_name(html_entity_decode($name1));
            if($default == $key)
            {
                $act_tab = "active default" ;
            }
            else
            {
                $act_tab = "";  
            }

            if(strtolower($default)==strtolower($name)){$act="active";} else{$act="";}
        ?>
           <li class="<?php echo $act_tab; if($name == ''){echo " hidden"; }?>">
              <a href="#<?php echo $key.'_'.$shortcode_id; ?>" ><?php echo html_entity_decode($name); ?></a>
           </li>
        <?php endforeach ?>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end output_tabs() 
}//end if !function_exists('output_tabs')


if(!function_exists('output_a_tag')){
    function output_a_tag($text,$id='',$class=''){
    ob_start();
    ?>
    <div class="<?php echo $class; ?>"><?php echo $text; ?></div>
    <?php
    $html=ob_get_clean();
        return $html;
    }//end output_a_tag() 
}//end if !function_exists('output_a_tag')

if(!function_exists('output_a_tag_style5')){
    function output_a_tag_style5($text,$id='',$class=''){
    ob_start();
    ?>
    <div class="<?php echo $class; ?>"><p><?php echo $text; ?></p></div>
    <?php
    $html=ob_get_clean();
        return $html;
    }//end output_a_tag_style5() 
}//end if !function_exists('output_a_tag_style5')

// style 1 col 1 starts
if(!function_exists('output_tab_contents_col1')){
    function output_tab_contents_col1($cats, $default, $shortcode_id){
        ob_start();
        ?>
        <?php 
            $all_services=array();
            foreach ($cats as $key => $cat){
                $services=$cat['services'];
                foreach ($services as $key => $service){
                    $name=$service['name'];
                    $all_services[]=$service;
                } 
            }
         
        ?>
       <div class="tab <?php echo ($default) ? '' : 'active';?>" id="all_<?php echo $shortcode_id; ?>" style="<?php echo ($default) ? 'display:none' : 'display:block';?>">
       
        <?php foreach ($all_services as $key => $service){
            echo output_service_col1($service);
        } 
        ?>
        
       </div>

        <?php foreach ($cats as $key => $cat): ?>
        <?php 
           $name=html_entity_decode($cat['name']);
            $id=get_id_name(html_entity_decode($name));
            $services=$cat['services'];
            if($default == $key)
            {
                $act_tab = "active" ;
                $style_act = "display:block";
            }
            else
            {
                $act_tab = "";  
                $style_act = "display:none";
            }
        ?>
           <div class="tab <?php echo $act_tab;?>" id="<?php echo $key.'_'.$shortcode_id; ?>" style="<?php echo $style_act;?>">
		   <?php if($cat['description']!=''){ 
		   ?>
		   <div class="row">
		     <div class="col-sm-8 col-sm-offset-2 custom-description-section">
		        <?php echo html_entity_decode($cat['description']); ?>
			 </div>
		   </div>
		   <?php } ?>
		   <div class="row">
            <?php foreach ($services as $key => $service){
                echo output_service_col1($service);
            } 
            ?>
            </div>
           </div>
        <?php endforeach ?>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end output_tab_contents() 
}
// style 1 col 1 ends

// style 6 starts
if(!function_exists('output_tab_contents_style6')){
    function output_tab_contents_style6($cats, $default, $shortcode_id){
        ob_start();
        ?>
        <?php 
            $all_services=array();
            foreach ($cats as $key => $cat){
                $services=$cat['services'];
                foreach ($services as $key => $service){
                    $name=$service['name'];
                    $all_services[]=$service;
                } 
            }
         
        ?>
       <div class="tab <?php echo ($default) ? '' : 'active';?>" id="all_<?php echo $shortcode_id; ?>" style="<?php echo ($default) ? 'display:none' : 'display:block';?>">
       
        <?php foreach ($all_services as $key => $service){
            echo output_service_style6($service);
        } 
        ?>
        
       </div>

        <?php foreach ($cats as $key => $cat): ?>
        <?php 
           $name=html_entity_decode($cat['name']);
            $id=get_id_name(html_entity_decode($name));
            $services=$cat['services'];
            if($default == $key)
            {
                $act_tab = "active" ;
                $style_act = "display:block";
            }
            else
            {
                $act_tab = "";  
                $style_act = "display:none";
            }
        ?>
           <div class="tab <?php echo $act_tab;?>" id="<?php echo $key.'_'.$shortcode_id; ?>" style="<?php echo $style_act;?>">
		   <?php if($cat['description']!=''){ 
		   ?>
		   <div class="row">
		     <div class="col-sm-8 col-sm-offset-2 custom-description-section">
		        <?php echo html_entity_decode($cat['description']); ?>
			 </div>
		   </div>
		   <?php } ?>
		   <div class="row">
            <?php foreach ($services as $key => $service){
                echo output_service_style6($service);
            } 
            ?>
            </div>
           </div>
        <?php endforeach ?>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end output_tab_contents() 
}
//style 6 end

if(!function_exists('output_tab_contents')){
    function output_tab_contents($cats, $default, $shortcode_id){
        ob_start();
        ?>
        <?php 
            $all_services=array();
            foreach ($cats as $key => $cat){
                $services=$cat['services'];
                foreach ($services as $key => $service){
                    $name=$service['name'];
                    // $id=get_id_name($name);
                    // $all_services[$id]=$service;
                    $all_services[]=$service;
                } 
            }
         
        ?>
       <div class="tab <?php echo ($default) ? '' : 'active';?>" id="all_<?php echo $shortcode_id; ?>" style="<?php echo ($default) ? 'display:none' : 'display:block';?>">
       
        <?php foreach ($all_services as $key => $service){
            echo output_service($service);
        } 
        ?>
        
       </div>

        <?php foreach ($cats as $key => $cat): ?>
        <?php 
           $name=html_entity_decode($cat['name']);
            $id=get_id_name(html_entity_decode($name));
            $services=$cat['services'];
            // if(!empty($services)){
//echo get_id_name($default);
            // }
            if($default == $key)
            {
                $act_tab = "active" ;
                $style_act = "display:block";
            }
            else
            {
                $act_tab = "";  
                $style_act = "display:none";
            }
        ?>
           <div class="tab <?php echo $act_tab;?>" id="<?php echo $key.'_'.$shortcode_id; ?>" style="<?php echo $style_act;?>">
		   <?php if($cat['description']!=''){ 
		   ?>
		   <div class="row">
		     <div class="col-sm-8 col-sm-offset-2 custom-description-section">
		        <?php echo html_entity_decode($cat['description']); ?>
			 </div>
		   </div>
		   <?php } ?>
		   <div class="row">
            <?php foreach ($services as $key => $service){
                echo output_service($service);
            } 
            ?>
            </div>
           </div>
        <?php endforeach ?>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end output_tab_contents() 
}//end if !function_exists('output_tab_contents')
if(!function_exists('output_tabs')){
    function output_tabs($cats, $default, $shortcode_id){
        ob_start();
        ?>
        <?php foreach ($cats as $key => $cat): ?>
        <?php 
            $name=$cat['name'];
			$description=$cat['description'];
            $id=get_id_name(html_entity_decode($name));
            
            
             $name1=html_entity_decode($cat['name']);
            $id1=get_id_name(html_entity_decode($name1));
            if($default == $key)
            {
                $act_tab = "active default" ;
            }
            else
            {
                $act_tab = "";  
            }
           
            if(strtolower($default)==strtolower($name)){$act="active";} else{$act="";}
        ?>
           <li class="<?php echo $act_tab; if($name == ''){echo " hidden"; }?>">
              <a href="#<?php echo $key.'_'.$shortcode_id; ?>" ><?php echo html_entity_decode($name); ?></a>
           </li>
        <?php endforeach ?>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end output_tabs() 
}//end if !function_exists('output_tabs')

if(!function_exists('get_id_name')){
    function get_id_name($in){
        $in=strtolower(trim($in));
        $out=preg_replace('/[^\w]+/','-',$in);

        return $out;
    }//end get_id_name() 
}//end if !function_exists('get_id_name')

/**********Function for second style************/
if(!function_exists('output_tab_contents_second_style')){
    function output_tab_contents_second_style($cats, $default, $shortcode_id){
    foreach ($cats as $key => $cat){
		$services=$cat['services'];
	?>	
	<span class="head-title tab-links_spl spl_cat_title_style_2"><?php echo html_entity_decode($cat['name']); ?></span>
	<?php if($cat['description']){ ?>
	<div class="cat_descreption row"><div class="col-sm-12"><?php echo html_entity_decode($cat['description']); ?></div></div>
	<?php } ?>
	<div class="row">
	<?php 
		foreach ($services as $key => $service){
					echo output_service_style2($service);
		} ?>
    </div>    		
	<?php
    } ?>
    <?php }//end get_id_name() 
}
/**********End Function for second style************/

/**********Function for second style single column************/
if(!function_exists('output_tab_contents_second_style_single_column')){
    function output_tab_contents_second_style_single_column($cats, $default, $shortcode_id){
    foreach ($cats as $key => $cat){
		$services=$cat['services'];
	?>	
	<span class="head-title tab-links_spl spl_cat_title_style_2"><?php echo html_entity_decode($cat['name']); ?></span>
	<?php if($cat['description']){ ?>
	<div class="cat_descreption row"><div class="col-sm-12"><?php echo html_entity_decode($cat['description']); ?></div></div>
	<?php } ?>
	<div class="row">
	<?php 
		foreach ($services as $key => $service){
					echo output_service_style2_single_column($service);
		} ?>
    </div>    		
	<?php
    } ?>
    <?php }//end get_id_name() 
}
/**********End Function for second style single column************/

/**********Start Function for Third style*****************/
if(!function_exists('output_tab_contents_third_style')){
    function output_tab_contents_third_style($cats, $default, $shortcode_id){
		?>
		<!---row masonry -->
		<div class="masonary-section" id="main_<?php echo $shortcode_id; ?>" role="main">
		    <div id="tiles_<?php echo $shortcode_id; ?>">
		<?php
    foreach ($cats as $key => $cat){
		$services=$cat['services'];
	?>
	 
        <!-- These are our grid blocks -->
         <div class="grid-sizer col-sm-4">
            <div class="grid-item-content">
   <div class="name-price-desc for-style-3">	
	<span class="head-title tab-links_spl head_title_style_3 spl_cat_title_style_3"><?php echo html_entity_decode($cat['name']); ?></span>
	 <?php if($cat['description']){ ?>
	<div class="cat_descreption row"><div class="style3_cat_desc"><?php echo html_entity_decode($cat['description']); ?></div></div>
	<?php } ?>
	<?php 
		foreach ($services as $key => $service){
					echo output_service_style3($service);
		} ?>
    </div>
    </div>
    </div>
        <!--<li>
<div class="name-price-desc for-style-3">	
	<h3 class="head-title tab-links_spl head_title_style_3"><?php echo html_entity_decode($cat['name']); ?></h3>
	 <?php if($cat['description']){ ?>
	<div class="cat_descreption row"><div class="style3_cat_desc"><?php echo html_entity_decode($cat['description']); ?></div></div>
	<?php } ?>
	<?php 
		foreach ($services as $key => $service){
					echo output_service_style3($service);
		} ?>
    </div>  
    </li>-->
	<?php
    } ?>
    </div>
	</div>
	
    <?php }//end get_id_name() 
}

// Style 3 col 2
if(!function_exists('output_tab_contents_third_style_col2')){
    function output_tab_contents_third_style_col2($cats, $default, $shortcode_id){
		?>
		<!---row masonry -->
		<div class="masonary-section" id="main_<?php echo $shortcode_id; ?>" role="main">
		    <div id="tiles_<?php echo $shortcode_id; ?>">
		<?php
    foreach ($cats as $key => $cat){
		$services=$cat['services'];
	?>
	 
        <!-- These are our grid blocks -->
         <div class="grid-sizer col-sm-6">
            <div class="grid-item-content">
   <div class="name-price-desc for-style-3">	
	<span class="head-title tab-links_spl head_title_style_3 spl_cat_title_style_3"><?php echo html_entity_decode($cat['name']); ?></span>
	 <?php if($cat['description']){ ?>
	<div class="cat_descreption row"><div class="style3_cat_desc"><?php echo html_entity_decode($cat['description']); ?></div></div>
	<?php } ?>
	<?php 
		foreach ($services as $key => $service){
					echo output_service_style3($service);
		} ?>
    </div>
    </div>
    </div>
        <!--<li>
<div class="name-price-desc for-style-3">	
	<h3 class="head-title tab-links_spl head_title_style_3"><?php echo html_entity_decode($cat['name']); ?></h3>
	 <?php if($cat['description']){ ?>
	<div class="cat_descreption row"><div class="style3_cat_desc"><?php echo html_entity_decode($cat['description']); ?></div></div>
	<?php } ?>
	<?php 
		foreach ($services as $key => $service){
					echo output_service_style3($service);
		} ?>
    </div>  
    </li>-->
	<?php
    } ?>
    </div>
	</div>
	
    <?php }//end get_id_name() 
}

// Style 3 col 1
if(!function_exists('output_tab_contents_third_style_col1')){
    function output_tab_contents_third_style_col1($cats, $default, $shortcode_id){
		?>
		<!---row masonry -->
		<div class="masonary-section" id="main_<?php echo $shortcode_id; ?>" role="main">
		    <div id="tiles_<?php echo $shortcode_id; ?>">
		<?php
    foreach ($cats as $key => $cat){
		$services=$cat['services'];
	?>
	 
        <!-- These are our grid blocks -->
         <div class="grid-sizer col-sm-12">
            <div class="grid-item-content">
   <div class="name-price-desc for-style-3">	
	<span class="head-title tab-links_spl head_title_style_3 spl_cat_title_style_3"><?php echo html_entity_decode($cat['name']); ?></span>
	 <?php if($cat['description']){ ?>
	<div class="cat_descreption row"><div class="style3_cat_desc"><?php echo html_entity_decode($cat['description']); ?></div></div>
	<?php } ?>
	<?php 
		foreach ($services as $key => $service){
					echo output_service_style3($service);
		} ?>
    </div>
    </div>
    </div>
        <!--<li>
<div class="name-price-desc for-style-3">	
	<h3 class="head-title tab-links_spl head_title_style_3"><?php echo html_entity_decode($cat['name']); ?></h3>
	 <?php if($cat['description']){ ?>
	<div class="cat_descreption row"><div class="style3_cat_desc"><?php echo html_entity_decode($cat['description']); ?></div></div>
	<?php } ?>
	<?php 
		foreach ($services as $key => $service){
					echo output_service_style3($service);
		} ?>
    </div>  
    </li>-->
	<?php
    } ?>
    </div>
	</div>
	
    <?php }//end get_id_name() 
}

/**********End Function for Third style*****************/

/**********Start Function For 4 style col 1*******************/
if(!function_exists('output_tab_contents_fourth_style_col1')){
    function output_tab_contents_fourth_style_col1($cats, $default, $shortcode_id){
		?>
		<!---row masonry -->
		<ul id="tiles">
		<?php
    foreach ($cats as $key => $cat){
		$services=$cat['services'];
	?>
	 
        <!-- These are our grid blocks -->
   <li>
<div class="name-price-desc for-style-4 style-4-half"><span class="head-title tab-links_spl head_title_style_3 spl_cat_heading_style_4"><?php echo html_entity_decode($cat['name']); ?></span><?php if($cat['description']){ ?><div class="cat_descreption row"><div class="style4_cat_desc"><?php echo html_entity_decode($cat['description']); ?></div></div>
<?php } ?><?php foreach ($services as $key => $service){echo output_service_style4_col1($service); } ?></div></li><?php } ?></ul>
	
    <?php }//end get_id_name() 
}
/**********End Function For 4 style col 1*********************/


/**********Start Function For 4 style*******************/
if(!function_exists('output_tab_contents_fourth_style')){
    function output_tab_contents_fourth_style($cats, $default, $shortcode_id){
		?>
		<!---row masonry -->
		<ul id="tiles">
		<?php
    foreach ($cats as $key => $cat){
		$services=$cat['services'];
	?>
	 
        <!-- These are our grid blocks -->
   <li>
<div class="name-price-desc for-style-4 style-4-half"><span class="head-title tab-links_spl head_title_style_3 spl_cat_heading_style_4"><?php echo html_entity_decode($cat['name']); ?></span><?php if($cat['description']){ ?><div class="cat_descreption row"><div class="style4_cat_desc"><?php echo html_entity_decode($cat['description']); ?></div></div>
<?php } ?><?php foreach ($services as $key => $service){echo output_service_style4($service); } ?></div></li><?php } ?></ul>
	
    <?php }//end get_id_name() 
}
/**********End Function For 4 style*********************/

/**********Function for 4 style break service col 1************/
if(!function_exists('output_tab_contents_4_style_break_col1')){
    function output_tab_contents_4_style_break_col1($cats, $default, $shortcode_id){
    foreach ($cats as $key => $cat){
		$services=$cat['services'];
	?>	
	<span class="head-title tab-links_spl"><?php echo html_entity_decode($cat['name']); ?></span>
	<?php if($cat['description']){ ?>
	<div class="cat_descreption row"><div class="col-sm-6"><?php echo html_entity_decode($cat['description']); ?></div></div>
	<?php } ?>
	<div class="row">
	<?php 
		foreach ($services as $key => $service){
					echo output_service_break_col1($service);
		} ?>
    </div>    		
	<?php
    } ?>
    <?php }//end get_id_name() 
}
/**********End Function for 4 style break service col 1************/

/**********Function for 4 style break service************/
if(!function_exists('output_tab_contents_4_style_break')){
    function output_tab_contents_4_style_break($cats, $default, $shortcode_id){
    foreach ($cats as $key => $cat){
		$services=$cat['services'];
	?>	
	<span class="head-title tab-links_spl"><?php echo html_entity_decode($cat['name']); ?></span>
	<?php if($cat['description']){ ?>
	<div class="cat_descreption row"><div class="col-sm-6"><?php echo html_entity_decode($cat['description']); ?></div></div>
	<?php } ?>
	<div class="row">
	<?php 
		foreach ($services as $key => $service){
					echo output_service_break($service);
		} ?>
    </div>    		
	<?php
    } ?>
    <?php }//end get_id_name() 
}
/**********End Function for 4 style break service************/
?>
<?php
if($style == 'style_6'){
    $max_width = '1200px';
}
if($style == 'with_tab'){
    $max_width = '1200px';
}
 if($style=='with_tab' || $style=='' || $style == 'style_6'){ ?>
<div class="body-inner container-fluid price_wrapper pull-left col-md-12 spl_main_content_box" id="spl_<?php echo $id; ?>" style="max-width:<?php echo isset($max_width) ? $max_width : ''; ?>;margin-left:auto;margin-right:auto; ">
    <?php if (!empty($service['service_button'])) { ?>
    <div class="head-title">
      <span class="with_tab_style1"><?php if($spl_remove_title != 1){echo $list_name; } ?></span>
    </div>
	<?php if($price_list_desc!=''){?>
	<div class="col-sm-8 col-sm-offset-2 desc_price_list"><?php echo preg_replace('/[\n\r]/','<br />',str_replace('\"','"',str_replace("\'","'",stripslashes($price_list_desc)))); ?></div>
	<?php } ?>
    <div class="tabs_spl">
       <!-- Nav tabs -->
       
         <ul class="tab-links_spl with_tab_tablink_style1" >
         <?php if($all_tab!='' && $toggle_all_tab==1){
						
			 ?>
             <li class="<?php echo ($default) ? '' : 'active';?>">
			
                 <a href="#all_<?php echo $id; ?>"><?php echo $all_tab; ?></a>
             </li>
			 
		 <?php }
               if($all_tab=='' && $toggle_all_tab==''){
						
			 ?>
             <li class="<?php echo ($default) ? '' : 'active';?>">
		 
                 <a href="#all_<?php echo $id; ?>">All</a>
             </li>
		 <?php } 		 
		 echo output_tabs($cats,$default,$id); ?>
         </ul>
     
   
       <!-- Tab panes -->
       <div class="tab-content1 <?php echo $select_column; ?>">
        <?php
        if($select_column == 'One'){
            if($style == 'style_6'){
                echo output_tab_contents_style6($cats, $default, $id); 
            }else{
                echo output_tab_contents_col1($cats, $default, $id);
            }  
        }else{
            if($style == 'style_6'){
                echo output_tab_contents_style6($cats, $default, $id); 
            }else{
                echo output_tab_contents($cats, $default, $id); 
            }
        
        }
        ?>
       </div>
   </div>   
   <?php }else{ ?>
   <div class="head-title">
      <span><?php if($spl_remove_title != 1){echo $list_name; } ?></span>
    </div>
	<?php if($price_list_desc!=''){?>
	<div class="col-sm-8 col-sm-offset-2 desc_price_list"><?php echo preg_replace('/[\n\r]/','<br />',str_replace('\"','"',str_replace("\'","'",stripslashes($price_list_desc)))); ?></div>
	<?php } ?>
    <div class="tabs_spl">
       <!-- Nav tabs -->
       
         <ul class="tab-links_spl" >
         <?php if($all_tab!='' && $toggle_all_tab==1){
						
			 ?>
             <li class="<?php echo ($default) ? '' : 'active';?>">
			
                 <a href="#all_<?php echo $id; ?>"><?php echo $all_tab; ?></a>
             </li>
			 
		 <?php }
               if($all_tab=='' && $toggle_all_tab==''){
						
			 ?>
             <li class="<?php echo ($default) ? '' : 'active';?>">
		 
                 <a href="#all_<?php echo $id; ?>">All</a>
             </li>
		 <?php } 		 
		 echo output_tabs($cats,$default,$id); ?>
         </ul>
     
   
       <!-- Tab panes -->
       <div class="tab-content1">
	   <?php
        if($select_column == 'One'){
            if($style == 'style_6'){
                echo output_tab_contents_style6($cats, $default, $id); 
            }else{
                echo output_tab_contents_col1($cats, $default, $id);
            }  
        }else{
            if($style == 'style_6'){
                echo output_tab_contents_style6($cats, $default, $id); 
            }else{
                echo output_tab_contents($cats, $default, $id); 
            }
        
        }
        ?>
       </div>
   </div>
   <?php } ?>
</div>
<?php }
 if($style=='without_tab'){ 
 ?>
<div class="body-inner container-fluid price_wrapper without_tab spl_main_content_box" id="spl_<?php echo $id; ?>" style="max-width:1200px;margin-left:auto;margin-right:auto;">
    <div class="head-title">
   <span class="spl_without_tab_style2"><?php if($spl_remove_title != 1){echo $list_name; } ?></span>
</div>
 <?php echo output_tab_contents_second_style($cats, $default, $shortcode_id); ?>
 </div>
<?php } 

// Start style 2(single column)
 if($style=='without_tab_single_column'){ 
 ?>
<div class="body-inner container-fluid price_wrapper without_tab spl_main_content_box" id="spl_<?php echo $id; ?>" style="max-width:1200px;margin-left:auto;margin-right:auto;">
    <div class="head-title">
   <span class="spl_without_tab_style2"><?php if($spl_remove_title != 1){echo $list_name; } ?></span>
</div>
 <?php echo output_tab_contents_second_style_single_column($cats, $default, $shortcode_id); ?>
 </div>
<?php }
// End style 2(single column)

// Start style 3 design////
if($style=='style_3'){ ?>
<div class="body-inner container-fluid price_wrapper spl_main_content_box" id="spl_<?php echo $id; ?>" style="max-width:1200px;margin-left:auto;margin-right:auto;">
<div class="head-title">
      <span><?php if($spl_remove_title != 1){echo $list_name; } ?></span>
</div>
<?php if($price_list_desc!=''){?>
	<div class="col-sm-8 col-sm-offset-2 desc_price_list"><?php echo preg_replace('/[\n\r]/','<br />',str_replace('\"','"',str_replace("\'","'",stripslashes($price_list_desc)))); ?></div>
	<?php } ?>
<?php

if($select_column == 'Two'){
  echo output_tab_contents_third_style_col2($cats, $default, $shortcode_id);   
}elseif($select_column == 'One'){
    echo output_tab_contents_third_style_col1($cats, $default, $shortcode_id);
}else{
echo output_tab_contents_third_style($cats, $default, $shortcode_id); 
}

?>
</div>
<?php }
// End style 3 design////


//Start style 4 design////
if($style=='style_4'){ 
if($select_column == 'One'){
    $style_4_col1 = "style_4_col_1";
}
?>
<div class="body-inner container-fluid price_wrapper spl_main_content_box custom-style-4 <?php echo isset($style_4_col1) ? $style_4_col1 : ''; ?>" id="spl_<?php echo $id; ?>" style="max-width:1200px;margin-left:auto;margin-right:auto;">
<div class="head-title">
      <span><?php if($spl_remove_title != 1){echo $list_name; } ?></span>
</div>

      <?php 
           if($brack_title_desktop=='' && $brack_title_tablets==''){
               if($select_column == 'One'){
                   echo output_tab_contents_fourth_style_col1($cats, $default, $shortcode_id);
               }else{
                   echo output_tab_contents_fourth_style($cats, $default, $shortcode_id);
               }
           }
           if($brack_title_desktop==1 && $brack_title_tablets==1){
               if($select_column == 'One'){
                   echo output_tab_contents_4_style_break_col1($cats, $default, $shortcode_id);
               }else{
                   echo output_tab_contents_4_style_break($cats, $default, $shortcode_id);
               }
           }
 
           if($brack_title_desktop==1 && $brack_title_tablets==''){ ?>
           <div class="brack_title_desktop"><?php
           if($select_column == 'One'){
           echo output_tab_contents_4_style_break_col1($cats, $default, $shortcode_id);    
           }else{
           echo output_tab_contents_4_style_break($cats, $default, $shortcode_id); 
           }
           ?></div>
           <div class="brack_title_tablets"><?php
           if($select_column == 'One'){
            echo output_tab_contents_fourth_style_col1($cats, $default, $shortcode_id);   
           }else{
            echo output_tab_contents_fourth_style($cats, $default, $shortcode_id);   
           }
           ?></div>
               
          <?php  } 
           if($brack_title_desktop=='' && $brack_title_tablets==1){ ?>
           <div class="brack_title_desktop"><?php
           if($select_column == 'One'){
           echo output_tab_contents_4_style_break_col1($cats, $default, $shortcode_id);    
           }else{
           echo output_tab_contents_4_style_break($cats, $default, $shortcode_id); 
           }
           ?></div>
           <div class="brack_title_tablets"><?php
           if($select_column == 'One'){
            echo output_tab_contents_fourth_style_col1($cats, $default, $shortcode_id);   
           }else{
            echo output_tab_contents_fourth_style($cats, $default, $shortcode_id);   
           }
           ?></div>
               
          <?php  }
          ?>
 </div>
<!----/// MAIN CONTAINER SECTION END --->
<?php }

if($style=='style_5'){ ?> 
<div class="body-inner container-fluid price_wrapper pull-left col-md-12 spl_main_content_box" id="spl_<?php echo $id; ?>" style="max-width:1200px;margin-left:auto;margin-right:auto; ">
    <div class="row style-five-head">
<?php if($style5_category === 'style5_category_2') { ?>
        <div class="col-md-12 col-lg-12">
                <div class="head-title" style="margin:auto">
                <span><?php if($spl_remove_title != 1){echo $list_name; } ?></span>
                </div>
                <?php if($price_list_desc!=''){?>
                    <div class="col-sm-12 desc_price_list"><?php echo preg_replace('/[\n\r]/','<br />',str_replace('\"','"',str_replace("\'","'",stripslashes($price_list_desc)))); ?></div>
                <?php } ?>
        </div>
        <div class="col-md-12 col-lg-12 style5_cat_tab_2 tabs_spl"  >
        <!-- Nav tabs -->
            <ul class="tab-links_spl" style="margin:auto; text-align:center !important; margin-bottom: 30px;">
            <?php if($all_tab!='' && $toggle_all_tab==1){
                            
                ?>
                <li class="<?php echo ($default) ? '' : 'active';?>">
                
                    <a href="#all_<?php echo $id; ?>"><?php echo $all_tab; ?></a>
                </li>
                
            <?php }
                if($all_tab=='' && $toggle_all_tab==''){
                            
                ?>
                <li class="<?php echo ($default) ? '' : 'active';?>">
            
                    <a href="#all_<?php echo $id; ?>">All</a>
                </li>
            <?php } 		 
            echo output_tabs_style5($cats,$default,$id); ?>
            </ul>
        </div>
        </div>

<?php }else{ ?>     
        <div class="col-md-3 col-lg-3">
                <div class="head-title">
                  <span><?php if($spl_remove_title != 1){echo $list_name; } ?></span>
                </div>
                <?php if($price_list_desc!=''){?>
            	    <div class="col-sm-12 desc_price_list"><?php echo preg_replace('/[\n\r]/','<br />',str_replace('\"','"',str_replace("\'","'",stripslashes($price_list_desc)))); ?></div>
            	<?php } ?>
        </div>
        <div class="col-md-9 col-lg-9 style5_cat_tab tabs_spl">
           <!-- Nav tabs -->
             <ul class="tab-links_spl" >
             <?php if($all_tab!='' && $toggle_all_tab==1){
    						
    			 ?>
                 <li class="<?php echo ($default) ? '' : 'active';?>">
    			
                     <a href="#all_<?php echo $id; ?>"><?php echo $all_tab; ?></a>
                 </li>
    			 
    		 <?php }
                   if($all_tab=='' && $toggle_all_tab==''){
    						
    			 ?>
                 <li class="<?php echo ($default) ? '' : 'active';?>">
    		 
                     <a href="#all_<?php echo $id; ?>">All</a>
                 </li>
    		 <?php } 		 
    		 echo output_tabs_style5($cats,$default,$id); ?>
             </ul>
        </div>
     </div>
<?php } ?>
     <div class="row">
        <div class="col-md-12 col-lg-12 style5_cat_tab tabs_spl">   
           <!-- Tab panes -->
           <div class="tab-content1">
            <?php
            if($select_column == "One"){
             echo output_tab_contents_style5_col1($cats, $default, $id);   
            }else{
             echo output_tab_contents_style5($cats, $default, $id); 
            }
            ?>
           </div>
       </div>  
   </div>
</div>
<?php }
  

?>
<!--AK Style -->
<style type="text/css">
<?php 
  if((isset($select_column)) && ($select_column == "Select Column")){
      ?>
         .grid-sizer:nth-child(3n+1) {
                clear: both;
            }
      <?php
  }
  if((isset($select_column)) && ($select_column == "One")){
      ?>
         .grid-sizer:nth-child(2n+1) {
                clear: both;
            }
      <?php
  }
  if((isset($select_column)) && ($select_column == "Two")){
      ?>
         .grid-sizer:nth-child(2n+1) {
                clear: both;
            }
      <?php
  }
?>
<?php if(!empty($spl_container_max_width)): ?>
  .spl_main_content_box {
    max-width: <?php echo $spl_container_max_width; ?> !important;
    width: 100%;
    margin: 0px auto;
    display: block;
}
<?php endif; ?>
<?php if(!empty($service_size)): ?>
   #spl_<?php echo $id; ?>.price_wrapper .name.a-tag {
     font-size: <?php echo $service_size; ?> !important; 
   }
<?php endif;//end !empty($tab_size) ?>
<?php if(!empty($tab_size)): ?>
   #spl_<?php echo $id; ?>.price_wrapper ul.tab-links_spl, #spl_<?php echo $id; ?>.price_wrapper h3.tab-links_spl {
     font-size: <?php echo $tab_size; ?> !important;
   }
<?php endif;//end !empty($tab_size) ?>
<?php if(!empty($tab_size)): ?>
   #spl_<?php echo $id; ?>.price_wrapper ul.tab-links_spl li a, #spl_<?php echo $id; ?>.price_wrapper h3.tab-links_spl {
     font-size: <?php echo $tab_size; ?> !important;
     padding-right:5px!important;
     padding-left:5px!important;
     text-transform: none !important;	
	 letter-spacing: .15em;
   }
   #spl_<?php echo $id; ?>.price_wrapper .tabs_spl ul.tab-links_spl li:before{
       font-size: <?php echo $tab_size; ?> !important;
   }
<?php endif;//end !empty($tab_size) ?>
<?php if(!empty($title_size)): ?>
  #spl_<?php echo $id; ?>.price_wrapper .head-title span {
    font-size: <?php echo $title_size; ?> !important; 
	font-weight: <?php echo $title_font_weight; ?>;
  }
  .head-title span.spl_without_tab_style2 {
    font-size: <?php echo $title_size; ?> !important;  
	font-weight: <?php echo $title_font_weight; ?>;
  }
  <?php if($style == 'style_6'){ ?>
    ul.tab-links_spl.with_tab_tablink_style1 {
     padding: 0 !important;
    }
  <?php } ?>
 <?php endif;//end !empty($title_size) ?>
<?php if(!empty($title_font)): ?>
  #spl_<?php echo $id; ?>.price_wrapper .head-title span{
    font-family: "<?php echo $list_name_font; ?>" !important;
	font-weight: <?php echo $title_font_weight; ?>;
  }
  .head-title span.spl_without_tab_style2{
    font-family: "<?php echo $list_name_font; ?>" !important;
	font-weight: <?php echo $title_font_weight; ?>;
  }
<?php endif;//end !empty($list_name_font) ?>

<?php if(!empty($title_font)): ?>
  #spl_<?php echo $id; ?>.price_wrapper .tabs_spl .tab-links_spl li a, #spl_<?php echo $id; ?>.price_wrapper .style5_cat_tab .tabs_spl .tab-links_spl li a,
  #spl_<?php echo $id; ?>.price_wrapper .name-price-desc .spl-price.a-tag{
    font-family: "<?php echo $title_font; ?>" !important;
	/* padding-top: 5px; Test to remove Style 4 */
  }
<?php endif;//end !empty($title_font) ?>
/* start font weight css */
<?php if(!empty($tab_font_weight)):  ?>
  #spl_<?php echo $id; ?>.price_wrapper .tabs_spl .tab-links_spl li a, #spl_<?php echo $id; ?>.price_wrapper .style5_cat_tab .tabs_spl .tab-links_spl li a,
  #spl_<?php echo $id; ?>.price_wrapper .name-price-desc .spl-price.a-tag{
     font-weight: <?php echo $tab_font_weight ?>;
  }
<?php endif; ?>
/* end font weight css */
<?php if(!empty($price_font)): ?>
  #spl_<?php echo $id; ?>.price_wrapper .name-price-desc .spl-price.a-tag, #spl_<?php echo $id; ?>.price_wrapper .spl-style-5 .spl-price p {
    font-family: "<?php echo $price_font; ?>" !important;
  }
<?php endif;//end !empty($price_font) ?>

<?php if(!empty($desc_font)): ?>
  /*#spl_<?php //echo $id; ?>.price_wrapper .name-price-desc .desc.a-tag{
    font-family: "<?php //echo $desc_font; ?>" !important;
    font-size: 95%;
	font-weight: 400;
  }*/
  #spl_<?php echo $id; ?>.price_wrapper .spl-style-5 .name{
      font-family: "<?php echo $desc_font; ?>" !important;
  }
  #spl_<?php echo $id; ?>.price_wrapper .name-price-desc .name.a-tag{
    font-family: "<?php echo $desc_font; ?>" !important;
	font-weight: 500;
  }
<?php endif;//end !empty($title_font) ?>

/* start category dynamic font weight setting style 3 */
<?php if(!empty($tab_font_weight)): ?>
span.head-title.tab-links_spl, span.head-title.tab-links_spl.head_title_style_3{
        font-weight: <?php echo $tab_font_weight; ?> !important;
}
<?php endif; ?>
/* end category dynamic font weight setting style 3*/

/* start service dynamic font weight style 2*/
<?php if(!empty($service_font_weight)): ?>
     #spl_<?php echo $id; ?>.price_wrapper .name-price-desc .name.a-tag{
         font-weight: <?php echo $service_font_weight; ?>;
     }
<?php endif; ?>
/* end service dynamic font weight style 2*/

/* start service dynamic font weight */
<?php if(!empty($service_font_weight)): ?>
  #spl_<?php echo $id; ?>.price_wrapper .spl-style-5 .name{
      font-weight: <?php echo $service_font_weight; ?> !important;
  }
  <?php endif; ?>
/* end service dynamic font weight */

<?php if(!empty($service_description_font)): ?>
#spl_<?php echo $id; ?>.price_wrapper .name-price-desc .desc.a-tag, #spl_<?php echo $id; ?>.price_wrapper .spl-style-5 .desc{
    font-family: "<?php echo $service_description_font; ?>" !important;
    font-size: <?php echo $service_description_font_size; ?>;
    color: <?php echo $service_description_color; ?>;
    font-weight: 400; 
}
<?php endif;//end !empty($title_font) ?>

/* start service description dynamic font weight */
<?php if(!empty($description_font_weight)): ?>
#spl_<?php echo $id; ?>.price_wrapper .name-price-desc .desc.a-tag, #spl_<?php echo $id; ?>.price_wrapper .spl-style-5 .desc{
    font-weight: <?php echo $description_font_weight; ?> !important;
}
<?php endif; ?>
/* end service description dynamic font weight */

/*start category dynamic font size style 2*/
<?php if(!empty($tab_size)):
 if($style=='without_tab' || $style=='without_tab_single_column'): ?>
   #spl_<?php echo $id; ?> span.head-title.tab-links_spl.spl_cat_title_style_2{
	   font-size: <?php echo $tab_size; ?> !important;
   }
   <?php endif; endif; ?>
/* end category dynamic font size style 2 */

/* start category dynamic font weight style 2 */
<?php if(!empty($tab_font_weight)): ?>
#spl_<?php echo $id; ?>.price_wrapper span.tab-links_spl.spl_cat_title_style_2{
    font-weight:<?php echo $tab_font_weight; ?>;
}
<?php endif; ?>
/* end category dynamic font weight style 2 */

<?php if(!empty($title_color)): ?>
  #spl_<?php echo $id; ?>.price_wrapper .tabs_spl .tab-links_spl li a, #spl_<?php echo $id; ?>.price_wrapper span.tab-links_spl{
	  <?php if($style=='without_tab' || $style=='style_4' || $style=='without_tab_single_column'){ ?>
    color: <?php echo $title_color; ?> !important;
    font-family: "<?php echo $title_font; ?>" !important;
	  <?php } 
	  if(($style=='with_tab' || $style=='') && $style_cat_tab_btn==1){
	  ?>
	  color: #fff !important;
	  <?php } 
	  if(($style=='with_tab' || $style=='') && $style_cat_tab_btn==0){
	  ?>
          /* If Stylish Buttton is off */
	  color: <?php echo $title_color; ?>!important;
	  <?php }
		if($style=='style_3'){ ?>
		color: #fff !important;
		font-size: <?php echo $tab_size; ?> !important;
		<?php }
	  ?>
  }
   #spl_<?php echo $id; ?>.price_wrapper .name-price-desc .spl-price.a-tag{
         <?php if($style=='without_tab' || $style=='style_4'){ ?>
    color: <?php echo $title_color; ?> !important;
    font-family: "<?php echo $price_font; ?>" !important;
	  <?php } 
	  if(($style=='with_tab' || $style=='') && $style_cat_tab_btn==1){
	  ?>
	  color: #fff !important;
	  <?php } 
	  if(($style=='with_tab' || $style=='') && $style_cat_tab_btn==0){
	  ?>
          /* If Stylish Buttton is off */
	  color: <?php echo $title_color; ?>!important;
	  <?php }
		if($style=='style_3'){ ?>
		color: #fff !important;
		font-size: <?php echo $select_price; ?> !important;
		<?php }
	  ?>
   }
<?php endif;//end !empty($title_color) ?>

<?php if(!empty($service_color)): ?>
  #spl_<?php echo $id; ?>.price_wrapper .name-price-desc .name.a-tag, #spl_<?php echo $id; ?>.price_wrapper .name.a-tag{
    color: <?php echo $service_color; ?> !important;
  }
<?php endif;//end !empty($service_color) ?>

<?php if(!empty($price_color)): ?>
  #spl_<?php echo $id; ?>.price_wrapper .name-price-desc .spl-price.a-tag {
    color: <?php echo $price_color; ?> !important;
  }
  /*style 2 book now button color*/
  #spl_<?php echo $id; ?>.price_wrapper .spl_book_now_btn_style_1 {
    color: <?php echo $price_color; ?> !important;
    border: 1px solid <?php echo $price_color; ?> !important;
  }
  /*style 2 book now button color*/
  
  /*style 4 book now button color*/
  #spl_<?php echo $id; ?> .spl_cstm_btn_style4 .spl_book_now_btn_style_4 {
    color: <?php echo $price_color; ?> !important;
  }
  #spl_<?php echo $id; ?> .spl_category_brak_style4 .spl_book_now_btn_style_4 {
    color: <?php echo $price_color; ?> !important;
  }
  #spl_<?php echo $id; ?>.price_wrapper .spl-style-5 .spl-price p {
    background-color: <?php echo $price_color; ?> !important;
  }
  /* style 5 book now button */
  #spl_<?php echo $id; ?> .spl_book_now_btn_style_5 {
    color: <?php echo $price_color; ?> !important;
  }
<?php endif;//end !empty($price_color) ?>

<?php if(!empty($hover_color)): ?>
  #spl_<?php echo $id; ?>.price_wrapper .tabs_spl .tab-links_spl li a:hover{
    color: <?php echo $hover_color; ?> ;
    border-bottom: 1px solid <?php echo $hover_color; ?> ;
    text-decoration: none;
	padding-bottom: 7px;
  }
  #spl_<?php echo $id; ?>.price_wrapper .style-five-head .tabs_spl .tab-links_spl li a:hover{
    color: #fff !important;
    text-decoration: none !important;
  }
  #spl_<?php echo $id; ?>.price_wrapper .style-five-head .head-title span:hover{
      color: <?php echo $hover_color; ?> !important;
  }
   #spl_<?php echo $id; ?>.price_wrapper .style5_cat_tab ul.tab-links_spl li:hover{
       background-color: <?php echo $hover_color; ?> !important;
   }
  #spl_<?php echo $id; ?>.price_wrapper span.tab-links_spl:hover {
	  color: <?php echo $hover_color; ?> !important;
  }
  #spl_<?php echo $id; ?>.price_wrapper .tabs_spl ul.tab-links_spl li:before { color: <?php echo $hover_color; ?> !important; }

  #spl_<?php echo $id; ?>.price_wrapper .name-price-desc .spl-price.a-tag:hover, #spl_<?php echo $id; ?>.price_wrapper .name-price-desc .spl-price.a-tag:focus, #spl_<?php echo $id; ?>.price_wrapper .name.a-tag:hover, 
  #spl_<?php echo $id; ?>.price_wrapper .name-price-desc .name.a-tag:hover, #spl_<?php echo $id; ?>.price_wrapper .name-price-desc .name.a-tag:focus {
    color: <?php echo $hover_color; ?> !important; 
  }
  #spl_<?php echo $id; ?>.price_wrapper ul.tab-links_spl li.active a {
    border-bottom: 1px solid <?php echo $hover_color; ?> !important;
    color: <?php echo $hover_color; ?> !important;
	padding-bottom:5px;
  }
  #spl_<?php echo $id; ?>.price_wrapper .style5_cat_tab ul.tab-links_spl li.active{
      background-color:<?php echo $hover_color; ?> !important;
  }
  #spl_<?php echo $id; ?>.price_wrapper .style5_cat_tab ul.tab-links_spl li.active a {
    color: #fff !important;
  }
<?php endif;//end !empty($hover_color) ?>
<?php if(!empty($default_tab_size)):?>
    #spl_<?php echo $id; ?>.price_wrapper .tabs_spl .tab-links_spl li.active.default {
        line-height: <?php echo $default_tab_size; ?> !important;
    }
    #spl_<?php echo $id; ?>.price_wrapper .tabs_spl .tab-links_spl li.default a {
        line-height:  <?php echo $default_tab_size; ?> !important;
        font-size: <?php echo $default_tab_size; ?> !important;
    }
<?php endif;//end !empty($default)?>
<?php if(!empty($service_color)):?>
    /*.price_wrapper .desc.a-tag {
        color: <?php echo $service_color; ?> !important;
     }*/
<?php endif;// end !empty($service_color)?>
<?php if(!empty($title_color_top)):?>
    #spl_<?php echo $id; ?>.price_wrapper .head-title span  {
        color: <?php echo $title_color_top; ?> !important;
     }
   .head-title span.spl_without_tab_style2  {
        color: <?php echo $title_color_top; ?> !important;
     }  
<?php endif;// end !empty($title_color_top)?>
<?php if(!empty($select_price)):?>
#spl_<?php echo $id; ?>.price_wrapper .spl-price.a-tag, #spl_<?php echo $id; ?>.price_wrapper .spl-style-5 .spl-price p {
    font-size: <?php echo $select_price; ?> !important;

}
<?php endif;//!empty($title_color_top)?>
/* start service price dynmaic font weight setting */
<?php if(!empty($service_price_font_weight)):?>
#spl_<?php echo $id; ?>.price_wrapper .spl-price.a-tag, #spl_<?php echo $id; ?>.price_wrapper .spl-style-5 .spl-price p {
    font-weight: <?php echo $service_price_font_weight; ?> !important;
}
<?php endif; ?>
/* end service price dynamic font weight setting */
<?php if($toggle==1):?>
#spl_<?php echo $id; ?>.price_wrapper .tabs_spl ul.tab-links_spl li:before {
    font-family: FontAwesome !important;
    font-weight: normal !important;
    font-style: normal !important;
    display: inline-block !important;
    text-decoration: inherit !important;
    content: "\F105" !important;
    position: absolute !important;
    left: -5px !important;
}
<?php endif;//($toggle==1)?>
<?php if($toggle==0 || $toggle=''):?>
#spl_<?php echo $id; ?>.price_wrapper .tabs_spl ul.tab-links_spl li:before {
    font-family: FontAwesome !important;
    font-weight: normal !important;
    font-style: normal !important;
    display: inline-block !important;
    text-decoration: inherit !important;
    /*content: "\F105" !important;*/
    position: absolute !important;
    left: 0 !important;
}
<?php endif;//($toggle==1)?>
#spl_<?php echo $id; ?>.price_wrapper .tabs_spl .tab-links_spl li.active a {
    <?php if(($style=='with_tab') && $style_cat_tab_btn==1 ){ ?>
    font-weight: bold !important;
    color: #fff !important;
    <?php } ?>
}

.custom-description-section {
    text-align: center;
    padding-bottom:30px;
    color:  <?php echo isset($tab_description_color) ? $tab_description_color : '#999' ?>;
    font-family:  <?php echo $tab_description_font ?>;
    font-size:  <?php echo $tab_description_font_size ?>;
    font-weight:  <?php echo $tab_description_font_weight ?>;
}
.without_tab {
    clear: both;
    padding-top: 20px;
}
h3.head-title {
    margin: 15px 0px;
}

#spl_<?php echo $id; ?>.price_wrapper ul.tab-links_spl li{
	padding: 2px 5px !important;
}

/******************* IF STYLE=1 and Stylish Button = On ********/
#spl_<?php echo $id; ?>.price_wrapper ul.tab-links_spl li a{
	<?php if(($style ==='with_tab') && $style_cat_tab_btn == 1 ){ ?>  
	background-color: <?php echo $title_color; ?> !important ;
    padding: 3px 15px!important;
    font-size: 16px;
    border-radius: 5px !important;
	<?php } ?>
}
#spl_<?php echo $id; ?>.price_wrapper .style5_cat_tab ul.tab-links_spl li{
	background-color: <?php echo $title_color; ?> !important ;
    padding: 8px 22px !important;
}
#spl_<?php echo $id; ?>.price_wrapper .style5_cat_tab ul.tab-links_spl li:before {
    display: none !important;
}
#spl_<?php echo $id; ?>.price_wrapper .for-style-3 span.head_title_style_3 {
	<?php if($style=='style_3'){ ?>
    background-color: <?php echo $title_color_top; ?> !important ;
    color: <?php echo $title_color; ?> !important ;
    border-radius: 8px 11px 0px 0px !important;
    padding: 12px !important;
    margin-top: 0px !important;
    text-align: center;
    display: block;
    font-family: "<?php echo $title_font; ?>" !important;
    font-weight: <?php echo $tab_font_weight; ?>;
	<?php } ?>
}
/*Book now button style 3*/
#spl_<?php echo $id; ?> .spl_book_now_btn_style_3{
    background-color: <?php echo $price_color; ?> !important ;
    color: #ffffff!important ;
}
<?php if($style=='style_4'){ ?>
ul#tiles_<?php echo $id; ?> {
    height: inherit !important;
}
<?php } ?>
/*
Style 
*/

#tiles_<?php echo $id; ?> {
    list-style-type: none;
    position: relative;
    margin: 0;
}

#tiles_<?php echo $id; ?> li {
    width: 350px;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    <!---display: none;-->
    cursor: pointer;
    padding: 4px;
}
#tiles_<?php echo $id; ?> ali:nth-child(3n) {
    height: 175px;
}

#tiles_<?php echo $id; ?> ali:nth-child(4n-3) {
    padding-bottom: 30px;
}

#tiles_<?php echo $id; ?> ali:nth-child(5n) {
    height: 250px;
}
#main_<?php echo $id; ?> {
    padding: 30px 0 30px 0;
}

#main_<?php echo $id; ?> {
    padding: 30px 0 30px 0;
   
}
.masonary-section ul {
    padding-left: 0px !important;
}
.masonary-section ul {
    margin: 0px !important;
}
#tiles_<?php echo $id; ?> li {
    margin: 0 auto !important;
    left: list;
    list-style-type: none;
}
@media screen and (max-width: 600px){
.masonry {
    -moz-column-count: 1;
    -webkit-column-count: 1;
    column-count: 1;
}
#tiles_<?php echo $id; ?> li {
    left: -26px!important;
}
}

</style>

  <!-- Include the plug-in -->
  
  <?php $url = plugins_url();  ?>
  <script src= "<?php echo $url; ?>/stylish-price-list/assets/js/jquery.wookmark.js"></script>
  
  <script type="text/javascript">
jQuery(document).ready(new function() {
      var width= jQuery( window ).width(); 
      if(width > 1024){ 
          jQuery('.brack_title_tablets').remove();
      }else{
          jQuery('.brack_title_desktop').remove();
      }
      
      if(width > 1024){ 
          jQuery('.brack_title_tablets_tab').remove();
      }else{
          jQuery('.brack_title_desktop_tab').remove();
      }
    /// Resize 

    
     var shortcodeid= "_<?php echo $id; ?>";
     jQuery('#tiles'+shortcodeid+' li').wookmark({
        autoResize: true, 
        container: jQuery('#tiles'+shortcodeid),
        offset: 2, 
        itemWidth: 360 ,
        flexibleWidth: '50%'
      });
      
       jQuery(window).trigger('resize');
       
/*Fixed border line frontend*/
  
setTimeout(function(){
jQuery('.for-style-4 .internal-box').each(function(){
    
   var getLeftWidth = jQuery(this).children().children('.style-4-productName').width();
   var getRightWidth = jQuery(this).children().children('.style-4-productPrice').width();
   // Get Parent Height
   var getLeftHeight = jQuery(this).children().children('.style-4-productName').height();
   var getRightHeight = jQuery(this).children().children('.style-4-productPrice').height();
   var getParentHeight = jQuery(this).children('.content-section.name-price').height();
   jQuery(this).children().children('.style-4-border').css({left:getLeftWidth,right:getRightWidth});
 
   // Give Height 
   if(getLeftHeight > getRightHeight)
   {
       console.log('Left Height is Long');
      // jQuery(this).children().children('.style-4-productName').css('height',getLeftHeight);
     //  jQuery(this).children().children('.style-4-productPrice').css('height',getLeftHeight);
   } else
   {
       console.log('Right Height is Long'); 
       //jQuery(this).children().children('.style-4-productName').css('height',getLeftHeight);
       //jQuery(this).children().children('.style-4-productPrice').css('height',getLeftHeight);
   }
   
    // jQuery(this).children().children('.style-4-border').css('margin-top',(getParentHeight/2)+2);
   
});
  jQuery('span.style-4-border').show();
 }, 1000);

/*Fixed border line frontend End */
}); 
 </script>
		
<!--AK Style -->


