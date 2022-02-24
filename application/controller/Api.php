<?php


class Api extends Controller
{
//    API

    public function read_single($id)
    {
        $blog = $this->model("post");
        $blog->id = $id;
        $blog->read_single($blog->id);

        if (isset($blog->title)) {
            $blog_arr = array(
                'blog_id' => $blog->blog_id,
                'title' => $blog->title,
                'content' => html_entity_decode($blog->content),
                'image' => $blog->image,
                'description' => $blog->description,
                'user_id' => $blog->user_id,
                'category_id' => $blog->category_id,
                'name_category' => $blog->name_category,
                'views' => $blog->views
            );
            Response::json(200, $blog_arr);
        } else {
            Response::json(200, []);
        }
    }

    public function getPopular()
    {
        $blog = $this->model("post");
        $result = $blog->getPopularBlogs();
        $num = $result->rowCount();
        if ($num > 0) {
            $blogs_arr['data'] = [];
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $blog_item = array(
                    'blog_id' => $blog_id,
                    'image' => $image,
                    'title' => $title,
                );
                array_push($blogs_arr, $blog_item);
            }
            Response::json(200, $blogs_arr);
        } else {
            Response::json(200, []);
        }
    }

    public function related_posts($id)
    {
        $blog = $this->model("post");
        $blog->category_id = $id;
        $result = $blog->related($id);
        $num = $result->rowCount();
        if ($num > 0) {

            $blogs_arr['data'] = [];
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $blog_item = array(
                    'blog_id' => $blog_id,
                    'title' => $title,
                    'content' => html_entity_decode($content),
                    'image' => $image,
                    'description' => $description,
                    'user_id' => $user_id,
                    'category_id' => $category_id,
                    // 'name_category' => $name_category,
                    'views' => $views,
                    'created_at' => $created_at
                );
                array_push($blogs_arr, $blog_item);
            }

            Response::json(200, $blogs_arr);
        } else {
            Response::json(404);
        }
    }

    public function search()
    {
        $key = $_POST['search'];
        $list_title = $this->model('post')->search($key);

        if ($list_title != "") {
            Response::json(200, $list_title);
        } else {
            Response::json(404, 'Khong co');
        }
    }

    public function getBlog($trang)
    {
        $so_post = $this->model('post')->getTotal();
        $so_trang = ceil($so_post / 4);
        if ($so_post < 4) {
            $trang_hien_tai = 0;
            $so_trang = 1;
        } else {
            $trang_hien_tai = ($trang - 1) * 4;
        }
        $load_view_user = $this->model('post')->phantrang($trang_hien_tai, 4);
        $arr = [
            'post' => $load_view_user,
            'number_page' => $so_trang
        ];

        Response::json(200, $arr);
    }
    public function getCate(){
        $cate = $this->model('post')->getCategory();
        Response::json(200,$cate);
    }
}

?>