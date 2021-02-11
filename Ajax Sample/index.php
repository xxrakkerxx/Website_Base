
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax with database sample</title>
    <!--Bootstrap CDN-->
    <!--BS CSS-->
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
     integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!--END BS CSS-->

    <!--JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
     
    <!--END JS-->
    <!--END Bootstrap CDN-->
  
</head>
<body>
    
    <div class="container-fluid">
        <br><br>
        <div class="row">
            
            <div class="col-md-6 offset-md-3 border border-info">
                <form method="post">
                <label for="txt-area">Message:</label><br>
                <textarea rows="15" class="w-100" placeholder="Type here.." name="tweet" id="tweet"></textarea>
                <br>

                <button type="button"  class="btn btn-danger" id="btn-submit">Send</button><br><br>
                <div id="loader"></div>
                </form>
                <span id="results">Result here..</span><br><br>

            </div>
            
        </div>

        <script>

        $(document).ready(function(){
       
            $('#btn-submit').click(function(){

                var tweet_txt = $('#tweet').val();

                if ($.trim(tweet_txt) !='') {
                    $.ajax({
                        url:"insert.php",
                        method:"POST",
                        data:{tweet:tweet_txt, name:"Dennis"},
                        dataType:"text",
                        success:function(data){
                            $('#tweet').val("");
                        
                        }
                    });
                }

            });

            setInterval(function(){
                $('#results').load("retriever.php").fadeIn("slow");
                
            }, 1000);
        });

    </script>
        
    </div>

</body>
</html>