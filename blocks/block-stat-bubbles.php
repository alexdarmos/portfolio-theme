<?php 
$stats_arr = $args['data'][0];
if( $stats_arr ) : ?>
    <div class="stats-wrapper">
        <?php foreach( $stats_arr as $stat ) : ?>
            <div class="stat">
                <p class="stat-number"><?php echo $stat['number']; ?>+</p>
                <p class="stat-description"><?php echo $stat['text']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>