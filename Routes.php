<?php

class Routes
{
  /** @var string The path to the directory of "file" type routes. */
  private string $routePath;

  /** @var string The default content type. */
  private string $defaultContentType;

  /** @var array The array of configured routes. */
  private array $arrRoutes;

  /** @var string The protocol used to access the HTTP/HTTPS route. */
  private string $requestURL;

  /** @var string The current managed route. */
  private string $currentRoute;

  /** @var string The rewrite base for routes. */
  private string $rewriteBase;

  /**
   * Routes constructor.
   */
  public function __construct()
  {
    // Initialize properties
    $this->requestURL = (isset($_SERVER["HTTPS"]) ? "https://" : "http://")
      . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    $this->routePath = 'pages/';
    $this->defaultContentType = 'text/html';
    $this->currentRoute = '';
    $this->rewriteBase = '/bluebus-ihm';

    // Default message when a route is not found.
    $this->addRoute('error', [
      'function' => function ($route) {
        echo "Route " . $route . " not found!";
      }
    ]);
  }

  /**
   * Adds a route to the RouteMan instance.
   *
   * @param string $url The URL of the route, e.g., "about".
   * @param array $routeAttr The file attribute of the route. This parameter
   * has the following structure:
   *
   * array("file" => "name of the php file to use", 
   *       "content" => "text/html")
   *
   * array("function" => function(){
   *         echo "hello";
   *       }, 
   *       "content" => "text/html")
   *
   * @return void
   */
  public function addRoute(string $url, array $routeAttr): void
  {
    $arrURLs = explode(",", $url);

    foreach ($arrURLs as $urlItem) {
      $this->arrRoutes[$urlItem] = $routeAttr;
    }
  }

  /**
   * Manages actions and access to configured routes based on the URL provided.
   *
   * @return void
   */
  public function manageRoutes(): void
  {
    $this->requestURL = (isset($_SERVER["HTTPS"]) ? "https://" : "http://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

    $arrURL = parse_url($this->requestURL);
    $arrURLParams = array();

    if (isset($arrURL['query'])) {
      parse_str($arrURL['query'], $arrURLParams);
    }

    // Convert parameters sent through JavaScript using .fetch() to a "global" array like $_POST or $_GET
    $_RMFETCH = json_decode(file_get_contents("php://input"), true);

    if (is_null($_RMFETCH)) {
      $_RMFETCH = array();
    }

    $arrURL["path"] = str_replace($this->rewriteBase, "", $arrURL["path"]);
    $this->currentRoute = trim($arrURL['path'], "/");

    if (array_key_exists($this->currentRoute, $this->arrRoutes)) {
      if (array_key_exists('content', $this->arrRoutes[$this->currentRoute])) {
        $this->setHeaderType($this->arrRoutes[$this->currentRoute]['content']);
      } else {
        $this->setHeaderType();
      }

      if (isset($this->arrRoutes[$this->currentRoute]['file'])) {
        $filePath = $this->routePath . $this->arrRoutes[$this->currentRoute]['file'];

        if (file_exists($filePath)) {
          require $filePath;
          exit;
        }
      }

      if (isset($this->arrRoutes[$this->currentRoute]['function'])) {
        $this->arrRoutes[$this->currentRoute]['function']();
        exit;
      }
    } else {
      $this->arrRoutes["error"]['function']($this->currentRoute);
      exit;
    }
  }

  /**
   * Sets the Content-Type to use for each invoked route.
   *
   * @param string|null $type The content type.
   * @return void
   */
  public function setHeaderType($type = null): void
  {
    if (is_null($type)) {
      $type = $this->defaultContentType;
    }

    header("Content-Type: " . $type . "; charset=UTF-8");
  }
}
