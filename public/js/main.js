$(document).ready(function(){
     $(".dropdown-button").dropdown({
       hover:true,
       belowOrigin: true
     });
     $('.slider').slider({
    indicators: false,
    height: 700
  });
  $('.parallax').parallax();
  $('.collapsible').collapsible();
  $('.scrollspy').scrollSpy();
  Materialize.updateTextFields();
  $('.materialboxed').materialbox();
     $('.button-collapse').sideNav({
      menuWidth: 200, // Default is 300
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
  );
$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 2, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
  });
  $('select').material_select();
})
