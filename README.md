# slim-multilanguage

This is an extension to the [SLIM framework](https://github.com/codeguy/Slim) vers.2 to enable simple route localization.

##Installation
Add dependecy to composer.json

```json
    {
        "require": {
            "simotod/slim-multilanguage": "dev-master"
        }
    }

```

##Usage
```php
    require 'vendor/autoload.php';
	
	$defaultLanguage = "en";
	$availableLanguages = array("en", "it");

    $app = new \Slim\Slim();	
	
	$app->add(new \SimoTod\Language\LanguageMiddleware($availableLanguages, $defaultLanguage));

	$app->get('/hello', function () use ($app) {
		//This route works for "/hello", "/en/hello", "/it/hello"
		if($app->locale->get() == "it") {
			echo "Ciao mondo!";
		} else {
			echo "Hello world!";
		}
	});
	
	$app->run();
	
```
