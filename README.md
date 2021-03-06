# Bootstrap PHP

This library is for anyone who writes PHP and loves using Bootstrap but finds writing some of the markup patterns tedious and a bit cumbersome (I'm looking at you tab sections :wink:). With that in mind, I developed a few helper classes for outputting the markup in a more concise and clean fashion. This way, we can not only keep our code clean and easy to read, but hopefully less error prone from having to copy and paste so much markup.

[Check out a demo here →](https://rpdesignlab.com/libraries/bootstrap-php/demo/tabs/)

Now, we are able to write simple markup like the example below instead of wading through a sea of markup, making sure all of our ids and classes match up.

```php
$tabs = new \RPD\Bootstrap\Tab_Section('myTab', [
  [
    'title'  => 'Home',
    'slug'   => 'home',
  ],
  [
    'title'  => 'Profile',
    'slug'   => 'profile',
  ],
  [
    'title'  => 'Contact',
    'slug'   => 'contact',
  ]
]);

// Output the tab nav
$tabs->output_nav();

// Output the content sections
$tabs->output_content();
```

## Getting Started

```shell
$ composer require rpovelones/bootstrap-php
```

Or you can download this library and include the files you want in your project using `require` or `include`. Example:

```php
require_once __DIR__ .'/../src/Tab_Section.php';
```

## Requirements

|   | Version |
| - | - |
| PHP | 5.6+ |
| Bootstrap | 4.1+ |

## Classes

### `Tab_Section`

Ref: [https://getbootstrap.com/docs/4.1/components/navs/#javascript-behavior](https://getbootstrap.com/docs/4.1/components/navs/#javascript-behavior)

Outputs a BS tab nav and the related content sections. Tab content sections will load a PHP partial file from somewhere in your project. Configure the file path for these partials by defining the `BSPHP_TAB_TEMPLATE_DIR` contstant:

```php
define('BSPHP_TAB_TEMPLATE_DIR', __DIR__.'/templates');
```

**WordPress Support**

Skip defining the `BSPHP_TAB_TEMPLATE_DIR` as this will default to the value of `get_template_directory()`.

**Example**

1. Define your tabs

```php
$tabs = new \RPD\Bootstrap\Tab_Section('my_tab_section', [
  [
    'title'  => 'Tab One',
    'slug'   => 'tab-1',
  ],
  [
    'title'  => 'Tab Two',
    'slug'   => 'tab-2',
  ]
]);
```

2. Output the markup

```html
<nav class="my-tab-nav">
  <?php $tabs->output_nav(); ?>
</nav>
<?php $tabs->output_content(); ?>
```

3. Create your PHP tab content files

- Place these files in the directory defined by `BSPHP_TAB_TEMPLATE_DIR`.
- The files should be named `tab-section-{tab-slug}.php`.
