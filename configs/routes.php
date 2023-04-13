<?php
$routes = array(

    // customer
    "" => array(
        "handler" => "customer/home/renderHomePage",
        "roles" => ["all"]
    ),
    "login" => array(
        "handler" => "user/renderLoginForm",
        "roles" => ["all"]
    ),
    "redirectLogin" => array(
        "handler" => "user/redirectLogin",
        "roles" => ["all"]
    ),
    "register" => array(
        "handler" => "user/renderRegisterForm",
        "roles" => ["all"]
    ),
    "user/register" => array(
        "handler" => "user/register",
        "roles" => ["all"]
    ),
    "user/login" => array(
        "handler" => "user/login",
        "roles" => ["all"]
    ),
    "verify" => array(
        "handler" => "user/renderVerifyForm",
        "roles" => ["all"]
    ),
    "user/verify" => array(
        "handler" => "user/verify",
        "roles" => ["all"]
    ),
    "cart" => array(
        "handler" => "cart/renderShoppingCart",
        "roles" => ["customer", "admin"]
    ),
    "cart/setQuantity" => array(
        "handler" => "cart/setQuantity",
        "roles" => ["customer", "admin"]
    ),
    "cart/productDeleted/:num(id)" => array(
        "handler" => "cart/ProductDeleted",
        "roles" => ["customer", "admin"]
    ),
    "orderproduct/:num(id)" => array(
        "handler" => "customer/order/renderOrderProductPage",
        "roles" => ["customer", "admin"]
    ),
    "order/:num(id)" => array(
        "handler" => "customer/order/addOrder",
        "roles" => ["customer", "admin"]
    ),
    "order" => array(
        "handler" => "customer/order/renderOrderPage",
        "roles" => ["customer", "admin"]
    ),
    "order/:num(address_id)/:num(order_id)" => array(
        "handler" => "customer/order/orderUpdated",
        "roles" => ["customer", "admin"]
    ),
    "order/orderCancelled/:num(id)" => array(
        "handler" => "customer/order/orderCancelled",
        "roles" => ["customer", "admin"]
    ),
    "detail/:num(id)" => array(
        "handler" => "customer/product/renderDetailPage",
        "roles" => ["all"]
    ),
    "detail/addtocart" => array(
        "handler" => "customer/product/addToCart",
        "roles" => ["all"]
    ),
    "logout" => array(
        "handler" => "user/logout",
        "roles" => ["customer", "admin"]
    ),
    "shop" => array(
        "handler" => "customer/product/renderHomeShop",
        "roles" => ["all"]
    ),
    "account" => array(
        "handler" => "customer/account/renderAccountPage",
        "roles" => ["customer", "admin"]
    ),
    "account/addNewAddress" => array(
        "handler" => "customer/account/addNewAddress",
        "roles" => ["customer", "admin"]
    ),
    "account/deleteAddress" => array(
        "handler" => "customer/account/deleteAddress",
        "roles" => ["customer", "admin"]
    ),
    "account/updateAddress" => array(
        "handler" => "customer/account/updateAddress",
        "roles" => ["customer", "admin"]
    ),
    "news" => array(
        "handler" => "customer/news/renderAllNews",
        "roles" => ["all"]
    ),
    "news/:num(id)" => array(
        "handler" => "customer/news/renderNewsDetails",
        "roles" => ["all"]
    ),
    "news/comment" => array(
        "handler" => "customer/news/addComment",
        "roles" => ["all"]
    ),
    "user/uploadAvatar" => array(
        "handler" => "customer/account/uploadAvatar",
        "roles" => ["customer", "admin"]
    ),
    "user/updateEmail" => array(
        "handler" => "customer/account/updateEmail",
        "roles" => ["customer", "admin"]
    ),
    "user/updatePhone" => array(
        "handler" => "customer/account/updatePhone",
        "roles" => ["customer", "admin"]
    ),
    "news/loadComments" => array(
        "handler" => "customer/news/loadComments",
        "roles" => ["all"]
    ),
    "contact" => array(
        "handler" => "customer/contact/renderPageContact",
        "roles" => ["all"]
    ),
    "contact/addnewcontact" => array(
        "handler" => "customer/contact/Addnewcontact",
        "roles" => ["all"]
    ),
    "search" => array(
        "handler" => "customer/search/search",
        "roles" => ["all"]
    ),
    "product/comment" => array(
        "handler" => "customer/product/addComment",
        "roles" => ["customer", "admin"]
    ),
    "product/loadComments" => array(
        "handler" => "customer/product/loadComments",
        "roles" => ["all"]
    ),
    "product/rate" => array(
        "handler" => "customer/product/addRate",
        "roles" => ["customer", "admin"]
    ),
    "product/loadRates" => array(
        "handler" => "customer/product/loadRates",
        "roles" => ["all"]
    ),
    "viewNoti/:num(id)" => array(
        "handler" => "customer/notification/viewNoti",
        "roles" => ["customer", "admin"]
    ),
    "notification/markViewAll" => array(
        "handler" => "customer/notification/markViewAll",
        "roles" => ["customer", "admin"]
    ),
    "notification/getNumberUnread" => array(
        "handler" => "customer/notification/getNumberUnread",
        "roles" => ["customer", "admin"]
    ),
    "notification/viewAll" => array(
        "handler" => "customer/notification/viewAll",
        "roles" => ["customer", "admin"]
    ),
    // admin
    "admin" => array(
        "handler" => "admin/dashboard/renderDashboard",
        "roles" => ["admin"]
    ),
    "admin/form" => array(
        "handler" => "admin/form/renderForm",
        "roles" => ["admin"]
    ),
    "admin/categories" => array(
        "handler" => "admin/category/renderAllCategories",
        "roles" => ["admin"]
    ),
    "admin/categories/add" => array(
        "handler" => "admin/category/renderAddPage",
        "roles" => ["admin"]
    ),
    "admin/categories/addNew" => array(
        "handler" => "admin/category/addNewCategory",
        "roles" => ["admin"]
    ),
    "admin/categories/edit/:num(id)" => array(
        "handler" => "admin/category/renderEditPage",
        "roles" => ["admin"]
    ),
    "admin/categories/editCategory/:num(id)" => array(
        "handler" => "admin/category/editCategory",
        "roles" => ["admin"]
    ),
    "admin/categories/delete/:num(id)" => array(
        "handler" => "admin/category/deteleCategory",
        "roles" => ["admin"]
    ),
    "admin/units" => array(
        "handler" => "admin/unit/renderAllUnits",
        "roles" => ["admin"]
    ),
    "admin/units/add" => array(
        "handler" => "admin/unit/renderAddPage",
        "roles" => ["admin"]
    ),
    "admin/units/addNew" => array(
        "handler" => "admin/unit/addNewUnit",
        "roles" => ["admin"]
    ),
    "admin/units/edit/:num(id)" => array(
        "handler" => "admin/unit/renderEditPage",
        "roles" => ["admin"]
    ),
    "admin/units/editUnit/:num(id)" => array(
        "handler" => "admin/unit/editUnit",
        "roles" => ["admin"]
    ),
    "admin/units/delete/:num(id)" => array(
        "handler" => "admin/unit/deteleUnit",
        "roles" => ["admin"]
    ),
    "admin/products" => array(
        "handler" => "admin/product/renderAllProducts",
        "roles" => ["admin"]
    ),
    "admin/products/add" => array(
        "handler" => "admin/product/renderAddPage",
        "roles" => ["admin"]
    ),
    "admin/products/addNew" => array(
        "handler" => "admin/product/addNewProduct",
        "roles" => ["admin"]
    ),
    "admin/products/edit/:num(id)" => array(
        "handler" => "admin/product/renderEditPage",
        "roles" => ["admin"]
    ),
    "admin/products/editProduct/:num(id)" => array(
        "handler" => "admin/product/editProduct",
        "roles" => ["admin"]
    ),
    "admin/products/delete/:num(id)" => array(
        "handler" => "admin/product/deleteProduct",
        "roles" => ["admin"]
    ),
    "admin/file-manager" => array(
        "handler" => "admin/fileManager/renderFileManager",
        "roles" => ["admin"]
    ),
    "admin/news" => array(
        "handler" => "admin/news/renderAllNews",
        "roles" => ["admin"]
    ),
    "admin/news/add" => array(
        "handler" => "admin/news/renderAddPage",
        "roles" => ["admin"]
    ),
    "admin/news/addNew" => array(
        "handler" => "admin/news/addNews",
        "roles" => ["admin"]
    ),
    "admin/news/edit/:num(id)" => array(
        "handler" => "admin/news/renderEditPage",
        "roles" => ["admin"]
    ),
    "admin/news/editNews/:num(id)" => array(
        "handler" => "admin/news/editNews",
        "roles" => ["admin"]
    ),
    "admin/news/delete/:num(id)" => array(
        "handler" => "admin/news/deleteNews",
        "roles" => ["admin"]
    ),
    "admin/orders" => array(
        "handler" => "admin/order/renderAllOrder",
        "roles" => ["admin"]
    ),
    "admin/orders/:num(id)" => array(
        "handler" => "admin/order/renderDetail",
        "roles" => ["admin"]
    ),
    "admin/orders/deliver/:num(id)" => array(
        'handler' => "admin/order/deliverOrder",
        "roles" => ["admin"]
    ),
    "admin/orders/cancel/:num(id)" => array(
        'handler' => "admin/order/cancelOrder",
        "roles" => ["admin"]
    ),
    "admin/contact" => array(
        "handler" => "admin/contact/renderContact",
        "roles" => ["admin"]
    ),
    "admin/contact/delete/:num(id)" => array(
        "handler" => "admin/contact/deleteContact",
        "roles" => ["admin"]
    ),
    "admin/contact/detail/:num(id)" => array(
        "handler" => "admin/contact/LoadDetailPage",
        "roles" => ["admin"]
    ),
);
