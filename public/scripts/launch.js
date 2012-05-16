(function() {
  var changeDino, changeSlideshowPage, class_colors, createDinoMessagesArray, current_view, dino_messages, generateAnArrayOfColors, getAccessoryClass, getHatClass, getMessage, getMessageClass, getRandomMessage, getWorkDetails, intializeIsotope, intializeLifeStream, intializeWorkIsotope, lifestreamDemo, resetDino, setDinoAccessory, setDinoColor, setDinoHat, setSlideSelected, setSlideshowPages, setSpeechBubble, slideshowDisableNext, slideshowDisablePrevious, slideshowEnableNext, slideshowEnablePrevious, slideshow_next, slideshow_previous;

  current_view = "dino";

  dino_messages = [];

  class_colors = [];

  $(document).ready(function() {
    impress().init();
    intializeWorkIsotope($("#work-list"));
    intializeLifeStream(false);
    intializeIsotope();
    $(window).scroll(function() {
      var inview_id;
      inview_id = $('section:in-viewport').attr('id');
      if (current_view !== inview_id) {
        current_view = inview_id;
        $("nav ul li a").removeClass('active');
        return $("nav ul li." + inview_id + " a").addClass('active');
      }
    });
    $('#top_nav ul li').hover((function() {
      return changeDino(this);
    }), function() {
      return resetDino();
    });
    $('#first_name li').click(function() {
      var hat_class, item_index, message;
      $('#first_name li').removeClass('active');
      $(this).addClass('active');
      item_index = $(this).index() + 1;
      message = getMessageClass(this);
      $("#dino_bubble_content .rawr li").addClass('hide');
      $("." + message).removeClass('hide');
      hat_class = getHatClass(this);
      return setDinoHat(hat_class);
    });
    $('#last_name li').click(function() {
      var accessory_class;
      $('#last_name li').removeClass('active');
      $(this).addClass('active');
      accessory_class = getAccessoryClass(this);
      return setDinoAccessory(accessory_class);
    });
    $('#first_name li').hover((function() {
      var hat_class;
      hat_class = getHatClass(this);
      return setDinoHat(hat_class);
    }), function() {
      var current_active;
      current_active = $('#first_name li.active');
      if (current_active.length !== 0) {
        return setDinoHat(getHatClass(current_active));
      } else {
        return $('#dino_hat').addClass('hide');
      }
    });
    $('#last_name li').hover((function() {
      var accessory_class;
      accessory_class = getAccessoryClass(this);
      return setDinoAccessory(accessory_class);
    }), function() {
      var current_active;
      current_active = $('#last_name li.active');
      if (current_active.length !== 0) {
        return setDinoAccessory(getAccessoryClass(current_active));
      } else {
        return $('#dino_accessory').addClass('hide');
      }
    });
    $("nav a, #top_nav a").bind("click", function(event) {
      var $anchor;
      $anchor = $(this);
      $("html, body").stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top
      }, 1000);
      return event.preventDefault();
    });
    $('#slideshow_controls_previous').click(function() {
      return slideshow_previous();
    });
    $('#slideshow_controls_next').click(function() {
      return slideshow_next();
    });
    $('#slides li').click(function() {
      return setSlideSelected($(this));
    });
    setSlideshowPages();
    $('#slideshow_pages ul li a').click(function() {
      var page_num;
      page_num = parseInt($(this).html());
      changeSlideshowPage(page_num);
      return false;
    });
    $('#little_dino_bubble_buttons_yes').click(function() {
      return console.log("Yes");
    });
    return $('#little_dino_bubble_buttons_no').click(function() {
      return hideLittleDino();
    });
  });

  intializeWorkIsotope = function(container) {
    var current_color, work_data;
    work_data = getWorkDetails();
    current_color = 16777215;
    return $(work_data).each(function() {
      var images_folder, item, item_description, item_icon, item_tags_list, item_title, work_icon, work_item, work_item_tags, work_screenshots;
      work_item = $(this)[0];
      item = $("<li/>", {
        "class": "work-list-item"
      });
      item_title = $("<h3/>", {
        "class": "work-list-item-title",
        text: work_item.title
      });
      item_description = $("<p/>", {
        "class": "work-list-item-description",
        text: work_item.description
      });
      item_tags_list = $("<ul/>", {
        "class": "work-list-item-tags"
      });
      work_item_tags = work_item.tags;
      $(work_item_tags).each(function() {
        var color_class, item_tags_list_item;
        item_tags_list_item = $("<li/>", {
          text: "" + this
        });
        color_class = "" + (this.toLowerCase());
        item.addClass("color_class");
        current_color = generateAnArrayOfColors(current_color, color_class);
        return item_tags_list.append(item_tags_list_item.css('background', "" + (current_color.toString(16))));
      });
      images_folder = "images/work/";
      work_icon = work_item.images.icon;
      if (work_icon.length > 0) {
        item_icon = $("<img/>", {
          "class": "work-list-item-icon",
          src: "" + images_folder + work_icon
        });
      }
      work_screenshots = work_item.images.screenshots;
      if (work_screenshots.length > 0) {
        console.log("use it");
        $(work_screenshots).each(function() {
          return console.log("" + this);
        });
      }
      item.append(item_icon).append(item_title).append(item_description).append(item_tags_list);
      return container.append(item);
    });
  };

  generateAnArrayOfColors = function(currentColor, colorClass) {
    console.log(class_colors[colorClass]);
    if (class_colors[colorClass]) {
      currentColor = class_colors[colorClass];
    } else {
      currentColor = currentColor - 50000;
      class_colors[colorClass] = currentColor;
    }
    return currentColor;
  };

  getWorkDetails = function() {
    var work;
    work = [
      {
        title: "stats2v",
        description: "This was a collborative project with programmers to develop an application that track player stats from servers and then uploaded them to a database. Stats2V was the user interface for playersto view their stats and compare themselves to other players.",
        tags: ["PHP", "HTML", "CSS", "JQuery", "Javascript", "C#"],
        images: {
          icon: "icon_stats2v.gif",
          screenshots: ["stats2v.gif"]
        },
        links: {
          demo: "demo.test.html",
          github: "http://github.com/codetestrawr"
        }
      }, {
        title: "blueshirts united",
        description: "Did some development work and maintanince on this rangers fan site hosted by MSG.",
        tags: ["SASS", "HAML", "JQuery", "Javascript", "RoR"],
        images: {
          icon: "icon_bsu.gif",
          screenshots: ["bsu.gif"]
        },
        links: {
          demo: "http://blueshirtsunited.com",
          github: ""
        }
      }, {
        title: "knicksnow",
        description: "Did some development work and maintanince on this Knicks fan site hosted by MSG.",
        tags: ["SASS", "HAML", "JQuery", "Javascript", "RoR"],
        images: {
          icon: "icon_knicks.gif",
          screenshots: ["knicks.gif"]
        },
        links: {
          demo: "http://knicksnow.com",
          github: ""
        }
      }, {
        title: "vsu victims database",
        description: "Implemented and maintained software to help the Social Works of the Victims Services Unit of the Brookyln DA's office maintain paperwork and statistical data about clients.",
        tags: ["MS Access, Visual Basic"],
        images: {
          icon: "icon_vsu.gif",
          screenshots: ["vsu.gif"]
        },
        links: {
          demo: "",
          github: ""
        }
      }, {
        title: "memberly",
        description: "implemented and maintained the front end development for Member.ly. Worked closely with designers to make sure site was pixel perfect implementations of the designs",
        tags: ["JQuery", "SASS", "HAML", "RoR"],
        images: {
          icon: "icon_memberly.gif",
          screenshots: ["memberly.gif"]
        },
        links: {
          demo: "http://member.ly",
          github: ""
        }
      }, {
        title: "shootout",
        description: "A game developed using Python and pygames. The code isn't anything spectacular but it was my first python creation and I created all the design elements myself.",
        tags: ["Python", "Pygames"],
        images: {
          icon: "icon_shootout.gif",
          screenshots: ["shootout.gif"]
        },
        links: {
          demo: "",
          github: ""
        }
      }, {
        title: "wordz",
        description: "My first javascript, JQuery creation in collect, also created these design elements myself. This was a collobrative project.",
        tags: ["HTML", "CSS", "Javascript", "JQuery"],
        images: {
          icon: "icon_wordz.gif",
          screenshots: ["wordz.gif"]
        },
        links: {
          demo: "",
          github: ""
        }
      }, {
        title: "playlist creator",
        description: "Created in Visual Studio this was meant to be a tool for server admins to create playlist for the H2V PC game.",
        tags: ["C#", "Visual Studio"],
        images: {
          icon: "icon_playlist-creator.gif",
          screenshots: ["playlist-creator.gif"]
        },
        links: {
          demo: "",
          github: ""
        }
      }, {
        title: "Group Commerce",
        description: "Front-end Engineer, Worked on the implementation of websites and updating the platform service.",
        tags: ["C#", "Visual Studio", "SASS", "HTML", "JQuery"],
        images: {
          icon: "icon_playlist-creator.gif",
          screenshots: ["playlist-creator.gif"]
        },
        links: {
          demo: "",
          github: ""
        }
      }
    ];
    return work;
  };

  intializeIsotope = function() {
    var $container;
    $container = $('#work-list');
    return $container.isotope({
      itemSelector: '.work-list-item'
    });
  };

  intializeLifeStream = function(online) {
    if (online) {
      return $("#lifestream").lifestream({
        list: [
          {
            service: "github",
            user: "PaigePonzeka"
          }, {
            service: "twitter",
            user: "PaigeTPonzeka"
          }, {
            service: "tumblr",
            user: "PaigePonzeka"
          }
        ]
      });
    } else {
      return $("#lifestream").html(lifestreamDemo());
    }
  };

  lifestreamDemo = function() {
    var offline;
    offline = "<ul class='lifestream demo'><li class='lifestream-twitter'>Just completed a 2.01 mile run playing <a href='http://search.twitter.com/search?q=%23zombiesrun'>#zombiesrun</a>: collected 22 supplies, outran a zombie mob <a href='http://t.co/tokDeGgN'>http://t.co/tokDeGgN</a></li><li class='lifestream-twitter'>RT <a href='http://twitter.com/GCpmn'>@GCpmn</a>: <a href='http://search.twitter.com/search?q=%23addittothequoteboard'>#addittothequoteboard</a> 'He's kind of hot for a duck' <a href='http://twitter.com/PaigeTPonzeka'>@PaigeTPonzeka</a></li><li class='lifestream-twitter'><a href='http://t.co/G5MTR86z'>http://t.co/G5MTR86z</a>   Human Behavior Theories That Can be Applied to Web Design From <a href='http://twitter.com/sixrevisions'>@sixrevisions</a></li><li class='lifestream-twitter'><a href='http://twitter.com/GCpmn'>@GCpmn</a> I mean he's just so cool. <a href='http://t.co/945BBXPS'>http://t.co/945BBXPS</a></li><li class='lifestream-twitter'>Request: Rebecca Black Nyan Cat... who do I call about this?</li><li class='lifestream-twitter'><a href='http://t.co/361VGOjc'>http://t.co/361VGOjc</a>  Zombie Apocalypse, the Board Game <a href='http://search.twitter.com/search?q=%23Zombies'>#Zombies</a></li><li class='lifestream-twitter'>'This is my first experience with a baby making situation.' My Boss Re: Someone's wife in Labor. <a href='http://search.twitter.com/search?q=%23GCAdventures'>#GCAdventures</a></li><li class='lifestream-twitter'>RT <a href='http://twitter.com/CandyNewYork'>@CandyNewYork</a>: Got 10 pitches today related to Shades of Grey. Duane Reade should capitalize and start stocking it next to the KY. <a href='http://search.twitter.com/search?q=%23j'>#j</a> ...</li><li class='lifestream-twitter'>RT <a href='http://twitter.com/frandrescher'>@frandrescher</a>: Dear <a href='http://twitter.com/boyscouts'>@boyscouts</a>, on Mother's Day I support Jennifer &amp; ALL moms, gay &amp; straight! <a href='http://search.twitter.com/search?q=%23scoutsforall'>#scoutsforall</a> <a href='http://t.co/g8xShAHW'>http://t.co/g8xShAHW</a></li><li class='lifestream-twitter'>RT <a href='http://twitter.com/HipChat'>@HipChat</a>: The <a href='http://twitter.com/UserVoice'>@UserVoice</a> team has a great HipChat setup going, check it out: <a href='http://t.co/ir1liZZQ'>http://t.co/ir1liZZQ</a></li></ul></article>";
    return offline;
  };

  createDinoMessagesArray = function() {
    var messages;
    messages = {
      "dino": ["Hi! I am Dino, Your assistant, would you like some assistance?"],
      "about": ["Hi! Are you trying to learn more about Paige?... Aren't we all..."],
      "work": ["Need help? Cus you probably shouldn't.", "Its a slideshow. It slides. It shows. Whoopy!"],
      "contact": ["Looks like you're trying to contact Paige, would you like some assistance?", "If you reach her, tell her to respond to that cat video I sent last week!"]
    };
    return messages;
    return getRandomMessage(messages.dino);
  };

  getRandomMessage = function(messages) {
    var random;
    random = Math.floor(Math.random() * messages.length);
    return messages[random];
  };

  getMessage = function() {
    switch (current_view) {
      case "dino":
        return getRandomMessage(dino_messages.dino);
      case "about":
        return getRandomMessage(dino_messages.about);
      case "work":
        return getRandomMessage(dino_messages.work);
      case "contact":
        return getRandomMessage(dino_messages.contact);
      default:
        return console.log("something went wrong");
    }
  };

  getAccessoryClass = function(listItem) {
    return "acc" + ($(listItem).index() + 1);
  };

  getHatClass = function(listItem) {
    return "hat" + ($(listItem).index() + 1);
  };

  getMessageClass = function(listItem) {
    return "message" + ($(listItem).index() + 1);
  };

  changeDino = function(nav_item) {
    var nav_item_class;
    if ($(nav_item).hasClass("light_blue")) {
      $('#first_name li:eq(0)').click();
      $('#last_name li:eq(3)').click();
    } else if ($(nav_item).hasClass("lime_green")) {
      $('#first_name li:eq(1)').click();
      $('#last_name li:eq(6)').click();
    } else if ($(nav_item).hasClass("purple")) {
      $('#first_name li:eq(2)').click();
      $('#last_name li:eq(4)').click();
    } else if ($(nav_item).hasClass("amber")) {
      $('#first_name li:eq(4)').click();
      $('#last_name li:eq(1)').click();
    }
    nav_item_class = $(nav_item).attr('class');
    setDinoColor(nav_item_class);
    $('#dino').removeClass().addClass(nav_item_class);
    return setSpeechBubble(nav_item_class);
  };

  resetDino = function() {
    setSpeechBubble('rawr');
    return $('#dino').removeClass();
  };

  setDinoHat = function(hat_class) {
    return $('#dino_hat').removeClass().addClass(hat_class);
  };

  setDinoAccessory = function(accessory_class) {
    return $('#dino_accessory').removeClass().addClass(accessory_class);
  };

  setDinoColor = function(color_class) {
    return $('#dino').removeClass().addClass(color_class);
  };

  setSpeechBubble = function(show_class) {
    $('#dino_bubble_content>li').addClass('hide');
    return $('#dino_bubble_content').find("." + show_class).removeClass('hide');
  };

  setSlideSelected = function(slide) {
    var slide_index, slide_width;
    slide_width = -700;
    $("#slides li").removeClass('selected');
    slide.addClass('selected');
    slide_index = parseInt($('#slides li.selected').index());
    $("#slideshow_window_content").animate({
      marginLeft: "" + (slide_width * slide_index)
    }, 500, function() {});
    if ($('#slides li.selected').index() === 0) {
      slideshowDisablePrevious();
    } else {
      slideshowEnablePrevious();
    }
    if ($('#slides li.selected').index() === ($('#slides li').length - 1)) {
      return slideshowDisableNext();
    } else {
      return slideshowEnableNext();
    }
  };

  slideshowDisableNext = function() {
    return $('#slideshow_controls_next').addClass('hide');
  };

  slideshowDisablePrevious = function() {
    return $('#slideshow_controls_previous').addClass('hide');
  };

  slideshowEnablePrevious = function() {
    return $('#slideshow_controls_previous').removeClass('hide');
  };

  slideshowEnableNext = function() {
    return $('#slideshow_controls_next').removeClass('hide');
  };

  slideshow_next = function() {
    var current_margin, current_selected, slide_set, slide_width, slide_window_width, slides_margin, slideshow_content;
    slideshowEnablePrevious();
    slideshow_content = $("#slideshow_window_content");
    slide_width = -700;
    slide_set = 5;
    current_margin = parseInt(slideshow_content.css('margin-left'));
    current_selected = $('#slides li.selected');
    setSlideSelected(current_selected.next('li'));
    if (($('#slides li.selected').index() + 1) === $('#slides li').length) {
      slideshowDisableNext();
    }
    if (current_selected.index() !== 0 && ($('#slides li.selected').index()) % slide_set === 0) {
      slide_window_width = parseInt($('#slide_window').css('width'));
      slides_margin = parseInt($('#slides').css('margin-left'));
      return $("#slides").animate({
        marginLeft: "" + (slides_margin - slide_window_width)
      }, 500, function() {});
    }
  };

  slideshow_previous = function() {
    var current_margin, current_selected, slide_set, slide_width, slide_window_width, slides_margin, slideshow_content;
    slideshowEnableNext();
    slideshow_content = $("#slideshow_window_content");
    slide_width = 700;
    slide_set = 5;
    current_margin = parseInt(slideshow_content.css('margin-left'));
    current_selected = $('#slides li.selected');
    setSlideSelected(current_selected.prev('li'));
    if (current_selected.index() === 1) {
      slideshowDisablePrevious();
    }
    if (current_selected.index() !== $('#slides li').length && ($('#slides li.selected').index() + 1) % slide_set === 0) {
      slide_window_width = parseInt($('#slide_window').css('width'));
      slides_margin = parseInt($('#slides').css('margin-left'));
      return $("#slides").animate({
        marginLeft: "" + (slides_margin + slide_window_width)
      }, 500, function() {});
    }
  };

  setSlideshowPages = function() {
    var num_of_pages, num_of_slides, page, page_link, page_list, _i, _results;
    num_of_slides = $('#slides li').length;
    num_of_pages = Math.ceil(num_of_slides / 5);
    _results = [];
    for (page = _i = 1; 1 <= num_of_pages ? _i <= num_of_pages : _i >= num_of_pages; page = 1 <= num_of_pages ? ++_i : --_i) {
      page_link = $("<a />", {
        text: page,
        href: "#"
      });
      page_list = $("<li />");
      page_list.html(page_link);
      _results.push($('#slideshow_pages ul').append(page_list));
    }
    return _results;
  };

  changeSlideshowPage = function(page_num) {
    var slide_window_width, slides_margin;
    slide_window_width = parseInt($('#slide_window').css('width'));
    slides_margin = -((page_num - 1) * slide_window_width);
    $("#slides").animate({
      marginLeft: "" + slides_margin
    }, 500, function() {});
    return false;
  };

}).call(this);
