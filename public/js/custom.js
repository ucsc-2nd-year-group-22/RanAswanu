$(document).ready(function(){
    /// Display tabcontainer which has active class
    var id = $('.user-tabs .active-tab').attr('id');
    $('.tabContainer').hide();
    $('.tabContainer#'+id+'C').show();


    //// CHange the tab when user clicks
    $('.user-tabs a').click(function(){
        console.log(this.id);
        if(!$(this).hasClass('active-tab')) {
            $('.user-tabs a').removeClass('active-tab');
            $(this).addClass('active-tab');
            $('.tabContainer').hide();
            $('.tabContainer#'+this.id+'C').show();
        }
    });
});
