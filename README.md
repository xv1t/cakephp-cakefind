# Elegant contruction for joins

## Cake
```php
$this->Post->find('all', array(
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
## CakeFind analog
```php
$this->Post->find('all', array(
  'joins' => CakeFind::joins(array(
         'User' => 'Post',
         'Department' => 'User',
         'DepartmentType' => 'Department',
         'DepartmentTypeOption' => 'DepartmentType',
         'SecondDepartmentTypeOption/department_type_options' => 'DepartmentType'
     ))
  ));
```
