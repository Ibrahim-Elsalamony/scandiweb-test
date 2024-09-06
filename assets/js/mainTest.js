// Function to check if the element with specific text is visible
async function checkIfVisible(text, timeout = 10000) {
  return new Promise((resolve, reject) => {
    const startTime = Date.now();

    function check() {
      // Find all h2 elements
      const elements = Array.from(document.querySelectorAll("h2"));
      // Check if any of them contain the desired text and are visible
      const element = elements.find(
        (el) => el.textContent.trim() === text && el.offsetParent !== null
      );

      if (element) {
        console.log(`Element with text "${text}" is visible.`);
        resolve(true);
      } else if (Date.now() - startTime > timeout) {
        console.log(
          `Timeout: Element with text "${text}" not visible within ${timeout}ms.`
        );
        resolve(false);
      } else {
        // Retry every 100ms
        setTimeout(check, 100);
      }
    }

    check();
  });
}

// Example usage
(async () => {
  const visible = await checkIfVisible("Product List", 10000);
  if (!visible) {
    console.error('The h2 element with "Product List" is not visible.');
  }
})();
