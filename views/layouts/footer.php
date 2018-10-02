<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2018 | <a href="https://github.com/Specialist001/in-shop.uz" target="_blank">Repo on GitHub</p>
                <p class="pull-right">inShop.uz</p>
            </div>
        </div>
    </div>
 </footer><!--/Footer-->



<script src="/template/default/js/jquery.js"></script>
<script src="/template/default/js/jquery.cycle2.min.js"></script>
<script src="/template/default/js/jquery.cycle2.carousel.min.js"></script>

<script src="/template/default/js/bootstrap.min.js"></script>
<script src="/template/default/js/jquery.scrollUp.min.js"></script>
<script src="/template/default/js/price-range.js"></script>
<script src="/template/default/js/jquery.prettyPhoto.js"></script>
<script src="/template/default/js/main.js"></script>

<script>
    $(document).ready(function () {
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>

<script>
    $(document).ready(function () {
        $(".del-from-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/delAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>

    </body>
</html>