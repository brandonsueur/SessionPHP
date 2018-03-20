# SessionPHP

A simple class to manage your sessions ! 🙂

### ✏️  Basic Usage

```php
$session = new Session;

//checking session_start()
$session->check();

// adding a session
$session->set('bs', 'Brandon Sueur, i am 19 years old. I am Freelance.');

// deleting a session
$session->remove('bs');

// remove all sessions
$session->removeAll();
```

### 📖  License
The project is available as open source under the terms of the MIT License.
