## Simple

This is a very simple [MVC][mvc-pattern] structure, it contains App, middleware, model, controllers and a view.
This example does not implement namespaces. Services are defined in `public/index.php`

```
simple mvc
├── apps
│   ├── App
│   │   ├── Router.php
│   │   └── View.php
│   ├── Middleware
│   │   ├── Middleware.php
│   │   └── AuthMiddleware.php
│   ├── Controllers
│   │   ├── IndexController.php
│   │   └── ProductsController.php
│   ├── Models
│   │   └── Products.php
│   └── Views
│       └── products
│           └── index.php
├── public
│   └── index.php
├── test    
```