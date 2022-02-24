$(document).ready(function () {
    function start() {
        
        homePage(1);
        populars();
        category();
        $('#list_blog').children().remove();
        $('#related_blog').children().remove();
    }
    start();

    $(document).on("click", '.cate_home', function (e) {
        e.preventDefault();
        start();

    })
    $(document).on("click", '.cate', function (e) {
        e.preventDefault();
        let id = $(e.target).data('id')
        categories(id);
        $('#related_blog').children().remove();

    })
    $(document).on("click", '.detail', function (e) {
        e.preventDefault();
        let id = $(e.target).data('id')
        // console.log(e);
        // $('#popular_blog').children().remove();
        detail(id);
        $('#results_search').children().remove();
    })
    $(document).on('click', '.page-link', function (e) {
        console.log('clicked')
        e.preventDefault();
        $('#list_blog').children().remove();
        let page = $(e.target).data('page');
        homePage(page);
    })
    //View index 
    function homePage(page) {
        var getPost = 'http://localhost:8000/Api/getBlog/'
        fetch(getPost + page)
            .then(response => response.json())
            .then(function (data) {
                var listBlogs = $("#list_blog")
                let blogs = data.post
                let str = ""
                blogs.forEach(blog => {
                    str += `<div class="wthree">
                                <div class="col-md-4 wthree-left wow fadeInDown animated" data-wow-duration=".8s" data-wow-delay=".2s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.2s; animation-name: fadeInDown;">
                                    <div class="tch-img">
                                        <a href=""><img src="http://localhost:8000/${blog.image}" class="img-responsive" alt="" style="width: 300px; height: 200px;"></a>
                                    </div>
                                </div>
                                <div class="col-md-8 wthree-right wow fadeInDown animated" data-wow-duration=".8s" data-wow-delay=".2s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.2s; animation-name: fadeInDown;">
                                    <h3>
                                        <a class="detail" data-id=${blog.blog_id}>${blog.title}</a>
                                    </h3>
                                    <h6>
                                        <a href="#">At</a> ${blog.created_at} </h6>
                                    <p>${blog.description}</p>
                                    <div class="bht1">
                                        <a class="detail" data-id=${blog.blog_id} >Read More</a>
                                    </div>
                                    <div class="soci">
                                        <ul>
                                            <li class="hvr-rectangle-out"><a class="twit" href="#"></a></li>
                                            <li class="hvr-rectangle-out"><a class="pin" href="#"></a></li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>`;
                })
                str += `
                        <nav aria-label="..." >
                            <ul class="pagination">
                        `;
                for (let i = 1; i <= data.number_page; i++) {
                    str += `
                            <li class="${i == page ? 'active' : ''}  page-item"><a class="page-link" data-page=${i}>${i}</a></li>
                         `;
                }
                // 
                listBlogs.append(str);
            }).catch(function (err) {
                // console.log('Loi');
            });
    }

    // Bai viet pho bien
    function populars() {
        // Baif viet pho bien
        var popularPost = 'http://localhost:8000/api/getPopular';
        fetch(popularPost)
            .then(function (response) {
                return response.json();
            }).then(function (populars) {
                var popularPosts = document.querySelector("#popular_blog")
                // console.log(populars);
                let popular = Object.values(populars);
                // console.log(blog);
                if (popular.length) {
                    // console.log(popular.length);
                    let str = " <h4>Bài viết phổ biến</h4>"
                    for (let i = 0; i < popular.length - 1; i++) {
                        // console.log(popular[i]);
                        str += ` 
                            <div class="blog-grid-left">
                                <a href="#"><img src="http://localhost:8000/${popular[i].image}" class="img-responsive" alt=""></a>
                            </div>
                            <div class="blog-grid-right">
                                <h5><a class="detail" data-id=${popular[i].blog_id}>${popular[i].title}</a></h5>
                            </div>
                            <div class="clearfix"></div>
                            <div class="clearfix"></div>
                        `;
                    }
                    popularPosts.innerHTML = str;
                }

            })
    }

    // Bai viet chi tiet
    function detail(id) {
        // document.getElementById("detail_blogs").style.display = 'block';
        var singlePost = 'http://localhost:8000/api/read_single/';
        fetch(singlePost + id)
            .then(function (response) {
                return response.json();
            }).then(function (blog) {
                // console.log(blog)
                var detail_blog = $("#list_blog")
                // document.getElementById("listBlog").style.display = 'none';

                // console.log(blog);
                $('#populars').children().remove();
                let str = ""
                str += ` 
                    <div>
                        <h2 class="w3">SINGLE PAGE</h2>
                        <div class="single">
                            <img src="http://localhost:8000/${blog.image}" class="img-responsive" alt="">
                            <div class="b-bottom">
                                <h5 class="top">${blog.title}</h5>
                            </div>
                            <div>${blog.content}</div> 
                        </div>
                        
                        <div class="clearfix"></div>
                       
                        <div class="clearfix"></div>
                    </div>
                    <div class="coment-form">
                        <h4>Leave your comment</h4>
                        <input type="hidden" value="">
                        <input type="hidden" value="">
                        <input type="hidden" id="reply_to_username" value="">
                            <form action="#" method="post">
                                <textarea onfocus="this.value = '';"onblur="if (this.value == '') {this.value = 'Your Comment...';}" required=""id="comment-detail">Your Comment...</textarea>
                                <input type="button" value="Submit Comment"onclick="submitComment()">
                            </form>
                          
                    </div>
                        `;
                detail_blog.html(str);
                related(blog.category_id, blog.blog_id);
            })

    }
    // Bai viet liên quan
    function related(id, blog_id) {
        var bvlq = 'http://localhost:8000/api/related_posts/';
        fetch(bvlq + id)
            .then(function (response) {
                return response.json();
            }).then(function (bvlq) {
                var detail_blog = $("#related_blog")
                let lq = Object.values(bvlq);
                let str = '<h4>Bài viết liên quan</h4>';

                if (lq.length) {
                    // console.log(lq);
                    let count = 0;
                    for (let i = 0; i < lq.length; i++) {
                        if (count < 5 && lq[i].blog_id && lq[i].blog_id != blog_id) {
                            str += `          
                            <div class="blog-grid-left">
                                <a href="#"><img src="http://localhost:8000/${lq[i].image}" class="img-responsive" alt=""></a>
                            </div>
                            <div class="blog-grid-right">
                                <h5><a class="detail" data-id=${lq[i].blog_id}>${lq[i].title}</a></h5>
                            </div>
                            <div class="clearfix"></div>
                            <div class="clearfix"></div>
                        `;
                            count++
                        }
                    }
                }

                detail_blog.children().remove();
                detail_blog.append(str);

            })
        // .catch(function (err) {
        //     str='';
        //     detail_blog.append(str);
        // });
    }
    // Bài viết theo category
    function categories(id) {
        var bvlq = 'http://localhost:8000/api/related_posts/';
        fetch(bvlq + id)
            .then(function (response) {
                return response.json();
            }).then(function (bvlq) {
                var detail_blog = $("#list_blog")
                let lq = Object.values(bvlq);
                if (lq.length) {
                    let str = '';
                    // console.log(lq);
                    for (let i = 0; i < lq.length; i++) {
                        if (lq[i].blog_id) {
                            str += ` 
                                <div class="col-md-4 blog-grid" style="height: 500px ">
                                    <div class="blog-grid-left1">
                                    <a class="detail" data-id=${lq[i].blog_id} ><img src="http://localhost:8000/${lq[i].image}" alt=" "
                                    class="img-responsive" style="width: 300px; height: 200px;"></a>
                                    </div>
                                    <div class="blog-grid-right1">
                                    <a class="detail" data-id=${lq[i].blog_id}>${lq[i].title}</a>
                                        <h4><?php echo $music["created_at"] ?></h4>
                                        <p>${lq[i].description}</p>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="more m1">
                                    <a class="detail" data-id=${lq[i].blog_id} >Read More</a>
                                    </div>
                                <div class="clearfix"></div>
                            </div>      
                `;
                        }

                    }
                    detail_blog.children().remove();
                    detail_blog.append(str);
                }
            })
        // .catch(function (err) {
        //     str='';
        //     detail_blog.append(str);
        // });
    }
    // Lấy danh muc navbar
    function category() {
        var category = 'http://localhost:8000/Api/getCate';
        fetch(category)
            .then(function (response) {
                return response.json();
            }).then(function (categories) {
                var cate_list = $("#list_category")
                let cate = Object.values(categories);
                let str = '<li class="active act cate_home"><a href="#" data-id="home">Home</a></li>';
                if (cate.length) {
                    for (let i = 0; i < cate.length; i++) {
                    
                        str += `                  
                        <li class="cate"><a href="#" data-id="${cate[i].category_id}">${cate[i].name_category}</a></li>
                        `;
                    }
                    // console.log(cate_list)

                }
                $('#list_category').children().remove();
                cate_list.append(str);
            })
    }
    //Login
    $(document).on('submit', '#form_login', function (e) {
        e.preventDefault();
        var username = $("#usernameLog").val();
        var password = $("#passwordLog").val();
        // console.log($(this).serialize())
        $(".errorLog").text("");
        $.ajax({
            method: "post",
            url: "http://localhost:8000/users/login",
            data: $(this).serialize(),
            dataType: 'json',

            success: function (data) {
                if (data.error == false) {
                    var html = "<div class='btn-group' id=''> " +
                        "<button type='button' class='btn button_logout '>" + "Xin chào: " + username + "</button> " +
                        "<button type='button' class='btn dropdown-toggle button_logout' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <span class='caret'></span> <span class='sr-only'>Toggle Dropdown</span> </button> " +
                        "<ul class='dropdown-menu menu_user'> " +
                        "<li><a class='logout' >Đăng xuất</a></li> "
                    $("#login").remove();
                    $("#username").html(html);
                    $("#myModal").modal("toggle");
                } else {
                    $(".errorLog").text(data.message);
                }
            }
        })
        sessionStorage.setItem('user', username);
        // sessionStorage.setItem('pass',password);
    });
    // logout
    $(document).on('click', '.logout', function (e) {
        e.preventDefault();
        $('#username').children().remove();
        var html="<a class='btn button_login' data-toggle='modal' data-target='#myModal' id='login'>Login</a>";
        $("#username").html(html);
        sessionStorage.clear();
    })
    // search
    $(document).ready(function () {
        $(document).on('submit', '#form_search', function (e) {
            e.preventDefault();
            var search = $("#search").val();
            $.ajax({
                method: "post",
                url: "http://localhost:8000/api/search/",
                data: {
                    search: search,
                    action: "search"
                },
                success: function (data) {
                    data = JSON.parse(data);
                    console.log(data);
                    var html = "";
                    // console.log(data.length);
                    for (var i = 0; i < data.length; i++) {
                        html += "<a>" + data[i].title + "</a></br>";
                    }
                    $("#results_search").append(html);
                }
            })
        })
        $("#search").keyup(function () {
            var search = $("#search").val();
            if (search == "") {
                $(".results_search").css("display", "none");
            } else {
                $.ajax({
                    method: "post",
                    url: "http://localhost:8000/api/search/",
                    data: {
                        search: search,
                        action: "search"
                    },
                    success: function (data) {
                        console.log(data);
                        $(".results_search").css("display", "block");
                        data = JSON.parse(data);

                        var html = "";
                        for (var i = 0; i < data.length; i++) {
                            html += `<li><a class="detail" data-id=${data[i].blog_id} " >${data[i].title} </a></li>`;
                        }
                        $("#results_search").html(html);
                    }
                })
            }
        })
    })
})