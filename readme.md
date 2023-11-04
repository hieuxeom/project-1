# How to use this template? 

## 1. Change database config file
Destination: `./config/config.php`

## 2. Default definition
- Link structure: <br />
**{domain}/index.php?url={ControllerName}/{Action - Controller Method}**
- Example 1: Controller name: home / Controller method: index<br/>
<strong>{domain}/index.php?url=home</strong>
- Example 2: Controller name: home / Controller method: add<br/>
<strong>{domain}/index.php?url=home/add</strong>

## 3. Controllers 
### Follow this Format

- Filename: {ControllerName}Controller.php <br />
- Ex: Controller Name = home -> HomeController.php

### Base Code

```php
    <?php
    
    class HomeController extends BaseController
    {
        private $homeModel;
    
        public function __construct()
        {
            $this->loadModel("HomeModel");
            $this->homeModel = new HomeModel();
        }
    
        public function index()
        {
            return $this->view(viewPath: "home.index", params: [
                "pageTitle" => "Test title",
                "usersData" => $this->homeModel->getAllUser()
            ]);
        }
    
    }
    
    ?>
```

### Explain Code

```php
    // Initialize Class extends from BaseController

    class HomeController extends BaseController {}
```

```php
    // Initialize the variable to contain the Home model

    private $homeModel
```

```php
    // Load the model when calling the controller to perform the necessary operations
    // Use method `loadModel` from BaseController to Load
    // `loadModel({ModelName}); 

    public function __construct()
    {
        $this->loadModel("HomeModel");
        $this->homeModel = new HomeModel();
    }
```

```php
    // Except __construct, all the remaining methods created are Controller Methods

    public function index()
    {
        return $this->view(viewPath: "home.index", params: [
            "pageTitle" => "Test title",
            "usersData" => $this->homeModel->getAllUser()
        ]);
    }
```

## 4. Models 
### Follow this Format

- Filename: `{ModelName}Model.php`
- Ex: Model Name = `home` -> `HomeModel.php`

### Base Code
```php
<?php

class HomeModel extends BaseModel
{
    // Replace `tableName` with your table name in the database
    // You can create additional data constants to contain `tableName` you need
    const TABLE = `tableName`;

    // The data processing methods are written below ...
}
```


### CRUD (Create - Read - Update - Delete) methods
<h4>CREATE Method</h4>

- Require: The class must be extended from BaseModel
- Call method:

```php
$this->insert(table, data);
```

- Method parameters:

| Parameter name | Required |                           Type                            | Description                                           | Default value |
|----------------|:--------:|:---------------------------------------------------------:|-------------------------------------------------------|:-------------:|
| table          |   yes    |                         `string`                          | Name of the table                                     |       -       |
| data           |   yes    | <pre align="left">array[<br>"field" => "value"<br>]</pre> | Array contains `fields` and `values` data to imported |       -       |

<h4>READ Method</h4>
<strong>1. Get ALL</strong>

- Require: The class must be extended from BaseModel
- Call method:

```php
$this->getAll(table, arraySelect, conditions, limit, order, likeConditions);
```

- Method parameters:

| Parameter name | Required |                                           Type                                           | Description                                                                                                                        | Default value |
|----------------|:--------:|:----------------------------------------------------------------------------------------:|------------------------------------------------------------------------------------------------------------------------------------|:-------------:|
| table          |   yes    |                                         `string`                                         | Name of the table                                                                                                                  |       -       |
| arraySelect    |    no    |                                        `array[]`                                         | Array contains the fields to get                                                                                                   |      [*]      |
| conditions     |    no    |                <pre align="left">array[<br>"field" => "value"<br>]</pre>                 | Array contains `fields` and `values` conditions to identify rows when getting data                                                 |      []       |
| limit          |    no    |                                     `null \| number`                                     | `null` if don't need to limit rows or `number` for the number of rows to get                                                       |     null      |
| order          |    no    | <pre align="left">null \| array[<br>"field" => "<strong>asc \| desc</strong>"<br>]</pre> | `null` if don't need to sort the data or `array[]` has 1 or more `fields` and `asc \|\| desc` depends on the sort type             |     null      |
| likeConditions |    no    |            <pre align="left">null \| array[<br>"field" => "value"<br>]</pre>             | `null` if you don't need to search for a specified pattern or `array[]` with `field` and `value` to search for a specified pattern |     null      |

<strong>2. Get ONE ROW</strong>

- Require: The class must be extended from BaseModel
- Call method:

```php
$this->getOne(table, conditions, arraySelect);
```

- Method parameters:

| Parameter name | Required |                           Type                            | Description                                                                       | Default value |
|----------------|:--------:|:---------------------------------------------------------:|-----------------------------------------------------------------------------------|:-------------:|
| table          |   yes    |                         `string`                          | Name of table                                                                     |       -       |
| conditions     |   yes    | <pre align="left">array[<br>"field" => "value"<br>]</pre> | Array contains `fields` and `values` conditions to identify row when getting data |      []       |
| arraySelect    |    no    |                         `array[]`                         | Array contains the fields to get                                                  |      [*]      |

<strong>3. Get JOIN 2 TABLE</strong>

- Require: Class must be extended from Base Model
- Call method:

```php
$this->getTwoTable(table1, table2, joinColumn, table1Select, table2Select, conditions, limit, order)
```

- Method parameters:

| Parameter name | Required |                                           Type                                           | Description                                                                                                            | Default value |
|----------------|:--------:|:----------------------------------------------------------------------------------------:|------------------------------------------------------------------------------------------------------------------------|:-------------:|
| table1         |   yes    |                                         `string`                                         | Name of the table 1                                                                                                    |       -       |
| table2         |   yes    |                                         `string`                                         | Name of the table 2                                                                                                    |       -       |
| joinColumn     |   yes    |                                         `string`                                         | Name of the column join                                                                                                |       -       |
| table1Select   |   yes    |                                        `array[]`                                         | Array contains the fields to get from table 1                                                                          |       -       |
| table2Select   |   yes    |                                        `array[]`                                         | Array contains the fields to get from table 2                                                                          |       -       |
| conditions     |    no    |                <pre align="left">array[<br>"field" => "value"<br>]</pre>                 | Array contains `fields` and `values` conditions to identify rows when getting data                                     |      []       |
| limit          |    no    |                                     `null \| number`                                     | `null` if don't need to limit rows or `number` for the number of rows to get                                           |     null      |
| order          |    no    | <pre align="left">null \| array[<br>"field" => "<strong>asc \| desc</strong>"<br>]</pre> | `null` if don't need to sort the data or `array[]` has 1 or more `fields` and `asc \|\| desc` depends on the sort type |     null      |

<h4>UPDATE method </h4>

- Require: The class must be extended from BaseModel
- Call method:

```php
$this->update(table, data, conditions);
```

- Method parameters:

| Parameter name | Required |                           Type                            | Description                                                       | Default value |
|----------------|:--------:|:---------------------------------------------------------:|-------------------------------------------------------------------|:-------------:|
| table          |   yes    |                         `string`                          | Name of the table                                                 |       -       |
| data           |   yes    | <pre align="left">array[<br>"field" => "value"<br>]</pre> | Array contains `fields` and `values` data that need to be updated |       -       |
| conditions     |   yes    | <pre align="left">array[<br>"field" => "value"<br>]</pre> | Array contains `fields` and `values` to identify rows to update   |      []       |

<h4>DELETE method </h4>

- Require: The class must be extended from BaseModel
- Call method:

```php
$this->delete($table, $condition);
```

- Method parameters:

| Parameter name | Required |                           Type                            | Description                                                              | Default value |
|----------------|:--------:|:---------------------------------------------------------:|--------------------------------------------------------------------------|:-------------:|
| table          |   yes    |                         `string`                          | Name of the table                                                        |       -       |
| conditions     |   yes    | <pre align="left">array[<br>"field" => "value"<br>]</pre> | The array contains `fields` and `values` data to identify rows to delete |      []       |

## 5. Views
### Follow this Format
- File destination: `/views/{parentFolder}/index.php`
- Ex: Home view -> `/views/home/index.php`

### How to call method
- Required: Can only be called from the `ControllerFile` extended from `BaseController`
- Call method
```php
$this->view(viewPath, params);
```

- Method parameters:

| Parameter name | Required |                           Type                            | Description                                                                                                            | Default value |
|----------------|:--------:|:---------------------------------------------------------:|------------------------------------------------------------------------------------------------------------------------|:-------------:|
| viewPath       |   yes    |                         `string`                          | `viewPath` must be follow this format `{parentFolder}.{filename}`, the `filename` does not include the .php extension. |       -       |
| params         |    no    | <pre align="left">array[<br>"field" => "value"<br>]</pre> | The array contains `variableName` and `variableValue` data for use in `view` file                                      |       -       |

### Use variables in view file
#### Sample data

In `HomeController.php`
```php
public function index()
{
    echo __METHOD__;

    return $this->view(viewPath: "home.index", params: [
        "pageTitle" => "Test title",
        "usersData" => $this->homeModel->getAllUser()
    ]);
}
```

In `/views/home/index.php`
```php
<?php
echo $pageTitle;
print_r($userData);
```

