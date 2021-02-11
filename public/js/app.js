
$(function(){
    $('.dropdown-trigger').dropdown({
        constrainWidth: true,
        coverTrigger: false,
        closeOnClick: true
    });
    $('.close-info').click(function(){
        $('.info-control').remove()
    });
    $('.lazy').lazy({
        enableThrottle: true,
        throttle: 250,
        delay: 5000
    });
    $(document).ready(function(){
        $('.sidenav').sidenav();
    });
    $(document).ready(function(){
        $('.slider').slider({
            fullWidth: true,
            indicators: false,
        });
    });
    $('.tabs a').filter(function(){
        return this.href==location.href
    }).parent().addClass('active-nav').siblings().removeClass('active-nav')
    $('.tabs a').click(function(){
        $(this).parent().addClass('active-nav').siblings().removeClass('active-nav')
    });
});
$(document).ready(function(){
    $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: false,
        autoScroll:true
    });
});


let tog = document.getElementsByClassName("reply-tog");
for(let x = 0; x < tog.length; x += 1) {
    tog.item(x).addEventListener("click", function(){
        let reply = document.getElementsByClassName("drop-form");
        for(let i = 0; i < reply.length; i += 1) {
            reply.item(i).classList.toggle("reply-show");
        }
    })
}
const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');

function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
    }
    else {
        document.documentElement.setAttribute('data-theme', 'light');
    }
}

toggleSwitch.addEventListener('change', switchTheme, false);
function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark'); //add this
    }
    else {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light'); //add this
    }
}
const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : null;

if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);

    if (currentTheme === 'dark') {
        toggleSwitch.checked = true;
    }
}
// setimage optimizations
function remChild (){
    let opt = document.getElementsByClassName("image-wrap");
    for(let x = 0; x < opt.length; ) {
        opt[x].parentNode.removeChild(opt[x]);
    }
}
function stat (){
    let status = document.querySelector(".optimize-status");
    status.style.display = "block";
}
const toggleOpt = document.querySelector('.optimize-switch input[type="checkbox"]');

function switchOpt(e) {
    if (e.target.checked) {
        location.reload();
        remChild();
        stat();
        localStorage.setItem('opt',  remChild());
        localStorage.setItem('stat',  stat());
        return false;
    }else{
        localStorage.removeItem('opt',  remChild());
        localStorage.removeItem('stat',  stat());
    }
}

toggleOpt.addEventListener('change', switchOpt, false);
function switchOpt(e) {
    if (e.target.checked) {
        location.reload();
        remChild();
        stat();
        localStorage.setItem('opt', remChild());
        localStorage.setItem('stat',  stat());
        return false;
    }else{
        location.reload();
        localStorage.removeItem('opt',  remChild());
        localStorage.removeItem('stat',  stat());
        return false;
    }
}
const currentOpt = localStorage.getItem('opt') ? localStorage.getItem('opt') : null;
const statOpt = localStorage.getItem('stat') ? localStorage.getItem('stat') : null;

if (currentOpt && statOpt) {
    localStorage.getItem('opt', currentOpt);
    localStorage.getItem('stat', statOpt);

    if (currentOpt.getItem == remChild() && statOpt.getItem == stat()) {
        toggleOpt.checked = true;
    }
}
