<?php

/**
 * The template for displaying all pages of the Course content type. 
 * 
 *
 */

get_header();

/* Start the Loop */
while (have_posts()) :
    the_post();
?>
    <div id="content">
        <div class="d-flex p-4 p-lg-5 align-items-center bg-gov-green" style="height: 14vh; min-height: 100px;">
            <div class="container-lg py-4 py-lg-5">
                <h1 class="text-white title">Course Details</h1>

            </div>
        </div>
        <div class="bg-secondary-subtle">
            <div class="container-lg p-lg-5 p-4 bg-light-subtle">
                <div class="row mx-0">
                    <div class="col-lg-8">
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                        <?php if (!empty($post->mandatory_notes)) : ?>
                            <div class="mandonotes" style="background-color: #fffede; border-radius: 5px; margin: 1em 0 0 0; padding: 1em;">
                                <?= $post->mandatory_notes ?>
                            </div>
                        <?php endif ?>

                        <?php if (!empty($post->course_link)) : ?>
                            <div class="mb-2">
                                <a class="btn btn-primary" href="<?= $post->course_link ?>" target="_blank" rel="noopener">
                                    Launch<span class="visually-hidden"> (opens in new window)</span>
                                    <div class="icon-svg baseline-svg"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                                        </svg></div>
                                </a>

                            </div>

                        <?php else : ?>

                            <!-- There's no course link. What to do? -->

                        <?php endif ?>


                        <div class="fw-normal border-top pt-3 mt-4">
                            <h3 class="h4">About this course</h3>
                            <div class="fw-semibold">
                                <p class="mb-0">Partner: <span class="partners fw-normal"><?php the_terms($post->ID, 'learning_partner'); ?></span>

                                    <?php $exsys = get_the_terms($post->ID, 'external_system', '', ', ', ' ') ?> </p>
                                <p class="mb-0">
                                    <?php if (!empty($exsys[0]->name)) : ?>
                                        Platform: <span class="fw-normal">
                                            <a class="text-decoration-none" href="/learninghub/external_system/<?= $exsys[0]->slug ?>">
                                                <?= $exsys[0]->name ?>
                                            </a>
                                        </span>
                                </p>
                            <?php endif ?>
                            <div title="Group">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="d-inline-block" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M264.5 5.2c14.9-6.9 32.1-6.9 47 0l218.6 101c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 149.8C37.4 145.8 32 137.3 32 128s5.4-17.9 13.9-21.8L264.5 5.2zM476.9 209.6l53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 277.8C37.4 273.8 32 265.3 32 256s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0l152-70.2zm-152 198.2l152-70.2 53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 405.8C37.4 401.8 32 393.3 32 384s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0z" />
                                </svg>
                                <span class="group">Group:
                                    <?php $gs = get_the_terms($post->ID, 'groups'); ?>
                                    <a href="/learninghub/filter/?group[]=<?= $gs[0]->slug ?>" class="text-decoration-none fw-normal"><?= $gs[0]->name ?></a>
                                </span>
                            </div>
                            <div title="Topic">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="d-inline-block" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M0 80V229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7H48C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                </svg>
                                <span class="topic">Topic:
                                    <?php $to = get_the_terms($post->ID, 'topics'); ?>
                                    <a href="/learninghub/filter/?topic[]=<?= $to[0]->slug ?>" class="text-decoration-none fw-normal"><?= $to[0]->name ?></a>
                                </span>
                            </div>

                            <div title="Audience">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" class="d-inline-block"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                </svg>
                                <span class="audience">Audience:
                                    <?php $au = get_the_terms($post->ID, 'audience'); ?>
                                    <a href="/learninghub/filter/?audience[]=<?= $au[0]->slug ?>" class="text-decoration-none fw-normal"><?= $au[0]->name ?></a>
                                </span>
                            </div>
                            <div title="Delivery Method">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="d-inline-block" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M160 64c0-35.3 28.7-64 64-64H576c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H336.8c-11.8-25.5-29.9-47.5-52.4-64H384V320c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32v32h64V64L224 64v49.1C205.2 102.2 183.3 96 160 96V64zm0 64a96 96 0 1 1 0 192 96 96 0 1 1 0-192zM133.3 352h53.3C260.3 352 320 411.7 320 485.3c0 14.7-11.9 26.7-26.7 26.7H26.7C11.9 512 0 500.1 0 485.3C0 411.7 59.7 352 133.3 352z" />
                                </svg>
                                <span class="dm">Delivery Method:
                                    <?php $dms = get_the_terms($post->ID, 'delivery_method') ?>
                                    <a href="/learninghub/filter/?delivery_method[]=<?= $dms[0]->slug ?>" class="text-decoration-none fw-normal"><?= $dms[0]->name ?></a>
                                </span>
                            </div>
                            </div>
                            <div class="coursecats mt-1" style="display:none;">
                                <?php the_terms($post->ID, 'course_category', 'Categories: ', ', ', ' '); ?>
                            </div>

                        <?php endwhile; // End of the loop. 
                        ?>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <?php get_template_part('template-parts/sidebar/taxonomies') ?>
                    </div>




                    <!-- leave row div unclosed as it's in the footer -->
                    <?php

                    get_footer();
