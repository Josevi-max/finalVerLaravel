const picker = document.getElementById('date');
picker.addEventListener('input', function(e) {
    var day = new Date(this.value).getUTCDay();
    if ([6, 0].includes(day)) {
        this.value = null;
    } else {
        this.value = this.value.replace(this.value.slice(13, 17), ":00");
    }
});