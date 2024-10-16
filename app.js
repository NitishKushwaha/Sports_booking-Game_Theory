document.addEventListener('DOMContentLoaded', () => {
    const centerSelect = document.getElementById('center');
    const sportSelect = document.getElementById('sport');
    const viewBookingsBtn = document.getElementById('viewBookingsBtn');
    const createBookingBtn = document.getElementById('createBookingBtn');
    const bookingForm = document.getElementById('bookingForm');
    const viewSection = document.getElementById('viewSection');
    const createSection = document.getElementById('createSection');
    const bookingList = document.getElementById('bookingList');

    centerSelect.addEventListener('change', async () => {
        const centerId = centerSelect.value;
        const response = await fetch(`get_sports.php?center_id=${centerId}`);
        const sports = await response.json();
        sportSelect.innerHTML = sports.map(sport => `<option value="${sport.id}">${sport.name}</option>`).join('');
    });

    viewBookingsBtn.addEventListener('click', () => {
        viewSection.classList.remove('hidden');
        createSection.classList.add('hidden');
    });

    createBookingBtn.addEventListener('click', () => {
        createSection.classList.remove('hidden');
        viewSection.classList.add('hidden');
    });

    bookingForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(bookingForm);
        const response = await fetch('create_booking.php', {
            method: 'POST',
            body: formData
        });
        const result = await response.text();
        alert(result);
    });

    sportSelect.addEventListener('change', async () => {
        const sportId = sportSelect.value;
        const date = document.getElementById('date').value;
        const centerId = centerSelect.value;
        const response = await fetch(`get_bookings.php?center_id=${centerId}&sport_id=${sportId}&date=${date}`);
        const bookings = await response.json();
        bookingList.innerHTML = bookings.length ? bookings.map(booking => `<p>${booking.time_slot}</p>`).join('') : '<p>No bookings found</p>';
    });
});
