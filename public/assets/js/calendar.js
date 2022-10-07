function createCalendar(element, date, title) {
    const month = date.getMonth();
    const dayDate = date.getDate();
    const year = date.getFullYear();
    const days = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
    const totalDays = (new Date(year, month + 1, 0)).getDate();
    const firstDay = getDay(1);
    const today = new Date();

    let renderedDate = 0;
    let table = `
      
        <table>
            <tr class="calendar-month">
                <td colspan="7">${ title }</td>
            </tr>
            <tr class="calendar-day">
    `;

    // Add days
    days.map((day, i) => {
        table += `<th>${ day }</th>`;
        if((i + 1) == days.length) table += `</tr>`;
    });

    // Add dates
    for(let i = 0; i < totalWeeks(); i++) {
        table += `<tr class="calendar-date">`;

        for(let j = 0; j < 7; j++) {
            let classes = [];
            const isToday = (today.getDate() == renderedDate + 1) &&
                            (today.getMonth() == date.getMonth()) &&
                            (today.getFullYear() == date.getFullYear());

            if((i == 0 && j < firstDay) || renderedDate >= totalDays) {
                table += `<td class="inactive"></td>`;
                continue;
            }

            if(isToday) classes.push('today');
            if(renderedDate == (dayDate -1 )) classes.push('active');

            table += `<td class="${ classes.join(' ') }">${ ++renderedDate }</td>`;
        }

        table += `</tr>`;
    }

    table += `<table>`;
    
    function totalWeeks() {
        const first = new Date(year, month, 1);
        const last = new Date(year, month + 1, 0);

        return Math.ceil((first.getDay() + last.getDate()) / 7);
    }

    function getDay(day) {
        day = (new Date(year, month, day)).getDay();
        return (day == 0) ? 6 : day - 1;
    }

    element.innerHTML = table;
}
