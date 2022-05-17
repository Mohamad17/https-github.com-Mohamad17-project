let toggleOn=document.querySelector('.toggle-on');
let toggleOff=document.querySelector('.toggle-off');
let sideBar=document.querySelector('.sidebar');
let bodySection=document.querySelector('.bodySection');
let clips=document.querySelector('.clips');
let bodyHeader=document.querySelector('.bodyHeader');
let searchToggle=document.querySelector('.searchToggle');
let hideSearch=document.querySelector('.hideSearch');
let searchBox=document.querySelector('.searchBox');
let box=document.querySelector('.box');
let bell=document.querySelector('.bell');
let notif=document.querySelector('.notif');
let message=document.querySelector('.message');
let commentBox=document.querySelector('.commentBox');
let userAvatar=document.querySelector('.userAvatar');
let userConfig=document.querySelector('.userConfig');

toggleOn.addEventListener('click',function(){
    toggleOn.classList.remove('d-md-inline','d-inline');
    toggleOff.classList.remove('d-md-none','d-none');
    sideBar.classList.add('hideSide');
    bodySection.classList.remove('col-md-10');
});

toggleOff.addEventListener('click',function(){
    toggleOn.classList.add('d-md-inline','d-inline');
    toggleOff.classList.add('d-md-none','d-none');
    sideBar.classList.remove('hideSide','d-none');
    bodySection.classList.add('col-md-10');
});

clips.addEventListener('click', function(){
    if(bodyHeader.classList.contains('d-none')){
        bodyHeader.classList.remove('d-none');
    }else{
        bodyHeader.classList.add('d-none');
    }
});

searchToggle.addEventListener('click',function(){
    setTimeout(function(){
        box.style.width="16rem";
        searchToggle.classList.remove('d-md-inline');
        searchBox.classList.remove('d-none');
    },300);    
});

hideSearch.addEventListener('click',function(){
    setTimeout(function(){
        box.style.width="0";
        searchToggle.classList.add('d-md-inline');
        searchBox.classList.add('d-none');
    },300);    
});

bell.addEventListener('click',function(){
    if(notif.classList.contains('d-none')){
        notif.classList.remove('d-none');
        if(!commentBox.classList.contains('d-none')){
            commentBox.classList.add('d-none');
        }
        if(!userConfig.classList.contains('d-none')){
            userConfig.classList.add('d-none');
        }
    }else {
        notif.classList.add('d-none');
    }
});

message.addEventListener('click',function(){
    if(commentBox.classList.contains('d-none')){
        commentBox.classList.remove('d-none');
        if(!userConfig.classList.contains('d-none')){
            userConfig.classList.add('d-none');
        }
        if(!notif.classList.contains('d-none')){
            notif.classList.add('d-none');
        }
    }else{
        commentBox.classList.add('d-none');
    }
});

userAvatar.addEventListener('click',function(){
    if(userConfig.classList.contains('d-none')){
        userConfig.classList.remove('d-none');
        if(!notif.classList.contains('d-none')){
            notif.classList.add('d-none');
        }
        if(!commentBox.classList.contains('d-none')){
            commentBox.classList.add('d-none');
        }
    }else{
        userConfig.classList.add('d-none');
    }
});

// sideMenus.forEach(function(sideMenu){
//     let angle=sideMenu.firstChild.childNodes[1];
//     sideMenu.addEventListener('click',function(){
//        angle.classList.remove('fa-angle-left'); 
//        angle.classList.add('fa-angle-down'); 
//     });
// });
$('.sideMenuToggle').click(function(){
    $('.sideMenuToggle').removeClass('sideMenuToggleActive');
    $('.sideMenuToggle').children('.toggleTitle').children('.angel').removeClass('fa-angle-down');
    $('.sideMenuToggle').children('.toggleTitle').children('.angel').addClass('fa-angle-left');
    if($(this).hasClass('sideMenuToggleActive')==false){
        // console.log($(this).hasClass('sideMenuToggleActive'));
        $(this).addClass('sideMenuToggleActive');
        $(this).children('.toggleTitle').children('.angel').addClass('fa-angle-left');
        $(this).children('.toggleTitle').children('.angel').removeClass('fa-angle-down');
    }else{
        // console.log($(this).hasClass('sideMenuToggleActive'));
        $(this).removeClass('sideMenuToggleActive');
        $(this).children('.toggleTitle').children('.angel').removeClass('fa-angle-left');
        $(this).children('.toggleTitle').children('.angel').addClass('fa-angle-down');
    }    
 });

 $('.screenSize').click(function(){
    toggleFullScreen();
 });

 function toggleFullScreen()
 {
    if((document.fullScreenElement && document.fullScreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)){
       if(document.documentElement.requestFullScreen){
          document.documentElement.requestFullScreen();
       }
       else if(document.documentElement.mozRequestFullScreen){
          document.documentElement.mozRequestFullScreen();
       }
       else if(document.documentElement.webkitRequestFullScreen){
          document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
       }
       $('.compress').removeClass('d-none');
       $('.expand').removeClass('d-md-inline');
    }else{
        if(document.cancelFullScreen){
            document.cancelFullScreen();
         }
         else if(document.mozCancelFullScreen){
            document.mozCancelFullScreen();
         }
         else if(document.webkitCancelFullScreen){
            document.webkitCancelFullScreen();
         }
         $('.compress').addClass('d-none');
         $('.expand').addClass('d-md-inline');
    }
 }

