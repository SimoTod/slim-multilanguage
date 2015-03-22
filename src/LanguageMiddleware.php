<?php
namespace SimoTod\Language;
 
class LanguageMiddleware extends \Slim\Middleware
{
    protected $availableLangs = array();

    public function __construct($languages, $default) 
    {
        if(!is_array($languages)) $languages = array($languages);
        $this->availableLangs = $languages;
        $app = \Slim\Slim::getInstance();
        $app->container->singleton('locale', function () use ($default) {
            return new Language($default);
        });
    }

    public function call() 
    { 
        $basePath = $this->app->request->getScriptName();
        $virtualPath = $this->app->request->getPathInfo();

        $pathChunk = explode("/",$virtualPath);
        if(count($pathChunk) > 1 && in_array($pathChunk[1], $this->availableLangs)) {
            $this->app->locale->set($pathChunk[1]);
            $pathChunk = array_slice($pathChunk, 2);
        }

        $_SERVER['REQUEST_URI'] = $basePath."/".implode("/",$pathChunk);
        $newEnv = \Slim\Environment::getInstance(true);
        $newRequest = new \Slim\Http\Request($newEnv);
        $this->app->container->request = $newRequest;
        
        $this->next->call();
    }
}