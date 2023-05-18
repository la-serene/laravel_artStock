<script>
    $(document).ready(function () {
        let valorCountShow = $('#valorCount-show');
        let valorCount = parseInt(valorCountShow.text());

        const upBtn = $("#btn-upvote");
        console.log(upBtn)
        console.log(upBtn.find("i"))
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
                    updateValor("up")
                    upBtn.find('i').addClass("color-green clicked");
                    downBtn.find('i').removeClass("color-red clicked");
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            })
        })

        const downBtn = $("#btn-downvote");
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
                    updateValor("down")
                    upBtn.find('i').removeClass("color-green clicked");
                    downBtn.find('i').addClass("color-red clicked");
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            })
        })

        function updateValor(type) {
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
            valorCount += increment;
            valorCountShow.text(valorCount);
        }
    })
</script>
