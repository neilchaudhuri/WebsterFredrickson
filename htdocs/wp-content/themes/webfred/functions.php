<?php
add_theme_support('post-thumbnails', array('attorney', 'practice'));

/* Attorney custom type */
function attorney()
{
    $labels = array(
        'name' => _x('Attorneys', 'post type general name'),
        'singular_name' => _x('Attorney', 'post type singular name'),
        'add_new_item' => __('Add New Attorney'),
        'edit_item' => __('Edit Attorney'),
        'new_item' => __('New Attorney'),
        'all_items' => __('All Attorneys'),
        'view_item' => __('View Attorney'),
        'not_found' => __('No attorneys found'),
        'not_found_in_trash' => __('No attorneys found in the trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Attorneys'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Attorney in the law firm',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => true,
    );
    register_post_type('attorney', $args);
}

add_action('init', 'attorney');

add_action('add_meta_boxes', 'attorney_practices_box');
function attorney_practices_box()
{
    add_meta_box(
        'attorney_practices_box',
        __('Practices', 'myplugin_textdomain'),
        'attorney_practices_box_content',
        'attorney',
        'side',
        'high'
    );
}

function attorney_practices_box_content($post)
{
    wp_nonce_field(plugin_basename(__FILE__), 'attorney_practices_box_nonce');
    $practices = get_post_meta( $post->ID, 'practices', true );
    ?>

    <label for="practices">Enter the practice areas for this attorney.</label>
    <input type="text" id="practices" name="practices" placeholder="e.g. Bankruptcy" value="<?php echo $practices?>"  />

<?php
}


add_action('save_post', 'attorney_practices_box_save');
function attorney_practices_box_save($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    if (!wp_verify_nonce($_POST['attorney_practices_box_nonce'], plugin_basename(__FILE__)))
        return;

    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return;
    } else {
        if (!current_user_can('edit_post', $post_id))
            return;
    }
    $practices = $_POST['practices'];
    update_post_meta($post_id, 'practices', $practices);
}


/* Attorney custom type */


/* Practice custom type */

function practice()
{
    $labels = array(
        'name' => _x('Practice Areas', 'post type general name'),
        'singular_name' => _x('Practice Area', 'post type singular name'),
        'add_new_item' => __('Add New Practice Area'),
        'edit_item' => __('Edit Practice Area'),
        'new_item' => __('New Practice Area'),
        'all_items' => __('All Practice Areas'),
        'view_item' => __('View Practice Area'),
        'not_found' => __('No practice area found'),
        'not_found_in_trash' => __('No practice areas found in the trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Practice Areas'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Practice Area for the law firm',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => true,
    );
    register_post_type('practice', $args);
}

add_action('init', 'practice');

add_action('add_meta_boxes', 'practice_summary_box');
function practice_summary_box()
{
    add_meta_box(
        'practice_summary_box',
        __('Practice Summary', 'myplugin_textdomain'),
        'practice_summary_box_content',
        'practice',
        'normal',
        'high'
    );
}

function practice_summary_box_content($post)
{
    wp_nonce_field(plugin_basename(__FILE__), 'practice_summary_box_nonce');
    $practice_summary = get_post_meta( $post->ID, 'practice_summary', true );
?>
    <label for="practice_summary"></label>
    <textarea id="practice_summary" name="practice_summary" placeholder="Enter the summary for this practice area" style="width: 100%">
        <?php echo $practice_summary?>
    </textarea>
<?php
}


add_action('save_post', 'practice_summary_box_save');
function practice_summary_box_save($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    if (!wp_verify_nonce($_POST['practice_summary_box_nonce'], plugin_basename(__FILE__)))
        return;

    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return;
    } else {
        if (!current_user_can('edit_post', $post_id))
            return;
    }
    $practice_summary = $_POST['practice_summary'];
    update_post_meta($post_id, 'practice_summary', $practice_summary);
}

/* Practice custom type */


/* Connections */

function connections()
{
    p2p_register_connection_type(array(
        'name' => 'practices_to_attorneys',
        'from' => 'practice',
        'to' => 'attorney'
    ));
}

add_action('p2p_init', 'connections');
