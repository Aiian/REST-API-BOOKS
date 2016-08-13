$(function(){
    updateList();
   
    function updateList(){
        $('.bookList').empty();
        $.ajax({
            url: './api/books.php',
            type: 'GET',
            dataType: 'json'
        }).done(function(ans){
            var booksAmount = ans.length;
            for (var i = 0; i < booksAmount; i++){
                var bookName = ans[i].name;
                var bookId = ans[i].id;
                var nextBook = $("<div class='bookContainer'>\n\
                                    <h3 class='bookTitle' data-id=" + bookId + ">" + bookName + "</h3>\n\
                                    <div class='descriptionBox'>\n\
                                        <h5 class='author'></h5>\n\
                                        <p class='description'></p>\n\
                                        <button class='deleteButton waves-effect waves-light btn' data-id=" + bookId + ">Delete book</button>\n\
                                    </div>\n\
                                  </div>");
                $('.bookList').append(nextBook);
                
                var bookTitle = $('.bookList .bookContainer:last-child .bookTitle');             
                bookTitle
                    .one('mousedown',getFromDB) // attach one event for downloading book data from database, so it doesn't fire on each click 
                    .on('click',slide)
                    .css('cursor','pointer');
                // delete button
                var buttonDelete = $('.bookList .bookContainer:last-child .descriptionBox .deleteButton');  
                buttonDelete.one('click', deleteFromDB);
            }
        }).fail(function(){
            $('#msg').fadeIn(1000).text('Sorry, temporary server problems...').fadeOut(5000);
        });
    }
    // supporting functions for updateList
        function getFromDB(){
            var bookId = $(this).data('id');
            var bookContainer = $(this).parent();
            $(bookContainer).find('.author').html('<h3>LOADING DATA...</h3>');
            $.ajax({
                url: './api/books.php?id=' + bookId,
                type: 'GET',
                dataType: 'json'
            }).done(function(ans){
                var bookAuthor = "Author: <strong>" + ans['author'] + "</strong>";
                var bookDescription = ans['description'];           
                $(bookContainer).find('.author').html(bookAuthor);
                $(bookContainer).find('.description').text(bookDescription);
            });
        }
        function slide(){
            $(this).siblings('.descriptionBox').slideToggle();   
        }
        function deleteFromDB(){
            
            var data = {};
            data['id'] = $(this).data('id');

            $.ajax({
                url: './api/books.php',
                type: 'DELETE',
                data: data,
                dataType: 'json'
            }).done(function(ans){
                if (ans.result === false){
                    $('#msg').fadeOut('fast', function(){
                        $(this)
                            .css('color','red')
                            .text('Error connecting to database, please try again later.')
                            .fadeIn('fast');
                    });
                } else {
                    $('#msg').fadeOut('fast', function(){
                        $(this)
                            .css('color','green')
                            .text('Book successfully deleted.')
                            .fadeIn('fast');
                    });    
                    updateList();
                }
            }).fail(function(){
                 $('#msg').fadeIn(1000).text('Sorry, temporary server problems...').fadeOut(5000);
            });
        };


    // submitting form for adding new book
    $("form").on('submit', function(event){
        event.preventDefault();
        
        var data = {};
        $('.input').each(function(){
            var name = $(this).attr('name');
            var val = $(this).val();  
            data[name] = val;
        });
        
        $.ajax({
            url: './api/books.php',
            type: 'POST',
            data: data,
            dataType: 'json'
        }).done(function(ans){
            if (ans.result === false){
                $('#msg').fadeOut('fast',function(){
                    $(this)
                        .css('color','red')
                        .text(ans.error)
                        .fadeIn('fast');
                });
            } else {
                $('#msg').fadeOut('fast',function(){
                    $(this)
                      .css('color','green')
                      .text('Book successfully added.')
                      .fadeIn('fast');  
                });  
                updateList();
                clearForm();
            }
        }).fail(function(){
             $('#msg').fadeIn(1000).text('Sorry, temporary server problems...').fadeOut(5000);
        });
    });
    
    function clearForm(){
        $('.input').val('');
    }
    
});

