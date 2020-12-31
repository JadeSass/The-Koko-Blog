$(function(){
    $('.collapsible a').filter(function(){
        return this.href==location.href
    }).parent().addClass('active-col').siblings().removeClass('active-col')
    $('.collapsible a').click(function(){
        $(this).parent().addClass('active-col').siblings().removeClass('active-col')
    });
    $(document).ready(function(){
        $('select').formSelect();
    });
    $('.tabs a').filter(function(){
        return this.href==location.href
    }).parent().addClass('active-nav').siblings().removeClass('active-nav')
    $('.tabs a').click(function(){
        $(this).parent().addClass('active-nav').siblings().removeClass('active-nav')
    });
});
