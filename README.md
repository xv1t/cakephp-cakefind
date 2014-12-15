# Elegant contruction for joins

`Bring to your attention its simple and elegants version of the joins in the Model find options.`

## 30 lines of CakePHP Example
```php
$this->Post->find('all', array(
  'fields' => '*',
  'joins' => array(
     array(
        'table' => 'users',
        'type' => 'LEFT',
        'alias' => 'User',
        'conditions' => 'Post.user_id = User.id'
     ),
     array(
        'table' => 'departmets',
        'type' => 'LEFT',
        'alias' => 'Department',
        'conditions' => 'User.department_id=Department.id'
     ),
     array(
        'table' => 'department_types',
        'type' => 'LEFT',
        'alias' => 'DepartmentType',
        'conditions' => 'Department.department_type_id=DepartmentType.id' 
     ),
     array(
        'table' => 'department_type_options',
        'type' => 'LEFT',
        'alias' => 'DepartmentTypeOption',
        'conditions' => 'DepartmentType.department_type_option_id=DepartmentTypeOption.id' 
     ),
     array(
        'table' => 'department_type_options',
        'type' => 'LEFT',
        'alias' => 'SecondDepartmentTypeOption',
        'conditions' => 'DepartmentType.second_department_type_option_id=SecondDepartmentTypeOption.id' 
     ),
  )
));
```
## 5 lines CakeFind analog
```php
$this->Post->find('all', array(
  'fields' => '*',
  'joins' => CakeFind::joins(array(
         'User' => 'Post',
         'Department' => 'User',
         'DepartmentType' => 'Department',
         'DepartmentTypeOption' => 'DepartmentType',
         'SecondDepartmentTypeOption/department_type_options' => 'DepartmentType'
     ))
  ));
```

# Syntax

```php
CakeFind::joins(array());
```

Standart belongsTo

```php
#CakeFind
array(
  'User' => 'Post'
);

#CakePHP
array(
 array(
    'table' => 'users',
    'type' => 'LEFT',
    'alias' => 'User',
    'conditions' => 'Post.user_id = User.id'
 )
);
```

Non standart foreign keys

```php
#CakeFind
array(
  'User' => 'Post.updated_user_id'
);

#CakePHP
array(
  array(
    'table' => 'users',
    'type' => 'LEFT',
    'alias' => 'User',
    'conditions' => 'Post.updated_user_id = User.id'
  )
);
```

Non standart table name

```php
#CakeFind
array(
  'User/ban_users' => 'Post.user_id'
);

#CakePHP
array(
  array(
    'table' => 'ban_users',
    'type' => 'LEFT',
    'alias' => 'User',
    'conditions' => 'Post.user_id = User.id'
  )
);
```

Non standart foreign and primary keys
```php
#CakeFind
array(
  'User.unique_id/uniq_users' => 'Post.unique_user_id'
);

#CakePHP
array(
  array(
    'table' => 'uniq_users',
    'type' => 'LEFT',
    'alias' => 'User',
    'conditions' => 'Post.unique_user_id = User.unique_id'
 )
);
```

# Install in CakePHP 2.x
```bash
#!/bin/bash
cd my/cake/app
mkdir -p Vendor/xv1t
wget https://raw.githubusercontent.com/xv1t/cakephp-cakefind/master/CakeFind.php
```

Insert in your my/cake/app/Config/bootstrap.php
```php
App::import('Vendor', 'xv1t/CakeFind');
```

And use in any `$Model->find()` methods of your app!
