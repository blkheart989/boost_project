$(document).ready(function() {

    $.ajax({
        url: "{{ url('/ajax/testimonials') }}",
        type: "GET",
        success: function(data) {

            let html = '';

            $.each(data, function(index, item) {

                html += `
                    <div class="testimonial-card">
                        <img src="/show_testimonial/${item.image}" alt="${item.name}">
                        <h4>${item.name}</h4>
                        <small>${item.designation}</small>

                        <div class="stars">
                            ${getStars(item.rating)}
                        </div>

                        <p>${item.description.substring(0,120)}...</p>
                    </div>
                `;
            });

            $('#testimonialTrack').html(html);

            startSlider(); // start slider AFTER data loads
        }
    });

    // ⭐ star generator
    function getStars(rating) {
        let stars = '';
        for (let i = 1; i <= 5; i++) {
            stars += (i <= rating) ? '★' : '☆';
        }
        return stars;
    }

    // 🎞 slider logic
    function startSlider() {

        let index = 0;
        let cards = $('.testimonial-card');
        let cardWidth = cards.outerWidth();
        let visibleCards = ($(window).width() < 768) ? 1 : 3;
        let totalCards = cards.length;

        if (totalCards <= visibleCards) return;

        setInterval(function() {

            index++;

            if (index > totalCards - visibleCards) {
                index = 0;
            }

            $('.testimonial-track').css(
                'transform',
                'translateX(' + (-index * cardWidth) + 'px)'
            );

        }, 3000);
    }

});