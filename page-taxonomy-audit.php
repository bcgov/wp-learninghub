<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

$post_args = array(
    'post_type'                => 'course',
    'post_status'              => 'publish',
    'posts_per_page'           => -1
);
$post_my_query = null;
$post_my_query = new WP_Query($post_args);
$noauds = [];
$notops = [];
$nomethods = [];
if ($post_my_query->have_posts()) :
    while ($post_my_query->have_posts()) : $post_my_query->the_post();
        $name = get_the_title();
        $slug = basename(get_permalink());
        $top = get_the_terms($post_my_query->ID, 'topics', '', ', ', ' ');
        $aud = get_the_terms($post_my_query->ID, 'audience', '', ', ', ' ');
        $dm = get_the_terms($post_my_query->ID, 'delivery_method', '', ', ', ' ');
        $ext = get_the_terms($post_my_query->ID, 'external_system', '', ', ', ' ');
        $taxs = [$grp[0]->name, $top[0]->name, $aud[0]->name, $dm[0]->name, $ext[0]->name];
        $c = [$slug, $name, $taxs];
        if (empty($top[0]->name)) array_push($notops, $c);
        if (empty($aud[0]->name)) array_push($noauds, $c);
        if (empty($dm[0]->name)) array_push($nomethods, $c);
    endwhile;
endif;
?>
<div id="content">
    <div class="d-flex p-4 p-md-5 align-items-center bg-gov-green bg-gradient" style="height: 12vh; min-height: 100px;">
        <div class="container-lg px-0 px-md-3 py-4 py-md-5">
            <h1 class="mb-0 text-white">Taxonomy Audit</h1>
        </div>
    </div>

    <div class="bg-secondary-subtle">
        <div class="container-lg p-lg-5 p-4 bg-light-subtle">
            <p>Choose a taxonomy to see courses in the catalogue which do NOT have a term applied.</p>

            <details>
                <summary>Topic <span class="badge bg-warning text-black"><?= count($notops) ?></span></summary>
                <?php foreach ($notops as $nt): ?>
                    <div class="p-3 mb-3 bg-light-subtle rounded-3">
                        <div><a href="/learninghub/course/<?= $nt[0] ?>"><?= $nt[1] ?></a></div>
                        <div>Platform: <?= $nt[2][4] ?></div>
                        <div>Topic: <?= $nt[2][1] ?></div>
                        <div>Audience: <?= $nt[2][2] ?></div>
                        <div>Delivery: <?= $nt[2][3] ?></div>
                    </div>
                <?php endforeach ?>
            </details>


            <details>
                <summary>Audience <span class="badge bg-warning text-black"><?= count($noauds) ?></span></summary>
                <?php foreach ($noauds as $a): ?>
                    <div class="p-3 mb-3 bg-light-subtle rounded-3">
                        <div><a href="/learninghub/course/<?= $a[0] ?>"><?= $a[1] ?></a></div>
                        <div>Platform: <?= $a[2][4] ?></div>
                        <div>Topic: <?= $a[2][1] ?></div>
                        <div>Audience: <?= $a[2][2] ?></div>
                        <div>Delivery: <?= $a[2][3] ?></div>
                    </div>
                <?php endforeach ?>
            </details>

            <details>
                <summary>Delivery Method <span class="badge bg-warning text-black"><?= count($nomethods) ?></span></summary>
                <?php foreach ($nomethods as $m): ?>
                    <div><a href="/learninghub/course/<?= $m[0] ?>"><?= $m[1] ?></a></div>
                <?php endforeach ?>
            </details>
        </div>
    </div>
</div>
<?php

get_footer();
