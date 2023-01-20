## QUESTION 3

WP Rocket is using the rocket_clean_post() function to clear a post's cache whenever that's necessary.

1. Which URLs are purged when that function runs?
2. A customer reported an issue that requires you to debug that function. How would you log the URLs that are purged when rocket_clean_post() runs?

### Solution: Which URLs are purged when that function runs?

The `rocket_clean_post()` function is used to clear a post's cache whenever that's necessary. When this function runs, it purges the following URLs associated with the post:

- The post's permalink.
- The post's page on the homepage.
- Any term archive pages associated with the post.
- The post's feed.
- The post's sitemap.

### Solution: A customer reported an issue that requires you to debug that function. How would you log the URLs that are purged when rocket_clean_post() runs?

To debug the `rocket_clean_post()` function and log the URLs that are being purged, I can use the `rocket_clean_post` action and the `error_log()` function. Here is the code snippet of how I can do this:

```
function log_purged_urls_rocket_clean_post( $post_id ) {
    $permalink = get_permalink( $post_id );
    error_log( 'Purging post permalink: ' . $permalink );
    $homepage = get_home_url();
    error_log( 'Purging post page on homepage: ' . $homepage );
    $taxonomies = get_post_taxonomies( $post_id );
    foreach ( $taxonomies as $taxonomy ) {
        $terms = get_the_terms( $post_id, $taxonomy );
        if ( $terms ) {
            foreach ( $terms as $term ) {
                $term_link = get_term_link( $term );
                error_log( 'Purging post from term archive: ' . $term_link );
            }
        }
    }
    $feed_url = get_post_comments_feed_link( $post_id );
    error_log( 'Purging post from feed: ' . $feed_url );
    $sitemap_url = rocket_get_sitemap_url( $post_id );
    error_log( 'Purging post from sitemap: ' . $sitemap_url );
}
add_action( 'rocket_clean_post', 'log_purged_urls_rocket_clean_post' );
```

In this code snippet, the `log_purged_urls_rocket_clean_post` function is hooked to the `rocket_clean_post` action, which is fired by WP Rocket when it clears a post's cache. Inside the function, I used the `get_permalink()`, `get_home_url()`, `get_post_taxonomies()`, `get_the_terms()`, `get_term_link()`, `get_post_comments_feed_link()`, and `rocket_get_sitemap_url()` functions to get the URLs that are associated with the post and then logs them using the `error_log()` function.

This code snippet will allow me to see the URLs that are being purged in the error logs of customer's server and help me to understand which URLs are being affected by the `rocket_clean_post()` function.
