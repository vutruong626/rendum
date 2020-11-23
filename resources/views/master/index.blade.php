<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <title>Winning lottery program</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous"></script>
</head>

<body>
    {{-- <audio class="audio" id="myAudio" controls autoplay>
        <source src="{{ asset('audio/XoSo.mp3') }}" type="audio/mpeg">
        Your browser does not support the audio tag.
    </audio> --}}

    {{-- <audio controls autoplay loop id="myAudio">
        <source src="{{ asset('audio/XoSo.mp3') }}" type="audio/ogg">
        <source src="{{ asset('audio/XoSo.mp3') }}" type="audio/mpeg">
    </audio> --}}

    {{-- <figure>
        <figcaption>Listen to the T-Rex:</figcaption>
        <iframe id="myAudio" controls autoplay loop src="{{ asset('audio/test.mp3') }}">
            Your browser does not support the
            <code>audio</code> element.
        </iframe>
    </figure> --}}

    {{-- <iframe src="{{ asset('audio/test.mp3') }}" style="display:none" allow="autoplay"
        id="iframeAudio">
    </iframe>

    <audio autoplay loop id="playAudio">
        <source src="{{ asset('audio/test.mp3') }}">
    </audio>



    <button onclick="playAudio()" type="button">Play Audio</button>
    <button onclick="pauseAudio()" type="button">Pause Audio</button> --}}


    <div class="container-fluid mt-5">
        <div class="title text-center text-danger">
            <div class="alert alert-warning" role="alert">
                <h1 class="alert-heading text-uppercase text-danger">Winning lottery program</h1>
                <a href="#">
                    <h2 class="text-bold" data-toggle="modal" data-target="#giainhat">First Prize</h2>
                </a>
            </div>
            @if (date('Y-m-d H:i') === $time_server)
                <div id="random"></div>
            @else
                <div id="non-random">00000</div>
            @endif

        </div>
        @include('layout.random')
    </div>
    <div id="loading">
    </div>
    <div class="modal fade" id="giainhat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img class="w-100" src="/img/gioi-thieu-xe-mercedes-c200-exclusive.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="{{ asset('js/index.js') }}"></script>
    <script>
        function showLoading() {
            let loading = document.getElementById('loading');
            loading.style.display = 'block';
        }

        function hideLoading() {
            let loading = document.getElementById('loading');
            loading.style.display = 'none';
        }

        hideLoading();

        function playAudio() {
            document.getElementById("myAudio").play();
        }

        function pauseAudio() {
            document.getElementById("myAudio").pause();
        }

        $(document).ready(function() {});

    </script>

    <script>
        var user = <?php echo $user; ?>;        var ran_num;
        let time = moment().format('YYYY-MM-DD HH:mm');;
        var ran_list;

        function randomNumber() {
            ran_num = setInterval(() => {
                let now = moment().format('YYYY-MM-DD HH:mm');
                let now_serve = "<?php echo $time_server; ?>";
                let index = random(99, 00);
                if (now === now_serve) {
                    document.getElementById("random").innerHTML = user[index].code;
                }
            }, 300);
        }


        function randomListUser() {
            ran_list = setInterval(() => {

                let now = moment().format('YYYY-MM-DD HH:mm');
                let now_serve = "<?php echo $time_server; ?>";

                if (now_serve === now) {
                    var index = random(99, 00);
                    var code = user[index].code;
                    var nameUser = user[index].username;

                    axios.get('/get-user-prize-first').then(function(response) {
                        let data = response.data;
                        if (data.length > 9) {
                            clearInterval(ran_num);
                            clearInterval(ran_list);
                        } else if (data.length < 10) {
                            axios.post('/users', {
                                code: code
                            }).then(function(response) {
                                let data_store = response.data;
                                $('#user_lucky').append(`
                                    <tr>
                                        <td>${data.length + 1 }</td>
                                        <td>${data_store.code}</td>
                                        <td>${data_store.username}</td>
                                        <td>mes</td>
                                    </tr>`);
                                user.splice(index, 1);
                            }).catch(function(error) {
                                console.log(error);
                            });
                        }
                        console.log(data);

                    }).catch(function(error) {
                        console.log(error);
                    });



                }
            }, 2000);
        }
        randomNumber();
        randomListUser();

    </script>

</body>

</html>
