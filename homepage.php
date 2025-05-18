<?php
/**
 * Template Name: Homepage
 */

get_header(); ?>

<section id="banner" class="bg-black">
    <div class="img-wrapper">
        <?php $banner_img = get_field('banner_bio_headshot_image'); 
        if( $banner_img ) { echo wp_get_attachment_image( $banner_img['id'], 'full', false, ['class' => 'banner-img'] ); }?>
    </div>
    <div class="copy-wrapper">
        <div class="col flex-row space-between">
            <!-- <div class="col-60"> -->
            <div class="col-100">
            <h1><?php the_field('banner_title'); ?></h1>
            <p class="typed-text"><?php the_field('intro_for_animated_text'); ?> 
            <?php if( have_rows('banner_type_animated_text') ) : ?>
                <?php while( have_rows('banner_type_animated_text') ) : the_row(); ?>
                <span class="animated-text" data-text="<?php the_sub_field('text'); ?>">
                </span>
                <?php endwhile; ?>
                <span class="visible-animated-text"></span>
            <?php endif; ?>
                <?php if( have_rows('banner_buttons') ) : ?>
                    <div class="button-wrapper">
                        <?php while( have_rows('banner_buttons') ) : the_row(); $button = get_sub_field('button_title_link'); ?>
                            <a target="<?php echo $button['target']; ?>" href="<?php echo $button['url'] ?>" class="button">
                                <?php echo $button['title']; ?>
                            </a>
                        <?php endwhile; ?>
                    </div>
                    <?php $top_anchor = get_field('page_anchor_link'); if( $top_anchor ) : ?>
                        <a href="<?php echo $top_anchor['url']; ?>"><?php echo $top_anchor['title']; ?></a>
                    <?php endif; ?>
            <?php endif; ?>
            </p>
            </div>
            <!-- <div class="col-40">
                <?php get_template_part( 'blocks/block', 'stat-bubbles', [ 'data' => [ get_field('banner_stat_highlights') ]] ); ?>
            </div> -->
        </div>
    </div>
</section>

<section id="intro" class="bg-black">
    <div class="wrapper">
        <h2 id="<?php the_field('intro_section_title'); ?>"><?php the_field('intro_section_title'); ?></h2>
        <?php the_field('introduction_copy'); ?>
    </div>
</section>

<section id="portfolio">
    <div class="wrapper">
        <h2><?php the_field('portfolio_section_title'); ?></h2>
    </div>
    <?php if( have_rows('portfolio_carousel') ) : ?>
        <div class="portfolio-slider">
            <?php while( have_rows('portfolio_carousel') ) : the_row(); ?>
                <div class="site">
                    <?php $site_img = get_sub_field('image'); 
                    if ( $site_img ) { echo wp_get_attachment_image( $site_img['id'], 'full', false, ['class' => 'site-img'] ); }?>

                    <?php $site_link = get_sub_field('link');
                    if( $site_link ) : ?>
                        <a target="<?php echo $site_link['target']; ?>" href="<?php echo $site_link['url']; ?>"></a>
                    <?php endif; ?>
                    <p class="title"><?php the_sub_field('title'); ?></p>
                    <span class="material-symbols-outlined">open_in_new</span>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>

<section class="timeline-header">
    <div class="wrapper">
        <h2><?php the_field('history_section_title'); ?></h2>
        <?php the_field('history_section_text'); ?>
    </div>
</section>

<section id="timeline" class="bg-black">
    <?php 
    if( have_rows('history_timeline') ) :
    $count = 0; while( have_rows('history_timeline') ) : the_row(); $count++;?>
        <div class="short-year <?php echo "short-year-{$count}"; ?>">
            <?php $start_year = substr(get_sub_field('date_start'), -2); 
            $end_year = get_sub_field('date_end') ? substr(get_sub_field('date_end') . "'", -3) : 'Now'; 
            ?>
            <p><?php echo "<span>{$start_year}'</span><span>-</span><span>{$end_year}</span>"; ?></p>
        </div>
    <?php endwhile; endif;?>

    <div class="wrapper">
        <?php if( have_rows('history_timeline') ) : ?>
            <div class="timeline-wrapper">
                <div class="timeline-scroller">
                    <div class="scroller"></div>
                </div>
                <div class="position-details-wrapper">
                <?php $count = 0; while( have_rows('history_timeline') ) : the_row(); $count++; ?>
                    <div data-year="<?php echo "short-year-{$count}"; ?>" data-summary="<?php echo "position-summary-{$count}"; ?>" class="position-details<?php echo " position-details-{$count}"; echo $count == 1 ? ' active' : ''; ?>">
                        <div class="date">
                            <p class="start-date">Start Date: <?php the_sub_field('date_start'); ?></p>
                            <p class="end-date"><?php echo get_sub_field('date_end') ? "End Date: " . get_sub_field('date_end') : 'Present'; ?></p>
                        </div>
                        <p class="employer">Employer: <?php the_sub_field('employer_name'); ?></p>
                        <p class="position">Position: <?php the_sub_field('position'); ?></p>
                        <a data-lity class="mobile-details-btn" href="#job-details-<?php echo $count; ?>">
                            <p>View Job Details</p>
                        </a>
                    </div>    
                <?php endwhile; ?>
            </div>
            <div class="position-summary-wrapper">
                <?php $count = 0; while( have_rows('history_timeline') ) : the_row(); $count++; ?>
                    <div id="job-details-<?php echo $count; ?>" class="position-summary<?php echo " position-summary-{$count}"; echo $count == 1 ? ' active' : ''; ?>"><?php the_sub_field('job_summary'); ?></div>
                <?php endwhile; ?>
            </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="animated-bars-right">
        <div class="bar bar-1"></div>
        <div class="bar bar-2"></div>
    </div>
</section>

<section id="skills">
    <div class="wrapper">
        <div class="col flex-row space-between">
            <div class="col-60 terminal">
                <?php //if( have_rows('technical_skill_list') ) : $count = 0; ?>
                    <h2><pre><?php the_field('technical_section_title'); ?></pre></h2>
                    <div class="technical-skills-wrapper">
                        <ul class="dev-skills">
                            <?php 
                            //while( have_rows('technical_skill_list') ) : the_row(); 
                            for($count = 1; $count < 11; $count++) :
                            //$count++;
                            $title = get_sub_field('title'); ?>
                            <!-- <li><?php echo $title; ?></li> -->
                            <!-- <span class="console-text" data-text="<?php echo $title; ?>"></span> -->
                            <p class="typed-text typed-text-<?php echo $count; ?>">
                                <span class="user-text"></span>
                                <span class="visible-console-text"></span>
                            </p>
                            <?php endfor; //endwhile; ?>
                        </ul>
                    </div>
                <?php //endif; ?>
            </div>
            
            <div class="col-40">
                <h2><?php the_field('education_sidebar_title'); ?></h2>
                <?php if( have_rows('education') ) : ?>
                    <div class="education-wrapper">
                        <?php while( have_rows('education') ) : the_row(); ?>
                            <div class="education">
                                <h3><?php the_sub_field('title'); ?></h3>
                                <p class="organization"><?php the_sub_field('organization'); ?></p>
                                <p class="date"><?php the_sub_field('dates'); ?></p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            
        </div>
            
        <div class="spacer-50"></div>
        <div class="col-100">
            <?php the_field('soft_skills_accreditations'); ?>
        </div>
        </div>        
    </div>
</section>

<?php get_template_part('blocks/block', 'pre-footer', [ 'data' => [ get_field('pre_footer_block')] ]); ?>

<?php get_footer(); ?>

