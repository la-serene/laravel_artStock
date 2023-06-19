<script>
    let quinxCountShow = $('#quinxCount-show');
    let quinxCount = parseInt(quinxCountShow.text());

    const upBtn = $("#btn-upvote");
    if (!upBtn.find('i').hasClass('clicked')) {
        upBtn.click(function () {
            let increment = updateQuinx("up");
            $.ajax({
                url: "http://laravel_artstock.test/user/post/update/" + "{{ $post->getAttribute('id') }}" + "/" + increment,
                type: 'GET',
                success: function () {
                    console.log("upvote success");
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            })
        })
    }

    const downBtn = $("#btn-downvote");
    if (!downBtn.find('i').hasClass("clicked")) {
        downBtn.click(function () {
            let increment = updateQuinx("down");
            $.ajax({
                url: "http://laravel_artstock.test/user/post/update/" + "{{ $post->getAttribute('id') }}" + "/" + increment,
                type: 'GET',
                success: function () {
                    console.log("downvote success");
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            })
        })
    }

    function updateQuinx(type) {
        let increment = 0;
        if (type === "up") {
            if (downBtn.find('i').hasClass("clicked")) {
                increment = 2;
                downBtn.find('i').removeClass("color-red clicked");
                upBtn.find('i').addClass("color-green clicked");
            } else if (upBtn.find('i').hasClass('clicked')) {
                increment = -1;
                upBtn.find('i').removeClass("color-green clicked");
            } else {
                increment = 1;
                upBtn.find('i').addClass("color-green clicked");
            }
        } else if (type === "down") {
            if (upBtn.find('i').hasClass("clicked")) {
                increment = -2;
                upBtn.find('i').removeClass("color-green clicked");
                downBtn.find('i').addClass("color-red clicked");
            } else if (downBtn.find('i').hasClass("clicked")) {
                increment = 1;
                downBtn.find('i').removeClass("color-red clicked");
            } else {
                increment = -1;
                downBtn.find('i').addClass("color-red clicked");
            }
        }
        quinxCount += increment;
        quinxCountShow.text(quinxCount);
        return increment;
    }
</script>
