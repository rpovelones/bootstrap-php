# Bootstrap PHP

This library is for anyone who writes PHP and loves using Bootstrap but finds writing certain markup patterns tedious (I'm looking at you tab sections :wink:). So I've developed a few helper classes for outputting the markup in a more concise and clean fashion.

So now, instead of writing markup like this:

```html
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div>
```

You can simply write:

```php
$tabs = new \RPD\Bootstrap\Tab_Section('my_tab_section', [
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
<nav class="my-tab-nav">
  <?php $tabs->output_nav(); ?>
</nav>
<?php $tabs->output_content(); ?>
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
