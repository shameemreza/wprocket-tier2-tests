## QUESTION 1

WP Rocket is using the rocket_clean_domain() function to clear the site's cache whenever that's necessary.

When an additional layer of cache is used, e.g. that of the hosting provider, that should be cleared in sync with WP Rocket's.

SuperHoster, a fictionary host, provides the purge_superhoster_cache() function to clear their cache.

Using the appropriate WP Rocket's hook, write a code snippet to clear SuperHoster's cache after WP Rocket's cache is cleared.

## Solution

Yes, I can use the `rocket_clean_domain` hook provided by WP Rocket to clear SuperHoster's cache after WP Rocket's cache is cleared. Here is the code snippet:

```
  function clear_superhoster_cache_after_wp_rocket() {
      purge_superhoster_cache();
  }
  add_action( 'rocket_clean_domain', 'clear_superhoster_cache_after_wp_rocket' );
```

In this snippet, the `clear_superhoster_cache_after_wp_rocket` function is hooked to the `rocket_clean_domain` action, which is fired by WP Rocket when it clears the cache. The function calls the `purge_superhoster_cache` function provided by SuperHoster, which clears their cache.

### Resources

- [rocket_clean_domain()](https://docs.wp-rocket.me/article/92-rocketcleandomain)
