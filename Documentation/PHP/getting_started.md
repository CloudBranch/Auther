# Auther - PHP

**Auther** documentation for PHP.

## Getting Started

If you do not already have your database setup check out this [beginners guide](beginners_guide.md)

First we need to instantiate the **Auther** class

```php
$Auther = new Auther();
```

then to authenticate a user feed the client-side provided credentials into the `authenticate()` method

```php
$user = "username";
$password = "password";

$authenticate = $Auther->authenticate($user, $password);
```

then to get the authenticated user simply call the `getAuthenticated()` method

```php
$authenticated = $Auther->getAuthenticated();
```

`getAuthenticated()` returns an array so for example to get the username and age of the currently authenticated user assuming those values were supplied to the `authenticate()` method

```php
$authenticated = $Auther->getAuthenticated();

$username = $authenticated["username"];

$age = $authenticated["age"];
```

supplying arrays to the authenticate method the authenticate method can take arrays of data

## Methods List

| Methods | Description |
| --- | --- |
| [authenticate()](methods/authenticate.md) | Authorizes a user |
| [unauthenticate()](methods/unauthenticate.md) | Unauthorizes a user |
| [getAuthenticated()](methods/get_authenticated.md) | Get currently authenticated user |
| [startSession()](methods/start_session.md) | Starts a new session |
| [endSession()](methods/end_session.md) | Ends current users session |
| [addUser()](methods/add_user.md) | Adds a new user to the database table specified |
| [deleteUser()](methods/delete_user.md) | Deletes a user from the database table specified |