// for story in numbers
document.addEventListener('DOMContentLoaded', function () {
    const fadeInElements = document.querySelectorAll('.fade-in');
    const serviceBlocks = document.querySelectorAll('.service-block');

    const observerOptions = {
        root: null, // Use the viewport as the root
        threshold: 0.1 // Trigger when 10% of the element is visible
    };

    const observerCallback = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target); // Stop observing once the element is visible
            }
        });
    };

    const observer = new IntersectionObserver(observerCallback, observerOptions);

    // for story in numbers
    fadeInElements.forEach(element => {
        observer.observe(element);
    });

    // for serviecs
    serviceBlocks.forEach((block, index) => {
        block.style.transitionDelay = `${0.1 * index}s`;
        observer.observe(block);
    });
});

// for services
// document.addEventListener('DOMContentLoaded', function () {
//     const serviceBlocks = document.querySelectorAll('.service-block');

//     const observerOptions = {
//         root: null, // Use the viewport as the root
//         threshold: 0.1 // Trigger when 10% of the element is visible
//     };

//     const observerCallback = (entries, observer) => {
//         entries.forEach(entry => {
//             if (entry.isIntersecting) {
//                 entry.target.classList.add('visible');
//                 observer.unobserve(entry.target); // Stop observing once the element is visible
//             }
//         });
//     };

//     const observer = new IntersectionObserver(observerCallback, observerOptions);

//     serviceBlocks.forEach((block, index) => {
//         // Apply staggered animation delay based on index
//         block.style.transitionDelay = `${0.2 * index}s`;
//         observer.observe(block);
//     });
// });