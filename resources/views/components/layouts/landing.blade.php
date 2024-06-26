<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    >
    <title>Apsensi - Home</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Lexend:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"
    >
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-lexend antialiased overflow-y-auto">
    <div>
        {{ $slot }}
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@2.1.0/dist/iconify-icon.min.js"></script>
    <script src="{{ asset('js/particle.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
<script>
    $(window).on("scroll", function() {
        var header = $("#header");
        var imgLight = $(".logo-light");
        var imgDark = $(".logo-dark");
        var btnTalk = $("#btn-talk");


        if ($(window).scrollTop() > 50) {
            header.addClass("bg-white");
            header.removeClass("bg-transparent");
            imgLight.addClass("hidden");
            imgDark.removeClass("hidden");
            header.removeClass("text-white");
            btnTalk.removeClass("bg-transparent");
            btnTalk.addClass("bg-secondary text-white");
        } else {
            header.addClass("bg-transparent");
            header.removeClass("bg-white");
            imgLight.removeClass("hidden");
            imgDark.addClass("hidden");
            header.addClass("text-white");
            btnTalk.addClass("bg-transparent");
            btnTalk.removeClass("bg-secondary text-white");
        }
    });

    $(".accordion-header").click(function() {
        $(this).next(".accordion-content").slideToggle();
        $(this).parent().siblings().find(".accordion-content").slideUp();
    });
</script>

</html>
