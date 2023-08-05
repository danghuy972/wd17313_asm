Tạo file migration
php artisan make:migration create_tests_table
Đồng bộ file migration
php artisan migrate
Xóa file file migration
php artisan migrate:rollback
mỗi lần thay đổi trong file .env phải chạy lệnh sau để cập nhập lại .env
php artisan config:cache 

Tạo dữ liệu mẫu test
php artisan db:seed
tạo dữ liệu mẫu và reset toàn bộ 
php artisan migrate:fresh --seed

Tạo controller  bằng lệnh 
php artisan make:controller TestController

Tạo model bằng lệnh 
php artisan make:model Flight

chèn route vào model 
Route::get('/user', 'TestController@index'); 


thêm đoạn này vào để fix lỗi không nhận controller
trong RouteServiceProvider
protected $namespace = 'App\Http\Controllers';

Tạo file migration
php artisan make:migration create_tests_table
Đồng bộ file migration
php artisan migrate
Xóa file file migration
php artisan migrate:rollback

taoj file request
php artisan make:request StudentRequest

Tạo dữ liệu mẫu test
php artisan db:seed
tạo dữ liệu mẫu và reset toàn bộ 
php artisan migrate:fresh --seed
Tạo ra từng seed riêng ứng với db 

php artisan make:seeder UserSeeder (Ví dụ tạo seed dành cho bảng user )

Sử dụng factory để tạo dữ liệu mẫu 

php artisan make:factory StudentsFactory --model=Students


* Tạo controller  bằng lệnh 
php artisan make:controller TestController

* Tạo model bằng lệnh 
php artisan make:model Flight

* chèn route vào model 
Route::get('/user', 'TestController@index'); 


* Truy vấn dữ liệu sử dụng DB bulder query
Thêm thư viện 
use Illuminate\Support\Facades\DB;
- Lấy toàn bộ dữ liệu của bảng 
 $users = DB::table('users')->get();
- Lấy dữ liệu của bảng theo 1 số trường mong muốn
$users = DB::table('users')
            ->select('name', 'email as user_email')
            ->get();
- Lấy theo điều kiện vào trả về 1 dòng dữ liệu 
$user = DB::table('users')->where('name', 'John')->first();
 Có bao nhiêu điều kiện thì bấy nhiêu where
- Đếm số hàng của bảng
$users = DB::table('users')->count();
- Câu lệnh thêm 
DB::table('users')->insert([
    'email' => 'kayla@example.com',
    'votes' => 0
]);
- Câu lệnh thêm trả về ID
$id = DB::table('users')->insertGetId(
    ['email' => 'john@example.com', 'votes' => 0]
);
- Câu lệnh cập nhật theo điều kiện 
$affected = DB::table('users')
              ->where('id', 1)
              ->update(['votes' => 1]);
- Câu lệnh xóa theo điều kiện 
$deleted = DB::table('users')->where('votes', '>', 100)->delete();
