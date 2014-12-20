<?php
/**
 * The template for displaying the search form.
 *
 * @package tink-tank
 */

 ?>

<div class="search-form" role="search">
    <h2 class="hide">Search</h2>

    <form action="<?php echo home_url( '/' ); ?>" method="get">
        <label class="hide" for="s">Search</label>
        <div class="search-form_container">
            <input id="s" name="s" placeholder="Search" type="search" value="<?php echo get_search_query() ?>" />
            <button type="submit"><span class="hide">Search</span></button>
        </div><!-- .search-form_container -->
    </form>
</div><!-- .search-form -->