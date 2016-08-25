# The ShortNameLocator Interface

## Overview

Within Zend Framework applications, it's often expedient to provide a mechanism for using class
aliases instead of full class names to load adapters and plugins, or to allow using aliases for the
purposes of slipstreaming alternate implementations into the framework.

In the first case, consider the adapter pattern. It's often unwieldy to utilize a full class name
(e.g., `Zend\Cloud\DocumentService\Adapter\SimpleDb`); using the short name of the adapter,
`SimpleDb`, would be much simpler.

In the second case, consider the case of helpers. Let us assume we have a "url" helper; you may find
that while the shipped helper does 90% of what you need, you'd like to extend it or provide an
alternate implementation. At the same time, you don't want to change your code to reflect the new
helper. In this case, a short name allows you to alias an alternate class to utilize.

Classes implementing the `ShortNameLocator` interface provide a mechanism for resolving a short name
to a fully qualified class name; how they do so is left to the implementers, and may combine
strategies defined by other interfaces, such as
\[PluginClassLocator\](zend.loader.plugin-class-locator).

## Quick Start

Implementing a `ShortNameLocator` is trivial, and requires only three methods, as shown below.

```php
namespace Zend\Loader;

interface ShortNameLocator
{
    public function isLoaded($name);
    public function getClassName($name);
    public function load($name);
}
```

## Configuration Options

This component defines no configuration options, as it is an interface.

## Available Methods

isLoaded  
Is the requested plugin loaded? `isLoaded($name)`

**isLoaded()** Implement this method to return a boolean indicating whether or not the class has
been able to resolve the plugin name to a class.

<!-- -->

getClassName  
Get the class name associated with a plugin name `getClassName($name)`

**getClassName()** Implement this method to return the class name associated with a plugin name.

<!-- -->

load  
Resolve a plugin to a class name `load($name)`

**load()** This method should resolve a plugin name to a class name.

## Examples

Please see the \[Quick Start\](zend.loader.short-name-locator.quick-start) for the interface
specification.
