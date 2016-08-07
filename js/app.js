$(function(){
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
                                    <h3 class='bookTitle'>" + bookName + "</h3>\n\
                                    <button class='showMoreButton' data-id=" + bookId + ">Show More</button>\n\
                                  </div>");
                $('.bookList').append(nextBook);
            }
        });
    
    $('.bookList').on('click', '.showMoreButton', function(){
        var bookId = $(this).data('id');
        var bookContainer = $(this).parent();
        $.ajax({
            url: './api/books.php?id=' + bookId,
            type: 'GET',
            dataType: 'json'
        }).done(function(ans){
            var bookAuthor = ans['author'];
            var bookDescription = ans['description'];           
            var descriptionBox = $("<div class='descriptionBox'>\n\
                                        <h6 class='author'>Author: " + bookAuthor +"</h6>\n\
                                        <p class='description'>" + bookDescription +"</p>\n\
                                    </div>");
            
            bookContainer.append(descriptionBox);
            descriptionBox.hide();
            $(bookContainer).find('.descriptionBox').slideDown();
        });
        

    });
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
});

