// =========================
// HERO BACKGROUND SLIDER
// =========================

document.addEventListener("DOMContentLoaded", function () {
  const hero = document.querySelector(".hero");

  // Make sure the hero section exists
  if (hero) {
    const images = [
      "https://images.unsplash.com/photo-1578894381163-e72c17f2d45f?q=80&w=2106&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D", //1
      "https://images.unsplash.com/photo-1698574996391-73f103113f60?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D", //3
      "https://images.unsplash.com/photo-1551632811-561732d1e306?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D", //5
      "https://images.unsplash.com/photo-1691582583603-409757653634?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D", //4
      "https://images.unsplash.com/photo-1719369689684-542536915032?q=80&w=1925&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D", //2
    ];

    let index = 0;

    function changeBackground() {
      hero.style.backgroundImage = `url('${images[index]}')`;
      index = (index + 1) % images.length;
    }

    changeBackground(); // Set first image
    setInterval(changeBackground, 5000); // Change every 5 seconds
  }

  // =========================
  // CONTACT FORM HANDLER
  // =========================

  const contactForm = document.getElementById("contactForm");
  if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
      e.preventDefault(); // Stop form from refreshing the page
      alert("Thank you for contacting WanderX! We'll get back to you soon.");
      this.reset(); // Clear the form
    });
  }
});