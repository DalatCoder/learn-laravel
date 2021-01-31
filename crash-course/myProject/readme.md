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
});
```
Ví dụ với resource posts, khi cần truy cập tới 1 bài post cụ thể, ta truyền thêm tham số id của bài post vào địa chỉ URI. Tham số id này được tự động truyền vào hàm closure để ta có thể sử dụng ngay.

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
