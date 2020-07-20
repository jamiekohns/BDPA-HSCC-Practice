# Autoloaders

In PHP, having to `require` or `require_once` every new class that you want to
use can be a real pain!

Instead, using an _autoloader_ streamlines the process of including new files when
the classes they contain are first used in your code.

The primary function that enables autoloading in PHP is `spl_autoload_register`.

This PHP function takes as it's first arugment a _callable_, which in most cases
will be a _function_. This function can be defined, or _anonymous_, which
is also called a `closure`.

PHP Doc: https://www.php.net/manual/en/function.spl-autoload-register.php

The first example in the PHP Docs is a very basic start:


```
<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
```

The `closure` is the function that is in place of the usual `$variable` syntax in PHP.
The function gets passed one argument, the **full class name** of the class being used.

When PHP encounters code to create a new instance of a class it doesn't already have
loaded, it will execute the `closure` passed to `spl_autoload_register`- in fact, php
will execute _multiple_ functions, if the `spl_autoload_register` was invoked more than once.

What if our classes are in a complex diectory structure? How does the function know where to find code?

_example_:
```
- lib
  - Foo
    - Foo.php
  - Bar
    - Config
      - BarConfig.php
    - Bar.php
    - Woo.php
```

This problem was addresses by the PHP Framework Interop Group ([PHP-fig](https://www.php-fig.org/)) when they developed the PSR-4 standard.

PSR-4: https://www.php-fig.org/psr/psr-4/

PSR-4 leans on `namespaces` in your code to match classes to files in directories.

Each class should have a `NamespaceName`, and a `ClassName`- and can include any number of `SubNamespaceNames`.

`\<NamespaceName>(\<SubNamespaceNames>)*\<ClassName>`

Namespaces are defined at the **top** of a php file, using the `namespace` keyword.

PHP Doc: https://www.php.net/manual/en/language.namespaces.rationale.php

Note that when defining your namespace, there is **no** beginning backslash (\\)character.

In the directory struction above, the correct PSR-4 namespace for the `Foo` class is:
`Foo`, and would be defined as:

```
<?php
   namespace Foo;

   class Foo {}
```

From the same example, the `BarConfig` class would define it's namespace (and sub-namespace) like this:

```
<?php
    namespace Bar\Config;

    class BarConfig {}
```

In this last example, the `NamespaceName` is "Bar", which matches the first directory. The `SubNamespaceName` is "Config", and matches the first sub-directory, and the `ClassName` is "BarConfig".

When we apply these PSR-4 rules to our Class namespeaces and directory and file names, we build a clear way of finding class files when they are used.

To use a namespaced class, we have to add a `use` statement to our PHP code, like this:

```
<?php
    use \Bar\Bar;
    use \Bar\Config\BarConfig;

    $myBar = new Bar();
    $myBarConfig = new BarConfig();
```

Note that there is a backslash character (\\) at the start of each class that we include with `use` statements- unlike when we define namespace. Also note that eash use statement resolves to just **one** class, and includes the class name.

When php encounters the use of a new class that it hasn't yet autoloaded, and the class is namespaced, the `spl_autoload_register` function is invoked, and that **full class name** is passed to the _callable_.

```
<?php
    use \Bar\Config\BarConfig;

    $myBarConfig = new BarConfig();
```
In the code above, when the `spl_autoload_register` _callable_ is invoked, the  passed to the function is: `\Bar\BarConfig\Bar`. We can easily break that up into directory, sub-directory, and class name. Then, we just check that a ".php" file matching the classname is found in the correlating directory in our autoloader, and include it.
