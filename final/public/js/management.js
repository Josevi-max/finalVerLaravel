const picker = document.getElementById('date');
picker.addEventListener('input', function(e) {
    var day = new Date(this.value).getUTCDay();
    if ([6, 0].includes(day)) {

        this.value = null;
        //alert('Weekends not allowed');
    } else {
        //this.value.replace(this.value.slice(13, 17),00)
        this.value = this.value.replace(this.value.slice(13, 17), ":00");
    }
});

/*  $(".form-control").change(function() {

     // $(".form-control").val().replace($(".form-control").val().slice(13, 17),00);
      $(".form-control").val($(".form-control").val().replace($(".form-control").val().slice(13, 17),
          ":00"));
     // console.log($(".form-control").val().replace($(".form-control").val().slice(13, 17), ":00"));

  });*/