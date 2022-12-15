<?php 
session_start();
require 'header.php';


?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    

    <style type="text/css">
        body {
            margin-left: 0;
            padding: 0;
            height: 100%;
            background-color: rgba(14, 177, 14, 0.555);
        }


        #up-bar {
            width: 100%;
            border-radius: 3px;
            margin-top: 150px;
        }

        #logo {
            font-family: draw;
            font-size: 25px;
            padding: 12px;
            color: rgb(73, 175, 215);
            float: left;


        }


        #buttons {
            margin: 0 auto;
            width: 50%;


        }

        .button {
            float: left;
            box-shadow:rgb(44, 104, 173);
            font-family: draw;
            width: 100%;
            height: 30px;
        }

       
        .active {
            background-color: rgb(20, 159, 214);
        }

        .push-button {
            background-color: skyblue;
        }

        .panel {
            margin-left: 15%;
            width: 50%;
            height: 75%;
            margin: 0 auto;
            float: left;
            
        }

        #body-container {
            height: 1000px;
            margin: 10px auto;
            margin-top: 1%;
            width: 80%;
            margin-bottom: 1%;
           

        }

        iframe {
            background-color: rgba(14, 177, 14, 0.755);
        }
        #output{
            background-color: rgba(14, 177, 14, 0.755);

        }
        #css{
            background-color: rgb(147, 35, 35, 0.755);

        }
        #js{
            background-color:  rgb(25, 36, 148, 0.755);

        }
        #html{
            background-color: rgb(120, 16, 120, 0.755);

        }






        .hidden {
            display: none;
        }

        #htmlPanel{
            background-color: rgb(120, 16, 120, 0.755);

        }
        #cssPanel{
            background-color: rgb(147, 35, 35, 0.755);
        }
        #jsPanel{
            background-color:  rgb(25, 36, 148, 0.755);

        }








    </style>

</head>

<body>

    <div id="up-bar">
        <div id="buttons">
            <button class="button active" id="html">HTML</button>
            <button class="button" id="css">CSS</button>
            <button class="button" id="js">JavaScript</button>
            <button class="button active" id="output">Output</button>
        </div>

    </div>

    <div id="body-container">
        <textarea id="htmlPanel" class="panel"></textarea>
       <textarea id="cssPanel" class="panel hidden"></textarea>
        <textarea id="jsPanel"  class="panel hidden"></textarea>
        <iframe id="outputPanel" class="panel"></iframe>


    </div>

    <script type="text/javascript">

        function update() {

            //Si costruisce manualmente un costrutto con html e css in cui dentro verrano caricati i valori del cssPanel e htmlPanel
            $("iframe").contents().find("html").html("<html><head><style type='text/css'>" + $("#cssPanel").val() + "</style></head><body>" + $("#htmlPanel").val() + "</body></html>");
            // Funzione che ti permette di esguire il contenuto fi jsPanel in javascript
            document.getElementById("outputPanel").contentWindow.eval($("#jsPanel").val());


        }


        //Funzione che gestisce i bottoni utilizzando la classe push-button che possiede lo stile
        $(".button").hover(function () {
            $(this).addClass("push-button");

        }, function () {
            $(this).removeClass("push-button");
        })

        $(".button").click(function () {
            //Gestisce il colore quando il pulsante viene schiacciato
            $(this).toggleClass("active");
            $(this).removeClass("push-button");
            //Gestisce la comparsa e scomparsa dei vari pannelli
            var panel = $(this).attr("id") + "Panel";
            $("#" + panel).toggleClass("hidden")


        });
        update();

        //Rileva il testo inserito nelle textarea e applica la funzione update

        $("textarea").on("change keyup paste", function () {
            update();

        });

        update();
    </script>



</body>

</html>