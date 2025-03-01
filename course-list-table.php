<?php
/*
Template Name: Course List Table
*/

 ?>


    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Course Name</th>
				<th>ELM Course ID</th>
                <th>Audience</th>
                <th>Topics</th>
                <th>Delivery Method</th>
				<th>Platform</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $args = array(
                'post_type'      => 'course',
                'post_status'    => 'publish', // Ensures only published courses are listed
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC'
            );

            $courses = new WP_Query($args);

            if ($courses->have_posts()) :
                while ($courses->have_posts()) : $courses->the_post();
					// Fetch the custom field 'elm_course_id'
                    $elm_course_id = get_post_meta(get_the_ID(), 'elm_course_id', true);
                    $elm_course_id_display = !empty($elm_course_id) ? esc_html($elm_course_id) : 'None';
                    // Fetch taxonomy terms and ensure they display "None" if empty
                    $audience_terms = get_the_terms(get_the_ID(), 'audience');
                    $topics_terms = get_the_terms(get_the_ID(), 'topics');
                    $delivery_terms = get_the_terms(get_the_ID(), 'delivery_method');
					$platform_terms = get_the_terms(get_the_ID(), 'external_system');

                    $audience_list = !empty($audience_terms) ? implode(', ', wp_list_pluck($audience_terms, 'name')) : 'None';
                    $topics_list = !empty($topics_terms) ? implode(', ', wp_list_pluck($topics_terms, 'name')) : 'None';
                    $delivery_list = !empty($delivery_terms) ? implode(', ', wp_list_pluck($delivery_terms, 'name')) : 'None';
					$platform_list = !empty($platform_terms) ? implode(', ', wp_list_pluck($platform_terms, 'name')) : 'None';
            ?>
                    <tr>
                        <td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
						<td><?php echo $elm_course_id_display; ?></td>
                        <td><?php echo esc_html($audience_list); ?></td>
                        <td><?php echo esc_html($topics_list); ?></td>
                        <td><?php echo esc_html($delivery_list); ?></td>
						<td><?php echo esc_html($platform_list); ?></td>
                    </tr>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<tr><td colspan="4">No published courses found.</td></tr>';
            endif;
            ?>
        </tbody>
    </table>

