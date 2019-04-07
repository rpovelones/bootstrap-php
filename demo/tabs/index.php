<?php

define('BSPHP_TAB_TEMPLATE_DIR', __DIR__.'/templates');

require_once __DIR__ .'/../../src/Tab_Section.php';

$tabs = [
  [
    'title'  => 'Tab One',
    'slug'   => 'tab-1',
  ],
  [
    'title'  => 'Tab Two',
    'slug'   => 'tab-2',
  ]
];

$extra_settings1 = [
  'tab_nav_class' => 'nav-pills',
  'fade' => true
];

$extra_settings2 = [
  'tab_nav_class' => 'nav-pills flex-column',
];

$tabs1 = new \RPD\Bootstrap\Tab_Section('my_tab_section', $tabs);
$tabs2 = new \RPD\Bootstrap\Tab_Section('my_tab_section2', $tabs, $extra_settings1);
$tabs3 = new \RPD\Bootstrap\Tab_Section('my_tab_section3', $tabs, $extra_settings2);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/styles/atom-one-dark.min.css">

    <style type="text/css">
      section {
        margin-bottom: 5rem;
      }
      pre code {
        padding: 1rem !important;
        padding-top: 0 !important;
      }
    </style>

    <title>Hello, world!</title>
  </head>
  <body class="p-5">

    <div class="container">
      <h1 class="mb-5">Bootstrap Tab Examples</h1>

      <div class="col-md-10 mx-auto">

        <section>
          <h2 class="mb-4">Default</h2>
          <nav class="mb-3">
            <?php $tabs1->output_nav(); ?>
          </nav>
          <?php $tabs1->output_content(); ?>
          <pre>
<code>
&lt;?php
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
?&gt;

<?= htmlentities('
<nav class="my-nav">
  <?php $tabs->output_nav(); ?>
</nav>

<?php $tabs->output_content(); ?>
'); ?></code>
          </pre>
        </section>

        <section>
          <h2 class="mb-4">Pill Tabs with Fade</h2>
          <nav class="mb-3">
            <?php $tabs2->output_nav(); ?>
          </nav>
          <?php $tabs2->output_content(); ?>
          <pre>
<code>
&lt;?php
$settings = [
  'tab_nav_class' => 'nav-pills',
  'fade' => true
];

$tabs = new \RPD\Bootstrap\Tab_Section('my_tab_section', [
  [
    'title'  => 'Tab One',
    'slug'   => 'tab-1',
  ],
  [
    'title'  => 'Tab Two',
    'slug'   => 'tab-2',
  ]
], $settings);
?&gt;

<?= htmlentities('
<nav class="my-nav">
  <?php $tabs->output_nav(); ?>
</nav>

<?php $tabs->output_content(); ?>
'); ?></code>
          </pre>
        </section>

        <section>
          <h2 class="mb-4">Vertical Tabs</h2>
          <div class="row">
            <div class="col-3">
              <?php $tabs3->output_nav(); ?>
            </div>
            <div class="col-9">
              <?php $tabs3->output_content(); ?>
            </div>
          </div>
          <pre>
<code>
&lt;?php
$settings = [
  'tab_nav_class' => 'nav-pills flex-column',
  'fade' => true
];

$tabs = new \RPD\Bootstrap\Tab_Section('my_tab_section', [
  [
    'title'  => 'Tab One',
    'slug'   => 'tab-1',
  ],
  [
    'title'  => 'Tab Two',
    'slug'   => 'tab-2',
  ]
], $settings);
?&gt;

<?= htmlentities('
<div class="row">
  <div class="col-3">
    <nav class="my-nav">
      <?php $tabs->output_nav(); ?>
    </nav>
  </div>
  <div class="col-9">
    <?php $tabs->output_content(); ?>
  </div>
</div>
'); ?></code>
          </pre>
        </section>

      </div>

    </div>

    <!-- Optional JavaScript -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>