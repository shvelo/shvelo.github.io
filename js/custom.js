$(function(){
  if('ontouchstart' in window){
    $('body').addClass('touch');
  }
  $.localScroll();
});
