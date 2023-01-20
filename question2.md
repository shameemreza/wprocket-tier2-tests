## QUESTION 2

WP Rocket's Delay JavaScript Execution feature is used to lazily load scripts upon user interaction.

There are some exclusions added by default in WP Rocket's core, one of them being recaptcha/api.js.

A customer wants that script to be delayed, i.e. removed from the list of built-in exclusions.

Using WP Rocket's respective filter, write a code snippet or a small plugin to remove that exclusion and allow the delay of the script.

## Solution

Here is the code snippet to remove exclusion and allow the delay of the script:

```
  function remove_recaptcha_exclusion( $excluded_scripts ) {
      $key = array_search( 'recaptcha/api.js', $excluded_scripts );
      if ( $key !== false ) {
          unset( $excluded_scripts[$key] );
      }
      return $excluded_scripts;
  }
  add_filter( 'rocket_exclude_js', 'remove_recaptcha_exclusion' );
```

In this snippet, the `remove_recaptcha_exclusion` function is hooked to the `rocket_exclude_js` filter, which is used by WP Rocket to define the scripts that should be excluded from the Delay JavaScript Execution feature. The function searches for the `recaptcha/api.js` script in the array of excluded scripts and removes it if found, allowing it to be delayed with the feature.

It is recommended to use the code snippet as a plugin, so that the changes will be persisted across updates and the code will not be lost. Plugin has been included as the `remove-recaptcha-exclusion` folder. This folder need to place inside the `wp-content/plugins` directory.
