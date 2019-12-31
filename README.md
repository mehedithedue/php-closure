# php-closure

This is a assignment project by use PHP closure to get the feel like  [yajra/laravel-datatables](https://github.com/yajra/laravel-datatables).


## Installation & Documentation
Please at first run ``composer install``

Then in index.php file in project a provide an array like 
```php
    [
        "name" => "Volvo",
        "licence" => '95-PL-AO',
        "price" => 18000,
    ], [
        "name" => "Saab",
        "licence" => 'PL-PO-JB',
        "price" => 18000,
    ]
```

This array element will convert to table by passing the array like 
```php
$tableDataArray = new ShowProcessData($array)
```

Then it can be easily add new column by using 
```php
addColumn('action', function ($row) {
    return 'action column';
})
```
or edit existing column by 
```php
editColumn('action', function ($row) {
    return 'action edited';
})
```

The table will generated after using `makeTable()` function in method chaining.

XML and Json support also available here. 