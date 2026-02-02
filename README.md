Setup breeze: 

```CMD
composer require laravel/breeze --dev
```
And then,

```CMD
php artisan breeze:install
```
Then Migration,

```
php artisan migrate
```
Need to add another column in the user table of user_type

```
php artisan make:migration add_column_to_users --table=users
```



making admin:

```CMD
php artisan tinker
```
and then paste this:
```
use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'Raisul Islam (Admin)',
    'email' => 'r072islam@gmail.com',
    'password' => Hash::make('admin2026secure'),   // ← CHANGE THIS to something strong!
    'role' => 'admin',                        // ← this is the key line
]);
```
