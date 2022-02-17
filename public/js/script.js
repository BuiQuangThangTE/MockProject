$(document).ready(function () {
    function start() {
        home();
        phoBien();
        $('#list_blog').children().remove();
    }
    start();
    $(document).on("click", '.cate_home', function (e) {
        e.preventDefault();
        console.log(e);
        start();

    })
    $(document).on("click", '.cate', function (e) {
        e.preventDefault();
        let id = $(e.target).data('id')
        console.log(id);
        related(id);

    })
    $(document).on("click", '.detail', function (e) {
        e.preventDefault();
        let id = $(e.target).data('id')
        console.log(e);
        detail(id);
    })
    //View index 
    function home() {

        var getPost = 'http://localhost:8000/api/read'
        fetch(getPost)
            .then(function (response) {
                return response.json();
            }).then(function (blogs) {
                var listBlogs = $("#list_blog")
                // console.log(blogs);
                let blog = Object.values(blogs);
                // console.log(blog);
                if (blog.length) {
                    // console.log(blog.length);
                    let str = ""
                    for (let i = 0; i < blog.length - 1; i++) {
                        str += `
                        <div class="wthree">
                            <div class="col-md-4 wthree-left wow fadeInDown animated" data-wow-duration=".8s" data-wow-delay=".2s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.2s; animation-name: fadeInDown;">
                                <div class="tch-img">
                                    <a href=""><img src="http://localhost:8000/${blog[i].image}" class="img-responsive" alt="" style="width: 300px; height: 200px;"></a>
                                </div>
                            </div>
                            <div class="col-md-8 wthree-right wow fadeInDown animated" data-wow-duration=".8s" data-wow-delay=".2s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.2s; animation-name: fadeInDown;">
                                <h3>
                                    <a href="#">${blog[i].title}</a>
                                </h3>
                                <h6>
                                    <a href="#">At</a> ${blog[i].created_at} </h6>
                                <p>${blog[i].description}</p>
                                <div class="bht1">
                                    <a class="detail" data-id=${blog[i].blog_id} " >Read More</a>
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
                </div>

                    `;
                    }
                    str += `
                        <nav aria-label="...">
                        <ul class="pagination">
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active">
                            <span class="page-link">
                            2
                            <span class="sr-only">(current)</span>
                            </span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                        </ul>
                    </nav>
                    
                    `;
                    listBlogs.append(str);
                }
            }).catch(function (err) {
                // console.log('Loi');
            });
    };

    // Bai viet pho bien
    function phoBien() {
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
                    let str = ""
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
                console.log(blog)
                var detail_blog = $("#list_blog")
                // document.getElementById("listBlog").style.display = 'none';

                // console.log(blog);
                // $('#list_blog').children().remove();
                let str = ""
                str += ` 
                <div>
                    <h2 class="w3">SINGLE PAGE</h2>
                    <div class="single">
                        <img src="http://localhost:8000/${blog.image}" class="img-responsive" alt="">
                        <div class="b-bottom">
                            <h5 class="top">${blog.title}</h5>
                            <p>${blog.content}<a class="span_link" href=""><span class="glyphicon glyphicon-comment"></span>0                            </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>10 </a>
                            </p>
    
                        </div>
                    </div>
                    <div class="clearfix"></div>
                   
                        <div class="clearfix"></div>
                </div>
                <div class="coment-form">
                    <h4>Leave your comment</h4>
                    <input type="hidden" value="">
                    <input type="hidden" value="">
                    <input type="hidden" id="reply_to_username" value="">
                    <?php
                    if (isset($_SESSION["login"])) {
            
                        <form action="#" method="post">
                            <input type="text" value="To" name="reply_to" id="reply_to" onfocus="this.value = '';"
                                onblur="if (this.value == '') {this.value = 'Name';}" required=""
                                style="display: none">
                            <input type="email" value="Email" name="email" onfocus="this.value = '';onblur="if (this.value == '') {this.value = 'Email';}" required="">
                            <input type="text" value="Website" name="websie" onfocus="this.value = '';"onblur="if (this.value == '') {this.value = 'Website';}" required="">
                            <textarea onfocus="this.value = '';"onblur="if (this.value == '') {this.value = 'Your Comment...';}" required=""id="comment-detail">Your Comment...</textarea>
                            <input type="button" value="Submit Comment"onclick="submitComment()">
                        </form>
                      
                </div>
                    `;
                detail_blog.html(str);
                // console.log(detail_blog);
                related(blog.category_id);
            })

    }
    // Bài viết theo category
    function related(id) {
        var bvlq = 'http://localhost:8000/api/related_posts/';
        fetch(bvlq + id)
            .then(function (response) {
                return response.json();
            }).then(function (bvlq) {
                var detail_blog = $("#list_blog")
                let lq = Object.values(bvlq);
                if (lq.length ) {
                    let str = '';
                    console.log(lq);
                    for (let i = 0; i < lq.length-1  ; i++) {
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
                    detail_blog.children().remove();
                    detail_blog.append(str);
                }
            })
            // .catch(function (err) {
            //     str='';
            //     detail_blog.append(str);
            // });
    }

    //Login
    $(document).on('submit', '#form_login', function (e) {
        e.preventDefault();
        var username = $("#usernameLog").val();
        var password = $("#passwordLog").val();
        console.log($(this).serialize())
        $(".errorLog").text("");
        $.ajax({
            method: "post",
            url: "http://localhost:8000/users/login",
            data: $(this).serialize(),
            dataType: 'json',

            success: function (data) {

                if (data.error == false) {
                    var html = "<div class='btn-group'> " +
                        "<button type='button' class='btn button_logout '>" + "Xin chào: " + username + "</button> " +
                        "<button type='button' class='btn dropdown-toggle button_logout' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <span class='caret'></span> <span class='sr-only'>Toggle Dropdown</span> </button> " +
                        "<ul class='dropdown-menu menu_user'> " +
                        "<li><a href='#' onclick= 'logout()' >Đăng xuất</a></li> "
                    $("#login").remove();
                    $("#username").html(html);
                    $("#myModal").modal("toggle");
                } else {
                    $(".errorLog").text(data.message);
                }
            }
        })
        // sessionStorage.setItem('user', username);
        // sessionStorage.setItem('pass',password);

    });

    
    
});

$(document).ready(function () {

    $(document).on('submit', '#form_search', function (e) {
        e.preventDefault();
        var search = $("#search").val();
        console.log($(this).serialize())
        $.ajax({
            method: "post",
            url: "http://localhost:8000/api/search/",
            data: {
                search: search,
                action: "search"
            },
            success:function (data) {
                data = JSON.parse(data);
                console.log(data);
                var html = "";

                // console.log(data.length);
                for (var i = 0; i < data.length; i++)
                {
                    html += "<a>" + data[i].title  +"</a></br>";

                }
                $("#results_search").append(html);
            }
        })
    })
    $("#search").keyup(function () {
        var search =  $("#search").val();
        if (search == ""){
            $(".results_search").css("display", "none");
        }else {
            $.ajax({
                method: "post",
                url: "http://localhost:8000/api/search/",
                data: {
                    search: search,
                    action: "search"
                },
                success:function (data) {
                    console.log(data);
                    $(".results_search").css("display", "block");
                    data = JSON.parse(data);

                        var html = "";
                        for (var i = 0; i < data.length; i++)
                        {
                            html += `<li><a class="detail" data-id=${data[i].blog_id} " >${data[i].title} </a></li>`;

                        }
                        $("#results_search").html(html);

                }
            })
        }


    })
    
})