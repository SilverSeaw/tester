<!DOCTYPE php>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lorem-Opus</title>
    <link href='fullcalendar-5.11.3/lib/main.css' rel='stylesheet' />
    <script src='fullcalendar-5.11.3/lib/main.js'></script>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Adicionar-nova-tarefa.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <script>

  document.addEventListener('DOMContentLoaded', function() {
    var initialLocaleCode = 'pt-br';
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      locale: initialLocaleCode,
      selectMirror: true,
      select: function(arg) {
        var title = prompt('Event Title:');
        if (title) {
          calendar.addEvent({
            title: title,
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
          })
        }
        calendar.unselect()
      },
      eventClick: function(arg) {
        if (confirm('Are you sure you want to delete this event?')) {
          arg.event.remove()
        }
      },
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
      ]
    });

    calendar.render();
  });

    </script>
</head>
<body class="u-body u-overlap u-xl-mode">
  <header class="u-clearfix u-header u-sticky u-header" id="sec-8ab8"><div class="u-clearfix u-sheet u-sheet-1">
    <a href="calendario.php" class="u-image u-logo u-image-1" data-image-width="1920" data-image-height="1080" title="Adicionar nova tarefa">
      <img src="LoremOpus1.png" class="u-logo-image u-logo-image-1">
    </a>
    <nav class="u-align-right u-menu u-menu-dropdown u-offcanvas u-menu-1">
      <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px; font-weight: 700;">
        <a class="u-button-style u-custom-border u-custom-border-color u-custom-borders u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
          <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
          <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
        </a>
      </div>
      <div class="u-custom-menu u-nav-container">
        <ul class="u-nav u-spacing-20 u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-2-base" href="Adicionar-nova-tarefa.php" style="padding: 10px;">Adicionar nova tarefa</a>
</li><li class="u-nav-item"><a class="u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-2-base" href="Perfil.php" style="padding: 10px;">Perfil</a>
</li></ul>
      </div>
      <div class="u-custom-menu u-nav-container-collapse">
        <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
          <div class="u-inner-container-layout u-sidenav-overflow">
            <div class="u-menu-close"></div>
            <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Adicionar-nova-tarefa.php">Adicionar nova tarefa</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Perfil.php">Perfil</a>
</li></ul>
          </div>
        </div>
        <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
      </div>
    </nav>
  </div>
</header>
  <section class="u-clearfix u-section-1" id="sec-02a4" style="top: 100px;">
    <div class="calendario" style="
    width: 100vw; display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;">
      <div id='calendar'></div>
    </div>
  </section>
  <script src="script.js"></script>
</body>
</html>