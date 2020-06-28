<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 footer-demo-section">
			<?php 
			$opt=get_option('spllk_opt'); 
			if(empty($opt)){
				echo '<p class="free_version">You are using the <span class="highlighted">Demo</span> version of the plugin. Click <span class="highlighted"><a href="https://stylishpricelist.com/">here</a></span> to buy the pro version.</p>'; 
			}
			?>
		</div>
	</div>
	<!--<div class="row">-->
		<!--    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 footer-logo-section">--> 
			<!--         <div class="inner-footer-logo-section">  -->
				<!--       <h4>Designed by</h4>-->
				<!--       <a href="http://designful.ca/apps/stylish-price-list-wordpress/" class="spl-footer logo">-->
					<!--            <img src="<?php echo SPL_URL . '/assets/images/logo.png'; ?>" class="img-responsive1" alt="Image" >-->
					<!--       	</a>-->
					<!--       	</div>-->
					<!--    </div>-->
					<!--</div>-->
					<div class="price_wrapper ">
						<div class="row">
							<div class="foot-img-li">

								<div class="col-md-1  design-1">
									<ul class="foot-li">
										<a href="https://www.stylishpricelist.com" class="spl-footer logo">
											<img src="<?php echo SPL_URL . '/assets/images/logo.png'; ?>" class="img-responsive" alt="Image" >
										</a>
									</ul>

								</div>
								<div class="col-md-6 ">
													<div class="foot-url" style="font-size:24px;margin-top:20px">
														<span class="col-me"><a href="https://designful.freshdesk.com/en/support/solutions/folders/48000670844" target="_blank" style="text-decoration: none!important;">User Guides</a></span>
														<span> | </span>
														<span class="col-me" ><a style="text-decoration: none!important;" href="https://designful.freshdesk.com/en/support/solutions/folders/48000670795" target="_blank">FAQs</a></span>
														<span> | </span>
														<span><a href="https://stylishpricelist.com/support/" target="_blank" style="text-decoration: none!important;">Contact Support</a></span>

													</div>
								</div>
								<div class="col-md-2 ">
									<p class="foot-social">
										<a href="https://www.facebook.com/designful"><i class="fa fa-facebook" aria-hidden="true"></i></a>
										<!--<a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a>-->
										<a href="https://www.pinterest.ca/designfulottawa/"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
										<a href="https://www.youtube.com/channel/UCBxQi0FIA-QkYgawE2I5G6Q"><i class="fa fa-youtube" aria-hidden="true"></i></a></p>
									</div>
									<div class="col-md-3">
										<div class="foot-text-img">
											<p>Our other WP <a class="plugin_text">plugins</a></p>
											<p><span><a href="https://www.stylishcostcalculator.com"><img src="<?php echo SPL_URL . '/assets/images/one1.png'; ?>" class="img-responsive1" alt="Image"></a>
												<a href="https://designful.ca/apps/stylish-business-hours"><img src="<?php echo SPL_URL . '/assets/images/two2.png'; ?>" class="img-responsive1" alt="Image"></a></span></p>
											</div>
										</div>

									</div>
								</div>
								<!--- MODAL POPUP ----->       
								<div class="modal fade" id="sell1" data-target="with_tab">
									<div class="modal-dialog">
										<div class="scc-modal-content">
											<div class="modal-header orange">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
												</button>

												<img src="<?php echo SPL_URL . '/assets/images/Style1.png' ; ?>" alt="some image" />
											</div>
										</div>
									</div>
								</div>
								<div class="modal fade" id="sell2" data-target="without_tab">
									<div class="modal-dialog">
										<div class="scc-modal-content">
											<div class="modal-header orange">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
												</button>

												<img src="<?php echo SPL_URL . '/assets/images/Style2.png' ;?>" alt="some image" />
											</div>
										</div>
									</div>
								</div>
								<div class="modal fade" id="sell3" data-target="style_3">
									<div class="modal-dialog">
										<div class="scc-modal-content">
											<div class="modal-header orange">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
												</button>

												<img src="<?php echo SPL_URL . '/assets/images/Style3.png' ;?>" alt="some image" />
											</div>
										</div>
									</div>
								</div>
								<div class="modal fade" id="sell4" data-target="style_4">
									<div class="modal-dialog">
										<div class="scc-modal-content">
											<div class="modal-header orange">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
												</button>

												<img src="<?php echo SPL_URL . '/assets/images/Style4.png' ;?>" alt="some image" />
											</div>
										</div>
									</div>
								</div>
								<div class="modal fade" id="sell5" data-target="style_5">
									<div class="modal-dialog">
										<div class="scc-modal-content">
											<div class="modal-header orange">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
												</button>

												<img src="<?php echo SPL_URL . '/assets/images/Style5.png' ;?>" alt="some image" />
											</div>
										</div>
									</div>
								</div>
								<!--- END MODAL POPUP ---->
								<!-- The Modal Videos Tutorials-->
								<div id="myModalVideos" class="modalvideos" style="display:none;">
									<div class="scc-modal-content-videos">
										<span class="closevideo">&times;</span>
										<p>
											<div style="padding-top:15px;text-align:center;font-size:40px;font-weight:bold;color:#314af3!important;">Video Tutorial</div>
											<div style="padding-top:20px;text-align:center;font-size:20px;color:#484848;">How to use Stylish Price List</div>
										</p>
										<!--<br><hr><br>-->
										<p>
											<div class="spl_video_tutorial" style="text-align: center;">
												<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="100%" max-width="1120" height="630" type="text/html" src="https://www.youtube.com/embed/tq8SE1HC7g0?autoplay=0&fs=1&iv_load_policy=3&show@=0&rel=0&cc_load_policy=0&start=0&end=0&vq=hd1080&origin=https://youtubeembedcode.com"></iframe>
											</div>
										</p>
									</div>
								</div>
								<!-- End of Modal Video Tutorials -->
								<!-- The Modal Contact Support-->
								<div id="myModalSupport" class="modalsupport">
									<div class="scc-modal-content-support">
										<span class="closesupport">&times;</span>
										<div style="padding-top:20px;text-align:center;font-size:40px;font-weight:bold;color:#314af3!important;">Contact Support</div>
										<div style="padding-top:20px;text-align:center;font-size:20px;color:#484848;margin-bottom: 100px;">We're here to help!</div>
										<!--<br><hr><br>-->
										<p>
											<div style="text-align: center;">
												<div style="text-align: left;width:100%;max-width:700px;padding-bottom:20px;font-size:16px;">
													
													<div class="foot-url" style="font-size:24px;margin-top:20px">
														<span class="col-me"><a href="https://designful.freshdesk.com/en/support/solutions/folders/48000670844" target="_blank" style="text-decoration: none!important;">User Guides</a></span>
														<span> | </span>
														<span class="col-me" ><a style="text-decoration: none!important;" href="https://designful.freshdesk.com/en/support/solutions/folders/48000670795" target="_blank">FAQs</a></span>
														<span> | </span>
														<span><a href="https://stylishpricelist.com/support/" target="_blank" style="text-decoration: none!important;">Contact Support</a></span>

													</div>


												</div>
											</div>

											<div class="row" style="margin-top:10px;">
            <!---<div class="col-sm-4 col-md-3">
			<a href="https://www.facebook.com/designful/" target="_blank" class="button button-primary video_tutorial_btn">FaceBook Message</a>
		</div>--->
		<div class="col-sm-4 col-md-3">
	
		</div><Br>



	</div>

</p>
</div>
</div>
<!-- End of Modal Video Tutorials -->
<style type="text/css">
	.foot-url span a {
		background: black;
		padding: 3px 15px 3px 15px;
		color: white!important;
		font-color: white;
	}
	.spl-header{
		display: inline-block;
	}
	.spl-header.logo{
		position: relative;
		top: -20px;
	}
	img.img-responsive1 {
		max-width: 100%;
		height: auto;
	}
	.foot-img-li .col-md-5 .spl-footer, .foot-img-li .col-md-5 ul.foot-li, .foot-img-li .col-md-5 ul.foot-li li {
		display: inline-block;
	}
	.foot-img-li .spl-footer {
		width: 100%;
	}
	.foot-img-li .spl-footer{
		width:100%;
	}
	.foot-img-li {
		margin-top: 30px;
	}
	ul.foot-li{
		width:100%;
		float:left;
	}
	ul.foot-li li a {
		list-style-type: none;
		text-decoration: none;
		padding: 6px;
		font-size: 12px;
		color: #314af3;
	}
	ul.foot-li li{
		width:30%;
		float:left;
	}
	ul.foot-li li:after{
		content: "";
		width: 1px;
		height: 12px;
		background-color: #000;
		position: absolute;
		top: 16px;

	}
	ul.foot-li li:last-child:after{
		display:none;

	}
	.design, .design-2, .design-3{
		position:relative;

	}
	.foot-img-li .design:after, .design-2:after, .design-3:after {
		content: "";
		width: 2px;
		height: 65px;
		background-color: #9c9c9c;
		position: absolute;
		right: 3px;
		top: 0;
	}
	p.foot-social i.fa {
		width: 35px;
		font-size: 20px;
		color: #314af3;
	}
	.foot-text-img p span img {
		width: 100%;
	}
	.foot-text-img p span {
		display: inline-block;
		width: 100%;
		float: left;
	}
	.foot-url {
		text-align: center;
	}
	.foot-url p.col-me {
		color: #314af3;
	}
	.foot-url p {
		margin: 2px;
	}
	.foot-text-img a.plugin_text {
		font-size: 15px;
	}
	.foot-text-img p span img {
		width: 100px;
	}
	.price_wrapper {
		border-top: 1px solid #dcdcdc;
		margin-top: 50px;
		width: 100%;
		max-width: 98%;
	}
	.url-foot:after {
		content: "";
		width: 1px;
		height: 100px;
		background-color: #000;
		position: absolute;
		top: 0px;

	}
	.foot-text-img p {
		width: 100%;
		float: left;
		margin: 3px 0px;
		padding-left: 15px;
	}
			/*.foot-img-li a.spl-footer img {
			width: 100%;
			}*/
			.foot-img-li .foot-li {
				margin-top: 12px;
			}
			@media screen and (max-width:768px){
				.foot-img-li .col-md-1, .foot-img-li .design, .foot-img-li .design-2, .foot-img-li .design-3, .foot-img-li .col-md-3 {
					width: 100%;
					float: left;
				}
				.foot-img-li .spl-footer {
					width: 100%;
					float: left;
					max-width: 200px;
				}
				.foot-url {
					text-align: left;
					margin: 15px 0px;
				}
				.foot-text-img {
					width: 100%;
					float: left;
					margin-bottom: 16px;
				}
				.foot-text-img p {
					padding-left: 0px;
				}
				.foot-img-li .design:after, .design-2:after, .design-3:after{
					display:none;
				}
			}
			@media screen and (max-width:366px){
				ul.foot-li li {
					width: 100%;
					float: left;
				}
				ul.foot-li li:after {
					display:none;
				}
			}
		</style>			