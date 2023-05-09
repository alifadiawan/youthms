{{-- <script>
    const navEl = document.querySelector(.navbar);

    window.addEventListener('scroll', () => {
        if(window.scrollY >= 56){
            navEl.classList.add('navbar-scrolled');
        }
    });
</script> --}}

<script>
    
    window.onscroll = function() {
        scrollFunction()
    };
    
    var scroll = document.getElementById("navbar");
    
    function scrollFunction() {
        if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
            document.getElementById("navbar").style.background = "white";
            scroll.classList.add(" scrolled");
        } else {
            document.getElementById("navbar").style.background = "#4070B5";
        }
    }
</script>


