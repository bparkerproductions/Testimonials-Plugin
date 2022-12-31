
window.addEventListener('load', function () {
  (function () {
    // Add the visibility classes
    const testimonials = document.querySelectorAll('.testimonials .slider-container .testimonial:nth-child(n+5)')
    testimonials.forEach(elem => {
      elem.classList.add('hidden')
    })

    // Logic for the toggling text/icon
    const testimonialsToggle = document.querySelector('.testimonials .testimonials-toggle')

    const toggleContainer = function () {
      testimonialsToggle.remove()

      // Unhide all testimonials
      document.querySelectorAll('.testimonials .slider-container .testimonial').forEach(elem => {
        elem.classList.remove('hidden')
      })
    }

    testimonialsToggle.addEventListener('click', toggleContainer)
  })()
})