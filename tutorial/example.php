<?php


class Student
{

}
$classes = get_declared_classes();
echo "Classes: " . implode(', ', $classes) . "</br>";

$class_names = ['Product', 'Student', 'student'];

foreach($class_names as $class_name)
    {
        if(class_exists($class_name)){
            echo "${class_name} is a declare class </br>" ;
        }
        else{
            echo "${class_name} is not a declare class </br>";

        }
    }
