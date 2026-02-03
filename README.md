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


FORM for Image and Resume:

Controller(store):
```PHP
 $validated = $request->validate([
            'description' => 'nullable|string|max:2000',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // 2MB max
            'resume'      => 'nullable|file|mimes:pdf|max:5120', // 5MB max
        ]);

        $data = $validated;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('heroes/images', $imageName, 'public');
            $data['image'] = 'heroes/images/' . $imageName;
        }

        // Handle resume upload
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $resumeName = time() . '_' . uniqid() . '.' . $resume->getClientOriginalExtension();
            $resume->storeAs('heroes/resumes', $resumeName, 'public');
            $data['resume'] = 'heroes/resumes/' . $resumeName;
        }

        // Create record
        Hero::create($data);
```

HTML

```HTML
<div class="mb-4">
<label for="image" class="form-label fw-bold">Hero Image</label>
<input type="file" name="image" id="image" accept="image/*"
 class="form-control bg-secondary text-light border-0 @error('image') is-invalid @enderror">
<small class="text-muted">Max 2MB (jpg, png, webp)</small>
 @error('image')
<div class="invalid-feedback">{{ $message }}</div>
 @enderror
</div>

<!-- Resume -->
<div class="mb-5">
<label for="resume" class="form-label fw-bold">Resume (PDF)</label>
<input type="file" name="resume" id="resume" accept=".pdf"
class="form-control bg-secondary text-light border-0 @error('resume') is-invalid @enderror">
<small class="text-muted">Max 5MB</small>
@error('resume')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>


```
Run the symlink command (only once, or if broken):

```CMD
php artisan storage:link

```




1. Prepare the Environment (.env)
Never upload your local .env file to GitHub. On your server, you will need to set these specific production values:

```
APP_ENV=production

APP_DEBUG=false (Crucial! Never leave this true on a live site)

APP_URL=https://yourdomain.com

```

2.2. The "Production" Command Sequence
Once your code is on the server, run this sequence to optimize Laravel:

```
# Install dependencies (without dev tools)
composer install --optimize-autoloader --no-dev

# Generate a fresh key if not set
php artisan key:generate

# Run migrations (This creates your qualifications and messages tables)
php artisan migrate --force

# Optimize the cache (Makes the site much faster)
php artisan config:cache
php artisan route:cache
php artisan view:cache

```
