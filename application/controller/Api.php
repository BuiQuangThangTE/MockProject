<?php


class Api extends Controller
{
//    API
    public function read()
    {

        $blog = $this->model("post");
        $result = $blog->read();
        $num = $result->rowCount();
        if ($num > 0) {
            $blogs_arr = array();
            $blogs_arr['data'] = array();

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $blog_item = array(
                    'blog_id' => $blog_id,
                    'title' => html_entity_decode($title),
                    'content' => $content,
                    'image' => $image,
                    'description' => html_entity_decode($description),
                    'user_id' => $user_id,
                    'category_id' => $category_id,
                    // 'name_category' => $name_category,
                    'views' => $views,
                    'created_at' => $created_at
                );
                array_push($blogs_arr, $blog_item);
            }

//             echo json_encode($blogs_arr);
            Response::json(200, $blogs_arr);
        } else {
            Response::json(200, []);
        }
    }

    public function read_single($id)
    {
        $blog = $this->model("post");
        $blog->id = $id;
        $blog->read_single($blog->id);

        if (isset($blog->title)) {
            $blog_arr = array(
                'blog_id' => $blog->blog_id,
                'title' => $blog->title,
                'content' => $blog->content,
                'image' => $blog->image,
                'description' => html_entity_decode($blog->description),
                'user_id' => $blog->user_id,
                'category_id' => $blog->category_id,
                'name_category' => $blog->name_category,
                'views' => $blog->views
            );
            // echo(json_encode($blog_arr));
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
                    'content' => $content,
                    'image' => $image,
                    'description' => html_entity_decode($description),
                    'user_id' => $user_id,
                    'category_id' => $category_id,
                    // 'name_category' => $name_category,
                    'views' => $views,
                    'created_at' => $created_at
                );
                array_push($blogs_arr, $blog_item);
            }
//            $row = $result->fetchAll();
//            $blogs_arr=[$row];
            Response::json(200, $blogs_arr);
        } else {
            Response::json(404);
        }
    }

    public function search ()
    {
//        if (isset($_POST['action']) == "search") {
            $key = $_POST['search'];
            $list_title = $this->model('post')->search($key);

            if ($list_title != ""){
                Response::json(200,$list_title);
            }
            else {
                Response::json(404,'Khong co');
            }
        }
//    }
}
?>