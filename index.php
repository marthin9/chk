<!DOCTYPE html>
<html class="loading">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>GITWIZARD CHECKER</title>
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/hyper.css?v=1.3">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/app-lite.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/colors/palette-gradient.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <style>
        html body {
            background: #1a1a1a;
        }

        .form-checker, .form-control {
            background-color: #2a2a2a;
            color: #ffffff;
            border: 2px solid #3498db;
            border-radius: 8px;
            font-weight: bold;
        }

        button.btn.btn-play.btn-glow.btn-bg-gradient-x-blue-cyan.text-white {
            background: linear-gradient(to top, #3498db, #2ecc71);
            border-radius: 8px;
            border: 2px solid #2ecc71;
            font-weight: bold;
        }

        button.btn.btn-stop.btn-glow.btn-bg-gradient-x-red-pink.text-white {
            background: linear-gradient(to top, #e74c3c, #e67e22);
            border-radius: 8px;
            border: 2px solid #e67e22;
            font-weight: bold;
        }

        .card {
            margin-bottom: 1.875rem;
            border: none;
            -webkit-box-shadow: 0 1px 15px 1px rgba(62, 57, 107, 0.7);
            box-shadow: 0 1px 15px 1px rgba(62, 57, 107, 0.7);
            background: #2a2a2a;
            border-radius: 8px;
        }

        .card-body h5 {
            font-weight: bold;
            font-family: "Teko";
            color: #ecf0f1;
            letter-spacing: 1px;
        }

        .card .card-title {
            font-size: 1.12rem;
            font-weight: bold;
            letter-spacing: .05rem;
            color: #ecf0f1;
            letter-spacing: 2px;
        }

        .card-body h4 {
            font-weight: bold;
            color: #ecf0f1;
            letter-spacing: 1px;
        }

        .badge {
            font-weight: bold;
            border-radius: 8px;
        }
    </style>
</head>

<body class="vertical-layout" data-color="bg-gradient-x-purple-blue">
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before mb-3"></div>
            <div class="content-body container">
                <center>
                    <div class="hyper_logo"></div>
                </center>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <h4>DROP CCS HERE</h4>
                                <textarea rows="6" class="form-control text-center form-checker" placeholder="DROP CCS HERE"></textarea><br>
                                <input type="text" id="skkey" class="form-control text-center" placeholder="Enter Secret Key (SK)"><br>
                                <button class="btn btn-play btn-glow btn-bg-gradient-x-blue-cyan text-white" style="width: 49%; float: left;">START</button>
                                <button class="btn btn-stop btn-glow btn-bg-gradient-x-red-pink text-white" style="width: 49%; float: right;" disabled>STOP</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 liner">
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5>HITS <span class="badge badge-success float-right charge">0</span></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 liner">
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5>LIVE <span class="badge badge-success float-right aprovadas">0</span></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 liner">
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5>DEAD <span class="badge badge-danger float-right reprovadas">0</span></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 liner">
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5>Total <span class="badge badge-primary float-right carregadas">0</span></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body hiter">
                                <div class="float-right">
                                    <button type="show" class="btn btn-primary btn-sm show-charge"><i class="fa fa-eye-slash"></i></button>
                                    <button class="btn btn-success btn-sm btn-copy1"><i class="fa fa-copy"></i></button>
                                </div>
                                <h4 class="card-title mb-1">HITS</h4>
                                <div id='lista_charge'></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body hiter">
                                <div class="float-right">
                                    <button type="show" class="btn btn-primary btn-sm show-lives"><i class="fa fa-eye-slash"></i></button>
                                    <button class="btn btn-success btn-sm btn-copy"><i class="fa fa-copy"></i></button>
                                </div>
                                <h4 class="card-title mb-1">LIVE</h4>
                                <div id='lista_aprovadas'></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body hiter">
                                <div class="float-right">
                                    <button type='hidden' class="btn btn-primary btn-sm show-dies"><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-danger btn-sm btn-trash"><i class="fa fa-trash"></i></button>
                                </div>
                                <h4 class="card-title mb-1">DEAD</h4>
                                <div style='display: none;' id='lista_reprovadas'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="theme-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>

        <script>
            $(document).ready(function () {
                $('.show-charge').click(function () {
                    var type = $('.show-charge').attr('type');
                    $('#lista_charge').slideToggle();
                    if (type == 'show') {
                        $('.show-charge').html('<i class="fa fa-eye"></i>');
                        $('.show-charge').attr('type', 'hidden');
                    } else {
                        $('.show-charge').html('<i class="fa fa-eye-slash"></i>');
                        $('.show-charge').attr('type', 'show');
                    }
                });

                $('.show-lives').click(function () {
                    var type = $('.show-lives').attr('type');
                    $('#lista_aprovadas').slideToggle();
                    if (type == 'show') {
                        $('.show-lives').html('<i class="fa fa-eye"></i>');
                        $('.show-lives').attr('type', 'hidden');
                    } else {
                        $('.show-lives').html('<i class="fa fa-eye-slash"></i>');
                        $('.show-lives').attr('type', 'show');
                    }
                });

                $('.show-dies').click(function () {
                    var type = $('.show-dies').attr('type');
                    $('#lista_reprovadas').slideToggle();
                    if (type == 'show') {
                        $('.show-dies').html('<i class="fa fa-eye"></i>');
                        $('.show-dies').attr('type', 'hidden');
                    } else {
                        $('.show-dies').html('<i class="fa fa-eye-slash"></i>');
                        $('.show-dies').attr('type', 'show');
                    }
                });

                $('.btn-trash').click(function () {
                    Swal.fire({
                        title: 'REMOVE CC DIE SUCCESS',
                        icon: 'success',
                        showConfirmButton: false,
                        toast: true,
                        position: 'top-end',
                        timer: 3000
                    });
                    $('#lista_reprovadas').text('');
                });

                $('.btn-copy1').click(function () {
                    Swal.fire({
                        title: 'COPY CC CHARGED SUCCESS',
                        icon: 'success',
                        showConfirmButton: false,
                        toast: true,
                        position: 'top-end',
                        timer: 3000
                    });
                    var lista_charge = document.getElementById('lista_charge').innerText;
                    var textarea = document.createElement("textarea");
                    textarea.value = lista_charge;
                    document.body.appendChild(textarea);
                    textarea.select();
                    document.execCommand('copy');
                    document.body.removeChild(textarea);
                });

                $('.btn-copy').click(function () {
                    Swal.fire({
                        title: 'COPY CC LIVE SUCCESS',
                        icon: 'success',
                        showConfirmButton: false,
                        toast: true,
                        position: 'top-end',
                        timer: 3000
                    });
                    var lista_lives = document.getElementById('lista_aprovadas').innerText;
                    var textarea = document.createElement("textarea");
                    textarea.value = lista_lives;
                    document.body.appendChild(textarea);
                    textarea.select();
                    document.execCommand('copy');
                    document.body.removeChild(textarea);
                });

                $('.btn-play').click(function () {
                    var lista = $('.form-checker').val().trim();
                    var skkey = $("#skkey").val();
                    var array = lista.split('\n');
                    var charge = 0,
                        lives = 0,
                        dies = 0,
                        testadas = 0,
                        txt = '';

                    if (!lista) {
                        Swal.fire({
                            title: 'Where is your card?? please add a card!!',
                            icon: 'error',
                            showConfirmButton: false,
                            toast: true,
                            position: 'top-end',
                            timer: 3000
                        });
                        return false;
                    }

                    Swal.fire({
                        title: 'Please wait for the card to be processed!!',
                        icon: 'success',
                        showConfirmButton: false,
                        toast: true,
                        position: 'top-end',
                        timer: 3000
                    });

                    var line = array.filter(function (value) {
                        if (value.trim() !== "") {
                            txt += value.trim() + '\n';
                            return value.trim();
                        }
                    });

                    var total = line.length;

                    $('.form-checker').val(txt.trim());

                    if (total > 5000000) {
                        Swal.fire({
                            title: ':) DARE TO CHECK MORE THAN 5000000 CC Ah, Pretty SMALL!!',
                            icon: 'warning',
                            showConfirmButton: false,
                            toast: true,
                            position: 'top-end',
                            timer: 3000
                        });
                        return false;
                    }

                    $('.carregadas').text(total);
                    $('.btn-play').attr('disabled', true);
                    $('.btn-stop').attr('disabled', false);

                    line.forEach(function (data) {
                        var callBack = $.ajax({
                            url: 'api.php?lista=' + data,
                            success: function (retorno) {
                                if (retorno.indexOf("#HITS") >= 0) {
                                    Swal.fire({
                                        title: '+1 CHARGED CC',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        toast: true,
                                        position: 'top-end',
                                        timer: 4000
                                    });
                                    $('#lista_charge').append(retorno);
                                    removelinha();
                                    charge = charge + 1;
                                } else if (retorno.indexOf("#LIVE") >= 0) {
                                    Swal.fire({
                                        title: '+1 LIVE CC',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        toast: true,
                                        position: 'top-end',
                                        timer: 3000
                                    });
                                    $('#lista_aprovadas').append(retorno);
                                    removelinha();
                                    lives = lives + 1;
                                } else {
                                    $('#lista_reprovadas').append(retorno);
                                    removelinha();
                                    dies = dies + 1;
                                }
                                testadas = charge + lives + dies;
                                $('.charge').text(charge);
                                $('.aprovadas').text(lives);
                                $('.reprovadas').text(dies);
                                $('.testadas').text(testadas);

                                if (testadas == total) {
                                    Swal.fire({
                                        title: 'HAVE BEEN DISPOSED',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        toast: true,
                                        position: 'top-end',
                                        timer: 3000
                                    });
                                    $('.btn-play').attr('disabled', false);
                                    $('.btn-stop').attr('disabled', true);
                                }
                            }
                        });

                        $('.btn-stop').click(function () {
                            Swal.fire({
                                title: 'Succeeding Pause !!',
                                icon: 'warning',
                                showConfirmButton: false,
                                toast: true,
                                position: 'top-end',
                                timer: 3000
                            });
                            $('.btn-play').attr('disabled', false);
                            $('.btn-stop').attr('disabled', true);
                            callBack.abort();
                            return false;
                        });
                    });
                });

            });

            function removelinha() {
                var lines = $('.form-checker').val().split('\n');
                lines.splice(0, 1);
                $('.form-checker').val(lines.join("\n"));
            }
        </script>
    </div>
</body>

</html>
