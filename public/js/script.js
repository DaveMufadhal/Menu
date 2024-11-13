function showMenu(e) {
  $(".sidebar").toggleClass("show");
  if($(".sidebar").hasClass("show")){
    $(e).removeClass("fa-bars");
    $(e).addClass("fa-times");
  } else {
    $(e).removeClass("fa-times");
    $(e).addClass("fa-bars");
  }
}
function showDropMenu(e) {
  var arrow = $(e).children(".caret");
  var dropMenu = $(e).next();
  dropMenu.toggleClass("show");
  if(dropMenu.hasClass("show")){
    arrow.removeClass("fa-caret-down");
    arrow.addClass("fa-caret-up");
  } else {
    arrow.removeClass("fa-caret-up");
    arrow.addClass("fa-caret-down");
  }
}

