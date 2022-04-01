<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            #quoteContainer {
               width: 100%;
               background-color: #fffaf0;
               height: 300px;
            }
            li{
                list-style-type: none;
                margin-bottom: 5px;
            }
        </style>
    </head>
    <body>
        <div class="d-flex justify-content-center mt-4" >
            <div class="row" style="width: 100vh">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h4 >Kanye Quotes</h4>
                                    <p>Get random Kanye West quotes</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="javascript:void(0)" onclick="getAndDisplayQuotes()" class="btn btn-sm btn-primary mb-3" ><i class="fa-solid fa-arrows-rotate"></i> refresh</a>
                                    <div id="quoteContainer"><span id="quote"></span></div>
                                    <p class="float-right font-weight-bold">- Kanye West</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            $().ready(function(){
                getAndDisplayQuotes()
            })


            function getAndDisplayQuotes(){
                let quotes = null;
                $('#quote').html('Please wait..')

                $.ajax({
                    url: "/api/get-quotes",
                    type: 'GET',
                    success: function(res) {
                        quotes = res.data.quotes;
                        
                        if(quotes.length > 0){
                            let itemsToDisplay = '';
                            quotes.forEach( quo => {
                                itemsToDisplay+=`<li>"${quo}"</li>`
                            });

                            $('#quote').html(itemsToDisplay)
                        }else{
                            $('#quote').html('Unable to get quote at this time ):')
                        }
                    },
                    error: function(res) {
                        $('#quote').html('Unable to get quote at this time ):')
                    }
                })
            }
        </script>
    </body>
</html>
