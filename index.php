<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
    </head>
    <body>
       <div class="container">
       <h1 class="card-panel teal lighten-2">Interactive booklist</h1>
       <h4 class="card-panel teal lighten-5">View, add, delete and more...</h4>
       
       
       <div class="row">
            <div class="bookList col s7"></div>
            
            <form class="col s5" method="post" action="./api/books.php">
             
            <fieldset>
                <legend>ADD NEW BOOK TO DATABASE</legend>
                    <label>Book Title</label><br>
                    <input name="name" type="text" class="input" maxlength="60" /><br>
                    <label>Author</label><br>
                    <input name="author" type="text" class="input" maxlength="40" /><br>
                    <label>Description</label><br>
                    <textarea name="description" type="text"class="input"></textarea><br>
                    <button class="waves-effect waves-light btn-large" type="submit" name="submit">ADD BOOK</button>
            </fieldset>
                <h5 id="msg" class="card-panel teal lighten-5"></h5>  
            </form>
            
        
            
            
       </div>
       </div>
        
        
        
        
        
        
        
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    </body>
</html>
