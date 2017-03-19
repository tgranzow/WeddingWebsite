function counter() {
    // Set the date we're counting down to
    var countDownDate = new Date("Jun 9, 2018 15:00:00").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        if (hours <= 9) {
            hours = "0" + hours;
        }
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        if (minutes <= 9) {
            minutes = "0" + minutes;
        }
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        if (seconds <= 9) {
            seconds = "0" + seconds;
        }

        // Display the result in the element with id="countDown"
        document.getElementById("countDown").innerHTML = days + "d " + hours + "h " +
            minutes + "m " + seconds + "s";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countDown").innerHTML = "We're married!";
        }
    }, 1000);
}

document.addEventListener("DOMContentLoaded", counter);
