$(function(){
    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
    $('.collapsed a').filter(function(){
        return this.href==location.href
    }).parent().addClass('active-col').siblings().removeClass('active-col')
    $('.collapsed a').click(function(){
        $(this).parent().addClass('active-col').siblings().removeClass('active-col')
    });
    $(document).ready(function(){
        $('select').formSelect();
    });
    $(document).ready(function(){
        $('.datepicker').datepicker({
            showClearBtn: true,
            format: 'mmmm dd, yyyy',
            minDate: new Date()
        });
    });
    $('.tabs a').filter(function(){
        return this.href==location.href
    }).parent().addClass('active-nav').siblings().removeClass('active-nav')
    $('.tabs a').click(function(){
        $(this).parent().addClass('active-nav').siblings().removeClass('active-nav')
    });
    $(document).ready(function(){
        $('.collapsible').collapsible();
    });
});

