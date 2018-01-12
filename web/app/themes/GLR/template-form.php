<?php
/**
 * GLR
 *
 * Template Name: Form
 */

get_header();
the_post();
?>

<!-- MASTHEAD -->
<?php get_template_part('masthead') ?>

<!-- CONTENT -->
<section id="content" role="main">
<div class="row wrapper">
	<!-- Page -->
	<div id="page" class="col s12" itemprop="MainContentOfPage">
		<div class="center-align">
			<img src="<?=assetDir?>/img/contact.png" />
			
			<h2>Contact Us</h2>
			<p class="skinny">Our Mission is the most important thing. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et</p>

			<form class="wrapper skinny">
                <div class="row">
                    <div class="col s12">
                        <input type="text" placeholder="First Name" />
                    </div>

                    <div class="col s12">
                        <input type="text" placeholder="Last Name" />
                    </div>
                    
                    <div class="col s12">
                        <input type="email" placeholder="Email Address" />
                    </div>

                    <div class="col s8">
                        <input type="text" placeholder="Credit Card Number" />
                    </div>
                    <div class="col s4">
                        <input type="text" placeholder="CCV" />
                    </div>

                    <div class="col s6">
                        <input type="text" placeholder="MM/YY" />
                    </div>
                    <div class="col s6">
                        <input type="text" placeholder="Zip Code" />
                    </div>

                    <div class="col s12">
                        <input type="text" placeholder="$ Donation Amount" />
                    </div>
                </div>


                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae soluta, animi placeat temporibus ducimus molestias corrupti explicabo odio est reprehenderit id magni quo eligendi eos cum officiis ex non labore!</p>

                <button type="submit" class="btn blue">Submit</button>
            </form>
		</div>
	</div>
</div>
</section>

<?php get_footer() ?>