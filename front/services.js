gsap.registerPlugin(ScrollTrigger);

document.addEventListener("DOMContentLoaded", () => {
  gsap.to(".sticky", {
    y: 250,
    scale: 0.75,
    rotation: -15,
    ease: "power3.out",
    scrollTrigger: {
      trigger: ".sticky",
      start: "top top",
      end: () => "+=" + (window.innerHeight + document.querySelector(".website-content").offsetHeight * 0.5),
      scrub: 1,
      pin: true
    }
  });

  gsap.fromTo(
    ".website-content",
    {
      x: -100,
      scale: 0.3,
      rotation: 15
    },
    {
      x: 0,
      scale: 1,
      rotation: 0,
      ease: "power3.out",
      scrollTrigger: {
        trigger: ".website-content",
        start: "top 200%",
        end: "top 50%",
        scrub: 1
      }
    }
  );
});
