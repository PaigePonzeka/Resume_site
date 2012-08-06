(function() {
  var setSidebarHeight;

  $(document).ready(function() {
    return setSidebarHeight();
  });

  $(window).resize(function() {
    return setSidebarHeight();
  });

  setSidebarHeight = function() {
    return $('.sidebar, .sidebar-wrapper, .sidebar-zigzag').css('height', $(window).height());
  };

}).call(this);
