<!DOCTYPE html>
<html lang="en-US" id="main_html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <title>Innovations</title>

    <!-- <link rel='stylesheet' id='pearl-theme-styles-css'
    href='https://plantprotection.kilimo.go.ke/wp-content/themes/pearl/assets/css/app.css?ver=3.3.7' type='text/css'
    media='all' /> -->

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <link rel='stylesheet' id='stm_default_google_font-css'
        href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C200%2C300%2C400%2C400i%2C500%2C600%2C700%2C800%2C900%7CRoboto%3A100%2C200%2C300%2C400%2C400i%2C500%2C600%2C700%2C800%2C900&#038;ver=3.3.7#038;subset=latin%2Clatin-ext'
        type='text/css' media='all' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            margin: 0;
            background: #fff;
        }

        .video-background {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            overflow: hidden;
            z-index: -1;
        }

        .video-foreground {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            background-size: cover;
            background-position: center center;
            pointer-events: none;
        }

        iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .content {
            position: relative;
            z-index: 1;
            text-align: center;
            padding: 20px;
            color: #fff;
        }

        .stm-header {
            background: #fff;
        }

        form {
            background: #fff;
            width: 40%;
            margin: auto;
            padding: 20px 0px 0 20px;
            border-radius: 10px;
        }

        .main {
            background: #fff;
        }

        a {
            text-decoration: none !important;
        }

        #section3 {
            background: #4caf50;

        }

        #section3 h2,
        #section3 p {
            color: #fff;
        }

        #section3 p {
            font-size: 18px;
        }

        #section3 h2 {
            font-size: 24px;
        }

        #hover-green:hover,
        #hover-green:hover p,
        #hover-green:hover h5 {
            background: #348a21;
            color: #fff
        }

        #hover-green p {
            color: #333;
        }

        #hover-green:hover a.rounded-lg {
            background: #fff;
            color: #348a21;
        }

        #hover-green a.rounded-lg {
            background: #348a21;
        }

        #animation-carousel img {
            height: 200px !important;
            border: 2px solid #348a21;
        }

        #partners img {
            width: 200px;
        }

        footer {
            background: #3d3d3d !important;
        }

        footer h2,
        footer li,
        footer span {
            color: #fff !important;
        }


        .showcase {
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            padding: 0 20px;
        }

        .video-container {
            position: absolute;
            /*top: 0;*/
            /*left: 0;*/
            width: 100%;
            height: 80%;
            overflow: hidden;
            background: var(--primary-color) url('./https://traversymedia.com/downloads/cover.jpg') no-repeat center center/cover;
        }

        .video-container video {
            min-width: 100%;
            min-height: 100%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            object-fit: cover;
        }

        .video-container:after {
            content: '';
            z-index: 1;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.5);
            position: absolute;
        }

        .content {
            z-index: 2;
        }

        #header-input input {
            width: 356px;
            margin-left: -120px;
            margin-top: -14px;
            border-radius: 12px;
        }

        /* Style for the container */


        /* Style for the first column (75%) */
        .column1 {
            flex: 3;
            /* 3/4 of the available space */
            background-color: #f0f0f0;
            padding: 20px;
        }

        /* Style for the second column (25%) */
        .column2 {
            flex: 1;
            /* 1/4 of the available space */
            background-color: #f0f0f0;
            padding: 20px;
            margin-left: 10px;
        }

        .container1 {
            width: 98%;
            /* Make the container full width */
            display: flex;
            /* Use flexbox to create a flexible layout */
            margin: auto;
        }



        #container {
            display: flex;
            padding: 0 28px;
        }

        #column1 {
            flex: 1;
            /* Take up one-third of the width */
            padding: 20px;
        }

        #column2 {
            border-left: 5px solid #348a21;
            flex: 3;
            /* Take up two-thirds of the width */
            padding: 20px;
        }



        /* Styles for the slideshow container */
        .slideshow-container {
            position: relative;
            margin: auto;
        }

        /* Styles for each slide */
        .mySlides {
            display: none;
        }

        /* Style for the navigation dots */
        .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active {
            background-color: #717171;
        }

        /* Styles for logos in a slide */
        .logo-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* Two columns */
            gap: 10px;
            /* Adjust the gap as needed */
        }

        .logo {
            width: 100%;
            /* Adjust the width as needed */
        }

        #partners img {
            width: 200px;
            height: 158px;
            width: 341px;
        }
    </style>
</head>

<body>
    @yield('content')
    


</body>


</html>
