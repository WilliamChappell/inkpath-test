<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <title>Name Gender API</title>

        <script>
            var ready = 1;
            $(document).keyup(function(event) {
                if (event.which === 13 && ready == 1) {
                    ready = 0;
                    $("#content").html("Processing..");
                    $.ajax({
                        url: "api/query",
                        type: "post",
                        data: { name: $("#name").val() },
                        complete: function() {
                            ready = 1;
                        },
                        success: function(result){
                            $("#content").html(result);
                        }});
                }
            });
        </script>
    </head>

    <body style="background-color: lightgrey;">
        <h3 style="text-align: center;padding-top:10px">
            Gender Guesser API
        </h3>
        <div class="container" style="padding-top:10px">
            <div class="mb-3 input-group-lg">
                <input class="form-control" type="text" id="name" placeholder="Enter a name here..">
                <div class="form-text">Press enter to continue..</div>
            </div>
        </div>
        <div id="content" class="container" style="padding-top:10px">
        </div>
    </body>

</html>
