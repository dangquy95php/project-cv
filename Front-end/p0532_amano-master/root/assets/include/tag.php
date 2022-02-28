<div class="c-side01__inner1">
    <h3 class="c-title24">注目のトピックス</h3>
    <ul class="c-list47">
        <?php
    $terms = get_terms('post_tag');
    foreach ($terms as $term) {
        echo "<li><a href='" . get_term_link($term, 'post_tag') . "'>" . $term->name . "</a></li>";
    }
    ?>
    </ul>
</div>