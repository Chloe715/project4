document.addEventListener("DOMContentLoaded", function() {
        var lastScrollTop = 0;
        var navbar = document.querySelector('.navbar-container');

        window.addEventListener('scroll', function() {
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop) {
                // 向下滾動
                navbar.classList.add('hidden');
            } else {
                // 向上滾動
                navbar.classList.remove('hidden');
            }

            lastScrollTop = scrollTop;
        });
    });