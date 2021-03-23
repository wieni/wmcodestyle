# Model–view–controller (and presenter)

> Model–view–controller (usually known as MVC) is a software design pattern[1] commonly used for developing user 
> interfaces that divides the related program logic into three interconnected elements. This is done to separate 
> internal representations of information from the ways information is presented to and accepted from the user.

_Source: [Wikipedia](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller)_

In Drupal, there are multiple ways to building pages, of which 
[view display modes](https://www.drupal.org/docs/8/api/entity-api/display-modes-view-modes-and-form-modes) with field 
formatters and preprocess functions are the most common one. At Wieni, we decided to adopt a more classic, developer 
friendly way of building pages: a combination of controller classes, model classes & templating.

## Model
> The model is responsible for managing the data of the application

Every entity type has a class all loaded entities will be an instance of. Using our module 
[`wmmodel`](https://github.com/wieni/wmmodel), we can narrow that down so we can define a class for every entity bundle.

_mymodule/src/Entity/Model/Node/Page.php_
```php
<?php

namespace Drupal\mymodule\Entity\Model\Node;

use Drupal\node\Entity\Node;
use Drupal\wmmodel\Entity\Interfaces\WmModelInterface;

/**
 * @Model(
 *     entity_type = "node",
 *     bundle = "page",
 * )
 */
class Page extends Node implements WmModelInterface
{
    use WmModel;
    
    public function getSummary(): ?string
    {
        return $this->get('field_example_string')->value;
    }

}
```

### Getters and setters
These models should only contain getters that fetch data from fields or setters that update fields. You should
avoid calling services in models, something like that should probably be done in your controller.

You should use return types as much as possible. To avoid errors, you should make return types nullable in some cases:
- if a field is not required 
- if a new field is added to existing entities (can be avoided by setting the value of existing entities in an update 
  hook, executed during deployment)
- if it's an entity reference field (we're almost never sure if the referenced entity still exists)

You can use [`wmscaffold`](https://github.com/wieni/wmscaffold) to automatically generate model classes with getters
for all entity fields.

### Composition
If you have multiple entity types/bundles having the same behaviour or fields, you can use interfaces and traits to 
avoid copy-pasting code. An example: you need to be able to schedule the publishing of certain entities. These entity 
models should implement `HasSchedulingInterface`, which contains methods like `getPublishDate` and `isPublished`. You'll
also create `HasSchedulingTrait` containing implementations of the methods that are defined in that interface.

## Controller
> Accepts input and converts it to commands for the model or view.

For every entity bundle with a canonical route, we define a controller class using our 
[`wmcontroller`](https://github.com/wieni/wmcontroller) module.

Controllers should be kept as small as possible. Ideally, it should only collect output of calls to services and pass 
it along to the template. Any logic should be extracted into a service.

Controller methods have no fixed names, so it's not necessary for a controller to implement a certain interface. Because 
of that, the use of base classes can be avoided. There are two common controller base classes:
- `Drupal\Core\Controller\ControllerBase` contains a bunch of shortcut methods to avoid having to inject commonly used 
  dependencies. We consider using these methods bad practice, you should inject any dependencies you need yourself. To 
  avoid temptation, you shouldn't use this class. 
- `Drupal\wmcontroller\Controller\ControllerBase` can be used when you need the `view` method to render a Twig template,
  but this is not necessary. You can also include the `ViewBuilderTrait` in your class instead.

You should avoid creating controller base classes in custom code as well. There's almost always going to be a better 
place to put that code: you can use traits, inject services or alter data in event subscribers. 
[Composition over inheritance](https://en.wikipedia.org/wiki/Composition_over_inheritance)!

```php
<?php

namespace Drupal\wmcustom\Controller\Node;

use Drupal\wmcustom\Controller\ControllerBase;
use Drupal\wmcustom\Entity\Node\Example;
use Drupal\wmcustom\Service\SomeService;

class ExampleController extends ControllerBase
{
    protected SomeService $someService;
    
    public function __construct(
        SomeService $someService
    ) {
        $this->someService = $someService;
    }
    
    public function show(Example $example)
    {
        $something = $this->someService->getSomething();
        
        return $this->view(
            'node.example.detail', 
            [
                'example' => $example,
                'something' => $something,
            ]
        );
    }
}

```

## View
> The view renders presentation of the model in a particular format.

The actual markup is built using Twig, the template engine included in Drupal. The controller passes arguments to a Twig 
template and that template contains markup and other templates, included as components. These components are organised 
in namespaces using the [Components! module](https://www.drupal.org/project/components).

## Presenter
> The presenter acts upon the model and the view. It retrieves data from repositories (the model), and formats it for display in the view.

_Source: [Model-view-presenter on Wikipedia](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93presenter)_

Presenters are a principle taken from *model-view-presenter*, a different software design pattern than 
model-view-controller. We use it to transform data before displaying it. Some example use cases:
- Concatenating names and prefixes/suffixes into a person's title 
- Displaying a fallback image in case an image field is empty
- Converting a set of opening hours to a format that's easier to display in Twig

We facilitate presenters using our [`wmpresenter` module](https://github.com/wieni/wmpresenter). More information can be
found in its repository.
