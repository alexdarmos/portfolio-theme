<?php
$block_data = $args['data'][0];
$image = $block_data['pre_footer_section_image'];
$text = $block_data['pre_footer_text'];
$buttons_arr = $block_data['pre_footer_buttons'];
//var_dump($block_data[0]['pre_footer_section_image']);
if( $block_data ) : ?>
<section id="pre-footer" class="bg-black">
    <div class="wrapper">
        <div class="col flex-row space-between">
            <div class="col-60">
                <?php echo $text;
                if( $buttons_arr ) {
                    echo '<div class="button-wrapper">';
                    foreach( $buttons_arr as $button ) {
                        echo '<a href="' . $button['button_title_link']['url'] . '" class="button">' . $button['button_title_link']['title'] . '</a>';
                    }
                    echo '</div>';
                }
                ?>
            </div>
            <div class="col-40">
                <div class="img-shadow-wrapper">
                    <?php echo wp_get_attachment_image( $image['id'], 'full', false, ['class' => 'pre-footer-img'] ); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>