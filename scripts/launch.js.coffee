current_view = "dino"
dino_messages = []
window.class_colors = [] # stores an associative array of color classes for work
isotope_container =$('#work-list')
$(document).ready ->
  impress().init() # initialize slideshow
  # intialize life stream
  intializeWorkIsotope($("#work-list")) # intialize isotop content
  intializeLifeStream(false)

  intializeIsotope()

  #filterIsotope()
  # generate dino_messages array
  #dino_messages = createDinoMessagesArray()
  # Intilize litte Dino
  #showLittleDinoMessage()
  # checking what is is viewpoint and making it as active
  $(window).scroll ->
    inview_id = $('section:in-viewport').attr('id')
    #set the navigation based on what section is in view
    if (current_view != inview_id)
      current_view = inview_id
      $("nav ul li a").removeClass('active')
      $("nav ul li.#{inview_id} a").addClass('active')
      #showLittleDino()


  # hover effects for navigation bar
  $('#top_nav ul li').hover (->
    changeDino(this)

  ), ->
    resetDino()

  # Setting selected for first name hover over
  $('#first_name li').click ->
    $('#first_name li').removeClass('active')
    $(this).addClass('active')
    item_index = $(this).index() + 1

    # set speech bubble message based on hat
    message = getMessageClass(this)
    $("#dino_bubble_content .rawr li").addClass('hide')
    $(".#{message}").removeClass('hide')
    hat_class = getHatClass(this)
    setDinoHat(hat_class)

  $('#last_name li').click ->
    # give the button active class for styling
    $('#last_name li').removeClass('active')
    $(this).addClass('active')
    accessory_class = getAccessoryClass(this)
    setDinoAccessory(accessory_class)

  # on hover of last name set the accessory
  $('#first_name li').hover (->
    hat_class = getHatClass(this)
    setDinoHat(hat_class)
    ), ->
    #find the 'active' last_name accessory and set that one as active
    current_active = $('#first_name li.active')
    if current_active.length != 0  #there might be no active accessory
      setDinoHat(getHatClass(current_active))
    else
      $('#dino_hat').addClass('hide')

  # on hover of last name set the accessory
  $('#last_name li').hover (->
    accessory_class = getAccessoryClass(this)
    setDinoAccessory(accessory_class)
    ), ->
    #find the 'active' last_name accessory and set that one as active
    current_active = $('#last_name li.active')
    if current_active.length != 0  #there might be no active accessory
      setDinoAccessory(getAccessoryClass(current_active))
    else
      $('#dino_accessory').addClass('hide')

  ########  Scrolling Navigation  ########
  $("nav a, #top_nav a").bind "click", (event) ->
    $anchor = $(this)

    $("html, body").stop().animate
     scrollTop: $($anchor.attr('href')).offset().top
    , 1000
    event.preventDefault()

  ###############     Slideshow      #################
  $('#slideshow_controls_previous').click ->
    # move to the previous set of slides or move to the next slide
    slideshow_previous()

  $('#slideshow_controls_next').click ->
    # move to the next slide or the next set of slides
    slideshow_next()

  $('#slides li').click ->
    #set selected
    setSlideSelected($(this))
    #show the slide in the window

  # intialize the slideshow pages
  setSlideshowPages()

  # when a page is clicked scroll to it
  $('#slideshow_pages ul li a').click ->
    page_num = parseInt($(this).html())
    changeSlideshowPage(page_num)
    false


  # Reaction to Little Dino (Clippy) Buttons
  $('#little_dino_bubble_buttons_yes').click ->
    console.log("Yes");

  $('#little_dino_bubble_buttons_no').click ->
    hideLittleDino()


# get the json data structure of the work details and populate the isotope
intializeWorkIsotope=(container)->
  work_data = getWorkDetails()
  current_color = 16777215
  # for each work item in the work details array
  $(work_data).each ->
    work_item = $(this)[0]
    # create a new isotope object
    item = $("<li/>", {class: "work-list-item"})

    item_title = $("<h3/>",{class: "work-list-item-title", text:work_item.title})
    item_description = $("<p/>",{class: "work-list-item-description", text:work_item.description})

    # Create a list item for each item tag and append it to the ul
    item_tags_list = $("<ul/>",{class: "work-list-item-tags"})
    work_item_tags = work_item.tags
    $(work_item_tags).each ->
      item_tags_list_item = $("<li/>", {text: "#{this}"})

      color_class = "#{this.toLowerCase()}"
      item.addClass(color_class)
      current_color = generateAnArrayOfColors(current_color, color_class)
      item_tags_list.append(item_tags_list_item.css('background', "#{current_color.toString(16)}"))

    # images
    images_folder = "images/work/"
    # icons
    work_icon = work_item.images.icon
    # right now assuming blank icon if none
    if (work_icon.length > 0)
      item_icon = $("<img/>",{class: "work-list-item-icon", src: "#{images_folder}#{work_icon}"})


    work_screenshots = work_item.images.screenshots
    if(work_screenshots.length > 0)
      console.log("use it")
      $(work_screenshots).each ->
        console.log("#{this}")
        # TODO Not sure what I'm using screenshots for right now
        #item_screenshot = $("<img/>",{class: "work-list-item-screenshot"})

    # appending everything to the isotope object
    item
      .append(item_icon)
      .append(item_title)
      .append(item_description)
      .append(item_tags_list)

    # append isotope object to isotope container
    container.append(item)

# updates the color spectrum to generate a new color
# returns an hexidecimal value for the color
generateAnArrayOfColors=(currentColor, colorClass) ->
  console.log(class_colors[colorClass])
  if(class_colors[colorClass])
    currentColor = class_colors[colorClass]
  else
    # generate a new color
    currentColor = currentColor - 50000
    class_colors[colorClass] = currentColor
    generateIsotopeFilter(currentColor, colorClass)
  return currentColor

#  color_class item create a new filter where key = title
generateIsotopeFilter=(currentColor, colorClass)->
  # create an item and append it to the work list filter
  filter_item = $("<li/>", {class: "work-list-filter-item": onClick="filterIsotope('.#{colorClass}')"})
  filter_item.html(colorClass)
  $("#work-list-filters").append(filter_item)
  console.log filter_item

# returns the work details json data structure
getWorkDetails = ->
  work = [
    title: "stats2v",
    description: "This was a collborative project with programmers to develop an application that track player stats from servers and then uploaded them to a database. Stats2V was the user interface for playersto view their stats and compare themselves to other players.",
    tags: ["PHP","HTML", "CSS", "JQuery", "Javascript", "C#"],
    images:
      icon: "icon_stats2v.gif",
      screenshots: ["stats2v.gif"]
    links:
      demo: "demo.test.html"
      github: "http://github.com/codetestrawr"

  ,
    title: "blueshirts united",
    description: "Did some development work and maintanince on this rangers fan site hosted by MSG.",
    tags: ["SASS", "HAML", "JQuery", "Javascript", "RoR"],
    images:
      icon: "icon_bsu.gif",
      screenshots: ["bsu.gif"]
    links:
      demo: "http://blueshirtsunited.com"
      github: ""
  ,
    title: "knicksnow",
    description: "Did some development work and maintanince on this Knicks fan site hosted by MSG.",
    tags: ["SASS", "HAML", "JQuery", "Javascript", "RoR"],
    images:
      icon: "icon_knicks.gif",
      screenshots: ["knicks.gif"]
    links:
      demo: "http://knicksnow.com"
      github: ""
  ,
    title: "vsu victims database",
    description: "Implemented and maintained software to help the Social Works of the Victims Services Unit of the Brookyln DA's office maintain paperwork and statistical data about clients.",
    tags: ["MS Access, Visual Basic"],
    images:
      icon: "icon_vsu.gif",
      screenshots: ["vsu.gif"]
    links:
      demo: ""
      github: ""
  ,

    title: "memberly",
    description: "implemented and maintained the front end development for Member.ly. Worked closely with designers to make sure site was pixel perfect implementations of the designs",
    tags: ["JQuery", "SASS", "HAML", "RoR"],
    images:
      icon: "icon_memberly.gif",
      screenshots: ["memberly.gif"]
    links:
      demo: "http://member.ly"
      github: ""
  ,
    title: "shootout",
    description: "A game developed using Python and pygames. The code isn't anything spectacular but it was my first python creation and I created all the design elements myself.",
    tags: ["Python", "Pygames"],
    images:
      icon: "icon_shootout.gif",
      screenshots: ["shootout.gif"]
    links:
      demo: ""
      github: ""
  ,
      title: "wordz",
      description: "My first javascript, JQuery creation in collect, also created these design elements myself. This was a collobrative project.",
      tags: ["HTML", "CSS", "Javascript", "JQuery"],
      images:
        icon: "icon_wordz.gif",
        screenshots: ["wordz.gif"]
      links:
        demo: ""
        github: ""
  ,
    title: "playlist creator",
    description: "Created in Visual Studio this was meant to be a tool for server admins to create playlist for the H2V PC game.",
    tags: ["C#", "Visual Studio"],
    images:
      icon: "icon_playlist-creator.gif",
      screenshots: ["playlist-creator.gif"]
    links:
      demo: ""
      github: ""

  ,
    title: "Group Commerce",
    description: "Front-end Engineer, Worked on the implementation of websites and updating the platform service.",
    tags: ["C#", "Visual-Studio", "SASS", "HTML", "JQuery"],
    images:
      icon: "icon_playlist-creator.gif",
      screenshots: ["playlist-creator.gif"]
    links:
      demo: ""
      github: ""
      ]
  work


filterIsotope= ->
  isotope_container.isotope
    filter: '.haml'


# intializing the isotope for the work container
intializeIsotope= ->
  isotope_container.isotope
    itemSelector: '.work-list-item'




# Call the lifestream object and intialize it on the data structure
intializeLifeStream=(online) ->
  if online
    $("#lifestream").lifestream list: [
      service: "github"
      user: "PaigePonzeka"
    ,
      service: "twitter"
      user: "PaigeTPonzeka"
    ,
      service: "tumblr"
      user: "PaigePonzeka"
    ]
  else
    $("#lifestream").html(lifestreamDemo())


# Just Some default text for Isotope
# Used to see styling when working offline
lifestreamDemo = ->
  offline = "<ul class='lifestream demo'><li class='lifestream-twitter'>Just completed a 2.01 mile run playing <a href='http://search.twitter.com/search?q=%23zombiesrun'>#zombiesrun</a>: collected 22 supplies, outran a zombie mob <a href='http://t.co/tokDeGgN'>http://t.co/tokDeGgN</a></li><li class='lifestream-twitter'>RT <a href='http://twitter.com/GCpmn'>@GCpmn</a>: <a href='http://search.twitter.com/search?q=%23addittothequoteboard'>#addittothequoteboard</a> 'He's kind of hot for a duck' <a href='http://twitter.com/PaigeTPonzeka'>@PaigeTPonzeka</a></li><li class='lifestream-twitter'><a href='http://t.co/G5MTR86z'>http://t.co/G5MTR86z</a>   Human Behavior Theories That Can be Applied to Web Design From <a href='http://twitter.com/sixrevisions'>@sixrevisions</a></li><li class='lifestream-twitter'><a href='http://twitter.com/GCpmn'>@GCpmn</a> I mean he's just so cool. <a href='http://t.co/945BBXPS'>http://t.co/945BBXPS</a></li><li class='lifestream-twitter'>Request: Rebecca Black Nyan Cat... who do I call about this?</li><li class='lifestream-twitter'><a href='http://t.co/361VGOjc'>http://t.co/361VGOjc</a>  Zombie Apocalypse, the Board Game <a href='http://search.twitter.com/search?q=%23Zombies'>#Zombies</a></li><li class='lifestream-twitter'>'This is my first experience with a baby making situation.' My Boss Re: Someone's wife in Labor. <a href='http://search.twitter.com/search?q=%23GCAdventures'>#GCAdventures</a></li><li class='lifestream-twitter'>RT <a href='http://twitter.com/CandyNewYork'>@CandyNewYork</a>: Got 10 pitches today related to Shades of Grey. Duane Reade should capitalize and start stocking it next to the KY. <a href='http://search.twitter.com/search?q=%23j'>#j</a> ...</li><li class='lifestream-twitter'>RT <a href='http://twitter.com/frandrescher'>@frandrescher</a>: Dear <a href='http://twitter.com/boyscouts'>@boyscouts</a>, on Mother's Day I support Jennifer &amp; ALL moms, gay &amp; straight! <a href='http://search.twitter.com/search?q=%23scoutsforall'>#scoutsforall</a> <a href='http://t.co/g8xShAHW'>http://t.co/g8xShAHW</a></li><li class='lifestream-twitter'>RT <a href='http://twitter.com/HipChat'>@HipChat</a>: The <a href='http://twitter.com/UserVoice'>@UserVoice</a> team has a great HipChat setup going, check it out: <a href='http://t.co/ir1liZZQ'>http://t.co/ir1liZZQ</a></li></ul></article>"
  offline

# Contains all the messages Clippy Dino Can say
createDinoMessagesArray=->
  messages =
    "dino" :
      ["Hi! I am Dino, Your assistant, would you like some assistance?"]
    "about" :
      ["Hi! Are you trying to learn more about Paige?... Aren't we all..."]
    "work" :
      ["Need help? Cus you probably shouldn't.",
      "Its a slideshow. It slides. It shows. Whoopy!"]
    "contact" :
      ["Looks like you're trying to contact Paige, would you like some assistance?",
      "If you reach her, tell her to respond to that cat video I sent last week!"]

  return messages
  getRandomMessage(messages.dino)


# get a random message between the array length and 0
# return the string at that location
getRandomMessage= (messages)->
  random= Math.floor(Math.random()*messages.length)
  return messages[random]


# Based on the current view gets the message type and returns the string
getMessage=->
  switch current_view
    when "dino" then return getRandomMessage(dino_messages.dino)
    when "about" then return getRandomMessage(dino_messages.about)
    when "work" then return getRandomMessage(dino_messages.work)
    when "contact" then return getRandomMessage(dino_messages.contact)
    else console.log("something went wrong")


# Changes the class of the message
#showLittleDinoMessage=()->
#  $('#little_dino_bubble').hide()
  # change the message
#  $('#little_dino_bubble_content p.message').text(getMessage())
  # show the new bubble
#  $('#little_dino_bubble').fadeIn(200);

# Hides the clippy little Dino
#hideLittleDino =()->
#  $('#little_dino_bubble').hide();
#  $('#little_dino').fadeOut(300);
#  $('#little_dino_container').hide();

# shows the little dino based on the set speech bubble type
#showLittleDino=()->
  # hide the bubble
#  $('#little_dino_bubble').hide();
  # show little dino
#  $('#little_dino_container').show();
#  $('#little_dino').show();
  # show speech bubble
#  showLittleDinoMessage();



# returns a string of the accessory class using index of li in #last_name
getAccessoryClass = (listItem) ->
  return "acc" + ($(listItem).index() + 1)


# returns a string of the accessory class using index of li in #first_name
getHatClass = (listItem) ->
  return "hat" + ($(listItem).index() + 1)


getMessageClass = (listItem) ->
  return "message" + ($(listItem).index() + 1)

# Changes Dino color
changeDino = (nav_item) ->
  if ($(nav_item).hasClass("light_blue"))
    $('#first_name li:eq(0)').click()
    $('#last_name li:eq(3)').click()
  else if ($(nav_item).hasClass("lime_green"))
    $('#first_name li:eq(1)').click()
    $('#last_name li:eq(6)').click()
  else if ($(nav_item).hasClass("purple"))
    $('#first_name li:eq(2)').click()
    $('#last_name li:eq(4)').click()
  else if ($(nav_item).hasClass("amber"))
    $('#first_name li:eq(4)').click()
    $('#last_name li:eq(1)').click()
  nav_item_class = $(nav_item).attr('class')
  setDinoColor(nav_item_class)
  $('#dino').removeClass().addClass(nav_item_class)
  setSpeechBubble(nav_item_class)


# resets dino to page load state
resetDino= ->
  setSpeechBubble('rawr')
  $('#dino').removeClass()


# set Dino Hat
setDinoHat= (hat_class)->
  $('#dino_hat').removeClass().addClass(hat_class)


# set Dino Accessory
setDinoAccessory= (accessory_class) ->
  $('#dino_accessory').removeClass().addClass(accessory_class)


# sets color_class to dino to get ther right image
setDinoColor=(color_class) ->
  $('#dino').removeClass().addClass(color_class)


# sets speech bubble content to the show_class
setSpeechBubble=(show_class)->
  $('#dino_bubble_content>li').addClass('hide')
  $('#dino_bubble_content').find(".#{show_class}").removeClass('hide')


###############     Slideshow      #################
setSlideSelected=(slide)->
  slide_width = -700

  $("#slides li").removeClass('selected')
  slide.addClass('selected')
  slide_index = parseInt($('#slides li.selected').index())
  # setting the margin left of the slide window based on index * slide_width
  $("#slideshow_window_content").animate
    marginLeft: "#{(slide_width * slide_index)}"
  , 500, ->
  # Check if index of currently selected is index =1 and disable previous
  if ($('#slides li.selected').index() == 0)
    slideshowDisablePrevious()
  else
    slideshowEnablePrevious()

  if ($('#slides li.selected').index() == ($('#slides li').length-1))
    slideshowDisableNext()
  else
    slideshowEnableNext()

slideshowDisableNext= ->
  $('#slideshow_controls_next').addClass('hide')

slideshowDisablePrevious=->
  $('#slideshow_controls_previous').addClass('hide')

slideshowEnablePrevious=->
  $('#slideshow_controls_previous').removeClass('hide')

slideshowEnableNext=->
  $('#slideshow_controls_next').removeClass('hide')

slideshow_next= ->
  # reshow the previous control
  slideshowEnablePrevious()
  slideshow_content = $("#slideshow_window_content")
  slide_width = -700
  slide_set = 5
  current_margin = parseInt(slideshow_content.css('margin-left'))
  #set next slide as selected
  #find the currently selected slide
  current_selected = $('#slides li.selected')
  setSlideSelected(current_selected.next('li'))
  # when you hit the last slide disable next button
  if(($('#slides li.selected').index() + 1) == $('#slides li').length)
    slideshowDisableNext()
  # TODO when you hit the end of a set do something
  if(current_selected.index() != 0 && ($('#slides li.selected').index()) % slide_set == 0)
    slide_window_width = parseInt($('#slide_window').css('width'))
    slides_margin = parseInt($('#slides').css('margin-left'))
    $("#slides").animate
      marginLeft: "#{(slides_margin - slide_window_width)}"
    , 500, ->



slideshow_previous= ->
  #reshow the next control
  slideshowEnableNext()
  slideshow_content = $("#slideshow_window_content")
  slide_width = 700
  slide_set = 5
  current_margin = parseInt(slideshow_content.css('margin-left'))

  #set previous slide as selected
  current_selected = $('#slides li.selected')
  setSlideSelected(current_selected.prev('li'))
  # when you hit the first slide disable previous button
  if(current_selected.index() == 1)
    slideshowDisablePrevious()
  # TODO when you hit the first of the set do something
  if(current_selected.index() != $('#slides li').length && ($('#slides li.selected').index()+1) % slide_set == 0)
    slide_window_width = parseInt($('#slide_window').css('width'))
    slides_margin = parseInt($('#slides').css('margin-left'))
    $("#slides").animate
      marginLeft: "#{(slides_margin + slide_window_width)}"
    , 500, ->

# for every 5 slides add another page to the slideshow pages nav
setSlideshowPages= ->
  num_of_slides = $('#slides li').length
  num_of_pages = Math.ceil(num_of_slides/5)
  for page in [1..num_of_pages]
    page_link = $("<a />",
      text: page,
      href: "#"
    )
    page_list = $("<li />")
    page_list.html(page_link)
    $('#slideshow_pages ul').append(page_list)


#when a page is clicked set the margins to scroll to the page
changeSlideshowPage=(page_num)->
  slide_window_width = parseInt($('#slide_window').css('width'))
  slides_margin = -((page_num-1) * slide_window_width)
  $("#slides").animate
    marginLeft: "#{slides_margin}"
  , 500, ->
  #set the first slide as selected
  false


