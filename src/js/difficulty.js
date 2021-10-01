// Handles filtering on directory search page

(function ($) {

  const $table = $('.table-of-contents');
  const $selector = $('#difficulty-selector');

  function filterByDifficulty(event) {
    const difficulty = event.target.dataset.target;

    if (difficulty === 'All') {
      showAll();
    } else {
      showSelected(difficulty);
    }

    setActive(difficulty);
  }

  function showAll() {
    const rows = getRows();

    for (let index = 0; index < rows.length; index++) {
      const row = rows[index];
      row.classList.remove('d-none');
    }
  }

  function showSelected(difficulty) {
    const rows = getRows();

    for (let index = 0; index < rows.length; index++) {
      const row = rows[index];

      switch (row.dataset.difficulty) {
        case 'Unit':
          // No action taken on Unit rows
          break;

        case difficulty:
          row.classList.remove('d-none');
          break;

        default:
          row.classList.add('d-none');
          break;
      }
    }
  }

  function setActive(target) {
    const buttons = getButtons();

    for (let index = 0; index < buttons.length; index++) {
      const button = buttons[index];

      if (button.dataset.target === target) {
        button.classList.add('active');
      } else {
        button.classList.remove('active');
      }
    }
  }

  function getRows() {
    return $table[0].children[0].children;
  }

  function getButtons() {
    return $selector[0].children;
  }

  function init() {
    if ($table.length && $selector.length) {
      const buttons = getButtons();

      for (let index = 0; index < buttons.length; index++) {
        const button = buttons[index];
        button.onclick = filterByDifficulty;
      }
    }
  }

  $(init);


}(jQuery));
