<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>@yield('title')</title>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#404B5C',
                        secondary: '#828282',
                        customGreen: '#0E9F6E',
                        customBlue: '#1C73FF',
                        customRed: '#F05252'
                    }
                }
            }
        }
    </script>
</head>

<body>
    @include('components.navbar')

    <div class="m-24 space-y-14">
        @yield('content')
    </div>

    @include('components.footer')
</body>

</html>
