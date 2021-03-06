<?php

$routes = [
    '^@get$' => ['controller' => 'Home', 'action' => 'getHomePage'],
    '^shop@get$' => ['controller' => 'Products', 'action' => 'getProductsPage'],
    '^api/shop@get$' => ['controller' => 'Api\\Products', 'action' => 'read'],
    '^api/shop/features@get$' => ['controller' => 'Api\\Products', 'action' => 'features'],
    '^api/shop/search@post$' => ['controller' => 'Api\\Products', 'action' => 'search'],
    '^api/shop/filtered@post$' => ['controller' => 'Api\\Products', 'action' => 'filtered'],
    '^api/shop/(?P<category>[a-z-]+)@get$' => ['controller' => 'Api\\Products', 'action' => 'category'],
    '^api/product/(?P<alias>[a-z0-9-]+)@get$' => ['controller' => 'Api\\Products', 'action' => 'product'],
    '^api/hot@get$' => ['controller' => 'Api\\Products', 'action' => 'readHot'],
    '^api/new@get$' => ['controller' => 'Api\\Products', 'action' => 'readNew'],
    '^api/order@get$' => ['controller' => 'Api\\History', 'action' => 'read'],
    '^api/orders@get$' => ['controller' => 'Api\\History', 'action' => 'paginate'],
    '^api/orders/search@post$' => ['controller' => 'Api\\History', 'action' => 'search'],
    '^api/order/send@post$' => ['controller' => 'Api\\Products', 'action' => 'order'],
    '^api/users@get$' => ['controller' => 'Api\\User', 'action' => 'read'],
    '^api/user/(?P<id>[0-9]+)@get$' => ['controller' => 'Api\\User', 'action' => 'show'],
    '^shop/search@post$' => ['controller' => 'Products', 'action' => 'searchProducts'],
    '^shop/(?P<category>[a-z-]+)@get$' => ['controller' => 'Products', 'action' => 'getProdsByCat'],
    '^shop/(?P<category>[a-z-]+)/(?P<alias>[a-z0-9-]+)@get$' => ['controller' => 'Product', 'action' => 'getProductPage'],
    '^(?P<controller>sign-in)@get$' => ['action' => 'getLoginPage'],
    '^(?P<controller>sign-in)@get$' => ['action' => 'getRegistrationPage'],
    '^(?P<controller>logout)@get$' => ['action' => 'logout'],
    '^(?P<controller>cart)@get$' => ['action' => 'getCartPage'],
    '^login@get$' => ['controller' => 'SignIn', 'action' => 'getLoginPage'],
    '^login@post$' => ['controller' => 'SignIn', 'action' => 'authorization'],
    '^registration@get$' => ['controller' => 'SignUp', 'action' => 'getRegistrationPage'],
    '^registration@post$' => ['controller' => 'SignUp', 'action' => 'registration'],
    '^profile@get$' => ['controller' => 'User', 'action' => 'getProfile'],
    '^user/(?P<id>[0-9]+)@get$' => ['controller' => 'User', 'action' => 'getProfile'],
    '^history@get$' => ['controller' => 'History', 'action' => 'getHistory'],
    '^history@post$' => ['controller' => 'History', 'action' => 'sortHistory'],
    '^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?@get$' => [],
];

return $routes;