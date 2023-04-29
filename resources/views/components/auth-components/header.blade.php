<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CLINIC | LOGIN</title>
    <link rel="stylesheet" href="{{ asset('assets/css/theme/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js">
    </script>


    <script>
        if (!window.jQuery) {
            var scriptd = document.createElement('script');
            var scatt = document.createAttribute("src"); // Create a "class" attribute
            scatt.value = "{{ asset('assets/js/jquery.min.js') }}";
            scriptd.setAttributeNode(scatt);
            document.head.appendChild(scriptd);
        }
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


</head>
<style>
    .form-check-label {
        margin-left: 0px !important;
    }
    span.invalid-feedback {
    text-align: left;
}
</style>

<body>


    <section class="fixed-background">

        <img class="background" src="{{ asset('assets/images/background.jpg') }}" alt="">
        <div class="blackcover"></div>

    </section>