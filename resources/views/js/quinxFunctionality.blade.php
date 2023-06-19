<script>
    let quinxCountShow = $('#quinxCount-show');
    let quinxCount = parseInt(quinxCountShow.text());

    const upBtn = $("#btn-upvote");
    if (!upBtn.find('i').hasClass('clicked')) {
        upBtn.click(function () {
            @php
                $updateType = "incre";
            @endphp
            $.ajax({
                url: "{{ route('post.updateQuantity', [
                    'postId' => $post->getAttribute('id'),
                    'updateType' => $updateType,
                ]) }}",
                type: 'GET',
                success: function () {
                    updateQuinx("up")
                    upBtn.find('i').addClass("color-green clicked");
                    downBtn.find('i').removeClass("color-red clicked");
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
            @php
                $updateType = "decre";
            @endphp
            $.ajax({
                url: "{{ route('post.updateQuantity', [
                    'postId' => $post->getAttribute('id'),
                    'updateType' => $updateType,
                ]) }}",
                type: 'GET',
                success: function () {
                    updateQuinx("down")
                    upBtn.find('i').removeClass("color-green clicked");
                    downBtn.find('i').addClass("color-red clicked");
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
            } else {
                increment = 1;
            }
        } else if (type === "down") {
            if (upBtn.find('i').hasClass("clicked")) {
                increment = -2;
            } else {
                increment = -1;
            }
        }
        quinxCount += increment;
        quinxCountShow.text(quinxCount);
    }
</script>
