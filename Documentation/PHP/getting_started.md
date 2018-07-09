# Auther - PHP

**Auther** documentation for PHP.

## Getting Started

If you do not already have your database setup

Check out this [beginners guide](beginners_guide.md)

First we need to instantiate the **Auther** class

```php
$Auther = new Auther();
```

then to authenicate a user

```php
$authenicate = $Auther->authenicate();
```




In the words of Wisdom:

> https://opensource.guide/


```php
echo 'test';
```

## Methods List

| Methods | Description |
| --- | --- |
| [authenticate()](methods/authenticate.md) | Authorizes a user |
| [unauthenticate()](methods/unauthenticate.md) | Unauthorizes a user |
| [startSession()](methods/start_session.md) | Starts a new session |
| [endSession()](methods/end_session.md) | Ends current users session |
| [addUser()](methods/add_user.md) | Adds a new user to the database table specified |
| [deleteUser()](methods/delete_user.md) | Deletes a user from the database table specified |


https://travis-ci.org/

Use `git status` to list all new or modified files that haven't yet been committed.

Auther has a simple API for authorising users.

It comes with simple to use methods


