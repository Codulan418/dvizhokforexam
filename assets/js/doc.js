document.addEventListener('DOMContentLoaded' , () => {
    // находим все кнопки в меню и все блоки с контентом
    const tabButtons = document.querySelectorAll('.card-detail-doc');
    const tabContents = document.querySelectorAll('.tab-content');

    // перебираем все кнопки и вешаем на них событие клика 
    tabButtons.forEach(button => {
        button.addEventListener('click' , () => {

            // 1. убираем класс 'active' у всех кнопок и всех блоков контента
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));

            // 2. добавляем класс 'active' на ту кнопку, на которую мы только что нажали
            button.classList.add('active');

            // 3. получаем название вкладки на data-tab (например, "android")
            const targetTabId = button.getAttribute('data-tab');

            // 4. находим блок контента с таким id и показываем его 
            document.getElementById(targetTabId).classList.add('active');
        });
    });
});