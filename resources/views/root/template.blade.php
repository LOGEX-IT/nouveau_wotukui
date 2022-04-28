<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="fr">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="msapplication-tap-highlight" content="no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Wotukui ADMIN')</title>
    {{-- <img src="Images/wotukui.png" alt=""> --}}
    {{-- <link rel="icon" type="image/png" href="{{ URL::to('') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::to('root/assets/styles/main.css') }}" >
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    

            <script src="template/root/package/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="template/root/package/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="template/root/package/dist/sweetalert2.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"/>



    <!-- <script type="text/javascript" src="{{asset('root/DataTables/media/js/jquery.js')}}"></script>

    <script type="text/javascript" src="{{asset('root/DataTables/media/js/jquery.dataTables.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('root/tableau.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{asset('root/DataTables/media/css/jquery.dataTables.min.css')}}"> -->

    <style type="text/css">
        .margin-left{
            margin-left: 10px !important;
        }

        .btn.green-gradient{
            border-color: transparent;
            background: -moz-linear-gradient(270deg, rgba(0,200,0,1) 0%, rgba(0,150,0,1) 100%); 
            background: -webkit-linear-gradient(270deg, rgba(0,200,0,1) 0%, rgba(0,150,0,1) 100%); 
            background: -o-linear-gradient(270deg, rgba(0,200,0,1) 0%, rgba(0,150,0,1) 100%); 
            background: -ms-linear-gradient(270deg, rgba(0,200,0,1) 0%, rgba(0,150,0,1) 100%);
            background: linear-gradient(270deg, rgba(0,200,0,1) 0%, rgba(0,150,0,1) 100%); 
            color: #fff;
            cursor: pointer !important;
            outline: none;
            padding: 5px 10px 5px 10px;
            font-size: 1em;
            text-transform: uppercase;
        }

        .btn.red-gradient{
            border-color: transparent;
            background: -moz-linear-gradient(180deg, rgba(162,0,0,1) 0%, rgba(255,0,1,1) 100%); 
            background: -webkit-linear-gradient(180deg, rgba(162,0,0,1) 0%, rgba(255,0,1,1) 100%);
            background: -o-linear-gradient(180deg, rgba(162,0,0,1) 0%, rgba(255,0,1,1) 100%);
            background: -ms-linear-gradient(180deg, rgba(162,0,0,1) 0%, rgba(255,0,1,1) 100%);
            background: linear-gradient(270deg, rgba(162,0,0,1) 0%, rgba(255,0,1,1) 100%);
            color: #fff;
            cursor: pointer !important;
            outline: none;
            padding: 5px 10px 5px 10px;
            font-size: 1em;
            text-transform: uppercase;
        }

        #waitingOperationMask {
            z-index: 999999999999 !important;
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            width: 100vw;
            height: 100vh;
            bottom: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.8);
            visibility: hidden;
            opacity: 0;
            overflow: hidden;
            transition: .64s ease-in-out;
        }

        #waitingOperationMask i{
            display: block !important;
            font-size: 15em;
            color: #FFF
        }


        #waitingOperationMask div{
            text-align: center;
        }

        #waitingOperationMask div > h3{
            text-transform: uppercase;
            font-size: 1.8em;
            color: #FFF;
        }

        #waitingOperationMask div > h6{
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.8em;
            color: #FFF;
        }

        #loaderMask {
            z-index: 999999999999999999 !important;
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            width: 100vw;
            height: 100vh;
            bottom: 0;
            right: 0;
            background-color: #808080;
            overflow: hidden;
            color: #FFF;
            transition: .64s ease-in-out;
        }

        #loaderMask div{
            text-align: center;
        }

        #loaderMask div > h3{
            color: #FFF;
            font-size: 8em;
            font-weight: 700;
            letter-spacing: 10px;
        }
        #loaderMask div > h5{
            color: #FFF;
            font-size: 1.2em;
            text-transform: uppercase;
            font-weight: 400;
            margin-top: -25px;
            margin-left: -10px;
        }

        #loaderMask div > h6{
            color: #FFF;
            font-size: 1em;
            text-transform: uppercase;
            font-weight: 200;
            margin-top: -5px;
        }
    </style>
    <style>
        .button {
          background-color: darkmagenta;
          border-radius: 12px;
          padding: 10px;
          /* border: none; */
          color: white;
          text-align: center;
          /* text-decoration: none; */
          display: inline-block;
          font-size: 14px;
          margin: 25px 50px 75px 50px;
          transition-duration: 0.4s;
          cursor: pointer;
        }.button1 {
            background-color: white; 
            color: black; 
            border: 2px solid darkmagenta;
        }
        .button1:hover {
            background-color: darkmagenta;
            color: white;
        }
    </style>


    @yield('styleSheets')
</head>
<body>
    

    

    <div id="waitingOperationMask">
        <i class="fa fa-spin fa-spinner"></i>
        <div>
            <h3>traitement en cours</h3>
            <h6>Veuillez patienter s'il vous plait.</h6>
        </div>
    </div>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <!--TOP BAR-->
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    <div class="app-header__content">
              
            </div>
        </div>

        <!--LEFT BAR | THEME-->
        <div class="ui-theme-settings">
            <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
                <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
            </button>
            <div class="theme-settings__inner">
                <div class="scrollbar-container">
                    <div class="theme-settings__options-wrapper">
                        <h3 class="themeoptions-heading">Layout Options
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-header">
                                                    <div class="switch-animate switch-on">
                                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixer l'entête
                                                </div>
                                                <div class="widget-subheading">Rendre l'l'entête fixe!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-sidebar">
                                                    <div class="switch-animate switch-on">
                                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixer le coté latéral gauche 
                                                </div>
                                                <div class="widget-subheading">Rendre le coté latéral gauche fixe!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-footer">
                                                    <div class="switch-animate switch-off">
                                                        <input type="checkbox" data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Pied de page fixe
                                                </div>
                                                <div class="widget-subheading">Fixer le pied de page!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- <h3 class="themeoptions-heading">
                            <div>
                                Header Options
                            </div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class" data-class="">
                                Restore Default
                            </button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5 class="pb-2">Choose Color Scheme
                                    </h5>
                                    <div class="theme-settings-swatches">
                                        <div class="swatch-holder bg-primary switch-header-cs-class" data-class="bg-primary header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-secondary switch-header-cs-class" data-class="bg-secondary header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-success switch-header-cs-class" data-class="bg-success header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-info switch-header-cs-class" data-class="bg-info header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-warning switch-header-cs-class" data-class="bg-warning header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-danger switch-header-cs-class" data-class="bg-danger header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-light switch-header-cs-class" data-class="bg-light header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-dark switch-header-cs-class" data-class="bg-dark header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-focus switch-header-cs-class" data-class="bg-focus header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-alternate switch-header-cs-class" data-class="bg-alternate header-text-light">
                                        </div>
                                        <div class="divider">
                                        </div>
                                        <div class="swatch-holder bg-vicious-stance switch-header-cs-class" data-class="bg-vicious-stance header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-midnight-bloom switch-header-cs-class" data-class="bg-midnight-bloom header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-night-sky switch-header-cs-class" data-class="bg-night-sky header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-slick-carbon switch-header-cs-class" data-class="bg-slick-carbon header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-asteroid switch-header-cs-class" data-class="bg-asteroid header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-royal switch-header-cs-class" data-class="bg-royal header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-warm-flame switch-header-cs-class" data-class="bg-warm-flame header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-night-fade switch-header-cs-class" data-class="bg-night-fade header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-sunny-morning switch-header-cs-class" data-class="bg-sunny-morning header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-tempting-azure switch-header-cs-class" data-class="bg-tempting-azure header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-amy-crisp switch-header-cs-class" data-class="bg-amy-crisp header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-heavy-rain switch-header-cs-class" data-class="bg-heavy-rain header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-mean-fruit switch-header-cs-class" data-class="bg-mean-fruit header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-malibu-beach switch-header-cs-class" data-class="bg-malibu-beach header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-deep-blue switch-header-cs-class" data-class="bg-deep-blue header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-ripe-malin switch-header-cs-class" data-class="bg-ripe-malin header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-arielle-smile switch-header-cs-class" data-class="bg-arielle-smile header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-plum-plate switch-header-cs-class" data-class="bg-plum-plate header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-happy-fisher switch-header-cs-class" data-class="bg-happy-fisher header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-happy-itmeo switch-header-cs-class" data-class="bg-happy-itmeo header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-mixed-hopes switch-header-cs-class" data-class="bg-mixed-hopes header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-strong-bliss switch-header-cs-class" data-class="bg-strong-bliss header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-grow-early switch-header-cs-class" data-class="bg-grow-early header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-love-kiss switch-header-cs-class" data-class="bg-love-kiss header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-premium-dark switch-header-cs-class" data-class="bg-premium-dark header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-happy-green switch-header-cs-class" data-class="bg-happy-green header-text-light">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div> -->
                        <h3 class="themeoptions-heading">
                            <div>Options de bar laterale</div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-sidebar-cs-class" data-class="">
                                Restorer
                            </button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5 class="pb-2">Choisir une couleur
                                    </h5>
                                    <div class="theme-settings-swatches">
                                        <div class="swatch-holder bg-primary switch-sidebar-cs-class" data-class="bg-primary sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-secondary switch-sidebar-cs-class" data-class="bg-secondary sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-success switch-sidebar-cs-class" data-class="bg-success sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-info switch-sidebar-cs-class" data-class="bg-info sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-warning switch-sidebar-cs-class" data-class="bg-warning sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-danger switch-sidebar-cs-class" data-class="bg-danger sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-light switch-sidebar-cs-class" data-class="bg-light sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-dark switch-sidebar-cs-class" data-class="bg-dark sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-focus switch-sidebar-cs-class" data-class="bg-focus sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-alternate switch-sidebar-cs-class" data-class="bg-alternate sidebar-text-light">
                                        </div>
                                        <div class="divider">
                                        </div>
                                        <div class="swatch-holder bg-vicious-stance switch-sidebar-cs-class" data-class="bg-vicious-stance sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-midnight-bloom switch-sidebar-cs-class" data-class="bg-midnight-bloom sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-night-sky switch-sidebar-cs-class" data-class="bg-night-sky sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-slick-carbon switch-sidebar-cs-class" data-class="bg-slick-carbon sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-asteroid switch-sidebar-cs-class" data-class="bg-asteroid sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-royal switch-sidebar-cs-class" data-class="bg-royal sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-warm-flame switch-sidebar-cs-class" data-class="bg-warm-flame sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-night-fade switch-sidebar-cs-class" data-class="bg-night-fade sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-sunny-morning switch-sidebar-cs-class" data-class="bg-sunny-morning sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-tempting-azure switch-sidebar-cs-class" data-class="bg-tempting-azure sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-amy-crisp switch-sidebar-cs-class" data-class="bg-amy-crisp sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-heavy-rain switch-sidebar-cs-class" data-class="bg-heavy-rain sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-mean-fruit switch-sidebar-cs-class" data-class="bg-mean-fruit sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-malibu-beach switch-sidebar-cs-class" data-class="bg-malibu-beach sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-deep-blue switch-sidebar-cs-class" data-class="bg-deep-blue sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-ripe-malin switch-sidebar-cs-class" data-class="bg-ripe-malin sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-arielle-smile switch-sidebar-cs-class" data-class="bg-arielle-smile sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-plum-plate switch-sidebar-cs-class" data-class="bg-plum-plate sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-happy-fisher switch-sidebar-cs-class" data-class="bg-happy-fisher sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-happy-itmeo switch-sidebar-cs-class" data-class="bg-happy-itmeo sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-mixed-hopes switch-sidebar-cs-class" data-class="bg-mixed-hopes sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-strong-bliss switch-sidebar-cs-class" data-class="bg-strong-bliss sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-grow-early switch-sidebar-cs-class" data-class="bg-grow-early sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-love-kiss switch-sidebar-cs-class" data-class="bg-love-kiss sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-premium-dark switch-sidebar-cs-class" data-class="bg-premium-dark sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-happy-green switch-sidebar-cs-class" data-class="bg-happy-green sidebar-text-light">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="themeoptions-heading">
                            <div>Main Content Options</div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto active btn btn-focus btn-sm">Restore Default
                            </button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5 class="pb-2">Page Section Tabs
                                    </h5>
                                    <div class="theme-settings-swatches">
                                        <div role="group" class="mt-2 btn-group">
                                            <button type="button" class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class" data-class="body-tabs-line">
                                                Line
                                            </button>
                                            <button type="button" class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class" data-class="body-tabs-shadow">
                                                Shadow
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       
        <div class="app-main">
            <!--RIGHT BAR | MENU -->
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>

                    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Bienvenue </li>
                                {{-- {{$users->name}} --}}
                                 {{-- <li>

                                    <a href="{{url('/agbana-admin')}}" class="mm-active">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Généralités
                                    </a>

                                </li>                                 --}}
                                <li class="app-sidebar__heading">Gestion Wotukui</li>

                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-diamond"></i>
                                        Ajout
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{ url('/ajoute') }}">

                                                <i class="metismenu-icon"></i>
                                                Nouveau produit
                                            </a>
                                        </li>                                       
                                        
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-diamond"></i>
                                        Consulter
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{ url('/liste_commande') }}">
                                                <i class="metismenu-icon"></i>

                                                Les Commandes
                                            </a>
                                        </li>  
                                        <li>
                                            <a href="{{ url('/liste_produit') }}">
                                                <i class="metismenu-icon"></i>

                                                Les produits
                                            </a>
                                        </li>                                      
                                        <li>
                                            <a href="{{ url('/liste_commandeSurMesure') }}">
                                                <i class="metismenu-icon"></i>
                                                Les Commandes sur mesure
                                            </a>
                                        </li>
                                    </ul><br><br>
                                </li>
                            </ul>   

                        </div>
                    </div>
                </div>

                <div class="app-main__outer" style="background-color: #fff">
                    <div class="app-main__inner">
                        <div class="app-page-title" style="margin-bottom: 0px !important; padding-bottom: 0px">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-display2 icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <div>
                                        @yield('sectionTitle')
                                        <div class="page-title-subheading">
                                            @yield('sectionDescription')
                                        </div>
                                    </div>
                                </div>

                                <div class="page-title-actions">
                                    <div class="d-inline-block dropdown">
                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-business-time fa-w-20"></i>
                                            </span>
                                        </button>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-link-icon lnr-inbox"></i>
                                                        <span>
                                                            Nouveau commande
                                                        </span>
                                                        <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-link-icon lnr-book"></i>
                                                        <span>
                                                            Nombre Produit
                                                        </span>
                                                        <div class="ml-auto badge badge-pill badge-danger">5</div>
                                                    </a>
                                                </li>
                                                
                                            </ul>
                                        </div>

                                        <a href="{{url('/logout')}}" class="button button1"><b class="term">Déconnexion</b></a>  

                                    </div>
                                </div>
                            </div>
                        </div>

                        @yield('mainContent')
                    </div>
                   
                </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.10.22/i18n/French.json"></script>
    
    <!-- <script src="{{asset('root/DataTables/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('root/DataTables/js/jquery.dataTables.js')}}" type="text/javascript"></script>
        <script type="text/javascript" src="{{asset('root/DataTables/datatables.js')}}"></script> -->
    <script type="text/javascript" 
        src="{{ URL::to('root/assets/scripts/main.js') }}"></script>
   <!--  <script type="text/javascript" 
        src="{{URL::to('/root/assets/scripts/jquery-3.2.1.min.js')}}"></script> -->
    <script type="text/javascript" 
        src="{{URL::to('/root/assets/scripts/sweetalert2.all.min.js')}}"></script>
    <script type="text/javascript" 
        src="{{URL::to('/root/assets/scripts/plugin.Nicescroll.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // $('#tableau').dataTable();
        $('#tableau').dataTable({
               language: {
                   url: "//cdn.datatables.net/plug-ins/1.10.22/i18n/French.json"
               }
           });
    } );
</script>

    <script type="text/javascript">
        (function() {
            "use strict";

            // custom scrollbar

            $("html").niceScroll({styler:"fb",cursorcolor:"#CCC", cursorwidth: '6', cursorborderradius: '0', background: '', spacebarenabled:false, cursorborder: '0',  zindex: '1000'});

            $(".scrollbar1").niceScroll({styler:"fb",cursorcolor:"#CCC", cursorwidth: '6', cursorborderradius: '0',autohidemode: 'false', background: '', spacebarenabled:false, cursorborder: '0'});

            $(".scrollbar1").getNiceScroll();
            if ($('body').hasClass('scrollbar1-collapsed')) {
                $(".scrollbar1").getNiceScroll().hide();
            }

        })(jQuery);

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn green-gradient margin-left',
                cancelButton: 'btn red-gradient'
            },
            buttonsStyling: false
        })


        var waitingOperationMask = $('#waitingOperationMask');

        function showWaitingMask(visibility){
            if (visibility) {
                waitingOperationMask.fadeIn();
                waitingOperationMask.css({
                    'visibility': 'visible',
                    'opacity': '1'
                });

            } else{
                waitingOperationMask.fadeOut();
                waitingOperationMask.css({
                    'visibility': 'hidden',
                    'opacity': '0'
                });
            }
        }

        var loaderMask = $('#loaderMask');
        $(window).on('load', function(){
            setTimeout(function () {
                $('body').css({
                    'overflow':'scroll'
                })
                loaderMask.fadeOut(500);
                loaderMask.css({
                    'visibility': 'hidden',
                    'opacity': '0'
                });
            }, 1000);
            
        })
    </script>

    @yield('jsSheets')
</body>
</html>
