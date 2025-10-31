// public/js/jd.js
document.addEventListener('DOMContentLoaded', function () {
  const printButton = document.createElement('button');
  printButton.textContent = 'Print Job Description';
  printButton.style.position = 'fixed';
  printButton.style.top = '10px';
  printButton.style.right = '10px';
  printButton.style.padding = '10px 15px';
  printButton.style.backgroundColor = '#2c3e50';
  printButton.style.color = 'white';
  printButton.style.border = 'none';
  printButton.style.borderRadius = '4px';
  printButton.style.cursor = 'pointer';
  printButton.style.zIndex = '1000';
  printButton.addEventListener('click', () => window.print());
  document.body.appendChild(printButton);

  document.querySelectorAll('table').forEach((table) => {
    table.style.width = '100%';
    table.style.tableLayout = 'fixed';
  });
});
