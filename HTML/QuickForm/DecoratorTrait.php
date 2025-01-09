<?php

trait HTML_QuickForm_DecoratorTrait {

  private $decorators = [];

  protected abstract function _toHtml();

  /**
   * @param callable $decorator
   *    A filter function which manipulates HTML output.
   *    Function(string $html): string
   * @return $this
   */
  public function addDecorator($decorator) {
    $this->decorators[] = $decorator;
    return $this;
  }

  /**
   * Returns the group element in HTML
   *
   * @return string
   */
  final public function toHtml() {
    $html = $this->_toHtml();
    foreach ($this->decorators as $decorator) {
      $html = $decorator($html, $this);
    }
    return $html;
  }

}
