var s = $('.search-input'),
    f  = $('.search'),
    a = $('.after');

s.focus(function(){
    if( f.hasClass('open') ) return;
    f.addClass('in');
    setTimeout(function(){
        f.addClass('open');
        f.removeClass('in');
    }, 1300);
});

a.on('click', function(e){
    e.preventDefault();
    if( !f.hasClass('open') ) return;
    f.addClass('close');
    f.removeClass('open');
    setTimeout(function(){
        f.removeClass('close');
    }, 1300);
})

f.submit(function(e){
    e.preventDefault();
    f.addClass('explode');
    setTimeout(function(){
        s.val('');
        f.removeClass('explode');
    }, 3000);
})