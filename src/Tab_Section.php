<?php

namespace RPD\Bootstrap;

/**
 * The Tab_Section class.
 *
 * A helpful class for maintaining and outputting
 * Bootstrap tab markup.
 *
 * @link https://getbootstrap.com/docs/4.1/components/navs/#javascript-behavior
 */
class Tab_Section {

  /**
   * An html attribute friendly name.
   * @var string
   */
  public $name;

  /**
   * The tabs in array format.
   * @var array
   */
  public $tabs;

  /**
   * The template directory for tab content.
   * @var string
   */
  public $template_dir;

  /**
   * Optional settings.
   * @var array
   */
  public $settings;

  /**
   * The namespace for tab group.
   * @var string;
   */
  public $ns;

  /**
   * Constructor.
   *
   * @param string $name
   * @param array  $tabs
   */
  public function __construct( $name, $tabs, $settings = [] ) {
    $this->name = $name;
    $this->tabs = $tabs;
    $this->settings = $settings;
    $this->ns = uniqid();

    if ( function_exists('get_template_directory') ) {
      $this->template_dir = get_template_directory();
    } elseif ( defined('BSPHP_TAB_TEMPLATE_DIR') ) {
      $this->template_dir = BSPHP_TAB_TEMPLATE_DIR;
    }
  }

  /**
   * Checks if the tab should be active or not.
   * Returns true if the `active` key is explicitly set.
   * Also returns true if no tab is marked active and
   * it is the first tab.
   */
  public function is_tab_active( $tab, $key ) {
    if ( array_key_exists('active', $tab) && $tab['active'] ) {
      return true;
    }
    elseif ( $key === 0 ) {
      foreach ( $this->tabs as $t ) {
        if ( array_key_exists('active', $t) && $t['active'] ) {
          return false;
        }
      }
      return true;
    }
    return false;
  }

  /**
   * Outputs the tab nav.
   *
   * @return html
   */
  public function output_nav() {
    ?>

    <ul class="nav <?= array_key_exists('tab_nav_class', $this->settings) ?  $this->settings['tab_nav_class'] : 'nav-tabs'; ?>" id="<?= $this->name; ?>-tabs-<?= $this->ns; ?>" role="tablist">
      <?php foreach ( $this->tabs as $key => $tab ) : ?>
        <?php
        $class = array_key_exists('tab_item_class', $this->settings) ? $this->settings['tab_item_class'] : '';
        if ( $this->is_tab_active($tab, $key) ) {
          $class .= ' active';
        }
        ?>
        <li class="nav-item">
          <a
            class="nav-link <?= $class; ?>"
            id="<?= $tab['slug']; ?>-tab-<?= $this->ns; ?>"
            data-toggle="pill"
            href="#<?= $tab['slug']; ?>-<?= $this->ns; ?>"
            role="tab"
            aria-controls="<?= $tab['slug']; ?>-<?= $this->ns; ?>"
            aria-selected="<?= $this->is_tab_active($tab, $key) ? 'true' : 'false'; ?>"
          >
            <?= $tab['title']; ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>

    <?php
  }

  /**
   * Output the tab content.
   *
   * @return html
   */
  public function output_content() {
    ?>

    <div class="tab-content" id="<?= $this->name; ?>-content">
      <?php foreach ( $this->tabs as $key => $tab ) : ?>
        <?php
        $class = '';
        if ( $this->is_tab_active($tab, $key) ) {
          $class .= ' active';
        }
        if ( array_key_exists('fade', $this->settings) && $this->settings['fade'] ) {
          $class .= ' fade';
        }
        ?>
        <div
          class="tab-pane show <?= $class; ?>"
          id="<?= $tab['slug']; ?>-<?= $this->ns; ?>"
          role="tabpanel"
          aria-labelledby="<?= $tab['slug']; ?>-tab-<?= $this->ns; ?>"
        >
          <?php
          $template = $this->template_dir .'/tab-section-' . $tab['slug'] .'.php';
          if ( file_exists( $template ) ) {
            include $template;
          }
          ?>
        </div>
      <?php endforeach; ?>
    </div>

    <?php
  }

}