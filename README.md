# SDsinghAssignment

Commands:  
php artisan migrate:reset                   // reset db  
php artisan migrate                         // create db  
php artisan db:seed                         // initialize data in all db  
php artisan db:seed --class=UsersSeeder    // initialize Users table   
php artisan db:seed --class=PricesSeeder    // initialize Prices table  
php artisan migrate:fresh --seed            // Reinitialize database and fill with mock values  
Output fake user accounts into fake_user_accs.txt