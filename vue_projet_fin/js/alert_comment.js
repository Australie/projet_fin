$('.js-dislike-comment').one('click', function(e) {        
    let span = $(e.currentTarget);        
    let url = "index.php?action=alert&id=" + span.attr('id');

    $.getJSON(url)
    .done((data)=>{
        if(data.alerts === 'ok') {
            span.toggleClass('far fa-bell').toggleClass('fas fa-bell');
        } else {
            console.log(data.alerts);
        }           
    });
});