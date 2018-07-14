# Auther - PHP

**Auther** documentation for PHP.

## Installation


## Getting Started

If you do not already have your database setup check out this [beginners guide](beginners_guide.md)

First we need to instantiate the Auther class

```php
// Instantiate the **Auther** class
$auther = new Auther();

// Authenticate a user
$authenticate = $auther->authenticate($user, $password);

// Get authenticated user
$authenticated = $Auther->getAuthenticated();
```

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