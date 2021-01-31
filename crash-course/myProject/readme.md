# HỌC LARAVEL CƠ BẢN - EDWIN DIAZ
## 1. Routes
> Địa chỉ URL trên thanh trình duyệt
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
> Class trung gian giữa Model và View trong mô hình MVC. Controller đóng vai trò nhận dữ liệu tương ứng từ Database thông qua class ở Model và truyền dữ liệu vừa nhận được vào View để hiển thị lên màn hình.

### 2.1 Tạo controller
Tạo controller nhanh chóng thông qua ```php artisan```:

```php artisan make:controller PostsController```

Mở terminal và gõ câu lệnh trên, sau đó 1 controller sẽ được tự động tạo ra với tên gọi PostsController.php

### 2.2 Tạo controller nhanh tương ứng thao tác CRUD
Với 1 số controller thực hiện thao tác CRUD, ta có thể nhanh chóng tạo ra controller với các phương thức có sẵn thông qua câu lệnh như sau:

```php artisan make:controller --resource PostsController```

Sau khi kết thúc câu lệnh, ta sẽ có 1 controller với tên gọi PostsController và các phương thức được định nghĩa sẵn

### 2.3 Route sử dụng controller
Khi đã tạo controller, lúc này ta có thể khai báo các route như sau:

```phpt
Route::get('/posts', 'PostsController@index');
```

Trong ví dụ trên, khi người dùng truy cập vào URI: ```/posts```, phương thức ```index()``` bên trong class ```PostsController``` sẽ được gọi. 

### 2.4 Truyền tham số từ URI vào Controller
* Route được khai báo như sau:

  ```
  Route::get('/posts/{id}', 'PostsController@show');
  ```


* Phương thức ```show()``` của class ```PostsController``` sẽ được thiết kế để nhận vào tham số ```id```:
  ```phpt
  public function show($id)
  {
      return 'Specific post with id of ' . $id;
  }
  ```
  
###2. 5 Route với Resources
Ta khai báo route như sau:
```phpt
Route::resource('/posts', 'PostsController');
```
Chương trình sẽ tự động tạo ra 1 danh sách Route tương ứng với các phương thức tương ứng trong controller ```PostsController```:

![List of resource routes](md_assets/route_resource_list.PNG)

### 2.6 Tài liệu tham khảo
[Controllers | Laravel v 5.2](https://laravel.com/docs/5.2/controllers)

<hr>

## 3. Views
> View nằm trong đường dẫn /resources/views. Laravel sử dụng blade làm template engine.
> Controller trả về view tương ứng.

### 3.1 Hiển thị view
Trong ví dụ sau, người dùng truy cập đến trang contact: ```/contact```, chương trình sẽ gọi phương thức ```contact``` trong controller ```PostsController```. Phương thức ```contact``` sẽ như thế này:

```phpt
public function contact()
{
    return view('contact');
}
```

### 3.2 Truyền dữ liệu vào view
Ta có thể truyền dữ liệu vào view thông qua các cách như sau:
1. Dùng phương thức ```with```:
   ```phpt
    public function show($id)
    {
        $title = 'Amazing post';
        $author = 'Trong Hieu';

        return view('post')->with('id', $id);
    } 
   ```
2. Dùng hàm ```compact```:
    ```phpt
    public function show($id)
    {
        $title = 'Amazing post';
        $author = 'Trong Hieu';

        return view('post', compact('id', 'title', 'author'));
    }
    ```
   Dùng hàm ``compact``, ta có thể nhanh chóng truyền nhiều dữ liệu vào ```view``` 1 cách nhanh chóng. Dữ liệu truyền vào sẽ theo dạng *name - variable*, nếu name trùng tên với variable thì ta có thể rút gọn. Ở ví dụ trên, chuỗi ```'id'``` tương ứng với biến ```$id```
   
Sử dụng biến trong blade:
```phpt
<body>
  <div class="container">
      <div class="content">
          <h1>Post detail page for post with id of {{ $id }}</h1>
          <p>{{ $title }}</p>
          <p>{{ $author }}</p>
      </div>
  </div>
</body>
```
Ta có thể truy cập đến các biến được truyền vào bằng cách đặt tên biến tương ứng bên trong cụm ```{{ }}```.
### 3.3 Tài liệu tham khảo
[Views | Laravel v 5.2](https://laravel.com/docs/5.2/views)

<hr>

## 4. Laravel Blade template engine
> Template engine được sử dụng trong Laravel.

### 4.1 Master layout
Trang được dùng chung cho tất cả các trang web khác, thường đặt tên là ```app.blade.php```.

Dùng từ khóa ```@yield``` để tạo ra 1 ```placeholder``` để các trang khác chèn dữ liệu vào. Ví dụ về master page:
```phpt
<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Laravel</title>
</head>
<body>
<div class="container">
    <div class="content">
        @yield('content')
    </div>
</div>

@yield('script')
</body>
</html>
```
Ở ví dụ trên, ta tạo ra 2 ```placeholder```:
* ```content```: chèn nội dung
* ```script```: chèn đoạn script

Các trang blade khác tiến hành kế thừa từ trang master layout và chèn dữ liệu tương ứng vào.
```phpt
@extends('layouts.app')

@section('content')
    <h1>Post detail page for post with id of {{ $id }}</h1>
    <p>{{ $title }}</p>
    <p>{{ $author }}</p>
@endsection

@section('script')
    <script>
        console.log('Post detail page');
    </script>
@endsection
```
Ở ví dụ trên, ```@extends``` thể hiện rằng ta sẽ tạo 1 trang mới từ việc mở rộng template có sẵn tên là ```app``` nằm trong thư mục ```layouts```.
Tiếp đến, ta dùng ```@section``` và tên tương ứng từ chỉ thị ```@yield``` ở layout app để tiến hành chèn nội dung vào.

### 4.2 Tài liệu tham khảo
[Blade Template Engine | Laravel v 5.2](https://laravel.com/docs/5.2/blade)

<hr>

## 5. Laravel Database Migration
> Code First. Tạo các bảng trong cơ sở dữ liệu thông qua các tập tin migration được viết bằng code php.
> Tất cả migration được lưu trữ tại đường dẫn ```/databases/migrations```.

### 5.1 Chỉnh sửa cài đặt trong file ```.env```
* Lưu trữ các thông tin quan trọng
* Sử dụng file ```.env.example``` để làm ví dụ khi push lên github

### 5.2 Thực hiện migration
Dùng câu lệnh có sẵn từ ```php artisan```:
```phpt
php artisan migrate
```
Sau khi thực hiện câu lệnh trên, các bảng tương ứng sẽ được tự động tạo vào cơ sở dữ liệu ```MySQL```.

### 5.3 Tạo mới migration
Dùng câu lệnh có sẵn:
```phpt
php artisan make:migration create_posts_table --create="posts"
```
Sau khi thực hiện lệnh trên, 1 file migration mới sẽ được tạo ra tại đường dẫn ```/databases/migrations```
và được tự động đặt tên như sau: ```2021_01_31_122445_create_posts_table.php```.

### 5.3 Thêm cột mới vào bảng đã có sẵn
Dùng trong trường hợp trong bảng đã có nhiều dữ liệu, ta không muốn xóa đi để migrate từ đầu, chỉ muốn thêm cột mới vào.

Sử dụng câu lệnh có sẵn:
```phpt
php artisan make:migration add_status_column_to_posts_table --table="posts"
```
Sau khi thực hiện lệnh trên, 1 file migration mới sẽ được tạo ra tại đường dẫn ```/databases/migrations```
và được tự động đặt tên như sau: ```2021_01_31_123649_add_status_column_to_posts_table.php```.

### 5.4 Xóa tất cả các bảng
```phpt
php artisan migrate:reset
```

### 5.5 Xóa tất cả các bảng và chạy lại migration từ đầu
```phpt
php artisan migrate:refresh
```

### 5.6 Kiểm tra trạng thái migration
```phpt
php artisan migrate:status
```

### 5.7 Tài liệu tham khảo
[Laravel Database Migrations | Laravel v 5.2](https://laravel.com/docs/5.2/migrations)

