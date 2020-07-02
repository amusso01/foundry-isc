<?php
/**
 * Requires ACF Version 5.8+
 *
 * @author      Andrea Musso
 *
 *
 */



 /*==================================================================================
   Hero, Preset ACF Gutenberg Block
 ==================================================================================*/

 /* Register ACF Block
 /––––––––––––––––––––––––*/
 if( function_exists('acf_register_block') ) {

 	$result = acf_register_block(array(
 		'name'				     => 'fd_quote',
 		'title'				     => __('Article Quote'),
 		'description'		   => __('Custom quote'),
 		'render_callback'	 => 'foundry_gutenblock_quote',
 		'category'		     => 'fd-category', // common, formatting, layout, widgets, embed
 		'icon' => array(
            // Specifying a background color to appear with the icon e.g.: in the inserter.
            'background' => '#fff ',
            // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
            'foreground' => '#09bfa1',
            // Specifying a dashicon for the block
            'src' => 'format-quote',
            'mode'              => 'edit',
            'align'             => 'full',
            ),
        'mode'              => 'edit',
 		'keywords'		     => ['fd', 'quote', "cite"]
 	));
 }

 /* Render Block
 /––––––––––––––––––––––––*/
 function foundry_gutenblock_quote() {

 	// Get Vars
    $quote = get_field('quote');


    // Option vars
    $color = get_field('quote_color');


    // Return HTML
    ?>
     <section class="block-quote" >
        <div class=" block-quote__linea " style=" background-color:<?php echo $color; ?>"></div>
        <div class="block-quote__body">
            <div class="block-quote__body-svg">
            <svg id="Group_164" data-name="Group 164" xmlns="http://www.w3.org/2000/svg" width="35.944" height="26.982" viewBox="0 0 35.944 26.982">
                <path id="Path_158" data-name="Path 158" d="M-290.722,217.185h14.835c.06.107.1.149.1.19-.025,4.188.187,8.4-.137,12.56-.526,6.75-4.342,11.147-10.63,13.461-.837.308-1.713.505-2.628.771l-1.543-3.173v-.15a6.1,6.1,0,0,0,.891-.337,9.9,9.9,0,0,0,4.95-6.93c.093-.445.108-.907.165-1.417h-6.006Z" transform="translate(290.722 -217.185)" fill="<?php echo $color ?>"/>
                <path id="Path_159" data-name="Path 159" d="M-256.835,244.154l-1.458-3.167a10.225,10.225,0,0,0,6-8.78h-5.967V217.257h14.849c.017.172.051.361.051.55,0,3.492.019,6.985,0,10.478a15.38,15.38,0,0,1-4.5,11.291A17.211,17.211,0,0,1-256.835,244.154Z" transform="translate(279.292 -217.21)" fill="<?php echo $color ?>"/>
            </svg>
            </div>

            <div class="block-quote__body-quote">
                <p><?php echo $quote; ?></p>
            </div>
        </div>
     </section>
<?php
 }