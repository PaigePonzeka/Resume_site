(function() {
  var changeDino, changeSlideshowPage, createDinoMessagesArray, current_view, dino_messages, filterIsotope, generateIsotopeFilter, getAccessoryClass, getHatClass, getMessage, getMessageClass, getRandomMessage, getWorkDetails, intializeIsotope, intializeLifeStream, intializeWorkIsotope, $isotope_container, lifestreamDemo, resetDino, setDinoAccessory, setDinoColor, setDinoHat, setSectionHeight, setSidebarHeight, setSlideSelected, setSlideshowPages, setSpeechBubble, slideshowDisableNext, slideshowDisablePrevious, slideshowEnableNext, slideshowEnablePrevious, slideshow_next, slideshow_previous, toClass;
  var $tags = [];
  current_view = "dino";

  dino_messages = [];

  window.class_colors = [];

  $isotope_container;

  $(window).resize(function() {
    setSidebarHeight();
    return setSectionHeight();
  });

  $(window).scroll(function() {
    var current_view_link;
    current_view = $("section>div:in-viewport").attr('id');
    current_view_link = $("#" + current_view + "-link");
    if (!current_view_link.parents('li').hasClass('active')) {
      $('.sidebar-navigation li').removeClass('active');
      return current_view_link.parents('li').addClass('active');
    }
  });

  $(document).ready(function() {
    intializeWorkIsotope($("#work-list"));
    intializeLifeStream(true);
    setSidebarHeight();
    setSectionHeight();
    intializeIsotope();

    /* resizing and relayouting the list */
    $isotope_container.on('click', '.isotope-item', function(){
        $this = $(this);
        if($this.hasClass('large')){
           //$this.removeClass('large')
        }
        else{
          $isotope_container.find('.isotope-item').removeClass('large');
          $this.addClass('large')
        }
        $isotope_container.isotope('reLayout');

    });

    $('#home #top_nav ul li').hover((function() {
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
    $(".sidebar-navigation a").bind("click", function(event) {
      var $anchor;
      $(".sidebar-navigation li").removeClass('active');
      $(this).parents('li').addClass("active");
      $anchor = $(this);
      console.log($(this));
      console.log($($anchor.attr('href')));
      $("html, body").stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top
      }, 1000);
      return event.preventDefault();
    });
    /*$('#slideshow_controls_previous').click(function() {
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
    });*/
    $('#little_dino_bubble_buttons_yes').click(function() {
      return console.log("Yes");
    });
    $('#little_dino_bubble_buttons_no').click(function() {
      return hideLittleDino();
    });
    return $('#work-list-filters li a').live('click', function() {
      var item;
      item = $(this).data('filter');
      $('#work-list-filters li').removeClass("active");
      $(this).parents('li').addClass('active');
      return filterIsotope("" + item);
    });


  });

  setSidebarHeight = function() {
    return $('.sidebar, .sidebar-wrapper, .sidebar-zigzag').css('height', $(window).height());
  };

  setSectionHeight = function() {
    return $('section').css('min-height', $(window).height());
  };

  intializeWorkIsotope = function(container) {
    var current_color, work_data;
    work_data = getWorkDetails();

    var source   = $("#work-template").html();
    var template = Handlebars.compile(source);
    var html    = template(work_data);
    $('#work-content').html(html);
    $isotope_container= $('#work-list');

    $('.js-slider').nivoSlider({ manualAdvance:true});
  };

  toClass = function(item) {
    item = item.replace(/\s+/g, "-");
    return item;
  };


  Handlebars.registerHelper('toClassName', function(tag) {
    var new_tag = tag.toLowerCase().replace(/\s/g, '-');
    return new_tag;
  });



  getWorkDetails = function() {
    var work;
    work = {
      'tag':["SASS", "HAML","JQuery", "Javascript", "RoR", "Visual Basic", "Python", "Visual Studio"],
      "work" :[
      {
        title: "stats2v",
        description: "This was a collborative project with programmers to develop an application that track player stats from servers. Stats2V was the site for players to view their stats and compare themselves to other players.",
        tags: ["PHP", "HTML", "CSS", "JQuery", "Javascript", "C#"],
        images: {
          icon: "icon_stats2v.gif",
          screenshots: [
            {
              image: "stats2v/1.png",
              description:  "This was a collborative project with programmers to develop an application that track player stats from servers. Stats2V was the site for players to view their stats and compare themselves to other players."
            },
            {
              image: "stats2v/2.png",
              description:  "This was a collborative project with programmers to develop an application that track player stats from servers. Stats2V was the site for players to view their stats and compare themselves to other players."
            },
            {
              image: "stats2v/3.png"
            },
            {
              image: "stats2v/4.png"
            },
            {
              image: "stats2v/5.png"
            },
            {
              image: "stats2v/6.png"
            },
            {
              image: "stats2v/7.png"
            }
          ]
        }
      }, {
        title: "blueshirts united",
        description: "Did some development work and maintanince on this rangers fan site hosted by MSG.",
        tags: ["SASS", "HAML", "JQuery", "Javascript", "RoR"],
        images: {
          icon: "icon_bsu.gif",
          screenshots: [
            {
              image: "bsu.gif",
              description: "Did some development work and maintanince on this rangers fan site hosted by MSG.",
            }
          ]
        },
        links: [
            {
              name: "Live",
              href: "http://blueshirtsunited.com"
            }
          ]
      }, {
        title: "knicksnow",
        description: "Did some development work and maintanince on this Knicks fan site hosted by MSG.",
        tags: ["SASS", "HAML", "JQuery", "Javascript", "RoR"],
        images: {
          icon: "icon_knicks.gif",
          screenshots: [
            {
              image: "knicks.gif",
              description: "Did some development work and maintanince on this Knicks fan site hosted by MSG."
            }
          ]
        },
        links: [
            {
              name: "Live",
              href: "http://knicksnow.com"
            }
          ]
      }, {
        title: "VSU victims database",
        description: "Implemented and maintained software to help the Social Works of the Victims Services Unit of the Brookyln DA's office maintain paperwork and statistical data about clients.",
        tags: ["MS Access", "Visual Basic"],
        images: {
          icon: "icon_vsu.gif",
           screenshots: [
            {
              image: "vsu/2.png",
              description: "Implemented and maintained software to help the Social Works of the Victims Services Unit of the Brookyln DA's office maintain paperwork and statistical data about clients."
            },
            {
              image: "vsu/1.png"
            }
          ]
        }
      }, {
        title: "memberly",
        description: "implemented and maintained the front end development for Member.ly. Worked closely with designers to make sure site was pixel perfect implementations of the designs",
        tags: ["JQuery", "SASS", "HAML", "Coffeescript", "RoR"],
        images: {
          icon: "icon_memberly.gif",
           screenshots: [
            {
              image: "memberly/1.png",
              description: "implemented and maintained the front end development for Member.ly. Worked closely with designers to make sure site was pixel perfect implementations of the designs"
            },
            {
              image: "memberly/2.png"
            },
            {
              image: "memberly/3.png"
            },
            {
              image: "memberly/4.png"
            }
          ]
        },
        links: [
            {
              name: "Live",
              href: "http://member.ly"
            }
          ]
      }, {
        title: "shootout",
        description: "A game developed using Python and pygames. The code isn't anything spectacular but it was my first python creation and I created all the design elements myself.",
        tags: ["Python", "Pygames"],
        images: {
          icon: "icon_shootout.gif",
          screenshots: [
            {
              image: "shootout/1.png",
              description: "A game developed using Python and pygames. The code isn't anything spectacular but it was my first python creation and I created all the design elements myself."
            },
            {
              image: "shootout/2.png"
            },
            {
              image: "shootout/3.png"
            },
          ]
        },
        links: [
            {
              name: "Demo",
              href: ""
            }
          ]
      }, {
        title: "wordz",
        description: "My first javascript, JQuery creation in collect, also created these design elements myself. This was a collobrative project.",
        tags: ["HTML", "CSS", "Javascript", "JQuery"],
        images: {
          icon: "icon_wordz.gif",
           screenshots: [
            {
              image: "wordz/1.png",
              description: "My first javascript, JQuery creation in collect, also created these design elements myself. This was a collobrative project."
            },
            {
              image: "wordz/2.png"
            },
            {
              image: "wordz/3.png"
            },
          ]
        },
        links: [
            {
              name: "Demo",
              href: "demos/wordz/index.html"
            }
          ]
      }, {
        title: "playlist creator",
        description: "Created in Visual Studio this was meant to be a tool for server admins to create playlist for the H2V PC game.",
        tags: ["C#", "Visual Studio"],
        images: {
          icon: "icon_playlist-creator.gif",
          screenshots: [
            {
              image: "playlistcreator/1.png",
              description: "Created in Visual Studio this was meant to be a tool for server admins to create playlist for the H2V PC game."
            },
            {
              image: "playlistcreator/2.png"
            },
            {
              image: "playlistcreator/3.png"
            }
          ]
        }
      }, {
        title: "Group Commerce",
        description: "Front-end Engineer, Worked on the implementation of websites and updating the platform service.",
        tags: ["C#", "Visual Studio", "SASS", "HTML", "JQuery", "D3js"],
        images: {
          icon: "icon_gc.png",
           screenshots: [
             {
               image: "gc/home.png",
               description: "Reimplemented the entire front-end site with the help of a product team and a designer to create a better user interface."
             },
             {
                 image: "gc/grid-fullscreen.png",
                 description: "Created a new grid display plugin using D3.js. Created a Fullscreen mode as pictured above."
             },
             {
                  image: "gc/contracts.png",
                  description: "Created a display contracts so users can browse for specific contracts, provided filters to find specific contracts."
              },
              {
                   image: "gc/contracts-hover.png",
                   description: "Users can edit or create contracts from this grid."
               },
               {
                    image: "gc/offers.png",
                    description: "Users can see their created offers and schedule them and run them as they want."
                },
             {
                image: "gc/calendar.png",
                description: "Users can view their running offers."
              },
              {
                  image: "gc/calendar-list.png",
                  description: "Users can edit the running time of their offers."
              },
              {
                  image: "gc/notifications.png",
                  description: "Users can manage their notifications for generated, ending offers and other such details."
              }
           ]
        }
      },
      {
        title: "Game Design Summer Workshop",
        description: "Worked as the sole developer in a three person design and management team to create a game concept, test the concept and implement the concept using proper game development techniques.",
        tags: ["Java", "Class"],
        images: {
          icon: "icon_playlist-creator.gif",
          screenshots: [
          ]
        }
      },
      {
        title: "Intro to Visual Design Fundamentals",
        description: "Learned the fundamentals of photo re-touching/manipulation, creating vector illustrations, page layout, and professional design workflows. .",
        tags: ["Class"],
        images: {
          icon: "icon_ga.png",
          screenshots: [
            {
               image: "visual/1.jpg",
               description: "Original."
             },
             {
                 image: "visual/2.png",
                 description: "Edited."
             },
             {
                 image: "visual/3.jpg",
                 description: "Original."
             },
             {
                  image: "visual/4.png",
                  description: "Edit."
              }
          ]
        }
      }
    ]};
    return work;
  };

  filterIsotope = function(item) {
    return $isotope_container.isotope({
      filter: item
    });
  };

  intializeIsotope = function() {
    return $isotope_container.isotope({
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
  
  intializeTwitterStream = function(online){
     return $("#lifestream").lifestream({
        list: [{
            service: "twitter",
            user: "PaigeTPonzeka"
          }
        ]
      });
  }

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

  /*setSlideSelected = function(slide) {
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
  };*/

 /* slideshowDisableNext = function() {
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
  };*/

/*
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
  };*/

}).call(this);
