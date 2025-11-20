# Simple Text Module for Beaver Builder

A minimal text module for Beaver Builder that gives you exact control over the HTML tag used for your text content.

The native Beaver Builder **Heading** module only lets you select heading tags (e.g. `h1–h6`), and the native **Text Editor** module is a full WYSIWYG (which takes up a lot of space in the component view). This module fills the gap by providing a **simple text input** with flexible tag options.

---

## Features

- **Simple text input**
  - No WYSIWYG editor.
  - Ideal for small labels, titles, and short amounts of text.
- **Flexible tag selection**
  - Choose from: `h2`, `h3`, `h4`, `h5`, `h6`, `p`, `span`, `div`.
  - Behaves like the native Heading module, but with additional non-heading options.
- **Perfect for Beaver Builder Components**
  - Works great as a building block inside Beaver Builder’s **Components** feature as you can use it inside a Box module and compose your own “custom modules” from smaller pieces.

---

## Filters

- **`sn_simple_text_tag_options`**
  - Filter the list of available HTML tags for the **HTML Tag** select field.
  - Receives the default options array and must return an array in the same `value => label` format.

Example (in a theme or another plugin):

```php
add_filter( 'sn_simple_text_tag_options', function ( $options ) {
	// Add extra tags
	$options['strong'] = 'strong';
	$options['em']     = 'em';

	// Optionally remove tags
	// unset( $options['div'] );

	return $options;
} );
```