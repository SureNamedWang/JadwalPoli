<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- ICON -->
        <link rel="icon" href="../assets/img/nhicon.ico" type="image/x-icon"/>
        <!-- TITLE -->
        <title>Jadwal Poli - National Hospital</title>

        <!-- Fonts and icons -->
        <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
        <script>
            WebFont.load({
                google: {"families":["Lato:300,400,700,900"]},
                custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/css/core/bootstrap.min.css">
        
        <style>
            #bodyMain{
                background-image: url('../assets/img/bg/mainbg.jpg');
                background-size: cover;
                /* background-position: center; */
                background-repeat: no-repeat;
                max-width: 100%;
                max-height: 100%;
            }
            #btnJudul{
                width:100%;border-radius:50px;
            }
            #judulID{
                font-size: 3vh;font-weight:900;color:#1C75BC;
            }
            #judulEN{
                margin-top:-2vh;font-weight:bolder;font-style:italic;
            }
            #namaDep{
                margin-top:-3vh;font-weight:900;font-style:italic;font-size: 2.5vh;
            }
            #jam{
                font-size:2vh;
                font-weight: 900;
                width:80%;
                border-radius:50px;
                margin-top: 3vh;
                margin-left: 5vw;
            }
            #colDataTable{
                border-radius:50px;
                background: rgb(255,189,34);
                background: linear-gradient(0deg, rgba(255,189,34,1) 0%, rgba(255,74,77,1) 100%);
                height:500px;
                margin: 5px 5px 0px 0px;
            }
            #tableDataTable{
                /* height: 720px; */
                text-align:center;
                color: black; 
                border-radius:50px;
                font-weight: bolder;
                font-size: 13px;
                margin-top: 5px;
            }
            
            tr{
                height: 40px;
                padding:0px 0px 0px 0px;
                margin:0px 0px 0px 0px;
            }
            
            #tableDataTable_paginate{
                visibility: hidden;
            }
            #tableDataTable_processing{
                visibility: hidden;
            }
            #textFooter1{
                color:yellow;font-style:italic;font-weight:bolder;font-size:2.5vw;margin-top: 2vh;
            }
            #textFooter2{
                color:white;font-style:italic;font-weight:bolder;font-size:2vw;margin-left:-10vw;margin-top:3vh;
            }

            /* img */
            
            #imgChar{
                width:100%;
                margin-left:1vw;
                margin-top:15vh;
            }
            #imgCross{
                margin-top:-15vh;margin-left:16vw;max-width:8vw;max-height:8vh;
            }
            #imgCapsule{
                max-width:15vw;max-height:15vh;margin-left:10vw;margin-top:-15vh
            }
            #imgHeart{
                max-width:7vw;max-height:7vh;margin-top:-10vh;margin-left:-5vw;
            }
        </style>
    </head>