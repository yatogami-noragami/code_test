<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- font awesome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- bootstrap cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- main css --}}
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    <title>@yield('title')</title>
</head>

<body>

    <div class="container-fluid py-3">
        <div class="row">
            {{-- Admin Panel --}}
            <div class="d-flex justify-content-between  ">
                <button class="btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#adminPanel"
                    aria-controls="adminPanel">
                    <i class="fa-solid fa-bars fs-3"></i>
                </button>

                <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="adminPanel"
                    aria-labelledby="adminPanelLabel">
                    <div class="offcanvas-header">
                        <i class="fa-solid fa-truck fs-3"></i>
                        <h5 class="offcanvas-title" id="staticBackdropLabel">Admin Panel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div>
                            <div class="row">
                                <a href="{{ route('item#list') }}"
                                    class="btn @if ($tabName == 'item') btn-primary @endif  mb-3">
                                    <div class=" d-flex align-items-center fs-5">
                                        <i class="fa-solid fa-boxes-stacked me-3"></i>
                                        <span>Item</span>
                                    </div>
                                </a>

                                <a href="{{ route('category#list') }}"
                                    class="btn @if ($tabName == 'category') btn-primary @endif mb-3 ">
                                    <div class=" d-flex align-items-center fs-5">
                                        <i class="fa-solid fa-list me-3"></i>
                                        <span>Category</span>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        @yield('content')


    </div>

    {{-- Live Toast --}}
    @if (session('Message'))
        <div class="toast-container position-fixed bottom-0 end-0 p-3 d-block">
            <div id="liveToast" class="toast bg-primary" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">

                    <strong class="me-auto fw-bold">Notification</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <h6 class=" fw-bold text-center">{{ session('Message') }}</h6>
                </div>
            </div>
        </div>
    @endif

    {{-- Back To Top Button --}}
    <button class="btn p-3 z-50" id="backToTopBtn">
        <i class="fa-solid fa-angles-up fw-bold fs-1" id="upArrow"></i>
    </button>



</body>

{{-- jQuery cdn --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
{{-- bootstrap cdn --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
{{-- main js --}}
<script src="{{ asset('js/master.js') }}"></script>

</html>
