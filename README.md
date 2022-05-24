# Rector issue reproducer

- clone this repo and enter its directory
- `docker-compose run php composer install`
- `docker-compose run php composer phpstan`

There should be problems reported:

```
 ------ -------------------------------------------------------------------------------------------------------------------------------------------- 
  Line   src/Foo.php                                                                                                                                 
 ------ -------------------------------------------------------------------------------------------------------------------------------------------- 
  13     Method Rector\IssueReproducer\Foo::bar() has no return type specified.                                                                      
  18     Method Rector\IssueReproducer\Foo::set() has no return type specified.                                                                      
  25     Method Rector\IssueReproducer\Foo::get() should return object|null but return statement is missing.                                         
  30     Method Rector\IssueReproducer\Foo::has() should return bool but return statement is missing.                                                
  35     Method Rector\IssueReproducer\Foo::initialized() should return bool but return statement is missing.                                        
  38     Method Rector\IssueReproducer\Foo::getParameter() return type has no value type specified in iterable type array.                           
         💡 See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type                                                    
  40     Method Rector\IssueReproducer\Foo::getParameter() should return array|bool|float|int|string|UnitEnum|null but return statement is missing.  
  45     Method Rector\IssueReproducer\Foo::hasParameter() should return bool but return statement is missing.                                       
  48     Method Rector\IssueReproducer\Foo::setParameter() has no return type specified.                                                             
  48     Method Rector\IssueReproducer\Foo::setParameter() has parameter $value with no value type specified in iterable type array.                 
         💡 See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type                                                    
 ------ -------------------------------------------------------------------------------------------------------------------------------------------- 
```

Now let's upgrade Rector to 0.13 and re-run PHPStan analysis:

- `docker-compose run php composer require rector/rector ^0.13`
- `docker-compose run php composer phpstan`

```
 ------ -------------------------------------------------------------------------------------------------------------------------------------------- 
  Line   src/Foo.php                                                                                                                                 
 ------ -------------------------------------------------------------------------------------------------------------------------------------------- 
  13     Method Rector\IssueReproducer\Foo::bar() has no return type specified.                                                                      
  18     Method Rector\IssueReproducer\Foo::set() has no return type specified.                                                                      
  25     Method Rector\IssueReproducer\Foo::get() should return object|null but return statement is missing.                                         
  30     Method Rector\IssueReproducer\Foo::has() should return bool but return statement is missing.                                                
  35     Method Rector\IssueReproducer\Foo::initialized() should return bool but return statement is missing.                                        
  38     Method Rector\IssueReproducer\Foo::getParameter() has invalid return type UnitEnum.                                                         
  38     Method Rector\IssueReproducer\Foo::getParameter() return type has no value type specified in iterable type array.                           
         💡 See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type                                                    
  40     Method Rector\IssueReproducer\Foo::getParameter() should return array|bool|float|int|string|UnitEnum|null but return statement is missing.  
  45     Method Rector\IssueReproducer\Foo::hasParameter() should return bool but return statement is missing.                                       
  48     Method Rector\IssueReproducer\Foo::setParameter() has no return type specified.                                                             
  48     Method Rector\IssueReproducer\Foo::setParameter() has parameter $value with no value type specified in iterable type array.                 
         💡 See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type                                                    
  48     Parameter $value of method Rector\IssueReproducer\Foo::setParameter() has invalid type UnitEnum.                                            
 ------ -------------------------------------------------------------------------------------------------------------------------------------------- 
```

There are 2 new problems:

```
 ------ -------------------------------------------------------------------------------------------------------------------------------------------- 
  Line   src/Foo.php                                                                                                                                 
 ------ -------------------------------------------------------------------------------------------------------------------------------------------- 
  38     Method Rector\IssueReproducer\Foo::getParameter() has invalid return type UnitEnum.                                                         
  48     Parameter $value of method Rector\IssueReproducer\Foo::setParameter() has invalid type UnitEnum.                                            
 ------ -------------------------------------------------------------------------------------------------------------------------------------------- 
```
