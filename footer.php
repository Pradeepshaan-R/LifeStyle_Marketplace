<!-- Footer -->
<footer class="sticky-footer bg-transparent">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; SenzMarket 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="vendor/bootstrap-4.5.0/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" data-auto-replace-svg="nest"></script>
<!--<script src="vendor/fontawesome-free/js/all.js"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>-->
<script type="text/javascript">
//*********************** Sidebar Script ***********************//
    $(document).ready(function () {
        $(".sidebar-btn").click(function () {
            //                    alert('happy');
            $(".sidebar").toggleClass("wrapper collapsex");
            //                    $('[data-toggle="tooltip"]').tooltip();
            $(".content").toggleClass("wrapper collapsex");
        });
    });
//Dark Mode
    function myFunction() {
        var element = document.body;
        element.classList.toggle("dark-mode");
    }
    //***************** Settings Page *************************//
//    $(".tab").click(function () {
//        $(this).children().siblings().removeClass("active");
//        $(this).children().addClass("active");
//    });
    $(".body-info").click(function () {
        $(".active").removeClass("active");
        $(this).addClass("active");
    });
</script>
</body>

</html>