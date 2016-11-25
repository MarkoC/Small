<?php
namespace Small\App;


class Route {
  private function getControler($controler) {
          $controlerArray = explode('@', $controler);
          $use_str = '\Small\Controlers\\';
          $class = $use_str.$controlerArray[0];

          $controlerObject = new $class();

          $name = $controlerArray[1];

          if (!method_exists($controlerObject, $name)) {
              trigger_error("Unable to load method: $name", E_USER_WARNING);
          }

          return $controlerObject->$name();
  }

  static function request($url, $controler) {
      $uri = self::getUri();
      $controler_data = self::getControler($controler);
      if($uri != $url) {
        return;
      }
      $view = new View();

      return $view->render($controler_data);
  }

    private function getUri() {
      return $_SERVER['REQUEST_URI'];
    }

}
