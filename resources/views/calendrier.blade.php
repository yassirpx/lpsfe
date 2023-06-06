@extends('index')
@section('content')


      
<div class="card-box pb-10">
    <script>
          function getFirstBetween(startDate, endDate , day) {
         let currentDate = new Date(startDate); // start at the beginning of the range
     while (currentDate <= endDate) { // loop through each date until the end of the range
       if (currentDate.getDay() === day) { // 0 is Sunday, 1 is Monday, etc.
        return currentDate; // return the first Monday found
      }
      currentDate.setDate(currentDate.getDate() + 1); // move to the next day
    }
     return null; // return null if no Monday is found in the range
  }
        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
          
          let stats = {!! json_encode($stats) !!};
          let seances = {!! json_encode($seances) !!};
            console.log(seances);
            let periodes  = {!! json_encode($periodes) !!};
            console.log(periodes);
            let array= []
            periodes.forEach(periode => {
              array= []
       let startd= periode.debutperi;
       let endd=periode.finperi;
       // Set the two dates to compare
      let startdate = new Date(startd);
      let enddate = new Date(endd);
      console.log(startdate.toISOString())
      // Calculate the difference in milliseconds between the two dates
      let differenceMs = Math.abs(enddate.getTime() - startdate.getTime());
      // Calculate the number of weeks between the two dates
       let weeks = Math.floor(differenceMs / (1000 * 60 * 60 * 24 * 7));
       seances.forEach(seance => { 
        let day = parseInt(seance.daysean) ;
       let firstday = getFirstBetween(startdate, enddate,day).toISOString().replace(/\//g, "-");
       fday = firstday.split('T')
       console.log(fday[0])   
         let newDate = new Date(fday[0]);
       for (let i = 0; i < weeks; i++) { 
        console.log(newDate)  
           startday = newDate.toISOString().slice(0, 10)+'T'+seance.debutsean;
           endday = newDate.toISOString().slice(0, 10)+'T'+seance.finsean;
           if(stats=='Professeur' && newDate >= Date.now()  ){
          array.push({
               title: seance.nomsea,
               start: startday ,
               url :"http://127.0.0.1:8000/valide/"+seance.id      ,
               end:endday
                  })}else{
                    array.push({
               title: seance.nomsea,
               start: startday ,

               end:endday
                  }) 
                  }
          newDate.setDate(newDate.getDate() + 7); 
      };}) 


      
     });



      
          var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
              left: 'prevYear,prev,next,nextYear today',
              center: 'title',
              right: 'dayGridMonth,dayGridWeek,timeGridDay'
            },
            initialDate: Date.now(),
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            selectable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: array
          });
      
          calendar.render();
        });
      
      </script>
      
    <div id='calendar'></div>
</div>
   
@endsection