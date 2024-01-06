## Documentation

### Assignment

-   Create Authentication
-   Import CSV records into Database
-   Read data from an API and populate the database
-   Exception handling
-   Create Jobs

<p>Login details after seeder</p>

            'name' => 'admin',
            'email' => 'admin@nextpayday.co',
            'password' => Hash::make('admin123'),

            'name' => 'user',
            'email' => 'user@nextpayday.co',
            'password' => Hash::make('user123'),

### Installation guide

#### Seeder User details to login as admin or User

#### API Sync Data to database table

<p>Please note that the vue js recently added is only added on route: /admin-dashboard</p>

```bash
composer update

php artisan migrate

php artisan db:seed --class=UsersSeeder

php artisan app:sync-api-data

npm install

npm run dev
```

mine

## Documentation

### Installation guide

-   Run npm init_app to initialize the application which do the following

    -   run installations
    -   seed the database
    -   generate application key

-   Create Authentication
-   Import CSV records into Database
-   Read data from an API and populate the database
-   Exception handling
-   Create Jobs

-login Details

    - for Admin
        'email' : 'admin@ad.com',
        'password': 111111',

    - for user
    'email' => 'user1@dev.co.co',
    'password' => 123456,

<p>Please note that the vue js recently added is only added on route: /admin-dashboard</p>
