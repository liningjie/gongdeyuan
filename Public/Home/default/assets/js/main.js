$(function () {
  function vvv(n) {
    $(".bannera>ul").eq(n).removeClass("opc").siblings("ul").addClass("opc");

    $("#list1 li")
      .eq(n)
      .addClass("hoveractive")
      .siblings("li")
      .removeClass("hoveractive");
  }
  var m = 0;
  setInterval(function () {
    vvv(m);
    m++;
    if (m > 1) {
      m = 0;
    }
  }, 3000);

  $("#list1 li").hover(function () {
    vvv($(this).index());
    console.log(111);
  });
  $(".showimg img").width("100%");

  // about
});
