// =========================
// HERO BACKGROUND SLIDER
// =========================

document.addEventListener("DOMContentLoaded", function () {
  const hero = document.querySelector(".hero");

  // Make sure the hero section exists
  if (hero) {
    const images = [
      "https://images.unsplash.com/photo-1507525428034-b723cf961d3e",
      "https://images.unsplash.com/photo-1582719478250-c89cae4dc85b",
      "https://plus.unsplash.com/premium_photo-1697730331645-5ca8244b708a?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
      "https://images.unsplash.com/photo-1617824077840-0d7a0cd13448?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D", 
      "https://plus.unsplash.com/premium_photo-1661964003610-2422de390fec?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
      "https://images.unsplash.com/photo-1499678329028-101435549a4e?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
      "https://plus.unsplash.com/premium_photo-1661951545793-ecb10ba445dc?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
      "https://images.unsplash.com/photo-1506744038136-46273834b3fb"
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
