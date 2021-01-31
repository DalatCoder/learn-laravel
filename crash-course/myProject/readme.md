# HỌC LARAVEL CƠ BẢN - EDWIN DIAZ
## 1. Routes
* Địa chỉ URL trên thanh trình duyệt
* Dùng thông qua class Route và các phương thức static:
    * get
    * post 
    * ...
    
* Ví dụ:
    ```phpt
    Route::get('/', function () {
        return view('welcome');
    });
    ```
  Khi truy cập đến địa chỉ root, hàm closure được gọi và trả về view tương ứng.

### 1.1 Truyền tham số trên địa chỉ URL

```phpt
Route::get('/posts/{id}', function ($id) {
    return "Post with id: " . $id;
})
->where('id', '[0-9]+');
```
Ví dụ với resource posts, khi cần truy cập tới 1 bài post cụ thể, ta truyền thêm tham số id của bài post vào địa chỉ URI. Tham số id này được tự động truyền vào hàm closure để ta có thể sử dụng ngay.

Ta có thể dùng regex để xác định string pattern của tham số. Chẳng hạn như ví dụ trên, ta chỉ cho phép tham số id chứa các số từ 0-9.

### 1.2 Đặt tên cho route | Naming Routes
```phpt
Route::get('/admin/posts/thisisalongurl', array('as' => 'admin.posts',  function () {

    $url = route('admin.posts');

    return 'This url is posts admin page, ' . $url;
}));
```
Thay vì phải ghi nhớ địa chỉ URI dài loằng ngoằng như */admin/posts/thisisalongurl*, chúng ta có thể tạo nickname cho nó. Chẳng hạn trong đoạn code trên, ta thay thế địa chỉ URI ban đầu với tên gọi ngắn hơn là admin.posts, để truy cập đến địa chỉ URL nguyên bản, ta dùng phương thức **route()** có sẵn.

Ví dụ khi sử dụng naming route trong thẻ ```<a>```:
```phpt
<a href="route(admin.posts)">Go to admin posts page</a>
```

### 1.3 Tài liệu tham khảo:
[HTTP Routing | Laravel v 5.2](https://laravel.com/docs/5.2/routing)

<hr>

## 2. Controllers
Class trung gian giữa Model và View trong mô hình MVC. Controller đóng vai trò nhận dữ liệu tương ứng từ Database thông qua class ở Model và truyền dữ liệu vừa nhận được vào View để hiển thị lên màn hình.

Tạo controller nhanh chóng thông qua ```php artisan```:

```php artisan make:controller PostsController```

Mở terminal và gõ câu lệnh trên, sau đó 1 controller sẽ được tự động tạo ra với tên gọi PostsController.php

Với 1 số controller thực hiện thao tác CRUD, ta có thể nhanh chóng tạo ra controller với các phương thức có sẵn thông qua câu lệnh như sau:

```php artisan make:controller --resource PostsController```

Sau khi kết thúc câu lệnh, ta sẽ có 1 controller với tên gọi PostsController và các phương thức được định nghĩa sẵn
