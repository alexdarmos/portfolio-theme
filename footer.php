<?php
/**
 * Theme footer
 *
 * @package Portfolio
 * @author Alex Darmos
**/

$email = get_field('email', 'option');
$phone = get_field('phone', 'option');
$linkedin = get_field('linkedin', 'option');
$github = get_field('github', 'option');
$upwork = get_field('upwork', 'option');
$signature = get_field('site_tag', 'option');

?>
<footer>
    <div class="wrapper">
        <div class="contact-wrapper">
            <?php 
            
            if( $email ) {
                echo '<a title="email me" href="mailto:' . $email . '" class="contact contact-email"></a>';
            } 

            if( $phone ) {
                echo '<a title="call me" target="_blank" href="tel:' . $phone . '" class="contact contact-phone">' . $phone . '</a>';
            }

            if( $linkedin ) {
                echo '<a title="view my linkedin" target="_blank" href="' . $linkedin . '" class="contact contact-linkedin"></a>';
            }

            if( $github ) {
                echo '<a title="view my github" target="_blank" href="' . $github . '" class="contact contact-github"></a>';
            }
            
            if( $upwork ) {
                echo '<a title="view my upwork" target="_blank" href="' . $upwork . '" class="contact contact-upwork"></a>';
            }
            ?>
        </div>
        <div class="signature-wrapper">
            <p class="copyright">Copyright &copy; <?php echo date('Y'); ?>. All rights reserved.</p>
            <p class="signature"><?php echo $signature; ?></p>
        </div>
    </div>
</footer>



<?php wp_footer(); ?>
</body>
</html>


